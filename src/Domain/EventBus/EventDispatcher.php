<?php

declare(strict_types=1);


namespace Pokemon\Domain\EventBus;


use EventBusException;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

class EventDispatcher implements EventDispatcherInterface
{

    private ListenerProviderInterface $listenerProvider;
    private ContainerInterface $container;

    public function __construct(ListenerProviderInterface $listenerProvider, ContainerInterface $container)
    {
        $this->listenerProvider = $listenerProvider;
        $this->container        = $container;
    }


    /**
     * @param object $event
     * @return object|void
     * @throws EventBusException
     */
    public function dispatch(object $event)
    {
        $eventHandlers = $this->listenerProvider->getListenersForEvent($event);
        foreach ($eventHandlers as $eventHandlerName) {
            if (!is_callable($eventHandlerName)) {
                if (!$this->container->has($event)) {
                    throw new EventBusException('Error on event bus');
                }
                $eventHandler = $this->container->get($eventHandlerName);

            } else {
                $eventHandler = $eventHandlerName;
            }

            $eventHandler($event);
        }
    }
}

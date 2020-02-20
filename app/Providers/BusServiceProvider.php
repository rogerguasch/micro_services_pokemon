<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\CallableLocator;
use League\Tactician\Handler\MethodNameInflector\InvokeInflector;
use Pokemon\Domain\Bus\CommandBus;
use Pokemon\Domain\Bus\QueryBus;
use Pokemon\Domain\EventBus\ListenerProvider;
use Pokemon\Infrastructure\Bus\Tactician\TacticianCommandBus;
use Pokemon\Infrastructure\Bus\Tactician\TacticianQueryBus;
use Psr\EventDispatcher\ListenerProviderInterface;


class BusServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CommandHandlerMiddleware::class,
            static function (Application $app) {
                return new CommandHandlerMiddleware(
                    new ClassNameExtractor(),
                    new CallableLocator(fn($className) => $app->get($className . 'Handler')),
                    new InvokeInflector()
                );
            }
        );

        $this->app->bind(
            TacticianCommandBus::class,
            static function (Application $app) {
                return new TacticianCommandBus([
                    $app->get(CommandHandlerMiddleware::class)
                ]);
            }
        );

        $this->app->bind(
            TacticianQueryBus::class,
            static function (Application $app) {
                return new TacticianQueryBus([
                    $app->get(CommandHandlerMiddleware::class)
                ]);
            }
        );

        $this->app->bind(
            CommandBus::class,
            TacticianCommandBus::class
        );
        $this->app->bind(
            QueryBus::class,
            TacticianQueryBus::class
        );

        $this->app->singleton(
            ListenerProvider::class,
            fn($app) => new ListenerProvider()
        );

//        $this->app->singleton(
//            ListenerProvider::class,
//            static function (Application $app) {
//                return new ListenerProvider();
//            }
//        );

        $this->app->bind(
            ListenerProviderInterface::class,
            ListenerProvider::class
        );
    }
}

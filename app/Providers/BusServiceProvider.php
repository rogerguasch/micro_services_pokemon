<?php

namespace App\Providers;

use CommandBus;
use Illuminate\Support\ServiceProvider;
use League\Tactician\CommandBus as TacticianCommandBus;
use QueryBus;


class BusServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommandBus::class, TacticianCommandBus::class);
        $this->app->bind(QueryBus::class, TacticianCommandBus::class);
    }
}

<?php

namespace PPSpaces;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerApplicationCommands();
    }

    protected function registerApplicationCommands() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\RepositoryMakeCommand::class,
            ]);
        }
    }
}

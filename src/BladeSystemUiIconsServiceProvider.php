<?php

declare(strict_types=1);

namespace Codeat3\BladeSystemUiIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeSystemUiIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('simple-icons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'si',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-si'),
            ], 'blade-si');
        }
    }
}

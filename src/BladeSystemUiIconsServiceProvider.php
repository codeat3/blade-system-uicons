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
            $factory->add('systemui-icons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'sui',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-sui'),
            ], 'blade-sui');
        }
    }
}

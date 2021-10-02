<?php

declare(strict_types=1);

namespace Codeat3\BladeSystemUIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeSystemUIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-system-uicons', []);

            $factory->add('system-uicons', array_merge(['path' => __DIR__.'/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blade-system-uicons.php', 'blade-system-uicons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-system-uicons'),
            ], 'blade-sui'); // TODO: update the alias to `blade-system-uicons` in next major release

            $this->publishes([
                __DIR__.'/../config/blade-system-uicons.php' => $this->app->configPath('blade-system-uicons.php'),
            ], 'blade-system-uicons-config');
        }
    }
}

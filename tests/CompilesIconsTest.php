<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeSystemUIcons\BladeSystemUIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('sui-alarm-clock')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="currentColor"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 19 2)"><path d="m7.5 2.56534572h2c3.3137085 0 6 2.6862915 6 6v1.93465428c0 3.3137085-2.6862915 6-6 6h-2c-3.3137085 0-6-2.6862915-6-6v-1.93465428c0-3.3137085 2.6862915-6 6-6zm-3.03187447-1.06810595c-.88435284-.63912003-2.08877116-.7093269-2.96812553.00276023-.90620024.73382648-1.25812628 1.95919459-.82225162 2.96879869m11.79055952-2.92496449c.889667-.68192972 2.1314103-.77286806 3.0316921-.0438342.9064946.73406486 1.2583549 1.95999074.8218266 2.96978251"/><path d="m8.5 5.5v4h-3.5"/><path d="m14 15 2 2"/><path d="m1 15 2 2" transform="matrix(-1 0 0 1 4 0)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('sui-alarm-clock', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="currentColor"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 19 2)"><path d="m7.5 2.56534572h2c3.3137085 0 6 2.6862915 6 6v1.93465428c0 3.3137085-2.6862915 6-6 6h-2c-3.3137085 0-6-2.6862915-6-6v-1.93465428c0-3.3137085 2.6862915-6 6-6zm-3.03187447-1.06810595c-.88435284-.63912003-2.08877116-.7093269-2.96812553.00276023-.90620024.73382648-1.25812628 1.95919459-.82225162 2.96879869m11.79055952-2.92496449c.889667-.68192972 2.1314103-.77286806 3.0316921-.0438342.9064946.73406486 1.2583549 1.95999074.8218266 2.96978251"/><path d="m8.5 5.5v4h-3.5"/><path d="m14 15 2 2"/><path d="m1 15 2 2" transform="matrix(-1 0 0 1 4 0)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('sui-alarm-clock', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="currentColor"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 19 2)"><path d="m7.5 2.56534572h2c3.3137085 0 6 2.6862915 6 6v1.93465428c0 3.3137085-2.6862915 6-6 6h-2c-3.3137085 0-6-2.6862915-6-6v-1.93465428c0-3.3137085 2.6862915-6 6-6zm-3.03187447-1.06810595c-.88435284-.63912003-2.08877116-.7093269-2.96812553.00276023-.90620024.73382648-1.25812628 1.95919459-.82225162 2.96879869m11.79055952-2.92496449c.889667-.68192972 2.1314103-.77286806 3.0316921-.0438342.9064946.73406486 1.2583549 1.95999074.8218266 2.96978251"/><path d="m8.5 5.5v4h-3.5"/><path d="m14 15 2 2"/><path d="m1 15 2 2" transform="matrix(-1 0 0 1 4 0)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-system-uicons.class', 'awesome');

        $result = svg('sui-alarm-clock')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="currentColor"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 19 2)"><path d="m7.5 2.56534572h2c3.3137085 0 6 2.6862915 6 6v1.93465428c0 3.3137085-2.6862915 6-6 6h-2c-3.3137085 0-6-2.6862915-6-6v-1.93465428c0-3.3137085 2.6862915-6 6-6zm-3.03187447-1.06810595c-.88435284-.63912003-2.08877116-.7093269-2.96812553.00276023-.90620024.73382648-1.25812628 1.95919459-.82225162 2.96879869m11.79055952-2.92496449c.889667-.68192972 2.1314103-.77286806 3.0316921-.0438342.9064946.73406486 1.2583549 1.95999074.8218266 2.96978251"/><path d="m8.5 5.5v4h-3.5"/><path d="m14 15 2 2"/><path d="m1 15 2 2" transform="matrix(-1 0 0 1 4 0)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-system-uicons.class', 'awesome');

        $result = svg('sui-alarm-clock', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="currentColor"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" transform="matrix(-1 0 0 1 19 2)"><path d="m7.5 2.56534572h2c3.3137085 0 6 2.6862915 6 6v1.93465428c0 3.3137085-2.6862915 6-6 6h-2c-3.3137085 0-6-2.6862915-6-6v-1.93465428c0-3.3137085 2.6862915-6 6-6zm-3.03187447-1.06810595c-.88435284-.63912003-2.08877116-.7093269-2.96812553.00276023-.90620024.73382648-1.25812628 1.95919459-.82225162 2.96879869m11.79055952-2.92496449c.889667-.68192972 2.1314103-.77286806 3.0316921-.0438342.9064946.73406486 1.2583549 1.95999074.8218266 2.96978251"/><path d="m8.5 5.5v4h-3.5"/><path d="m14 15 2 2"/><path d="m1 15 2 2" transform="matrix(-1 0 0 1 4 0)"/></g></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeSystemUIconsServiceProvider::class,
        ];
    }
}

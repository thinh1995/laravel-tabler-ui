<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class TabComponentTest extends TestCase
{
    public function test_basic_tabs_can_be_rendered()
    {
        $navs = [
            'Home',
            'Profile',
        ];

        $slot = '<x-tabler-pane index="0">Home tab</x-tabler-pane>
        <x-tabler-pane index="1">Profile tab</x-tabler-pane>';

        $view = $this->blade(
            '<x-tabler-tab :navs="$navs">' . $slot . '</x-tabler-tab>',
            ['navs' => $navs]
        );

        $view->assertSee('Home');
        $view->assertSee('Home tab');
        $view->assertSee('Profile');
        $view->assertSee('Profile tab');
    }

    public function test_disabled_tabs_can_be_rendered()
    {
        $navs = [
            ['title' => 'Home'],
            ['title' => 'Profile', 'disabled' => true],
        ];

        $slot = '<x-tabler-pane index="0">Home tab</x-tabler-pane>
        <x-tabler-pane index="1">Profile tab</x-tabler-pane>';

        $view = $this->blade(
            '<x-tabler-tab :navs="$navs">' . $slot . '</x-tabler-tab>',
            ['navs' => $navs]
        );

        $view->assertSee('Home');
        $view->assertSee('Home tab');
        $view->assertSee('Profile');
        $view->assertDontSee('Profile tab');
    }

    public function test_class_tabs_and_fade_panels_can_be_rendered()
    {
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon me-2 icon-2">
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                          </svg>';
        $navs = [
            ['title' => 'Home', 'icon' => $icon],
            ['title' => 'Profile', 'class' => 'ms-auto'],
        ];

        $slot = '<x-tabler-pane index="0">Home tab</x-tabler-pane>
        <x-tabler-pane index="1">Profile tab</x-tabler-pane>';

        $view = $this->blade(
            '<x-tabler-tab :navs="$navs">' . $slot . '</x-tabler-tab>',
            ['navs' => $navs]
        );

        $view->assertSee('Home');
        $view->assertSee('Home tab');
        $view->assertSee('Profile');
        $view->assertSee('Profile tab');
        $view->assertSee(e($icon), false);
        $view->assertSee('class="nav-item ms-auto"', false);
    }
}

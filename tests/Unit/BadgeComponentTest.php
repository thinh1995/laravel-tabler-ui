<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class BadgeComponentTest extends TestCase
{
    public function test_basic_badge_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-badge>New</x-tabler-badge>');

        $view->assertSee('New');
    }

    public function test_badge_size_large_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-badge size="large">New</x-tabler-badge>');

        $view->assertSee('New');
        $view->assertSee('badge badge-lg');
    }

    public function test_theme_badge_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-badge theme="primary">New</x-tabler-badge>');

        $view->assertSee('New');
        $view->assertSee('badge bg-primary text-primary-fg');
    }

    public function test_outline_badge_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-badge :outline="true">New</x-tabler-badge>');

        $view->assertSee('New');
        $view->assertSee('badge badge-outline');
    }

    public function test_dot_badge_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-badge :dot="true">New</x-tabler-badge>');

        $view->assertDontSee('New');
        $view->assertSee('badge badge-dot');
    }
}

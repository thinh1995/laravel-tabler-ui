<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class IconComponentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->app->usePublicPath(__DIR__ . '/../../resources/assets');
    }

    public function test_basic_icon_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-icon name="alarm" dir="icons"/>');

        $view->assertSee('<svg class="icon', false);
        $view->assertSee('viewBox="0 0 24 24"', false);
    }
}

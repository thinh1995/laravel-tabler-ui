<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class IconComponentTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->app->usePublicPath(__DIR__ . '/../../resources/assets');
        config(['tabler.assets_dir' => '']);
    }

    public function test_basic_icon_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-icon name="alarm"/>');

        $view->assertSee('<svg class="icon', false);
        $view->assertSee('viewBox="0 0 24 24"', false);
    }
}

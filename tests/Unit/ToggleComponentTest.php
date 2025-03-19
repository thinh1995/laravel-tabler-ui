<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class ToggleComponentTest extends TestCase
{
    public function test_basic_toggle_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-toggle label="Status" name="status" value="1"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('value="1"', false);
    }

    public function test_checked_toggle_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-toggle label="Status" name="status" value="1" :checked="true"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('checked', false);
    }
}

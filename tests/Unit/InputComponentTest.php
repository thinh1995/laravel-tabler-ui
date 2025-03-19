<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class InputComponentTest extends TestCase
{
    public function test_basic_input_can_be_rendered()
    {
        $view = $this->withViewErrors([])
                     ->blade('<x-tabler-input name="name" value="Lucifer" hint="Please enter your name"/>');

        $view->assertSee('name="name"', false);
        $view->assertSee('value="Lucifer"', false);
        $view->assertSee('Please enter your name', false);
    }

    public function test_rounded_textarea_can_be_rendered()
    {
        $view = $this->withViewErrors([])
                     ->blade('<x-tabler-input name="name" value="Lucifer" hint="Please enter your name" stylish="rounded"/>');

        $view->assertSee('name="name"', false);
        $view->assertSee('value="Lucifer"', false);
        $view->assertSee('Please enter your name', false);
        $view->assertSee('class="form-control form-control-rounded"', false);
    }

    public function test_flush_textarea_can_be_rendered()
    {
        $view = $this->withViewErrors([])
                     ->blade('<x-tabler-input name="name" value="Lucifer" hint="Please enter your name" stylish="flush"/>');

        $view->assertSee('name="name"', false);
        $view->assertSee('value="Lucifer"', false);
        $view->assertSee('Please enter your name', false);
        $view->assertSee('class="form-control form-control-flush"', false);
    }
}

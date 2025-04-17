<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class TextareaComponentTest extends TestCase
{
    public function test_basic_textarea_can_be_rendered()
    {
        $view = $this->withViewErrors([])
                     ->blade('<x-tabler-textarea name="description" value="Hello World!" hint="Description of your page"/>');

        $view->assertSee('name="description"', false);
        $view->assertSee('Hello World!', false);
        $view->assertSee('Description of your page', false);
    }

    public function test_rounded_textarea_can_be_rendered()
    {
        $view = $this->withViewErrors([])
                     ->blade('<x-tabler-textarea name="description" value="Hello World!" hint="Description of your page" stylish="rounded"/>');

        $view->assertSee('name="description"', false);
        $view->assertSee('Hello World!', false);
        $view->assertSee('Description of your page', false);
        $view->assertSee('class="form-control form-control-rounded"', false);
    }

    public function test_flush_textarea_can_be_rendered()
    {
        $view = $this->withViewErrors([])
                     ->blade('<x-tabler-textarea name="description" value="Hello World!" hint="Description of your page" stylish="flush"/>');

        $view->assertSee('name="description"', false);
        $view->assertSee('Hello World!', false);
        $view->assertSee('Description of your page', false);
        $view->assertSee('class="form-control form-control-flush"', false);
    }
}

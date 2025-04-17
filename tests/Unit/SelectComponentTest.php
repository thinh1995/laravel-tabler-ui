<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class SelectComponentTest extends TestCase
{
    public function test_basic_select_can_be_rendered()
    {
        $view = $this->withViewErrors([])->blade('<x-tabler-select label="Status" name="status" :options="[0, 1]"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('value="0"', false);
    }

    public function test_multiple_select_can_be_rendered()
    {
        $view = $this->withViewErrors([])->blade('<x-tabler-select label="Status" name="status" :options="[0, 1, 2]" :multiple="true"/>');

        $view->assertSee('multiple="multiple"', false);
        $view->assertSee('value="0"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('value="2"', false);
    }

    public function test_float_select_can_be_rendered()
    {
        $view = $this->withViewErrors([])->blade('<x-tabler-select label="Status" name="status" :options="[0, 1]" stylish="float"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('class="mb-3 form-floating"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('value="0"', false);
    }

    public function test_rounded_select_can_be_rendered()
    {
        $view = $this->withViewErrors([])->blade('<x-tabler-select label="Status" name="status" :options="[0, 1]" stylish="rounded"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('class="form-control form-select form-control-rounded"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('value="0"', false);
    }

    public function test_flush_select_can_be_rendered()
    {
        $view = $this->withViewErrors([])->blade('<x-tabler-select label="Status" name="status" :options="[0, 1]" stylish="flush"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('class="form-control form-select form-control-flush"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('value="0"', false);
    }
}

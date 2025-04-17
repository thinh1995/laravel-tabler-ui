<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class RadioComponentTest extends TestCase
{
    public function test_basic_radio_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-radio label="Status" name="status" value="1" description="Status of model"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('Status of model');
    }

    public function test_inline_radio_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-radio label="Status" name="status" value="1" :inline="true"/>');

        $view->assertSee('form-check-inline');
    }
}

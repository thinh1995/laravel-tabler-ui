<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class CheckboxComponentTest extends TestCase
{
    public function test_basic_checkbox_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-checkbox label="Status" name="status" value="1" description="Status of model"/>');

        $view->assertSee('name="status"', false);
        $view->assertSee('value="1"', false);
        $view->assertSee('Status of model');
    }

    public function test_inline_checkbox_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-checkbox label="Status" name="status" value="1" :inline="true"/>');

        $view->assertSee('form-check-inline');
    }
}

<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class ButtonComponentTest extends TestCase
{
    public function test_basic_button_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-button>Submit</x-tabler-button>');

        $view->assertSee('Submit');
    }

    public function test_theme_button_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-button theme="primary">Submit</x-tabler-button>');

        $view->assertSee('Submit');
        $view->assertSee('btn btn-primary');
    }

    public function test_anchor_button_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-button :anchor="true" href="#">Submit</x-tabler-button>');

        $view->assertSee('Submit');
        $view->assertSee('href="#"', false);
    }

    public function test_button_size_large_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-button size="large">Submit</x-tabler-button>');

        $view->assertSee('Submit');
        $view->assertSee('btn btn-lg');
    }

    public function test_button_square_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-button :square="true">Submit</x-tabler-button>');

        $view->assertSee('Submit');
        $view->assertSee('btn btn-square');
    }

    public function test_button_pill_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-button :pill="true">Submit</x-tabler-button>');

        $view->assertSee('Submit');
        $view->assertSee('btn btn-pill');
    }
}

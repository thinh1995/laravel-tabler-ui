<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class FormComponentTest extends TestCase
{
    public function test_get_form_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-form class="form-check" action="/" method="get"></x-tabler-form>');

        $view->assertSee('action="/"', false);
        $view->assertSee('method="get"', false);
        $view->assertSee('class="form-check"', false);
    }

    public function test_post_form_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-form action="/" method="post" enctype="multipart/form-data"></x-tabler-form>');

        $view->assertSee('action="/"', false);
        $view->assertSee('method="post"', false);
        $view->assertSee('enctype="multipart/form-data"', false);
    }
}

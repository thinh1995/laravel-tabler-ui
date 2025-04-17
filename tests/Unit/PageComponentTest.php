<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests\Unit;

use Thinhnx\LaravelTablerUI\Tests\TestCase;

class PageComponentTest extends TestCase
{
    public function test_empty_page_can_be_rendered()
    {
        $view = $this->blade('<x-tabler-page></x-tabler-page>');

        $view->assertSee('<div class="page-wrapper">', false);
        $view->assertSee('<div class="page-body">', false);
    }

    public function test_page_has_header_and_actions_can_be_rendered()
    {
        $actions = '<x-tabler-page::button>Click me</x-tabler-page::button>';
        $view    = $this->blade(
            '<x-tabler-page title="Sample page" :actions="$actions"></x-tabler-page>',
            ['actions' => $actions]
        );

        $view->assertSee('<h2 class="page-title">Sample page</h2>', false);
        $view->assertSeeText('Click me');
    }

    public function test_page_has_footer_can_be_rendered()
    {
        $footer = '<span>Copyright © 2025 Tabler. All rights reserved.</span>';
        $view    = $this->blade(
            '<x-tabler-page title="Sample page" :footer="$footer"></x-tabler-page>',
            ['footer' => $footer]
        );

        $view->assertSee('<h2 class="page-title">Sample page</h2>', false);
        $view->assertSee(e('<span>Copyright © 2025 Tabler. All rights reserved.</span>'));
    }
}

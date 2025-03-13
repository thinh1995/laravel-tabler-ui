<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class CardComponentTest extends TestCase
{
    public function test_basic_card_can_be_rendered()
    {
        $footer = '<a href="#" class="btn btn-primary">Go somewhere</a>';

        $view = $this->blade(
            '<x-tabler-card :title="$title" :subtitle="$subtitle" :footer="$footer">Simple card</x-tabler-card>',
            [
                'title' => 'Card title',
                'subtitle' => 'Card subtitle',
                'footer' => $footer
            ]
        );

        $view->assertSee('Card title');
        $view->assertSee('Card subtitle');
        $view->assertSee('Simple card');
        $view->assertSee(e($footer));
    }

    public function test_borderless_card_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-card :title="$title" :borderless="true">Simple card</x-tabler-card>',
            ['title' => 'Card title']
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee('class="card card-borderless"', false);
    }

    public function test_card_with_header_light_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-card :title="$title" :header-light="true">Simple card</x-tabler-card>',
            ['title' => 'Card title']
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee('class="card-header card-header-light"', false);
    }

    public function test_card_with_footer_transparent_can_be_rendered()
    {
        $footer = '<a href="#" class="btn btn-primary">Go somewhere</a>';

        $view = $this->blade(
            '<x-tabler-card :title="$title" :footer="$footer" :footer-transparent="true">Simple card</x-tabler-card>',
            [
                'title' => 'Card title',
                'footer' => $footer
            ]
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee(e($footer));
        $view->assertSee('class="card-footer card-footer-transparent"', false);
    }

    public function test_hover_card_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-card :title="$title" :hover="true">Simple card</x-tabler-card>',
            ['title' => 'Card title']
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee('class="card card-link"', false);
    }

    public function test_active_card_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-card :title="$title" :active="true">Simple card</x-tabler-card>',
            ['title' => 'Card title']
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee('class="card card-active"', false);
    }

    public function test_theme_card_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-card :title="$title" theme="primary">Simple card</x-tabler-card>',
            ['title' => 'Card title']
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee('class="card bg-primary text-primary-fg"', false);
    }

    public function test_light_theme_card_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-card :title="$title" theme="primary" :light="true">Simple card</x-tabler-card>',
            ['title' => 'Card title']
        );

        $view->assertSee('Card title');
        $view->assertSee('Simple card');
        $view->assertSee('class="card bg-primary-lt"', false);
    }
}

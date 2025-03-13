<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class AccordionComponentTest extends TestCase
{
    public array $items = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->items = [
            [
                'title' => 'What makes Tabler different from other UI frameworks?',
                'body'  => 'Tabler offers a modern, responsive design with a clean aesthetic, built on Bootstrap for ease of use and flexibility.'
            ],
            [
                'title' => 'How can I customize Tabler components to fit my design needs?',
                'body'  => 'You can customize Tabler components using CSS variables, SCSS, and utility classes to match your design preferences.'
            ],
        ];
    }

    public function test_basic_accordion_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-accordion :items="$items" activeIndex="0"></x-tabler-accordion>',
            ['items' => $this->items]
        );

        $view->assertSee($this->items[0]['title']);
        $view->assertSee($this->items[0]['body']);
        $view->assertSee($this->items[1]['title']);
        $view->assertSee($this->items[1]['body']);
    }

    public function test_flush_accordion_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-accordion :items="$items" activeIndex="0" :flush="true"></x-tabler-accordion>',
            ['items' => $this->items]
        );

        $view->assertSee($this->items[0]['title']);
        $view->assertSee($this->items[0]['body']);
        $view->assertSee($this->items[1]['title']);
        $view->assertSee($this->items[1]['body']);
        $view->assertSee('accordion accordion-flush');
    }

    public function test_tabs_accordion_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-accordion :items="$items" activeIndex="0" :tabs="true"></x-tabler-accordion>',
            ['items' => $this->items]
        );

        $view->assertSee($this->items[0]['title']);
        $view->assertSee($this->items[0]['body']);
        $view->assertSee($this->items[1]['title']);
        $view->assertSee($this->items[1]['body']);
        $view->assertSee('accordion accordion-tabs');
    }

    public function test_inverted_accordion_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-accordion :items="$items" activeIndex="0" :inverted="true"></x-tabler-accordion>',
            ['items' => $this->items]
        );

        $view->assertSee($this->items[0]['title']);
        $view->assertSee($this->items[0]['body']);
        $view->assertSee($this->items[1]['title']);
        $view->assertSee($this->items[1]['body']);
        $view->assertSee('accordion accordion-inverted');
    }

    public function test_icon_plus_accordion_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-accordion :items="$items" activeIndex="0" :icon-plus="true"></x-tabler-accordion>',
            ['items' => $this->items]
        );

        $iconPlus = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="icon icon-1">
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                </svg>';

        $view->assertSee($this->items[0]['title']);
        $view->assertSee($this->items[0]['body']);
        $view->assertSee($this->items[1]['title']);
        $view->assertSee($this->items[1]['body']);
        $view->assertSee('accordion-header-toggle accordion-header-toggle-plus');
        $view->assertSee($iconPlus, false);
    }
}

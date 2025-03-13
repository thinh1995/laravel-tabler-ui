<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests\Unit;

use Lucifer\LaravelTablerUi\Tests\TestCase;

class AlertComponentTest extends TestCase
{
    public string $title;

    public array $description;

    public string $icon;

    protected function setUp(): void
    {
        parent::setUp();
        $this->title       = 'Completed successfully!';
        $this->description = [
            'Minimum 8 characters',
            'Include a special character'
        ];
        $this->icon        = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2"><path d="M5 12l5 5l10 -10"></path></svg>';
    }

    public function test_basic_alert_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-alert :title="$title" :icon="$icon"></x-tabler-alert>',
            [
                'title' => $this->title,
                'icon'  => $this->icon,
            ]
        );

        $view->assertSee($this->title);
        $view->assertSee(e($this->icon));
    }

    public function test_theme_alert_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-alert :title="$title" :icon="$icon" theme="primary"></x-tabler-alert>',
            [
                'title' => $this->title,
                'icon'  => $this->icon,
            ]
        );

        $view->assertSee($this->title);
        $view->assertSee(e($this->icon));
        $view->assertSee('alert alert-primary');
    }

    public function test_dismissible_alert_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-alert :title="$title" :icon="$icon" :dismissible="true"></x-tabler-alert>',
            [
                'title' => $this->title,
                'icon'  => $this->icon,
            ]
        );

        $view->assertSee($this->title);
        $view->assertSee(e($this->icon));
        $view->assertSee('<a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>', false);
    }

    public function test_important_alert_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-alert :title="$title" :icon="$icon" :important="true"></x-tabler-alert>',
            [
                'title' => $this->title,
                'icon'  => $this->icon,
            ]
        );

        $view->assertSee($this->title);
        $view->assertSee(e($this->icon));
        $view->assertSee('alert alert-important');
    }

    public function test_alert_with_description_can_be_rendered()
    {
        $view = $this->blade(
            '<x-tabler-alert :title="$title" :icon="$icon" :dismissible="true" :description="$description"></x-tabler-alert>',
            [
                'title'       => $this->title,
                'icon'        => $this->icon,
                'description' => $this->description,
            ]
        );

        $view->assertSee($this->title);
        $view->assertSee(e($this->icon));
        $view->assertSee($this->description[0]);
        $view->assertSee($this->description[1]);
    }
}

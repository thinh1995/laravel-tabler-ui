<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Thinhnx\LaravelTablerUI\View\Components\Accordion;
use Thinhnx\LaravelTablerUI\View\Components\Alert;
use Thinhnx\LaravelTablerUI\View\Components\Badge;
use Thinhnx\LaravelTablerUI\View\Components\Button;
use Thinhnx\LaravelTablerUI\View\Components\Card;
use Thinhnx\LaravelTablerUI\View\Components\Checkbox;
use Thinhnx\LaravelTablerUI\View\Components\Ckeditor;
use Thinhnx\LaravelTablerUI\View\Components\Datatable;
use Thinhnx\LaravelTablerUI\View\Components\Form;
use Thinhnx\LaravelTablerUI\View\Components\Icon;
use Thinhnx\LaravelTablerUI\View\Components\Input;
use Thinhnx\LaravelTablerUI\View\Components\Page;
use Thinhnx\LaravelTablerUI\View\Components\Radio;
use Thinhnx\LaravelTablerUI\View\Components\Select;
use Thinhnx\LaravelTablerUI\View\Components\Tab;
use Thinhnx\LaravelTablerUI\View\Components\Textarea;
use Thinhnx\LaravelTablerUI\View\Components\Toggle;

class LaravelTablerUIProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'tabler');
        $this->registerComponents();
        $this->registerDirectives();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('/packages/thinhnx/tabler'),
            ], 'assets');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/tabler'),
            ], 'views');
        }
    }

    protected function registerComponents(): void
    {
        Blade::component('tabler-accordion', Accordion::class);
        Blade::component('tabler-alert', Alert::class);
        Blade::component('tabler-badge', Badge::class);
        Blade::component('tabler-button', Button::class);
        Blade::component('tabler-card', Card::class);
        Blade::component('tabler-page', Page::class);
        Blade::component('tabler-pane', Tab\Pane::class);
        Blade::component('tabler-tab', Tab::class);
        Blade::component('tabler-input', Input::class);
        Blade::component('tabler-textarea', Textarea::class);
        Blade::component('tabler-form', Form::class);
        Blade::component('tabler-select', Select::class);
        Blade::component('tabler-checkbox', Checkbox::class);
        Blade::component('tabler-radio', Radio::class);
        Blade::component('tabler-toggle', Toggle::class);
        Blade::component('tabler-icon', Icon::class);
        Blade::component('tabler-ckeditor', Ckeditor::class);
        Blade::component('tabler-datatable', Datatable::class);
    }

    protected function registerDirectives(): void
    {
        Blade::directive('tabler', function () {
            $cssFileNames = [
                'tabler.min.css',
                'tabler-flags.min.css',
                'tabler-socials.min.css',
                'tabler-payments.min.css',
                'tabler-vendors.min.css',
                'tabler-marketing.min.css',
            ];

            $result = '<!-- Tabler UI Stylesheets -->' . PHP_EOL;

            foreach ($cssFileNames as $fileName) {
                $result .= sprintf(
                    '<link rel="stylesheet" href="%s"/>' . PHP_EOL,
                    asset("/packages/thinhnx/tabler/css/{$fileName}")
                );
            }

            $result .= sprintf(
                '<script src="%s"></script>' . PHP_EOL,
                asset('/packages/thinhnx/tabler/js/tabler.min.js')
            );

            return $result;
        });

        Blade::directive('tomselect', function () {
            $result = sprintf(
                '<link rel="stylesheet" href="%s"/>' . PHP_EOL,
                asset('/packages/thinhnx/tabler/libs/tom-select/dist/css/tom-select.bootstrap5.min.css')
            );

            $result .= sprintf(
                '<script src="%s"></script>' . PHP_EOL,
                asset('/packages/thinhnx/tabler/libs/tom-select/dist/js/tom-select.base.min.js')
            );

            return $result;
        });

        Blade::directive('datatable', function (string $type) {
            switch (strtolower($type)) {
                case "'css'":
                    $result = '<!-- Datatable Stylesheets -->' . PHP_EOL;

                    $fileNames = [
                        'dataTables.bootstrap5.min.css',
                        'buttons.bootstrap5.min.css',
                        'select.bootstrap5.min.css',
                        'searchBuilder.bootstrap5.min.css',
                        'fixedHeader.bootstrap5.min.css',
                        'dataTables.checkboxes.css'
                    ];

                    foreach ($fileNames as $fileName) {
                        $result .= sprintf(
                            '<link rel="stylesheet" href="%s"/>' . PHP_EOL,
                            asset("/packages/thinhnx/tabler/libs/datatables/css/{$fileName}")
                        );
                    }
                    break;
                case "'js'":
                    $result = '<!-- Datatable Scripts -->' . PHP_EOL;

                    $fileNames = [
                        'dataTables.min.js',
                        'dataTables.bootstrap5.min.js',
                        'dataTables.buttons.min.js',
                        'buttons.bootstrap5.min.js',
                        'jszip.min.js',
                        'buttons.colVis.min.js',
                        'pdfmake.min.js',
                        'vfs_fonts.js',
                        'buttons.print.min.js',
                        'buttons.html5.min.js',
                        'dataTables.select.min.js',
                        'select.bootstrap5.min.js',
                        'dataTables.searchBuilder.min.js',
                        'searchBuilder.bootstrap5.min.js',
                        'dataTables.fixedHeader.min.js',
                        'fixedHeader.bootstrap5.min.js',
                        'dataTables.checkboxes.min.js',
                        'datatable-init.js',
                    ];

                    foreach ($fileNames as $fileName) {
                        $result .= sprintf(
                            '<script src="%s"></script>' . PHP_EOL,
                            asset("/packages/thinhnx/tabler/libs/datatables/js/{$fileName}")
                        );
                    }
                    break;

                default:
                    $result = null;
            }

            return $result;
        });

        Blade::directive('ckeditor4', function () {
            $result = '<!-- CKEditor 4 -->' . PHP_EOL;
            $result .= sprintf(
                '<link rel="stylesheet" href="%s"/>' . PHP_EOL,
                asset(
                    '/packages/thinhnx/tabler/libs/ckeditor4/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css'
                )
            );
            $result .= sprintf(
                '<script src="%s"></script>' . PHP_EOL,
                asset('/packages/thinhnx/tabler/libs/ckeditor4/ckeditor.js')
            );

            $result .= sprintf(
                '<script src="%s"></script>' . PHP_EOL,
                asset('/packages/thinhnx/tabler/libs/ckeditor4/ckeditor-init.js')
            );

            return $result;
        });

        Blade::directive('dropzone', function () {
            $result = '<!-- Dropzone -->' . PHP_EOL;
            $result .= sprintf(
                '<link rel="stylesheet" href="%s"/>' . PHP_EOL,
                asset(
                    '/packages/thinhnx/tabler/libs/dropzone/dist/dropzone.css'
                )
            );
            $result .= sprintf(
                '<script src="%s"></script>' . PHP_EOL,
                asset('/packages/thinhnx/tabler/libs/dropzone/dist/dropzone-min.js')
            );

            return $result;
        });
    }
}

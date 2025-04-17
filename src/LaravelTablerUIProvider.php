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
        $this->mergeConfigFrom(__DIR__ . '/../config/tabler.php', 'tabler');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', config('tabler.namespace'));
        $this->registerComponents();

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
                $fileDir = asset(config('tabler.assets_dir') . "/css/{$fileName}");
                $result  .= '<link rel="stylesheet" href="' . $fileDir . '"/>' . PHP_EOL;
            }

            $result .= '<script src="' . asset(config('tabler.assets_dir') . '/js/tabler.min.js') . '"></script>' . PHP_EOL;

            return $result;
        });

        Blade::directive('tomselect', function () {
            $result = '<link rel="stylesheet" href="' . asset(config('tabler.assets_dir') . '/libs/tom-select/dist/css/tom-select.bootstrap5.min.css') . '"/>' . PHP_EOL;
            $result .= '<script src="' . asset(
                config('tabler.assets_dir') . '/libs/tom-select/dist/js/tom-select.base.min.js'
            ) . '"></script>' . PHP_EOL;

            return $result;
        });

        Blade::directive('datatable', function (string $type) {
            switch (strtolower($type)) {
                case "'css'":
                    $fileNames = [
                        'dataTables.bootstrap5.min.css',
                        'buttons.bootstrap5.min.css',
                        'select.bootstrap5.min.css',
                        'searchBuilder.bootstrap5.min.css',
                        'fixedHeader.bootstrap5.min.css',
                        'dataTables.checkboxes.css'
                    ];

                    $result = '<!-- Datatable Stylesheets -->' . PHP_EOL;

                    foreach ($fileNames as $fileName) {
                        $fileDir = asset(config('tabler.assets_dir') . "/libs/datatables/css/{$fileName}");
                        $result  .= '<link rel="stylesheet" href="' . $fileDir . '"/>' . PHP_EOL;
                    }
                    break;
                case "'js'":
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

                    $result = '<!-- Datatable Scripts -->' . PHP_EOL;

                    foreach ($fileNames as $fileName) {
                        $fileDir = asset(config('tabler.assets_dir') . "/libs/datatables/js/{$fileName}");
                        $result  .= '<script src="' . $fileDir . '"></script>' . PHP_EOL;
                    }
                    break;

                default:
                    $result = null;
            }

            return $result;
        });

        Blade::directive('ckeditor4', function () {
            $result = '<link rel="stylesheet" href="' .
                asset(
                    config('tabler.assets_dir') .
                        '/libs/ckeditor4/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css'
                ) .
                '"/>' . PHP_EOL;
            $result .= '<script src="' . asset(
                config('tabler.assets_dir') . '/libs/ckeditor4/ckeditor.js'
            ) . '"></script>' . PHP_EOL;
            $result .= '<script src="' . asset(
                config('tabler.assets_dir') . '/libs/ckeditor4/ckeditor-init.js'
            ) . '"></script>' . PHP_EOL;

            return $result;
        });

        Blade::directive('dropzone', function () {
            $result = '<link rel="stylesheet" href="' .
                asset(config('tabler.assets_dir') . 'dropzone/dist/dropzone.css') . '"/>' . PHP_EOL;
            $result .= '<script src="' .
                asset(config('tabler.assets_dir') . 'dropzone/dist/dropzone-min.js') . '"></script>' . PHP_EOL;

            return $result;
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/tabler.php' => config_path('tabler.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('tabler'),
            ], 'assets');
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
}

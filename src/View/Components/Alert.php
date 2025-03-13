<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Lucifer\LaravelTablerUi\Enums\Theme;

class Alert extends Component
{
    public array $classes = ['alert'];

    public function __construct(
        public string|null $id = null,
        public string|null $title = null,
        public string|array|null $description = null,
        public string|null $theme = null,
        public bool $dismissible = false,
        public bool $important = false,
    ) {
        if (is_null($this->id)) {
            $this->id = 'alert_' . Str::random(8);
        }
    }

    public function render(): View
    {
        if ($this->important) {
            $this->classes[] = 'alert-important';
        }

        if (in_array($this->theme, Theme::values())) {
            $this->classes[] = 'alert-' . $this->theme;
        }

        if ($this->dismissible) {
            $this->classes[] = 'alert-dismissible';
        }

        return view(config('tabler.namespace') . '::components.alert');
    }
}

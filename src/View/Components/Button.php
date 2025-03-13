<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Lucifer\LaravelTablerUi\Enums\Theme;

class Button extends Component
{

    const VALID_STYLISHES = ['outline', 'ghost'];

    public function __construct(
        public bool $anchor = false,
        public string|null $id = null,
        public string|null $theme = null,
        public bool $square = false,
        public bool $pill = false,
        public string|null $stylish = null,
        public string|null $size = null,
        public array|string|null $classes = null,
    ) {
        if (is_null($this->id)) {
            $this->id = 'button_' . Str::random(8);
        }
    }

    public function render(): View
    {
        $this->classes = ['btn'];

        if (in_array($this->theme, Theme::values())) {
            if (in_array($this->stylish, self::VALID_STYLISHES)) {
                $this->classes[] = 'btn-' . $this->stylish . '-' . $this->theme;
            } else {
                $this->classes[] = 'btn-' . $this->theme;
            }
        }

        if ($this->square) {
            $this->classes[] = 'btn-square';
        }

        if ($this->pill) {
            $this->classes[] = 'btn-pill';
        }

        if (! is_null($this->size)) {
            switch ($this->size) {
                case 'small':
                    $this->classes[] = 'btn-sm';
                    break;
                case 'large':
                    $this->classes[] = 'btn-lg';
                    break;
            }
        }

        return view(config('tabler.namespace') . '::components.button');
    }
}

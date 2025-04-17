<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Thinhnx\LaravelTablerUI\Enums\Theme;

class Badge extends Component
{
    public array $classes = ['badge'];

    public function __construct(
        public string|null $theme = null,
        public bool $outline = false,
        public string|null $size = null,
        public bool $iconOnly = false,
        public bool $notification = false,
        public bool $dot = false,
        public bool $blink = false,
    ) {
    }

    public function render(): View
    {
        if ($this->outline) {
            $this->classes[] = 'badge-outline';
        }

        if (in_array($this->theme, Theme::values())) {
            if ($this->outline) {
                $this->classes[] = 'text-' . $this->theme;
            } else {
                $this->classes[] = 'bg-' . $this->theme;
                $this->classes[] = 'text-' . $this->theme . '-fg';
            }
        }

        if (! is_null($this->size)) {
            switch ($this->size) {
                case 'small':
                    $this->classes[] = 'badge-sm';
                    break;
                case 'large':
                    $this->classes[] = 'badge-lg';
                    break;
            }
        }

        if ($this->iconOnly) {
            $this->classes[] = 'badge-icononly';
        }

        if ($this->notification) {
            $this->classes[] = 'badge-notification';
        }

        if ($this->dot) {
            $this->classes[] = 'badge-dot';
        }

        if ($this->blink) {
            $this->classes[] = 'badge-blink';
        }

        return view('tabler::components.badge');
    }
}

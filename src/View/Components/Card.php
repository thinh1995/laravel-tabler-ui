<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Thinhnx\LaravelTablerUI\Enums\Theme;

class Card extends Component
{
    public array $classes = ['card'];

    public array $headerClasses = ['card-header'];

    public array $footerClasses = ['card-footer'];

    public function __construct(
        public string|null $theme = null,
        public bool $borderless = false,
        public bool $headerLight = false,
        public bool $footerTransparent = false,
        public bool $hover = false,
        public bool $active = false,
        public bool $light = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        if ($this->headerLight) {
            $this->headerClasses[] = 'card-header-light';
        }

        if ($this->borderless) {
            $this->classes[] = 'card-borderless';
        }

        if ($this->footerTransparent) {
            $this->footerClasses[] = 'card-footer-transparent';
        }

        if ($this->hover) {
            $this->classes[] = 'card-link';
        }

        if ($this->active) {
            $this->classes[] = 'card-active';
        }

        if (in_array($this->theme, Theme::values())) {
            if ($this->light) {
                $this->classes[] = 'bg-' . $this->theme . '-lt';
            } else {
                $this->classes[] = 'bg-' . $this->theme;
                $this->classes[] = 'text-' . $this->theme . '-fg';
            }
        }

        return view(config('tabler.namespace') . '::components.card');
    }
}

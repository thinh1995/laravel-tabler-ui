<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Accordion extends Component
{
    public array $classes = ['accordion'];

    public function __construct(
        public string|null $id = null,
        public array $items = [],
        public bool $flush = false,
        public bool $tabs = false,
        public bool $inverted = false,
        public bool $iconPlus = false,
        public int|null $activeIndex = null
    ) {
        if (is_null($this->id)) {
            $this->id = 'accordion_' . Str::random(8);
        }

        if (! is_null($this->activeIndex)) {
            $this->activeIndex = (int)$this->activeIndex;
        }
    }

    public function render(): View
    {
        if ($this->flush) {
            $this->classes[] = 'accordion-flush';
        }

        if ($this->tabs) {
            $this->classes[] = 'accordion-tabs';
        }

        if ($this->inverted) {
            $this->classes[] = 'accordion-inverted';
        }

        if ($this->iconPlus) {
            $this->classes[] = 'accordion-plus';
        }

        return view(config('tabler.namespace') . '::components.accordion');
    }
}

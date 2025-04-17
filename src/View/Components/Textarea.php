<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Textarea extends Component
{
    public array $classes = ['form-control'];

    public bool $invalid = false;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string|null $id = null,
        public string $stylish = 'normal',
        public bool $rounded = false,
        public bool $flush = false,
    ) {
        if (is_null($this->id)) {
            $this->id = 'textarea_' . Str::random(8);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        switch ($this->stylish) {
            case 'rounded':
                $this->classes[] = 'form-control-rounded';
                break;
            case 'flush':
                $this->classes[] = 'form-control-flush';
        }

        return view(config('tabler.namespace') . '::components.textarea');
    }

    public function isRounded(): bool
    {
        return strtolower($this->stylish) === 'rounded';
    }

    public function isFlush(): bool
    {
        return strtolower($this->stylish) === 'flush';
    }
}

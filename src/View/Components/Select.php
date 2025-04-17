<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Select extends Component
{
    public array $classes = ['form-control', 'form-select'];

    public bool $invalid = false;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string|null $id = null,
        public string $stylish = 'normal',
    ) {
        if (is_null($this->id)) {
            $this->id = 'select_' . Str::random(8);
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

        return view(config('tabler.namespace') . '::components.select');
    }

    public function isFloat(): bool
    {
        return strtolower($this->stylish) === 'float';
    }
}

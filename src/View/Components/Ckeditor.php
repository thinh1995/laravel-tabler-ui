<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Ckeditor extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string|null $id = null,
        public string|null $value = null,
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
        return view('tabler::components.ckeditor');
    }
}

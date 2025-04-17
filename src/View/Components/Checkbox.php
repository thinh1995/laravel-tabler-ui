<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public function __construct(
        public string|null $id = null,
    ) {
        if (is_null($this->id)) {
            $this->id = 'input_' . Str::random(8);
        }
    }

    public function render(): View
    {
        return view('tabler::components.checkbox');
    }
}

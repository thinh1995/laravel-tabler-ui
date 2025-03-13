<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Toggle extends Component
{
    public function __construct(
        public string|null $id = null
    ) {
        if (is_null($this->id)) {
            $this->id = 'input_' . Str::random(8);
        }
    }

    public function render(): View
    {
        return view(config('tabler.namespace') . '::components.toggle');
    }
}

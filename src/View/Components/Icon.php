<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public function __construct(
        public string $stylish = 'normal'
    ) {
    }

    public function render(): View
    {
        return view('tabler::components.icon');
    }
}

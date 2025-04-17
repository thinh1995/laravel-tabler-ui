<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Page extends Component
{
    public function render(): View
    {
        return view('tabler::components.page');
    }
}

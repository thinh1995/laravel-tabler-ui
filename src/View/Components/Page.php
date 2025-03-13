<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Page extends Component
{
    public function render(): View
    {
        return view(config('tabler.namespace') . '::components.page');
    }
}

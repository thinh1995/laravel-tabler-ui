<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\View\Components\Tab;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pane extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tabler::components.tab.pane');
    }
}

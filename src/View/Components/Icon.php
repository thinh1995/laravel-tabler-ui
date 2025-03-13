<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public string $dir = '';

    public function __construct(
        public string $stylish = 'normal'
    ) {
    }

    public function render(): View
    {
        $this->dir = config('tabler.assets_dir') . '/icons/';

        return view(config('tabler.namespace') . '::components.icon');
    }
}

<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Symfony\Component\Finder\SplFileInfo;

class Dropzone extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array|SplFileInfo|null $files = [],
        public string|null $key = null,
    ) {
        $this->key = Str::random(8);

        if ($this->files instanceof SplFileInfo) {
            $this->files = [$this->files];
        }
    }

    public function getUploadInputName(): string
    {
        return 'uploaded_' . $this->name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view(config('tabler.namespace') . '::components.dropzone');
    }
}
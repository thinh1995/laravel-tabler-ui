<?php

namespace Lucifer\LaravelTablerUi\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Tomselect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public array $options = [],
        public string|null $placeholder = null,
        public string $valueField = 'value',
        public string $textField = 'text',
        public $selected = null,
        public string|null $label = null,
        public bool $isRequired = false,
        public bool $hasEmptyValue = false,
        public bool $hasImage = false,
        public string $imageField = 'image',
        public string $onItemAdd = '',
        public string|null $remoteUrl = null,
        public bool $create = false,
        public string|null $id = null,
        public bool $multiple = false,
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
        return view(config('tabler.namespace') . '::components.tomselect');
    }
}
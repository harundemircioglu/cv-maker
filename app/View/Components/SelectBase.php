<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectBase extends Component
{
    /**
     * Create a new component instance.
     */

    protected $id;
    protected $name;
    protected $label;
    protected $options;

    public function __construct($id = null, $name = null, $label = null, $options = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-base', [
            'id' => $this->id,
            'name' => $this->name,
            'label' => $this->label,
            'options' => $this->options,
        ]);
    }
}

<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxBase extends Component
{
    /**
     * Create a new component instance.
     */

    protected $id;
    protected $name;
    protected $value;
    protected $label;

    public function __construct($id = null, $name = null, $value = null, $label = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox-base', [
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
            'label' => $this->label,
        ]);
    }
}

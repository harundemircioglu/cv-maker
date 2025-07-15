<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputBase extends Component
{
    /**
     * Create a new component instance.
     */
    protected $type;
    protected $id;
    protected $name;
    protected $value;
    protected $label;
    protected $required;
    protected $placeholder;

    public function __construct($type = "text", $id = null, $name = null, $value = null, $label = null, $required = false, $placeholder = null)
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->required = $required;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-base', [
            'type' => $this->type,
            'id' => $this->id,
            'name' => $this->name,
            'value' => $this->value,
            'label' => $this->label,
            'required' => $this->required,
            'placeholder' => $this->placeholder,
        ]);
    }
}

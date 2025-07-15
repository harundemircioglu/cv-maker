<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonBase extends Component
{
    /**
     * Create a new component instance.
     */

    protected $id;
    protected $value;
    protected $name;
    protected $type;
    protected $color;
    protected $text;
    protected $svg;

    public function __construct($id = null, $value = null, $name = null, $type = "button", $color = "blue", $text = "Button", $svg = null)
    {
        $this->id = $id;
        $this->value = $value;
        $this->name = $name;
        $this->type = $type;
        $this->color = $color;
        $this->text = $text;
        $this->svg = $svg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-base', [
            'id' => $this->id,
            'value' => $this->value,
            'name' => $this->name,
            'type' => $this->type,
            'color' => $this->color,
            'text' => $this->text,
            'svg' => $this->svg,
        ]);
    }
}

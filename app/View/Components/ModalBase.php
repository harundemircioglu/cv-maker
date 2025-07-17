<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalBase extends Component
{
    /**
     * Create a new component instance.
     */

    protected $id;
    protected $toggleText;
    protected $modalHeader;
    protected $modalBody;
    protected $formAction;
    protected $formMethod;
    protected $formBtn;

    public function __construct($id, $toggleText, $modalHeader = null, $formAction = null, $formMethod = "POST", $modalBody = null, $formBtn = null)
    {
        $this->id = $id;
        $this->toggleText = $toggleText;
        $this->modalHeader = $modalHeader;
        $this->modalBody = $modalBody;
        $this->formAction = $formAction;
        $this->formMethod = $formMethod;
        $this->formBtn = $formBtn;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-base', [
            'id' => $this->id,
            'toggleText' => $this->toggleText,
            'modalHeader' => $this->modalHeader,
            'formAction' => $this->formAction,
            'formMethod' => $this->formMethod,
            'modalBody' => $this->modalBody,
            'formBtn' => $this->formBtn,
        ]);
    }
}

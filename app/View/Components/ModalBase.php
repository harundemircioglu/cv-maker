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

    protected $toggleText;
    protected $id;
    protected $dataModalTarget;
    protected $dataModalToggle;
    protected $modalHeader;
    protected $modalBody;
    protected $formAction;
    protected $formMethod;

    public function __construct($toggleText, $id, $dataModalTarget, $dataModalToggle, $modalHeader = null, $formAction = null, $formMethod = null, $modalBody = null)
    {
        $this->toggleText = $toggleText;
        $this->id = $id;
        $this->dataModalTarget = $dataModalTarget;
        $this->dataModalToggle = $dataModalToggle;
        $this->modalHeader = $modalHeader;
        $this->modalBody = $modalBody;
        $this->formAction = $formAction;
        $this->formMethod = $formMethod;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-base', [
            'toggleText' => $this->toggleText,
            'id' => $this->id,
            'dataModalTarget' => $this->dataModalTarget,
            'dataModalToggle' => $this->dataModalToggle,
            'modalHeader' => $this->modalHeader,
            'formAction' => $this->formAction,
            'formMethod' => $this->formMethod,
            'modalBody' => $this->modalBody,
        ]);
    }
}

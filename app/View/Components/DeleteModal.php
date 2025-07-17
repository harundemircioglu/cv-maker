<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     */

    protected $id;
    protected $formAction;
    protected $formMethod;
    protected $msgQuestion;
    protected $msgApprove;
    protected $msgCancel;

    public function __construct($id, $formAction = null, $formMethod = "POST", $msgQuestion = "Silme işlemini onaylıyor musunuz?", $msgApprove = "Evet", $msgCancel = "Hayır")
    {
        $this->id = $id;
        $this->formAction = $formAction;
        $this->formMethod = $formMethod;
        $this->msgQuestion = $msgQuestion;
        $this->msgApprove = $msgApprove;
        $this->msgCancel = $msgCancel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-modal', [
            'id' => $this->id,
            'formAction' => $this->formAction,
            'formMethod' => $this->formMethod,
            'msgQuestion' => $this->msgQuestion,
            'msgApprove' => $this->msgApprove,
            'msgCancel' => $this->msgCancel,
        ]);
    }
}

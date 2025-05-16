<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Popup extends Component
{
    public $id;

    public $title;

    public $message;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $title = 'Uyarı', $message = 'Bu işlem geri alınamaz. Emin misiniz?')
    {
        $this->id = $id;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popup');
    }
}

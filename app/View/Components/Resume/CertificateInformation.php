<?php

namespace App\View\Components\Resume;

use App\Models\Resume;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CertificateInformation extends Component
{
    /**
     * Create a new component instance.
     */

    protected $resume;

    public function __construct(Resume $resume)
    {
        $this->resume = $resume;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.resume.certificate-information', [
            'resume' => $this->resume,
        ]);
    }
}

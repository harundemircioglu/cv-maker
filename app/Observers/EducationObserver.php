<?php

namespace App\Observers;

use App\TracksUsagePresence;

class EducationObserver
{
    use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('educations');
    }
}

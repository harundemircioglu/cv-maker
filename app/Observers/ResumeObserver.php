<?php

namespace App\Observers;

use App\TracksUsagePresence;

class ResumeObserver
{
    use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('cv_downloads');
    }
}

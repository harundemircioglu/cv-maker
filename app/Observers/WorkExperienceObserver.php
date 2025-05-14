<?php

namespace App\Observers;

use App\TracksUsagePresence;

class WorkExperienceObserver
{
    use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('work_experiences');
    }
}

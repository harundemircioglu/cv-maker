<?php

namespace App\Observers;

use App\TracksUsagePresence;

class ProjectObserver
{
    use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('projects');
    }
}

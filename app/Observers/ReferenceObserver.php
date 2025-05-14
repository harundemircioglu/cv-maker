<?php

namespace App\Observers;

use App\TracksUsagePresence;

class ReferenceObserver
{
    use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('references');
    }
}

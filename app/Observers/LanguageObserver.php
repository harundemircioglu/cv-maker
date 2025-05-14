<?php

namespace App\Observers;

use App\TracksUsagePresence;

class LanguageObserver
{
    use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('languages');
    }
}

<?php

namespace App\Observers;

use App\TracksUsagePresence;

class CertificateObserver
{
     use TracksUsagePresence;

    public function created()
    {
        $this->markUsagePresence('certificates');
    }
}

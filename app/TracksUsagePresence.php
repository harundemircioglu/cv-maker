<?php

namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait TracksUsagePresence
{
    public function markUsagePresence(string $column)
    {
        $userId = Auth::id();

        if (!$userId) {
            return;
        }

        $user = User::with('planUsages')->find($userId);

        if (!$user || !$user->planUsages) {
            return;
        }

        $user->planUsages->increment($column);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    // payment_temr => 1:monthly, 2:yearly

    protected $guarded = [];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

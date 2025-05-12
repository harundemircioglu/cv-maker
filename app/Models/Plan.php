<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // plan_type => 1:Premium, 2:Free

    public function features()
    {
        return $this->hasMany(PlanFeature::class, 'plan_id', 'id');
    }
}

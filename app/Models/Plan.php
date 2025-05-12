<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // plan_type => 1:Super, 2:Premium, 3:Free

    public function features()
    {
        return $this->hasMany(PlanFeature::class, 'plan_id', 'id');
    }
}

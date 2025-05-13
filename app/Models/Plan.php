<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // plan_type => 1:Premium, 2:Free

    protected $guarded = [];

    public function features()
    {
        return $this->hasOne(PlanFeature::class, 'plan_id', 'id');
    }
}

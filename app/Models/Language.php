<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}

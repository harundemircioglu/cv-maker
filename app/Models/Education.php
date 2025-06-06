<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = "education";
    protected $guarded = [];

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'resume_id', 'id');
    }
}

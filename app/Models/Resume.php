<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'resume_id', 'id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'resume_id', 'id');
    }

    public function languages()
    {
        return $this->hasMany(Language::class, 'resume_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'resume_id', 'id');
    }

    public function references()
    {
        return $this->hasMany(Reference::class, 'resume_id', 'id');
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class, 'resume_id', 'id');
    }
}

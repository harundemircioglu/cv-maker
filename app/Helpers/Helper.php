<?php

use App\Models\User;
use Illuminate\Support\Str;

if (!function_exists('makeSlug')) {
    function makeSlug($data)
    {
        return Str::slug($data, '-');
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file)
    {
        $path = $file->storeAs('uploads', $file->hashName(), 'public');
        return $path;
    }
}

if (!function_exists('checkLimit')) {
    function checkLimit(string $usage)
    {
        $approvedUsages = [
            'cv_downloads',
            'work_experiences',
            'educations',
            'certificates',
            'languages',
            'references',
            'projects',
        ];

        $user = auth()->user()->load(['plan.plan.features', 'planUsages']);

        if (!in_array($usage, $approvedUsages)) {
            return false;
        }

        $data = [
            'usage' => $user->planUsages->$usage,
            'limit' => $user->plan->plan->features->{'max_' . $usage},
        ];

        if ($data['usage'] < $data['limit']) {
            return true;
        }

        return false;
    }
}

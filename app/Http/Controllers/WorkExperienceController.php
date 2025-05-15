<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkExperience\StoreWorkExperienceRequest;
use App\Http\Requests\WorkExperience\UpdateWorkExperienceRequest;
use App\Models\Resume;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkExperienceController extends Controller
{
    public function store(StoreWorkExperienceRequest $request, $resumeId)
    {
        try {
            DB::transaction(function () use ($request, $resumeId) {
                $resume = Resume::findOrFail($resumeId);
                $resume->workExperiences()->create($request->validated());
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(UpdateWorkExperienceRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $workExperience = WorkExperience::findOrFail($id);
                $workExperience->update($request->validated());
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            WorkExperience::findOrFail($id)->delete();

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

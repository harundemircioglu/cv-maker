<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkExperience\StoreWorkExperienceRequest;
use App\Http\Requests\WorkExperience\UpdateWorkExperienceRequest;
use App\Models\Resume;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkExperienceController extends Controller
{
    public function store(StoreWorkExperienceRequest $request, $resumeId)
    {
        try {
            DB::transaction(function () use ($request, $resumeId) {
                $resume = Resume::findOrFail($resumeId);
                $data = $request->validated();
                $data['resume_id'] = $resume->id;
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $data['tasks'] = json_encode($data['tasks']);
                $resume->workExperiences()->create($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function update(UpdateWorkExperienceRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $workExperience = WorkExperience::findOrFail($id);
                $data = $request->validated();
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $data['tasks'] = json_encode($data['tasks']);
                $workExperience->update($data);
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

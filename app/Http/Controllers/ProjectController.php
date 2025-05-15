<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Resume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function store(StoreProjectRequest $request, $resumeId)
    {
        try {
            DB::transaction(function () use ($request, $resumeId) {
                $resume = Resume::findOrFail($resumeId);
                $data = $request->validated();
                $data['resume_id'] = $resume->id;
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $resume->projects()->create($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $project = Project::findOrFail($id);
                $data = $request->validated();
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $project->update($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            Project::findOrFail($id)->delete();

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

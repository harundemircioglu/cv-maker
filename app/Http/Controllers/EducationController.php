<?php

namespace App\Http\Controllers;

use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Models\Education;
use App\Models\Resume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    public function store(StoreEducationRequest $request, $resumeId)
    {
        try {
            DB::transaction(function () use ($request, $resumeId) {
                $resume = Resume::findOrFail($resumeId);
                $data = $request->validated();
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $data['projects'] = json_encode($data['projects']);
                $resume->educations()->create($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function update(UpdateEducationRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $education = Education::findOrFail($id);
                $data = $request->validated();
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $data['projects'] = json_encode($data['projects']);
                $education->update($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            Education::findOrFail($id)->delete();

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

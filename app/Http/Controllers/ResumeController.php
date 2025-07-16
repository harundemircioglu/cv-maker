<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resume\StoreResumeRequest;
use App\Http\Requests\Resume\UpdateResumeRequest;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    public function find($id)
    {
        try {
            $resume = Resume::with([
                'user',
                'certificates' => function ($query) {
                    $query->orderBy('start_date');
                },
                'educations' => function ($query) {
                    $query->orderBy('start_date');
                },
                'languages',
                'projects' => function ($query) {
                    $query->orderByDesc('start_date');
                },
                'references',
                'workExperiences' => function ($query) {
                    $query->orderBy('start_date');
                },
            ])->findOrFail($id);

            return view('resume.index', compact('resume'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(StoreResumeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $user = Auth::user();
                $data = $request->validated();
                $data['profile_image'] = uploadFile($data['profile_image']);
                $user->resumes()->create($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(UpdateResumeRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $data = $request->validated();
                $data['profile_image'] = uploadFile($data['profile_image']);
                Resume::findOrFail($id)->update($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            Resume::findOrFail($id)->delete();

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

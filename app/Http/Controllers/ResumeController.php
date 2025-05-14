<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resume\StoreResumeRequest;
use App\Http\Requests\Resume\UpdateResumeRequest;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    public function store(StoreResumeRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                Resume::create($request->validated());
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
                Resume::findOrFail($id)->update($request->validated());
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

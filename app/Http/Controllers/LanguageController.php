<?php

namespace App\Http\Controllers;

use App\Http\Requests\Education\StoreLanguageRequest;
use App\Http\Requests\Education\UpdateLanguageRequest;
use App\Models\Language;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    public function store(StoreLanguageRequest $request, $resumeId)
    {
        try {
            DB::transaction(function () use ($request, $resumeId) {
                $resume = Resume::findOrFail($resumeId);
                $resume->languages()->create($request->validated());
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(UpdateLanguageRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $language = Language::findOrFail($id);
                $language->update($request->validated());
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            Language::findOrFail($id)->delete();

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

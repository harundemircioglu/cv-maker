<?php

namespace App\Http\Controllers;

use App\Http\Requests\Certificate\StoreCertificateRequest;
use App\Http\Requests\Certificate\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\Resume;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function store(StoreCertificateRequest $request, $resumeId)
    {
        try {
            DB::transaction(function () use ($request, $resumeId) {
                $resume = Resume::findOrFail($resumeId);
                $data = $request->validated();
                $data['resume_id'] = $resume->id;
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $resume->certificates()->create($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function update(UpdateCertificateRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $certificate = Certificate::findOrFail($id);
                $data = $request->validated();
                $data['start_date'] = Carbon::parse($data['start_date'])->format('Y-m-d');
                $data['end_date'] = Carbon::parse($data['end_date'])->format('Y-m-d');
                $certificate->update($data);
            });

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            Certificate::findOrFail($id)->delete();

            return back()->with("success", "Success");
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

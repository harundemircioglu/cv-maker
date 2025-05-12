<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plan\StorePlanFeatureRequest;
use App\Http\Requests\Plan\UpdatePlanFeatureRequest;
use App\Models\PlanFeature;
use Illuminate\Http\Request;

class PlanFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planFeatures = PlanFeature::where('status', 1)->with(['plan'])->get();

        return view('plan.planFeature.index', compact('planFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanFeatureRequest $request)
    {
        $planIds = $request->plan_ids;

        foreach ($planIds as $planId) {
            PlanFeature::create([
                'plan_id' => $planId,
                'key' => $request->key,
                'key_slug' => makeSlug($request->key),
                'value' => $request->value,
            ]);
        }

        return back()->with(['success' => 'Success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanFeatureRequest $request, string $id)
    {
        $planIds = $request->plan_ids;

        foreach ($planIds as $planId) {
            PlanFeature::update([
                'plan_id' => $planId,
                'key' => $request->key,
                'key_slug' => makeSlug($request->key),
                'value' => $request->value,
            ]);
        }

        return back()->with(['success' => 'Success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $planFeature = PlanFeature::find($id);

        if (!$planFeature) {
            return back()->with(['error' => 'Error']);
        }

        $planFeature->delete();

        return back()->with(['success' => 'Success']);
    }
}

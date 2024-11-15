<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Traits\FlashMessages;
use App\DataTables\PlanDataTable;
use App\Http\Requests\Plan\StoreRequest;
use App\Http\Requests\Plan\UpdateRequest;

class PlanController extends Controller
{
    use FlashMessages;
    /**
     * Display a listing of the resource.
     */
    public function index(PlanDataTable $planDataTable)
    {
        return $planDataTable->render('plan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        try {
            Plan::create($validated);
            $this->successMessage(__('messages.crud.created',['attribute' => __('labels.plan')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $data = Plan::findOrFail($id);
        return view('plan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $validated = $request->validated();
        $plan = Plan::findOrFail($id);
        try {
            $plan->update($validated);
            $this->successMessage(__('messages.crud.updated',['attribute' => __('labels.plan')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $plan = Plan::findOrFail($id);
        try {
            $plan->delete();
            $this->successMessage(__('messages.crud.deleted',['attribute' => __('labels.plan')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();
    }
}

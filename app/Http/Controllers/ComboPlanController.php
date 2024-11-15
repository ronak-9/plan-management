<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\ComboPlan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Traits\FlashMessages;
use Illuminate\Support\Facades\DB;
use App\DataTables\ComboPlanDataTable;
use App\Http\Requests\ComboPlan\StoreRequest;
use App\Http\Requests\ComboPlan\UpdateRequest;

class ComboPlanController extends Controller
{
    use FlashMessages;
    /**
     * Display a listing of the resource.
     */
    public function index(ComboPlanDataTable $comboPlanDataTable)
    {
        return $comboPlanDataTable->render('comboplan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = Plan::select('id','name')->get();
        return view('comboplan.create',compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $plans = Arr::pull($validated,'plans');
        try {
            DB::beginTransaction();
            $comboPlan = ComboPlan::create($validated);
            $comboPlan->plans()->sync($plans);
            DB::commit();
            $this->successMessage(__('messages.crud.created',['attribute' => __('labels.comboPlan')]));
        } catch (\Throwable $th) {
            DB::rollBack();
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
        $plans = Plan::select('id','name')->get();
        $data = ComboPlan::with(['plans:id'])->findOrFail($id);
        $selectedPlan = $data->plans->pluck('id')->toArray();
        return view('comboplan.edit', compact('plans','selectedPlan','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $validated = $request->validated();
        $comboPlan = ComboPlan::findOrFail($id);
        $plans = Arr::pull($validated,'plans');
        try {
            DB::beginTransaction();
            $comboPlan->update($validated);
            $comboPlan->plans()->sync($plans);
            DB::commit();
            $this->successMessage(__('messages.crud.updated',['attribute' => __('labels.comboPlan')]));
        } catch (\Throwable $th) {
            DB::rollBack();
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
        $comboPlan = ComboPlan::findOrFail($id);
        try {
            $comboPlan->delete();
            $this->successMessage(__('messages.crud.deleted',['attribute' => __('labels.comboPlan')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();
    }

}

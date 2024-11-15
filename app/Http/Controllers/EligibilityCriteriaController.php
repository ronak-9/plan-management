<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessages;
use App\Models\EligibilityCriteria;
use App\DataTables\EligibilityCriteriaDataTable;
use App\Http\Requests\EligibilityCriteria\StoreRequest;
use App\Http\Requests\EligibilityCriteria\UpdateRequest;

class EligibilityCriteriaController extends Controller
{
    use FlashMessages;
    /**
     * Display a listing of the resource.
     */
    public function index(EligibilityCriteriaDataTable $eligibilityCriteriaDataTable)
    {
        return $eligibilityCriteriaDataTable->render('eligibilityCriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eligibilityCriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        try {
            EligibilityCriteria::create($validated);
            $this->successMessage(__('messages.crud.created',['attribute' => __('labels.eligibilityCriteria')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = EligibilityCriteria::findOrFail($id);
        return view('eligibilityCriteria.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $eligibilityCriteria = EligibilityCriteria::findOrFail($id);
        try {
            $eligibilityCriteria->update($validated);
            $this->successMessage(__('messages.crud.updated',['attribute' => __('labels.eligibilityCriteria')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eligibilityCriteria = EligibilityCriteria::findOrFail($id);
        try {
            $eligibilityCriteria->delete();
            $this->successMessage(__('messages.crud.deleted',['attribute' => __('labels.eligibilityCriteria')]));
        } catch (\Throwable $th) {
            info($th->getMessage());
            $this->serverErrorMessage();
        }
        return back();
    }
}

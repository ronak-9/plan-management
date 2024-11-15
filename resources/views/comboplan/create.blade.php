@extends('layouts.master')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('labels.comboPlan') }} /</span>
        {{ __('labels.create') }}</h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">{{ __('labels.create') }}</h5>
                <div class="card-body">
                    <form id="create-form" method="POST" action="{{ route('combo.plan.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.form.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.form.price') }}</label>
                            <input type="text" class="form-control" id="name" name="price"
                                value="{{ old('price') }}">
                        </div>

                        <div class="mb-3">
                            <label for="parent_id" class="form-label">{{ __('labels.form.plan') }}</label>
                            <select class="form-control" id="plan" name="plans[]" multiple>
                                @forelse ($plans as $plan)
                                    <option value="{{ $plan->id }}">
                                        {{ $plan->name }}
                                    </option>
                                @empty
                                    <option>{{ __('messages.select.option.empty') }}</option>
                                @endforelse
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('buttons.submit') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('buttons.reset') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


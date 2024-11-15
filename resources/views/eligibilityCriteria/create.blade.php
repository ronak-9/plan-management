@extends('layouts.master')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('labels.eligibilityCriteria') }} /</span>
        {{ __('labels.create') }}</h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">{{ __('labels.create') }}</h5>
                <div class="card-body">
                    <form id="create-form" method="POST" action="{{ route('eligibility.criteria.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.form.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="age_less_than" class="form-label">{{ __('labels.form.age_less_than') }}</label>
                            <input type="number" class="form-control" id="age_less_than" name="age_less_than"
                                value="{{ old('age_less_than') }}">
                        </div>

                        <div class="mb-3">
                            <label for="age_greater_than"
                                class="form-label">{{ __('labels.form.age_greater_than') }}</label>
                            <input type="number" class="form-control" id="age_greater_than" name="age_greater_than"
                                value="{{ old('age_greater_than') }}">
                        </div>

                        <div class="mb-3">
                            <label for="last_login_days_ago"
                                class="form-label">{{ __('labels.form.last_login_days_ago') }}</label>
                            <input type="number" class="form-control" id="last_login_days_ago" name="last_login_days_ago"
                                value="{{ old('last_login_days_ago') }}">
                        </div>

                        <div class="mb-3">
                            <label for="income_less_than"
                                class="form-label">{{ __('labels.form.income_less_than') }}</label>
                            <input type="number" step="0.01" class="form-control" id="income_less_than"
                                name="income_less_than" value="{{ old('income_less_than') }}">
                        </div>

                        <div class="mb-3">
                            <label for="income_greater_than"
                                class="form-label">{{ __('labels.form.income_greater_than') }}</label>
                            <input type="number" step="0.01" class="form-control" id="income_greater_than"
                                name="income_greater_than" value="{{ old('income_greater_than') }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">{{ __('buttons.submit') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('buttons.reset') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

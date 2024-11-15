@extends('layouts.master')
@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('labels.plan') }} /</span>
        {{ __('labels.edit') }}</h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">{{ __('labels.edit') }}</h5>
                <div class="card-body">
                    <form id="edit-form" method="POST" action="{{ route('plan.update',$data['id']) }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('labels.form.name') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $data['name'] }}">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">{{ __('labels.form.price') }}</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ old('price') ?? $data['price'] }}">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('buttons.submit') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('buttons.reset') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


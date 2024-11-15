@extends('layouts.master')
@section('pageCSS')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.dataTables.min.css') }}">
    <style>
        .pbrl-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
            padding-bottom: 1.5rem !important;

        }
    </style>
@endsection
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{ __('labels.product') }} /</span>
        {{ __('labels.manage') }}</h4>
    <div class="card">
        <h5 class="card-header">{{__('labels.manage')}}</h5>
        <div class="table-responsive text-nowrap pbrl-4">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection
@section('pageJS')
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.min.js') }}"></script>

    {{ $dataTable->scripts() }}
@endsection

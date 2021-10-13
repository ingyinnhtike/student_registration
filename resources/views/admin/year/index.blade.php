@extends('admin.layouts.master')
@section('content')
    {!! $dataTable->table() !!}
@endsection
@include('admin.partials.delete')
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush


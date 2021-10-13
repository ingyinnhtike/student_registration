@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.permission.store')}}" method="POST">
        @include('admin.permission.form')
    </form>
@endsection

@push('scripts')

@endpush


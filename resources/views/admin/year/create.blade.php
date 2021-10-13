@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.year.store')}}" method="POST">
        @include('admin.year.form')
    </form>
@endsection

@push('scripts')

@endpush


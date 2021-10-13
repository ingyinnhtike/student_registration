@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.course.store')}}" method="POST">
        @include('admin.course.form')
    </form>
@endsection

@push('scripts')

@endpush


@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.major.store')}}" method="POST">
        @include('admin.major.form')
    </form>
@endsection

@push('scripts')

@endpush


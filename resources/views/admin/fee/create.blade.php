@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.fee.store')}}" method="POST">
        @include('admin.fee.form')
    </form>
@endsection

@push('scripts')

@endpush


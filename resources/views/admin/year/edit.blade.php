@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.year.update',$year->id)}}" method="POST">
        @method('PUT')
        @include('admin.year.form',['year'=>$year,'is_edit'=>true])
    </form>

@endsection

@push('scripts')

@endpush


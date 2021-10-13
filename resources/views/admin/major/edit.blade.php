@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.major.update',$major->id)}}" method="POST">
        @method('PUT')
        @include('admin.major.form',['major'=>$major,'is_edit'=>true])
    </form>

@endsection

@push('scripts')

@endpush


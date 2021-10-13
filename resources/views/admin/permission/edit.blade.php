@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.permission.update',$permission->id)}}" method="POST">
        @method('PUT')
        @include('admin.permission.form',['year'=>$permission,'is_edit'=>true])
    </form>

@endsection

@push('scripts')

@endpush


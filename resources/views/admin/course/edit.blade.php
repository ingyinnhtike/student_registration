@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.course.update',$course->id)}}" method="POST">
        @method('PUT')
        @include('admin.course.form',['course'=>$course,'is_edit'=>true])
    </form>
@endsection

@push('scripts')

@endpush


@extends('layouts.app')
@push('after_css')
    <style>
        .title{
            font-size: 16px;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="row pl-2 ml-2 pr-2 mr-2">
        @include('user.enrollment.include.show.informations')
        @include('user.enrollment.include.show.student',['student'=>$enrollment->student])
        {{--@include('user.enrollment.include.show.supporter',['supporter'=>$enrollment->student->supporters])--}}

        @include('user.enrollment.include.show.parent',[
        'detail'=>$enrollment->student->parentDetails->where('relation_to_user','father')->first(),
        'title'=>'Father'
        ])

        @include('user.enrollment.include.show.parent',[
        'detail'=>$enrollment->student->parentDetails->where('relation_to_user','mother')->first(),
        'title'=>'Mother'
        ])

        @include('user.enrollment.include.show.parent',[
        'detail'=>$enrollment->student->parentDetails->where('relation_to_user','!=','mother')->where('relation_to_user','!=','father')->first(),
        'title'=>'Other Guardian'
        ])
        {{--@include('user.enrollment.include.show.exam',['exams'=>$enrollment->student->exams])--}}
    </div>
@endsection

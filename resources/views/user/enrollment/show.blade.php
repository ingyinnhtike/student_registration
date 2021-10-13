@extends('layouts.material-app')

@push('after_css')
@endpush

@section('content')

    <div class="section section-tabs my-section">
        <div class="container">
            <div class="buttons">
                @if($form->approved_status===0 || config('site-setting.can_edit_after_approve',false))
                    @can('admin.enrollment.edit')
                        <a href="{{route('enroll.edit',['enroll'=>$form->id])}}"
                           class="btn btn-primary btn-blue col-md-3 m-1">Edit</a>
                    @endcan
                @endif
                @if($form->approved_status===0)
                    @can('admin.acceptance.approve')
                        <a onclick='confirmAccept(this)' class="btn btn-primary btn-blue col-md-3 m-1"
                           data-id='{{$form->id}}'>Approve</a>
                        @include('admin.partials.accepted',['url'=>route('admin.acceptance.approve')])
                    @endcan
                    @else
                        <a class="btn btn-primary btn-blue col-md-3 m-1 print-button" onclick='printDiv();'> <i class="fa fa-print"></i>&nbsp;&nbsp;Print</a>
                     @endif
            </div>
            <div class="row">
                @php($majors = get_config('form-setting.majors'))
                @php($student=$enrollment->student)
                @php($scholar=$student->scholarships)
                @php($detail= $student->studentDetails)
                @php($highSchool = $enrollment->student->highSchool)
                @php($highSchoolData = $highSchool->data)
                @php($exams=$student->examRecords)
                @php($father=$student->parentDetails->where('relation_to_user','father')->first())
                @php($mother=$student->parentDetails->where('relation_to_user','mother')->first())
                @php($adoptiveFather=$student->parentDetails->where('relation_to_user','adoptive father')->first())
                @php($adoptiveMother=$student->parentDetails->where('relation_to_user','adoptive mother')->first())
                @php($other=$student->parentDetails->whereNotIn('relation_to_user',['father','mother','adoptive father','adoptive mother'])
                                                    ->where('name_mm','!=',null)->first())
                @php($siblings=$student->siblings)

                @include('user.enrollment.include.show.informations',['majors'=>$majors,'scholar'=>$scholar])
                @include('user.enrollment.include.show.student',['student'=>$student,'detail'=>$detail])
                @if(get_config('form-setting.is_high_school_required'))
                    @include('user.enrollment.include.show.highschool',['student'=>$student,'highSchool'=>$highSchool,'highSchoolData'=>$highSchoolData])
                @endif

                @if(get_config('form-setting.is_exam_required'))
                    @include('user.enrollment.include.show.exam',['majors'=>$majors,'exams'=>$exams])
                @endif

                @include('user.enrollment.include.show.parent',[
                    'detail'=>$father,
                    'title'=>'Father'
                    ])
                @include('user.enrollment.include.show.parent',[
                    'detail'=>$mother,
                    'title'=>'Mother'
                    ])
                @if(get_config('form-setting.has_la_wa_ka'))

                    @include('user.enrollment.include.show.parent',[
                   'detail'=>$adoptiveFather,
                   'title'=>'Adoptive Father'
                   ])
                    @include('user.enrollment.include.show.parent',[
                   'detail'=>$adoptiveMother,
                   'title'=>'Adoptive Mother'
                   ])
                @endif

                @if(get_config('form-setting.is_siblings_required'))
                    @include('user.enrollment.include.show.siblings',['siblings'=>$siblings])
                @endif

                @if(get_config('form-setting.is_diploma'))
                @include('user.enrollment.include.show.parent',[
                    'detail'=>$other,
                    'title'=>'Other Guardian'
                    ])
                @endif

                @include('admin.print.print-screen')

            </div>
        </div>
    </div>

    {{--    <div class="row pl-2 ml-2 pr-2 mr-2">--}}

    {{--@include('user.enrollment.include.show.supporter',['supporter'=>$enrollment->student->supporters])--}}
    {{--@include('user.enrollment.include.show.exam',['exams'=>$enrollment->student->exams])--}}
    {{--    </div>--}}
@endsection

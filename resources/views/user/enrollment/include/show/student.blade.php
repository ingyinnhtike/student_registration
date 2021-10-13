<div class="col-md-4">
    <div class="card card-nav-tabs">
        <div class="card-header card-header-custom">
            <h4 class="card-title">Student Information</h4>
        </div>
        <div class="card-body detail-page">
            {{--            @if($enrollment->photo == 'default.jpg')--}}
            <img src="{{asset('storage/'.$enrollment->photo)}}" class="card-img-top img-fluid" alt="profile"
                 style="width: 50%;margin-left: 25%;">
            {{--                <img src="{{asset('storage/'.$enrollment->photo)}}" class="card-img-top col-md-3 " alt="profile">--}}
            {{--            @endif--}}
            <h5>Name(Myanmar)<span>:</span> {{$detail->name_mm??'-'}}</h5>
            <h5>Name(English)<span>:</span> {{$detail->name_eng??'-'}}</h5>
            <h5>University Registration No<span>:</span> {{$detail->university_roll_no??'-'}}</h5>
            <h5>University Start Year<span>:</span> {{$detail->university_start_year??'-'}}</h5>
            <h5>Race and Religion<span>:</span> {{$detail->race??'-'}}, {{$detail->religion??'-'}}</h5>
            @include('user.enrollment.partials.show_birth_place',['model'=>$detail])
            <h5>Date of Birth<span>:</span> {{$detail->dob}}</h5>
            <h5>NRC<span>:</span> {{$detail->nrc??'-'}}</h5>
            @if(get_config('form-setting.has_mme'))
            <h5>NRC2<span>:</span> {{$detail->nrc2??'-'}}</h5>
            @endif
            @if(get_config('form-setting.has_bloodtype'))
            <h5>Blood Type<span>:</span> {{$detail->blood_type??'-'}}</h5>
            @endif
            <h5>Gender<span>:</span> {{$detail->genderString??'-'}}</h5>
            @if(get_config('form-setting.is_student_work_required'))
                <h5>Work<span>:</span> {{$detail->data['work']??'-'}}</h5>
            @endif
            @if($detail->email != '')<h5>Email<span>:</span> <a
                    href="mailto:{{$detail->email??'-'}}">{{$detail->email??'-'}}</a></h5>@endif
            <h5>Permanent address<span>:</span> {{$detail->permanent_address??'-'}}</h5>
            <h5>Permanent phone<span>:</span> <a
                    href="tel:{{$detail->permanent_phone??'-'}}">{{$detail->permanent_phone??'-'}}</a></h5>
            <h5>Designation<span>:</span> {{$detail->designation??'-'}}</h5>
            <div class="progress progress-line-info">               <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                     aria-valuemax="100" style="width: 100%;">
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-nav-tabs">
        <div class="card-header card-header-custom">
            <h4 class="card-title">High School Information</h4>
        </div>
        <div class="card-body detail-page">
            <h5>Roll No<span>:</span> {{$highSchool->roll_no??'-'}}</h5>
            <h5>Year<span>:</span> {{$highSchool->year??'-'}}</h5>
            <h5>Location<span>:</span>{{$highSchool->exam_location??'-'}}</h5>
            @if(array_key_exists('mark',$highSchoolData))
                <div class="progress progress-line-info">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                         aria-valuemax="100" style="width: 100%;">
                        <span class="sr-only">100% Complete</span>
                    </div>
                </div>
                <h5>Marks</h5>
                @foreach($highSchoolData['mark'] as $mark)
                    <p>{{$mark['subject']}} - {{$mark['mark']}}</p>
                @endforeach
            @endif
            @if(array_key_exists('total_mark',$highSchoolData)) <h5>Total
                Mark<span>:</span>{{$highSchoolData['total_mark']??'-'}}</h5>@endif
            @if(array_key_exists('distinctions',$highSchoolData))<h5>
                Distinctions<span>:</span>{{$highSchoolData['distinctions']??'-'}}</h5>@endif
            <div class="progress progress-line-info">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                     aria-valuemax="100" style="width: 100%;">
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
        </div>
    </div>
</div>

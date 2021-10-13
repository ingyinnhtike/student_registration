

<div class="col-md-4">
    <div class="card card-nav-tabs">
        <div class="card-header card-header-custom">
            <h4 class="card-title">Course Information</h4>
        </div>
        <div class="card-body detail-page">
            <h5>Year<span>:</span> {{$enrollment->year}}</h5>
            @php($majors = get_config('form-setting.majors'))
            @if(is_array($enrollment->major))
                @foreach($enrollment->major as $major)
                    <h5>Major<span>:</span> {{$majors[$major]}}</h5>
                @endforeach
            @else
                <h5>Major<span>:</span> {{$enrollment->major}}</h5>
            @endif
            <h5>Roll No<span>:</span> {{$enrollment->roll_no}}</h5>
            <div class="progress progress-line-info">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                     aria-valuemax="100" style="width: 100%;">
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
            <h5>Stipend<span>:</span> {{$enrollment->stipend===1?'Applied':"No"}}</h5>
            <h5>Boudoir<span>:</span> {{$enrollment->boudoir ===1?'Applied':"No"}}</h5>
            <div class="progress progress-line-info">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                     aria-valuemax="100" style="width: 100%;">
                    <span class="sr-only">100% Complete</span>
                </div>
            </div>
            @if($scholar )
                <h4>Scholarship</h4>
                <h5>Name<span>:</span> {{$scholar->name}}</h5>
                <h5>Amount<span>:</span> {{$scholar->amount}}</h5>
                <h5>Organization<span>:</span> {{$scholar->organization}}</h5>
                <div class="progress progress-line-info">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                         aria-valuemax="100" style="width: 100%;">
                        <span class="sr-only">100% Complete</span>
                    </div>
                </div>
            @endif
            <h5>Current Address<span>:</span> {{$enrollment->current_address}}</h5>
            <h5>Current Phone<span>:</span> {{$enrollment->current_phone}}</h5>
            <h5>Submitted At<span>:</span> {{$form->created_at->diffForHumans()}}</h5>
        </div>
    </div>

</div>

<div class="col-md-4">
    <div class="card card-nav-tabs">
        <div class="card-header card-header-custom">
            <h4 class="card-title">Exam History</h4>
        </div>
        <div class="card-body detail-page">
            <div class="card-body">
                <h3 class="card-title">Exam History</h3>
                @foreach($exams as $key=>$exam)
                    @if($exam->major && $exam->year)
                        <p class="card-text">
                            <span class="title">{{$exam->examString}}</span>
                        </p>
                        <p class="card-text">
                            <span class="title">{{$exam->roll_no??'Not provided'}}</span>
                        </p>

                        <p class="card-text">
                        @if(is_array($exam->major))
                            <div>
                                @foreach($exam->major as $major)
                                    <strong>{{$majors[$major]}}</strong>
                                @endforeach
                            </div>
                        @else
                            <span>{{$majors[$exam->major]}}</span>
                        @endif

                        <span>{{$exam->year}}</span> |
                        <span class="danger">{{$exam->statusString}}</span>
                        @if(array_key_exists('failed_subjects',$exam->data))
                            <br>
                            <strong>Failed Subjects</strong>
                            <br>
                            @foreach($exam->data['failed_subjects'] as $failed_subject)
                                <span>{{$failed_subject}}</span>
                            @endforeach
                        @endif

                        <hr/>
                    @endif

                @endforeach

            </div>
        </div>
    </div>
</div>

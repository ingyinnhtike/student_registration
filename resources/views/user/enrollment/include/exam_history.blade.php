@php
    if($exams_history){
    $exams = $exams_history->where('exam',$key)->where('year','!==',null)->sortBy('year')->values();
    $exam1 = $exams->get(0);
    $exam2 = $exams->get(1);
    }
    $fail_years = [ 
        
        '2013-2014',
        '2014-2015',
        '2015-2016',
        '2016-2017',
        '2017-2018',
        '2019-2020',
        '2020-2021',
        '2021-2022',
        '2022-2023',
    ];
@endphp

<div class="form-input exam-form">
    <h3><strong>{{$year}}</strong></h3>
    <input id="exam_year_{{$key}}" name="exams[{{$key}}][exam]" type="hidden" value="{{$key}}">
    <input id="exam_year_{{$key}}" name="exams[{{$key}}][id]" type="hidden" value="{{$exam1->id??''}}">
</div>
<div class="row">
    <div class="form-input">
        <select id="major_{{$key}}" name="exams[{{$key}}][major][]" multiple class="select2-major">
            <option></option>
            @foreach(get_config('form-setting.majors') as $major_key_1=>$major_name_1)
                <option value="{{$major_key_1}}"
                @if(isset($exam1) && is_array($exam1->major))
                    {{ in_array($major_key_1,$exam1->major)?'selected':''}}
                    @else
                    {{($exam1->major?? '')=== $major_key_1?'selected':''}}
                    @endif
                >{{$major_name_1}}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-input exam-input-flex">
        <label for="roll_no_{{$key}}">ခုံအမှတ်</label>
        <input id="roll_no_{{$key}}" name="exams[{{$key}}][roll_no]" type="text"
               value="{{$exam1->roll_no??old('exams.'.$key.'.roll_no')}}">
    </div>
    <div class="form-input exam-input-flex">
        <label for="year_{{$key}}">ခုနှစ်</label>
        <select class="exam_years" name="exams[{{$key}}][year]" id="year_{{$key}}" style="margin-left: 3rem; width: 8rem;">
            @if (isset($exam1))
                <option value="{{$exam1->year}}">{{$exam1->year}}</option>
            @endif
            
            <!-- @foreach ($fail_years as $fail_year)
                <option value="{{$fail_year}}" {{$fail_year == ($exam1->year ?? '')? 'selected' : ''}}>{{$fail_year}}</option>
            @endforeach -->
            
        </select>
        {{-- <input id="year_{{$key}}" name="exams[{{$key}}][year]" type="number"
               value="{{$exam1->year??old('exams.'.$key.'.year')}}" min="2010" max="2019"> --}}

        <!-- <input id="year_{{$key}}" name="exams[{{$key}}][year]" type="number"
               value="{{$exam1->year??old('exams.'.$key.'.year')}}" min="2010" max="2019"> -->
    </div>
</div>
<div class="row">
    <div class="form-input exam-history">
        <select id="failed_subjects_{{$key}}" name="exams[{{$key}}][failed_subjects][]" class="exam-major-select2"
                multiple style="margin-left: 24px;">
            @foreach(get_config('form-setting.exam_subjects') as $exam_subject_key_1=>$exam_subject_name_1)
                <option value="{{$exam_subject_key_1}}"
                    {{isset($exam1) && $exam1 !==null && array_key_exists('failed_subjects',$exam1->data) && in_array($exam_subject_key_1,$exam1->data['failed_subjects'])?'selected':''}}
                    {{--                {{($exam1->major?? old("exams[$key][failed_subjects]"))=== $exam_subject_key_1?'selected':''}}--}}
                >{{$exam_subject_name_1}}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-input status">
    <div class="status">
        <label for="pass_status_{{$key}}">အောင်</label>
        <input id="pass_status_{{$key}}" type="radio" name="exams[{{$key}}][status]"
               value="pass" {{($exam1->status??old('exams.'.$key.'.status'))!==0?'checked':''}}
        >
    </div>
    <div class="status">
        <label for="fail_status_{{$key}}">ရှုံး</label>
        <input id="fail_status_{{$key}}" type="radio" name="exams[{{$key}}][status]"
               value="fail" {{($exam1->status??old('exams.'.$key.'.status'))===0?'checked':''}}
        >
    </div>
</div>
<div id="add-more_{{$key}}" @if(!isset($exam2)|| !$exam2)style="display: none"@endif>
    <div id='add_{{$key}}'>
        <input id='exam_year_{{$key}}' name="exams[{{$key.'_second'}}][exam]" type='hidden' value='{{$key}}'>
        <input id='exam_year_{{$key}}' name="exams[{{$key.'_second'}}][id]" type='hidden'
               value='{{$exam2->id??''}}'>
        <div class="row">
            <div class='form-input'>
                <select id="major_2_{{$key}}" name="exams[{{$key.'_second'}}][major][]" multiple class="select2-major">
                    <option value="" hidden>အဓိကဘာသာ ရွေးချယ်ရန်</option>
                    @foreach(get_config('form-setting.majors') as $major_key_2=>$major_name_2)
                        <option value="{{$major_key_2}}"
                        @if(isset($exam2) && is_array($exam2->major))
                            {{ in_array($major_key_2,$exam2->major)?'selected':''}}
                            @else
                            {{($exam2->major?? '')=== $major_key_2?'selected':''}}
                            @endif
                        >{{$major_name_2}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class='form-input exam-input-flex'>
                <label for='roll_no_{{$key}}'>ခုံအမှတ်</label>
                <input id='roll_no_{{$key}}' name="exams[{{$key.'_second'}}][roll_no]" type='text'
                       value='{{$exam2->roll_no??old('exams.'.$key.'._seond.roll_no')}}' placeholder=''>
                <span class='error1' style='display: none;'><i class='error-log fa fa-exclamation-triangle'></i></span>
            </div>
            <div class='form-input exam-input-flex'>
                <label for='year_{{$key}}'>ခုနှစ်</label>
                <input id='year_{{$key}}' name="exams[{{$key.'_second'}}][year]" type='number' min='2000' max='2019'
                       value='{{$exam2->year??old('exams.'.$key.'._seond.year')}}' placeholder=''>
                <span class='error1' style='display: none;'><i class='error-log fa fa-exclamation-triangle'></i></span>
            </div>
        </div>
        <div class="row">
            <div class="form-input exam-history">
                <select id="failed_subjects_2_{{$key}}" name="exams[{{$key}}][failed_subjects][]"
                        class="exam-major-select2" multiple>
                    @foreach(get_config('form-setting.exam_subjects') as $exam_subject_key_1=>$exam_subject_name_1)
                        <option value="{{$exam_subject_key_1}}"
                            {{isset($exam2) && $exam2 !==null && array_key_exists('failed_subjects',$exam2->data) && in_array($exam_subject_key_1,$exam2->data['failed_subjects'])?'selected':''}}
                            {{($exam1->data['failed_subjects']?? old("exams[$key][failed_subjects]"))=== $exam_subject_key_1?'selected':''}}
                        >{{$exam_subject_name_1}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class='form-input status'>
            <div class='status'>
                <label for='pass_status_{{$key}}_second'>အောင်</label>
                <input id='pass_status_{{$key}}_second' type='radio' name="exams[{{$key.'_second'}}][status]"
                       value='pass' {{($exam2->status??old('exams.'.$key.'._seond.status'))!==0?'checked':''}}
                >
            </div>
            <div class='status'>
                <label for='fail_status_{{$key}}_second'>ရှုံး</label>
                <input id='fail_status_{{$key}}_second' type='radio' name="exams[{{$key.'_second'}}][status]"
                       value='fail' {{($exam2->status??old('exams.'.$key.'._seond.status'))===0?'checked':''}}
                >
            </div>
        </div>
    </div>
</div>
<hr>

@push('after-scripts')
    <script>
        $('#pass_status_{{$key}}').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('pass');
                $('#add-more_{{$key}}').hide();
                $('#add-more_{{$key}}').find('input').val('');
                $('#add-more_{{$key}}').find('input:radio').prop('checked', false);
                {{--$('#add_{{$key}}').remove();--}}
            } else {
                $(this).val('false');
            }
        });

        $('#fail_status_{{$key}}').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('fail');
                $('#add-more_{{$key}}').show();
            } else {
                $(this).val('false');
            }
        });

        $('.select2-major').select2({
            placeholder: "အထူးပြုဘာသာ ရွေးချယ်ရန်",
            maximumSelectionLength: {{get_config('form-setting.major_limit')}},
            language: {
                maximumSelected: function (e) {
                    var t = "ဦးစားပေးဘာသာရပ် " + e.maximum + " ခု ကို သာ ရွေးချယ်ရန်";
                    return t;
                },
            }
        });
        $(".select2-major").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);

            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });

        $('#failed_subjects_{{$key}}').select2({
            placeholder: "ကျရှုံးခဲ့ပါက ရှုံးသည့်ဘာသာ ရွေးချယ်ရန်"
        });

        $('#failed_subjects_2_{{$key}}').select2({
            placeholder: "ကျရှုံးခဲ့ပါက ရှုံးသည့်ဘာသာ ရွေးချယ်ရန်"
        });


      
       

        
    </script>
@endpush

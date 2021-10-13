<fieldset class="fieldset-margin">
    <h2 class="fs-title">အချက်အလက်</h2>

        <!-- <div class="col-12">
            <label class="form-check-label" for="flexRadioDefault1">
                Day
            </label>
            <input class="form-check-input" type="radio" name="university_status" value="0" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                UDE
            </label>
            <input class="form-check-input" type="radio" name="university_status" value="1" >
        </div> -->
        <div class="form-input gender">
        <div class="gender">
            <label for="gender">Day</label>
            <input onclick="universitystatus();" class="custom-radio form-check-input" checked type="radio" value="0"  name="university_status" value="male"
                {{($studentDetail->university_status??old('university_status'))== 0?'checked':''}}
            >
        </div>
        <div class="gender">
            <label for="gender">UDE</label>
            <input onclick="universitystatus();" class="custom-radio form-check-input" type="radio" value="1"  name="university_status" value="female"
                {{($studentDetail->university_status??old('university_status'))== 1?'checked':''}}
            >
        </div>
        
    </div>
    @if(!isset($is_edit) || !$is_edit)
        <div class="form-input">
            <label for="">ဓာတ်ပုံ </label>
            <input type="file" name="photo" id="photo-upload" @if($site_name == 'um1_yangon') required="required"
                   data-rule-required="true"
                   data-msg-required="ဓာတ်ပုံ ထည့်ရန်" @endif>
            @if ($errors->has('photo'))
                <div class="error1">{{ $errors->first('photo') }}</div>
            @endif
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @endif

        <div class="form-input ude" style="display:none;">
            <label for="course">သင်တန်း *</label>
            @if($is_edit)
                <span>တက်လိုသောသင်တန်း - </span>
                <span>{{$enrollment->student->appliedCourses->course->year->name}} </span>
                <span>{{$enrollment->student->appliedCourses->course->major->name}}</span>
                <br/>
                <input type="hidden" name="course_id" value="{{$enrollment->student->appliedCourses->course_id}}">
            @endif
            <select name="course_id" id="course"
                    @if(!$is_local && !$is_edit) required="required"
                    data-rule-required="true"
                    data-msg-required="သင်တန်းရွေးချယ်ရန်" @endif class="course-select-2">
            {{--            <option></option>--}}
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>

    <div class="form-input day" style="display:block;">
        <label for="course">သင်တန်း *</label>
        @if($is_edit)
            <!-- <span>တက်လိုသောသင်တန်း - </span>
            <span>{{$enrollment->student->appliedCourses->course->year->name}} </span> -->
            <br/>
            <input type="hidden" name="course_id" value="{{$enrollment->student->appliedCourses->course_id}}">
        @endif
        <select name="year" id="course"
                @if(!$is_local && !$is_edit) required="required"
                data-rule-required="true"
                data-msg-required="သင်တန်းရွေးချယ်ရန်" @endif class="">
                <option value=""></option>
                @foreach(get_config('form-setting.mlmu_years') as $key => $values)
                @if(isset($enrollment->student->appliedCourses->course->year->id))
                <option value="{{$key}}" {{($key == $enrollment->student->appliedCourses->course->year->id) ?'selected':''}}
                >{{$values}}</option>
                @endif
                <option value="{{$key}}">{{$values}}</option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>
    


    <div class="form-input day" style="display:block;">
        <label for="major">အထူးပြုဘာသာ *</label>
        @if($is_edit)
            <!-- <span>တက်လိုသောအထူးပြုဘာသာ - </span>
            <span>{{$enrollment->student->appliedCourses->course->major->id}}</span> -->
            <br/>
            <input type="hidden" name="course_id" value="{{$enrollment->student->appliedCourses->course_id}}">
        @endif
        <select name="major" id="major"
                @if(!$is_local && !$is_edit) required="required"
                data-rule-required="true"
                data-msg-required="အထူးပြုဘာသာရွေးချယ်ရန်" @endif class="">
                <option value=""></option>
                @foreach(get_config('form-setting.mlmu_majors') as $key => $values)
                @if(isset($enrollment->student->appliedCourses->course->major->id))
                <option value="{{$key}}" {{($key == $enrollment->student->appliedCourses->course->major->id) ?'selected':''}}
                >{{$values}}</option>
                @endif
                <option value="{{$key}}">{{$values}}</option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>

    

    <div class="form-input">
        <label for="roll_no">{{get_config('form-setting.roll_no')}}</label>
        <input id="roll_no" name="roll_no" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ခုံအမှတ် ထည့်ရန်" @endif type="text"
               value="{{$enrollment->roll_no ?? old('roll_no')}}" placeholder="">
        @if ($errors->has('roll_no'))
            <div class="error1">{{ $errors->first('roll_no') }}</div>
        @endif
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>

    @if(!get_config('form-setting.is_first_year'))
        <div class="form-input">
            <label for="">တက္ကသိုလ်မှတ်ပုံတင်အမှတ် </label>
            <input id="university_roll_no" name="university_roll_no" type="text"
                   value="{{$enrollment->student->studentDetails->university_roll_no ?? ''}}" placeholder="">
            <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
        </div>
    @endif

    <div class="form-input">
        @php($university_start_year = $enrollment->student->studentDetails->university_start_year??old('university_start_year'))
        <label for="">တက္ကသိုလ်ဝင်ရောက်သည့်နှစ် *</label>
        <select id="university_start_year" name="university_start_year" class="start-year-select2 day" style="display:block;"
                @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="တက္ကသိုလ်ဝင်ရောက်သည့်နှစ် ရွေးချယ်ရန်" @endif>
                <option value=""></option>
            @foreach(get_config('form-setting.university_start_year') as $value)
                <option value="{{$value}}" {{($value == $university_start_year) ?'selected':''}}
                >{{$value}}</option>
            @endforeach
        </select>
        <select id="university_start_year" name="ude_university_start_year" class="start-year-select2 ude" style="display:none;"
                @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="တက္ကသိုလ်ဝင်ရောက်သည့်နှစ် ရွေးချယ်ရန် " @endif>
                <option value=""></option>
            @foreach(get_config('form-setting.ude_university_start_year') as $value)
                <option value="{{$value}}" {{($value == $university_start_year) ?'selected':''}}
                >{{$value}}</option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>

        {{--        <input id="" name="university_start_year" type="text" value="12/2019" readonly>--}}
        @if ($errors->has('university_start_year'))
            <div class="error1">{{ $errors->first('university_start_year') }}</div>
        @endif
    </div>

    <!-- <div class="form-input ude" style="display:none;">
        @php($university_start_year = $enrollment->student->studentDetails->university_start_year??old('university_start_year'))
        <label for="">တက္ကသိုလ်ဝင်ရောက်သည့်နှစ် *</label>
        <select id="university_start_year" name="university_start_year" class="start-year-select2"
                @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="တက္ကသိုလ်ဝင်ရောက်သည့်နှစ် ရွေးချယ်ရန် " @endif>
            <option></option>
            @foreach(get_config('form-setting.ude_university_start_year') as $value)
                <option value="{{$value}}" {{($value == $university_start_year) ?'selected':''}}
                >{{$value}}</option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>

        {{--        <input id="" name="university_start_year" type="text" value="12/2019" readonly>--}}
        @if ($errors->has('university_start_year'))
            <div class="error1">{{ $errors->first('university_start_year') }}</div>
        @endif
    </div> -->

        <div class="form-input ude" style="display:none;">
            <label for="">ဝန်ထမ်းဖြစ်ပါက လက်ရှိတာဝန်ထမ်းဆောင်သည့် ရာထူး (သို့မဟုတ်) အခြားဝန်းထမ်းဖြစ်ပါက ရာထူး၊ အလုပ်ဌာန</label>
            <input id="university_roll_no" name="designation" type="text"
                   value="{{$enrollment->student->studentDetails->designation ?? ''}}" placeholder="">
            <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
        </div>
        @if(get_config('form-setting.has_bloodtype'))
        <button data-page="1" name="next" class="next glow-on-hover" type="button">ရှေ့သို့သွားရန်</button>
        @else
        <input type="button" data-page="1" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
        @endif
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-info" id=""><strong>*Online Registration
            စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>

</fieldset>


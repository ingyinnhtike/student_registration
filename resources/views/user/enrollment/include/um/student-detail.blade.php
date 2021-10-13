<fieldset class="fieldset-margin">
    @php($studentDetail = $enrollment->student->studentDetails ?? null)
    @php($blood_type = config('constants.blood_type'))
    <h2 class="fs-title">ကျောင်းသား အချက်အလက်</h2>

    <div class="form-input">
        <label for="name_mm">အမည် (မြန်မာ) *</label>
        <input id="name_mm" name="name_mm" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="အမည်(မြန်မာဘာသာ)ဖြင့် ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->name_mm ?? old('name_mm')}}" placeholder="">
        @if ($errors->has('name_mm'))
            <div class="error1">{{ $errors->first('name_mm') }}</div>
        @endif
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="name_eng">အမည် (အင်္ဂလိပ်) *</label>
        <input id="name_eng" name="name_eng" @if(!$is_local) data-rule-required="true"
               data-msg-required="အမည်(အင်္ဂလိပ်ဘာသာ)ဖြင့် ထည့်ရန်" required="required" @endif type="text"
               value="{{$studentDetail->name_eng ?? old('name_eng')}}"
               placeholder="">
        @if ($errors->has('name_eng'))
            <div class="error1">{{ $errors->first('name_eng') }}</div>
        @endif
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    @if($site_name == 'um1_yangon')
        <div class="form-input ">
            <div class="has_other_name">
                <label for="has_other_name">အခြားအမည် ရှိ/မရှိ</label>
                <input id="has_other_name" class="custom-cb" type="checkbox" name="has_other_name">
            </div>
        </div>
        <div id="other-name">
        </div>
    @endif
    <div class="form-input gender">
        <div class="gender">
            <label for="gender">ကျား</label>
            <input id="male" checked class="custom-radio" type="radio" name="gender" value="male"
                   @if(!$is_local) required="required"
                   data-rule-required="true" data-msg-required="ကျား/မ ရွေးချယ်ရန်" @endif
                {{($studentDetail->gender??old('gender'))===1?'checked':''}}
            >
        </div>
        <div class="gender">
            <label for="gender">မ</label>
            <input id="female" class="custom-radio" type="radio" name="gender" value="female"
                   @if(!$is_local) required="required"
                   data-rule-required="true" data-msg-required="ကျား/မ ရွေးချယ်ရန်" @endif
                {{($studentDetail->gender??old('gender'))===0?'checked':''}}
            >
        </div>
        @if ($errors->has('gender'))
            <div class="error1">{{ $errors->first('gender') }}</div>
        @endif
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    @if($site_name == 'um1_yangon')
        <div class="form-input">
            <label for="blood_type">သွေးအမျိုးအစား *</label>
            <select name="blood_type" id="blood_type" type="text"
                    value="{{$studentDetail->blood_type??old('blood_type')}}">
                @foreach($blood_type as $key=>$value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @endif
    <div class="form-input">
        <label for="race">လူမျိုး *</label>
        <input id="race" name="race" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="လူမျိုး ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->race??old('race')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="religion">ကိုးကွယ်သည့်ဘာသာ</label>
       
        <select name="religion" @if(!$is_local) required="required" data-rule-required="true"
            data-msg-required="ကိုးကွယ်သည့်ဘာသာ ထည့်ရန်" @endif class="state-select-2">
            <option value="ဗုဒ္ဓဘာသာ" {{"ဗုဒ္ဓဘာသာ" == ($studentDetail->religion ?? '') ? 'selected' : ''}}>ဗုဒ္ဓဘာသာ</option>
            <option value="ခရစ်ယာန်" {{"ခရစ်ယာန်" == ($studentDetail->religion ?? '')? 'selected' : ''}}>ခရစ်ယာန်</option>
            <option value="အစ္စလမ်" {{"အစ္စလမ်" == ($studentDetail->religion ?? '')? 'selected' : ''}}>အစ္စလမ်</option>
            <option value="ဟိန္ဒူ" {{"ဟိန္ဒူ" == ($studentDetail->religion ?? '')? 'selected' : ''}}>ဟိန္ဒူ</option>
            <option value="အခြား" {{"အခြား" == ($studentDetail->religion ?? '')? 'selected' : ''}}>အခြား</option>

        </select>
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>

    @if(get_config('form-setting.has_district'))
        @include('user.enrollment.partials.birth_place',['hidden_birth_place' => 'hidden_birth_place','birth_place' => 'birth_place','data'=>$studentDetail])
    @else
        <!-- <div class="form-input">
            <label for="township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
            <input id="township" name="township" @if(!$is_local) required="required" data-rule-required="true"
                   data-msg-required="မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif type="text"
                   value="{{$studentDetail->township??old('township')}}"
                   placeholder="">
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div> -->
        <!-- <div class="form-input">
            <label for="state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
            <select name="state" @if(!$is_local) required="required" data-rule-required="true"
                    data-msg-required="မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="state-select-2 user-address-state">
                @foreach($states as $key=>$state)
                    <option></option>
                    <option value="{{$key}}" {{($studentDetail->state??old('state'))===$state? 'selected':''}}>{{$state}}
                    </option>
                @endforeach
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div> -->
       
        <div class="form-input">
            <label for="state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
            @if($is_edit)
            @if($data != '')
            <!-- <span>မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် - </span>
            <span>{{$student_state??'-'}} </span> -->
            @endif
            <br/>
            <input type="hidden" name="course_id" value="{{$enrollment->student->appliedCourses->course_id}}">
            @endif
            <select name="state" @if(!$is_local && !$is_edit) required="required" data-rule-required="true" data-msg-required="မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="state-select-2 user-address-state">
                    @if (isset($student_state))
                        <option value="{{$student_state->id??'-'}}">{{$student_state->name??'-'}}</option>
                    @endif
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>

        <div class="form-input">
            <label for="township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
            <select name="township" @if(!$is_local) required="required" data-rule-required="true"
                    data-msg-required="မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif class="state-select-2 user-address-township">
                    @if (isset($studentDetail))
                        <option value="{{$studentDetail->township}}">{{$studentDetail->township}}</option>
                    @endif
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>

    @endif

    <!-- <div class="form-input">
        <label for="nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
        <input id="nrc" name="nrc" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->nrc??old('nrc')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div> -->

    @if($is_edit == false)
        <div class="form-input">
            <label for="nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <div>
                <select id="nrc" name="nrc_state" class="user-nrc-state">
                <option value=""></option>
                </select>

                <select id="nrc" name="nrc_township" class="user-nrc-townships">
                <option value=""></option>
                </select>

                <select id="nrc" name="nrc_citizenship" class="nrc-citizenship">
                    <option value="(နိုင်)"></option>
                    <option value="(နိုင်)">(နိုင်)</option>
                    <option value="(ဧည့်)">(ဧည့်)</option>
                    <option value="-">(ပြု)</option>
                    <option value="(သာ)">(သာ)</option>
                </select>
                
                <input id="nrc" class="student-nrc-no nrc" type="text" name="nrc_number" value="">
                <span class="error1 student-nrc-citizenship-error" style="display: none; font-size: 17px;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                    နိုင်ငံသားစိစစ်ရေး မှတ်ပုံတင်အမှတ် ထည့်ရန်
                </span>
            </div>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @else
    
        <div class="form-input">
            <label for="nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <input name="nrc" @if(!$is_local) required="required" data-rule-required="true"
                   data-msg-required="တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
                   value="{{$studentDetail->nrc??old('nrc')}}"
                   placeholder="">
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @endif

    @if(get_config('form-setting.has_mme'))
        @if($is_edit == false)
            <div class="form-input">
                <label for="nrc">အမျိုးသားမှတ်ပုံတင်အမှတ် *</label>
                <div>
                    <select id="nrc" name="nrc2_citizenship" class="nrc2-citizenship">
                        <option value=""></option>
                        <option value="MME">MME</option>
                    </select>
                    <input id="nrc" class="nrc" type="text" name="nrc2_number" value="">
                    <!-- <span class="error1 nrc-citizenship-error" style="display: none; font-size: 17px;">
                        <i class="error-log fa fa-exclamation-triangle"></i>
                        အမျိုးသားမှတ်ပုံတင်အမှတ် ထည့်ရန်
                    </span> -->
                </div>
                <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
            </div>
        @else
            <div class="form-input">
                <label for="nrc">အမျိုးသားမှတ်ပုံတင်အမှတ် *</label>
                <input name="nrc2" type="text"
                    value="{{$studentDetail->nrc2??old('nrc2')}}"
                    placeholder="">
                <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
            </div>
        @endif
    @endif

    @if(get_config('form-setting.has_bloodtype'))
    <div class="form-input">
        @php($university_start_year = $enrollment->student->studentDetails->university_start_year??old('university_start_year'))
        <label for="">သွေးအမျိုးအစား *</label>
        <select id="university_start_year" name="blood_type" class="start-year-select2 day" style="display:block;"
                @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="သွေးအမျိုးအစား ရွေးချယ်ရန်" @endif>
            @foreach(get_config('form-setting.blood_type') as $value)
                @if(isset($studentDetail->blood_type))
                <option value="{{$value}}" {{($value == $studentDetail->blood_type) ?'selected':''}}
                >{{$value}}</option>
                @else if
                <option value="{{$value}}">{{$value}}</option>
                @endif
            @endforeach
        </select>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>

        @if ($errors->has('university_start_year'))
            <div class="error1">{{ $errors->first('university_start_year') }}</div>
        @endif
    </div>
    @endif


    @if(get_config('form-setting.has_la_wa_ka'))
    <div class="form-input">
        <label for="nrc_issue_date">နိုင်ငံသားစိစစ်ရေးကတ်ပြားထုတ်ပေးသည့် ခုနှစ်၊ လ၊ ရက် </label>
        <input id="nrc_issue_date" name="nrc_issue_date"  type="date"
               value="{{$studentDetail->data['nrc_issue_date'] ?? old('nrc_issue_date')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    @endif
    <div class="form-input">
        <label for="dob">မွေးသက္ကရာဇ် *</label>
        <input id="dob" name="dob" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မွေးသက္ကရာဇ်် ထည့်ရန်" @endif type="date"
               value="{{$studentDetail->dob??old('dob')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="email">Email Address</label>
        <input id="email" name="email" type="email"
               value="{{$studentDetail->email??old('email')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    @if(get_config('form-setting.is_student_work_required'))
        <div class="form-input">
            <label for="student_work">အလုပ်အကိုင် *</label>
            <input id="student_work" name="work" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
                   data-msg-required="အလုပ်အကိုင် ထည့်ရန်" @endif type="text"
                   value="{{$studentDetail->data['work'] ?? old('work')}}">
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @endif
    <div class="form-input">
        <label for="permanent_address">အမြဲတမ်းနေထိုင်သည့်လိပ်စာ*</label>
        <input id="permanent_address" name="permanent_address" @if(!$is_local) required="required"
               data-rule-required="true"
               data-msg-required="အမြဲတမ်းနေထိုင်သည့်လိပ်စာ ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->permanent_address??old('permanent_address')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="permanent_phone">ဖုန်းနံပါတ် *</label>
        <input id="permanent_phone" name="permanent_phone" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖုန်းနံပါတ် ထည့်ရန်" @endif type="number"
               value="{{$studentDetail->permanent_phone??old('permanent_phone')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>

    
    @if(get_config('form-setting.has_bloodtype'))
    <button data-page="2" name="previous" class="previous glow-on-hover" type="button">နောက်သို့သွားရန်</button>
    <button data-page="1" name="next" class="next student-next-error glow-on-hover" type="button">ရှေ့သို့သွားရန်</button>
    @else
    <input type="button" data-page="2" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="1" name="next" class="next student-next-error action-button" value="ရှေ့သို့သွားရန်"/>
    @endif
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-student" id=""><strong>*Online Registration
            စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>
            
</fieldset>


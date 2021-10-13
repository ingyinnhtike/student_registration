<fieldset class="fieldset-margin">
    @php($studentDetail = $enrollment->student->studentDetails ?? null)
    <h2 class="fs-title">ကျောင်းသား အချက်အလက်</h2>

    <div class="form-input">
        <label for="">အမည် (မြန်မာ) *</label>
        <input id="" name="name_mm" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="အမည်(မြန်မာဘာသာ)ဖြင့် ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->name_mm ?? old('name_mm')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">အမည် (အင်္ဂလိပ်) *</label>
        <input id="" name="name_eng" @if(!$is_local) data-rule-required="true"
               data-msg-required="အမည်(အင်္ဂလိပ်ဘာသာ)ဖြင့် ထည့်ရန်" required="required" @endif type="text"
               value="{{$studentDetail->name_eng ?? old('name_eng')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input gender">
        <div class="gender">
            <label for="gender">ကျား</label>
            <input id="male" class="custom-radio" type="radio" name="gender" value="male" @if(!$is_local) required="required"
                   data-rule-required="true" data-msg-required="ကျား/မ ရွေးချယ်ရန်" @endif
                {{($studentDetail->gender??old('gender'))===1?'checked':''}}
            >
        </div>
        <div class="gender">
            <label for="gender">မ</label>
            <input id="female" class="custom-radio"  type="radio" name="gender" value="female" @if(!$is_local) required="required"
                   data-rule-required="true" data-msg-required="ကျား/မ ရွေးချယ်ရန်" @endif
                {{($studentDetail->gender??old('gender'))===0?'checked':''}}
            >
        </div>
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">သွေးအမျိုးအစား *</label>
        <input id="" name="blood_type" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="သွေးအမျိုးအစား ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->data['blood_type']??old('blood_type')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">လူမျိုး *</label>
        <input id="" name="race" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="လူမျိုး ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->race??old('race')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">ကိုးကွယ်သည့်ဘာသာ *</label>
        <input id="" name="religion" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ကိုးကွယ်သည့်ဘာသာ ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->religion??old('religion')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
        <input id="" name="township" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->township??old('township')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
        <select name="state" @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="state-select-2">
            @foreach($states as $key=>$state)
                <option value=""></option>
                <option value="{{$key}}" {{($studentDetail->state??old('state'))==$state? 'selected':''}}>{{$state}}
                </option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် *</label>
        <input id="" name="nrc" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->nrc??old('nrc')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">မွေးသက္ကရာဇ် *</label>
        <input id="" name="dob" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မွေးသက္ကရာဇ်် ထည့်ရန်" @endif type="date"
               value="{{$studentDetail->dob??old('dob')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
{{--    <div class="form-input">--}}
{{--        <label for="">အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုံအမှတ် *</label>--}}
{{--        <input id="" name="high_school_roll_no" @if(!$is_local) required="required" data-rule-required="true"--}}
{{--               data-msg-required="အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုံအမှတ်" @endif type="text"--}}
{{--               value="{{$studentDetail->high_school_roll_no??old('high_school_roll_no')}}"--}}
{{--               placeholder="">--}}
{{--        <span class="error1" style="display: none;">--}}
{{--                <i class="error-log fa fa-exclamation-triangle"></i>--}}
{{--            </span>--}}
{{--    </div>--}}
{{--    <div class="form-input">--}}
{{--        <label for="">အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုနှစ် *</label>--}}
{{--        <input id="" name="high_school_year" @if(!$is_local) required="required" data-rule-required="true"--}}
{{--               data-msg-required="အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုနှစ်" @endif type="number"--}}
{{--               min="{{config('constants.min_high_school_year')}}"--}}
{{--               max="{{config('constants.max_high_school_year')}}"--}}
{{--               value="{{$studentDetail->high_school_year??old('high_school_year')}}"--}}
{{--               placeholder="">--}}
{{--        <span class="error1" style="display: none;">--}}
{{--                <i class="error-log fa fa-exclamation-triangle"></i>--}}
{{--            </span>--}}
{{--    </div>--}}
{{--    <div class="form-input">--}}
{{--        <label for="">အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် စာစစ်ဌာန *</label>--}}
{{--        <input id="" name="high_school_exam_location" @if(!$is_local) required="required" data-rule-required="true"--}}
{{--               data-msg-required="အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် စာစစ်ဌာန ထည့်ရန်" @endif type="text"--}}
{{--               value="{{$studentDetail->high_school_exam_location ?? old('high_school_exam_location')}}"--}}
{{--               placeholder="">--}}
{{--        <span class="error1" style="display: none;">--}}
{{--                <i class="error-log fa fa-exclamation-triangle"></i>--}}
{{--            </span>--}}
{{--    </div>--}}
    <div class="form-input">
        <label for="">Email Address *</label>
        <input id="" name="email" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="Email Address ထည့်ရန်" @endif type="email"
               value="{{$studentDetail->email??old('email')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">အမြဲတမ်းနေထိုင်သည့် လိပ်စာ *</label>
        <input id="permanent_address" name="permanent_address" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="တက္ကသိုလ်ဝင်ရောက်သည့်နှစ် ထည့်ရန်" @endif type="text"
               value="{{$studentDetail->permanent_address??old('permanent_address')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">ဖုန်းနံပါတ် *</label>
        <input id="" name="permanent_phone" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖုန်းနံပါတ် ထည့်ရန်" @endif type="number"
               value="{{$studentDetail->permanent_phone??old('permanent_phone')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <input type="button" data-page="2" name="previous" class="previous action-button" value="ရှေ့သို့ပြန်သွားရန်"/>
    <input type="button" data-page="1" name="next" class="next action-button" value="နောက်သို့သွားရန်"/>

</fieldset>

@push('after-scripts')
    <script>
        $('#male').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('male');
                console.log($(this).val());
            } else {
                $(this).val('false');
                console.log($(this).val());
            }
        });
        $('#female').click(function () {
            if ($(this).is(':checked')) {
                $(this).val('female');
                console.log($(this).val());
            } else {
                $(this).val('false');
                console.log($(this).val());
            }
        });

    </script>
@endpush

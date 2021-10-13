<fieldset class="fieldset-margin">
    @php($studentDetail = $enrollment->student->studentDetails ?? null)
    @php($highSchool=$enrollment->student->highSchool ?? null)
    <h2 class="fs-title">အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် စာမေးပွဲမှတ်တမ်းများ</h2>

    <div class="form-input">
        <label for="high_school_roll_no">ခုံအမှတ် *</label>
        <input id="high_school_roll_no" name="high_school_roll_no"  type="text"
               value="{{$highSchool->roll_no??old('high_school_roll_no')}}" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
               data-msg-required="ခုံအမှတ် ထည့်ရန်" @endif>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>

    <div class="form-input">
        <label for="high_school_year">အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုနှစ် *</label>
        <input id="high_school_year" name="high_school_year" value="{{$highSchool->year ?? old('high_school_year')}}" min="2009" max="{{\Carbon\Carbon::now()->year}}" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
               data-msg-required="အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုနှစ် ထည့်ရန်" @endif>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>
    <div class="form-input">
        <label for="high_school_exam_location"> စာစစ်ဌာန *</label>
        <input id="high_school_exam_location" name="high_school_exam_location" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
               data-msg-required="စာစစ်ဌာန ထည့်ရန်" @endif type="text"
               value="{{$highSchool->exam_location ?? old('high_school_exam_location')}}"
               placeholder="">
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>

    @if(get_config('form-setting.high_school_sub_required'))
        <label for="">ဖြေဆိုခဲ့သည့်ဘာသာရပ်များနှင့်ရမှတ်များ</label>
        @for($i=0; $i<6;$i++)
            @php($mark = $highSchool->data['mark'][$i] ??old("high_school_mark[$i]"))
            <div class="form-input ">
                <div class="high-school-mark">
                    <label for="high-school-mark">
                        <select name="high_school_mark[{{$i}}][subject]" class="high-school-subjects" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
                                data-msg-required="ဖြေဆိုခဲ့သည့်ဘာသာရပ်များနှင့်ရမှတ်များ ထည့်ရန်" @endif>
                            <option value="" hidden>ဖြေဆိုခဲ့သည့်ဘာသာရွေးချယ်ရန်</option>
                            @foreach(get_config('form-setting.high_school_subjects') as $key=>$value)
                                <option></option>
                                <option
                                    value="{{$value}}"
                                @if($mark)
                                    {{$value === $mark['subject'] ? 'selected':''}}

                                    @endif
                                >{{$value}}</option>
                            @endforeach
                        </select>
                    </label>
                    <input class="high-school-mark" name="high_school_mark[{{$i}}][mark]"
                           @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
                           data-msg-required="ရမှတ် ထည့်ရန်" @endif type="number"
                           value="{{$mark['mark']}}" min="40" max="100">
                </div>

            </div>
        @endfor
    @endif

    <div class="form-input">
        <label for="high_school_total_mark">ရမှတ်စုစုပေါင်း *</label>
        <input id="high_school_total_mark" name="high_school_total_mark" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
               data-msg-required="ရမှတ်စုစုပေါင်း ထည့်ရန်" @endif type="number"
               value="{{$highSchool->data['total_mark'] ?? old('high_school_total_mark')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
    </div>
    <div class="form-input">
        <label for="high_school_distinctions">ဂုဏ်ထူးရသည့်ဘာသာ *</label>
        <input id="high_school_distinctions" name="high_school_distinctions" @if(!$is_local && !$is_edit) required="required" data-rule-required="true"
               data-msg-required="ဂုဏ်ထူးရသည့်ဘာသာ ထည့်ရန်" @endif type="text"
               value="{{$highSchool->data['distinctions'] ?? old('high_school_distinctions')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
    </div>
    <div id="fourth-add-more"></div>
    <input type="button" data-page="6" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="5" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-high-school" id=""><strong>*Online
            Registration စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>
</fieldset>


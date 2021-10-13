@php
    $parents = $enrollment->student->parentDetails ?? null;
    if($parents){
    $father = $parents->where('relation_to_user','father')->first();
    }
@endphp

<fieldset class="fieldset-margin">
    <h2 class="fs-title">ဖခင် အချက်အလက်</h2>

    <div class="form-input">
        <label for="father_name_mm">အမည် (မြန်မာ) *</label>
        <input id="father_name_mm" name="father_name_mm" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖခင်၏အမည်(မြန်မာဘာသာ)ဖြင့် ထည့်ရန်" @endif type="text"
               value="{{$father->name_mm??old('father_name_mm')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="father_name_eng">အမည် (အင်္ဂလိပ်) *</label>
        <input id="father_name_eng" name="father_name_eng" @if(!$is_local) data-rule-required="true"
               data-msg-required="ဖခင်၏အမည်(အင်္ဂလိပ်ဘာသာ)ဖြင့် ထည့်ရန်" required="required" @endif type="text"
               value="{{$father->name_eng ?? old('father_name_eng')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="father_race">လူမျိုး *</label>
        <input id="father_race" name="father_race" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖခင်၏လူမျိုး ထည့်ရန်" @endif type="text"
               value="{{$father->race??old('father_race')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="father_religion">ကိုးကွယ်သည့်ဘာသာ </label>
        <select name="father_religion" @if(!$is_local) required="required" data-rule-required="true"
        data-msg-required="ကိုးကွယ်သည့်ဘာသာ ထည့်ရန်" @endif class="state-select-2">
            <option value="ဗုဒ္ဓဘာသာ"{{"ဗုဒ္ဓဘာသာ" == ($father->religion ?? '')? 'selected' : ''}}>ဗုဒ္ဓဘာသာ</option>
            <option value="ခရစ်ယာန်" {{"ခရစ်ယာန်" == ($father->religion ?? '')? 'selected' : ''}}>ခရစ်ယာန်</option>
            <option value="အစ္စလမ်" {{"အစ္စလမ်" == ($father->religion ?? '')? 'selected' : ''}}>အစ္စလမ်</option>
            <option value="ဟိန္ဒူ" {{"ဟိန္ဒူ" == ($father->religion ?? '')? 'selected' : ''}}>ဟိန္ဒူ</option>
            <option value="အခြား" {{"အခြား" == ($studentDetail->religion ?? '')? 'selected' : ''}}>အခြား</option>    
        </select>
    </div>

    @if(get_config('form-setting.has_district'))
        @include('user.enrollment.partials.birth_place',['hidden_birth_place' => 'father_hidden_birth_place','birth_place' => 'father_birth_place','data'=>$father ?? ''])
    @else
    <!-- <div class="form-input">
        <label for="father_township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
        <input id="father_township" name="father_township" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖခင်၏မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif type="text"
               value="{{$father->township??old('father_township')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="father_state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
        <select id="father_state" name="father_state" @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="ဖခင်၏မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="form-control">
            <option></option>
            @foreach($states as $key=>$state)
                <option value="{{$key}}" {{($father->state??old('father_state'))==$key? 'selected':''}}>{{$state}}
                </option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div> -->

    <div class="form-input">
            <label for="father_state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
            <select name="father_state" @if(!$is_local) required="required" data-rule-required="true"
                    data-msg-required="ဖခင်၏မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="state-select-2 father-address-state">
                    @if (isset($father_state))
                        <option value="{{$father_state->id??'-'}}">{{$father_state->name??'-'}}</option>
                    @endif
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="father_township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
            <select name="father_township" @if(!$is_local) required="required" data-rule-required="true"
                    data-msg-required="ဖခင်၏မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif class="state-select-2 father-address-township">
                    @if (isset($father))
                    <option value="{{$father->township}}">{{$father->township}}</option>
                    @endif
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>


    @endif
    <!-- <div class="form-input">
        <label for="father_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်*</label>
        <input id="father_nrc" name="father_nrc" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="နိုင်ငံသားစိစစ်ရေး မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
               value="{{$father->nrc??old('father_nrc')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div> -->


    @if($is_edit == false)
        <div class="form-input">
            <label for="father_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <div>
                <select id="nrc" name="father_nrc_state" class="father-nrc-state nrc">
                <option value=""></option>
                </select>

                <select id="nrc" name="father_nrc_township" class="father-nrc-townships nrc">
                <option value=""></option>
                </select>

                <select id="nrc" name="father_nrc_citizenship" class="father-nrc-citizenship nrc">
                    <option value="(နိုင်)"></option>
                    <option value="(နိုင်)">(နိုင်)</option>
                    <option value="(ဧည့်)">(ဧည့်)</option>
                    <option value="-">(ပြု)</option>
                    <option value="(သာ)">(သာ)</option>
                </select>

                <input id="nrc" class="father-nrc-no nrc" type="text" name="father_nrc_number" value="">
                <span class="error1 father-nrc-citizenship-error" style="display: none; font-size: 17px;">
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
            <label for="father_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <input id="father_nrc" name="father_nrc" @if(!$is_local) required="required" data-rule-required="true"
                   data-msg-required="တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
                   value="{{$father->nrc??old('father_nrc')}}"
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
                    <select id="nrc" name="father_nrc2_citizenship" class="nrc2-citizenship">
                        <option value=""></option>
                        <option value="MME">MME</option>
                    </select>
                    <input id="nrc" class="nrc" type="text" name="father_nrc2_number" value="">
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
                <input name="father_nrc2" type="text"
                    value="{{$father->nrc2??old('nrc2')}}"
                    placeholder="">
                <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
            </div>
        @endif
    @endif

    @if(get_config('form-setting.has_la_wa_ka'))
        <div class="form-input">
            <label for="">နိုင်ငံသားစိစစ်ရေးကတ်ပြားထုတ်ပေးသည့် ခုနှစ်၊ လ၊ ရက် </label>
            <input id="" name="father_nrc_issue_date" type="date"
                   value="{{$father->data['nrc_issue_date']??old('father_nrc_issue_date')}}">
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @endif
    <div class="form-input">
        {{-- <label for="relation_to_user">တော်စပ်ပုံ *</label>--}}
        <input id="relation_to_user" name="father_relation_to_user" @if(!$is_local) required="required"
               data-rule-required="true" data-msg-required="တော်စပ်ပုံ ထည့်ရန်" @endif type="hidden" value="father"
               placeholder="">
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>
    <div class="form-input ">
        <div class="is_available">
            <label for="father_availability">သက်ရှိထင်ရှား ရှိ/မရှိ<br> (ရှိလျှင်အမှန်ခြစ်ပါ)</label>
            <input type="hidden" name="father_availability" value="0">
            <input id="father_availability" class="custom-cb" type="checkbox" name="father_availability" value="1"
                {{($father->availability??old('father_availability'))==1? 'checked':''}} >
        </div>
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div id="father_death_date">
        <div class="form-input">
            <label for="">သက်ရှိထင်ရှားမရှိပါက ကွယ်လွန်သည့်ရက်စွဲ ထည့်ပေးပါရန်</label>
            <input id="" name="father_death_date" type="date"
                   value="{{$father->data['death_date']??old('father_death_date')}}">
        </div>
        </div>
    @endif
    <div id="father_is_available">
        <div class="form-input ">
            <div class="is_available">
                <label for="father_is_guardian">အုပ်ထိန်းသူဖြစ်သည်</label>
                <input type="hidden" name="father_is_guardian" value="0">
                <input id="father_is_guardian" class="custom-cb" type="checkbox" name="father_is_guardian" value="1"
                    {{($father->data['is_guardian']??old('father_is_guardian'))==1? 'checked':''}}>
            </div>
        </div>
        <div class="form-input">
            <label for="father_work">ဖခင်၏ အလုပ်အကိုင် *</label>
            <input id="father_work" name="father_work" type="text" value="{{$father->work??old('father_work')}}" >
        </div>
        <div class="form-input">
            <label for="father_email">Email Address </label>
            <input id="father_email" name="father_email" type="email"
                   value="{{$father->data['email']??old('father_email')}}"
                   placeholder="">
        </div>
        <div class="form-input ">
            <div class="is_available">
                <label for="is_available">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
                <input id="father_is_the_same" class="custom-cb" type="checkbox" name="is_the_same">
                <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
            </div>
        </div>
        <div class="form-input">
            <label for="father_address">ဖခင်၏ နေရပ်လိပ်စာ အပြည့်အစုံ *</label>
            <textarea name="father_address" id="father_address" cols="30" >{{$father->address??old('father_address')}}</textarea>
            <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
        </div>
        <div class="form-input">
        <label for="father_phone">ဖခင်၏ ဖုန်းနံပါတ် *</label>
        <input id="father_phone" name="father_phone" type="number"
               value="{{$father->phone??old('father_phone')}}">
    </div>
    </div>
    
    @if(get_config('form-setting.has_bloodtype'))
    <button data-page="3" name="previous" class="previous glow-on-hover" type="button">နောက်သို့သွားရန်</button>
    <button data-page="2" name="next" class="next father-next-error glow-on-hover" type="button">ရှေ့သို့သွားရန်</button>
    @else
    <input type="button" data-page="3" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="2" name="next" class="next father-next-error action-button" value="ရှေ့သို့သွားရန်"/>
    @endif
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-father" id=""><strong>*Online Registration
            စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>
</fieldset>




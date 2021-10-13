@php
    $parents = $enrollment->student->parentDetails ?? null;
    if($parents){
    $mother = $parents->where('relation_to_user','mother')->first();
    }
@endphp
<fieldset class="fieldset-margin">
    <h2 class="fs-title">မိခင် အချက်အလက်</h2>

    <div class="form-input">
        <label for="mother_name_mm">အမည် (မြန်မာ) *</label>
        <input id="mother_name_mm" name="mother_name_mm" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မိခင်၏အမည်(မြန်မာဘာသာ)ဖြင့် ထည့်ရန်" @endif type="text"
               value="{{$mother->name_mm??old('mother_name_mm')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="mother_name_eng">အမည် (အင်္ဂလိပ်) *</label>
        <input id="mother_name_eng" name="mother_name_eng" @if(!$is_local) data-rule-required="true"
               data-msg-required="မိခင်၏အမည်(အင်္ဂလိပ်ဘာသာ)ဖြင့် ထည့်ရန်" required="required" @endif type="text"
               value="{{$mother->name_eng??old('mother_name_eng')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="mother_race">လူမျိုး *</label>
        <input id="mother_race" name="mother_race" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မိခင်၏လူမျိုး ထည့်ရန်" @endif type="text"
               value="{{$mother->race??old('mother_race')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <!-- <div class="form-input">
        <label for="mother_religion">ကိုးကွယ်သည့်ဘာသာ *</label>
        <input id="mother_religion" name="mother_religion" type="text"
               value="{{$mother->religion??old('mother_religion')}}">
    </div> -->
    <div class="form-input">
        <label for="mother_religion">ကိုးကွယ်သည့်ဘာသာ *</label>
        <select name="mother_religion" @if(!$is_local) required="required" data-rule-required="true"
        data-msg-required="ကိုးကွယ်သည့်ဘာသာ ထည့်ရန်" @endif class="state-select-2">
            <option value="ဗုဒ္ဓဘာသာ" {{"ဗုဒ္ဓဘာသာ" == ($mother->religion ?? '')? 'selected' : ''}}>ဗုဒ္ဓဘာသာ</option>
            <option value="ခရစ်ယာန်" {{"ခရစ်ယာန်" == ($mother->religion ?? '')? 'selected' : ''}}>ခရစ်ယာန်</option>
            <option value="အစ္စလမ်" {{"အစ္စလမ်" == ($mother->religion ?? '')? 'selected' : ''}}>အစ္စလမ်</option>
            <option value="ဟိန္ဒူ" {{"ဟိန္ဒူ" == ($mother->religion ?? '')? 'selected' : ''}}>ဟိန္ဒူ</option>
            <option value="အခြား" {{"အခြား" == ($studentDetail->religion ?? '')? 'selected' : ''}}>အခြား</option>
        </select>
    </div>

    @if(get_config('form-setting.has_district'))
        @include('user.enrollment.partials.birth_place',['hidden_birth_place' => 'mother_hidden_birth_place','birth_place' => 'mother_birth_place','data'=> $mother ?? '' ])
    @else
    <!-- <div class="form-input">
        <label for="mother_township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
        <input id="mother_township" name="mother_township" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မိခင်၏မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif type="text"
               value="{{$mother->township??old('mother_township')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="mother_state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
        <select id="mother_state" name="mother_state" @if(!$is_local) required="required" data-rule-required="true"
                data-msg-required="မိခင်၏မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="form-control">
            @foreach($states as $key=>$state)
                <option value="{{$key}}" {{($mother->state??old('mother_state'))==$key? 'selected':''}}>{{$state}}
                </option>
            @endforeach
        </select>
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div> -->

    <div class="form-input">
            <label for="mother_state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
            <select name="mother_state" @if(!$is_local) required="required" data-rule-required="true"
                    data-msg-required="မိခင်၏မွေးဖွားရာဇာတိ တိုင်း/ပြည်နယ် ရွေးချယ်ရန်" @endif class="state-select-2 mother-address-state">
                    @if (isset($mother_state))
                        <option value="{{$mother_state->id??'-'}}">{{$mother_state->name??'-'}}</option>
                    @endif
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        {{-- {{dd($mother)}} --}}
        <div class="form-input">
            <label for="mother_township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
            <select name="mother_township" @if(!$is_local) required="required" data-rule-required="true"
                    data-msg-required="မိခင်၏မွေးဖွားရာဇာတိ မြို့နယ် ထည့်ရန်" @endif class="state-select-2 mother-address-township">
                    @if (isset($mother))
                    <option value="{{$mother->township}}">{{$mother->township}}</option>
                    @endif
            </select>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>


    @endif
    <!-- <div class="form-input">
        <label for="mother_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
        <input id="mother_nrc" name="mother_nrc" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="မိခင်၏တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
               value="{{$mother->nrc??old('mother_nrc')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div> -->



    @if($is_edit == false)
        <div class="form-input">
            <label for="mother_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <div>
                <select id="nrc" name="mother_nrc_state" class="mother-nrc-state nrc">
                <option value=""></option>
                </select>

                <select id="nrc" name="mother_nrc_township" class="mother-nrc-townships nrc">
                <option value=""></option>
                </select>

                <select id="nrc" name="mother_nrc_citizenship" class="mother-nrc-citizenship nrc">
                    <option value=""></option>
                    <option value="(နိုင်)">(နိုင်)</option>
                    <option value="(ဧည့်)">(ဧည့်)</option>
                    <option value="-">(ပြု)</option>
                    <option value="(သာ)">(သာ)</option>
                </select>

                <input id="nrc" class="mother-nrc-no nrc" type="text" name="mother_nrc_number" value="">
               <span class="error1 mother-nrc-citizenship-error" style="display: none; font-size: 17px;">
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
            <label for="mother_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <input id="mother_nrc" name="mother_nrc" @if(!$is_local) required="required" data-rule-required="true"
                   data-msg-required="မိခင်၏တိုင်းရင်းသား/နိုင်ငံခြားသား မှတ်ပုံတင်အမှတ် ထည့်ရန်" @endif type="text"
                   value="{{$mother->nrc??old('mother_nrc')}}"
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
                    <select id="nrc" name="mother_nrc2_citizenship" class="nrc2-citizenship">
                        <option value=""></option>
                        <option value="MME">MME</option>
                    </select>
                    <input id="nrc" class="nrc" type="text" name="mother_nrc2_number" value="">
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
                <input name="mother_nrc2" type="text"
                    value="{{$mother->nrc2??old('nrc2')}}"
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
            <input id="" name="mother_nrc_issue_date" type="date"
                   value="{{$mother->data['nrc_issue_date']??old('mother_nrc_issue_date')}}">
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
    @endif
    <div class="form-input">
        {{--<label for="mother_relation_to_user">တော်စပ်ပုံ *</label>--}}
        <input id="mother_relation_to_user" name="mother_relation_to_user" @if(!$is_local) required="required"
               data-rule-required="true" data-msg-required="တော်စပ်ပုံ ထည့်ရန်" @endif type="hidden" value="mother"
               placeholder="">
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>
    <div class="form-input ">
        <div class="is_available">
            <label for="mother_availability">သက်ရှိထင်ရှား ရှိ/မရှိ <br>(ရှိလျှင်အမှန်ခြစ်ပါ)</label>
            <input type="hidden"  name="mother_availability" value="0">
            <input id="mother_availability" class="custom-cb" type="checkbox" name="mother_availability" value="1"
                {{($mother->availability??old('mother_availability'))==1? 'checked':''}}>
        </div>
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div id="mother_death_date">
            <div class="form-input">
                <label for="">သက်ရှိထင်ရှားမရှိပါက ကွယ်လွန်သည့်ရက်စွဲ ထည့်ပေးပါရန်</label>
                <input id="" name="mother_death_date" type="date"
                       value="{{$mother->data['death_date']??old('mother_death_date')}}">
            </div>
        </div>
    @endif
    <div id="mother_is_available">
        <div class="form-input ">
            <div class="is_available">
                <label for="mother_is_guardian">အုပ်ထိန်းသူဖြစ်သည်</label>
                <input type="hidden"  name="mother_is_guardian" value="0">
                <input id="mother_is_guardian" class="custom-cb" type="checkbox" name="mother_is_guardian" value="1"
                    {{($mother->data['is_guardian']??old('mother_is_guardian'))==1? 'checked':''}}>
                <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
            </div>
        </div>
        <div class="form-input">
            <label for="mother_work">မိခင်၏ အလုပ်အကိုင် *</label>
            <input id="mother_work" name="mother_work" type="text"
                   value="{{$mother->work??old('mother_work')}}" placeholder="">
            <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
        </div>
        <div class="form-input">
            <label for="mother_email">Email Address </label>
            <input id="mother_email" name="mother_email" type="email"
                   value="{{$mother->data['email']??old('mother_email')}}"
                   placeholder="">
            <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
        </div>
        <div class="form-input">
            <div class="is_available">
                <label for="is_the_same">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
                <input type="hidden"  name="is_the_same" value="off">
                <input id="mother_is_the_same" class="custom-cb" type="checkbox" name="is_the_same" >
            </div>
        </div>
        <div class="form-input">
            <label for="mother_address">မိခင်၏ နေရပ်လိပ်စာ အပြည့်အစုံ *</label>
            <textarea name="mother_address" id="mother_address" cols="30" >
                {{$mother->address??old('mother_address')}}
            </textarea>
        </div>
        <div class="form-input">
        <label for="mother_phone">မိခင်၏ ဖုန်းနံပါတ် *</label>
        <input id="mother_phone" name="mother_phone" type="number"
               value="{{$mother->phone??old('mother_phone')}}" placeholder="">
    </div>
    </div>
    @if(get_config('form-setting.has_bloodtype'))
    <button data-page="4" name="previous" class="previous glow-on-hover" type="button">နောက်သို့သွားရန်</button>
    <button data-page="3" name="next" class="next mother-next-error glow-on-hover" type="button">ရှေ့သို့သွားရန်</button>
    @else
     <input type="button" data-page="4" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="3" name="next" class="next mother-next-error action-button" value="ရှေ့သို့သွားရန်"/>
    @endif
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-mother" id=""><strong>*Online Registration စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>
</fieldset>




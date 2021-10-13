@php
    $parents = $enrollment->student->parentDetails ?? null;
    if($parents){
    $other = $parents->where('relation_to_user',"!=",'father')
    ->where('relation_to_user','!=','mother')->where('relation_to_user', '!=', '')->first();
    }
@endphp

<fieldset class="fieldset-margin">
    <h2 class="fs-title">အခြားအုပ်ထိန်းသူ၏ အချက်အလက်</h2>

    <div class="form-input">
        <label for="other_name_mm">အမည် (မြန်မာ) *</label>
        <input id="other_name_mm" name="other_name_mm" type="text" value="{{$other->name_mm??old('other_name_mm')}}">
    </div>
    <div class="form-input">
        <label for="other_name_eng">အမည် (အင်္ဂလိပ်) *</label>
        <input id="other_name_eng" name="other_name_eng"  type="text"  value="{{$other->name_eng ?? old('other_name_eng')}}">
    </div>
    <div class="form-input">
        <label for="other_race">လူမျိုး *</label>
        <input id="other_race" name="other_race" type="text" value="{{$other->race??old('other_race')}}">
    </div>
    <!-- <div class="form-input">
        <label for="other_religion">ကိုးကွယ်သည့်ဘာသာ *</label>
        <input id="other_religion" name="other_religion" type="text" value="{{$other->religion??old('other_religion')}}" >
    </div> -->
    <div class="form-input">
        <label for="other_religion">ကိုးကွယ်သည့်ဘာသာ *</label>
        <select name="other_religion" @if(!$is_local) required="required" data-rule-required="true"
            data-msg-required="ကိုးကွယ်သည့်ဘာသာ ထည့်ရန်" @endif class="state-select-2">
            <option value="ဗုဒ္ဓဘာသာ" {{"ဗုဒ္ဓဘာသာ" == ($studentDetail->religion ?? '') ? 'selected' : ''}}>ဗုဒ္ဓဘာသာ</option>
            <option value="ခရစ်ယာန်" {{"ခရစ်ယာန်" == ($studentDetail->religion ?? '')? 'selected' : ''}}>ခရစ်ယာန်</option>
            <option value="အစ္စလမ်" {{"အစ္စလမ်" == ($studentDetail->religion ?? '')? 'selected' : ''}}>အစ္စလမ်</option>
            <option value="ဟိန္ဒူ" {{"ဟိန္ဒူ" == ($studentDetail->religion ?? '')? 'selected' : ''}}>ဟိန္ဒူ</option>
            <option value="အခြား" {{"အခြား" == ($studentDetail->religion ?? '')? 'selected' : ''}}>အခြား</option>

        </select>
    </div>

    @if(get_config('form-setting.has_district'))
        @include('user.enrollment.partials.birth_place',['hidden_birth_place' => 'other_hidden_birth_place','birth_place' => 'other_birth_place','data'=> $other ?? '' ])
    @else
        <!-- <div class="form-input">
            <label for="other_township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
            <input id="other_township" name="other_township" type="text" value="{{$other->township??old('other_township')}}" >
        </div>
        <div class="form-input">
            <label for="other_state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
            <select id="other_state" name="other_state"  class="form-control">
                @foreach($states as $key=>$state)
                    <option value="{{$key}}" {{($other->state??old('other_state'))==$state? 'selected':''}}>{{$state}}
                    </option>
                @endforeach
            </select>
        </div> -->

        <div class="form-input">
            <label for="other_state">မွေးဖွားရာ ဇာတိ တိုင်း/ပြည်နယ် *</label>
            <select name="other_state" class="state-select-2 guardian-address-state">
                @if (isset($other_state))
                        <option value="{{$other_state->id??'-'}}">{{$other_state->name??'-'}}</option>
                    @endif
            </select>
        </div>
        <div class="form-input">
            <label for="other_township">မွေးဖွားရာဇာတိ မြို့နယ် *</label>
            <select name="other_township" class="state-select-2 guardian-address-township">
                @if (isset($other))
                    <option value="{{$other->township}}">{{$other->township}}</option>
                @endif
            </select>
        </div>


    @endif
    <!-- <div class="form-input">
        <label for="other_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
        <input id="other_nrc" name="other_nrc"  type="text" value="{{$other->nrc??old('other_nrc')}}" >
    </div> -->
  
  
    @if($is_edit == false)
        <div class="form-input row">
            <label for="nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <div>
                <select id="nrc" name="other_nrc_state" class="guardian-nrc-state nrc">
                <option value=""></option>
                </select>

                <select id="nrc" name="other_nrc_township" class="guardian-nrc-townships nrc">
                <option value=""></option>
                </select>

                <select id="nrc" name="other_nrc_citizenship" class="other-nrc-citizenship nrc">
                    <option value=""></option>
                    <option value="(နိုင်)">(နိုင်)</option>
                    <option value="(ဧည့်)">(ဧည့်)</option>
                    <option value="-">(ပြု)</option>
                    <option value="(သာ)">(သာ)</option>
                </select>

                <input id="nrc" class="other-nrc-no nrc" type="text" name="other_nrc_number" value="">
                <span class="error1 other-nrc-citizenship-error" style="display: none; font-size: 17px;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                    နိုင်ငံသားစိစစ်ရေး မှတ်ပုံတင်အမှတ် ထည့်ရန်
                </span>
            </div>
            
        </div>
    @else
        <div class="form-input">
            <label for="other_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
            <input id="other_nrc" name="other_nrc" type="text" value="{{$other->nrc??old('other_nrc')}}" placeholder="">
        </div>
    @endif

    @if(get_config('form-setting.has_mme'))
        @if($is_edit == false)
            <div class="form-input">
                <label for="nrc">အမျိုးသားမှတ်ပုံတင်အမှတ် *</label>
                <div>
                    <select id="nrc" name="other_nrc2_citizenship" class="nrc2-citizenship">
                        <option value=""></option>
                        <option value="MME">MME</option>
                    </select>
                    <input id="nrc" class="nrc" type="text" name="other_nrc2_number" value="">
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
                <input name="other_nrc2" type="text" value="{{$other->nrc2??old('nrc2')}}" placeholder="">
                <span class="error1" style="display: none;">
                    <i class="error-log fa fa-exclamation-triangle"></i>
                </span>
            </div>
        @endif
    @endif
  
  
    <div class="form-input">
         <label for="other_relation_to_user">တော်စပ်ပုံ *</label>
        <input id="other_relation_to_user" name="other_relation_to_user"
               value="{{$other->relation_to_user??old('other_relation_to_user')}}" type="text">
    </div>

    <div class="form-input">
        <label for="other_work">အခြားအုပ်ထိန်းသူ၏ အလုပ်အကိုင် *</label>
        <input id="other_work" name="other_work"  type="text" value="{{$other->work??old('other_work')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="other_email">Email Address </label>
        <input id="other_email" name="other_email" type="email"
               value="{{$other->data['email']??old('other_email')}}">
    </div>
    <div class="form-input ">
        <div class="is_available">
            <label for="other_availability">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
            <input type="hidden" name="other_availability" value="1">
            <input type="hidden" name="other_is_guardian" value="1">
            <input id="other_is_the_same" class="custom-cb" type="checkbox" name="is_the_same">
        </div>
    </div>
    <div class="form-input">
        <label for="other_address">အခြားအုပ်ထိန်းသူ၏ နေရပ်လိပ်စာ အပြည့်အစုံ *</label>
        <textarea name="other_address" id="other_address" cols="30" >{{$other->address??old('other_address')}}</textarea>
    </div>

    <div class="form-input">
        <label for="other_phone">အခြားအုပ်ထိန်းသူ၏ ဖုန်းနံပါတ်</label>
        <input id="other_phone" name="other_phone" type="number" value="{{$other->phone??old('other_phone')}}" >
    </div>

   
    @if(get_config('form-setting.has_bloodtype'))
    <button data-page="5" name="previous" class="previous glow-on-hover" type="button">နောက်သို့သွားရန်</button>
    <button data-page="4" name="next" class="next glow-on-hover" type="button">ရှေ့သို့သွားရန်</button>
    @else
    <input type="button" data-page="5" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="4" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
    @endif
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-other" id=""><strong>*Online Registration စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>

</fieldset>




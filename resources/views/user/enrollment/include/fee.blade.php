@php
    $support = $enrollment->student->supporters ?? null;

@endphp
<fieldset class="fieldset-margin">

    <h2 class="fs-title">ကျောင်းလခ</h2>

    <h4 class="form-group-title">ကျောင်းနေရန် အထောက်အပံ့ပြုမည့် ပုဂ္ဂိုလ်</h4>
    <div class="form-input">
        <label for="">အမည် *</label>
        <input id="" name="supporter_name" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="အမည် ထည့်ရန်" @endif type="text"
               value="{{$support->name??old('supporter_name')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">မည်သို့တော်စပ်သည် *</label>
        <input id="" name="supporter_relation_to_user" @if(!$is_local) data-rule-required="true"
               data-msg-required="မည်သို့တော်စပ်သည် ထည့်ရန်" required="required" @endif type="text"
               value="{{$support->relation_to_user??old('supporter_relation_to_user')}}"
               placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">အလုပ်အကိုင် *</label>
        <input id="" name="supporter_work" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="အလုပ်အကိုင် ထည့်ရန်" @endif type="text"
               value="{{$support->work??old('supporter_work')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">ဆက်သွယ်ရန်လိပ်စာ *</label>
        <textarea name="supporter_address" id="" cols="30" @if(!$is_local) required="required" data-rule-required="true"
                  data-msg-required="ဆက်သွယ်ရန်လိပ်စာ ထည့်ရန်" @endif>
            {{$supporter->address??old('supporter_address')}}
        </textarea>
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="">ဖုန်းနံပါတ် *</label>
        <input id="" name="supporter_phone" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖုန်းနံပါတ် ထည့်ရန်" @endif type="number"
               value="{{$supporter->phone??old('supporter_phone')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="stipend">ပညာသင်ထောက်ပံ့ကြေးပေးရန် မေတ္တာရပ်ခြင်း ပြု/မပြု (ပြုလျှင် အမှန်ခြစ်ပါ)</label>
        <input type="hidden" name="stipend" value="0">
        <input id="stipend" type="checkbox" name="stipend" value="1"

            {{($enrollment->stipend??old('stipend'))===1? 'checked':''}}
        >
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>
    <div class="form-input">
        <label for="boudoir">ကျောင်းဆောင်လျှောက်ထားခြင်း ပြု/မပြု <br>(* ရန်ကုန်တိုင်းဒေသကြီး စည်ပင်သာယာပြင်ပမှာ
            နေထိုင်သူများသာ ဆန္ဒပြုရန်)</label>
        <input type="hidden" name="boudoir" value="0">
        <input id="boudoir" type="checkbox" name="boudoir" value="1"
            {{($enrollment->boudoir??old('boudoir'))===1? 'checked':''}}>
        <span class="error1" style="display: none;">
            <i class="error-log fa fa-exclamation-triangle"></i>
        </span>
    </div>

    <div class="form-input">
        <label for="current_address">ယခုဆက်သွယ်ရန်လိပ်စာ *</label>
        <input id="current_address" name="current_address" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ယခုဆက်သွယ်ရန်လိပ်စာ ထည့်ရန်" @endif type="text"
               value="{{$enrollment->current_address??old('current_address')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>
    <div class="form-input">
        <label for="current_phone">ဖုန်းနံပါတ် *</label>
        <input id="current_phone" name="current_phone" @if(!$is_local) required="required" data-rule-required="true"
               data-msg-required="ဖုန်းနံပါတ် ထည့်ရန်" @endif type="number"
               value="{{$enrollment->current_phone??old('current_phone')}}" placeholder="">
        <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
    </div>

    <!-- <input type="button" data-page="5" name="previous" class="previous action-button" value="ရှေ့သို့ပြန်သွားရန်"/>
    <input id="submit" class="hs-button primary large action-button next" type="submit" value="Register လုပ်ရန်"> -->
    <button data-page="5" name="previous" class="previous glow-on-hover" type="button">ရှေ့သို့ပြန်သွားရန်</button>
    <button class="next glow-on-hover hs-button primary large action-button" type="button">Register လုပ်ရန်</button>
</fieldset>



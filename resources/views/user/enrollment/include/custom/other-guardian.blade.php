@php
    $parents = $enrollment->student->parentDetails ?? null;
    if($parents){
    $other=$enrollment->student->parentDetails->whereNotIn('relation_to_user',['father','mother','adoptive father','adoptive mother'])
                                                    ->where('name_mm','!=',null)->first();
    }
@endphp

<fieldset class="fieldset-margin">
    <h2 class="fs-title">အခြားအုပ်ထိန်းသူ၏ အချက်အလက်<br><br>
        <small class="adoptive-small-heading">အုပ်ထိန်းသူ/မွေးစားသူ(အုပ်ထိန်းသူများနှင့်နေထိုင်ရသောသူများ သို့မဟုတ် မွေးစားမိဘနှင့်နေရသောသူများအတွက်သာ)</small></h2>

    <div class="form-input">
        <label for="other_name_mm">အမည် (မြန်မာ)</label>
        <input id="other_name_mm" name="other_name_mm" type="text" value="{{$other->name_mm??old('other_name_mm')}}">
    </div>
    <div class="form-input">
        <label for="other_name_mm">အမည် (အင်္ဂလိပ်) </label>
        <input id="other_name_mm" name="other_name_eng" type="text" value="{{$other->name_eng??old('other_name_mm')}}">
    </div>
    <div class="form-input">
        <label for="other_race">လူမျိုး </label>
        <input id="other_race" name="other_race" type="text" value="{{$other->race??old('other_race')}}">
    </div>
    <div class="form-input">
        <label for="other_religion">ကိုးကွယ်သည့်ဘာသာ </label>
        <input id="other_religion" name="other_religion" type="text" value="{{$other->religion??old('other_religion')}}" >
    </div>
    <div class="form-input">
        <label for="other_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
        <input id="other_nrc" name="other_nrc"  type="text" value="{{$other->nrc??old('other_nrc')}}" >
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div class="form-input">
            <label for="">နိုင်ငံသားစိစစ်ရေးကတ်ပြားထုတ်ပေးသည့် ခုနှစ်၊ လ၊ ရက် *</label>
            <input id="" name="other_nrc_issue_date" type="date"
                   value="{{$other->data['nrc_issue_date']??old('other_nrc_issue_date')}}">
        </div>
    @endif
    @if(get_config('form-setting.has_la_wa_ka'))
        <div id="other_death_date">
            <div class="form-input">
                <label for="">သက်ရှိထင်ရှားမရှိပါက ကွယ်လွန်သည့်ခုနှစ် ထည့်ပေးပါရန်</label>
                <input id="" name="other_death_date" type="number" value="{{$other->data['death_date']??old('other_death_date')}}"  max="2019">
            </div>
        </div>
    @endif
    <div class="form-input">
        <label for="other_work">အခြားအုပ်ထိန်းသူ၏ အလုပ်အကိုင် *</label>
        <input id="other_work" name="other_work"  type="text" value="{{$other->work??old('other_work')}}" placeholder="">
    </div>
    <div class="form-input ">
        <div class="is_available">
            <label for="other_availability">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
            <input type="hidden" name="other_availability" value="1">
            <input type="hidden" name="other_is_guardian" value="1">
            <input id="adoptive_other_is_the_same" class="custom-cb" type="checkbox" name="is_the_same">
        </div>
    </div>
    <div class="form-input">
        <label for="adoptive_other_address">အခြားအုပ်ထိန်းသူ၏ နေရပ်လိပ်စာ </label>
        <textarea name="other_address" id="adoptive_other_address" cols="30" >{{$other->address??old('other_address')}}</textarea>
    </div>

    <div class="form-input">
        <label for="other_phone">အခြားအုပ်ထိန်းသူ၏ ဖုန်းနံပါတ်</label>
        <input id="other_phone" name="other_phone" type="number" value="{{$other->phone??old('other_phone')}}" >
    </div>

    <input type="button" data-page="5" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="4" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-other" id=""><strong>*Online Registration စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>

</fieldset>

@push('after-scripts')
    <script>
        $('#adoptive_other_is_the_same').click(function () {
            if ($(this).is(':checked')) {
                $("textarea#adoptive_other_address").val($('#permanent_address').val());
            } else {
                $("textarea#adoptive_other_address").val('');
            }
        });
    </script>
@endpush



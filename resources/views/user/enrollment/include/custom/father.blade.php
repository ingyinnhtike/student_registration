@php
    $parents = $enrollment->student->parentDetails ?? null;
    if($parents){
    $father = $parents->where('relation_to_user','adoptive father')->first();
    }
@endphp

<fieldset class="fieldset-margin">
    <h2 class="fs-title">
        မွေးစားဖခင် အချက်အလက်<br><br>
        <small class="adoptive-small-heading">အုပ်ထိန်းသူ/မွေးစားသူ(အုပ်ထိန်းသူများနှင့်နေထိုင်ရသောသူများ သို့မဟုတ် မွေးစားမိဘနှင့်နေရသောသူများအတွက်သာ)</small>
    </h2>

    <input id="relation_to_user" name="adoptive_father_relation_to_user"  type="hidden" value="Adoptive father">

    <div class="form-input">
        <label for="adoptive_father_name">အမည် (မြန်မာ)</label>
        <input id="adoptive_father_name" name="adoptive_father_name_mm"  type="text"
               value="{{$father->name_mm??old('adoptive_father_name_mm')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="adoptive_father_name">အမည် (အင်္ဂလိပ်) </label>
        <input id="adoptive_father_name" name="adoptive_father_name_eng"  type="text"
               value="{{$father->name_eng ?? old('adoptive_father_name_eng')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="adoptive_father_race">လူမျိုး </label>
        <input id="adoptive_father_race" name="adoptive_father_race"  type="text"
               value="{{$father->race??old('adoptive_father_race')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="adoptive_father_religion">ကိုးကွယ်သည့်ဘာသာ </label>
        <input id="adoptive_father_religion" name="adoptive_father_religion" type="text"
               value="{{$father->religion??old('adoptive_father_religion')}}">
    </div>
    <div class="form-input">
        <label for="adoptive_father_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်*</label>
        <input id="adoptive_father_nrc" name="adoptive_father_nrc" type="text"
               value="{{$father->nrc??old('adoptive_father_nrc')}}"
               placeholder="">
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div class="form-input">
            <label for="">နိုင်ငံသားစိစစ်ရေးကတ်ပြားထုတ်ပေးသည့် ခုနှစ်၊ လ၊ ရက် *</label>
            <input id="" name="adoptive_father_nrc_issue_date" type="date"
                   value="{{$father->data['nrc_issue_date']??old('adoptive_father_nrc_issue_date')}}">
        </div>
    @endif
    <div class="form-input ">
        <div class="is_available">
            <label for="adoptive_father_availability">သက်ရှိထင်ရှား ရှိ/မရှိ<br> (ရှိလျှင်အမှန်ခြစ်ပါ)</label>
            <input type="hidden" name="adoptive_father_availability" value="0">
            <input id="adoptive_father_availability" class="custom-cb" type="checkbox" name="adoptive_father_availability" value="1"
                {{($father->availability??old('adoptive_father_availability'))==1? 'checked':''}}
                >
        </div>
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div id="adoptive_father_death_date">
        <div class="form-input">
            <label for="">သက်ရှိထင်ရှားမရှိပါက ကွယ်လွန်သည့်ခုနှစ် ထည့်ပေးပါရန်</label>
            <input id="" name="adoptive_father_death_date" type="number"
                   value="{{$father->data['death_date']??old('adoptive_father_death_date')}}">
        </div>
        </div>
    @endif
    <div id="adoptive_father_is_available">
        <div class="form-input ">
            <div class="is_available">
                <label for="adoptive_father_is_guardian">အုပ်ထိန်းသူဖြစ်သည်</label>
                <input type="hidden" name="adoptive_father_is_guardian" value="0">
                <input id="adoptive_father_is_guardian" class="custom-cb" type="checkbox" name="adoptive_father_is_guardian" value="1"
                    {{($father->data['is_guardian']??old('adoptive_father_is_guardian'))==1? 'checked':''}}
                    >
            </div>
        </div>
        <div class="form-input">
            <label for="adoptive_father_work">မွေးစားဖခင်၏ အလုပ်အကိုင် *</label>
            <input id="adoptive_father_work" name="adoptive_father_work" type="text" value="{{$father->work??old('adoptive_father_work')}}" >
        </div>
        <div class="form-input ">
            <div class="is_available">
                <label for="is_available">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
                <input id="adoptive_father_is_the_same" class="custom-cb" type="checkbox" name="is_the_same">
            </div>
        </div>
        <div class="form-input">
            <label for="adoptive_father_address">မွေးစားဖခင်၏ နေရပ်လိပ်စာ</label>
            <textarea name="adoptive_father_address" id="adoptive_father_address" cols="30" >{{$father->address??old('adoptive_father_address')}}</textarea>
        </div>
    </div>
    <input type="button" data-page="3" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="2" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-father" id=""><strong>*Online Registration
            စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>
</fieldset>

@push('after-scripts')
    <script>
        $(document).ready(function () {
           $('#adoptive_father_is_available').hide();
        });
        $('#adoptive_father_availability').click(function () {
            if ($(this).is(':checked')) {
                $('#adoptive_father_is_available').show();
                $('#adoptive_father_death_date').hide();
            } else {
                $('#adoptive_father_is_available').hide();
                $('#adoptive_father_death_date').show();
            }
        });
        $('#adoptive_father_is_the_same').click(function () {
            if ($(this).is(':checked')) {
                $("textarea#adoptive_father_address").val($('#permanent_address').val());
            } else {
                $("textarea#adoptive_father_address").val('');
            }
        });
    </script>
@endpush



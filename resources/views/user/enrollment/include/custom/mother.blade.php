@php
    $parents = $enrollment->student->parentDetails ?? null;
    if($parents){
    $mother = $parents->where('relation_to_user','adoptive mother')->first();
    }
@endphp

<fieldset class="fieldset-margin">
    <h2 class="fs-title">မွေးစားမိခင် အချက်အလက်<br><br>
        <small class="adoptive-small-heading">အုပ်ထိန်းသူ/မွေးစားသူ(အုပ်ထိန်းသူများနှင့်နေထိုင်ရသောသူများ သို့မဟုတ် မွေးစားမိဘနှင့်နေရသောသူများအတွက်သာ)</small></h2>
    <input id="relation_to_user" name="adoptive_mother_relation_to_user"  type="hidden" value="Adoptive mother">

    <div class="form-input">
        <label for="adoptive_mother_name">အမည် (မြန်မာ)</label>
        <input id="adoptive_mother_name" name="adoptive_mother_name_mm"  type="text"
               value="{{$mother->name_mm??old('adoptive_mother_name_mm')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="adoptive_mother_name">အမည် (အင်္ဂလိပ်) </label>
        <input id="adoptive_mother_name" name="adoptive_mother_name_eng"  type="text"
               value="{{$mother->name_eng??old('adoptive_mother_name_eng')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="adoptive_mother_race">လူမျိုး </label>
        <input id="adoptive_mother_race" name="adoptive_mother_race"  type="text"
               value="{{$mother->race??old('adoptive_mother_race')}}" placeholder="">
    </div>
    <div class="form-input">
        <label for="adoptive_mother_religion">ကိုးကွယ်သည့်ဘာသာ </label>
        <input id="adoptive_mother_religion" name="adoptive_mother_religion" type="text"
               value="{{$mother->religion??old('adoptive_mother_religion')}}">
    </div>
    <div class="form-input">
        <label for="adoptive_mother_nrc">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်*</label>
        <input id="adoptive_mother_nrc" name="adoptive_mother_nrc" type="text"
               value="{{$mother->nrc??old('adoptive_mother_nrc')}}"
               placeholder="">
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div class="form-input">
            <label for="">နိုင်ငံသားစိစစ်ရေးကတ်ပြားထုတ်ပေးသည့် ခုနှစ်၊ လ၊ ရက် *</label>
            <input id="" name="adoptive_mother_nrc_issue_date" type="date"
                   value="{{$mother->data['nrc_issue_date']??old('adoptive_mother_nrc_issue_date')}}">
        </div>
    @endif
    <div class="form-input ">
        <div class="is_available">
            <label for="adoptive_mother_availability">သက်ရှိထင်ရှား ရှိ/မရှိ<br> (ရှိလျှင်အမှန်ခြစ်ပါ)</label>
            <input type="hidden" name="adoptive_mother_availability" value="0">
            <input id="adoptive_mother_availability" class="custom-cb" type="checkbox" name="adoptive_mother_availability" value="1"
                {{($mother->availability??old('adoptive_mother_availability'))==1? 'checked':''}}>
        </div>
    </div>
    @if(get_config('form-setting.has_la_wa_ka'))
        <div id="adoptive_mother_death_date">
        <div class="form-input">
            <label for="">သက်ရှိထင်ရှားမရှိပါက ကွယ်လွန်သည့်ရက်စွဲ ထည့်ပေးပါရန်</label>
            <input id="" name="adoptive_mother_death_date" type="date"
                   value="{{$mother->data['death_date']??old('adoptive_mother_death_date')}}">
        </div>
        </div>
    @endif
    <div id="adoptive_mother_is_available">
        <div class="form-input ">
            <div class="is_available">
                <label for="adoptive_mother_is_guardian">အုပ်ထိန်းသူဖြစ်သည်</label>
                <input type="hidden" name="adoptive_mother_is_guardian" value="0">
                <input id="adoptive_mother_is_guardian" class="custom-cb" type="checkbox" name="adoptive_mother_is_guardian" value="1"
                    {{($mother->data['is_guardian']??old('adoptive_mother_is_guardian'))==1? 'checked':''}}>
            </div>
        </div>
        <div class="form-input">
            <label for="adoptive_mother_work">မွေးစားမိခင်၏ အလုပ်အကိုင် *</label>
            <input id="adoptive_mother_work" name="adoptive_mother_work" type="text"
                   value="{{$mother->work??old('adoptive_mother_work')}}" >
        </div>
        <div class="form-input ">
            <div class="is_available">
                <label for="is_available">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
                <input id="adoptive_mother_is_the_same" class="custom-cb" type="checkbox" name="is_the_same">
            </div>
        </div>
        <div class="form-input">
            <label for="adoptive_mother_address">မွေးစားမိခင်၏ နေရပ်လိပ်စာ</label>
            <textarea name="adoptive_mother_address" id="adoptive_mother_address" cols="30" >
                {{$mother->address??old('adoptive_mother_address')}}
            </textarea>
        </div>
    </div>
    <input type="button" data-page="3" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="2" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-mother" id=""><strong>*Online Registration
            စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>
</fieldset>

@push('after-scripts')
    <script>
        $(document).ready(function () {
           $('#adoptive_mother_is_available').hide();
        });
        $('#adoptive_mother_availability').click(function () {
            if ($(this).is(':checked')) {
                $('#adoptive_mother_is_available').show();
                $('#adoptive_mother_death_date').hide();
            } else {
                $('#adoptive_mother_is_available').hide();
                $('#adoptive_mother_death_date').show();
            }
        });
        $('#adoptive_mother_is_the_same').click(function () {
            if ($(this).is(':checked')) {
                $("textarea#adoptive_mother_address").val($('#permanent_address').val());
            } else {
                $("textarea#adoptive_mother_address").val('');
            }
        });
    </script>
@endpush



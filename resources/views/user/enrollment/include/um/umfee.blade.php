@php
    $scholarship = $enrollment->student->scholarships ?? null;

@endphp
<fieldset class="fieldset-margin">

    <h2 class="fs-title">@if(! get_config('form-setting.is_diploma'))ကျောင်းလခ@endif</h2>

    @if(get_config('form-setting.is_diploma'))
    <div class="form-input">
        <div class="has_scholar">
            <label for="stipend">ပညာသင်ထောက်ပံ့ကြေး <br>ရှိ/မရှိ (ရှိလျှင်အမှန်ခြစ်ပါ)</label>
            <input type="hidden" name="stipend" value="0">
            <input id="stipend" type="checkbox" class="custom-cb" name="stipend"
                   value="1" {{($enrollment->stipend??old('stipend'))==1? 'checked':''}}>
        </div>
    </div>

    <div class="form-input ">
        <div class="has_scholar">
            <label for="has_scholar">ပညာသင်ဆုခံစားခွင့်ရရှိထားခြင်း ရှိ/မရှိ (ရှိလျှင်အမှန်ခြစ်ပါ)</label>
            <input id="has_scholar" class="custom-cb" type="checkbox"
                   name="has_scholar" {{($scholarship->name??old('scholar_name'))!=''?'checked':''}}>
        </div>
    </div>
    <div id="scholar">
        <div id='add-scholar' {!!  ($scholarship->name??old('scholar_name'))!=''?'':'style="display: none"'!!} >
            <div class='form-input'>
                <label for='name'>ဆုအမည်</label>
                <input id='name' name='scholar_name' type='text' value='{{$scholarship->name??old('scholar_name')}}'>
            </div>
            <div class='form-input'>
                <label for='organization'>ချီးမြှင့်သည့် အဖွဲ့အစည်း</label>
                <input id='organization' name='scholar_organization' type='text'
                       value='{{$scholarship->organization??old('scholar_organization')}}'>
            </div>
            <div class='form-input'>
                <label for='amount'>လစဥ်ဆုငွေကျပ်</label>
                <input id='amount' name='scholar_amount' type='number'
                       value='{{$scholarship->amount??old('scholar_amount')}}'>
            </div>
        </div>
    </div>
    <div class="form-input ">
        <div class="is_the_same">
            <label for="is_the_same">အမြဲတမ်းနေထိုင်သည့် <br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
            <input id="current_is_the_same" class="custom-cb" type="checkbox" name="current_is_the_same">
        </div>
    </div>
    <div class="form-input">
        <label for="current_address">{{get_config('form-setting.current_address')}}</label>
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
    @if(get_config('form-setting.has_boudoir'))
        <div class="form-input ">
            <div class="has_boudoir">
                <label for="has_boudoir">အဆောင်နေ/မနေ (နေလျှင်အမှန်ခြစ်ပါ)</label>
                <input id="has_boudoir" class="custom-cb" type="checkbox"
                       name="has_boudoir" {{($enrollment->boudoir??old('boudoir'))===1? 'checked':''}}>
            </div>
        </div>
        <div id="boudoir">
            @php($studentDetail = $enrollment->student->studentDetail??null)
            <div id='add-boudoir'>
                <div class='form-input'>
                    <label for='name'>ကျောင်းဆောင်သား/သူ ကျောင်းဆောင်သူ မှတ်ပုံတင်အမှတ်</label>
                    <input id='name' name='boudoir_no' type='text'
                           value='{{$studentDetail->data['boudoir_no']??old('boudoir_no')}}'>
                </div>
                <div class='form-input'>
                    <label for='room_no'>အခန်းအမှတ်</label>
                    <input id='room_no' name='boudoir_room_no' type='text'
                           value='{{$studentDetail->data['room_no']??old('room_no')}}'>
                </div>
                <div class='form-input'>
                    <label for='boudoir_name'>အဆောင်အမည်</label>
                    <input id='boudoir_name' name='boudoir_name' type='text'
                           value='{{$studentDetail->data['boudoir_name']??old('boudoir_name')}}'>
                </div>
            </div>
        </div>
    @endif
    @endif
    @cannot('enroll.update')
        @if(get_config('form-setting.is_diploma'))
            {!! get_config('form-setting.diploma_terms') !!}
        @else
            {!! get_config('form-setting.terms_and_conditions') !!}
        @endif
        <br>
        {!! get_config('form-setting.terms_and_conditions') !!}
        <div class="form-input ">
            <div class="is_confirm">
                <label for="is_confirm">{{get_config('form-setting.confirmation')}}</label>
                <input id="is_confirm" class="custom-cb" type="checkbox" name="is_confirm">
            </div>
        </div>
    @endcannot

    @can('enroll.update')
        @if(isset($form) && $form->isApproved())
            <input id="is_approve" class="custom-cb" type="hidden" name="is_approve" value="1">
        @else
            <div class="form-input ">
                <div class="is_confirm">
                    <label for="is_approve">Approve လုပ်ရန်</label>
                    <input id="is_approve" class="custom-cb" type="checkbox" name="is_approve" value="1">
                </div>
            </div>
        @endif
    @endcan

    <br>
    <input type="button" data-page="7" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input id="submit" class="hs-button primary large action-button next" type="submit" value="{{auth()->user()->can('enroll.update')?'Update လုပ်ရန်':'Register လုပ်ရန်'}}">

</fieldset>

@push('after-scripts')
    <script>
        @cannot('enroll.update')
        $(document).ready(function () {
                    $('#submit').attr("disabled", true);
                    $('#submit').css({"opacity": 0.5});
                    $('#add-boudoir').hide();
                });
        @endcannot
</script>
@endpush



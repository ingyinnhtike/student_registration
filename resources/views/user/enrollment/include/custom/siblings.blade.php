@php
    @endphp

<fieldset class="fieldset-margin">
    <h2 class="fs-title">ညီအစ်ကိုမောင်နှမများ၏ အချက်အလက်</h2>
    @for($key = 0; $key<4;$key++)
        @php($sibling = $siblings[$key]??null)
        <div id="add-more-siblings">
            <div class="form-input">
                <label for="sibling_name_{{$key}}">အမည် </label>
                <input id="sibling_name_{{$key}}" name="siblings[{{$key}}][name]" type="text"
                       value="{{$sibling->name??old("siblings[$key][name]")}}">
            </div>
            <div class="form-input">
                <label for="sibling_nrc_{{$key}}">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် *</label>
                <input id="sibling_nrc_{{$key}}" name="siblings[{{$key}}][nrc]" type="text"
                       value="{{$sibling->nrc??old("siblings[$key][nrc]")}}">
            </div>
            @if(get_config('form-setting.has_la_wa_ka'))
                <div class="form-input">
                    <label for="">နိုင်ငံသားစိစစ်ရေးကတ်ပြားထုတ်ပေးသည့် ခုနှစ်၊ လ၊ ရက် *</label>
                    <input id="" name="siblings[{{$key}}][nrc_issued_at]" type="date"
                           value="{{$sibling->nrc_issued_at??old("siblings[$key][nrc_issued_at]")}}">
                </div>
            @endif
            <div class="form-input">
                <label for="sibling_work_{{$key}}">အလုပ်အကိုင် *</label>
                <input id="sibling_work_{{$key}}" name="siblings[{{$key}}][work]" type="text"
                       value="{{$sibling->work??old("siblings[$key][work]")}}"
                       placeholder="">
            </div>
            <div class="form-input ">
                <div class="is_available">
                    <label for="sibling_availability">ကျောင်းသား၏ အမြဲတမ်း<br>နေရပ်လိပ်စာနှင့် တူညီသည်</label>
                    <input id="sibling_is_the_same_{{$key}}" class="custom-cb" type="checkbox" name="is_the_same">
                </div>
            </div>
            <div class="form-input">
                <label for="sibling_address_{{$key}}">နေရပ်လိပ်စာ </label>
                <textarea name="siblings[{{$key}}][address]" id="sibling_address_{{$key}}"
                          cols="30">{{$sibling->address??old("siblings[$key][address]")}}</textarea>
            </div>
        </div>
        <hr/>

    @endfor

    <input type="button" data-page="5" name="previous" class="previous action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="4" name="next" class="next action-button" value="ရှေ့သို့သွားရန်"/>
    <div class="explanation btn btn-small modal-trigger" data-modal-id="help-sibling" id=""><strong>*Online Registration
            စနစ်ဖြင့်ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်များ*</strong></div>

</fieldset>

@push('after-scripts')
    <script>
        @for($key = 0; $key<4;$key++)
        $('#sibling_is_the_same_{{$key}}').click(function () {
            if ($(this).is(':checked')) {
                $("textarea#sibling_address_{{$key}}").val($('#permanent_address').val());
            } else {
                $("textarea#sibling_address_{{$key}}").val('');

            }
        });
        @endfor
    </script>
@endpush



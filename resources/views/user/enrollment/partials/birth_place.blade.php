@if($is_edit)
    <div class="form-input" style="margin-bottom: 10px;">
        <label for="">မွေးဖွားရာဇာတိ မြို့နယ်*</label>
        @if($data != '')
            @if(is_numeric($data->township))
                {{$data->townshipName??'-'}}မြို့နယ်,
            @else
                {{$data->township??'-'}},
            @endif
            @if(is_numeric($data->data['district']??'-'))
                {{$data->districtName??'-'}}ခရိုင်,
            @endif
            {{$data->stateName??'-'}}
            <input type="hidden" name="{{$hidden_birth_place}}" value="{{$data->township}}">
        @endif
    </div>
@endif
<div class="form-input">
    @if(!$is_edit)
        <label for="">မွေးဖွားရာဇာတိ မြို့နယ်*</label>
    @endif

    <select name="{{$birth_place}}"
            @if(!$is_local && ($birth_place != 'other_birth_place') && !$is_edit) required="required"
            data-rule-required="true"
            data-msg-required="မွေးဖွားရာဇာတိ မြို့နယ်် ရွေးချယ်ရန်" @endif class="birth-place-select-2">
{{--        <option></option>--}}
    </select>
</div>

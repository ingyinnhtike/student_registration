@if($data && is_numeric($data->township))
    {{$data->townshipName??'-'}}မြို့နယ်,
@else
    {{$data->township??'-'}},
@endif
@if($data &&  is_numeric($model->data['district']??'-'))
    {{$data->districtName??'-'}}ခရိုင်,
@endif
{{$data->stateName??'-'}}

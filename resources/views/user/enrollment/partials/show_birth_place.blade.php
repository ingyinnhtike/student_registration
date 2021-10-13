<h5>Born at<span>:</span>
    @if($model && is_numeric($model->township))
        {{$model->townshipName??'-'}}မြို့နယ်,
    @else
        {{$model->township??'-'}},
    @endif
    @if($model &&  is_numeric($model->data['district']??'-'))
        {{$model->districtName??'-'}}ခရိုင်,
    @endif
    {{$model->stateName??'-'}}
</h5>

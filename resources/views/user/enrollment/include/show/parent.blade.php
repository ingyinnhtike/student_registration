<div class="col-md-4">
    <div class="card card-nav-tabs">
        <div class="card-header card-header-custom">
            <h4 class="card-title">{{$title}} Information</h4>
        </div>
        <div class="card-body detail-page">
            <h5>Name(Myanmar)<span>:</span> {{$detail->name_mm??'-'}}</h5>
            <h5>Name(English)<span>:</span> {{$detail->name_eng??'-'}}</h5>
            <h5>Race and Religion<span>:</span> {{$detail->race??'-'}}, {{$detail->religion??'-'}}</h5>
            @include('user.enrollment.partials.show_birth_place',['model'=>$detail])
{{--            <h5>Born at<span>:</span> {{$detail->township??'-'}}, {{$detail->stateString??'-'}}</h5>--}}
            <h5>NRC<span>:</span>{{$detail->nrc??'-'}}</h5>
            
            @if(get_config('form-setting.has_mme'))
            <h5>NRC2<span>:</span> {{$detail->nrc2??'-'}}</h5>
            @endif
            
            <h5>Status<span>:</span>{{$detail->availabilityString??'-'}}</h5>
            <h5>Guardian<span>:</span>{{($detail->data['is_guardian']??0)!=0?'Yes':'No'}}</h5>
            <h5>Relation To Student<span>:</span>{{$detail->relation_to_user??'-'}}</h5>
            <h5>Work<span>:</span>{{$detail->work??'-'}}</h5>
            <h5>Email<span>:</span>{{$detail->data['email']??'-'}}</h5>
            <h5>Address<span>:</span>{{$detail->address??'-'}}</h5>
            <h5>Phone<span>:</span>{{$detail->phone??'-'}}</h5>
        </div>
    </div>
</div>


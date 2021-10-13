<h2>{{$title}}</h2>
<div class="custom-control custom-checkbox col-3">
    <input type="checkbox" class="custom-control-input select_all" id="select_all_{{$title}}"
           value="select_all" data-class-name="{{$title}}">
    <label class="custom-control-label" for="select_all_{{$title}}"
    >Select All</label>
</div>
<div class="row">
    @foreach($columns as $key=>$index)
        <div class="custom-control custom-checkbox col-3">
            <input type="checkbox" class="custom-control-input {{$title}}" id="defaultUnchecked_{{$title}}_{{$key}}"
                   value="{{$index}}" name="{{$title}}[{{$key}}]">
            <label class="custom-control-label" for="defaultUnchecked_{{$title}}_{{$key}}"
            >{{$key}}</label>
        </div>
    @endforeach
</div>
<hr/>

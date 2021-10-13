@csrf
<div class="card-body col-md-4">
    <h4 class="text-center text-black">Major</h4>
    @include('admin.partials.form_input',['title'=>'မြန်မာအမည်','name'=>'name','value'=>$major->name??''])
    @include('admin.partials.form_input',['title'=>'English Name','name'=>'name_en','value'=>$major->name_en??''])
    @include('admin.partials.form_input',['title'=>'Key','name'=>'key','value'=>$major->key??''])
</div>

<button class="btn btn-primary" type="submit">
    {{isset($is_edit)&&$is_edit?'Update':'Create'}}
</button>

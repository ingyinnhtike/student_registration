@csrf
<div class="card-body col-md-4">
    <h4 class="text-center text-black">သင်တန်းကြေး</h4>
    @include('admin.partials.form_input',['title'=>'မြန်မာအမည်','name'=>'name','value'=>$fee->name??''])
    @include('admin.partials.form_input',['title'=>'English Name','name'=>'name_en','value'=>$fee->name_en??''])
</div>

<button class="btn btn-primary" type="submit">
    {{isset($is_edit)&&$is_edit?'Update':'Create'}}
</button>

@csrf
<div class="card-body col-md-4">
    <h4 class="text-center text-black">ခွင့်ပြုချက်</h4>
    @include('admin.partials.form_input',['title'=>'key(Route Name)','name'=>'name','value'=>$permission->name??''])
    @include('admin.partials.form_input',['title'=>'User ကိုပြရန်နာမည်','name'=>'display_name','value'=>$permission->display_name??''])
</div>

<button class="btn btn-primary" type="submit">
    {{isset($is_edit)&&$is_edit?'Update':'Create'}}
</button>

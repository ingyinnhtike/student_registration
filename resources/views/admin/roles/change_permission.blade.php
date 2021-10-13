@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.permission.change.update')}}" method="post">
        @csrf
        <div class="col-md-12">
            @foreach($roles as $role)
                <h2>{{$role->name}}</h2>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="custom-control custom-checkbox col-3">
                            <input type="checkbox" class="custom-control-input {{$role->id}}"
                                   id="defaultUnchecked_{{$role->id}}_{{$permission->id}}"
                                   {{$role->hasPermissionTo($permission->name)?'checked':''}}
                                   value="{{$permission->id}}" name="{{$role->id}}[{{$permission->id}}]">
                            <label class="custom-control-label" for="defaultUnchecked_{{$role->id}}_{{$permission->id}}"
                            >{{$permission->display_name}}</label>
                        </div>
                    @endforeach
                </div>
                <hr/>

            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection

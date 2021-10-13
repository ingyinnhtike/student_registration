@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.role.change.update')}}" method="post">
        @csrf
        <div class="col-md-12">
            @foreach($admins as $admin)
                <h2>{{$admin->name}}</h2>
                <div class="row">
                    @foreach($roles as $role)
                        <div class="custom-control custom-checkbox col-3">
                            <input type="checkbox" class="custom-control-input {{$admin->id}}"
                                   id="defaultUnchecked_{{$admin->id}}_{{$role->id}}"
                                   {{$admin->hasRole($role->name)?'checked':''}}
                                   value="{{$role->id}}" name="{{$admin->id}}[{{$role->id}}]">
                            <label class="custom-control-label" for="defaultUnchecked_{{$admin->id}}_{{$role->id}}"
                            >{{$role->name}}</label>
                        </div>
                    @endforeach
                </div>
                <hr/>

            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection

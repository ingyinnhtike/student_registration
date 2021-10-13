@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.fee.update',$fee->id)}}" method="POST">
        @method('PUT')
        @include('admin.fee.form',['fee'=>$fee,'is_edit'=>true])
    </form>

@endsection

@push('scripts')

@endpush


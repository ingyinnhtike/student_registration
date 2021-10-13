@extends('admin.layouts.master')
@section('content')

    @if($status>=0)
        @include('admin.partials.datetimepicker',['url'=>route('admin.acceptance.index',['accept_type'=>'approve','status'=>$status]),'date_type'=>$status==0?'created_at':'approved_at'])
    @else
        @include('admin.partials.datetimepicker',['url'=>route('admin.acceptance.index'),'date_type'=>'created_at'])
    @endif
    {!! $dataTable->table() !!}
    @include('admin.partials.accepted',['url'=>route('admin.acceptance.approve')])
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

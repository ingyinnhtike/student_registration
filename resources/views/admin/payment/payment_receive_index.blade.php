@extends('admin.layouts.master')
@section('content')
    @if($status>=0)
        @include('admin.partials.datetimepicker',['url'=>route('admin.payment_receive.index',['accept_type'=>'payment','status'=>$status]),'date_type'=>$status ==0?'approved_at':'payment_received_at'])
    @else
        @include('admin.partials.datetimepicker',['url'=>route('admin.payment_receive.index'),'date_type'=>'created_at'])
    @endif

{!! $dataTable->table() !!}
@include('admin.partials.accepted',['url'=>route('admin.payment_receive.approve')])
@endsection
@push('scripts')
{!! $dataTable->scripts() !!}
@endpush

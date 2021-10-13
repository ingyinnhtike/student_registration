@extends('admin.layouts.master')
@section('content')
    @if(isset($form_type))
        @include('admin.partials.datetimepicker',['url'=>route('admin.invoices.index',['form_type'=>$form_type]),'date_type'=>'invoices.payment_received_at'])
    @endif
    {!! $dataTable->table() !!}
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush

@extends('admin.layouts.master')
@section('content')
    {!! $dataTable->table() !!}
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
    <script>
        function approve(e) {
            console.log($(e).data());
        }
    </script>
@endpush


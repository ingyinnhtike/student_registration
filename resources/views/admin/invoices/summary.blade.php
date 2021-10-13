@extends('admin.layouts.master')
@section('content')
    <form action="{{route('admin.invoices.summary')}}">

        <select class="form-control col-md-3" name="type">
            @foreach($formTypes as $formType)
                <option value="{{$formType->id}}">{{$formType->name}}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    @if($invoices)

    @endif
@endsection
@push('scripts')
    <script>

    </script>
@endpush

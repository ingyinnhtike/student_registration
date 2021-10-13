@extends('admin.layouts.master')
@section('content')
    <form id="custom_export_form" action="{{route('admin.report.excel')}}" autocomplete="off" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <select class="form-control" required name="date_type" id="date_type">
                    <option disabled selected value>ဖောင်အမျိုးအစား</option>
                    <option value="created_at">အားလုံး</option>
                    <option value="approved_at">ကျောင်းသားရေးရာစစ်ဆေးပြီး</option>
                    <option value="payment_received_at">ငွေသွင်းပြီး</option>
                </select>
            </div>

            <div class='col-md-3'>
                <div class="form-group">
                    <div class="input-group date">
                        <input type="text" id="start_date_picker" class="form-control text-center datetimepicker-input"
                               data-toggle="datetimepicker" data-target="#start_date_picker"
                               required
                               placeholder="From" name="start_date"/>

                    </div>
                </div>
            </div>
            <div class='col-md-3'>
                <div class="form-group">
                    <div class="input-group date">
                        <input type="text" id="end_date_picker" class="form-control text-center datetimepicker-input"
                               required
                               data-toggle="datetimepicker" data-target="#end_date_picker"
                               name="end_date"
                               placeholder="To"/>

                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.excel_columns',['title'=>'သင်တန်းနှစ်','columns'=>$years])
        @include('admin.partials.excel_columns',['title'=>'အဓိကဘာသာ','columns'=>$majors])

        @foreach($reports as $title=>$columns)
            @include('admin.partials.excel_columns',['title'=>$title,'columns'=>$columns])
        @endforeach

        <button type="submit" class="form-control btn btn-primary col-md-3">Download Report</button>
    </form>
@endsection
@push('scripts')
    <script>
        $('#start_date_picker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
        $('#end_date_picker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            useCurrent: false
        });
        $("#start_date_picker").on("change.datetimepicker", function (e) {
            $('#end_date_picker').datetimepicker('minDate', e.date);
        });
        $("#end_date_picker").on("change.datetimepicker", function (e) {
            $('#start_date_picker').datetimepicker('maxDate', e.date);
        });

        $('.select_all').on('change', function (e) {
            var className = $(this).data('class-name');
            $('.' + className).prop('checked', this.checked);
        });

    </script>
@endpush

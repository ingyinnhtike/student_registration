@if(request()->has('date_type'))
    <div class="alert alert-primary text-center">
    <span>From:</span>
    <span class="text">{{request()->get('start_date')}}</span>
    <span> to:</span>
    <span>{{request()->get('end_date')}}</span>
    </div>
@endif
<form autocomplete="off" method="GET" action="{{$url}}">
    <div class="row">
        @if(!isset($date_type))
            <div class="col-md-3">
                <select class="form-control" required name="date_type" id="date_type">
                    <option disabled selected value>Choose Date Type</option>
                    <option value="created_at">Created Date</option>
                    <option value="updated_at">Updated Date</option>
                </select>
            </div>
        @else($date_type)
            <input type="hidden" value="{{$date_type}}" required name="date_type" id="date_type">
        @endif
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
        <div class="col-md-3">
            @if(!isset($is_exposable)|| $is_exposable)
                <a href="{{$url}}" id="excel" class="btn btn-info">Excel</a>
            @endif
            <button type="submit" class="btn btn-info">Search</button>
        </div>
    </div>
</form>
@push('scripts')
    <script type="text/javascript">
        $(function () {
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
            @if(!isset($is_exposable) || $is_exposable)
            $('#excel').on('click', function (e) {
                e.preventDefault();
                var dateType = $('#date_type').val();
                var startDate = $('#start_date_picker').val();
                var endDate = $('#end_date_picker').val();

                if (!dateType) {

                } else if (!startDate) {

                } else if (!endDate) {

                } else {
                    var url = e.target.getAttribute('href');
                    if (!url.includes('?')) {
                        url += '?action=excel';
                    } else {
                        url += "&action=excel";
                    }
                    url += "&date_type=" + dateType + "&start_date=" + startDate + "&end_date=" + endDate;
                    /*var url = e.target.getAttribute('href') +  "&date_type=" + dateType + "&start_date=" + startDate + "&end_date=" + endDate;*/
                    window.location.assign(url);
                    //console.log(url);
                }


            });
            @endif
        });


    </script>
@endpush


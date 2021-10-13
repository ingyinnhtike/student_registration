@extends('admin.layouts.master')

@section('content')
    {{--@include('admin.partials.datetimepicker',['url'=>route('admin.dashboard'),'date_type'=>'created_at','is_exposable'=>false])--}}
    <form id="form_summary" action="{{route('admin.dashboard.summary')}}" autocomplete="off" method="POST">
        @csrf

        @include('admin.partials.excel_columns',['title'=>'သင်တန်းနှစ်','columns'=>$years])
        @include('admin.partials.excel_columns',['title'=>'အဓိကဘာသာ','columns'=>$majors])
        <button type="submit" class="form-control btn btn-primary col-md-3 mb-3">Calculate</button>
    </form>
    <div class="row" id="summary_append">

    </div>
@endsection
@push('scripts')
    <script>
        const colors = [
            'bg-red',
            'bg-aqua',
            'bg-purple',
            'bg-blue',
            'bg-navy',
            'bg-teal',
            'bg-maroon',
            'bg-black',
            'bg-gray',
            'bg-olive',
            'bg-lime',
            'bg-orange',
            'bg-fuchsia',

        ];
        $(document).ready(function () {
            submitForm();

            function submitForm() {
                var form = $('#form_summary');
                var data = form.serialize();
                fetchCourses(data);
            }

            $('.select_all').on('change', function (e) {
                var className = $(this).data('class-name');
                $('.' + className).prop('checked', this.checked);
            });

            $('#form_summary').submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var data = form.serialize();
                fetchCourses(data);
            });

            function fetchCourses(data) {
                var url = '{{route('admin.dashboard.summary')}}';
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    success: function (response) {
                        let divToAppend = $('#summary_append');
                        divToAppend.html('');
                        response.data.forEach(function (course, index) {
                            let totalColors = colors.length;
                            let backgroundColor = colors[course.year.id % totalColors];
                            divToAppend.append(
                                "<div class=\"col-lg-3 col-xs-6\">\n" +
                                "                <!-- small box -->\n" +
                                "                <div class=\"small-box " + backgroundColor + "\">\n" +
                                "                    <div class=\"inner\">\n" +
                                "                        <h3>" + course.total + "</h3>\n" +
                                "\n" +
                                "                        <p>" + course.major.name + "</p>\n" +
                                "                        <p>" + course.year.name + "</p>\n" +
                                "                    </div>\n" +
                                "                    <div class=\"icon\">\n" +
                                "                        <i class=\"fa fa-user\"></i>\n" +
                                "                    </div>\n" +
                                "                    {{--                    <a href=\"{{$info->url}}\" class=\"small-box-footer\">More info <i--}}\n" +
                                "                    {{--                            class=\"fa fa-arrow-circle-right\"></i></a>--}}\n" +
                                "                </div>\n" +
                                "            </div>"
                            );
                        });
                    }
                });
            }
        });
    </script>
@endpush

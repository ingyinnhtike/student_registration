@extends('layouts.form')

@section('title', 'Enrollment Form')

@section('content')

    <form class="steps" action="{{route('enroll.update',['enroll'=>$form->id])}}" accept-charset="UTF-8"
          enctype="multipart/form-data" method="post" novalidate="">
        @csrf
        @method('PUT')
        <ul id="progressbar" class="{{get_config('form-setting.progress_bar')}}">
            <li class="active" id="one">သင်တန်းအချက်အလက်</li>
            <li id="two">ကျောင်းသားအချက်အလက်</li>
            <li id="three">ဖခင်<br>အချက်အလက်</li>
            <li id="four">မိခင်<br>အချက်အလက်</li>
            @if(get_config('form-setting.is_siblings_required'))
                <li id="five">ညီအစ်ကိုမောင်နှမ<br>အချက်အလက်</li>
                <li id="six">မွေးစားဖခင်<br>အချက်အလက််</li>
                <li id="seven">မွေးစားမိခင်<br>အချက်အလက်</li>
            @endif
            @if(get_config('form-setting.is_diploma'))
            <li id="five">အခြားအုပ်ထိန်းသူ၏<br>အချက်အလက်</li>
            @endif
            @if(get_config('form-setting.is_exam_required') || get_config('form-setting.is_high_school_required'))
                <li id="nine">ဖြေဆိုခဲ့သည့်<br>စာမေးပွဲများ</li>
            @endif
            <li id="eight">@if(get_config('form-setting.is_diploma'))စည်းမျဥ်းစည်းကမ်းများ@elseကျောင်းလခ@endif</li>
        </ul>

        @php($states = config('constants.states'))
        @php($is_local = config('constants.is_local'))
        @php($site_name = config('common.site'))
        @php($is_edit=true)

        @include('user.enrollment.include.information')
{{--        @include('user.enrollment.include.student')--}}
        @include('user.enrollment.include.um.student-detail')
        @include('user.enrollment.include.father')
        @include('user.enrollment.include.mother')

        @if(get_config('form-setting.has_la_wa_ka'))
            @include('user.enrollment.include.custom.siblings',['siblings'=>$enrollment->student->siblings])
            @include('user.enrollment.include.custom.father')
            @include('user.enrollment.include.custom.mother')
        @endif


        @if(get_config('form-setting.has_la_wa_ka'))
            @include('user.enrollment.include.custom.other-guardian')
        @endif
        @if(get_config('form-setting.is_diploma'))
            @include('user.enrollment.include.um.other-guardian')
        @endif


        @if(get_config('form-setting.is_high_school_required'))
            @include('user.enrollment.include.um.high-school')
        @endif

        @if(get_config('form-setting.is_exam_required'))
            @include('user.enrollment.include.exams_history')
        @endif

        @include('user.enrollment.include.um.umfee')

    </form>

@endsection

@push('after-scripts')
    <script>
        let nrcData = {!! json_encode($nrc_data) !!};
        console.log(nrcData);
        let nrcTownships = [];
        $(document).ready(function () {
            universitystatus();
            nrcData.map(data =>
            {
                $(".user-nrc-state").append("<option value=" + data.state_no + ">" + data.state_no + "/</option>")
                $(".father-nrc-state").append("<option value=" + data.state_no + ">" + data.state_no + "/</option>")
                $(".mother-nrc-state").append("<option value=" + data.state_no + ">" + data.state_no + "/</option>")
                $(".guardian-nrc-state").append("<option value=" + data.state_no + ">" + data.state_no + "/</option>")


                $(".user-address-state").append("<option value=" + data.id + ">" + data.state_name + "</option>")
                $(".father-address-state").append("<option value=" + data.id + ">" + data.state_name + "</option>")
                $(".mother-address-state").append("<option value=" + data.id + ">" + data.state_name + "</option>")
                $(".guardian-address-state").append("<option value=" + data.id + ">" + data.state_name + "</option>")
            })
            getTownships('၁', ".user-nrc-townships")
            getTownships('၁', ".father-nrc-townships")
            getTownships('၁', ".mother-nrc-townships")
            getTownships('၁', ".guardian-nrc-townships")
            getUserAddressTownships(1, '.user-address-township')
            getUserAddressTownships(1, '.father-address-township')
            getUserAddressTownships(1, '.mother-address-township')
            getUserAddressTownships(1, '.guardian-address-township')
        })

        $(".user-nrc-state").change(function () {
            let state = $(this).val();
            $(".user-nrc-townships").empty()
            getTownships(state, ".user-nrc-townships")
        })

        $(".father-nrc-state").change(function () {
            let state = $(this).val();
            $(".father-nrc-townships").empty()
            getTownships(state, ".father-nrc-townships")
        })
        $(".mother-nrc-state").change(function () {
            let state = $(this).val();
            $(".mother-nrc-townships").empty()
            getTownships(state, ".mother-nrc-townships")
        })
        $(".guardian-nrc-state").change(function () {
            let state = $(this).val();
            $(".guardian-nrc-townships").empty()
            getTownships(state, ".guardian-nrc-townships")
        })

        function getTownships(state, selector) {
            let selected_state = nrcData.filter(data => data.state_no === state)
            selected_state[0].townships.map(t => $(selector).append("<option value=" + t.township_abbreviation + ">" + t.township_abbreviation + "</option>"))
        }


        $(".user-address-state").change(function () {
            let state = $(this).val();
            console.log(state);
            $(".user-address-township").empty()
            getUserAddressTownships(state, ".user-address-township")
        })

        $(".father-address-state").change(function () {
            let state = $(this).val();
            $(".father-address-township").empty()
            getUserAddressTownships(state, ".father-address-township")
        })

        $(".mother-address-state").change(function () {
            let state = $(this).val();
            $(".mother-address-township").empty()
            getUserAddressTownships(state, ".mother-address-township")
        })

        $(".guardian-address-state").change(function () {
            let state = $(this).val();
            $(".guardian-address-township").empty()
            getUserAddressTownships(state, ".guardian-address-township")
        })

        function getUserAddressTownships(state, selector) {
            let selected_state = nrcData.filter(data => data.id == state)
            console.log(selected_state[0]);
            selected_state[0].townships.map(t => $(selector).append("<option value=" + t.township_name + ">" + t.township_name + "</option>"))
        }


        var fail_years = { '2013-2014' : '2013-2014',
                           '2014-2015' : '2014-2015',
                           '2015-2016' : '2015-2016',
                           '2016-2017' : '2016-2017',
                           '2017-2018' : '2017-2018',
                           '2018-2019' : '2018-2019',
                           '2019-2020' : '2019-2020',
                           '2020-2021' : '2020-2021',
                           '2021-2022' : '2021-2022',
                           '2022-2023' : '2022-2023'
                         };
        var ude_fail_years = {
                            '1990-1991' : '1990-1991',
                            '1991-1992': '1991-1992',
                            '1992-1993': '1992-1993',
                            '1993-1994': '1993-1994',
                            '1994-1995': '1994-1995',
                            '1995-1996': '1995-1996',
                            '1996-1997': '1996-1997',
                            '1997-1998': '1997-1998',
                            '1998-1999': '1998-1999',
                            '1999-2000': '1999-2000',
                            '2000-2001': '2000-2001',
                            '2001-2002': '2001-2002',
                            '2002-2003': '2002-2003',
                            '2003-2004': '2003-2004',
                            '2004-2005': '2004-2005',
                            '2005-2006': '2005-2006',
                            '2006-2007': '2006-2007',
                            '2007-2008': '2007-2008',
                            '2008-2009': '2008-2009',
                            '2009-2010': '2009-2010',
                            '2010-2011': '2010-2011',
                            '2011-2012': '2011-2012',
                            '2013-2014': '2013-2014',
                            '2014-2015': '2014-2015',
                            '2015-2016': '2015-2016',
                            '2016-2017': '2016-2017',
                            '2017-2018': '2017-2018',
                            '2019-2020': '2019-2020',
                            '2020-2021': '2020-2021',
                            '2021-2022': '2021-2022',
                            '2022-2023': '2022-2023',
                        };
        var exam_years = $(".exam_years");

        function universitystatus(){
            var type = $("input[name='university_status']:checked").val();
            console.log(type);
            if(type == '1')
            {
                $(".ude").css('display', 'block');
                $(".day").css('display', 'none');
                $(".exam_years").empty();
                $.each(ude_fail_years, function(index, value){
                $("<option/>", {
                    value:index,
                    text :value,
                }).appendTo(exam_years);
                });
            }else
            {
                $(".ude").css('display', 'none');
                $(".day").css('display', 'block');
                $(".exam_years").empty();
                $.each(fail_years, function(index, value){
                $("<option/>", {
                    value:index,
                    text :value,
                }).appendTo(exam_years);
                });
            }
        };
        
    </script>
@endpush


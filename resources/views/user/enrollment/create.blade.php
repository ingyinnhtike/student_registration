@extends('layouts.form')

@section('title', 'Enrollment Form')

@push('after-styles')
<style>
.select2-container .select2-search--inline .select2-search__field {
    box-sizing: border-box;
    border: none;
    font-size: 100%;
    margin-top: 5px;
    padding: 0;
    width: 150% !important;
    }
    </style>
@endpush


@section('content')

    <div class="section section-tabs my-section">

    <form class="steps {{get_config('form-setting.steps_width')}}" action="{{route('enroll.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" method="post" novalidate="">
        @csrf
        <ul id="progressbar" class="{{get_config('form-setting.progress_bar')}}">
            <li class="active" id="one">သင်တန်းအချက်အလက်</li>
            <li id="two">ကျောင်းသားအချက်အလက်</li>
            <li id="three">ဖခင်<br>အချက်အလက်</li>
            <li id="four">မိခင်<br>အချက်အလက်</li>
            @if(get_config('form-setting.is_siblings_required'))
                <li id="five">ညီအစ်ကိုမောင်နှမ<br>အချက်အလက်</li>
                <li id="six">မွေးစားဖခင်<br>အချက်အလက်</li>
                <li id="seven">မွေးစားမိခင်<br>အချက်အလက်</li>
            @endif
            @if(get_config('form-setting.is_diploma'))
                <li id="eight">အခြားအုပ်ထိန်းသူ၏<br>အချက်အလက်</li>
            @endif
            @if(get_config('form-setting.is_high_school_required'))
                <li id="nine">တက္ကသိုလ်ဝင်တန်း<br>စာမေးပွဲများ</li>
            @endif
            @if(get_config('form-setting.is_exam_required'))
                <li id="ten">ဖြေဆိုခဲ့သည့်<br>စာမေးပွဲများ</li>
            @endif
            <li id="eight">@if(get_config('form-setting.is_diploma'))စည်းမျဥ်းစည်းကမ်းများ@elseကျောင်းလခ@endif</li>
        </ul>
        @php($states = config('constants.states'))
        @php($is_local = config('constants.is_local'))
        @php($site_name = config('common.site'))
        @php($is_edit=false)

        @include('user.enrollment.include.information')
        @include('user.enrollment.include.um.student-detail')
        @include('user.enrollment.include.father')
        @include('user.enrollment.include.mother')
        @if(get_config('form-setting.has_la_wa_ka'))
            @include('user.enrollment.include.custom.siblings')
            @include('user.enrollment.include.custom. father')
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

        <div id="help-info" class="modal" data-modal-effect="slide-top">
            <div class="modal-content">
                <h2 class="fs-title">Online Registration စနစ်ဖြင့် <br><br>ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်</h2>
                <h3 class="fs-subtitle"><strong>သင်တန်းအချက်အလက် </strong></h3>
                {!! get_config('form-setting.info_modal') !!}
                <input type="button" name="next" class="action-button modal-close" value="Got it!">
            </div>
        </div>

        <div id="help-student" class="modal modal-xl" data-modal-effect="slide-top">
            <div class="modal-content">
                <h2 class="fs-title">Online Registration စနစ်ဖြင့် <br><br>ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်</h2>
                <h3 class="fs-subtitle"><strong>ကျောင်းသားအချက်အလက် </strong></h3>
                {!! get_config('form-setting.student_modal') !!}
                <br>
                <input type="button" name="next" class="action-button modal-close" value="Got it!">
            </div>
        </div>

        <div id="help-father" class="modal" data-modal-effect="slide-top">
            <div class="modal-content">
                <h2 class="fs-title">Online Registration စနစ်ဖြင့် <br><br>ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်</h2>
                <h3 class="fs-subtitle"><strong>ဖခင်အချက်အလက် </strong></h3>
                {!! get_config('form-setting.father_modal') !!}
                <br>
                <input type="button" name="next" class="action-button modal-close" value="Got it!">
            </div>
        </div>

        <div id="help-mother" class="modal" data-modal-effect="slide-top">
            <div class="modal-content">
                <h2 class="fs-title">Online Registration စနစ်ဖြင့် <br><br>ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်</h2>
                <h3 class="fs-subtitle"><strong>မိခင်အချက်အလက် </strong></h3>
                <ul class="help-info">
                    <li>အမည်(မြန်မာ) <span>-</span> (ဒေါ်ထည့်မရိုက်ရန်)</li>
                    <li>အမည် (အင်္ဂလိပ်)<span>-</span>(Daw, Ms ထည့်မရိုက်ရ)</li>
                    <li>မိခင်၏ဖုန်းနံပါတ်<span>-</span>(ကျောင်းသားထည့်ထားသောဖုန်းနှင့် မတူရ)</li>
                </ul>
                <br>
                <input type="button" name="next" class="action-button modal-close" value="Got it!">
            </div>
        </div>

        <div id="help-other" class="modal" data-modal-effect="slide-top">
            <div class="modal-content">
                <h2 class="fs-title">Online Registration စနစ်ဖြင့် <br><br>ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်</h2>
                <h3 class="fs-subtitle"><strong>အခြားအုပ်ထိန်းသူ၏ အချက်အလက်</strong></h3>
                <ul class="help-info">
                    <li>အမည်(မြန်မာ) <span>-</span> (ဦး/ ဒေါ်ထည့်မရိုက်ရန်)</li>
                    <li>အမည် (အင်္ဂလိပ်)<span>-</span>(U, Daw, Mr, Mrs မပါရ)</li>
                </ul>
                <br>
                <input type="button" name="next" class="action-button modal-close" value="Got it!">
            </div>
        </div>

        <div id="help-high-school" class="modal" data-modal-effect="slide-top">
            <div class="modal-content">
                <h2 class="fs-title">Online Registration စနစ်ဖြင့် <br><br>ကျောင်းအပ်ရာတွင်ဖြည့်သွင်းနိုင်မည့် လမ်းညွှန်ချက်</h2>
                <h3 class="fs-subtitle"><strong>ဖြေဆိုခဲ့သည့်စာမေးပွဲများ</strong></h3>
                <ul class="help-info">
                    <li>ခုံအမှတ် <span>-</span> တက္ကသိုလ်ဝင်စာမေးပွဲခုံအမှတ်</li>
                    <li>အခြေခံပညာအထက်တန်းအောင်မြင့်သည့်ခုနှစ် <span>-</span>မိမိအောင်မြင်သည့်ခုနှစ်အား အင်္ဂလိပ်ဘာသာဖြင့်ဖြည့်သွင်းရန်</li>
                    <li>စာစစ်ဌာန <span>-</span>တက္ကသိုလ်ဝင်စာမေးပွဲဖြေဆိုခဲ့သည့် စာစစ်ဌာန</li>
                    <li>ရမှတ်စုစုပေါင်း <span>-</span>တက္ကသိုလ်ဝင်စာမေးပွဲအောင်မြင့်ခဲ့သည့်ရမှတ်ပေါင်း</li>
                    <li>ဂုဏ်ထူးရသည့်ဘာသာ <span>-</span>မိမိရရှိခဲ့သော ဘာသာရပ်အားလုံးဖြည့်သွင်းရန်</li>
                </ul>
                <br>
                <input type="button" name="next" class="action-button modal-close" value="Got it!">
            </div>
        </div>

        

    </div>

@endsection

@push('after-scripts')
    <script>
        let nrcData = {!! json_encode($nrc_data) !!};
        //console.log(nrcData);
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
            //console.log(state);
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
            //console.log(selected_state[0]);
            selected_state[0].townships.map(t => $(selector).append("<option value=" + t.township_name + ">" + t.township_name + "</option>"))
        }

        // $(".nrc-citizenship").change(function(){
        //     var selectedNrc = $(this).children("option:selected").val();
        //     if(selectedNrc == '-')
        //     {
        //         $('.nrc-citizenship-error').css('display', 'none');
        //         $('.nrc_no').removeAttr('required');
                
                
        //     }else{
        //         $('.nrc-citizenship-error').css('display', 'block');
        //         $(".nrc_no").prop('required',true);
                  
        //     }
        // });

        $(".student-next-error").click(function(){
            var selectedNrc = $('.nrc-citizenship').children("option:selected").val();
            if(selectedNrc == '-')
            {
                $('.student-nrc-citizenship-error').css('display', 'none');
                $('.student-nrc-no').removeAttr('required');
               
            }else{
                $('.student-nrc-citizenship-error').css('display', 'block');
                $(".student-nrc-no").prop('required',true);
            }

           
        });


        $(".father-next-error").click(function(){
            var selectedfatherNrc = $('.father-nrc-citizenship').children("option:selected").val();
            if(selectedfatherNrc == '-')
            {
                $('.father-nrc-citizenship-error').css('display', 'none');
                $('.father-nrc-no').removeAttr('required');
               
            }else{
                $('.father-nrc-citizenship-error').css('display', 'block');
                $(".father-nrc-no").prop('required',true);
            }
        });

        $(".mother-next-error").click(function(){
            var selectedmotherNrc = $('.mother-nrc-citizenship').children("option:selected").val();
            if(selectedmotherNrc == '-')
            {
                $('.mother-nrc-citizenship-error').css('display', 'none');
                $('.mother-nrc-no').removeAttr('required');
               
            }else{
                $('.mother-nrc-citizenship-error').css('display', 'block');
                $(".mother-nrc-no").prop('required',true);
            }
        
            
        });      

        // if(selectedotherNrc == '-')
        //     {
        //         $('.nrc-citizenship-error').css('display', 'none');
        //         $('.nrc_no').removeAttr('required');
        //     }else{
        //         $('.nrc-citizenship-error').css('display', 'block');
        //         $(".nrc_no").prop('required',true);
        //     }
            
        
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
    }
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




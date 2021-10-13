<div id="print-area" style="display: none;">
    <a class="navbar-brand print-header" href="#"><img src="{{asset(get_config('otp-login-setting.logo'))}}" alt="" style="width:20px;">&nbsp;{{get_config('site-setting.dashboard_header')}}</a>
    <br><br>
    <h3 class="print-form-header">ကျောင်းသား/ကျောင်းသူများ ပညာသင်ခွင့်လျှောက်လွှာ</h3>
    @include('admin.print.partials.information')
    @include('admin.print.partials.student-info')
    @if(get_config('form-setting.is_high_school_required'))
    @include('admin.print.partials.high-school-info')
    @endif
    @if(get_config('form-setting.is_exam_required') && ($enrollment->year != 'First Year'))
        @include('admin.print.partials.exam-info')
    @endif
    @if(get_config('form-setting.is_siblings_required'))
        @include('admin.print.partials.siblings-info')
    @endif
    @if(get_config('form-setting.has_la_wa_ka'))
        @include('admin.print.partials.adoptive-parents-info')
    @endif
    @include('admin.print.partials.scholar-info')
</div>

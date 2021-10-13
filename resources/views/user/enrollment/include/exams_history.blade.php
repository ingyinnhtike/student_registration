@php
    $exams_history = $enrollment->student->examRecords ?? null;
@endphp
<fieldset class="fieldset-margin exam-page">
    <h2 class="fs-title">ဖြေဆိုခဲ့သည့် စာမေးပွဲများ</h2>
    @php($exam_years = get_config('form-setting.exam_years'))
    @foreach($exam_years as $key=>$year)

        @include('user.enrollment.include.exam_history',['key'=>$key,'year'=>$year,'exams_history'=>$exams_history])

    @endforeach


   
    @if(get_config('form-setting.has_bloodtype'))
    <button data-page="1" name="next" class="next glow-on-hover" type="button">နောက်သို့သွားရန်</button>
    <button data-page="2" name="previous" class="previous glow-on-hover" type="button">ရှေ့သို့သွားရန်</button>
    @else
     <input type="button" data-page="1" name="next" class="next action-button" value="နောက်သို့သွားရန်"/>
    <input type="button" data-page="2" name="previous" class="previous action-button" value="ရှေ့သို့ပြန်သွားရန်"/>
    @endif
</fieldset>

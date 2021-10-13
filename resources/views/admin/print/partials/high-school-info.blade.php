<table class="student-info-table" valign="middle" width="100%" border="1" cellpadding="2%">
    <tbody valign="middle" style="text-align: center;">
    <tr>
        <th rowspan="2">တက္ကသိုလ်ဝင်တန်း</th>
        <th>ခုံအမှတ်</th>
        <th>အောင်မြင်သည့်ခုနှစ်</th>
        <th>စာစစ်ဌာန</th>
    </tr>
    <tr>
        <td>{{$highSchool->roll_no??'-'}}</td>
        <td>{{$highSchool->year??'-'}}</td>
        <td>{{$highSchool->exam_location??'-'}}</td>
    </tr>
    @if(array_key_exists('mark',$highSchoolData))
        <tr>
            <th>ဘာသာရပ်နှင့်အမှတ်များ</th>
            <td colspan="3">
                @foreach($highSchoolData['mark'] as $mark)
                    {{$mark['subject']}} - {{$mark['mark']}}&nbsp;|
                @endforeach
            </td>
        </tr>
    @endif
    <tr>
        <th>အမှတ်ပေါင်း</th>
        <td>{{$highSchoolData['total_mark']??'-'}}</td>
        <th>ဂုဏ်ထူးရဘာသာ</th>
        <td>{{$highSchoolData['distinctions']??'-'}}</td>
    </tr>
    </tbody>
</table>

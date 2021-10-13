
<img src="{{asset('storage/'.$enrollment->photo)}}" class="card-img-top img-fluid photo-card" alt="profile" style="width: 120px;margin-left: 10%;margin-bottom: 3%;">
<div class="print-card">
    <table>
        <tr><td>Form အမှတ်  </td><td>:</td><td>&nbsp;&nbsp;{{$form->id}}</td></tr>
        <tr><td>သင်တန်းနှစ် </td><td>:</td><td>&nbsp;&nbsp;{{$enrollment->year}}</td></tr>
        <tr><td width="60%;">အထူးပြုဘာသာ </td><td>:</td><td width="40%;">&nbsp;&nbsp;
                @if(is_array($enrollment->major))
                    @foreach($enrollment->major as $major)
                        {{$majors[$major]}}
                    @endforeach
                @else
                    {{$enrollment->major}}
                @endif
            </td></tr>
        <tr><td>ခုံအမှတ် </td><td>:</td><td>&nbsp;&nbsp;{{$enrollment->roll_no}}</td></tr>
        <tr><td>တက္ကသိုလ်မှတ်ပုံတင်အမှတ်</td><td>:</td><td>&nbsp;&nbsp;{{$detail->university_roll_no??'-'}}</td></tr>
        <tr><td width="60%;">တက္ကသိုလ်ဝင်ရောက်သည့်နှစ်</td><td>:</td><td width="40%;">{{$detail->university_start_year??'-'}}</td></tr>
    </table>
</div>

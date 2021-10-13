<table class="student-info-table" valign="middle" width="100%" height="100%" border="1" cellpadding="2%">
    <tbody valign="middle" style="text-align: center;">
    <tr>
        <th>သင်တန်းနှစ်</th>
        <th>အဓိကဘာသာ</th>
        <th>ခုံအမှတ်</th>
        <th>ခုနှစ်</th>
        <th>အောင်/ရှုံး</th>
    </tr>
    @foreach($exams as $key=>$exam)
        @if($exam->major && $exam->year)
            <tr>
                <td>{{$exam->examString}}</td>
                <td>
                    @if(is_array($exam->major))
                        <div>
                            @foreach($exam->major as $major)
                                <strong>{{$majors[$major]}}</strong>
                            @endforeach
                        </div>
                    @else
                        <span>{{$majors[$exam->major]}}</span>
                    @endif
                </td>
                <td>{{$exam->roll_no??'ဖြည့်ဆိုထားခြင်းမရှိ'}}</td>
                <td>{{$exam->year}}</td>
                <td>{{$exam->statusString}}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>

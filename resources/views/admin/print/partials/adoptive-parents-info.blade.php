<table class="adoptive-info-table" valign="middle" width="100%" border="1" cellpadding="3%">
    <thead valign="middle">
    <tr>
        <th colspan="6" style="text-align: center;">မွေးစားမိဘ အချက်အလက်</th>
    </tr>
    <tr>
        <th>အမည်</th>
        <th>လူမျိုး/ဘာသာ</th>
        <th>မှတ်ပုံတင်</th>
        <th>တော်စပ်ပုံ</th>
        <th>အလုပ်အကိုင်</th>
        <th>ဆက်သွယ်ရန်</th>
    </tr>
    </thead>
    <tbody style="text-align: center;">
    @if($adoptiveFather->name_mm != '' || $adoptiveMother->name_mm != '')
        <tr>
            <td>{{$adoptiveFather->name_mm}}</td>
            <td>{{$adoptiveFather->race??'-'.'/'.$adoptiveFather->religion}}</td>
            <td>{{$adoptiveFather->nrc??'-'}}</td>
            <td>{{$adoptiveFather->relation_to_user??'-'}}</td>
            <td>{{$adoptiveFather->work??'-'}}</td>
            <td>{{$adoptiveFather->phone??'-'}}<br>{{$adoptiveFather->address??'-'}}</td>
        </tr>
        <tr>
            <td>{{$adoptiveMother->name_mm}}</td>
            <td>{{$adoptiveMother->race??'-'.'/'.$adoptiveMother->religion}}</td>
            <td>{{$adoptiveMother->nrc??'-'}}</td>
            <td>{{$adoptiveMother->relation_to_user??'-'}}</td>
            <td>{{$adoptiveMother->work??'-'}}</td>
            <td>{{$adoptiveMother->phone??'-'}}<br>{{$adoptiveMother->address??'-'}}</td>
        </tr>
        @else
        <tr>
            <td colspan="6">-</td>
        </tr>
    @endif
    </tbody>
</table>


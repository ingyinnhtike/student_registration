<table class="student-info-table" valign="middle" width="100%"  border="1" cellpadding="3%">
    <thead valign="middle">
    <tr>
        <th></th>
        <th>ကျောင်းသား/သူ</th>
        <th>အဘ</th>
        <th>အမိ</th>
        <th>အခြားအုပ်ထိန်းသူ</th>
    </tr>
    </thead>
    <tbody style="text-align: center;">
    <tr>
        <th rowspan="2">အမည်</th>
        <td >{{$detail->name_mm??'-'}}</td>
        <td>{{$father->name_mm??'-'}}</td>
        <td>{{$mother->name_mm??'-'}}</td>
        <td>{{$other->name_mm??'-'}}</td>
    </tr>
    <tr>
        <td>{{$detail->name_eng??'-'}}</td>
        <td>{{$father->name_eng??'-'}}</td>
        <td>{{$mother->name_eng??'-'}}</td>
        <td>{{$other->name_eng??'-'}}</td>
    </tr>
    <tr>
        <th>လူမျိုး</th>
        <td>{{$detail->race??'-'}}</td>
        <td>{{$father->race??'-'}}</td>
        <td>{{$mother->race??'-'}}</td>
        <td>{{$other->race??'-'}}</td>
    </tr>
    <tr>
        <th>ဘာသာ</th>
        <td>{{$detail->religion??'-'}}</td>
        <td>{{$father->religion??'-'}}</td>
        <td>{{$mother->religion??'-'}}</td>
        <td>{{$other->religion??'-'}}</td>
    </tr>
    <tr>
        <th>မွေးဖွားရာဇာတိ</th>
        <td>@include('admin.print.partials.birth-place',['data'=>$detail])</td>
        <td>@include('admin.print.partials.birth-place',['data'=>$father])</td>
        <td>@include('admin.print.partials.birth-place',['data'=>$mother])</td>
        <td>@include('admin.print.partials.birth-place',['data'=>$other])</td>
    </tr>
    <tr>
        <th>မှတ်ပုံတင်</th>
        <td>{{$detail->nrc??'-'}}</td>
        <td>{{$father->nrc??'-'}}</td>
        <td>{{$mother->nrc??'-'}}</td>
        <td>{{$other->nrc??'-'}}</td>
    </tr>
    <tr>
        <th colspan="2">သက်ရှိထင်ရှား ရှိ/မရှိ</th>
        <td>{{$father->availabilityString?? '-'}}</td>
        <td>{{$mother->availabilityString?? '-'}}</td>
        <td>{{$other->availabilityString?? '-'}}</td>
    </tr>
    <tr>
        <th colspan="2">အလုပ်အကိုင်</th>
        <td>{{$father->work??'-'}}</td>
        <td>{{$mother->work??'-'}}</td>
        <td>{{$other->work??'-'}}</td>
    </tr>
    <tr>
        <th colspan="2">သွေးအုပ်စု / မွေးသက္ကရာဇ်</th>
        <td>{{$detail->data['blood_type']??'-'}}&nbsp;/&nbsp;{{$detail->dob??'-'}}</td>
        <th>ကျား/မ</th>
        <td>{{$detail->genderString??'-'}}</td>
    </tr>
    <tr>
        <th>ဆက်သွယ်ရန်လိပ်စာ</th>
        <td>{{$detail->email??'-'}}<br>{{$detail->permanent_phone??'-'}},<br>{{$detail->permanent_address??'-'}}</td>
        <td>{{$father->email??'-'}}<br>{{$father->phone??''}}<br>{{$father->address??'-'}}</td>
        <td>{{$mother->email??'-'}}<br>{{$mother->phone??''}}<br>{{$mother->address??'-'}}</td>
        <td>{{$other->relation_to_user??'-'}}{{$other->email??''}}<br>{{$other->phone??'-'}}<br>{{$other->address??'-'}}</td>
    </tr>
    </tbody>
</table>

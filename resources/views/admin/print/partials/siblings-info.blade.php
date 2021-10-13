<table class="siblings-info-table" valign="middle" width="100%" border="1" cellpadding="3%">
    <thead valign="middle">
    <tr>
        <th colspan="4" style="text-align: center;">ညီအစ်ကိုမောင်နှမများ၏ အချက်အလက်များ</th>
    </tr>
    <tr>
        <th>အမည်</th>
        <th>မှတ်ပုံတင်အမှတ်</th>
        <th>အလုပ်အကိုင်/ကျောင်းအချက်အလက်</th>
        <th>နေရပ်လိပ်စာ</th>
    </tr>
    </thead>
    <tbody style="text-align: center;">
    @foreach($siblings as $sibling)
        <tr>
            <td>{{$sibling->name??'-'}}</td>
            <td>{{$sibling->nrc??'-'}}</td>
            <td>{{$sibling->work??'-'}}</td>
            <td>{{$sibling->address??'-'}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<table class="scholar-info-table" valign="middle" width="100%" border="1" cellpadding="2%">
    <tbody valign="middle" style="text-align: center;">
    <tr>
        <th>ပညာသင်ထောက်ပံ့ကြေးလျှောက်ထားခြင်း ရှိ/မရှိ</th>
        <td colspan="3">{{$enrollment->stipend===1?'ရှိ':'မရှိ'}}</td>
    </tr>
    <tr>
        <th rowspan="2">ပညာသင်ဆု</th>
        <th>ဆုအမည်</th>
        <th>ချီးမြှင့်သည့် အဖွဲ့အစည်း</th>
        <th>လစဥ်ဆုငွေကျပ်</th>
    </tr>
    <tr>
        <td>{{$scholar->name??'-'}}</td>
        <td>{{$scholar->amount ??'-'}}</td>
        <td>{{$scholar->organization??'-'}}</td>
    </tr>
    </tbody>
</table>

<?php


namespace App\Helpers;


class OtpHelper
{
    public function send_sms($callerid, $message)
    {
        $title = urlencode("sms info");
        $to_post = "http://apiv2.blueplanet.com.mm/mptsdp/bizsendsmsapi.php?callerid=959$callerid&k=UniStudent&u=student_registration&p=fbb8bfa7f0530165a7fdad52a3430f3f&m=$message&t=$title";
        $ch = curl_init($to_post);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;

    }
}

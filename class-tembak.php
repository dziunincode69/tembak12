<?php
/*
     Author : alipdzikrinur
     FB     : fb.com/dziu69
     RECODE TIDAK MEMBUAT MU MENJADI MASTER
*/
date_default_timezone_set('Asia/Jakarta');
$date = date("l-jS-F-Y");

$header = array (
'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:75.0) Gecko/20100101 Firefox/75.0',
'Accept-Language: en-US,en;q=0.5',
'Accept-Encoding: gzip, deflate',
'Accept: */*',
'Content-Type: application/json',);

function isi_Quiz($token)
{
    $header = array (
'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:75.0) Gecko/20100101 Firefox/75.0',
'Accept: */*',
'Accept-Language: en-US,en;q=0.5',
'Accept-Encoding: gzip, deflate',
'Content-Type: application/json',
'marlboro-token: '.$token[1].'');
    $p = curl("https://api.marlboro.id/api/article/web-series-list?0=n&1=o", false, $header);
    preg_match_all('/"string_id":"(.*?)",/', $p[1], $string);
    $jawaban = array('FOTO-FOTO', 'VLOG', 'CARI TEMAN');
    for ($i=0; $i < 5; $i++) { 
        for ($o=0; $o < 20; $o++) { 
    $get[$i] = curl("https://api.marlboro.id/api/article/submit-quiz", '{"string_id":"'.$string[1][1].'","answer":"'.$jawaban[array_rand($jawaban)].'"}', $header);
}
}
}
function curl($url, $post=false, $httpheader=false,$cookie=false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        if($cookie !== false)
        {
            curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        }
        if($post != false)
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader != false)
        {
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        $response = curl_exec($ch);
        $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
        curl_close($ch);
        return array($header, $body);
    }
function cek_Poin($token)
{
$header = array (
'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:75.0) Gecko/20100101 Firefox/75.0',
'Accept: */*',
'Accept-Language: en-US,en;q=0.5',
'Accept-Encoding: gzip, deflate',
'Content-Type: application/json',
'marlboro-token: '.$token[1].'');
$get = curl("https://api.marlboro.id/api/auth/get-short-profile", '{}', $header);
preg_match('/"point":(.*?),/', $get[1], $point);
return $point[1];
}
/*
     Author : alipdzikrinur
     FB     : fb.com/dziu69
*/
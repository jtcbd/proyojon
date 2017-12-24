<?php 

function send_message($phone, $message)
{
    $curl = curl_init();
    $message = str_replace(" ", "%20", $message);
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://202.4.124.22:13013/cgi-bin/sendsms?username=tester&password=foobar&charset=utf-8&coding=2&to=$phone&text=$message"
    ));
    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
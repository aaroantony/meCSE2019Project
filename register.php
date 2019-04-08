<?php
session_start();
extract ($_POST);
include("dbconnect.php");
$rdate=date("d-m-Y"); 
if(isset($btn))
{
            $q=mysql_query("select max(id) from register");
			$r=mysql_fetch_array($q);
			$id=$r['max(id)']+1;
	
       $s1=substr($name,0,3);
	   $s2=substr($conno,7,3);
	   $s3=rand(10,20);
	   $sign=$s1.$s2.$s3;
	   
					
                    $sql = "insert into register(id,name,email,conno,city,sign,public_key,num_users,rdate,status,uname,pass)
					 values ($id,'$name','$email',$conno,'$city','$sign','$public_key','0','$rdate','0','$uname','$pass')";
					 echo $sql;
					    $result= mysql_query($sql);
                   	if($result)
					{					
								//////////////
							include("email.php");
									$objEmail	=	new CI_Email();
									$objEmail->from('cloudservice@gmail.com', "Cloud Service");
									//$objEmail->from('cloudservice@projectone.in', "Cloud Service");
									$objEmail->to("$email");
									//$objEmail->cc($txt_cc);
									//$objEmail->bcc($txt_bcc);
									$objEmail->subject("Data Owner Confirmation");
									
									$objEmail->message("Your User ID: ".$id.", Key Signature: ".$sign);
									
								
										/*if(file_exists("report.xls"))
										{
											$objEmail->attach("report.xls");
										}*/
										if ($objEmail->send())
										{	
										//echo 'mail sent successfully';
										}
										else
										{	
										//echo 'failed';
										}
					header("location:index.php");                                      
					}
				}

            
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Cloudy by Free Css Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
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
	if(document.form1.name.value=="")
	{
	alert("Enter the Name");
	document.form1.name.focus();
	return false;
	}
	
	if(document.form1.conno.value=="")
	{
	alert("Enter the Contatc No.");
	document.form1.conno.focus();
	return false;
	}
	if(document.form1.city.value=="")
	{
	alert("Enter your Location / City");
	document.form1.city.focus();
	return false;
	}
	if(document.form1.email.value=="")
	{
	alert("Enter the E-mail");
	document.form1.email.focus();
	return false;
	}
	if(document.form1.uname.value=="")
	{
	alert("Enter the Username");
	document.form1.uname.focus();
	return false;
	}
	if(document.form1.pass.value=="")
	{
	alert("Enter the Password");
	document.form1.pass.focus();
	return false;
	}
	if(document.form1.pass.value!=document.form1.conpass.value)
	{
	alert("Both password are not equals!");
	document.form1.conpass.select();
	return false;
	}
return true;	
}
</script> 

<style type="text/css">
<!--
.style4 {color: #FFFFFF}
.style5 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<!-- start header -->
<div id="wrapper">
<div id="logo">
	<h1><a href="#"> CLOUD owner </a></h1>
	<p>&nbsp;</p>
	<div align="center"><br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="date">
  <?php cdate?>
  &nbsp; &nbsp;</span> </div>
</div>
	
</div>
<div id="header">
	<div class="more" id="menu">
		<div align="center">
		  <ul>
		    <li><a href="index.php">HOME</a></li>
		    <li><a href="register.php">REGISTER</a></li>
		    <li></li>
		    <li class="last"></li>
		    </ul>
		  </div>
	</div>
</div>
<div align="center">
  <!-- end header -->
  <!-- start page -->
</div>
<div id="page"> 
	<div align="center">
	  <!-- start content -->
	  <span class="style4"><span class="style5">REGISTRATION</span><br />
	&nbsp;</span>
	<!-- end content -->
	<!-- start sidebar -->
  </div>
	<form id="ContactForm" name="form1" method="post" action="">
	  <div align="justify"><br />
      </div><center>
        <img src="images/c1.html" "width="187" height="221" align="left" />
      </center>
	  <table width="200" border="0" align="center" cellpadding="10" cellspacing="10">
       <tr>
         <td>Name</td>
         <td><input type="text" name="name" /></td>
       </tr>
       <tr>
         <td>Contact Number</td>
         <td><input type="text" name="conno" /></td>
       </tr>
       <tr>
         <td>City</td>
         <td><input type="text" name="city" /></td>
       </tr>
       <tr>
         <td>E_Mail</td>
         <td><input type="text" name="email" /></td>
       </tr>
       <tr>
         <td>User Name </td>
         <td><input type="text" name="uname" /></td>
       </tr>
       <tr>
         <td>Password</td>
         <td><input type="password" name="pass" /></td>
       </tr>
       <tr>
         <td>Confirm Password </td>
         <td><input type="password" name="conpass" /></td>
       </tr>
       <tr>
         <td colspan="2">           <div align="center">
           <input type="submit" name="btn" value="Register" onClick="return validate()" />         
         </div></td>
       </tr>
     </table>
	 <br />
	 <br /><br /><br />
	</form>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	
<div align=center>	<a rel="nofollow" href="#" target="_blank">Cloud Data Owner</a><br>
		<a href="#" target="_blank">Services</a> provided by cloudservice.com
		<!-- {%FOOTER_LINK} -->
	</footer>
</div>
</div>
<!-- end footer -->
<div align=center><script type="text/javascript"> Cufon.now();</script></div>
<!-- end footer -->
</body>
</html>



<?php
session_start();
extract($_POST);
include("dbconnect.php");
include("encrypt.php");
$cdate=date("d-m-Y"); 
$uname=$_SESSION['uname'];
if(isset($btn))
{
$fileName=$_FILES['file']['name'];
$ftype=$_FILES['file']['type'];
$fname2="E". $_FILES['file']['name'];
$pb_key=$_POST['public_key'];
if(is_dir("uploads")==false)
{
mkdir("uploads");
}

$mq=mysql_query("select max(id) from user_files");
$mr=mysql_fetch_array($mq);
$id=$mr['max(id)']+1;

$uk=$uname.$id;
$sk=md5($uk);
$key1=substr($sk,0,8);
$key2=substr($sk,8,8);
$key3=substr($sk,16,8);
$key4=substr($sk,24,8);
$modify_time=date("d-m-Y, H:i:s");
//echo "insert into user_files(id,uname,file_type,file_content,upload_file,file1,file2,file3,file4,key1,key2,key3,key4,modify_time,status,file_st) values($id,'$uname','$ftype','$content2','$fileName','','','','','$key1','$key2','$key3','$key4','$modify_time','0','0')";

$qq=mysql_query("insert into user_files(id,uname,file_type,file_content,upload_file,file1,file2,file3,file4,key1,key2,key3,key4,modify_time,status,file_st) values($id,'$uname','$ftype','$content2','$fileName','','','','','$key1','$key2','$key3','$key4','$modify_time','0','0')");
	
move_uploaded_file($_FILES['file']['tmp_name'],"uploads/" .$fileName);
$originalfile="uploads/$fname";
$crypt="uploads/$fname2";
Cryptfile($originalfile,$crypt,$pb_key);
unlink("uploads/$fname");
header("location: viewfiles.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Title      : Cloudy
Version    : 1.0
Released   : 20081214
Description: A two-column, fixed-width and lightweight template ideal for 1024x768 resolutions. Suitable for blogs and small websites.

-->
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
.style4 {color: #FF0000}
.style5 {color: #003399}
-->
</style>
</head>
<body>
<!-- start header -->
<div id="wrapper">
<div id="logo">
	<h1><a href="#"> CLOUD owner&nbsp;&nbsp; </a></h1>
       
	<p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style5">&nbsp; User: <?php echo $uname?></span><span class="end">&nbsp;<span class="style4">&nbsp;<a href="logout.php">Logout</a></span></span></p>
</div>
<br />
<div id="header">
	<div id="menu">
		<ul>
			<li id="menu_active"><a href="user.php"><span><span>Home</span></span></a></li>
						<li><a href="viewfiles.php"><span><span>ViewFiles</span></span></a></li>
						<li><a href="user_req.php"><span><span>UserRequest</span></span></a></li>
						<li><a href="user_info.php"><span><span>UserDetails</span></span></a></li>
			            <li class="last"></li>
					</ul>
	</div>
</div><br /></div><br/>
<section class="col2"><center>
		    <h3 class="pad_bot1">Upload Files</h3>
			 <img src="images/1.png" "width="284" height="132" align="middle">
			 <form name="form2" method="post" action="">
		     
		      <div align="center"></div>
    </form>
		    <form id="ContactForm" name="form1" method="post" enctype="multipart/form-data"><br /><br /><div>
		      <div  class="wrapper">
						  <span>Content</span>
		                  <span class="bg">
		                  <input type="text" name="content2" class="input" />
		                  </span>                
		                  <div class="bg"><br />
              <br /></div></div>
	      <div  class="wrapper">
	        <div class="bg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select file
	          <input type="file" name="file" /> 
            <br /><br /></div>
		      </div>
					  <div  class="wrapper">
						  <span></span>
						  <div class="bg">
					    <input type="submit"  name="btn" value="Upload" onClick="return validate()" ></div>
					  </div>
				  </div>
		    </form>
		    <p>&nbsp;</p>
</center>
</section>
<!-- end header -->
<!-- start page -->
<div id="page"><!-- start content -->
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

</div>
<!-- end footer -->
<div align=center></div>
</body>
</html>



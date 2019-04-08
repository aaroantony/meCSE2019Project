<?php
session_start();
extract ($_POST);
include("dbconnect.php");
$cdate=date("d-m-Y"); 
$uname=$_SESSION['uname'];
if($_REQUEST['act']=="ok")
		{
		$did=$_REQUEST['did'];
		$sk=md5($did);
		$key1=substr($sk,0,8);
		$q1=mysql_query("select * from request where id=$did");
		$r1=mysql_fetch_array($q1);
		$user=$r1['uname'];
		$q2=mysql_query("select * from user_reg where uname='$user'");
		$r2=mysql_fetch_array($q2);
		$email=$r2['email'];
		mysql_query("update request set secret_key='$key1',status='2' where id=$did");
		
		include("email.php");
									$objEmail	=	new CI_Email();
									$objEmail->from('cloudservice@gmail.com', "Cloud Service");
									//$objEmail->from('cloudservice@projectone.in', "Cloud Service");
									$objEmail->to("$email");
									//$objEmail->cc($txt_cc);
									//$objEmail->bcc($txt_bcc);
									$objEmail->subject("Secret Key");
									
									$objEmail->message("Secret Key: ".$key1);
									
								
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
		
		
		//header("location:user_req.php");
		?>
		<script language="javascript">
		alert("Key has been sent...");
		window.location.href="user_req.php";
		</script>
		<?php
		
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
<script language="javascript">
  function viewKey(id)
  {
  window.open("viewkey.php?id="+id,"Key","width=300,height=300,toolbar=0,statusbar=0,menubar=0,scrollbars=1");
  }
  function del()
  {
  	if(!confirm("Are you sure want to Delete?"))
	{
	return false;
	}
	return true;
  }
  </script></script>
  <style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {
	font-size: 36px;
	font-weight: bold;
}
.style4 {
	font-size: 24px;
	font-weight: bold;
}
.style6 {color: #FF0000}
-->
  </style>
</head>
<body>
<div class="body1">
  <div class="main">
<!-- header -->
		<header>
<div class="wrapper">
  <nav></nav>
</div>
<!-- start header -->
<div id="wrapper">
<div id="logo">
	<h1><a href="#"> CLOUD Owner </a></h1>
	<p><span class="wrapper">
	  <nav>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User: <?php echo $uname; ?>&nbsp;&nbsp;<a href="logout.php">Logout</a></nav>
      <span class="date">&nbsp; &nbsp;</span></span></p>
</div>
<div id="header">
	<div id="menu">
		<ul>
			<li><a href="user.php"><span><span>Home</span></span></a></li>
						<li><a href="viewfiles.php"><span><span>ViewFiles</span></span></a></li>
						<li id="menu_active"><a href="user_req.php"><span><span>UserRequest</span></span></a></li>
						<li><a href="user_info.php"><span><span>UserDetails</span></span></a></li>
			            <li class="last"></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page"> 
	<!-- start content -->
	<!-- end content -->
    <!-- start sidebar -->
<div id="sidebar">
		 <ul>
		 <center>
		  <li class="style2" id="search">
		    <!-- end sidebar -->
</li>
		  </center>
		</ul>
</div>
	<p>&nbsp;</p>
	<p align="center"> &nbsp;&nbsp;<span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;USER REQUEST              &nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
	<p align="justify">          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">&nbsp;&nbsp;&nbsp;</span></p>
	<table width="498" height="70" border="1" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <th width="79" align="center" class="bg3 style1">Sno</th>
        <th width="61" align="center" class="bg3 style1">User</th>
        <th align="center" class="bg3 style1">Request File </th>
        <th width="68" align="center" class="bg3 style1">Date</th>
        <th width="115" align="center" class="bg3 style1">Send Key </th>
      </tr>
      <?php
		
	    $qry=mysql_query ("select * from request where owner='$uname' && status='1'");
		  $i=0;
		 while($row=mysql_fetch_array($qry))
		 {
		 $i++;
		 $fid=$row['fid'];
		  $qry1=mysql_query("select * from user_files where id='$fid'");
		  $row1=mysql_fetch_array($qry1);
		  
		
		  ?>
      <tr>
        <td class="bg4"><?php echo $i; ?></td>
        <td class="bg4"><?php echo $row['uname'];?></td>
        <td class="bg4"><?php echo $row1['upload_file'];?></td>
        <td class="bg4"><?php echo $row['rdate'];?></td>
        <td class="bg4"><a href="user_req.php?act=ok&did=<?php echo $row['id']; ?>" class="style6">Send</a></td>
      </tr>
      <?php
			}
			
			?>
    </table>
	<p align="justify"><span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">&nbsp;&nbsp;&nbsp;&nbsp; </span></p>
	<p align="justify"><!-- start footer -->
</p>
<div id="footer">
  <div align="center"> <a rel="nofollow" href="#" target="_blank">Cloud Data Owner</a><br />
      <a href="#" target="_blank">Services</a> provided by cloudservice.com
    <!-- {%FOOTER_LINK} -->
      </footer>
  </div>
  <p align="center" id="legal">&nbsp;</p>
</div>
<script type="text/javascript"> Cufon.now();</script>
<div align=center></div>
</body>
</html>



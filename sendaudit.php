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
  </script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<?php
session_start();
extract ($_POST);
include("dbconnect.php");
$cdate=date("d-m-Y");
$fid=$_REQUEST['id'];
$qry=mysql_query("select * from user_files where id=$fid");
$rs2=mysql_fetch_array($qry);
$fname=$rs2['upload_file'];
if(isset($btn))
{

$uname=$rs2['uname'];

		$q=mysql_query("select max(id) from send_audit");
		$r=mysql_fetch_array($q);
		$id=$r['max(id)']+1;
		echo "insert into send_audit(id,uname,fid,fname,hsign,key_block,rdate,status) values($id,'$uname','$fid','$fname','$hsign','$key_block','$cdate','0')";
	$sql=mysql_query("insert into send_audit(id,uname,fid,fname,hsign,key_block,rdate,status) values($id,'$uname','$fid','$fname','$hsign','$key_block','$cdate','0')");
	
mysql_query("update user_files set status='3',file_st='0' where id=$fid");

                    
					if($sql==1)
					{
					?>
					<script language="javascript">
					alert("Auditing data send successfully");
					window.location.href="viewfiles.php";
					</script>
					<?php
					}
		}


?>

<div class="main">
<!-- header -->
		<header>
<div class="wrapper">
			  <nav></nav>
			  <span class="date">&nbsp; &nbsp;</span>
			</div>
<!-- start header -->
<div id="wrapper">
<div id="logo">
	<h1><a href="#"> CLOUD owner </a></h1>
	<p><span class="end">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User: <?php echo $uname?>&nbsp;&nbsp;<a href="logout.php">Logout</a></span></p>
  </div>
<div id="header">
	<div id="menu">
		<ul>
			<li><a href="user.php"><span><span>Home</span></span></a></li>
			<li id="menu_active"><a href="viewfiles.php"><span><span>View Files</span></span></a></li>
			<li><a href="user_req.php"><span><span>User Request</span></span></a></li>
	    	<li><a href="user_info.php"><span><span>User Details</span></span></a></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page"> 
	<p>
	  <!-- start content -->
	  <!-- end content -->
	  <!-- start sidebar -->
	</p>
	<h3 align="center" class="pad_bot1">FILE Information </h3>
	<form action="" method="post" id="form1">
      <table width="372" height="178" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th width="115" align="left" scope="col">File</th>
          <th width="168" align="left" scope="col"><?php echo $fname?>
          </th>
        </tr>
        <tr>
          <td height="25">Hash Signature </td>
          <td><input type="text" name="hsign" /></td>
        </tr>
        <tr>
          <td>          Key Block </td>
          <td><input type="text" name="key_block" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btn" value="Submit" /></td>
        </tr>
      </table>
    </form>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
  </div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p id="legal"><center><footer>
		<a rel="nofollow" href="#" target="_blank">Cloud Data Owner Services provided by cloudservice.com</a><br>
		<!-- {%FOOTER_LINK} -->
	</footer></p>
</div>
</div>
<!-- end footer -->
</body>
</html>



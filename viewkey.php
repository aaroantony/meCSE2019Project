<?php
session_start();
extract($_POST);
include("dbconnect.php");
include("include/title.php");
$cdate=date("d-m-Y"); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Cloudy by Free Css Templates</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
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
  $id=$_REQUEST['id'];
$sql=mysql_query("select * from user_files where id=$id");
 $row=mysql_fetch_array($sql);
 
?>


    <h1 align="center">Key Information </h1>
    <table width="305" height="205" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td width="94" class="purple" scope="col">Key1</td>
        <td width="92" class="blue" scope="col"><?php echo $row['key1'];?></td>
      </tr>
      <tr>
        <td class="purple" scope="col">Key2</td>
        <td class="blue" scope="col"><?php echo $row['key2'];?></td>
      </tr>
      <tr>
        <td class="purple" scope="col">Key3</td>
        <td class="blue" scope="col"><?php echo $row['key3'];?></td>
      </tr>
      <tr>
        <td class="purple" scope="col">Key4</td>
        <td class="blue" scope="col"><?php echo $row['key4'];?></td>
      </tr>
	  
      <tr>
	  
	          <td colspan="2" align="center" class="purple" scope="col"><a href="javascript:window.close()">Close</a></td>
      </tr>
	  
    </table>

</body>
</html>



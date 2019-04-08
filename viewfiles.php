<?php
session_start();
extract ($_POST);
include("dbconnect.php");
$cdate=date("d-m-Y"); 
$uname=$_SESSION['uname'];
$dir="upload/";
$arr=scandir($dir);
foreach($arr as $file)
{
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

<style type="text/css">
<!--
.style4 {color: #FF0000}
.style7 {font-size: 36px}
-->
</style>
<script language="javascript">
  function viewKey(id)
  {
  window.open("viewkey.php?id="+id,"Key","width=300,height=300,toolbar=0,statusbar=0,menubar=0,scrollbars=1");
  }
  </script>
</head>
<body>
<!-- start header -->
<div id="logo">
	<h1><a href="#"> <span class="style7">CLOUD owner  </span><span class="end"><span class="style4"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></h1>
	<h1>&nbsp;</h1>
	<h1><a href="#"><span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></h1>
	<h1><a href="#"><span class="style4">&nbsp;</span></a></h1>
	<span class="end"><span class="style4">User: </span><?php echo $uname?>&nbsp;<span class="style4">&nbsp;<a href="logout.php" class="style4">Logout</a></span></span></div>
<div id="header">
	<div id="menu">
		<ul>
			<li><a href="user.php"><span><span>Home</span></span></a></li>
						<li id="menu_active"><a href="viewfiles.php"><span><span>ViewFiles</span></span></a></li>
						<li><a href="user_req.php"><span><span>UserRequest</span></span></a></li>
						<li><a href="user_info.php"><span><span>UserDetails</span></span></a></li>
			            <li class="last"></li>
		</ul>
	</div>
</div>
<!-- end header -->
<!-- start page -->
<div id="page"> 
	<p>
	  <!-- start content -->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FILES</p>
	<table width="621" height="61" border="1" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <th width="30" align="center" class="bg3">Sno</th>
        <th width="67" align="center" class="bg3">Content</th>
        <th width="130" align="center" class="bg3">Uploaded File</th>
        <th width="102" align="center" class="bg3">Key Status </th>
        <th width="90" align="center" class="bg3">Auditing</th>
        <th width="138" align="center" class="bg3">Action</th>
        <th width="104" align="center" class="bg3">File Status </th>
      </tr>
      <?php
		
         $qry=mysql_query ("select * from user_files where uname='$uname'");
		$num=mysql_num_rows($qry);
	if($_REQUEST['act']=="del")
	{
	$did=$_REQUEST['id'];
		$up=mysql_query("delete from user_files where id='$did'");
		header("location:viewfiles.php");
	}
       
	  
		 if($num)
		 {
		 $i=0;
		   while($row=mysql_fetch_array($qry))
		  		  {
		  $i++;
		  
		   
		  ?>
      <tr>
        <td class="bg4"><?php echo $i;?></td>
        <td class="bg4"><?php  echo $row['file_content'];?></td>
        <td class="bg4"><?php  echo $row['upload_file'];?></td>
        <td class="bg4"><?php
		 
		  
			if($row['status']>=1)
			{
			?>
			 <a href="javascript:viewKey('<?php echo $row['id']; ?>')">View your key</a>
			<?php
			
			//echo "View Key";
			}
			else 
			{
			echo "process..";
			}
			?>
        </td>
        <td class="bg4"><?php
			if($row['status']==2 || $row['status']==1)
			{
			?>
			<a href="sendaudit.php?act=ok&id=<?php echo $row['id']; ?>" > sendaudit</a>
			<?php
			
            // echo "Send Audit";
             
			}
            else if($row['status']==3)
                        {
                        echo "Auditing";
        
		                }
			else
		
			{
			echo "No file";
			}
			?>
          &nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td class="bg4"><a href="download.php?file1=<?php echo $row['upload_file']; ?>&amp;folder1=uploads">Download</a> / <a href="viewfiles.php?act=del&amp;did=<?php echo $row['id']; ?>&amp;file1=<?php echo $_FILES['file']['delete_file']; ?>" onclick="return del()">Delete </a></td>
        <td class="bg4"><?php
			if($row['file_st']==1)
			{
			echo "File found";
			}
			else if($row['file_st']==3)
			{
			echo "File found but Modified";
			}
			else if($row['file_st']==2)
			{
			echo "File not found";
			}
			else
			{
			echo "-";
			}
			
				?></td>
      </tr>
      <?php
	   }
	   }
	   ?>
</table>
	<article id="content"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </p>
      <div id="page">
      <div id="footer">
          <div align="center"> <a rel="nofollow" href="#" target="_blank">Cloud Data Owner</a><br />
              <a href="#" target="_blank">Services</a> provided by cloudservice.com
            <!-- {%FOOTER_LINK} -->
              </footer>
          </div>
        </div>
        <!-- end footer -->
        <div align="center">
          <script type="text/javascript"> Cufon.now();</script>
        </div>
        <!-- end footer -->
      </div>
      <p>&nbsp;&nbsp;&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </article>
 
<div id="page"><!-- start content -->
<!-- end footer -->
<div align=center><script type="text/javascript"> Cufon.now();</script></div>
<!-- end footer -->
</body>
</html>
</div>




	

	


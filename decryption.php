<?php
include("decrypt.php");
$fname=$_REQUEST['file1'];
if(isset($_POST['btn']))
{
$pb_key=$_POST['pb_key'];
	
	
					$crypt = "upload/$fname";
					$decrypt = "upload/$fname";
					 
					DecryptFile($crypt,$decrypt,$pb_key);
	header("location:download.php?file1=".$fname."&folder1=upload");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="342" border="1" align="center">
    <tr>
      <th colspan="2" scope="col">Decryption</th>
    </tr>
    <tr>
      <td>Enter the Public Key </td>
      <td><input type="text" name="pb_key" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn" value="Submit" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p align="center"><a href="upload.php">Upload</a> | <a href="viewfiles.php">View Files</a></p>
</body>
</html>

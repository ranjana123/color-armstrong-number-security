<?php 
session_start();
$redval=$_SESSION['rval'];
$greenval=$_SESSION['gval'];
$blueval=$_SESSION['bval'];
$receiver=$_SESSION['receivername'];
$message1=$_SESSION['msg'];
$armstrongnumber=$_SESSION['armstrongnum'];
if (isset ( $_POST ['encrypt'] )){
	$db = mysql_connect ( 'localhost', 'root', '' );
	mysql_select_db ( 'sender' );
	$q = sprintf ( "INSERT INTO sender_table VALUES('%s',%d,%d,%d,'%s',%d)",$receiver ,$redval, $greenval, $blueval, $message1, $armstrongnumber );
	$t=mysql_query ( $q );
	mysql_close ();
	header ( 'Location: ' . 'encryption.php' );
}
?>
<html>
<body style="background-color:#e0e0e0">
<br></br>
<br></br>
<form method="post" action=<?php echo $_SERVER['PHP_SELF'] ?>>
<div style="font-size: 20; color: blue; align: left;"><a href="senderpage.php" onClick="message('Previous')"> BACK </a></div>

<script language="JavaScript">
function message(element){
alert("Do You Want to Go" + element + " Page")
}

</script>

<table width="700" height="200" border="0" align="center" bgcolor="#e0e0e0">
<tr>
<td>
<tr><td><b><div style="color:99004c; text-align:center;">Keyvalues</div></b></td><td><div style="align-text:center;">:</div></td><td> <?php echo $_SESSION['key1'] ?> &nbsp;&nbsp;&nbsp; <?php echo $_SESSION['key2'] ?>&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['key3'] ?>&nbsp;&nbsp;&nbsp; </td></tr>
</td>
</tr>
<tr></tr>
<tr><td><b><div style="color:99004c; text-align:center;">ColorValues</div></b></td><td>:</td><td> <?php echo $_SESSION['rval'] 
?>&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['gval'] ?>&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['bval'] ?>&nbsp;&nbsp;&nbsp; </td></tr>
	</td>
	</tr>
	
	
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>	

<tr><td><td colspan="2" style="text_align: center;"><input type="submit" name="encrypt" value="Encrypt" /></td>  
</table>
</form>
</body>
</html>
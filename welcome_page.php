<?php  
$username=$password=$usernameerr=$passworderr=null;
if (isset ( $_POST ['login'] )) {
	if($_POST["username"]!=null && $_POST["password"]!=null){
		$username=$_POST["username"];
		$password=$_POST["password"];
		if($_POST['logintype']=="sender"){
			if(correct_sender( $username, $password)){
				header('Location: ' . 'senderpage.php');
			}else{
				$passworderr="Enter the correct details";
			}	
		}else{
			if(correct_receiver($username,$password)){
				header('Location: ' . 'receiverpage.php');
			}else{
				$passworderr="Enter the correct details";
			}
		}
	}else{
		$usernameerr="Enter username";
		$passworderr="Enter password";
	}	
}

function correct_sender($username,$password){
	$db = mysql_connect ( 'localhost', 'root', '' );
	mysql_select_db ( 'account1' );
	$q="SELECT * FROM sender_details";
	$login = mysql_query($q);
	while($row=mysql_fetch_array($login)){
		$proceed=true;
		if(strcmp($username,$row[2])==0){
			if(strcmp($password,$row[3])==0){
				mysql_close ();
				return true;
			}else{
				$proceed=false;
			}
		}else{
			$proceed=false;
		}
	}
	if($proceed==false){
		$usernameerr="Entered details not valid";
	}
	mysql_close ();
	return false;
}

function correct_receiver($username,$password){
	$db = mysql_connect ( 'localhost', 'root', '' );
	mysql_select_db ( 'account' );
	$q="SELECT * FROM receiver_details";
	$login = mysql_query($q);
	while($row=mysql_fetch_array($login)){
		$proceed=true;
		if(strcmp($username,$row[2])==0){
			if(strcmp($password,$row[3])==0){
				mysql_close ();
				return true;
			}else{
				$proceed=false;
			}
		}else{
			$proceed=false;
		}
	}
	if($proceed==false){
		$usernameerr="Entered details not valid";
	}
	mysql_close ();
	return false;
}



?>
<html>
<h1>
 <img src="pic.jpg" width=1400 height=400>
</h1>

<body style="background-color:#122a0a">
<style>
.error{color:#FF0000;}
</style>

<form method="post" action=<?php echo $_SERVER['PHP_SELF'] ?>>
<table style="align:right;background-color:white; margin:90px; border: 5px ; width:10cm; height : 8.2cm">
<tr><td colspan="2"> <div style="font-size: 29;color:black; text-align: center; "><b>LogIn</b></div> </tr>
<tr>
<td>
<table style="margin:50px">

<tr><td>Username</td><td>:</td><td><input type="text" name="username"/>
<span class="error">
	<?php 
	echo  $usernameerr;
	?>
</span></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password"/> 
<span class="error">
	<?php 
	echo  $passworderr;
	?>
</span></td></tr>
<tr><td>Login Type</td><td>:</td><td>
	<select name="logintype">
	<option value="sender">Sender</option>
	<option value="receiver">Receiver</option>
	</select>
</td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="login" value="Login" style="width: 100px; align:center;"></td></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td> <tr><td> <div  style="font-size: 20; color:black; text-align: center; "><a href="create_new_account.php">
Create new account. </a> </div></td></tr>
</form>
</p>
</html>
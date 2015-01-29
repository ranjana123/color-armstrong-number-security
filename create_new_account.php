<?php 
$proceed=false;
$logintypeerr=$nameerr=$usernameerr=$password1err=$addresserr=$emailerr=$moberr=$doberr=$gendererr=null;
$logintype=$name=$username=$password=$password1=$address=$email=$mob=$dob=$gender=null;
if (isset ( $_POST ['submit'] )) {
	if($_POST["logintype"]=='Select Login Type'){
		$logintypeerr="Login type is required";
	}else{
		$logintype=test_input($_POST['logintype']);
	}
	$name=$_POST["name"];
	if(empty($_POST["name"])){
		$nameerr="Name is required";
	}
	if(!preg_match("/^[a-zA-Z ]*$/",$name)){
		$nameerr="Only letters and white space allowed";
	}else{
		$name=test_input($_POST["name"]);
	}
	if(empty($_POST['username'])) {
		$usernameerr="User name is required";
	}else{
		$db = mysql_connect ( 'localhost', 'root', '' );
		mysql_select_db ( 'account1' );
		$a="SELECT * FROM sender_details";
		$result=mysql_query($a);
		$username=test_input($_POST["username"]);
		while($row=mysql_fetch_array($result)){
			if(strcmp($username,$row[2])==0){
				$usernameerr="username already exists select another one";
			}
		}
		mysql_close();
	}
	$password=$_POST["password"];
	$password1=$_POST["password1"];
	
	if(!empty($password) && !empty($password1) && (strcmp($password,$password1)==0)){
		echo "password is correct";
		$password1err="";
		$password=test_input($_POST["password"]);
	}else{
		$password1err="Invalid password";
	}
	$address=$_POST["address"];
	if(empty($_POST["address"])){
		$addresserr="Address is required";
	}else{
		$address=test_input($_POST["address"]);
	}
	$email=$_POST["email"];
	if(empty($_POST["email"])){
		$emailerr="Email is required";
	}
	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
		$emailerr="Invalid Email format";
	}else{
		$email=test_input($_POST["email"]);
	}	
	$mob=$_POST["mob"];
	if(empty($_POST["mob"])){
		$moberr="Mobile number is required";
	}
	if(!ereg("^[0-9)( -]{10,20}(([xX]|(ext)|(ex))?[ -]?[0-9]{1,7})?$",$mob)){
		$moberr="Enter correct mobile number";
		$mob="";
	}
	else{
		$mob=test_input($_POST["mob"]);
	}
	if(empty($_POST["dob"])){
		$doberr="Date of birth is required";
	}
	$dob=$_POST["dob"];
	if(!preg_match('|^\d{2}/\d{2}/\d{4}$|',$dob)){
		$doberr="Please enter a date in DD/MM/YYYY format";
		$dob="";
	}else{
			$dob=test_input($_POST["dob"]);
	}
	if(empty($_POST["gender"])){
		$gendererr="Gender is required";
	}else{
		$gender=test_input($_POST["gender"]);
	}
	if($logintypeerr==null && $nameerr==null && $usernameerr==null && $password1err==null && $password1err==null && $addresserr==null && $emailerr==null && $doberr==null && $gendererr==null){
		$proceed=true;
	}
	if($proceed==true){
		if($logintype=="Sender"){
			if (insert_sender( $db, $logintype, $name, $username, $password1, $address, $email, $mob, $dob, $gender)){
				header ( 'Location: ' . 'welcome_page.php' );
			}
		}else{
			if(insert_receiver($db,$logintype,$name,$username,$password1,$address,$email,$mob,$dob,$gender)){
				mysql_close ();
				header ( 'Location: ' . 'welcome_page.php' );
			}
		}
	}	
}

function test_input($data)
 {
	$data=trim($data);
	return $data;
}

function insert_sender( $db, $logintype, $name, $username, $password1, $address, $email, $mob, $dob, $gender){
	$db = mysql_connect ( 'localhost', 'root', '' );
	mysql_select_db ( 'account1' );
	$q = sprintf ( "INSERT INTO sender_details VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')", $logintype,$name, $username, $password1, $address, $email, $mob, $dob, $gender);
	$t=mysql_query ( $q );
	mysql_close ();
	return true;
}

function insert_receiver( $db, $logintype, $name, $username, $password1, $address, $email, $mob, $dob, $gender){
	$key1=rand(1,30);
	$key2=rand(1,30);
	$key3=rand(1,30);
	$db = mysql_connect ( 'localhost', 'root', '' );
	mysql_select_db ( 'account1' );
	$q = sprintf ( "INSERT INTO receiver_details VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s',%d,%d,%d)", $logintype,$name, $username, $password1, $address, $email, $mob, $dob, $gender,$key1,$key2,$key3);
	$t=mysql_query ( $q );
	mysql_close ();
	return true;
}	
?>

<html>
<body style="background:black;">
<p>
<img src="ry.jpg" width=400 height=300 style="float: left"/>
</p>
<style>
.error{color:#FF0000;}

</style>
<form method="post" action="<?php
echo ($_SERVER["PHP_SELF"]); 
?>">


<table align="right" cellpadding="0" cellspacing="1" bgcolor="white" margin="90px" width="15cm" height="10cm">
<tr><td colspan="2"> <div style="font-size: 31;color:black; text-align: center; "><b>Create Account</b> </div><br></br>
<div style="color:red; text-align: center; "><h4>All Fields Are Required</h4> </div></tr>
<tr>
<td>
<table style="margin:80px">
<tr>
<td>Login Type</td><td>:</td>
<td><select name="logintype">
<option
	<?php if(!$proceed && $logintype=='Select Login Type'){echo 'selected="selected"'; } ?>>Select Login Type</option>
<option
	<?php if(!$proceed && $logintype=='Sender'){echo 'selected="selected"'; } ?>>Sender</option>
<option
	<?php if($logintype=='Receiver'){echo 'selected="selected"'; } ?>>Receiver</option>
</select>
<span class="error">
	<?php 
echo  $logintypeerr;
	?>
</span></td></tr>
<tr><td>Name</td><td>:</td><td><input type="text" name="name"
	<?php
	echo 'value="' . $name . '"';
	?>/>
<span class="error">
	<?php 
	echo  $nameerr;
	?>
</span></td></tr>
<tr><td>UserName</td><td>:</td><td><input type="text" name="username" 
	<?php
	echo 'value="' . $username . '"';
	?>/>
<span class="error">
	<?php 
	echo  $usernameerr;
	?>
</span></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password" />
<tr><td>ConfirmPassword</td><td>:</td><td><input type="password" name="password1"/><span class="error">
	<?php 
	echo $password1err;
	?>
</span></td></tr>
<tr></tr>
<tr><td>Address</td><td> :</td><td><textarea name="address" value="address" style="width: 275px; height: 80px;" 
	<?php
	echo 'value="' . $address . '"';
	?>"/>
</textarea>
<span class="error">
	<?php 
	echo $addresserr;
	?>
</span></td></tr>	
<tr><td>E-mail</td><td>:</td><td><input type="email" name="email"
	<?php
	echo 'value="' . $email . '"'; 
	?>"/><span class="error">
	<?php 
	echo $emailerr;
	?>
</span></td></tr>
<tr><td>Mobile Number</td><td>:</td><td><input type="text" name="mob" 
	<?php
	echo 'value="' . $mob . '"'; 
	?>/>
	<span class="error">
	<?php 
	echo $moberr;
	?>
	</span>
	</td></tr>
<tr><td>Date of birth</td><td>:</td><td><br><input type="date" name="dob"
	<?php
	echo 'value="' . $dob . '"'; 
	?>/>(DD/MM/YYYY)
	<span class="error">
	<?php 
	echo $doberr;
	?>
	</span></td></tr>
<tr><td>Gender</td><td>:</td><td>
	<input type="radio" name="gender" 
	<?php
	if(isset($gender)&&$gender=="female")
		echo "checked"; 
	?>
	value="female">Female
	<input type="radio" name="gender" 
	<?php
	if(isset($gender)&&$gender=="male")
		echo "checked"; 
	?>
	value="male">Male
	<span class="error">
	<?php 
	echo $gendererr;
	?>
</span></td></tr>
<tr><td><tr><td><tr><td><tr><td><tr><td><tr><td><tr><td><tr><td><tr><td><tr><td>&nbsp;</td><td>&nbsp;</td><td><input type= "submit" name="submit" value="submit" style="width: 100px"></td></tr></td></tr></td></tr></td></tr></td></tr></td></tr>
</td></tr></td></tr></td></tr></td></tr>
</table>
</form>
</body>
</html>
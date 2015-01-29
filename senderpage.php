<?php
session_start();
$receivername=$message=$arm=null;
$receivernameerr=$messageerr=$armstrongnumerr=null;
if(isset($_POST['next'])){
	$receivername=$_POST['username'];
	$message=$_POST["message"];
	$arm=$_POST["armstrongnum"];
	
	$rval=$_POST["TR"];
	$gval=$_POST["TG"];
	$bval=$_POST["TB"];
	
	$_SESSION['rval']=$rval;
	$_SESSION['gval']=$gval;
	$_SESSION['bval']=$bval;
		
	$_SESSION['msg']=$message;
	$_SESSION['armstrongnum']=$arm;
	$_SESSION['receivername']=$receivername;
	
	if($receivername!=null && $message!=null && $arm!=null){
		$db = mysql_connect ( 'localhost', 'root', '' );
		mysql_select_db ( 'account1' );
		$a="SELECT * FROM receiver_details";
		$result=mysql_query($a);
		while($row=mysql_fetch_array($result)){
			if($row[2]==$_POST['username']){
				$_SESSION['key1']=$row[9];
				$_SESSION['key2']=$row[10];
				$_SESSION['key3']=$row[11];
				mysql_close();
				header ( 'Location: ' . 'sender1.php' );
			}
		}
		$receivernameerr="Username does not exist";	
	}else{
		if($receivername==null)
			$receivernameerr="Enter receiver name";
		if($message==null)
			$messageerr="Enter the message";
		if($arm==null)
			$armstrongnumerr="Enter any armstrong number";
	}
}
?>
<html>

<style>
.error{color:#FF0000;}
</style>
<body style="background-color:e0e0e0">

<form method="post" action=<?php echo $_SERVER['PHP_SELF'] ?>>
<div style="font-size: 20; color: blue; text-align: right;"><a href="logout.php" onClick="message('LOG OUT')"> Log Out </a></div>

<script language="JavaScript">
function message(element){
alert("Do You Want to" + element + " This Page")
}

</script>




<table align="left" width="80cm" height="100cm">
<tr><td><div style="color:99004c;font-size:1.2em;"><b>Pick Color:</b></div>
	</td></tr>
	<table width="300px" align="left">
		<tr>
			<td onClick="SetColor('#330000')" style="width=8px;" bgcolor="#330000">&nbsp;</td>
			<td onClick="SetColor('#331900')" style="width=8px;" bgcolor="#331900">&nbsp;</td>
			<td onClick="SetColor('#333300')" style="width=8px;" bgcolor="#333300">&nbsp;</td>
			<td onClick="SetColor('#193300')" style="width=8px;" bgcolor="#193300">&nbsp;</td>
			<td onClick="SetColor('#003300')" style="width=8px;" bgcolor="#003300">&nbsp;</td>
			<td onClick="SetColor('#003319')" style="width=8px;" bgcolor="#003319">&nbsp;</td>
			<td onClick="SetColor('#003333')" style="width=8px;" bgcolor="#003333">&nbsp;</td>
			<td onClick="SetColor('#001933')" style="width=8px;" bgcolor="#001933">&nbsp;</td>
			<td onClick="SetColor('#000033')" style="width=8px;" bgcolor="#000033">&nbsp;</td>
			<td onClick="SetColor('#190033')" style="width=8px;" bgcolor="#190033">&nbsp;</td>
			<td onClick="SetColor('#330033')" style="width=8px;" bgcolor="#330033">&nbsp;</td>
			<td onClick="SetColor('#330019')" style="width=8px;" bgcolor="#330019">&nbsp;</td>
			<td onClick="SetColor('#000000')" style="width=8px;" bgcolor="#000000">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#660000')" style="width=8px;" bgcolor="#660000">&nbsp;</td>
			<td onClick="SetColor('#663300')" style="width=8px;" bgcolor="#663300">&nbsp;</td>
			<td onClick="SetColor('#666600')" style="width=8px;" bgcolor="#666600">&nbsp;</td>
			<td onClick="SetColor('#336600')" style="width=8px;" bgcolor="#336600">&nbsp;</td>
			<td onClick="SetColor('#006600')" style="width=8px;" bgcolor="#006600">&nbsp;</td>
			<td onClick="SetColor('#006633')" style="width=8px;" bgcolor="#006633">&nbsp;</td>
			<td onClick="SetColor('#006666')" style="width=8px;" bgcolor="#006666">&nbsp;</td>
			<td onClick="SetColor('#003366')" style="width=8px;" bgcolor="#003366">&nbsp;</td>
			<td onClick="SetColor('#000066')" style="width=8px;" bgcolor="#000066">&nbsp;</td>
			<td onClick="SetColor('#330066')" style="width=8px;" bgcolor="#330066">&nbsp;</td>
			<td onClick="SetColor('#660066')" style="width=8px;" bgcolor="#660066">&nbsp;</td>
			<td onClick="SetColor('#660033')" style="width=8px;" bgcolor="#660033">&nbsp;</td>
			<td onClick="SetColor('#202020')" style="width=80x;" bgcolor="#202020">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#990000')" style="width=8px;" bgcolor="#990000">&nbsp;</td>
			<td onClick="SetColor('#994C00')" style="width=8px;" bgcolor="#994C00">&nbsp;</td>
			<td onClick="SetColor('#999900')" style="width=8px;" bgcolor="#999900">&nbsp;</td>
			<td onClick="SetColor('#4C9900')" style="width=8px;" bgcolor="#4C9900">&nbsp;</td>
			<td onClick="SetColor('#009900')" style="width=8px;" bgcolor="#009900">&nbsp;</td>
			<td onClick="SetColor('#00994C')" style="width=8px;" bgcolor="#00994C">&nbsp;</td>
			<td onClick="SetColor('#009999')" style="width=8px;" bgcolor="#009999">&nbsp;</td>
			<td onClick="SetColor('#004C99')" style="width=8px;" bgcolor="#004C99">&nbsp;</td>
			<td onClick="SetColor('#000099')" style="width=8px;" bgcolor="#000099">&nbsp;</td>
			<td onClick="SetColor('#4C0099')" style="width=8px;" bgcolor="#4C0099">&nbsp;</td>
			<td onClick="SetColor('#990099')" style="width=8px;" bgcolor="#990099">&nbsp;</td>
			<td onClick="SetColor('#99004C')" style="width=8px;" bgcolor="#99004C">&nbsp;</td>
			<td onClick="SetColor('#404040')" style="width=8px;" bgcolor="#404040">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#CC0000')" style="width=8px;"bgcolor="#CC0000">&nbsp;</td>
			<td onClick="SetColor('#CC6600')" style="width=8px;" bgcolor="#CC6600">&nbsp;</td>
			<td onClick="SetColor('#CCCC00')" style="width=8px;"bgcolor="#CCCC00">&nbsp;</td>
			<td onClick="SetColor('#66CC00')" style="width=8px;"bgcolor="#66CC00">&nbsp;</td>
			<td onClick="SetColor('#00CC00')" style="width=8px;"bgcolor="#00CC00">&nbsp;</td>
			<td onClick="SetColor('#00CC66')" style="width=8px;"bgcolor="#00CC66">&nbsp;</td>
			<td onClick="SetColor('#00CCCC')" style="width=8px;"bgcolor="#00CCCC">&nbsp;</td>
			<td onClick="SetColor('#0066CC')" style="width=8px;"bgcolor="#0066CC">&nbsp;</td>
			<td onClick="SetColor('#0000CC')" style="width=8px;"bgcolor="#0000CC">&nbsp;</td>
			<td onClick="Setcolor('#6600CC')" style="width=8px;"bgcolor="#6600CC">&nbsp;</td>
			<td onClick="SetColor('#CC00CC')" style="width=8px;"bgcolor="#CC00CC">&nbsp;</td>
			<td onClick="SetColor('#CC0066')" style="width=8px;"bgcolor="#CC0066">&nbsp;</td>
			<td onClick="SetColor('#606060')" style="width=8px;"bgcolor="#606060">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#FF0000')" style="width=8px;"bgcolor="#FF0000">&nbsp;</td>
			<td onClick="SetColor('#FF8000')" style="width=8px;"bgcolor="#FF8000">&nbsp;</td>
			<td onClick="SetColor('#FFFF00')" style="width=8px;"bgcolor="#FFFF00">&nbsp;</td>
			<td onClick="SetColor('#80FF00')" style="width=8px;"bgcolor="#80FF00">&nbsp;</td>
			<td onClick="SetColor('#00FF00')" style="width=8px;"bgcolor="#00FF00">&nbsp;</td>
			<td onClick="SetColor('#00FF80')" style="width=8px;"bgcolor="#00FF80">&nbsp;</td>
			<td onClick="SetColor('#00FFFF')" style="width=8px;"bgcolor="#00FFFF">&nbsp;</td>
			<td onClick="SetColor('#0080FF')" style="width=8px;"bgcolor="#0080FF">&nbsp;</td>
			<td onClick="SetColor('#0000FF')" style="width=8px;"bgcolor="#0000FF">&nbsp;</td>
			<td onClick="SetColor('#7F00FF')" style="width=8px;"bgcolor="#7F00FF">&nbsp;</td>
			<td onClick="SetColor('#FF00FF')" style="width=8px;"bgcolor="#FF00FF">&nbsp;</td>
			<td onClick="SetColor('#FF007F')" style="width=8px;"bgcolor="#FF007F">&nbsp;</td>
			<td onClick="SetColor('#808080')" style="width=8px;"bgcolor="#808080">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#FF3333')"  style="width=8px;"bgcolor="#FF3333">&nbsp;</td>
			<td onClick="SetColor('#FF9933')"  style="width=8px;"bgcolor="#FF9933">&nbsp;</td>
			<td onClick="SetColor('#FFFF33')"  style="width=8px;"bgcolor="#FFFF33">&nbsp;</td>
			<td onClick="SetColor('#99FF33')"  style="width=8px;"bgcolor="#99FF33">&nbsp;</td>
			<td onClick="SetColor('#33FF33')"  style="width=8px;"bgcolor="#33FF33">&nbsp;</td>
			<td onClick="SetColor('#33FF99')"  style="width=8px;"bgcolor="#33FF99">&nbsp;</td>
			<td onClick="SetColor('#33FFFF')"  style="width=8px;"bgcolor="#33FFFF">&nbsp;</td>
			<td onClick="SetColor('#3399FF')"  style="width=8px;"bgcolor="#3399FF">&nbsp;</td>
			<td onClick="SetColor('#3333FF')"  style="width=8px;"bgcolor="#3333FF">&nbsp;</td>
			<td onClick="SetColor('#9933FF')"  style="width=8px;"bgcolor="#9933FF">&nbsp;</td>
			<td onClick="SetColor('#FF33FF')"  style="width=8px;"bgcolor="#FF33FF">&nbsp;</td>
			<td onClick="SetColor('#FF3399')"  style="width=8px;"bgcolor="#FF3399">&nbsp;</td>
			<td onClick="SetColor('#A0A0A0')"  style="width=8px;"bgcolor="#A0A0A0">&nbsp;</td>

		</tr>
		<tr>
			<td  onClick="SetColor('#FF6666')" style="width=8px;"bgcolor="#FF6666">&nbsp;</td>
			<td  onClick="SetColor('#FFB266')" style="width=8px;"bgcolor="#FFB266">&nbsp;</td>
			<td  onClick="SetColor('#FFFF66')" style="width=8px;"bgcolor="#FFFF66">&nbsp;</td>
			<td  onClick="SetColor('#B2FF66')" style="width=8px;"bgcolor="#B2FF66">&nbsp;</td>
			<td  onClick="SetColor('#66FF66')" style="width=8px;"bgcolor="#66FF66">&nbsp;</td>
			<td  onClick="SetColor('#66FFB2')" style="width=8px;"bgcolor="#66FFB2">&nbsp;</td>
			<td  onClick="SetColor('#66FFFF')" style="width=8px;"bgcolor="#66FFFF">&nbsp;</td>
			<td  onClick="SetColor('#66B2FF')" style="width=8px;"bgcolor="#66B2FF">&nbsp;</td>
			<td  onClick="SetColor('#6666FF')" style="width=8px;"bgcolor="#6666FF">&nbsp;</td>
			<td  onClick="SetColor('#B266FF')" style="width=8px;"bgcolor="#B266FF">&nbsp;</td>
			<td  onClick="SetColor('#FF66FF')" style="width=8px;"bgcolor="#FF66FF">&nbsp;</td>
			<td  onClick="SetColor('#FF66B2')" style="width=8px;"bgcolor="#FF66B2">&nbsp;</td>
			<td  onClick="SetColor('#C0C0C0')" style="width=8px;"bgcolor="#C0C0C0">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#FF9999')"  style="width=8px;"bgcolor="#FF9999">&nbsp;</td>
			<td onClick="SetColor('#FFCC99')"  style="width=8px;"bgcolor="#FFCC99">&nbsp;</td>
			<td onClick="SetColor('#FFFF99')"  style="width=8px;"bgcolor="#FFFF99">&nbsp;</td>
			<td onClick="SetColor('#CCFF99')"  style="width=8px;"bgcolor="#CCFF99">&nbsp;</td>
			<td onClick="SetColor('#99FF99')"  style="width=8px;"bgcolor="#99FF99">&nbsp;</td>
			<td onClick="SetColor('#99FFCC')"  style="width=8px;"bgcolor="#99FFCC">&nbsp;</td>
			<td onClick="SetColor('#99FFFF')"  style="width=8px;"bgcolor="#99FFFF">&nbsp;</td>
			<td onClick="SetColor('#99CCFF')"  style="width=8px;"bgcolor="#99CCFF">&nbsp;</td>
			<td onClick="SetColor('#9999FF')"  style="width=8px;"bgcolor="#9999FF">&nbsp;</td>
			<td onClick="SetColor('#CC99FF')"  style="width=8px;"bgcolor="#CC99FF">&nbsp;</td>
			<td onClick="SetColor('#FF99FF')"  style="width=8px;"bgcolor="#FF99FF">&nbsp;</td>
			<td onClick="SetColor('#FF99CC')"  style="width=8px;"bgcolor="#FF99CC">&nbsp;</td>
			<td onClick="SetColor('#E0E0E0')"  style="width=8px;"bgcolor="#E0E0E0">&nbsp;</td>

		</tr>
		<tr>
			<td onClick="SetColor('#FFCCCC')" style="width=8px;"bgcolor="#FFCCCC">&nbsp;</td>
			<td onClick="SetColor('#FFE5CC')" style="width=8px;"bgcolor="#FFE5CC">&nbsp;</td>
			<td onClick="SetColor('#FFFFCC')" style="width=8px;"bgcolor="#FFFFCC">&nbsp;</td>
			<td onClick="SetColor('#E5FFCC')" style="width=8px;"bgcolor="#E5FFCC">&nbsp;</td>
			<td onClick="SetColor('#CCFFCC')" style="width=8px;"bgcolor="#CCFFCC">&nbsp;</td>
			<td onClick="SetColor('#CCFFE5')" style="width=8px;"bgcolor="#CCFFE5">&nbsp;</td>
			<td onClick="SetColor('#CCFFFF')" style="width=8px;"bgcolor="#CCFFFF">&nbsp;</td>
			<td onClick="SetColor('#CCE5FF')" style="width=8px;"bgcolor="#CCE5FF">&nbsp;</td>
			<td onClick="SetColor('#CCCCFF')" style="width=8px;"bgcolor="#CCCCFF">&nbsp;</td>
			<td onClick="SetColor('#E5CCFF')" style="width=8px;"bgcolor="#E5CCFF">&nbsp;</td>
			<td onClick="SetColor('#FFCCCC')" style="width=8px;"bgcolor="#FFCCFF">&nbsp;</td>
			<td onClick="SetColor('#FFCCE5')" style="width=8px;"bgcolor="#FFCCE5">&nbsp;</td>
			<td onClick="SetColor('#FFFFFF')" style="width=8px;"bgcolor="#FFFFFF">&nbsp;</td>
		</tr>

		</table>
			
<script type="text/javascript">
function GetHexNum(s)
{
	n = parseInt(s,16);
	return n;
}


function SetColor(color) 
{
	var len = String(color).length;
	color = String(color).substring(len-6, len);
	document.getElementById("TH").value = color;				
	document.getElementById("tt").style.backgroundColor = '#'+color;
	r = GetHexNum( String(color).substring(0,2) );
	g = GetHexNum( String(color).substring(2,4) );
	b = GetHexNum( String(color).substring(4,6) );
	document.getElementById("TR").value=r;				
	document.getElementById("TG").value=g;				
	document.getElementById("TB").value=b;				
}
</script> 
			
			<p>&nbsp;</p>
			<tr><td></td></tr>
			<table style="font-size:1.2em;">
			
				<tr>
					<td><b><div style="color:blue; text-align: center; ">Hex  : #</div></b></td>
					<td><input value="CCFFE5" id="TH" name="T1" style="width:80px" type="text"></td>
					<td></td>
					<td id="tt" rowspan="3" style="width: 80px; border: 1px solid darkgray; background-color: rgb(204, 255, 229);"> </td>
				</tr>
				<tr>
					<td><b><div style="color:blue;">Red :</div></b></td>
					<td><input value="204" id="TR" name="TR" style="width:80px" type="text"></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b><div style="color:blue;">Green:</b></div>&nbsp;</td>
					<td><input value="255" id="TG" name="TG" style="width:80px" type="text"></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td><b><div style="color:blue;">Blue:</b></div>&nbsp;</td>
					<td><input value="229" id="TB" name="TB" style="width:80px" type="text"></td>
					<td>&nbsp;</td>
				</tr>


      
				</tbody></table>
</table>

	<br></br><br></br>
	<table align="left" width="150cm"  height="200cm">
	<tr><td><div style="color:99004c; font-size:1.2em;"><b>Receiver Username</b></div></td><td> :</td><td><input type="text" name="username" size="20"
<?php
	echo 'value="' . $receivername . '"'; 
?>/>
<span class="error">
	<?php 
	echo  "<br></br>".$receivernameerr;
	?>
</span></tr></td>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>	
<tr><td><b><div style="color:99004c; font-size:1.2em;">Message</b></div></td><td> :</td><td><textarea name="message" style="width: 275px; height: 80px"
<?php
	echo 'value="' . $message . '"'; 
?>/>
</textarea>
<span class="error">
	<?php 
	echo  "<br></br>".$messageerr;
	?>
</span></td></tr>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>	
	
<tr><td><b><div style="color:99004c; font-size:1.2em;">Choose Armstrong Number</b></div></td><td>:
<td><select name="armstrongnum">
	<option value="">select</option>
	<option value="1">1</option>
	<option value="153">153</option>
	<option value="370">370</option>
	<option value="371">371</option>
	<option value="407">407</option>
	<option value="1633">1633</option>
	<option value="8208">8208</option>
	<option value="9474">9474</option>
</select>
<span class="error">
<?php 
	echo "<br></br>".$armstrongnumerr;
?>
</span></td></tr>
</td></tr>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr><td><tr><td><tr><td><input type='button' onClick="window.location='senderpage.php'" value='Reset' style="width: 100px;"></td>
<td><td><td><input type="submit" name='next' value='next' style="width: 100px"></td></td></td></tr>
<tr>
<td></td>
</tr>
<tr>
<td></td>
</tr>	
</table>
</form>
</body>
</html>



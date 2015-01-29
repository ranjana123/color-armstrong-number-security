<?php 
session_start();

$message=array();
$arm=array();
$rvalue=$_SESSION['rval'];
$gvalue=$_SESSION['gval'];
$bvalue=$_SESSION['bval'];

$keyvalue1=$_SESSION['key1'];
$keyvalue2=$_SESSION['key2'];
$keyvalue3=$_SESSION['key3'];

$message=$_SESSION['msg'];
$arm=$_SESSION['armstrongnum'];

$re=$keyvalue1+$rvalue;
$ge=$keyvalue2+$gvalue;
$be=$keyvalue3+$bvalue;

echo "<b>Encrypted color value:</b><br></br>".$re."\t".$ge."\t".$be."\t<br></br>";

echo "<b>The message to be sent<br></br></b>";
echo $message."<br></br>";

//ASCII code generation

$message1=array();
for($i=0;$i<strlen($message);$i++){
	$message1[$i]=ord("$message[$i]");
}
echo "<b>ASCII correspondance of the message <br></br></b>";
for($j=0;$j<$i;$j++){
	echo $message1[$j]."	";
}
echo "<br></br>";

//Adding with armstrong number

$len=strlen($arm);
$i=0;
$j=1;
$k=0;
for($i=0;$i<strlen($message);$i++){
	if($k<$len){
		$message1[$i]=$message1[$i]+pow($arm[$k],$j);
		$k++;
	}
	if($k==$len){
		$k=0;
		$j++;
	}
	if($j>$len){
		$j=1;
	}
}
echo "<b>Encrypting with armstrong number<br></br></b>";
for($j=0;$j<$i;$j++){
	echo $message1[$j]."	";
}
echo "<br></br>";

//Converting to matrix form: A

$k=0;
for($i=0;$k<strlen($message);$i++){
	for($j=0;$j<$len;$j++){
		if($k<strlen($message)){
			$a[$j][$i]=$message1[$k];
			$k++;
		}else{
			$a[$j][$i]=0;
			$k++;	
		}
	}
}
$col=$i;
echo "<b>converting to matrix form<br></br></b>";
for($i=0; $i<$len; $i++) {
	for($j=0;$j<$col;$j++) {
		echo $a[$i][$j];
		echo "	";
	}
	echo"<br>";
	echo"<br>";
}

//Encoding matrix creation: B

$num=1;
for($i=1;$i<$len;$i++)
	$num=$num*10;
$arm2=0;
for($i=0;$i<$len;$i++){
	$mod=$arm%10;
	$arm2=($mod*$num)+$arm2;
	$arm=$arm/10;
	$num=$num/10;
}
$num=10;
$k=0;
for($i=0; $i<$len; $i++) {
	for($j=0; $j<$len; $j++) {
		$k++;
		if($k>$len){
			$b[$i][$j]=$b[$i-1][$j]*$b[0][$j];
		}else{
			$b[$i][$j]=$arm2%$num;
			$arm2=$arm2/10;
		}
	}
}
echo "<b>Encoding matrix <br></br></b>";
echo "<table>";
for($i=0; $i<$len; $i++) {
	for($j=0; $j<$len; $j++) {
		echo $b[$i][$j];
		echo "\t";
	}
	echo"<br>";
	echo"<br>";
}

//Matrix multiplication: B*A

for($i=0;$i<$len;$i++){
	for($j=0;$j<$col;$j++){
		$d[$i][$j]=0;
	}
}
for($i=0;$i<$len;$i++){
	for($j=0;$j<$col;$j++){
		for($k=0;$k<$len;$k++){
			$d[$i][$j]=$d[$i][$j]+($b[$i][$k]*$a[$k][$j]);
		}
	}
}
echo "<b>Encrypted data in matrix form <br></br></b>";
for($i=0; $i<$len; $i++) {
	for($j=0; $j<$col; $j++) {
		echo $d[$i][$j];
		echo " ";
	}
	echo"<br>";
	echo"<br>";
}

echo "<b>Encrypted message</b><br></br>";
for($i=0;$i<$col;$i++){
	for($j=0;$j<$len;$j++){
		echo $d[$j][$i];
		echo "	";
	}
}

?>
<html>
<br></br>
<br></br>
</html>
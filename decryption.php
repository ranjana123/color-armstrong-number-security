<html>
<script type="text/javascript">
inverse:function()
{
		return Matrix.inverse(this,new Matrix());
},
</script>	
		
<?php 
$arm=array();
$arm=153;
echo $arm[0];


?>		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
}














 <?php
 /*
$c = array
(
	array(779,890,1383,742),
	array(3071,3598,6075,2834),
	array(13427,16082,28431,12190)
);
$arm=153;
$arm1="153";
$a=strlen($arm1);
$num=1;
for($i=0;$i<$a;$i++){
	$j=$arm%10;
	echo $j."<br>";
	$arm=$arm/10;
}

for($i=1;$i<$a;$i++)
	$num=$num*10;
$arm2=0;
for($i=0;$i<$a;$i++){
	$mod=$arm%10;
	$arm2=($mod*$num)+$arm2;
	//echo $arm2 . "<br>";
	$arm=$arm/10;
	//echo $arm . "<br>";
	$num=$num/10;
	//echo $num1 . "<br>";
}
//echo $arm2."<br>";
//echo $num . "<br>";
$num=10;
$k=0;
for($i=0; $i<$a; $i++) {
	for($j=0; $j<$a; $j++) {
		$k=$k+1;
		if($k>$a){
			$d[$i][$j]=$d[$i-1][$j]*$d[0][$j];
			//echo "matrix" .$d[$i][$j] ."<br>";
		}else{
			$d[$i][$j]=$arm2%$num;
			$arm2=$arm2/10;
			//echo "matrix" .$d[$i][$j] ."<br>";
		}		
	}
}
for($i=0; $i<$a; $i++) {
	for($j=0; $j<$a; $j++) {
		echo $d[$i][$j];
		echo "	";
	}
	echo"<br>";
}
	
*/

?>
</html>

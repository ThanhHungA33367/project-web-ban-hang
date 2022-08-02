<?php 
$a = $_POST['first_number'];
$b = $_POST['second_number'];
// $c = array();
// $d = array();
$i = 0;
// for($i=1; $i <= $a; $i++){
// 	if($a % $i ==0){
// 		array_push($c,$i);
// 	}
// }

// for($j=1; $j <= $b; $j++){
// 	if($b % $j ==0){
// 		array_push($d,$j);
// 	}
// }
 
// // echo count($d);
// $x = count($c)-1;
// $y = count($d)-1;

//    for($a = $x; $a >= 0; $a--){
//    	for($b = $y; $b >= 0; $b--){
//   		if($c[$a] === $d[$b])
//    		{
//  	 	echo $c[$a];
//  	 	exit();
 	 	
// 		 }
//    	}
//    }
 while(true){
 	$i++;
 	if(($a * $i ) % $b ==0){
 		echo $a*$i;
 		break;
 	}
 }  
 date_default_timezone_set('Asia/Ho_Chi_Minh');

 $date = date('d/m/Y H:i:s');

 echo $date;
?>
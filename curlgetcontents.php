<?php 

$action=$_POST['action'];
$fetch=$_POST['fetch'];

if ($action=="companyname") {
	if ($fetch=="topcompanies") {
		 $a = file_get_contents("topcompanies.txt");
         $array = (explode("\n", $a));
         $res = json_encode($array);
         echo $res;
	}
	elseif($fetch=="profitcompanies") {
		 $a = file_get_contents("profit.txt");
         $array = (explode("\n", $a));
         $res = json_encode($array);
         echo $res;
	}
}
   

?>
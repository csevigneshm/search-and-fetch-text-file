<?php
error_reporting(0);

$action=$_POST['action'];
$fetch=$_POST['fetch'];
$postingvalue=$_POST['val'];

if ($action=="companyname")

{
	if ($fetch=="search"){

    $val = file_get_contents("Hiox.txt");
    $array = (explode("\n", $val));
    $result = preg_grep("/^$postingvalue/i", $array);
    json_encode($result);
    $string = implode("#", $result);
    $output = explode("#", $string);
    echo json_encode($output);
}
elseif ($fetch=="topcompanies") 
{
	$ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,"http://192.168.0.52/mvignesh/December%202021/31-12-2021/curlgetcontents.php");
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,array(
            'action' =>"$action",
            'fetch'=>"$fetch"
              ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    echo $output;

}
elseif ($fetch=="profitcompanies") 
{
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,"http://192.168.0.52/mvignesh/December%202021/31-12-2021/curlgetcontents.php");
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,array(
            'action' =>"$action",
            'fetch'=>"$fetch"
              ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    echo $output;
}

} 









?>

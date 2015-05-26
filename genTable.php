<?php
require_once 'function_core.php';

$config['mapApiUrl'] = "http://dev.annhe.net/corp_map/geocoding.php";

$data = file('data.txt');
$add = array();
foreach ( $data as $k => $v) {
	$arr = explode("        ", $v);
	$add[] = array('name' => trim($arr[0]), 'address' => trim($arr[1]));
}
$file = fopen('geotable.csv', 'w');
fwrite($file, "title,address,longitude,latitude,coord_type\n");
for($i=0; $i<count($add); $i++) {
	$title = $add[$i]['name'];
	$address = $add[$i]['address'];
	$address = str_replace(' ', '', $address);
	$address = str_replace('#', '', $address);
	$data = array('address' => $address);
	$geodata = curlPost($data, $config['mapApiUrl']);
	$geodata = json_decode($geodata, true);
	if(is_array($geodata) && array_key_exists('result', $geodata)) {
		$longitude = $geodata['result']['location']['lng'];
		$latitude = $geodata['result']['location']['lat'];
	} else {
		echo $address . " failed\n";
		continue;
	}
	$coord_type = "3";
	fwrite($file, $title . "," . $address . "," . $longitude . "," . $latitude . "," . $coord_type . "\n");
}
fclose($file);
//print_r($add);
?>

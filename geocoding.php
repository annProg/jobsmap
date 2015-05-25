<?php
require_once 'function_core.php';

$config['ak'] = "Vxut3c1FTgF05f7X2QOIt6xG";
$config['output'] = "json";
$config['city'] = "北京";


if(isset($_POST['address'])) {
	$config['address'] = $_POST['address'];
} elseif(isset($argv[1])) {
	$config['address'] = $argv[1];
	$config['address'] = urlencode($config['address']);
} else {
	$config['address'] = urlencode("百度大厦");
}

if(isset($_POST['city'])) {
	$city = $_POST['city'];
} elseif(isset($argv[2])) {
	$city = $argv[2];
	$city = urlencode($config['city']);
} else {
	$city = urlencode($config['city']);
}
$apiUrl= "http://api.map.baidu.com/geocoder/v2/?";
$url = $apiUrl . "ak=" . $config['ak'] . "&address=" . $config['address'] . "&output=" . $config['output'] . "&city=" . $city;

$geoData = curlGet($url);
if(isset($_POST['shell'])) {
	print_r(json_decode($geoData, true));
	exit();
}
die($geoData);

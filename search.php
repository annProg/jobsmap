<?php
require 'function_core.php';
require 'config/config.php';

$ak = $config['geodata']['ak'];
$ret = json_decode(searchGeotable($ak, "internetcorp"), true);

$poiApiUrl = "http://api.map.baidu.com/geodata/v3/poi/list";
$url = $poiApiUrl . "?ak=" . $ak . "&geotable_id=105567&title=" . urlencode("拉勾网");
$data = curlGet($url);
$data = json_decode($data, true);
print_r($data);

?>

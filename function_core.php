<?php

/**
 *  基础函数
 *
 *  $Id: function_core.php  2015.04.20  hean@staff.sian.com.cn $
 */


//POST函数
function curlPost($data, $url) {
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query($data) );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	$data = curl_exec ($ch);
//        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//	$res = array("code" => $httpCode, "data" => $data);
        return $data;
}

//GET函数
function curlGet($url) {
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        $data = curl_exec ($ch);
//        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//	$res = array("code" => $httpCode, "data" => $data);
        return $data;
}


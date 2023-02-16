<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'komida_adm'; // nama databasenya
$server = $_SERVER['HTTP_HOST'];
$index =  $_SERVER['REQUEST_URI'];
$port = ":8080/";
$url_balik = "http://".$server."/".$index;
$url = "http://".$server."".$index;
$menu ="index.php?menu=";
 date_default_timezone_set("Asia/Bangkok");
 $no=1;
 if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
$url = $uri.'/admin/';
//  $url = "http://localhost/admin/";
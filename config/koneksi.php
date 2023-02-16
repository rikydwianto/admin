<?php
header("X-XSS-Protection: 1; mode=block");

$con = mysqli_connect($host, $username, $password, $db_name);
session_start();

?> 
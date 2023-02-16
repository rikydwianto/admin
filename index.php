<?php 

include"./config/setting.php";
include"./config/koneksi.php";
include"library/function.php";
include"library/model.php";
include"library/icon.php";
include"view/layout/header.php";
include"view/layout/aside.php";
$id_user =  $_SESSION['id'];
$id_cabang =  $_SESSION['id_cabang'];
if (!isset($_SESSION['id'])) {
	pindah($url."auth.php");

}
else{

}
// session_destroy();
if(!isset($_GET['menu'])){
	include"view/halaman_awal.php";	
}
else{
	include"view/layout/wrapper.php";	
	
}
include"view/layout/footer.php";
?>
<?php 
$menu = $_GET['menu'];
$get_path = dirname(__FILE__);
$cek_file = "view/$menu.php";

switch($menu){
    case"icon":
        include "./view/icon.php";
    break;
    default:
        if(file_exists($cek_file)){
            include "./view/$menu.php";
        }
        else{
            include "./view/layout/error_404.php";
        }
        
    break;

}
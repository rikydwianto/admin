<?php 
function hitung_stok($id_cetakan){
    global $con;
    global $id_cabang;
    $q = mysqli_query($con,"SELECT SUM(masuk) - SUM(keluar) AS stok FROM stok_cetakan where id_cabang='$id_cabang' and id_cetakan='$id_cetakan'");
    $r=mysqli_fetch_array($q);
    return $r['stok']  + 0;
}
?>
<?php 
$id = dekrip($_GET['id']);
$q = mysqli_query($con,"DELETE FROM cetakan where id='$id' and id_cabang='$id_cabang'");
pindah(menu('cetakan/index','lihat'));

?>
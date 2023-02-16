<?php 
$id = dekrip($_GET['id']);
$q = mysqli_query($con,"DELETE FROM user where id_user='$id' ");
pindah(menu('user/index','lihat'));

?>
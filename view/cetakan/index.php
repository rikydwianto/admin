<h4 class="card-title">CETAKAN
    <div style="float:right">
    <a href="<?=menu("cetakan/index",'tambah')?>" class="btn btn-danger"><i class="mdi mdi-plus"></i> Tambah</a>
<a href="<?=menu("cetakan/index",'lihat')?>" class="btn btn-success"><i class="mdi mdi-eye"></i> Lihat</a>
    </div>
</h4>
<br>

<!-- <h6 class="card-subtitle">you can use any icon with class of <code class="me-2">mid mid-</code>name of icon</h6> -->
<hr/>
<?php 
if($act=='edit'){
    include "./view/cetakan/edit.php";

}
else if($act=='tambah'){
    include "./view/cetakan/tambah.php";

}
else{
    include "./view/cetakan/lihat.php";

}
?>

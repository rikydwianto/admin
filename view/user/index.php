<h3 class="card-title">USER MANAGEMENT

    <div style="float:right" ><a href="<?=menu("user/index",'tambah')?>" class="btn btn-danger"><i class="mdi mdi-plus"></i> Tambah</a>
<a href="<?=menu("user/index",'lihat')?>" class="btn btn-success"><i class="mdi mdi-eye"></i> Lihat</a></div>
</h3>
<br/>
<hr/>

<?php 
if($act=='lihat'){
    include "./view/user/lihat.php";
}
else if($act=='tambah'){
    include "./view/user/tambah.php";
    
}
else if($act=='hapus'){
    
    include "./view/user/hapus.php";
}
else if($act=='edit'){
    
    include "./view/user/edit.php";
}
else{
    include "./view/user/lihat.php";
}
?>
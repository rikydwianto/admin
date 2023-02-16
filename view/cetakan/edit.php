<h4 class="card-title">FORM KATEGORI</h4>

<!-- <h6 class="card-subtitle">you can use any icon with class of <code class="me-2">mid mid-</code>name of icon</h6> -->
<hr/>

<?php 
$id = dekrip($_GET['id']);

$q = mysqli_query($con,"select * from cetakan where id_cabang='$id_cabang' and id='$id'");
if(!mysqli_num_rows($q)){
    pindah(menu("404"));
}
$r= mysqli_fetch_array($q);
?>
<form  method="POST">
   <div class="col-md-5">
   <label for="jenis_form">Jenis Form:</label>
    <input type="text" value='<?=$r['jenis_cetakan']?>' id="jenis_form" class='form-control' name="jenis_cetakan"><br><br>
   <label for="jenis_form">Nama Cetakan:</label>
    <input type="text" value='<?=$r['nama_cetakan']?>' id="nama_cetakan" class='form-control' name="nama_cetakan"><br><br>
    <input type="submit" name='edit_form'class='btn btn-primary btn-xl' value="SIMPAN">
   </div>
</form>
<?php 
if(isset($_POST['edit_form'])){
    $form = $_POST['jenis_cetakan'];
    $nama_cetakan = $_POST['nama_cetakan'];

    $query = "UPDATE  cetakan set jenis_cetakan='$form',nama_cetakan='$nama_cetakan' where id_cabang='$id_cabang' and id='$id'";
    if (mysqli_query($con, $query)) {
        echo "Data berhasil disimpan";
        pindah(menu("cetakan/index"));
    } else {
        echo "Data gagal disimpan: " . mysqli_error($con);
    }
    
}
?>
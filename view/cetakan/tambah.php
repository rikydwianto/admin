<form  method="POST">
   <div class="col-md-5">
   <label for="jenis_form">Jenis Form:</label>
    <input type="text" id="jenis_form" class='form-control' name="jenis_form"><br><br>
   <label for="jenis_form">Nama Cetakan:</label>
    <input type="text" id="nama_cetakan" class='form-control' name="nama_cetakan"><br><br>
    <input type="submit" name='tambah_form'class='btn btn-danger btn-xl' value="TAMBAH">
   </div>
</form>
<?php 
if(isset($_POST['tambah_form'])){
    $form = $_POST['jenis_form'];
    $cetakan = $_POST['nama_cetakan'];

    $query = "INSERT INTO cetakan (jenis_cetakan,nama_cetakan, id_cabang) VALUES ('$form', '$cetakan','$id_cabang')";
    if (mysqli_query($con, $query)) {
        echo "Data berhasil ditambahkan";
        pindah(menu("cetakan/index"));
    } else {
        echo "Data gagal ditambahkan: " . mysqli_error($con);
    }
    
}
?>
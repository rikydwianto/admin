<?php 
$id = dekrip($_GET['id']);
$q = mysqli_query($con,"select * from user where id_user='$id' and id_cabang='$id_cabang'");
if(!mysqli_num_rows($q)){
    pindah(menu("404"));
}
$r= mysqli_fetch_array($q);

?>
<div class="col-md-8">
    <form method="post" action="">
        <label>Username:</label>
        <input class='form-control' value="<?=$r['username']?>" required type="text" name="username"><br>
        <label>NIK:</label>
        <input class='form-control' value="<?=$r['nik']?>" required type="text" name="nik"><br>
        <label>Nama User:</label>
        <input class='form-control' value="<?=$r['nama_user']?>" required type="text" name="nama_user"><br>
        <label>Password:</label>
        <input class='form-control'   type="text" name="password"><br>
        <label>Pilih Jabatan:</label>
        <select class='form-control' required="" name="jabatan">
            <option value="">PILIH JABATAN</option>
            <?php 
            foreach(jabatan() as $jab){
                if($r['id_jabatan']==$jab['id_jabatan']){
                    ?>
                     <option selected value="<?=$jab['id_jabatan']?>"><?=$jab['singkatan_jabatan']?> - <?=$jab['nama_jabatan']?></option>
                    <?php
                }
                else{
                    ?>
                    <option value="<?=$jab['id_jabatan']?>"><?=$jab['singkatan_jabatan']?> - <?=$jab['nama_jabatan']?></option>
                    <?php
                }
                
            }
            ?>
            
        </select><br>
        <label for="status">Status : </label>
        <select name="status" class="form-control" id="">
            <option value="aktif">Aktif</option>
            <option value="tidakaktif">Tidak aktif</option>
        </select>
        <br>
        <input type="submit" class='btn btn-danger text-white' name="submit" value="SIMPAN DATA">
    </form>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nik = $_POST['nik'];
    $nama_user = $_POST['nama_user'];
    $password = md5($_POST['password']);
    $status_user = $_POST['status'];
    $id_jabatan = $_POST['jabatan'];
    if(!empty($_POST['password'])){
        $q_pass = ",password='$password'";
    }
    else $q_pass="";

    $sql = "UPDATE user set username='$username',nik='$nik',nama_user='$nama_user',id_jabatan='$id_jabatan',status_user='$status_user' $q_pass where id_user='$id'";
    if (mysqli_query($con, $sql)) {
        echo "Data berhasil diperbarui.";
        pindah(menu("user/index","lihat"));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>


</div>

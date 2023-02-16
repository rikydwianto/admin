<div class="col-md-8">
    <form method="post" action="">
        <label>Username:</label>
        <input class='form-control' required type="text" name="username"><br>
        <label>NIK:</label>
        <input class='form-control' required type="text" name="nik"><br>
        <label>Nama User:</label>
        <input class='form-control' required type="text" name="nama_user"><br>
        <label>Password:</label>
        <input class='form-control' required type="text" name="password"><br>
        <label>Pilih Jabatan:</label>
        <select class='form-control' required="" name="jabatan">
            <option value="">PILIH JABATAN</option>
            <?php 
            foreach(jabatan() as $jab){
                ?>
                <option value="<?=$jab['id_jabatan']?>"><?=$jab['singkatan_jabatan']?> - <?=$jab['nama_jabatan']?></option>
                <?php
            }
            ?>
            
        </select>
        <br>
        <input type="submit" class='btn btn-danger text-white' name="submit" value="Tambahkan Data">
    </form>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nik = $_POST['nik'];
    $nama_user = $_POST['nama_user'];
    $password = md5($_POST['password']);
    $status_user = 'aktif';
    $id_jabatan = $_POST['jabatan'];

    $sql = "INSERT INTO user (username, nik, nama_user, password, id_cabang, status_user, id_jabatan)
            VALUES ('$username', '$nik', '$nama_user', '$password', '$id_cabang', '$status_user', '$id_jabatan')";
    if (mysqli_query($con, $sql)) {
        echo "Data berhasil ditambahkan.";
        pindah(menu("user/index","lihat"));
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>


</div>

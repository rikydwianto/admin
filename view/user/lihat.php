<?php
$sql = "SELECT * FROM user u join jabatan j on j.id_jabatan=u.id_jabatan  where u.id_cabang='$id_cabang'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>
    <table class='table table-bordered dt'>
        <thead>

            <tr>
                <th>NO</th>
                <th>NIK</th>
                <th>USERNAME</th>
                <th>NAMA</th>
                <th>JABATAN</th>
                <th>STATUS</th>
                <th>ACT</th>
            </tr>
            
        </thead>
        <tbody>

            <?php
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row['nik']?></td>
                    <td><?=$row['username']?></td>
                    <td><?=$row['nama_user']?></td>
                    <td><?=$row['nama_jabatan']?></td>
                    <td><?=$row['status_user']?></td>
                    <td>
                        <a href="<?=tanya(menu('user/index','hapus',$row['id_user']),menu('user/index','lihat'),"Apakah anda yakin menghapus user ini ini?  ini akan menghapus semua data yg bersangkutan dengan akun ini")?>" class="btn btn-danger">
                            <i class="mdi mdi-delete-forever text-white"></i>
                        </a>    
                        <a href="<?=menu('user/index','edit',$row['id_user'])?>" class="btn btn-primary">
                        <i class="mdi mdi-lead-pencil"></i>
                    </a>    
                    </td>
                </tr>
                <?php

        } 
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "0 results";
}
?>

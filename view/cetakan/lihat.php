<?php
$query = "SELECT * FROM cetakan join cabang on cabang.id_cabang=cetakan.id_cabang where cetakan.id_cabang='$id_cabang'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Menampilkan data ke dalam tabel
   
    ?>
    <table class="table dt">
        <thead>

            <tr>
                <th>NO.</th>
                <th>CABANG</th>
                <th>JENIS</th>
                <th>CETAKAN</th>
                <th>STOK</th>
                <th>KELOLA STOK</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>

            <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $stok=hitung_stok($row['id']);
        $nama_form = $row['jenis_cetakan'];
        ?>
         <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama_cabang']?></td>
                <td><?=$row['jenis_cetakan']?></td>
                <td><?=$row['nama_cetakan']?></td>
                <td><?=$stok?></td>
                <td>
                    <a href="<?=menu('cetakan/stok','stok',$row['id'])?>" class="btn btn-success">
                        <i class="mdi mdi-counter text-white"></i>
                    </a>    
                </td>
                <td>
                    <a href="<?=tanya(menu('cetakan/hapus','hapus',$row['id']),menu('cetakan/index'),"Apakah anda yakin menghapus $nama_form ini?  ini akan menghapus semua stok form")?>" class="btn btn-danger">
                        <i class="mdi mdi-delete-forever text-white"></i>
                    </a>    
                    <a href="<?=menu('cetakan/index','edit',$row['id'])?>" class="btn btn-primary">
                        <i class="mdi mdi-lead-pencil text-white"></i>
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
    echo "Tidak ada data";
}


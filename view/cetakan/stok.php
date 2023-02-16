<h3 class="card-title">STOK CETAKAN</h3>
<h6 class="card-subtitle">Mengatur dan mengelola Stok</h6>

<hr>

<?php
@$id = dekrip($_GET['id']);
$q= mysqli_query($con,"SELECT * FROM cetakan where id='$id'");
if(!mysqli_num_rows($q)>0){
    echo "Tidak ada data ditemukan !";
}
else{
    $r = mysqli_fetch_array($q);
    
    ?>
    <div class="container">
        <div class="row">
                <div class="col-md-6">

                    
                    <table class='table table-bordered'>
                        <tr>
                            <th>NAMA CETAKAN</th>
                            <th><?=$r['nama_cetakan']?></th>
                        </tr>
                        <tr>
                            <th>JENIS CETAKAN</th>
                            <th><?=$r['jenis_cetakan']?></th>
                        </tr>
                        <tr>
                            <th>STOK</th>
                            <th><?=$stok = hitung_stok($id)?></th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <th>
                                <a href="<?=menu("cetakan/index",'lihat')?>" class="btn btn-danger"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                            </th>
                        </tr>

                    </table>
                </div>
                <div class="col-md-6">
                    <form action="" method="post">
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="2">MASUK/KELUAR STOK
                                <br>
                                <br>
                            <h6 class="card-subtitle">Ketika masuk, keluar di 0 kan begitu juga sebaliknya</h6>

                            </th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th><input type="date" name="tgl" class='form-control' value="<?=date("Y-m-d")?>" id=""></th>
                        </tr>
                        <tr>
                            <th>MASUK</th>
                            <th><input type="number" name="masuk" required class='form-control'  id="masuk"></th>
                        </tr>
                        <tr>
                            <th>KELUAR</th>
                            <th><input type="number" name="keluar" required class='form-control'  id="keluar"></th>
                        </tr>
                        <tr>
                            <th>KETERANGAN</th>
                            <th>
                                <textarea name="keterangan" id="ket" cols="30" class='form-control'rows="3" placeholder="Silahkan berikan keterangan"></textarea>
                            </th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <th>
                                <input type="submit" value="TAMBAH DATA" name='tambah_stok' class='btn btn-primary'>
                                <input type="reset" value="RESET" class='btn btn-danger'>
                            </th>
                        </tr>
                    </table>
                    <?php 
                    if(isset($_POST['tambah_stok'])){
                        $tgl = $_POST['tgl'];
                        $masuk = $_POST['masuk'];
                        $keluar = $_POST['keluar'];
                        $ket = $_POST['keterangan'];
                        $sisa =0;
                        $q="INSERT INTO stok_cetakan(id_cetakan,id_cabang,masuk,keluar,tgl,sisa,keterangan) VALUES
                            ('$id','$id_cabang','$masuk','$keluar','$tgl','$sisa','$ket')";
                        if (mysqli_query($con, $q)) {
                            echo "Data berhasil ditambahkan";
                            mysqli_query($con,"UPDATE cetakan SET stok='$sisa' where id='$id' ");
                            pindah(menu("cetakan/stok",'stok',$id));
                        } else {
                            echo "Data gagal ditambahkan: " . mysqli_error($con);
                        }
                        
                    }
                    ?>
                    </form>
                </div>
        </div>
        <div class="row">
            <?php 
            $qq = mysqli_query($con,"select * from stok_cetakan where id_cabang='$id_cabang' and id_cetakan='$id' order by id_stok_cetakan asc"); 
            if(mysqli_num_rows($qq)>0){
                ?>
               
            <table class="table dt">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>TANGGAL</th>
                        <th>MASUK</th>
                        <th>KELUAR</th>
                        <th>SISA</th>
                        <th>KETERANGAN</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stok_cet = hitung_stok($id);
                    
                    echo mysqli_error($con);
                    $i=0;
                    $sisa=0;
                    while($stok = mysqli_fetch_array($qq)){
                      

                        $keluar=$stok['keluar'];
                        $masuk=$stok['masuk'];
                        $sisa = $sisa + $masuk - $keluar;
                        ?>
                        <tr>
                            <td><?=$stok['id_stok_cetakan']?></td>
                            <td><?=$stok['tgl']?></td>
                            <td><?=$masuk?></td>
                            <td><?=$keluar?></td>
                            <td><?=$sisa?></td>
                            <td><?=$stok['keterangan']?></td>
                    
                            <td>
                            <a href="<?=tanya(menu('cetakan/stok','hapus',$stok['id_stok_cetakan'],"id2=$id"),menu('cetakan/stok','stok',$id,$id),"Apakah anda yakin menghapus data ini ini?  ")?>" class="btn btn-danger">
                            <i class="mdi mdi-delete-forever text-white"></i>
                        </a>    
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            else{
                echo "Data tidak tersedia";
            }
            ?>
        </div>
    </div>
  
    <?php

}

if($act=='hapus'){
    $id_stok = dekrip($_GET['id']);
    $id = mysqli_fetch_array(mysqli_query($con,"select * from stok_cetakan where id_stok_cetakan='$id_stok'"))['id_cetakan'];
    $q = mysqli_query($con,"DELETE FROM stok_cetakan where id_stok_cetakan='$id_stok' and id_cabang='$id_cabang'");
    pindah(menu('cetakan/stok','stok',$id));
    

}
?>
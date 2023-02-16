<style>
    .error-title {
    font-size: 210px!important;
    font-weight: 900!important;
    line-height: 210px!important;
}
.error-title {
    font-size: 210px;
    font-weight: 900;
    text-shadow: 4px 4px 0 #fff, 6px 6px 0 #343a40;
    line-height: 210px;
}
</style>
<div class="error-body text-center">
    <h3 class="text-uppercase error-subtitle"><?=$_GET['pesan']?></h3>
    <!-- <p class="text-muted mt-4 mb-4">Sepertinya halaman yang kamu cari tidak ditemukan!.</p> -->
    <a href="<?=urldecode($_GET['batal'])?>" class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">Tidak, Balik lagi</a>
    <a href="<?=urldecode($_GET['alihkan'])?>" class="btn btn-success btn-rounded  waves-light mb-5 text-white">YA !</a>
</div>

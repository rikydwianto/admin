<?php
$pembagi = 1000000;
function enkripsi($plaintext_id){
	global $pembagi;
	    $ciphertext = base64_encode($plaintext_id*$pembagi);
    $ciphertext = strtr($ciphertext, '+/=', '-_,');
    return $ciphertext;
 
}
function dekrip($ciphertext_id) {
	global $pembagi;
    $ciphertext_id = strtr($ciphertext_id, '-_,', '+/=');
    $plaintext = base64_decode($ciphertext_id)/$pembagi;
    return $plaintext;
}

function menu($menu,$act=null,$id=null){
	$refer = "&refer=$menu";
	if($act!=null){
		$act="&act=$act";
	}
	if($id!=null){
		$id="&id=".enkripsi($id);
	}
	
	$menu = "index.php?menu=".$menu;
	// $menu = null;
	
	global $url;
	return $url.$menu.$act.$id.$refer;
}

function menu_side(){
	global $url;
	$menu = array(
		[
			"urutan"=>'1',"icon"=>'mdi-av-timer',"caption"=>'Dashboard',"url"=>$url,
		],
		
		[
			"urutan"=>'2',"icon"=>'mdi-archive',"caption"=>'Cetakan',"url"=>menu("cetakan/index"),
		],
		
		
		// [
		// 	"urutan"=>'2',"icon"=>'mdi-account-network',"caption"=>'Stock',"url"=>menu("stock/lihat"),
		// ],
		
		[
			"urutan"=>'3',"icon"=>'mdi-account-plus',"caption"=>'User',"url"=>menu("user/index",'lihat'),
		],
		
		
		[
			"urutan"=>'4',"icon"=>'mdi-email',"caption"=>'Surat',"url"=>menu("surat/index",'surat'),
		],
		
		
		[
			"urutan"=>'5',"icon"=>'mdi-book-open-page-variant',"caption"=>'Monitoring',"url"=>menu("pinjaman/index",'monitoring'),
		],
		
		[
			"urutan"=>'4',"icon"=>'mdi-emoticon-happy',"caption"=>'Icon',"url"=>menu("icon"),
		],
		
		[
			"urutan"=>'5',"icon"=>'mdi-logout',"caption"=>'Logout',"url"=>menu("logout"),
		],

	);
	return $menu;

}
function pindah($url)
{
?>
  <script>
    window.location.href = "<?php echo $url ?>";
  </script>	
<?php

}



function pesan($pesan, $warna = 'primary')
{
?>
  <div class="alert alert-<?= $warna ?>" role="alert">
    <?= $pesan ?>
  </div>
<?php
}

function tanya($url,$url_batal,$pesan="",$option=null){
	return menu('confirm')."&alihkan=".urlencode($url)."&batal=".urlencode($url_batal)."&pesan=".$pesan;
}

function jabatan(){
	global $con;
	global $id_cabang;
	$q = mysqli_query($con,"select * from jabatan");
	$data=[];
	while(	$r= mysqli_fetch_array($q)){
		$data[]=$r;
	}
	return $data;
}
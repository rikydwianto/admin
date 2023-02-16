<?php 

include"./config/setting.php";
include"./config/koneksi.php";
include"library/function.php";?>
<!DOCTYPE html>
<html>
  <head>
    <title>Halaman Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
  <section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://img.freepik.com/free-photo/closeup-working-table-workplace-office_53876-42971.jpg?w=900&t=st=1676349310~exp=1676349910~hmac=54230e8053db5f216cbb59de7e29173c067c53c2d4cbe60b92bf4eaf9101b329"
                alt="login form" style="height:100%" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" >

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Login</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" name='username' id="form2Example17" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example17">Email address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name='password' id="form2Example27" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" name='login'  type="submit">Login</button>
                  </div>
                  <?php
                    if(isset($_POST['login'])){
                        $user = ($_POST['username']);
                            $pass = (md5($_POST['password']));
                            $q = mysqli_query($con, "select * from user join cabang on cabang.id_cabang=user.id_cabang where username='$user' or nik='$user'  ");
                            if (mysqli_num_rows($q)) {
                                $cek = mysqli_fetch_array($q);
                                if ($cek['status_user'] == 'aktif') {
                                    if ($cek['password'] == $pass) {
                                        $_SESSION['id'] = $cek['id_user'];
                                        $_SESSION['id_cabang'] = $cek['id_cabang'];
                                        pesan("BERHASIL LOGIN", 'success');
                                        $text = "login @user  : $user  $cek[nama_user] cabang : $cek[nama_cabang]";
                                        pindah($url);
                                    } else{
                                        $text="$user percobaan login password salah";
                                        pesan("NIK DITEMUKAN, Password SALAH!!", 'danger');

                                    }
                                } else{
                                    $text="@user $user tidak aktif mencoba login ";
                                    pesan("STATUS ANDA DINONAKTIKAN, SILAHKAN HUBUNGI ADMINISTRASI", 'danger');

                                }
                            } else {
                                pesan("USER/NIK TIDAK DITEMUKAN", 'danger');
                                $text="Percobaan login @user $user tidak ditemukan";
                            }
                    } 
                    ?>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>

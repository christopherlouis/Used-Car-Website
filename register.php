<?php

  session_start();
  //cek apakah sudah login atau tidak (kalau sudah login maka diarahkan ke dashboard page dan tidak bisa di back ke login page)
  if(isset($_SESSION['id_user'])){
    header('location:dashboard.php');
  } 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Register Akun</title>

    <style>
    body, html {
      background-image: url('image/supra.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      height: 100%; 
      background-attachment: fixed;
    }
    .card{
      background-color: rgba(255,255,255, 0.6) !important;
    }

    
     
    
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand mx-auto" href="#" style="color: white; font-size:50px;"><b>OurDailyCar.</b></a> 
  </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6 pt-4 pb-4">
            <div class="card">
              <div class="card-body">
                <h3 style="text-align:center;">REGISTER</h3>  
                <hr>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan Nama Lengkap">
                  </div>

                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                  </div>

                  <div class="form-group">
                    <label>Re-type Password</label>
                    <input type="password" class="form-control" id="repassword" placeholder="Masukkan Password">
                  </div>

                  <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" class="form-control" id="no_telp" placeholder="Masukkan No. Telp" maxlength="13">
                  </div>

                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan E-mail">
                  </div>
                  
                  <button class="btn btn-register btn-block btn-success">REGISTER</button>

                  <div class="text-center" style="margin-top: 15px">
                    Sudah punya akun? <a href="login.php">Silahkan Login</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
      function validateEmailId(input) {
        var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if (emailFormat.test(input)) {
          return true;
        } else {
          return false;
        }
      }

      $(document).ready(function() {

        $(".btn-register").click( function() {

          var nama_lengkap = $("#nama_lengkap").val();
          var username = $("#username").val();
          var password = $("#password").val();
          var no_telp = $("#no_telp").val();
          var repassword = $("#repassword").val();
          var email = $("#email").val();

          //cek nama lengkap kosong atau tidak
          if (nama_lengkap.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Nama Lengkap Wajib Diisi !'
            });

          //cek username kosong atau tidak
          } else if(username.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });
          
          //cek password kosong atau tidak
          } else if(password.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });
          
          //cek no telp kosong atau tidak
          } else if(no_telp.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'No. Telp Wajib Diisi !'
            });
          
          //cek re type password kosong atau tidak
          } else if(repassword.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Re-type Password Wajib Diisi !'
            });
          
          //cek email kosong atau tidak
          }  else if(email.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'E-mail Wajib Diisi !'
            });

          //cek username tidak boleh ada spasi
          } else if (username.indexOf(" ") != -1) {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Username tidak boleh ada spasi !'
            });
            $("#username").val('');
          
          //cek username harus 6 huruf atau lebih
          } else if (username.length < 6) {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Username harus punya minimal 6 huruf/angka !'
            });
            $("#username").val('');

          //cek password harus 6 huruf atau lebih
          } else if (password.length < 6) {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Password harus punya minimal 6 huruf/angka !'
            });
            $("#password").val('');
            $("#repassword").val('');
          
          //cek password tidak boleh ada spasi
          } else if (password.indexOf(" ") != -1) {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Password tidak boleh ada spasi !'
            });
            $("#password").val('');
            $("#repassword").val('');

          //cek re type password sama dengan password
          } else if($("#password").val() != $("#repassword").val()) {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Password tidak sesuai !'
            });
            $("#password").val(''); 
            $("#repassword").val(''); 

          //cek no hp angka atau tidak, no hp mulai dari 0 (terdiridari 0 sebernernya), no hp ada tidak ada spasi, no hp tidak lebih dari 13 angka
          } else if (isNaN(no_telp) /*(no_telp.indexOf("0") == -1)*/ || (no_telp.indexOf(" ") != -1) || no_telp.length > 13) {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Format No Telp salah !'
            });
            $("#no_telp").val(''); 

          //cek format email harus @ dan .com
          } else if(!validateEmailId(email)){
              Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Format E-mail salah !'
            });
            $("#email").val(''); 

          //kalau sudah terisi semua maka masuk (tidak ada yang kosong)
          }else {
            //ajax
            $.ajax({
              url: "save-account.php",
              type: "POST",
              data: {
                  "nama_lengkap": nama_lengkap,
                  "username": username,
                  "password": password,
                  "no_telp": no_telp,
                  "email": email
              },

              success:function(response){
              
              //kondisi clear, regist berhasil
              if (response == "success") {
                Swal.fire({
                  type: 'success',
                  title: 'Register Berhasil !',
                  text: 'Silahkan login !',
                  timer: 2000,
                  
                })
                .then (function() {
                  window.location.href = "login.php";
                });

                $("#nama_lengkap").val('');
                $("#username").val('');
                $("#password").val('');
                $("#no_telp").val('');
                $("#repassword").val('');
                $("#email").val('');
              
              } 

              //kondisi username telah terpakai
              else if(response == "cekusername"){
                Swal.fire({
                  type: 'error',
                  title: 'Register Gagal !',
                  text: 'Username Telah Terpakai !'
                });

                $("#username").val('');

              }
              
              //kondisi email telah terpakai
              else if(response == "cekemail"){
                Swal.fire({
                  type: 'error',
                  title: 'Register Gagal !',
                  text: 'Email Telah Terpakai !'
                });

                $("#email").val('');

              }

              //kondisi username dan email telah terpakai
              else if(response == "cekusernamedanemail"){
                Swal.fire({
                  type: 'error',
                  title: 'Register Gagal !',
                  text: 'Username dan Email Telah Terpakai !'
                });

                $("#username").val('');
                $("#email").val('');

              }

              else{
                Swal.fire({
                  type: 'error',
                  title: 'Register Gagal !',
                  text: 'Silahkan coba lagi !'
                });

              }
              console.log(response);
              },

              error:function(response){
                Swal.fire({
                  type: 'error',
                  title: 'Opps!',
                  text: 'Server error !'
                });
              }
            })
          }
        }); 
      });
    </script>
  </body>
</html>
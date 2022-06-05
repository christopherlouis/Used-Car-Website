<?php

  session_start();
  //cek apakah sudah login atau tidak (kalau sudah login maka diarahkan ke dashboard page dan tidak bisa di back ke login page)
  if(isset($_SESSION['id_user'])){
    header('location:xd.php');
  } 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Login Akun</title>

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

    <div class="container pt-5">
      <div class="row">
        <div class="col-md-3"></div>
          <div class="col-md-6 pt-4 pb-4">
            <div class="card">
              <div class="card-body">
                <h3 style="text-align:center;">LOGIN</h3>
                <hr>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan Username">
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                  </div>
                  
                  <button class="btn btn-login btn-block btn-success">LOGIN</button>
                
                  <div class="text-center" style="margin-top: 15px">
                    Belum punya akun? <a href="register.php">Silahkan Register</a>
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
      $(document).ready(function() {

        $(".btn-login").click( function() {
        
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "cek-login.php",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "success") {
                  let timerInterval
                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    html: 'Anda akan di arahkan otomatis dalam <b></b> Detik',
                    timer: 3500,
                    showCancelButton: false,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    //timer 3 2 1
                      onBeforeOpen: () => {
                      Swal.showLoading()
                      timerInterval = setInterval(() => {
                        Swal.getContent().querySelector('b')
                          .textContent = (Swal.getTimerLeft() / 1000)
                          .toFixed(0)
                      }, 100)
                    },
                    onClose: () => {
                      clearInterval(timerInterval)
                    }
                  })
                  .then (function() {
                    window.location.href = "xd.php";
                  });

                } else if(response == "error"){

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'Username / password salah ! coba lagi !'
                  });

                }
                else{
                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'Server Database Error !'
                  });
                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        });

      });
    </script>

  </body>
</html>
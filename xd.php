<?php

  session_start();
  //cek apakah sudah login atau tidak (kalau belum login maka di arahkan ke login page)
  if(!isset($_SESSION['id_user'])){
    header('location:login.php');
  } else{

  }

?>

<!DOCTYPE html>
<html>
    <head>
    <!-- LINK BOOTSTRAP -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- LINK BOOTSTRAP -->
    <!-- LINK TOASTR NOTIFY -->
    <link rel="stylesheet" href="notify/toastr.min.css">
    <script src="notify/toastr.min.js"></script>
    <!-- LINK TOASTR NOTIFY -->
    
    <style>
      .brandpos{
        padding-right: 60vw;
      }
      .pasangiklan:hover{
        background-color: #A9A9A9;
        transition: all 0.3s ease;
      }
      body{
        background-image: url('image/lambo.gif');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      
      .carcard{
          padding-top: 10vh;
      }

      .card{
          background-color: rgba(255,253,228,1);
      }
      @media screen and (max-width : 812px){
          .brandpos{
              padding-right: 0;
          }
        
      }
      .head{
          position: absolute;
          top: 30%;
        left: 40%;
        color: white;
      }
      .tagline{
          position: absolute;
          top: 40%;
        left: 42%;
        color: white;
      }
      .beli{
        width: 145px;
        height: 60px;
        position: absolute;
        top: 48%;
        left: 43%;
        transform: translate(-50%, -50%)
        color: white;
      }
      .jual{
        width: 145px;
        height: 60px;
        position: absolute;
        top: 59%;
        left: 43%;
        transform: translate(-50%, -50%)
        color: white;
      }
    </style>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand brandpos " href="#" style="color: white;">OurDailyCar.</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active pr-3">
                        <a class="nav-link" href="xd.php" style="color: white;">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link" href="logout.php" style="color: white;">Logout</a>
                    </li>
                    <li class="nav-item pr-3">
                        <a class="nav-link" style="color: white;">Hi,<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php" style="color: white; border: solid;border-width: 1px">Pasang Iklan</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h1 class="head">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
            <p class="tagline">Welcome to OurDailyCars</p>
            <a href="dashboard2.php"><button type="button" class="btn btn-info beli  btn-lg">Beli</button></a>
            <a href="add.php"><button type="button" class="btn btn-danger jual btn-lg">Jual</button></a>
        </div>

        
    </body>

    <script>
   
      
    </script>
</html>
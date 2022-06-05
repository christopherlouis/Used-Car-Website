<?php

  session_start();
  //cek apakah sudah login atau tidak (kalau belum login maka di arahkan ke login page)
  if(!isset($_SESSION['id_user'])){
    header('location:login.php');
  } else{
    include('koneksi.php');

    $sql = 'SELECT  title, descr, phone, price, id FROM cars';
    
    $result = mysqli_query($connection, $sql);

    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($connection);

    

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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
      .brandpos{
        padding-right: 60vw;
      }
      .pasangiklan:hover{
        background-color: #A9A9A9;
        transition: all 0.3s ease;
      }
      body{
        background-image: url('image/supra.jpg');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      
      .carcard{
          padding-top: 20vh;
          padding-bottom: 20vh;
      }

      .card{
        padding-top: 15px;
        background-color: rgba(255,253,228,1);
      }
      .card:hover{
        padding-top: 15px;
        background-color: rgba(255,253,200,1);
      }
      @media screen and (max-width : 812px){
          .brandpos{
              padding-right: 0;
          }
        
      }
      .cars{
        width:30%;
        margin:auto;
        margin-top:-50px;
        display: block;
        position: relative;
      }

      .navbar {
        background-color: transparent;
        border: none;
        color: white;
        z-index: 100;
        transition: background-color 1s ease 0s;
    }

    .navbar.solid {
        background-color: black;
        transition: background-color 1s ease 0s;
        box-shadow: 0 0 4px grey;
    }
    #footer{
        height: 100px;
        width: 100%;
        background-color:black;
        text-align: center;
    }
    .fa {
        font-size: 20px;
        width: 200px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
    }
    .fa-instagram {
        background:black;
        color: white;
        margin: 10px;
    }
   
    </style>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
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
            
            <div class="row carcard ">
                <?php foreach($cars as $car){ ?>
                    <div class="col-12 col-md-6 col-lg-4 pb-3 pt-5">
                        <div class="card" style="height: 300px">
                            <img src="image/mobel.png" class="cars";>
                            <div class="card-body">
                                <h3 style="margin-left:10px;margin-top:5px;"><b><?php echo htmlspecialchars($car['title']); ?></b></h3>
                                <hr>
                                <p style="margin-left:10px;position: absolute;top: 40%;"><?php echo htmlspecialchars($car['descr']); ?></p>
                                <p style="margin-left:10px;position: absolute;top: 70%;"><small class="text-muted"><?php echo htmlspecialchars($car['phone']); ?></small></p>
                                <h2 style="margin-bottom:30px;margin-left:10px;position:absolute;bottom: 0;"><?php echo htmlspecialchars($car['price']); ?>,-</h2>
                            </div>
                        </div>                    
                    </div>
                <?php } ?>
            </div>
        </div>



        <div  id="footer">
                <h4 style="color: white; padding-top: 15px;">Follow us for more cars!</h4>
                <a href="https://www.instagram.com/ourdailycar/" class="fa fa-instagram"> ourdailycar</a>
        </div>

        
    </body>

    <script>

        $(document).ready(function() {
        // Transition effect for navbar 
            $(window).scroll(function() {
                // checks if window is scrolled more than 500px, adds/removes solid class
                if($(this).scrollTop() > 300) { 
                    $('.navbar').addClass('solid');
                } else {
                    $('.navbar').removeClass('solid');
                }
            });
        });
      

    //   });
      
    </script>
</html>
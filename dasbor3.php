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
    <!-- LINK BOOTSTRAP -->

    <!-- LINK TOASTR NOTIFY -->
    <link rel="stylesheet" href="notify/toastr.min.css">
    <script src="notify/toastr.min.js"></script>
    <!-- LINK TOASTR NOTIFY -->
   
    
    <style>
      .brandpos{
        padding-right: 71vw;
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
        background-attachment: fixed;
        background-repeat: no-repeat;
      }
      
      .carcard{
          padding-top: 5vh;
          padding-bottom:10vh;
      }

      .card{
        padding-top: 15px;
        background-color: rgba(255,253,228,1);
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

      /* .navbar {
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
        } */
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

    @media screen and (max-width : 812px){
          .brandpos{
              padding-right: 0;
          }
        
      }

    .filterbox{
        margin-top: 10vh;
        margin-left: 8vw;
        width: auto;
        height: 25rem;
        padding: 15px;
    }

    #tmblfilter{
        width: 50rem;
        padding: 10px;
    }




    @media screen and (max-width : 812px){
          .brandpos{
              padding-right: 0;
          }
        
      }

    .filterbox{
        margin-top: 10vh;
        margin-left: 8vw;
        width: auto;
        height: 25rem;
        padding: 15px;
    }

    #tmblfilter{
        width: 50rem;
        padding: 10px;
    }


    @media only screen and (max-width: 1000px) {
        #tmblfilter{
            width: 100vw;
            padding: 10px;
        }   
        .card{
            width: auto;
        }
    }

    @media only screen and (max-width: 770px) {
        #tmblfilter{
            width: 100vw;
        }
        .card{
            width: auto;
        }
    }

    @media only screen and (max-width: 650px) {
        #tmblfilter{
            width: 100vw;
        }
        .card{
            width: auto;
        }
    }

    @media only screen and (max-width: 560px) {
        #tmblfilter{
            width: 100vw;
        }
        .card{
            width: auto;
        }
    }

    @media only screen and (max-width: 400px) {
        #tmblfilter{
            width: 23rem;
            padding: 10px;
        }   
        .card{
            width: auto;
        }
    }
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.sidefilter{
    padding: 10px;
}

    </style>

    </head>
    <body>

               <!--sidenav-->
               <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="sidefilter">
                <form action="">
                    <!-- <div class="form-group">
                        <label for="Location" style="font-size: 20px;" class="text-white">Location</label>
                        <br>
                        <input type="text" class="form-control" id="Location" placeholder="Lokasi">
                    </div> -->
                    <div class="form-group">
                        <label for="Hargamin" style="font-size: 20px;" class="text-white">Harga Minimum</label>
                        <input type="text" class="form-control" id="Hargamin" placeholder="Harga Minimum">
                    </div> 
                    <div class="form-group">
                        <label for="Hargamax" style="font-size: 20px;" class="text-white">Harga Maximum</label>
                        <input type="text" class="form-control" id="Hargamax" placeholder="Harga Maximum">
                    </div> 
                    <div class="form-group">
                        <label for="Merk" style="font-size: 20px;" class="text-white">Merk</label>
                        <input type="text" class="form-control" id="Merk" placeholder="Merk">
                    </div> 
                    <button class="btn btn-primary gas">Filter</button>
                </form>
            </div>
          </div>
        <!--sidenav-->

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
                    
                </ul>
            </div>
        </nav>

                <!--button md-->
                <button class="btn btn-primary d-lg-none" id="tmblfilter" onclick="openNav()">Filter Pencarian</button>
        <!--end of button md-->
        <!--filter box-->
        <div class="container-fluid" >
            <div class="row" style="padding-top: -5vh;">
                <div class="col-lg-3 d-none d-lg-block d-md-none">
                    <div class="filterbox">
                        <form action="">
                            <!-- <div class="form-group">
                                <label for="Location" style="font-size: 20px;" class="text-white">Location</label>
                                <br>
                                <input type="text" class="form-control" id="Location" placeholder="Lokasi">
                            </div> -->
                            <div class="form-group">
                                <label for="Hargamin" style="font-size: 20px;" class="text-white">Harga Minimum</label>
                                <input type="text" class="form-control" id="Hargamin" placeholder="Harga Minimum">
                            </div> 
                            <div class="form-group">
                                <label for="Hargamax" style="font-size: 20px;" class="text-white">Harga Maximum</label>
                                <input type="text" class="form-control" id="Hargamax" placeholder="Harga Maximum">
                            </div> 
                            <div class="form-group">
                                <label for="Merk" style="font-size: 20px;" class="text-white">Merk</label>
                                <input type="text" class="form-control" id="Merk" placeholder="Merk">
                            </div> 
                            <button class="btn btn-primary gas">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
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

        <div id="footer">
                <h4 style="color: white; padding-top: 15px;">Follow us for more cars!</h4>
                <a href="https://www.instagram.com/ourdailycar/" class="fa fa-instagram"> ourdailycar</a>
        </div>
    </body>

    <script>

function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

$(document).ready(function() {

$(".gas").click( function() {
//   var location = $("#Location").val();
    var hargamin = $("#Hargamin").val();
    var hargamax = $("#Hargamax").val();
    var merk = $("#Merk").val();
    $db = mysql_select_db("proyek tekweb", $connection); // Selecting Database
    //MySQL Query to read data
    $query = "SELECT * from cars";
    $row = $connection->query($query);
    print_r($row['price']);
    while ($row = mysql_fetch_assoc($query)) {
        if($row['price']>hargamin && $row['price']<hargamax){
            alert("masok");
            // <div class="container">
            // <div class="row carcard ">
            //         <div class="col-12 col-md-6 col-lg-4 pb-3 pt-5">
            //             <div class="card" style="height: 300px">
            //                 <img src="image/mobel.png" class="cars">
            //                 <div class="card-body">
            //                     <h3 style="margin-left:10px;margin-top:5px;"><b>$row['title']</b></h3>
            //                     <hr>
            //                     <p style="margin-left:10px;position: absolute;top: 40%;">$row['descr']</p>
            //                     <p style="margin-left:10px;position: absolute;top: 70%;"><small class="text-muted">$row['phone']</small></p>
            //                     <h2 style="margin-bottom:30px;margin-left:10px;position:absolute;bottom: 0;">$row['price'],-</h2>
            //                 </div>
            //             </div>                    
            //         </div>
            // </div>
            // </div>
        }
    }   
}); 
});

    </script>
</html>
<?php

session_start();
//cek apakah sudah login atau tidak (kalau belum login maka di arahkan ke login page)
if(!isset($_SESSION['id_user'])){
  header('location:login.php');
}  else{
    include('koneksi.php');

    $title = $desc = $phone = $price = $idf = '';

    $errors = array('title'=>'', 'desc'=>'', 'phone'=>'', 'price'=>'', 'idf'=>'');

    if(isset($_POST['submit'])){

        if(empty($_POST['title'])){
            $errors['title'] = "A title is required <br />";
        } else{
            $title = $_POST['title'];
        }

        if(empty($_POST['desc'])){
            $errors['desc'] = "A description is required <br />";
        } else{
            $desc = $_POST['desc'];
        }

        if(empty($_POST['phone'])){
            $errors['phone'] = "A phone number is required <br />";
        } else{
            $phone = $_POST['phone'];
            if (preg_match('/^[1-9][0-9]*$/', $phone)){
                
            } else{
                $errors['phone'] = "Phone number must contain only numbers";
            }
        }
        if(empty($_POST['price'])){
            $errors['price'] = "A price is required <br />";
        } else{
            $price = $_POST['price'];
            if (preg_match('/^[1-9][0-9]*$/', $price)){
                
            } else{
                $errors['price'] = "Phone number must contain only numbers";
            }
        }
        
        if(array_filter($errors)){

        } else{

            $title = mysqli_real_escape_string($connection, $_POST['title']);
            $desc = mysqli_real_escape_string($connection, $_POST['desc']);
            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
            $price = mysqli_real_escape_string($connection, $_POST['price']);
            $idforeign = mysqli_real_escape_string($connection, $_POST['idf']);

            $sql = "INSERT INTO cars(title,descr,phone,price,id_user) VALUES('$title', '$desc','$phone','$price','$idforeign')";

            if(mysqli_query($connection, $sql)){
                header('Location: dashboard2.php');
            } else{
                echo 'query error: ' . mysqli_error($connection);
            }

            
        }
    }

}

?>


<!doctype html>
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

    <style>
    .brandpos{
        padding-right: 60vw;
      }
    body, html{
        background-image: url('image/supra.jpg');
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
   .card{
        margin-top: 120px;
        
        background-color: rgba(255,255,255, 0.6) !important;
        width:800px;
   }
   
      
    @media screen and (max-width : 812px){
        .brandpos{
            padding-right: 0;
        }
    }
   label{
       padding-top:5px;
       padding-left: 10px;
       font-size: 17px;
   }
   .cars{
       width:40%;
       margin:auto;
       margin-top:-50px;
       display: block;
       position: relative;
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
        
        
        <div class="container card mb-5">
            <img src="image/audi.png" class="cars">
            <form class="white" action="add.php" method="POST">
                <label>Title:</label>
                <textarea class="form-control" rows="2" name="title" value="<?php echo htmlspecialchars($title) ?>"></textarea>
                <div class="text-danger"><?php echo $errors['title']; ?></div>
                <label>Description:</label>
                <textarea class="form-control" rows="5" name="desc" value="<?php echo htmlspecialchars($desc) ?>"></textarea>
                <div class="text-danger"><?php echo $errors['desc']; ?></div>
                <label>Contact:</label>
                <textarea class="form-control" rows="1" name="phone" value="<?php echo htmlspecialchars($phone) ?>"></textarea>
                <div class="text-danger"><?php echo $errors['phone']; ?></div>
                <label>Price:</label>
                <textarea class="form-control" rows="1" name="price" value="<?php echo htmlspecialchars($price) ?>"></textarea>
                <div class="text-danger"><?php echo $errors['price']; ?></div>
                <div style="text-align: center; padding-top: 15px; padding-bottom:15px; ">
                    <input type="submit" name="submit" value="SUBMIT" class="btn btn-success btn-lg">
                </div>
                <textarea name="idf" value="<?php echo htmlspecialchars($idf) ?>" style="display:none;"><?php echo htmlspecialchars($_SESSION["id_user"]); ?></textarea>
            </form>
        </div>

</body>

<html>
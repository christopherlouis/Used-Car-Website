<?php

include('koneksi.php');


$nama_lengkap = $_POST['nama_lengkap'];
$username     = $_POST['username'];
$password     = MD5($_POST['password']);
$no_telp      = $_POST['no_telp'];
$email     = $_POST['email'];

//query insert data ke dalam database
$query ="INSERT INTO tbl_users (nama_lengkap, username, password, no_telp, email) VALUES ('$nama_lengkap', '$username', '$password', '$no_telp', '$email')";

//query cek username sama
$query2    = "SELECT id_user FROM tbl_users WHERE username='$username' ";
$result2   = mysqli_query($connection, $query2);
$num_row2  = mysqli_num_rows($result2);

//query cek email sama
$query3    = "SELECT id_user FROM tbl_users WHERE email='$email' ";
$result3   = mysqli_query($connection, $query3);
$num_row3  = mysqli_num_rows($result3);


//cek username dan email sekaligus telah terpakai atau tidak
if($num_row2 >= 1 && $num_row3 >=1){
    echo "cekusernamedanemail";
}
//cek username telah terpakai atau tidak
else if($num_row2 >= 1){
    echo "cekusername";
}
//cek email telah terpakai atau tidak
else if($num_row3 >= 1){
    echo "cekemail";
}
//jika username dan email tersedia maka data masuk
else if($connection->query($query)) {
    echo "success";
}
//error
else {
    echo "error";
}
?>

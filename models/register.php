<?php
    include 'connection.php';
    if(isset($_POST['register'])){
        $fullname = $_POST['fullname'];
        $user = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encrypt_pass = md5($password);

        $sql = "INSERT INTO tb_customers(nama_cust, username, email, pass) VALUES('".$fullname."', '".$user."', '".$email."', '".$encrypt_pass."')";
        $query = $koneksi->query($sql);
        if($query){
            header("location: ../views/login_screen.php");
        }
        else{
            header("location: ../views/register_screen.php");
        }
    }
?>
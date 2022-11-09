<?php
    include "connection.php"; 
    $id_cust = $_POST['id_cust'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $query_change = "UPDATE tb_customers SET nama_cust = '".$fullname."', username = '".$username."', email = '".$email."', no_telp = '".$phone."', gender = '".$gender."', alamat = '".$address."' WHERE id_cust = '".$id_cust."'";
    $result_change = $koneksi->query($query_change);
    if($result_change){
        header("location: ../views/dashboard/setting.php");
    }
    else{
        echo "Update failed " . mysqli_error($koneksi);
    }
?>
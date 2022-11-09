<?php
    include 'connection.php';
    $bukti = $_POST['bukti'];
    $id_bayar = $_POST['id_bayar'];
    $status = "Sudah bayar";
    $status_order = "Selesai";

    $query_update = "UPDATE tb_pembayaran SET bukti = '".$bukti."', status_bayar = '".$status."' WHERE id_bayar = '".$id_bayar."'";
    $result = $koneksi->query($query_update);
    if($result){
        $query_order = "UPDATE tb_order SET status_order = '".$status_order."'";
        $result_order = $koneksi->query($query_order);
        if($result_order){
            header("location: ../views/dashboard/history.php");
        }
        else{
            echo "Upload bukti gagal " . mysqli_error($koneksi);
        }
    }
    else{
        echo "Upload bukti gagal " . mysqli_error($koneksi);
    }
    
?>
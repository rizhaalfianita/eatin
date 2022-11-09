<?php
    include 'connection.php';
    
    $id_pesan_menu = $_POST['id_pesan_menu'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];
    $total = $qty * $harga;
    $query_update = "UPDATE tb_pesan_menu SET qty='".$qty."', total_harga = '".$total."' WHERE id_pesan_menu = '".$id_pesan_menu."'";
    $result_update = $koneksi->query($query_update);
    if($result_update){
        header("location: ../views/dashboard/order.php");
    }
    else{
        echo "Update failed";
    }
?>
<?php
    session_start();
    include 'connection.php';
   
        $id_menu = $_POST["id_menu"];
        $harga = $_POST["harga"];
        $qty = 1;
        $total = $harga * $qty;
        
        $sql_insert = "INSERT INTO tb_pesan_menu(id_menu, qty, total_harga) VALUES ('".$id_menu."', '".$qty."', '".$total."')";
        $query_insert = $koneksi->query($sql_insert);
        if($query_insert){
            header("location: ../views/dashboard/menu.php");
        }
        else{
            echo "Input failed " . mysqli_error($koneksi);
        }
    
?>
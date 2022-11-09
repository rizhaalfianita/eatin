<?php
    include 'connection.php';
    if(isset($_GET["clear"])){
        $id_pesan_menu = $_GET["clear"];
        $remove_query = "DELETE FROM tb_pesan_menu";
        $result_remove = $koneksi->query($remove_query);
        if($result_remove){
            $in_query = "ALTER TABLE tb_pesan_menu AUTO_INCREMENT = 1";
            $result_in = $koneksi->query($in_query);
            if($result_in){
                header("location: ../views/dashboard/order.php");
            }
            else{
                echo "Delete failed";
            }
        }
        else{
            echo "Delete failed";
        }
    }
?>
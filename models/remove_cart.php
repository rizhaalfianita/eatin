<?php
    include 'connection.php';
    if(isset($_GET["remove"])){
        $id_pesan_menu = $_GET["remove"];
        $delete_query = "DELETE FROM tb_pesan_menu WHERE id_pesan_menu = '".$id_pesan_menu."'";
        $result_delete = $koneksi->query($delete_query);
        if($result_delete){
            header("location: ../views/dashboard/order.php");
        }
        else{
            echo "Delete failed";
        }
    }
?>
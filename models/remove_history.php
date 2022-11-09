<?php
    include 'connection.php';
    $id_pesan_menu = 0;
    $id_pesan_seat = 0;
    $query_show_order = "SELECT * FROM tb_order";
    $result_show_order = $koneksi->query($query_show_order);
    while($row = mysqli_fetch_array($result_show_order)){
        $id_pesan_menu = $row['id_pesan_menu'];
        $id_pesan_seat = $row['id_pesan_seat'];
    }

    if(isset($_GET["remove"])){
        $id_order = $_GET["remove"];
        $query_bayar = "DELETE FROM tb_pembayaran WHERE id_order = '".$id_order."'";
        $result_bayar = $koneksi->query($query_bayar);
        if($result_bayar){
            $delete_query = "DELETE FROM tb_order WHERE id_order = '".$id_order."'";
            $result_delete = $koneksi->query($delete_query);
            if($result_delete){
                $in_query = "ALTER TABLE tb_order AUTO_INCREMENT = 1";
                $result_in = $koneksi->query($in_query);
                if($result_in){
                    $query_seat = "DELETE FROM tb_pesan_seat";
                    $result_seat = $koneksi->query($query_seat);
                    $query_menu = "DELETE FROM tb_pesan_menu";
                    $result_menu = $koneksi->query($query_menu);
                    $in_seat = "ALTER TABLE tb_pesan_seat AUTO_INCREMENT = 1";
                    $seat_in = $koneksi->query($in_seat);
                    $in_menu = "ALTER TABLE tb_pesan_menu AUTO_INCREMENT = 1";
                    $menu_in = $koneksi->query($in_menu);
                    header("location: ../views/dashboard/history.php");
                }
                else{
                    echo "Delete failed " . mysqli_error($koneksi);
                }        
            }
            else{
                echo "Delete failed " . mysqli_error($koneksi);
            }
        }
        else{
            echo "Delete failed " . mysqli_error($koneksi);
        }
        $query_in_bayar = "ALTER TABLE tb_pembayaran AUTO_INCREMENT = 1";
        $result_in_bayar = $koneksi->query($query_in_bayar);
    }
?>
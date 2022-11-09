<?php
    include 'connection.php';
    
    $id_cust = $_POST['id_cust'];
    $id_pesan_menu = $_POST['id_pesan_menu'];
    $tgl_reserv = $_POST['tgl_reserv'];
    $jam_resev = $_POST['jam_reserv'];
    $grand_total = $_POST['grand_total'];
    $tgl_order = date("Y-m-d");
    $jumlah_tamu = $_POST['jumlah_tamu'];
    $nomor_seat = $_POST["nomor_seat"];
    $id_metode = $_POST['id_metode'];
    $pesan = $_POST['pesan'];
    $status = "Belum bayar";

    $query_seat = "INSERT INTO tb_pesan_seat (id_seat, jumlah_tamu) VALUES('".$nomor_seat."', '".$jumlah_tamu."')";
    $result_seat = $koneksi->query($query_seat);
    if($result_seat){
        $query_show_seat = "SELECT * FROM tb_pesan_seat LIMIT 1";
        $result_show_seat = $koneksi->query($query_show_seat);
        while($row = mysqli_fetch_array($result_show_seat)){
            $id_pesan_seat = $row['id_pesan_seat'];
            $query_order = "INSERT INTO tb_order(id_cust, id_pesan_seat, id_pesan_menu, tgl_order, tgl_reserv, jam_reserv, total, status_order, pesan) 
            VALUES('".$id_cust."', '".$id_pesan_seat."', '".$id_pesan_menu."', '".$tgl_order."', '".$tgl_reserv."', '".$jam_resev."', '".$grand_total."', '".$status."', '".$pesan."')";
            $result_order = $koneksi->query($query_order);
            if($result_order){
                $query_show_order = "SELECT * FROM tb_order LIMIT 1";
                $result_show_order = $koneksi->query($query_show_order);
                while($row_order = mysqli_fetch_array($result_show_order)){
                    $id_order = $row_order['id_order'];
                    $query_bayar = "INSERT INTO tb_pembayaran(id_order, id_metode, total_bayar, status_bayar) VALUES('".$id_order."', '".$id_metode."', '".$grand_total."', '".$status."')";
                    $result_bayar = $koneksi->query($query_bayar);
                    if($result_bayar){
                        header("location: ../views/dashboard/payment.php");
                    }
                    else{
                        echo "Order failed " . mysqli_error($koneksi);
                    }
                }
            }
            else{
                echo "Order failed " . mysqli_error($koneksi);
            }
        }
    }
    else{
        echo "Order Failed" . mysqli_error($koneksi);
    }
?>
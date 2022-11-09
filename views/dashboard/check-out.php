<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: ../login_screen.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .vertical-nav{
        min-width: 20rem;
        width: 20rem;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        box-shadow: 3px 3px 10px rgba(0,0,0,0.1);
        transition: all 0.4s;
    }
    .page-content{
        width: calc(100%-20rem);
        margin-left: 20rem;
        transition: all 0.4s;
    }
    #sidebar.active{
        margin-left: -20rem;
    }
    #content.active{
        width: 100%;
        margin: 0;
    }
    .fa{
        font-size: 15px;
    }
    .fa-credit-card, .fa-list-alt{
        font-size: 12px;
    }
    .head{
        background-image: linear-gradient(to bottom, rgba(217,83,79,0.85),rgba(217,83,79,0.85)), url("https://img.jakpost.net/c/2020/06/23/2020_06_23_98524_1592882725._large.jpg");
        background-size: cover;
    }
    #sidebar .nav-item:hover,  #sidebar .nav-link:hover{
        background-color:  rgba(217,83,79,0.95);
        color: white;
    }
    #sidebar .nav-link{
        color: #292929;
    }
    #sidebar .active{
        background-color:  rgba(217,83,79,0.85);
        color: white;
    }
</style>
<body>
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 head">
            <div class="media d-flex align-items-center">
                <img src="https://i.pinimg.com/originals/1a/db/f0/1adbf0c5f633251008e22b9f6fc82d05.jpg" alt="" width="80" height="80" class="mr-3 rounded-circle shadow-sm">
                <div class="media-body">
                    <h4 class="mt-1 text-white">Xu Minghao</h4>
                    <p class="font-weight-normal text-white mb-0">xuminghao</p>
                </div>
            </div>
        </div>
        <p class="text-grey font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>
        <ul class="nav flex-column bg-white mb-4">
            <li class="nav-item">
                <a href="home.php" class="nav-link">
                    <i class="fa fa-home mr-3"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-cutlery mr-3"></i>
                    Menu
                </a>
            </li>
            <li class="nav-item">
                <a href="order.php" class="nav-link active">
                <i class="fa fa-shopping-cart mr-3"></i>
                    Order
                </a>
            </li>
            <li class="nav-item">
                <a href="payment.php" class="nav-link">
                <i class="fa fa-credit-card mr-3"></i>
                    Payment
                </a>
            </li>
            <li class="nav-item">
                <a href="history.php" class="nav-link">
                <i class="fa fa-list-alt mr-3"></i>
                    History
                </a>
            </li>
        </ul>
        <p class="text-grey font-weight-bold text-uppercase px-3 small pb-4 mb-0">Profile</p>
        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="setting.php" class="nav-link">
                <i class="fa fa-wrench mr-3"></i>
                    Setting
                </a>
            </li>
            <li class="nav-item">
                <a href="../../models/logout.php" class="nav-link">
                <i class="fa fa-sign-out mr-3"></i>
                    Log out
                </a>
            </li>
        </ul>
    </div>

    <div class="page-content" id="content">
        <div class="container bg-white p-5" id="check-out">
            <h2 class="h2 mb-4">Check Out</h2>
            <form action="../../models/order_item.php" method="POST">
                <div class="row">
                    <div class="col mr-4">
                        <small class="text-muted pb-3">Tanggal Reservasi</small>
                        <input type="date" class="form-control mt-2 mb-4" name="tgl_reserv">
                        <small class="text-muted pb-3">Jam Reservasi</small>
                        <input type="time" class="form-control mt-2 mb-4" name="jam_reserv">
                        <small class="text-muted pb-3">Jumlah Tamu</small>
                        <input type="number" class="form-control mt-2 mb-4" name="jumlah_tamu" placeholder="0">
                        <small class="text-muted">Seat number</small>
                        <br>
                        <select class="select pl-0 my-3 col-12 border-0" name="nomor_seat">
                        <?php
                            include '../../models/connection.php';
                            $query = "SELECT * FROM tb_seat";
                            $result = mysqli_query($koneksi, $query);
                            while($row = mysqli_fetch_array($result)){ ?>
                                <option value="<?php echo $row['id_seat']?>"><?php echo $row['nomor_seat']?></option>
                            <?php
                            }
                        ?>
                        </select>
                        <?php
                            include '../../models/connection.php';
                            $tgl_pesan = date("Y-m-d");
                            $query_menu = "SELECT a.id_pesan_menu, a.id_menu, a.qty, a.total_harga, b.nama_menu, b.harga, b.gambar FROM tb_pesan_menu a JOIN tb_menu b ON a.id_menu = b.id_menu";
                            $result_menu = mysqli_query($koneksi, $query_menu);
                            while($row = mysqli_fetch_array($result_menu)){ ?>
                                <input type="hidden" value="<?php echo $row['id_pesan_menu']?>" name="id_pesan_menu">
                                <div class="card mt-2 mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col align-middle">
                                                <img src="<?php echo $row['gambar']?>" alt="" class="rounded" width="80" height="80">
                                            </div>
                                            <div class="col-6 mt-2 pl-0">
                                                <p class="h5"><?php echo $row['nama_menu']?></p>
                                            </div>
                                            <div class="col mt-3">
                                                <p class="h6 text-muted"><?php echo $row['harga']?></p>
                                                <p class="h6 text-muted text-center"><?php echo $row['qty'] . "x" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                    </div>
                    <div class="col">
                    <div class="form-group row">
                            <label for="note" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control border-0" name="pesan" id="note" placeholder="Note...">
                            </div>
                    </div>
                    <small class="text-muted">Metode Pembayaran</small>
                        <br>
                        <?php
                            $query_metode = "SELECT * FROM tb_metode_bayar";
                            $result_metode = $koneksi->query($query_metode);
                            while($row_metode = mysqli_fetch_array($result_metode)){?>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="radio" name="id_metode" value="<?php echo $row_metode['id_metode']?>">
                                    <label class="form-check-label ml-3" for="id_metode">
                                        <?php echo $row_metode['metode_bayar']?>
                                    </label>
                                </div>   
                                <?php
                            }
                        ?>
                        <hr class="col-12 ml-0 mt-4 pl-0">
                        <div class="row pl-0">
                            <div class="col-9">
                                <p class="lead text-muted">Subtotal</p>
                            </div>
                            <div class="col">
                                <?php
                                $query_total = "SELECT SUM(total_harga) FROM tb_pesan_menu";
                                $result_total = mysqli_query($koneksi, $query_total);
                                    while($row_total = mysqli_fetch_array($result_total)){ ?>
                                        <input type="hidden" name="grand_total" value="<?php echo $row_total[0]; ?>">             
                                        <p class="lead text-muted"><?php echo "Rp " . $row_total[0]?></p>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row pl-0">
                            <div class="col-9">
                                <p class="lead text-muted">Discount</p>
                            </div>
                            <div class="col">
                                <p class="lead text-muted">Rp 0</p>
                            </div>
                        </div>
                        <hr class="col-12 ml-0 pl-0">
                        <div class="row pl-0">
                            <div class="col-9">
                                <p class="lead text-muted">Total</p>
                            </div>
                            <div class="col">
                                <?php
                                    $query_total = "SELECT SUM(total_harga) FROM tb_pesan_menu";
                                    $result_total = mysqli_query($koneksi, $query_total);
                                    while($row_total = mysqli_fetch_array($result_total)){ ?>
                                        <p class="lead text-muted"><?php echo "Rp " . $row_total[0]?></p>
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $query_cust = "SELECT * FROM tb_customers LIMIT 1";
                    $result_cust = $koneksi->query($query_cust);
                    while($row_cust = mysqli_fetch_array($result_cust)){?>
                        <input type="hidden" name="id_cust" value="<?php echo $row_cust['id_cust']?>">
                        <?php
                    }
                ?>   
                <input type="submit" name="order" class="btn btn-dark mt-5 px-5 d-block mx-auto shadow" value="ORDER">
            </form>
        </div>
    </div>
</body>
</html>
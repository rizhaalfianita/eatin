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
    <link rel="stylesheet" href="../../assets/css/style/style_sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 head">
            <div class="media d-flex align-items-center">
                <img src="https://i.pinimg.com/originals/1a/db/f0/1adbf0c5f633251008e22b9f6fc82d05.jpg" alt="" width="80" height="80" class="mr-3 rounded-circle shadow-sm">
                <div class="media-body">
                <?php
                        include '../../models/connection.php';
                        $a = "SELECT * FROM tb_customers WHERE id_cust=1";
                        $b = $koneksi->query($a);
                        while($c=$b->fetch_array()){ ?>
                            <h4 class="mt-1 text-white"><?php echo $c['nama_cust']?></h4>
                            <p class="font-weight-normal text-white mb-0"><?php echo $c['username']?></p>
                            <?php
                        }
                    ?>
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
                <a href="order.php" class="nav-link">
                <i class="fa fa-shopping-cart mr-3"></i>
                    Order
                </a>
            </li>
            <li class="nav-item">
                <a href="payment.php" class="nav-link active">
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
        <div class="container bg-white p-5">
            <h2 class="h3 mb-4">Payment</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Tujuan Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Bukti</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../../models/connection.php';
                        $query = "SELECT a.id_bayar, a.id_order, a.id_metode, a.total_bayar, a.bukti, a.status_bayar, b.metode_bayar, b.tujuan_bayar FROM tb_pembayaran a JOIN tb_metode_bayar b ON a.id_metode = b.id_metode";
                        $result = $koneksi->query($query);
                        while($row = mysqli_fetch_array($result)){?>
                           <form action="../../models/bayar.php" method="POST">
                            <tr>
                                <th scope="row"><?php echo $row['id_bayar']?></th>
                                <td><?php echo $row['id_order']?></td>
                                <td><?php echo $row['metode_bayar']?></td>
                                <td><?php echo $row['tujuan_bayar']?></td>
                                <td><?php echo $row['status_bayar']?></td>
                                <input type="hidden" name="id_bayar" value="<?php echo $row['id_bayar']?>">
                                <td><input type="file" class="form-control-file" name="bukti" value="<?php echo $row['bukti']?>"></td>
                                <td><input type="submit" name="bayar_selesai" class="btn btn-success shadow-sm" value="Selesai"></td>
                            </tr>
                            </form>
                        <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
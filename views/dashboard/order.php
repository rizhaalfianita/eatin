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
                <a href="menu.php" class="nav-link">
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
        <div class="container bg-white p-5">
            <h2 class="h3 mb-4">My Orders</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kuantitas</th>
                        <th scope="col">Total</th>
                        <th><a href="../../models/remove_all_cart.php?clear=all" class="btn btn-danger d-block" onClick="return confirm('Are you sure you want to delete all cart?');">Empty cart</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../../models/connection.php';
                        $tgl_pesan = date("Y-m-d");
                        $grand_total = 0;
                        $query_menu = "SELECT a.id_pesan_menu, a.id_menu, a.qty, a.total_harga, b.nama_menu, b.harga, b.gambar FROM tb_pesan_menu a JOIN tb_menu b ON a.id_menu = b.id_menu";
                        $result_menu = $koneksi->query($query_menu);
                        while($row = mysqli_fetch_array($result_menu)){ ?>
                            <form action="../../models/update_cart.php" method="POST">
                            <tr>
                                <input type="hidden" name="id_pesan_menu" value="<?php echo $row['id_pesan_menu']?>">
                                <td><img src="<?php echo $row['gambar']?>" alt="" class="rounded" width="80" height="80"></td>
                                <td><?php echo $row['nama_menu']?></td>
                                <td><?php echo $row['harga']?></td>
                                <input type="hidden" name="harga" value="<?php echo $row['harga']?>">
                                <td class="col-sm-2"><input type="number" name="qty" class="form-control" value="<?php echo $row['qty']?>"></td>
                                <td><?php echo $row['total_harga']?></td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-warning ml-5"><i class="fa fa-pencil text-white"></i></button>
                                        </div>
                                        <div class="col">
                                            <a href="../../models/remove_cart.php?remove=<?php echo $row['id_pesan_menu']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash text-white" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </form>
                            <?php $grand_total += $row['total_harga']; ?>   
                        <?php
                        }
                        ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Sub-Total</td>
                        <td class="text-right"><?php echo "Rp " . $grand_total; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>Total</th>
                        <th class="text-right"><?php echo "Rp " . $grand_total; ?></th>
                    </tr>
                </form>
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <a href="menu.php" class="btn btn-block btn-light"><i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i>Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="check-out.php" class="btn btn-block btn-success">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
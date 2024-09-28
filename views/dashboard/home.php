<?php
session_start();
if (!isset($_SESSION['username'])) {
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
    <link rel="stylesheet" href="../../assets/css/style/style_sidenav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .jumbotron {
        background-image: linear-gradient(to bottom, rgba(191, 46, 46, 0.7), rgba(191, 46, 46, 0.6)), url("https://www.eatright.org/-/media/images/eatright-landing-pages/foodgroupslp_804x482.jpg?as=0&w=967&rev=d0d1ce321d944bbe82024fff81c938e7&hash=E6474C8EFC5BE5F0DA9C32D4A797D10D");
        background-size: cover;
    }

    .jumbotron {
        color: white;
    }

    .card-img-top {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }

    .card-title {
        font-size: 18px;
    }

    .card-text {
        font-size: 13px;
    }
</style>

<body>
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 head">
            <div class="media d-flex align-items-center">
                <img src="../../assets/images/avatar.jpeg" alt="" width="80" height="80" class="mr-3 rounded-circle shadow-sm">
                <div class="media-body">
                    <?php
                    include '../../models/connection.php';
                    $a = "SELECT * FROM tb_customers WHERE id_cust=1";
                    $b = $koneksi->query($a);
                    while ($c = $b->fetch_array()) { ?>
                        <h4 class="mt-1 text-white"><?php echo $c['nama_cust'] ?></h4>
                        <p class="font-weight-normal text-white mb-0"><?php echo $c['username'] ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <p class="text-grey font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>
        <ul class="nav flex-column bg-white mb-4">
            <li class="nav-item">
                <a href="#" class="nav-link active">
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
                <a href="order.php" class="nav-link">
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
        <div class="container bg-white p-3">
            <div class="jumbotron">
                <h1>Hi, this is <span class="logo">Eatin.<span></h1>
                <p>Below are provided menus in our restaurant. You can choose whatever you want.</p>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-dark active" data-toggle="tab" href="#main">Main Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#side">Sides</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#dessert">Desserts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#drinks">Drinks</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="main" class="container tab-pane active"><br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'MC' LIMIT 3 ";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'MC' ORDER BY id_menu DESC LIMIT 3";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="side" class="container tab-pane fade"><br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'SD' LIMIT 3";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'SD' ORDER BY id_menu DESC LIMIT 1";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col-sm-4 mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="dessert" class="container tab-pane fade"><br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'DS' LIMIT 3";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'DS' ORDER BY id_menu DESC LIMIT 2";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col-sm-4 mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="drinks" class="container tab-pane fade"><br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'DR' LIMIT 3";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'DR' ORDER BY id_menu DESC LIMIT 2";
                        $b = $koneksi->query($a);
                        while ($c = $b->fetch_array()) { ?>
                            <div class="col-sm-4 mx-1">
                                <div class="card shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo $c['gambar'] ?>" alt="Card image">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title"><?php echo $c['nama_menu'] ?></h5>
                                            </div>
                                            <div class="col text-right">
                                                <h5 class="card-title"><?php echo 'Rp ' . $c['harga'] ?></h5>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted"><?php echo $c['deskripsi'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
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
<style>
    .page-content{
        width: calc(100%-20rem);
        margin-left: 20rem;
        transition: all 0.4s;
    }
    .form-check-input{
        width: 20px;
        height: 20px;
    }
</style>
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
                <a href="#" class="nav-link active">
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
        <div class="container bg-white p-5">     
        <h2 class="h3">Main Courses</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col" colspan="2">Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'MC'";
                        $result = mysqli_query($koneksi, $query);
                        while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td scope="row"><img src="<?php echo $row['gambar']?>" alt="" class="rounded" width="100" height="100"></td>
                                <td id="col_menu"><?php echo $row['nama_menu']?></td>
                                <td id="col_desc"><?php echo $row['deskripsi']?></td>
                                <td id="col_harga""><?php echo $row['harga']?></td>
                                <form action="../../models/add_to_cart.php" class="form-submit" method="POST">
                                    <input type="hidden" name="id_menu" value="<?php echo $row['id_menu']?>">
                                    <input type="hidden" name="harga" value="<?php echo $row['harga']?>">
                                    <td><input type="submit" class="btn btn-dark px-3 shadow-sm" name="add_to_cart" value="Add to Cart"></td>
                                </form>    
                            </tr>
                        <?php
                        }
                    ?>`
                </tbody>
            </table>
            <br>
            <h2 class="h3 ">Sides</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col" colspan="2">Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'SD'";
                        $result = mysqli_query($koneksi, $query);
                        while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td scope="row"><img src="<?php echo $row['gambar']?>" alt="" class="rounded" width="100" height="100"></td>
                                <td id="col_menu"><?php echo $row['nama_menu']?></td>
                                <td id="col_desc"><?php echo $row['deskripsi']?></td>
                                <td id="col_harga""><?php echo $row['harga']?></td>
                                <form action="../../models/add_to_cart.php" class="form-submit" method="POST">
                                    <input type="hidden" name="id_menu" value="<?php echo $row['id_menu']?>">
                                    <input type="hidden" name="harga" value="<?php echo $row['harga']?>">
                                    <td><input type="submit" class="btn btn-dark px-3 shadow-sm" name="add_to_cart" value="Add to Cart"></td>
                                </form>    
                            </tr>
                        <?php
                        }
                    ?>`
                </tbody>
            </table>
            <br>
            <h2 class="h3 ">Desserts</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col" colspan="2">Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'SD'";
                        $result = mysqli_query($koneksi, $query);
                        while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td scope="row"><img src="<?php echo $row['gambar']?>" alt="" class="rounded" width="100" height="100"></td>
                                <td id="col_menu"><?php echo $row['nama_menu']?></td>
                                <td id="col_desc"><?php echo $row['deskripsi']?></td>
                                <td id="col_harga""><?php echo $row['harga']?></td>
                                <form action="../../models/add_to_cart.php" class="form-submit" method="POST">
                                    <input type="hidden" name="id_menu" value="<?php echo $row['id_menu']?>">
                                    <input type="hidden" name="harga" value="<?php echo $row['harga']?>">
                                    <td><input type="submit" class="btn btn-dark px-3 shadow-sm" name="add_to_cart" value="Add to Cart"></td>
                                </form>    
                            </tr>
                        <?php
                        }
                    ?>`
                </tbody>
            </table>
            <br>
            <h2 class="h3 ">Drinks</h2>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col" colspan="2">Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'SD'";
                        $result = mysqli_query($koneksi, $query);
                        while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td scope="row"><img src="<?php echo $row['gambar']?>" alt="" class="rounded" width="100" height="100"></td>
                                <td id="col_menu"><?php echo $row['nama_menu']?></td>
                                <td id="col_desc"><?php echo $row['deskripsi']?></td>
                                <td id="col_harga""><?php echo $row['harga']?></td>
                                <form action="../../models/add_to_cart.php" class="form-submit" method="POST">
                                    <input type="hidden" name="id_menu" value="<?php echo $row['id_menu']?>">
                                    <input type="hidden" name="harga" value="<?php echo $row['harga']?>">
                                    <td><input type="submit" class="btn btn-dark px-3 shadow-sm" name="add_to_cart" value="Add to Cart"></td>
                                </form>    
                            </tr>
                        <?php
                        }
                    ?>`
                </tbody>
            </table>
            <br>
            <a href="order.php" class="btn btn-danger shadow float-right mb-5 px-4">Add selected to cart</a>    
        </div>
    </div> 

</body>
</html>
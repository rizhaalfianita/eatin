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
</head>
<style>
    .container {
        padding: 0 10% 5% 10%;
    }

    .row {
        width: 300px;
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
                <a href="setting.php" class="nav-link active">
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

    <?php
    $fullname = "";
    $username = "";
    $email = "";
    $phone = "";
    $gender = "";
    $address = "";
    $id_cust = 0;

    include '../../models/connection.php';
    $query_cust = "SELECT * FROM tb_customers";
    $result_cust = $koneksi->query($query_cust);
    while ($row_cust = mysqli_fetch_array($result_cust)) {
        $id_cust = $row_cust['id_cust'];
        $fullname = $row_cust['nama_cust'];
        $username = $row_cust['username'];
        $email = $row_cust['email'];
        $pass = $row_cust['pass'];
        $gender = $row_cust['gender'];
        $address = $row_cust['alamat'];
        $phone = $row_cust['no_telp'];
    }
    ?>
    <div class="page-content" id="content">
        <h2 class="h3 mb-4 px-5 pt-5 pb-2">Profile</h2>
        <div class="container">
            <form action="../../models/change_profile.php" method="POST">
                <input type="hidden" name="id_cust" id="" value="<?php echo $id_cust ?>">
                <small for="fullname" class="text-danger">FULL NAME</small>
                <input type="text" class="form-control mt-2 py-4" id="fullname" placeholder="Full name" value="<?php echo $fullname ?>" name="fullname">
                <br>
                <small for="fullname" class="text-danger">USERNAME</small>
                <input type="text" class="form-control mt-2 py-4" id="fullname" placeholder="Username" value="<?php echo $username ?>" name="username">
                <br>
                <small for="fullname" class="text-danger">E-MAIL ADDRESS</small>
                <input type="text" class="form-control mt-2 py-4" id="fullname" placeholder="E-mail address" value="<?php echo $email ?>" name="email">
                <br>
                <small for="fullname" class="text-danger">PHONE</small>
                <input type="text" class="form-control mt-2 py-4" id="fullname" placeholder="Phone" value="<?php echo $phone ?>" name="phone">
                <br>
                <small for="fullname" class="text-danger">GENDER</small>
                <div class="row">
                    <div class="col">
                        <div class="form-check mt-2">
                            <input type="radio" class="form-check-input mt-2" id="gender_l" name="gender" value="M" <?php if ($gender == 'M') echo 'checked="checked"'; ?>>
                            <label for="gender_l" class="form-check-label">Male</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-check mt-2 col">
                            <input type="radio" class="form-check-input mt-2" id="gender_l" name="gender" value="F" <?php if ($gender == 'F') echo 'checked="checked"'; ?>>
                            <label for="gender_l" class="form-check-label">Female</label>
                        </div>
                    </div>
                </div>
                <br>
                <small for="fullname" class="text-danger">ADDRESS</small>
                <textarea name="address" id="address" class="form-control my-2 py-3" rows="7" placeholder="Your address..." name="address"><?php echo $address ?></textarea>
                <input type="submit" class="btn btn-dark shadow px-5 mt-5 d-block mx-auto" value="Update Profile">
            </form>
        </div>
    </div>
</body>

</html>
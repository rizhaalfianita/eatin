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
    .container{
        padding: 0 10% 5% 10%;
    }
    .row{
        width: 300px;
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
                <a href="#" class="nav-link active">
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
                <a href="#" class="nav-link">
                <i class="fa fa-shopping-cart mr-3"></i>
                    Order
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-credit-card mr-3"></i>
                    Payment
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-list-alt mr-3"></i>
                    History
                </a>
            </li>
        </ul>
        <p class="text-grey font-weight-bold text-uppercase px-3 small pb-4 mb-0">Profile</p>
        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-wrench mr-3"></i>
                    Setting
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-sign-out mr-3"></i>
                    Log out
                </a>
            </li>
        </ul>
    </div>
</body>
<script>
    $var btns = $(".vertical-nav .nav .nav-link");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");  
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
</script>
</html>
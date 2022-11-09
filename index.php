<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatIn</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap');
    html{
        scroll-behavior: smooth;
    }
    body{
        font-family: 'Quicksand', sans-serif;
        font-weight: 300;
        font-size: 16px;
        width: 100%;
    }
    .banner{
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.4),rgba(0,0,0,0.6)), url("https://wallpapercave.com/wp/wp1874155.jpg");
        background-size: cover;
        font-weight: 400;
        height: 100vh;
        width: 100%;
        color: #f2f2f2;
    }
    .logo{
        font-family: 'Lobster Two', cursive;
        font-size: 26px;
    }
    .head{
        font-family: 'Lobster Two', cursive;
        font-size: 
    }
    .nav-link{
        color: #fefefe;
    }
    .nav-link:hover{
        color: #d9534f;
    }
    .active{
        color: #d9534f;
    }
    .container{
        margin-top: 15%;
        transform: translateY(-15%);
    }
    .container a{
        margin-left: 50%;
        transform: translateX(-50%);
        font-size: 14px;
        padding: 10px 37px;
        border-radius: 25px;
    }
    #menu hr{
        width: 30px;
        height: 3px;
    }
    .tab {
        overflow: hidden;
    }
    .tab button{
        background-color: white;
        border-radius: 20px;
    }
    .tab button:hover {
        background-color: #c9302a;
        color: white;
    }
    .tab button.active {
        background-color: #d9534f;
        color: white;
    }
    .tabcontent {
        display: none;
    }
    .tabcontent .grid-container{
        display: grid;
        grid-template-columns: auto auto auto auto;
        gap: 15px;
    }
    .grid-container img{
        object-fit: cover;
        border-radius: 10px;
    }
    .order{
        height: 300px;
        border-radius: 20px;
    }
    .order a{
        border-radius: 10px;
        width: 300px;
    }
    .footer{
        background-color: #424141;
    }
    .footer i{
        color: #c43f3f;
    }
    .upper-footer{
        background-color: #474747;
    }
    .footer ul {
        list-style: none;
        padding: 0;
    }
    .lower-footer .btn{
        border-radius: 50%;
    }
</style>
<body>
<div class="container-fluid banner">
    <nav class="navbar navbar-expand-lg py-4">
        <a class="navbar-brand text-white ml-5 logo" href="#">EatIn</a>
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="#menu">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="views/login_screen.php">Reservation</a>
            </li>    
            <li class="nav-item">
                <a class="nav-link ml-4" href="#contact">Contact</a>
            </li>    
        </ul>  
    </nav>
    <div class="container">
        <h1 class="text-center head">EatIn</h1>
		<p class="text-center">Website to book seat and foot faster for dine in.</p>
		<a href="views/login_screen.php" class="btn btn-md text-center btn-danger shadow">GET STARTED</a>
    </div>
</div>
<div class="container-fluid p-5 text-center" id="menu">
    <h2>OUR MENU</h2>
    <hr class="bg-danger mb-5">
    <div class="tab mb-5">
        <button class="tablinks btn px-3" onclick="openMenu(event, 'Main Courses')" id="defaultOpen">Main Courses</button>
        <button class="tablinks btn px-3" onclick="openMenu(event, 'Sides')">Sides</button>
        <button class="tablinks btn px-3" onclick="openMenu(event, 'Desserts')">Desserts</button>
        <button class="tablinks btn px-3" onclick="openMenu(event, 'Drinks')">Drinks</button>
    </div>
    <div id="Main Courses" class="tabcontent">
        <div class="grid-container">
            <?php
                include "models/connection.php";
                $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'MC'";
                $b = $koneksi->query($a);
                while($c=$b->fetch_array()){ ?>
                    <img src="<?php echo $c['gambar']?>" alt="" height="245" width="300" class="shadow-sm">
                <?php
                }
            ?>
        </div>
    </div>
    <div id="Sides" class="tabcontent">
    <div class="grid-container">
            <?php
                include "models/connection.php";
                $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'SD'";
                $b = $koneksi->query($a);
                while($c=$b->fetch_array()){ ?>
                    <img src="<?php echo $c['gambar']?>" alt="" height="245" width="300" class="shadow-sm">
                <?php
                }
            ?>
        </div> 
    </div>
    <div id="Desserts" class="tabcontent">
        <div class="grid-container">
            <?php
                include "models/connection.php";
                $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'DS'";
                $b = $koneksi->query($a);
                while($c=$b->fetch_array()){ ?>
                    <img src="<?php echo $c['gambar']?>" alt="" height="245" width="300" class="shadow-sm">
                <?php
                }
            ?>
        </div>
    </div>
    <div id="Drinks" class="tabcontent">
        <div class="grid-container">
            <?php
                include "models/connection.php";
                $a = "SELECT * FROM tb_menu WHERE id_kategori_menu = 'DR'";
                $b = $koneksi->query($a);
                while($c=$b->fetch_array()){ ?>
                    <img src="<?php echo $c['gambar']?>" alt="" height="245" width="300" class="shadow-sm">
                <?php
                }
            ?>
        </div>
    </div>
</div>
<div class="mx-5 text-dark shadow order my-5 p-5">
    <div class="row">
        <div class="col py-4 pl-5">
            <h2 class="mb-4">What you waiting for?</h2>
            <p>Hurry get your seat. We provide you the comfiest seat and get your food immediately. You don't have to wait in a long queue. Just press the order button and you can get your seat and food faster than ever.</p>
        </div>
        <div class="col py-5 pr-5">
            <a href="views/login_screen.php" class="btn btn-danger text-center mt-4 shadow py-2 float-right">BOOK NOW!</a>
        </div>
    </div>
</div>
<footer class="container-fluid footer" id="contact">
    <div class="row p-5 upper-footer">
        <div class="col col-5">
            <h2 class="mb-4 logo text-white">Eatin.</h2>
            <p class="text-muted mb-2">Copyright ©2022 All rights reserved | This template is</p>
            <p class="text-muted">made by <span class="text-white">Rizha Alfianita.</span></p>
        </div>
        <div class="col">
            <ul class="text-white">
                <h5 class="mb-4 pl-3">Menu</h5>
                <li><a href=""class="nav-link text-muted">Main Courses</a></li>
                <li><a href=""class="nav-link text-muted">Sides</a></li>
                <li><a href=""class="nav-link text-muted">Desserts</a></li>
                <li><a href=""class="nav-link text-muted">Drinks</a></li>
            </ul>
        </div>
        <div class="col">
            <ul class="text-white">
                <h5 class="mb-4">Address</h5>
                <li class="mb-3 text-muted"><i class="fa fa-home pr-3"></i>Jember, Indonesia</li>
                <li class="mb-3 text-muted"><i class="fa fa-envelope pr-3"></i>rizhaalfianita1412@gmail.com</li>
                <li class="mb-3 text-muted"><i class="fa fa-phone pr-3"></i>+6289 686 416 396</li>
            </ul>
        </div>
    </div>
    <ul class = "lower-footer text-center mb-0">
        <li class=" px-1 py-3">
            <a class="mx-3"><i class="fa fa-facebook"></i></a>
            <a class="mx-3"><i class="fa fa-instagram"></i></a>
            <a class="mx-3"><i class="fa fa-envelope"></i></a>
            <a class="mx-3"><i class="fa fa-linkedin"></i></a>
        </li>
    </ul>
</footer>
<script>
    function openMenu(evt, menuName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(menuName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
</body>
</html>
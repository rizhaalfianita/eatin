<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/font-awesome.min.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500&display=swap');
    body{
        font-family: 'Quicksand', sans-serif;
        font-weight: 300;
    }
    .logo{
        font-family: 'Lobster Two', cursive;
        color: white;
    }
    .logo:hover{
        outline: none;
        text-decoration: none;
        color: #c43f3f;
    }
    .row-outer{
        height: 100vh;
    }
    .col-left{
        background-image: linear-gradient(to bottom, rgba(0,0,0,0.4),rgba(0,0,0,0.6)), url("https://www.eatthis.com/wp-content/uploads/sites/4/2020/05/eating-at-restaurant.jpg?quality=82&strip=1");
        background-size: cover;
    }
    .col-right{
        background-color: #fcfcfc;
    }
    .col-left .container{
        margin-top: 40%;
        transform: translateY(-40%);
    }
    .form-group > label{
        font-family: 'Quicksand', sans-serif;
        font-size: 14px;
        font-weight: 500;
        color: #1a1b1c;
    }
    .form-control{
        border-radius: 25px;
    }
    .form-control::placeholder{
        color: #cacbcc;
        font-family: 'Quicksand', sans-serif;
        font-weight: 300;
        font-size: 13px;
    }
    form a{
        color: #65668a;
        font-size: 12px;
    }
    form a:hover{
        color: #d9534f;
    }
    form input[type="submit"]{
        border-radius: 20px;
        padding: 8px 50px;
        font-size: 14px;
        font-weight: 400;
    }
    .col-right-left{
        /*top left - bottom right - top right - bottom left */
        border-radius: 17px 0 0 17px;
        background-color: #c9302a;
    }
    .col-right-right{
        border-radius: 0 17px 17px 0;
    }
    .col-right a{
        text-decoration: none;
        font-size: 14px;
        color: #1a1b1c;
    }
    .col-right a:hover{
        color: #d9534f;
    }
    .col-right .row{
        width: 30vh;
    }
    .form-check-label{
        font-size: 14px;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row row-outer">
            <div class="col col-left">
                <br>
                <a class="logo h3 px-3" href="../index.php">Eatin.</a>
                <div class="container text-white text-center">
                    <h2 class="mb-4 h1">Hi, This is <span class="logo">Eatin.</span></h2>
                    <p class="lead mb-2">Let's make your account</p>
                    <p class="lead">and get your seat faster...</p>
                </div>
            </div>
            <div class="col col-right px-5">
                <div class="row mt-4 mb-5 ml-auto text-center mr-3">
                    <div class="col col-right-left py-1 shadow">
                        <a href="#" class="text-white">Sign up</a>
                    </div>
                    <div class="col col-right-right py-1 btn-danger shadow">
                        <a href="login_screen.php" class="text-white">Sign in</a>
                    </div>
                </div>
                <form class="" action="../models/register.php" method="POST">
                    <div class="form-group mb-4">
                        <label for="fullname" class="mb-3">NAMA LENGKAP</label>
                        <input type="text" class="form-control shadow-sm py-4 pl-4 border-0"" name="fullname" placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-group mb-4">
                        <label for="username" class="mb-3">USERNAME</label>
                        <input type="text" class="form-control shadow-sm py-4 pl-4 border-0"" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="mb-3">E-MAIL</label>
                        <input type="email" class="form-control shadow-sm py-4 pl-4 border-0"" aria-describedby="emailHelp" name="email" placeholder="Masukkan email">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="mb-3">PASSWORD</label>
                        <input type="password" class="form-control shadow-sm py-4 pl-4 border-0" name="password" placeholder="Masukkan password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Saya menyetujui Syarat dan Ketentuan</label>
                    </div>
                    <input type="submit" name="register" class="btn bg-danger shadow text-white mt-4" value="Sign Up">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
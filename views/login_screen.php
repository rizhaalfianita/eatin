<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        background-image: linear-gradient(to bottom,rgba(0,0,0,0.4),rgba(0,0,0,0.6)), url("https://cdn.kaum.com/wp-content/uploads/2018/12/KAUMJAK11396-web.jpg");
        background-size: cover;
    }
    .col-right{
        background-color: #fcfcfc;
    }
    .col-right form{
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
    form input[type=submit]{
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
    .col-left .container{
        margin-top: 42%;
        transform: translateY(-42%);
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row row-outer">
            <div class="col col-left">
                <br>
                <a class="logo h3 px-3" href="../index.php">Eatin.</a>
                <div class="container text-center text-white">
                    <h2 class="py-2 text-title h1">Welcome back!</h2>
                    <p class="lead">Please login first to enjoy our services.</p>
                </div>
            </div>
            <div class="col col-right px-5">
                <div class="row mt-4 mb-5 ml-auto text-center mr-3">
                    <div class="col col-right-left py-1 sign-in shadow">
                        <a href="#" class="text-white">Sign in</a>
                    </div>
                    <div class="col col-right-right py-1 sign-up btn-danger shadow">
                        <a href="register_screen.php" class="text-white">Sign up</a>
                    </div>
                </div>
                <form class="pt-4" action="../models/login.php" onSubmit="return validation()" method="POST">
                    <div class="form-group mb-4">
                        <label for="username" class="mb-3">USERNAME</label>
                        <input type="text" class="form-control shadow-sm py-4 pl-4 border-0" name="username" id="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="mb-3">PASSWORD</label>
                        <input type="password" class="form-control shadow-sm py-4 pl-4 border-0" name="password" id="password" placeholder="Masukkan password">
                    </div>
                    <input type="submit" name="login" class="btn bg-danger shadow text-white mt-4" value="Sign In">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function validation() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username or password cannot be empty!');
			return false;
		}
	}
</script>
</html>
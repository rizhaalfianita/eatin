<?php 
include 'connection.php';

session_start();
if(isset($_SESSION['username'])){
	header("location:../views/dashboard/home.php");
}
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query_login = "SELECT * FROM tb_customers WHERE username='$username' AND pass='$password'";
	$cek = $koneksi->query($query_login);
	if(mysqli_num_rows($cek) == 1){
		$row = mysqli_fetch_assoc($cek);
		$_SESSION['username'] = $row['username'];
		header("location:../views/dashboard/home.php");
	}	
	else{
		header("location:../views/login_screen.php");	
	}
}
?>
<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$pass = "";
	$userDB = "login_db";

	$url = "../index.php";
	$conn = mysqli_connect($host, $user, $pass, $userDB);
	$_SESSION['userEmail'] = $_POST['emailAd'];
	$_SESSION['userPass'] = $_POST['userPass'];
	$_SESSION['userName'] = $_POST['userName'];

	$result = mysqli_query($conn, "INSERT INTO login_table (user_name, user_email, user_pass) VALUES('{$_SESSION['userName']}', '{$_SESSION['userEmail']}', '{$_SESSION['userPass']}');");
	if($result){
		echo '<script>alert("Registration Success!");</script>';
		echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
		exit();
	}

	
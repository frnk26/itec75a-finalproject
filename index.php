<?php 
	session_start();
	$host = "localhost";
	$user = "root";
	$pass = "";
	$userDB = "login_db";


	$conn = mysqli_connect($host, $user, $pass, $userDB);
	if(isset($_POST['submit'])){
		$_SESSION['userEmail'] = $_POST['emailAd'];
		$_SESSION['userPass'] = $_POST['userPass'];

		$sql = "SELECT * FROM login_table WHERE user_email = '".$_SESSION['userEmail']."' AND user_pass='".$_SESSION['userPass']."' limit 1";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			header("Location: backend(loginsignup)/index1.php");
			exit();
		}else{ 
			echo '<script type="text/javascript">';
			echo 'alert("You Entered Wrong Email and Password")';		
			echo '</script>';	
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./backend(loginsignup)/index1.php">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Login Page</title>

	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body{
			background: #eee;
		}

		.row{
			border-radius: 30px;
		}

		img{
			border-top-left-radius: 30px;
			border-bottom-left-radius: 30px;
			width: 350px;
		}

	</style>
</head>
<body>
	<section class="form">
		<div class="container">
			<div class="row bg-white no-gutters m-5">
				<div class="img col-lg-5">
					<img src="./assets/plant1.jpg" class="img-fluid">
				</div>
				<div class="col-lg-7 my-3">
					<h1 class="display-4 font-weight-bold py-4">Login</h1>
					<h3>Sign into your account</h3>
					<form action="index.php" method="POST">
						<div class="form-row">
							<div class="col-lg-7">
								<input type="email" class="form-control my-3 p-4" required="" name="emailAd" placeholder="Enter Email">
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<input type="password" class="form-control my-3 p-4" required="" name="userPass" placeholder="Enter Password">
							</div>
						</div>
						<div class="form-row">
							<div class="col-lg-7">
								<button class="btn btn-success w-100 my-3" name="submit">Login</button>
							</div>
						</div>

						<p class="my-3">Don't have an account? <a href="./backend(loginsignup)/index2.php">Register here</a></p>
					</form>
				</div>
			</div>
		</div>
	</section>



	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
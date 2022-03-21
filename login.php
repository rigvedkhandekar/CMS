<?php

include 'connection.php';

session_start ();

session_destroy ();


if (isset ($_POST['signin']))
{
	$login_flag='';
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);

	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

	

	$result = mysqli_query ($connection, $query);

	$count = mysqli_num_rows ($result);

	if ($count > 0)
	{

		session_start ();
		
		$_SESSION['login']=true;
		$_SESSION['user']=$email;

		$login_flag = 1;

	}

	else
	{

		$login_flag = 0;



	}
}

?>

















































<!DOCTYPE html>
<html lang="en">
<head>
	<title>Principal Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<form action="login.php" method="POST">
	<div class="limiter">
		<div class="container-login100">

		
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						Department Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button name="signin" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<?php

					if (isset ($login_flag) && $login_flag==0)
					{
						
					?>

										<div class="text-center p-t-45 p-b-4">
											<p class="txt1" style="font-size:14px; color:red;">
												Invalid username or password
											</p>
										</div>
										<?php



					}

					else if (isset ($login_flag) && $login_flag==1)
					{
						
							?>

										<div class="text-center p-t-45 p-b-4">
											<p class="txt1" style="font-size:14px; color:green;">
												Login Successful. Redirecting to dashboard in 3 Seconds...
											</p>
										</div>
										
										<?php

								header( "refresh:2;url=index.php" );



					}



						?>

					<!-- <div class="p-t-35 text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="signup.php" class="txt2 hov1">
							Sign up
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	</form>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
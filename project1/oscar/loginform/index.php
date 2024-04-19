<?php

session_start();
// $_SESSION['username'] = '';
// $_SESSION['password'] = '';

include('../includes/conn.php');

$values = array('username'=> '', 'password'=> '');

$errors = array('username'=>'', 'password'=>'');

$notexist = "";

if(isset($_POST['access'])){
    $values = array('username'=> $_POST['username'], 'password'=> $_POST['password']);
    $username = $values['username'];
	$adminusername = $_POST['username'];

    $password = $values['password'];
    // $password = password_hash($values['password'], PASSWORD_DEFAULT);

	if(empty($_POST['username'])){
        $errors['username'] = "Username field is empty";
    }

    if(empty($_POST['password'])){
        $errors['password'] = 'password field empty';
    }

    if(array_filter($errors)){
		// $notexist = "Not An Admin";
		// $backgroundcolor = "red";
    }else{
		// verifying the password provided
		$sql = "SELECT * FROM admin WHERE username = '$adminusername'";
		$query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($query);
		$passwordresult = $result['passwordd'] ?? 'Not a password in the database';
		

		$err = "not a user";
		$passwordd = password_verify($password, $passwordresult);	
		if($passwordd){
			// checking if username and password exist in the database
			if(mysqli_num_rows($query) === 1){
				header('location: ../adminpanel.php');
				$_SESSION['username'] = $username;
			}
			
		}else{	
			if(!empty($result)){
				$notexist = "Wrong  Password value Data";
				$backgroundcolor = "red";
			}else{
				$notexist = "Not A Registered AdminUser";
				$backgroundcolor = "red";
			}
		}
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>CodingTech Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../editor/html/popular/metaimages/images/CTlogo2.png"/>
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

<style>
	h3{
        text-align: center;
        margin-top: 5px;
        padding: 10px 100px;
        border-radius: 50px;
    }
</style>

<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" autocomplete="off" action="index.php" method="POST">
					<h3 class="m-b-20" style="background-color: <?php echo htmlspecialchars($backgroundcolor) ?> "><?php echo htmlspecialchars($notexist) ?></h3>
					<span class="login100-form-title p-b-53">
						Sign In With
					</span>

					<a href="#" class="btn-face m-b-20">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-20">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
                    <div class="error p-t-13 p-b-9" style="color: red;"><?php echo htmlspecialchars($errors['username']) ?></div>
					
                    <div>.</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
                    <div class="error text-danger p-t-13 p-b-9" style="color: red;"><?php echo htmlspecialchars($errors['password']) ?></div>

                    <div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

						<a href="#" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>

					<div class="container-login100-form-btn m-t-17">
                        <input class="login100-form-btn" type="submit" name="access" value="submit" >
						<!-- <button class="login100-form-btn">
							Sign In
						</button> -->
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

						<a href="#" class="txt2 bo1">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
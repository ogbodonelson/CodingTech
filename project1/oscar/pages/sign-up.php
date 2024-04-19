<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!-- php code -->
<?php

session_start();

// database connection
include('../includes/conn.php');

$registermessage = 'Register User';
  $success = '';

  $values = array('username'=> '', 'email'=> '', 'password'=> '', 'confirmpassword'=> '');
  $errors = array('usernameerror'=>'', 'emailerror'=>'', 'passworderror'=>'', 'imageerror'=>'');

  if(isset($_POST['submit'])){
    
    $values = array('username'=> $_POST['username'], 'email'=> $_POST['email'], 'password'=> $_POST['password'], 'confirmpassword'=> $_POST['confirmpassword']);
    $adminusername = $_POST['username'];
    // echo $adminusername;
    $sql = "SELECT * FROM admin WHERE username = '$adminusername'";
		$query = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($query);
    // print_r($result['username']);
		// $passwordresult = $result['passwordd'] ?? 'Not a password in the database';
    if(!empty($result)){
      // $notexist = "Wrong  Password value Data";
      // $backgroundcolor = "red";
      // echo "user dey";
      echo "<script>
        alert('User Already Exists');
      </script>";
    }else{
      // $notexist = "Not A Registered AdminUser";
      // $backgroundcolor = "red";
      echo "user no dey";
      if(!empty($values['username'])){
        if(preg_match('/^[a-zA-Z]+$/', $values['username'])){
        }
      }else{
        $errors['usernameerror'] = 'username field is empty';
      }
    
      if(!empty($values['email'])){
        if(filter_var($values['email'], FILTER_VALIDATE_EMAIL)){
        }
      }else{
        $errors['emailerror'] = 'email field is empty';
      }
    
      if(!empty($values['password'])){
        // password regex
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $values['password'])) {
          $errors['passworderror'] = "Minimum eight characters, at least one letter, one number and one special character";
        }
        // confirm password match
        if(!$values['password'] == $values['confirmpassword']){
          $errors['passworderror'] = 'password does not correspond';
        }
      }else{
        $errors['passworderror'] = 'password field is empty';
      }
    
      // final confirmation before redirect
      if(array_filter($errors)){
        $success = 'FAILED';
      }else{
        // for images
        // $newimagename = $newimagename;
        if($_FILES["image"]["error"] === 4){
          $errors['imageerror'] = 'Image Does Not Exist';
        }else{
          $imagename = $_FILES["image"]["name"];
          $imagesize = $_FILES["image"]["size"];
          $tempname = $_FILES["image"]["tmp_name"];
  
          $validimageestension = ['jpg', 'jpeg', 'png'];
          $imageextension = explode('.', $imagename);
          $imageextension = strtolower(end($validimageestension));
  
          if(!in_array($imageextension, $validimageestension)){
            echo "<script>alert('Invalid')</script>";
          }else{
            $newimagename = uniqid();
            $newimagename = sha1(microtime()) . '.' .  $imageextension;
  
            move_uploaded_file($tempname, getcwd() . "./adminimages/" . $newimagename);
          }
  
          // if image is not real
          if($tempname == false) {
            echo "<script>alert('File Is Not An Image')</script>";
          } 
        }
  
        // header('location: adminpanel.html');
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $password = mysqli_real_escape_string($conn, password_hash($values['password'], PASSWORD_DEFAULT));
        $admin = mysqli_real_escape_string($conn, $_POST['admin']);
  
        $sql = "INSERT INTO admin(username, passwordd, email, adminn, Adminimage) VALUES('$username', '$password', '$email', '$admin', '$newimagename')";
  
        $query = mysqli_query($conn, $sql);
        
        if($query){
          echo 'added successfully';
          // header('location: ./dashboard.php');
        }
      }
    }
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href=".././editor/html/popular/metaimages/images/CTLogo2">
  <title>
    CodingTech SignUp
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.php">
              Material Dashboard 2
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li>
                  <h3><?php echo 'Hello ' . htmlspecialchars($_SESSION['username']); ?></h3>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <h2 class="text-danger"><?php echo htmlspecialchars($success)?></h2>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('./adminimages/girlanddog.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter Users Info To Register</p>
                </div>
                <div class="card-body">
                  <form role="form" autocomplete="off" action="sign-up.php" method="POST" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control" name="username">
                    </div>
                    <p class='error text-danger'><?php echo htmlspecialchars( $errors['usernameerror']) ?></p>
                    <!-- email -->
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                    <p class='error text-danger'><?php echo htmlspecialchars($errors['emailerror']) ?></p>
                    <!-- password -->
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <!-- confirm password -->
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Confirm Password</label>
                      <input type="password" class="form-control" name="confirmpassword">
                    </div>
                    <p class='error text-danger'><?php echo htmlspecialchars($errors['passworderror']) ?></p>
                    <!-- image -->
                    <div class="mt-3">
                      <label class="form-label">Choose An Image</label>
                      <input type="file" class="" name="image" accept=".jpg, .jpeg, .png, .webp">
                    </div>
                    <p class='error text-danger mt-1'><?php echo htmlspecialchars($errors['imageerror']) ?></p>
                    
                    <div class="input-group input-group-outline mb-3">
                      <input type="hidden" class="form-control" name="admin" value="Admin">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <input type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit" value="Submit">
                      <!-- <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button> -->
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="../loginform/index.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>
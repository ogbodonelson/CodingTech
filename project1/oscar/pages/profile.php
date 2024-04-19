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

if($conn){
    $Author = $_SESSION['username'];
    $userpicture = $_SESSION['userimage'] ?? '';
    $userimage = "";

    $sql = "SELECT * FROM drafts";
    $query = mysqli_query($conn, $sql);
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);

    // for the admin image
    if(mysqli_num_rows($query) >= 1){
        $sql = "SELECT * FROM admin WHERE username = '$Author'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        $userimage = $result['Adminimage'];
        
        $_SESSION['userimage'] = $userimage;
    }else{
        // echo "No Draft";
    }

    // function for  updating the admin data
    function updateadmininfo($regex, $newuserdata, $dbcolumn, $adminuser){
        include('../includes/conn.php');
        $Author = $_SESSION['username'];
        if(!empty($newuserdata)){
            if($regex){
                $Newdata = $newuserdata;
                $sqll = "SELECT * FROM admin WHERE $dbcolumn = '$Newdata'";
                $queryy = mysqli_query($conn, $sqll);
                $resultt = mysqli_fetch_assoc($queryy);
                if(empty($resultt)){
                    $sql = "UPDATE admin SET $dbcolumn = '$Newdata' WHERE $adminuser = '$Author' ";
                    $query = mysqli_query($conn, $sql);
                    if($query){
                      header('location: ../editor/html/popular/metaimages/title.php');
                    }else{
                        echo 'failed to update name';
                    }
                }else{
                    echo 'Name already exists';
                }
            }
          }else{
            echo 'username field is empty';
        }
    }

    // updating the admin data
    if(isset($_POST['updateusername'])){
        updateadmininfo(preg_match('/^[a-zA-Z]+$/', $_POST['newusername']),mysqli_real_escape_string($conn, $_POST['newusername']), 'username', 'username');
    }
    if(isset($_POST['updatepassword'])){
        updateadmininfo(preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $_POST['newpassword']), password_hash($_POST['newpassword'], PASSWORD_DEFAULT), 'passwordd', 'username');
        // echo 'you have given to me all that i have';
    }
    if(isset($_POST['updateemail'])){
        updateadmininfo(filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL), mysqli_real_escape_string($conn,  $_POST['newemail']), 'email', 'username');
        // echo 'you can never imagine hoe this looks'. $_POST['newemail'];    
    }
    if(isset($_POST['updateadminimage'])){
        // echo 'this is the submit button for image click';
        $Newimage = $_FILES["newadminimage"]["name"];
        $tempname = $_FILES["newadminimage"]["tmp_name"];

        if($Newimage !=''){
            if(!file_exists("./adminimages/".$Newimage)){
                $validimageestension = ['jpg', 'jpeg', 'png'];
                $imageextension = explode('.', $Newimage);
                $imageextension = strtolower(end($validimageestension));
                if(!in_array($imageextension, $validimageestension)){
                    echo "<script>alert('Invalid')</script>";
                }else{
                  $Oldimage = $userimage;
                    $newimagename = uniqid();
                    $newimagename = sha1(microtime()) . '.' .  $imageextension;
                    move_uploaded_file($tempname, getcwd() . "./adminimages/" . $newimagename);
                    $sql = "UPDATE admin SET Adminimage = '$newimagename' WHERE username = '$Author' ";
                    $query = mysqli_query($conn, $sql);
                    if($query){
                      unlink("./adminimages/".$Oldimage);
                    }
                    header('location: ../editor/html/popular/metaimages/title.php');
                }
            }else{
                echo 'this image already exist';
            }
        }
    }


    // all posts published by admin in the profile page
      $initialsql = "SELECT * FROM publish WHERE Author = '$Author'";
      $initialquery = mysqli_query($conn, $initialsql);
      $Totalnumrows = mysqli_num_rows($initialquery);
      $perpage = 4;
      $maximumpagenum = ceil($Totalnumrows/$perpage);

      // calculating admins total blogs published
      $Totalpublished = mysqli_fetch_all($initialquery, MYSQLI_ASSOC);
      // shuffle($Totalpublished);
      if(mysqli_num_rows($initialquery) > 0){
        $Totalcount = count($Totalpublished);
      }

    
      if(isset($_GET['page'])){
        $page = $_GET['page'];
      }else{
        $page = 1;
      }
    
      $startnumber = ($page - 1)*$perpage;

      // $pcategory = $_POST['Category'];
      $psql = "SELECT * FROM publish WHERE Author = '$Author' ORDER BY id DESC LIMIT $startnumber, $perpage";
      $pquery = mysqli_query($conn, $psql);
      $resultss = mysqli_fetch_all($pquery, MYSQLI_ASSOC);

      // date function
      function datefunction($rawdbdate){
        $timestamp = $rawdbdate;
        $datetime = explode(" ",$timestamp);
        $date = $datetime[0];
        $time = $datetime[1];
        $dateformat = date('F-jS-Y', strtotime($date)); 
        $dateexplode = explode("-",$dateformat);
        $realdate = $dateexplode[0].' '.$dateexplode[1].', '.$dateexplode[2];
        echo htmlspecialchars($realdate);
      }
    
      if(empty($resultss[0])){
        $itemonedisplay = 'none';
      }
      if(empty($resultss[1])){
        $itemtwodisplay = 'none';
      }
      if(empty($resultss[2])){
        $itemthreedisplay = 'none';
      }
      if(empty($resultss[3])){
        $itemfourdisplay = 'none';
      }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('../pincludes/pheader.php') ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?php echo htmlspecialchars($Author) ?></span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="./adminimages/<?php echo htmlspecialchars($userimage) ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo htmlspecialchars($result['username']) ?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                Blogger/Creator
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">email</i>
                    <span class="ms-1">Messages</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Platform Settings</h6>
                </div>
                <div class="card-body p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <!-- <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked> -->
                        <input class="form-control" id="disabledInput" type="text" placeholder="Admin Panel Url" disabled>
                        <!-- text-truncate -->
                        <label class="form-check-label text-body ms-3 w-80 mb-0" for="flexSwitchCheckDefault">http://localhost:3000/project1/oscar/loginform/index.php</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <!-- <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1"> -->
                        <input class="form-control" id="disabledInput" type="text" placeholder="Home Page" disabled>
                        <label class="form-check-label text-body ms-3 w-80 mb-0" for="flexSwitchCheckDefault1">http://localhost:3000/project1/oscar/editor/html/popular/Home/</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                    <div class="form-check form-switch ps-0">
                        <!-- <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1"> -->
                        <input class="form-control" id="disabledInput" type="text" placeholder="Supa" disabled>
                        <label class="form-check-label text-body ms-3 w-80 mb-0" for="flexSwitchCheckDefault1">http://localhost:3000/project1/oscar/includes/header.php</label>
                      </div>
                    </li>
                  </ul>
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">New launches and projects</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Monthly product updates</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0 pb-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    Hi, I’m <?php echo htmlspecialchars($Author)?>, a passionate blogger and content creator with a knack for creating engaging and informative content across various platforms. As a content creator, i am skilled in various mediums including written content, photography, and videography. I am constantly exploring new ways to tell stories and connect with my audience, always pushing the boundaries of creativity and innovation.
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Username:</strong> &nbsp; <?php echo htmlspecialchars($result['username']) ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Password:</strong> &nbsp; <?php echo htmlspecialchars($result['passwordd']) ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo htmlspecialchars($result['email']) ?></li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Update</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <!-- <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div> -->
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Username</h6>
                        <p class="mb-0 text-xs">
                            <form action="profile.php" method='POST' id="updateusername">
                                <input type="text" name="newusername">
                            </form>
                        </p>
                      </div>
                      <button form='updateusername' name='updateusername' class="updateusername btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" type='submit'>Submit</button>
                      <!-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a> -->
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <!-- <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div> -->
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Password</h6>
                        <p class="mb-0 text-xs">
                            <form action="profile.php" method='POST' id="updatepassword">
                                <input type="text" name="newpassword">
                            </form>
                        </p>
                      </div>
                      <button form='updatepassword' name='updatepassword' class="updatpassword btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" type='submit'>Submit</button>
                      <!-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a> -->
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <!-- <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div> -->
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Email</h6>
                        <p class="mb-0 text-xs">
                            <form action="profile.php" method='POST' id="updateemail">
                                <input type="email" name="newemail">
                            </form>
                        </p>
                      </div>
                      <button form='updateemail' name='updateemail' class="updateemail btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" type='submit'>Submit</button>
                      <!-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a> -->
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <!-- <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div> -->
                      <div class="input-group d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Admin Image</h6>
                        <p class="mb-0 text-xs">
                            <form action="profile.php" method='POST' enctype="multipart/form-data" id='updateadminimage'>
                                <input type="file" name="newadminimage" id="newadminimage">
                            </form>
                        </p>
                        <button form='updateadminimage' name='updateadminimage' id='updateadminimage' class="btn btn-link pe-3 ps-0 mb-0 w-25 w-md-auto" href="javascript:;" type='submit'>Submit</button>
                      </div>
                      <!-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a> -->
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="mb-5 ps-3">
                <h6 class="mb-1">Your Published Blogs</h6>
                <p class="text-sm">Total Blogs : <?php echo htmlspecialchars($Totalcount) ?></p>
              </div>
              <div class="row">
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" style="display:<?php echo htmlspecialchars($itemonedisplay) ?>">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl" href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[0]['ID']) ?>">
                        <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[0]['Metaimage']) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm"><?php datefunction($resultss[0]['Date']) ?></p>
                      <a href="javascript:;">
                        <h5>
                        <?php echo htmlspecialchars($resultss[0]['Category'])?>
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        <?php echo htmlspecialchars($resultss[0]['Title']) ?>
                      </p>
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[0]['ID']) ?>">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Blog</button>
                        </a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" style="display:<?php echo $itemtwodisplay ?>">
                  <div class="card card-blog card-plain">
                  <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl" href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[1]['ID']) ?>">
                      <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[1]['Metaimage']) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm"><?php datefunction($resultss[1]['Date']) ?></p>
                      <a href="javascript:;">
                        <h5>
                        <?php echo htmlspecialchars($resultss[1]['Category'])?>
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        <?php echo htmlspecialchars($resultss[1]['Title']) ?>
                      </p>
                      <div class="d-flex align-items-center justify-content-between">
                      <a href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[1]['ID']) ?>">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Blog</button>
                        </a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" style="display:<?php echo $itemthreedisplay ?>">
                  <div class="card card-blog card-plain">
                  <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl" href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[2]['ID']) ?>">
                      <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[2]['Metaimage']) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm"><?php datefunction($resultss[2]['Date']) ?></p>
                      <a href="javascript:;">
                        <h5>
                        <?php echo htmlspecialchars($resultss[2]['Category'])?>
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        <?php echo htmlspecialchars($resultss[2]['Title']) ?>
                      </p>
                      <div class="d-flex align-items-center justify-content-between">
                      <a href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[2]['ID']) ?>">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Blog</button>
                        </a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4" style="display:<?php echo $itemfourdisplay ?>">
                  <div class="card card-blog card-plain">
                  <div class="card-header p-0 mt-n4 mx-3">
                      <a class="d-block shadow-xl border-radius-xl" href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[3]['ID']) ?>">
                      <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[3]['Metaimage']) ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm"><?php datefunction($resultss[3]['Date']) ?></p>
                      <a href="javascript:;">
                        <h5>
                        <?php echo htmlspecialchars($resultss[3]['Category'])?>
                        </h5>
                      </a>
                      <p class="mb-4 text-sm">
                        <?php echo htmlspecialchars($resultss[3]['Title']) ?>
                      </p>
                      <div class="d-flex align-items-center justify-content-between">
                      <a href="../.././oscar/editor/html/popular/blogdetails.php?id=<?php echo htmlspecialchars($resultss[3]['ID']) ?>">
                        <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Blog</button>
                        </a>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                            <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                            <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                            <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                            <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script>
              All rights reserved | <a href="../editor/html/popular/Home/">Coding Tech</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <!-- <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a> -->
                <button type="button" style="background-color: #9FA8DA;" class=" text-uppercase fs-5 fw-bolder"><?php echo '<a href="profile.php?page=' . htmlspecialchars(($page - 1)) .'" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 px-5">Previous</a> '; ?></button>
              </li>
              <li class="nav-item">
                <!-- <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank"> </a>-->
                <button type="button" style="background-color: #9FA8DA;" class=" text-uppercase fs-5 fw-bolder"><?php echo '<a href="profile.php?page=' . htmlspecialchars(($page + 1)) .'" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 px-5">Next</a> '; ?></button>
              </li>
              <!-- <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
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
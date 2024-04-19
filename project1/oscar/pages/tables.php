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
<?php session_start(); ?>
<?php include('../pincludes/pheader.php') ?>
<?php
include('../includes/conn.php');

$Author = $_SESSION['username'];
$userpicture = $_SESSION['userimage'] ?? '';
$userimage = "";

$sql = "SELECT * FROM drafts";
$query = mysqli_query($conn, $sql);
$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
// print_r($result);

// for the admin image
if(mysqli_num_rows($query) >= 1){
  $sql = "SELECT * FROM admin WHERE username = '$Author'";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($query);
  $userimage = $result['Adminimage'];
  // echo  $_SESSION['userimage'];
  $_SESSION['userimage'] = $userimage;
}else{
  // echo "No Draft";
}

if(isset($_POST['delete'])){
  // echo 'this is my own personal id of';
  $sql = "DELETE FROM drafts WHERE Author = '$Author' ";
  $query = mysqli_query($conn, $sql);
  // $style = 'none';
}

if(isset($_POST['dremo'])){
  echo 'this is so much more better for me';
}

// if(isset($_POST['deletefromallposts'])){
  // $idfordeletion = $_GET["deletefromallposts"];
//   // echo 'this is so much more better for me' . $idfordeletion;
  // $sql = "DELETE FROM publish WHERE id = $idfordeletion ";
  // $query = mysqli_query($conn, $sql);
//   // $style = 'none';
// }else if(!(isset($_POST['deletefromallposts']))){
  // $pcategory =  $randomcategory[$randomnumber];
  // echo 'this is so much more better for me';
// }

// for All Posts Pagination
if($conn){
  $initialsql = "SELECT * FROM publish WHERE Category = 'Programming'";
	$initialquery = mysqli_query($conn, $initialsql);
  $Totalnumrows = mysqli_num_rows($initialquery);
	$perpage = 6;
	$maximumpagenum = ceil($Totalnumrows/$perpage);

  if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	$startnumber = ($page - 1)*$perpage;

  // getting random categories for when $pcategory is not selected
  // $randomcategory = array("Programming","AI","Computers","Engineering");
  // $randomnumber = rand(1,2);
  if(empty($_GET['categoryy'])){
    $categoryy = '';
  }else{
    $categoryy = $_GET['categoryy'];
     $psql = "SELECT * FROM publish WHERE Category = '$categoryy' ORDER BY id DESC LIMIT $startnumber, $perpage";
	  $pquery = mysqli_query($conn, $psql);
	  $resultss = mysqli_fetch_all($pquery, MYSQLI_ASSOC);
  }
  // searchcategory
  // if form is been submitted
  // if(isset($_POST['searchcategory'])){
  //   $pcategory = $_POST['Category'];
    // $_SESSION['searchcategory'] = $pcategory;
    // echo $pcategory;
    // $psql = "SELECT * FROM publish WHERE Category = '$pcategory' ORDER BY id DESC LIMIT $startnumber, $perpage";
	  // $pquery = mysqli_query($conn, $psql);
	  // $resultss = mysqli_fetch_all($pquery, MYSQLI_ASSOC);
    // print_r($resultss);
    // echo "Programming","AI","Computers","Engineering";
  // }
  // else if(!(isset($_POST['fd']))){
  //   $pcategory =  $randomcategory[$randomnumber];
  //   $psql = "SELECT * FROM publish WHERE Category = 'Computers' ORDER BY id DESC LIMIT $startnumber, $perpage";
	//   $pquery = mysqli_query($conn, $psql);
	//   $resultss = mysqli_fetch_all($pquery, MYSQLI_ASSOC);
  // }
  
  // function for ensuring that when a row data is empty, it just goes blank or return null instead of errors
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
  if(empty($resultss[4])){
		$itemfivedisplay = 'none';
	}
  if(empty($resultss[5])){
		$itemsixdisplay = 'none';
    // echo 'i am empty';
	}
  
    
  
}

  

?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include('../pincludes/pnav.php') ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Authors table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <!-- Getting each blogs in draft -->
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Publish</th>
                    </tr>
                  </thead>
                  <?php foreach($results as $result): ?>
                    <tbody style="cursor: pointer;" class="eachblog">
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                            <!-- glorilla -->
                            <img src="../editor/html/popular/metaimages/images/<?php echo htmlspecialchars($result['Metaimage']) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($result['Author']) ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">
                          <?php echo htmlspecialchars($result['Title']) ?>
                          </p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-success">Online</span>
                      </td>
                      <td class="align-middle text-center">
                        <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                        <a href="../editor/html/popular/publish.php?table=drafts&id=<?php echo htmlspecialchars($result['ID']) ?>">
                        <span class="badge badge-sm bg-gradient-success">Publish</span>
                        </a>
                      </td>
                      <td class="align-middle text-center">
                        <a href="../editor/html/popular/editblog.php?table=drafts&id=<?php echo htmlspecialchars($result['ID']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                        </a>
                      </td>
                      <td class="align-middle text-center">
                        <form action="tables.php" method="POST">
                        <button type="button" class="delete" name="delete" value="=<?php echo htmlspecialchars($result['ID']) ?>"><span class="badge badge-sm bg-gradient-danger">
                        </span>Delete</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>  
                </table>
              </div> 
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">ALL Posts</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Edit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Post-Title</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr style="display:<?php echo htmlspecialchars($itemonedisplay) ?>">
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[0]['Metaimage']) ?>" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($resultss[0]['Author'])?></h6>
                          </div>
                        </div>
                      </td>
                      <!-- All post edit -->
                      <td>
                        <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                        <a href="../editor/html/popular/editblog.php?table=publish&id=<?php echo htmlspecialchars($resultss[0]['ID']);?>">
                        <span class="badge badge-sm bg-gradient-success">Edit</span>
                        </a>
                      </td>
                      <td>
                        <?php echo htmlspecialchars($resultss[0]['Category'])?>
                      </td>
                      <td class="align-middle text-center">
                        <div class="">
                          <span class="me-2 text-xs font-weight-bold"><?php echo htmlspecialchars($resultss[0]['Title'])?></span>
                        </div>
                      </td>
                    </tr>
                    <tr style="display:<?php echo htmlspecialchars($itemtwodisplay) ?>">
                        <td>
                          <div class="d-flex px-2">
                            <div>
                              <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[1]['Metaimage']) ?>" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                            </div>
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($resultss[1]['Author'])?></h6>
                            </div>
                          </div>
                        </td>
                        <!-- All post edit -->
                        <td>
                          <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                          <a href="../editor/html/popular/editblog.php?table=publish&id=<?php echo htmlspecialchars($resultss[1]['ID']) ?>">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                          </a>
                        </td>
                        <td>
                          <?php echo htmlspecialchars($resultss[1]['Category'])?>
                        </td>
                        <td class="align-middle text-center">
                          <div class="">
                            <span class="me-2 text-xs font-weight-bold"><?php echo htmlspecialchars($resultss[1]['Title'])?></span>
                          </div>
                        </td>
                    </tr>
                    <tr style="display:<?php echo htmlspecialchars($itemthreedisplay) ?>">
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[2]['Metaimage']) ?>"class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($resultss[2]['Author'])?></h6>
                          </div>
                        </div>
                      </td>
                      <!-- All post edit -->
                      <td>
                          <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                          <a href="../editor/html/popular/editblog.php?table=publish&id=<?php echo htmlspecialchars($resultss[2]['ID']) ?>">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                          </a>
                      </td>
                      <td>
                      <?php echo htmlspecialchars($resultss[2]['Category'])?>
                      </td>
                      <td class="align-middle text-center">
                        <div class="">
                          <span class="me-2 text-xs font-weight-bold"><?php echo htmlspecialchars($resultss[2]['Title'])?></span>
                        </div>
                      </td>
                    </tr>
                    <tr style="display:<?php echo htmlspecialchars($itemfourdisplay) ?>">
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[3]['Metaimage']) ?>"class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($resultss[3]['Author'])?></h6>
                          </div>
                        </div>
                      </td>
                      <!-- All post edit -->
                      <td>
                          <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                          <a href="../editor/html/popular/editblog.php?table=publish&id=<?php echo htmlspecialchars($resultss[3]['ID']) ?>">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                          </a>
                        </td>
                      <td>
                      <?php echo htmlspecialchars($resultss[3]['Category'])?>
                      </td>
                      <td class="align-middle text-center">
                        <div class="">
                          <span class="me-2 text-xs font-weight-bold"><?php echo htmlspecialchars($resultss[3]['Title'])?></span>
                        </div>
                      </td>
                    </tr>
                    <tr style="display:<?php echo htmlspecialchars($itemfivedisplay) ?>">
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[4]['Metaimage']) ?>" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($resultss[4]['Author'])?></h6>
                          </div>
                        </div>
                      </td>
                        <!-- All post edit -->
                        <td>
                          <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                          <a href="../editor/html/popular/editblog.php?table=publish&id=<?php echo htmlspecialchars($resultss[4]['ID']) ?>">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                          </a>
                        </td>
                      <td>
                      <?php echo htmlspecialchars($resultss[4]['Category'])?>
                      </td>
                      <td class="align-middle text-center">
                        <div class="">
                          <span class="me-2 text-xs font-weight-bold"><?php echo htmlspecialchars($resultss[4]['Title'])?></span>
                        </div>
                      </td>
                    </tr>
                    <tr style="display:<?php echo htmlspecialchars($itemsixdisplay) ?>">
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="../.././oscar/editor/html/popular/metaimages/images/<?php echo htmlspecialchars($resultss[5]['Metaimage']) ?>" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($resultss[5]['Author'])?></h6>
                          </div>
                        </div>
                      </td>
                        <!-- All post edit -->
                        <td>
                          <!-- <a href="./publish.php?id=<?php echo htmlspecialchars($result['ID']) ?>"> -->
                          <a href="../editor/html/popular/editblog.php?table=publish&id=<?php echo htmlspecialchars($resultss[5]['ID']) ?>">
                          <span class="badge badge-sm bg-gradient-success">Edit</span>
                          </a>
                        </td>
                      <td>
                      <?php echo htmlspecialchars($resultss[5]['Category'])?>
                      </td>
                      <td class="align-middle text-center">
                        <div class="">
                          <span class="me-2 text-xs font-weight-bold"><?php echo htmlspecialchars($resultss[5]['Title'])?></span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                Copyright © <script>
                  document.write(new Date().getFullYear())
                </script>
                All rights reserved | <a href="../editor/html/popular/Home/">Coding Tech</a>
              </div>
          </div>
            </div>
            <!-- choose a -->
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <button type="button" style="background-color: #9FA8DA;" class=" text-uppercase fs-5 fw-bolder"><?php echo '<a href="tables.php?categoryy=' . htmlspecialchars(($categoryy)) .'&page=' . htmlspecialchars(($page - 1)) .'" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 px-5">Previous</a> '; ?></button> 
                  <!-- <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a> -->
                </li>
                <li class="nav-item" style="margin-left: 1%;">
                  <button type="button" style="background-color: #9FA8DA;" class=" text-uppercase fs-5 fw-bolder"><?php echo '<a href="tables.php?categoryy=' . htmlspecialchars(($categoryy)) .'&page=' . htmlspecialchars(($page + 1)) .'" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 px-5 pagi-active">Next</a> '; ?></button>
                  <!-- <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a> -->
                </li>
                <li class="nav-item" style="margin-top: 2%;">
                <span class="categories_dropdown">
                  <form action="tables.php" id="Searchcategories" method="POST">
                    <label for="Category">Choose a category:</label>
                    <select name="Category" id="Categoryy">
                      <option value="AI">AI/Robotics</option>
                      <option value="Programming">Programming</option>s
                      <option value="Computers">Computers</option>
                      <option value="Engineering">Engineering</option>
                    </select>
                    <button name="searchcategory" id="Submit" type="submit" style="background-color: #9FA8DA;" class="search text-uppercase px-3 fs-5 fw-bolder" style="background-color: 'blue'"><?php echo 'Search' ?></button>
                  </form>
                </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
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
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
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

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src=".././deletenotice.js"></script>
  <script src="./searchcategory.js"></script>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>

</html>
<!-- database connection -->
<?php

// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');
include('../../../../includes/conn.php');
$categories = ['Programming', 'AI', 'Computers', 'Engineering',];
if($conn){
	// New post for programming
	$sql = "SELECT * FROM publish WHERE Category = '$categories[0]' ORDER BY id DESC LIMIT 4";
	$query = mysqli_query($conn, $sql);
	$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
	// $a = shuffle($results);
	// print_r($a);
	if(mysqli_num_rows($query) > 0){
		// print_r($results);
	}
	
	// older post for programming
	$sql1 = "SELECT * FROM publish WHERE Category = '$categories[0]' ORDER BY id ASC LIMIT 4";
	$query1 = mysqli_query($conn, $sql1);
	$results1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results1);
	}
	
	// programming random result
	$prandomsql = "SELECT * FROM publish WHERE Category = '$categories[0]' ORDER BY id DESC";
	$prandomquery = mysqli_query($conn, $prandomsql);
	$prandomresults = mysqli_fetch_all($prandomquery, MYSQLI_ASSOC);
	shuffle($prandomresults);
	// print_r($prandomresults);
	if(mysqli_num_rows($prandomquery) > 0){
		$pcount = count($prandomresults);
	}

	// New post for Computers
	$sql2 = "SELECT * FROM publish WHERE Category = '$categories[2]' ORDER BY id DESC LIMIT 4";
	$query2 = mysqli_query($conn, $sql2);
	$results2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results);
	}

	// older post for Computers
	$sql3 = "SELECT * FROM publish WHERE Category = '$categories[1]' ORDER BY id ASC LIMIT 4";
	$query3 = mysqli_query($conn, $sql3);
	$results3 = mysqli_fetch_all($query3, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results1);
	}

	// Computers random result
	$crandomsql = "SELECT * FROM publish WHERE Category = '$categories[2]' ORDER BY id DESC";
	$crandomquery = mysqli_query($conn, $crandomsql);
	$crandomresults = mysqli_fetch_all($crandomquery, MYSQLI_ASSOC);
	shuffle($crandomresults);
	// print_r($crandomresults);
	if(mysqli_num_rows($query) > 0){
		$ccount = count($crandomresults);
	}

	// New post for AI
	$sql4 = "SELECT * FROM publish WHERE Category = '$categories[1]' ORDER BY id DESC LIMIT 4";
	$query4 = mysqli_query($conn, $sql4);
	$results4 = mysqli_fetch_all($query4, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results);
	}

	// older post for AI
	$sql5 = "SELECT * FROM publish WHERE Category = '$categories[1]' ORDER BY id ASC LIMIT 4";
	$query5 = mysqli_query($conn, $sql5);
	$results5 = mysqli_fetch_all($query5, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results5);
	}

	// AI random result
	$airandomsql = "SELECT * FROM publish WHERE Category = '$categories[1]' ORDER BY id DESC";
	$airandomquery = mysqli_query($conn, $airandomsql);
	$airandomresults = mysqli_fetch_all($airandomquery, MYSQLI_ASSOC);
	shuffle($airandomresults);
	// print_r($airandomresults);
	if(mysqli_num_rows($query) > 0){
		// print_r($results);
		$aicount = count($airandomresults);
	}

	// New post for Engineering
	$sql6 = "SELECT * FROM publish WHERE Category = '$categories[3]' ORDER BY id DESC LIMIT 4";
	$query6 = mysqli_query($conn, $sql6);
	$results6 = mysqli_fetch_all($query6, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results);
	}

	// older post for Engineering
	$sql7 = "SELECT * FROM publish WHERE Category = '$categories[3]' ORDER BY id ASC LIMIT 4";
	$query7 = mysqli_query($conn, $sql7);
	$results7 = mysqli_fetch_all($query7, MYSQLI_ASSOC);
	if(mysqli_num_rows($query) > 0){
		// print_r($results7);
	}

	// Engineering random result
	$erandomsql = "SELECT * FROM publish WHERE Category = '$categories[3]' ORDER BY id DESC";
	$erandomquery = mysqli_query($conn, $erandomsql);
	$erandomresults = mysqli_fetch_all($erandomquery, MYSQLI_ASSOC);
	shuffle($erandomresults);
	// print_r($erandomresults);
	if(mysqli_num_rows($query) > 0){
		// print_r($results);
		$ecount = count($erandomresults);
	}

	// for viewing a particular blog
	$sql = "SELECT * FROM publish";
	$query = mysqli_query($conn, $sql);
	$details = mysqli_fetch_all($query, MYSQLI_ASSOC);
	
	// for the date
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
}else{
	echo 'connection not successful';
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>CodingTech</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.png"/> -->
	<link rel="icon" type="image/png" href="../metaimages/images/CTlogo2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar container h-100">
					<div class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="images/icons/icon-night.png" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

						<a href=".././Aboutus/About/" class="left-topbar-item">
							About
						</a>

						<a href=".././Aboutus/About/" class="left-topbar-item">
							Contact Us
						</a>
					</div>

					<div class="right-topbar">
						<a href="https://www.facebook.com/profile.php?id=100093544205050&mibextid=ZbWKwL">
							<span class="fab fa-facebook-f"></span>
						</a>

						<a href="https://x.com/OgbodoN45608?t=2uvY9Nv-qaWsNnjoKM0K8Q&s=08">
							<span class="fab fa-twitter"></span>
						</a>

						<a href="https://pin.it/uER5MJ2YH">
							<span class="fab fa-pinterest-p"></span>
						</a>

						<a href="https://youtube.com/@codingchess">
							<span class="fab fa-youtube"></span>
						</a>
					</div>
				</div>
			</div>

			<!-- Header Mobile -->
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->		
				<div class="logo-mobile">
					<a href="index.html"><img src="../metaimages/images/CTlogo2.png" alt="IMG-LOGO"></a>
				</div>

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="topbar-mobile">
					<li class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="images/icons/icon-night.png" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>
					</li>

					<li class="left-topbar">
						<a href=".././Aboutus/About/" class="left-topbar-item">
							About
						</a>

						<a href=".././Aboutus/About/" class="left-topbar-item">
							Contact
						</a>

						<!-- <a href="#" class="left-topbar-item">
							Sing up
						</a>

						<a href="#" class="left-topbar-item">
							Log in
						</a> -->
					</li>

					<li class="right-topbar">
						<a href="#">
							<span class="fab fa-facebook-f"></span>
						</a>

						<a href="#">
							<span class="fab fa-twitter"></span>
						</a>

						<a href="#">
							<span class="fab fa-pinterest-p"></span>
						</a>

						<a href="#">
							<span class="fab fa-vimeo-v"></span>
						</a>

						<a href="#">
							<span class="fab fa-youtube"></span>
						</a>
					</li>
				</ul>

				<ul class="main-menu-m">
					<!-- <li>
						<a href="index.html">sap</a>
						<ul class="sub-menu-m">
							<li><a href="index.html">Homepage v1</a></li>
							<li><a href="home-02.html">Homepage v2</a></li>
							<li><a href="home-03.html">Homepage v3</a></li>
						</ul>

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li> -->

					<li>
						<a href="eachcategory.php?category=Programming">Programming</a>
					</li>

					<li>
						<a href="eachcategory.php?category=AI">AI/Robotics</a>
					</li>

					<li>
						<a href="eachcategory.php?category=Computers">Computers</a>
					</li>

					<li>
						<a href="eachcategory.php?category=Engineering">Engineering</a>
					</li>

					<!-- <li>
						<a href="category-01.html">Life Style</a>
					</li>

					<li>
						<a href="category-02.html">Video</a>
					</li> -->

					<li>
						<a href="../Aboutus/About/">Others</a>
						<ul class="sub-menu-m">
							<li><a href="../Aboutus/About/">About Us</a></li>
							<li><a href="../Aboutus/About/">Contact Us</a></li>
						</ul>

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>
				</ul>
			</div>
			
			<!--  -->
			<div class="wrap-logo container">
				<!-- Logo desktop -->		
				<div class="logo">
					<a href="index.html"><img src="../metaimages/images/CTlogo1.png" alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<div class="banner-header">
					<!-- <a href="https://themewagon.com/themes/free-bootstrap-4-html5-news-website-template-magnews2/"><img src="images/banner-01.jpg" alt="IMG"></a> -->
				</div>
			</div>	
			
			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="index.php">
							<!-- <img src="images/icons/logo-01.png" alt="LOGO"> -->
							<img src="../metaimages/images/CTlogo2.png" alt="LOGO">
						</a>

						<ul class="main-menu">
							

							<li class="mega-menu-item">
								<!-- programming -->
								<a href="#">Programming</a>

								<div class="sub-mega-menu">
									<div class="nav flex-column nav-pills" role="tablist">
										<a class="nav-link active" data-toggle="pill" href="#news-0" role="tab">All</a>
										<a class="nav-link" data-toggle="pill" href="#news-1" role="tab">Trending</a>
										<!-- <a class="nav-link" data-toggle="pill" href="#news-2" role="tab">Computers</a>
										<a class="nav-link" data-toggle="pill" href="#news-3" role="tab">Life Style</a>
										<a class="nav-link" data-toggle="pill" href="#news-4" role="tab">Technology</a>
										<a class="nav-link" data-toggle="pill" href="#news-5" role="tab">Travel</a> -->
									</div>

									<div class="tab-content">
										<div class="tab-pane show active" id="news-0" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[0]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[1]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[2]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[3]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="news-1" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[4]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[5]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[6]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[7]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($prandomresults[7]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($prandomresults[7]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

							<!-- Robotics -->
							<li class="mega-menu-item">
								<a href="#">AI/Robotics </a>

								<div class="sub-mega-menu">
									<div class="nav flex-column nav-pills" role="tablist">
										<a class="nav-link active" data-toggle="pill" href="#enter-1" role="tab">All</a>
										<a class="nav-link" data-toggle="pill" href="#enter-2" role="tab">Trending</a>
									</div>

									<div class="tab-content">
										<div class="tab-pane show active" id="enter-1" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[0]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[1]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[2]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[3]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="enter-2" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[4]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[5]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[6]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[7]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[7]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($airandomresults[7]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

							<li class="mega-menu-item">
								<a href="#">Computers</a>

								<div class="sub-mega-menu">
									<div class="nav flex-column nav-pills" role="tablist">
										<a class="nav-link active" data-toggle="pill" href="#business-1" role="tab">All</a>
										<a class="nav-link" data-toggle="pill" href="#business-2" role="tab">Trending</a>
									</div>

									<div class="tab-content">
										<div class="tab-pane show active" id="business-1" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo $crandomresults[0]['Metaimage'] ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[0]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[1]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[2]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[3]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="business-2" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[4]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[5]['Date'])) ?? '' ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[6]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>
<!-- zazu -->
												<div class="col-3" style="<?php htmlspecialchars($itemonedisplay) ?>">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID'])?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($crandomresults[7]['Metaimage'])?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID'])?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[7]['Title'])?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID'])?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[7]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

							<li class="mega-menu-item">
								<a href="#">Engineering</a>

								<div class="sub-mega-menu">
									<div class="nav flex-column nav-pills" role="tablist">
										<a class="nav-link active" data-toggle="pill" href="#travel-1" role="tab">All</a>
										<a class="nav-link" data-toggle="pill" href="#travel-2" role="tab">Trending</a>
									</div>

									<div class="tab-content">
										<div class="tab-pane show active" id="travel-1" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[0]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[1]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[2]['Date'])) ?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[3]['Date']))?>2
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="travel-2" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[4]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[5]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[6]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[7]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[7]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[7]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[7]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Trending
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[7]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

							<!-- Features -->
							<li>
								<a href="#">Others</a>
								<ul class="sub-menu">
									<li><a href=".././Aboutus/About/">About Us</a></li>
									<li><a href=".././Aboutus/About/">Contact Us</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>	
		</div>
	</header>

	<!-- Headline -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8">
					Trending Now:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Programming Languages
					</span>
					
					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Artificial Intelligence
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Web And App Development
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Engineering
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Computers
					</span>

					<span class="dis-inline-block slide100-txt-item animated visible-false">
						Robotics
					</span>
				</span>
			</div>

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
		</div>
	</div>
		
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(.././metaimages/images/<?php echo htmlspecialchars($results3[2]['Metaimage']) ?>);">
						<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[2]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[2]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
							<?php echo htmlspecialchars($results3[2]['Category']) ?>
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[2]['ID']) ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
								<?php echo htmlspecialchars($results3[2]['Title']) ?>
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									Popular
								</span>

								<!-- <span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									Feb 16
								</span> -->
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-12 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(.././metaimages/images/<?php echo htmlspecialchars($airandomresults[5]['Metaimage']) ?>);">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-24">
									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
									<?php echo htmlspecialchars($airandomresults[5]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($airandomresults[5]['Title']) ?>
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(.././metaimages/images/<?php echo htmlspecialchars($crandomresults[3]['Metaimage']) ?>);">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="dis-block how1-child1 	trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
										<?php echo htmlspecialchars($crandomresults[3]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($crandomresults[3]['Title']) ?>
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(.././metaimages/images/<?php echo htmlspecialchars($results[0]['Metaimage']) ?>);">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
									<?php echo htmlspecialchars($results[0]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($results[0]['Title']) ?>
										</a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">
						<!-- Entertainment -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl12 tab01-title">
									Programming
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">New</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-2" role="tab">Older</a>
									</li>

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-3" role="tab">Older</a>
									</li> -->

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-4" role="tab">Music</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab1-5" role="tab">Games</a>
									</li> -->

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href=".././viewall.php?category=Programming" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								
							<!-- Tab panes -->
							<div class="programming tab-content p-t-35">
								<!-- programming -->
								<!-- - -->
								<!-- start foreach -->
									<div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
										<div class="row">
											<div class="col-sm-6 p-r-25 p-r-15-sr991">
												<!-- Item post -->	
												<div class="m-b-30">
													<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($results[0]['Metaimage']) ?>" alt="IMG">
													</a>

													<div class="p-t-20">
														<h5 class="p-b-5">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
																<?php echo htmlspecialchars($results[0]['Title']) ?> 
															</a>
														</h5>

														<span class="cl8">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
																New
															</a>

															<span class="f1-s-3 m-rl-3">
																-
															</span>

															<span class="f1-s-3">
															<?php echo htmlspecialchars(datefunction($results[0]['Date'])) ?>
															</span>
														</span>
													</div>
												</div>
											</div>

											<div class="col-sm-6 p-r-25 p-r-15-sr991">
												<!-- Item post -->	
												<div class="flex-wr-sb-s m-b-30">
													<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($results[1]['Metaimage']) ?>" alt="IMG">
													</a>

													<div class="size-w-2">
														<h5 class="p-b-5">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo htmlspecialchars($results[1]['Title']) ?> 
															</a>
														</h5>

														<span class="cl8">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																New
															</a>

															<span class="f1-s-3 m-rl-3">
																-
															</span>

															<span class="f1-s-3">
															<?php echo htmlspecialchars(datefunction($results[1]['Date'])) ?>
															</span>
														</span>
													</div>
												</div>
												
												<!-- Item post -->
												<div class="flex-wr-sb-s m-b-30">
													<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($results[2]['Metaimage']) ?>" alt="IMG">
													</a>

													<div class="size-w-2">
														<h5 class="p-b-5">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo htmlspecialchars($results[2]['Title']) ?>
															</a>
														</h5>

														<span class="cl8">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																New
															</a>

															<span class="f1-s-3 m-rl-3">
																-
															</span>

															<span class="f1-s-3">
															<?php echo htmlspecialchars(datefunction($results[2]['Date'])) ?>
															</span>
														</span>
													</div>
												</div>

												<!-- Item post -->
												<div class="flex-wr-sb-s m-b-30">
													<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
														<img src=".././metaimages/images/<?php echo htmlspecialchars($results[3]['Metaimage']) ?>" alt="IMG">
													</a>

													<div class="size-w-2">
														<h5 class="p-b-5">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($results[3]['Title']) ?>
															</a>
														</h5>

														<span class="cl8">
															<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																New
															</a>

															<span class="f1-s-3 m-rl-3">
																-
															</span>

															<span class="f1-s-3">
															<?php echo htmlspecialchars(datefunction($results[3]['Date'])) ?>
															</span>
														</span>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								<!-- endforeach -->

								<!-- - -->
								<div class="tab-pane fade" id="tab1-2" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results1[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results1[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results1[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results1[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results1[1]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results1[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results1[2]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results1[2]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results1[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results1[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results1[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results1[3]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Game
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results1[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab1-3" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<!-- computers -->
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															American live music lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results2[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-07.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Celebrity
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-06.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-05.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Game
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab1-4" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-06.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															American live music lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-09.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Celebrity
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-07.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-08.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Game
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab1-5" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-07.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															American live music lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-08.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Celebrity
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-06.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-09.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Game
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Business -->
						<!-- Robotics -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl13 tab01-title">
									AI/Robotics
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab2-1" role="tab">New</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab2-2" role="tab">Older</a>
									</li>

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab2-3" role="tab">Money & Markets</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">Small Business</a>
									</li> -->

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href=".././viewall.php?category=AI" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results4[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results4[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results4[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results4[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results4[1]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results4[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results4[2]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results4[2]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results4[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results4[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results4[3]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results4[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab2-2" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results5[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results5[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results5[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results5[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results5[1]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results5[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results5[2]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results5[2]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results5[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results5[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results5[3]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results5[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results5[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab2-3" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-11.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															Bitcoin lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Finance
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-12.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Small Business
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-13.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Economy
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-10.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Money & Markets
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab2-4" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-12.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															Bitcoin lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Finance
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-13.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Small Business
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-10.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Economy
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-11.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Money & Markets
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Travel -->
						<!-- Computers -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl14 tab01-title">
									Computers
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab3-1" role="tab">New</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-2" role="tab">Older</a>
										</li>

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-3" role="tab">Flight</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-4" role="tab">Beachs</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-5" role="tab">Culture</a>
									</li> -->

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href=".././viewall.php?category=Computers" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results2[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results2[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo htmlspecialchars($results2[1]['Title']) ?> 
															</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results2[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[2]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results2[2]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results2[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results2[3]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results2[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-2" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results3[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results3[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results3[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results3[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results3[1]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results3[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results3[2]['Metaimage']) ?>" alt="IMG">
												</a>
												<div class="size-w-2">

													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results3[2]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results3[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results3[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo htmlspecialchars($results3[3]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results3[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results3[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-3" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-16.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															You wish lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Hotels
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-17.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Beachs
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-18.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Flight
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-14.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Culture
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-4" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-17.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															You wish lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Hotels
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-18.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Beachs
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-14.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Flight
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-15.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Culture
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-5" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-18.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															You wish lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Hotels
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-17.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Beachs
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-16.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Flight
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-15.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Culture
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Travel -->
						<!-- Engineering -->
						<div class="tab01 p-b-20">
							<div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
								<!-- Brand tab -->
								<h3 class="f1-m-2 cl14 tab01-title">
									Engineering
								</h3>

								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#tab4-1" role="tab">New</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab4-2" role="tab">Older</a>
										</li>

									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-3" role="tab">Flight</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-4" role="tab">Beachs</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#tab3-5" role="tab">Culture</a>
									</li> -->

									<li class="nav-item-more dropdown dis-none">
										<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
											<i class="fa fa-ellipsis-h"></i>
										</a>

										<ul class="dropdown-menu">
											
										</ul>
									</li>
								</ul>

								<!--  -->
								<a href=".././viewall.php?category=Engineering" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
									View all
									<i class="fs-12 m-l-5 fa fa-caret-right"></i>
								</a>
							</div>
								

							<!-- Tab panes -->
							<div class="tab-content p-t-35">
								<!-- - -->
								<div class="tab-pane fade show active" id="tab4-1" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results6[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results6[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results6[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results6[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo htmlspecialchars($results6[1]['Title']) ?> 
															</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results6[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results6[2]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results6[2]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results6[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results6[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results6[3]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results6[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															New
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results6[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab4-2" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results7[0]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results7[0]['Title']) ?> 
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results7[0]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[1]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results7[1]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results7[1]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results7[1]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[2]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results7[2]['Metaimage']) ?>" alt="IMG">
												</a>
												<div class="size-w-2">

													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
														<?php echo htmlspecialchars($results7[2]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results7[2]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[3]['ID']) ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
												<img src=".././metaimages/images/<?php echo htmlspecialchars($results7[3]['Metaimage']) ?>" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
															<?php echo htmlspecialchars($results7[3]['Title']) ?>
														</a>
													</h5>

													<span class="cl8">
														<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
															Older
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
														<?php echo htmlspecialchars(datefunction($results7[3]['Date'])) ?>
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-3" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results7[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-16.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															You wish lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Hotels
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-17.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Beachs
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-18.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Flight
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-14.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Culture
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-4" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-17.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															You wish lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Hotels
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-18.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Beachs
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-14.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Flight
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-15.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Culture
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- - -->
								<div class="tab-pane fade" id="tab3-5" role="tabpanel">
									<div class="row">
										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="m-b-30">
												<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
													<img src="images/post-18.jpg" alt="IMG">
												</a>

												<div class="p-t-20">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
															You wish lorem ipsum dolor sit amet consectetur 
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Hotels
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
												</div>
											</div>
										</div>

										<div class="col-sm-6 p-r-25 p-r-15-sr991">
											<!-- Item post -->	
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-17.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Beachs
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 17
														</span>
													</span>
												</div>
											</div>
											
											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-16.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Flight
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 16
														</span>
													</span>
												</div>
											</div>

											<!-- Item post -->
											<div class="flex-wr-sb-s m-b-30">
												<a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
													<img src="images/post-15.jpg" alt="IMG">
												</a>

												<div class="size-w-2">
													<h5 class="p-b-5">
														<a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
															Donec metus orci, malesuada et lectus vitae
														</a>
													</h5>

													<span class="cl8">
														<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
															Culture
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 12
														</span>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!--  -->
						<div>
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Most Popular
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										1
									</div>

									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[8]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo htmlspecialchars($airandomresults[8]['Title']) ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										2
									</div>

									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo htmlspecialchars($prandomresults[5]['Title']) ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										3
									</div>

									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo htmlspecialchars($crandomresults[6]['Title']) ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										4
									</div>

									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[6]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo htmlspecialchars($erandomresults[6]['Title']) ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0">
										5
									</div>

									<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo htmlspecialchars($airandomresults[4]['Title']) ?>
									</a>
								</li>
							</ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-t-8">
							<a href="#">
								<!-- <img class="max-w-full" src="images/banner-02.jpg" alt="IMG"> -->
								<img class="max-w-full" src="../metaimages/images/Metaverseimage.png" alt="IMG">
							</a>
						</div>
						
						<!--  -->
						<div class="p-t-50">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Stay Connected
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-c p-b-20">
									<a href="https://www.facebook.com/profile.php?id=100093544205050&mibextid=ZbWKwL" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
										<span class="fab fa-facebook-f"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											20k + Fans
										</span>

										<a href="https://www.facebook.com/profile.php?id=100093544205050&mibextid=ZbWKwL" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Like
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="https://pin.it/uER5MJ2YH" class="size-a-8 flex-c-c borad-3 size-a-8 bg-pinterest fs-16 cl0 hov-cl0">
										<span class="fab fa-pinterest"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5k + Followers
										</span>

										<a href="https://pin.it/uER5MJ2YH" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Follow
										</a>
									</div>
								</li>

								<li class="flex-wr-sb-c p-b-20">
									<a href="https://youtube.com/@codingchess" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
										<span class="fab fa-youtube"></span>
									</a>

									<div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											3K + Subscribers
										</span>

										<a href="https://youtube.com/@codingchess" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
											Subscribe
										</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Banner -->
	<div class="container">
		<div class="flex-c-c">
			<!-- <a href="#">
				<img class="max-w-full" src="images/banner-01.jpg" alt="IMG">
			</a> -->
		</div>
	</div>

	<!-- Latest -->
	<section class="bg0 p-t-60 p-b-35">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-20">
					<div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-2 cl3 tab01-title">
							Latest Articles
						</h3>
					</div>

					<div class="row p-t-35">
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
								<img src=".././metaimages/images/<?php echo htmlspecialchars($results4[2]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[2]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results4[2]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[2]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
										<?php echo htmlspecialchars($results4[2]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results4[2]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
								<img src=".././metaimages/images/<?php echo htmlspecialchars($results4[3]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[3]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results4[3]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results4[3]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
										<?php echo htmlspecialchars($results4[3]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results4[3]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
								<img src=".././metaimages/images/<?php echo htmlspecialchars($results[0]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[0]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[0]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results[0]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
								<img src=".././metaimages/images/<?php echo htmlspecialchars($results[1]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[1]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[1]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results[1]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[3]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[3]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results2[3]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[3]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results2[3]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results2[3]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item latest -->	
							<div class="m-b-45">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
								<img src=".././metaimages/images/<?php echo htmlspecialchars($results2[1]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[1]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results2[1]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($results2[1]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results2[1]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results2[1]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-10 col-lg-4">
					<div class="p-l-10 p-rl-0-sr991 p-b-20">
						<!-- Video -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-35">
								<h3 class="f1-m-2 cl3 tab01-title">
									Featured Video
								</h3>
							</div>

							<div>
								<div class="wrap-pic-w pos-relative">
									<img src=".././metaimages/images/CT blog image.png" alt="IMG">

									<button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">
										<span class="fab fa-youtube"></span>
									</button>
								</div>

								<div class="p-tb-16 p-rl-25 bg3">
									<h5 class="p-b-5">
										<a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
											Connect With Us Here 
										</a>
									</h5>

									<span class="cl15">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											Shaping The Future
										</a>
<!-- 
										<span class="f1-s-3 m-rl-3">
											-
										</span> -->

										<!-- <span class="f1-s-3">
											Feb 18
										</span> -->
									</span>
								</div>
							</div>	
						</div>
							
						<!-- Subscribe -->
						<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
							<h5 class="f1-m-5 cl0 p-b-10">
								Subscribe
							</h5>

							<p class="f1-s-1 cl0 p-b-25">
								Get all latest content delivered to your email a few times a month.
							</p>

							<form class="size-a-9 pos-relative">
								<input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="Email">

								<button class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
									<i class="fa fa-arrow-right"></i>
								</button>
							</form>
						</div>
						
						<!-- Tag -->
						<div class="p-b-55">
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Fashion
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Denim
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Crafts
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Magazine
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									News
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Blogs
								</a>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer>
		<div class="bg2 p-t-40 p-b-25">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<a href="index.html">
								<img class="max-s-full" src="../metaimages/images/CTlogo3.png" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="f1-s-1 cl11 p-b-16">
								Coding Tech is all about pushing the boundaries of innovation and creating solutions that shape the future.
							</p>

							<!-- <p class="f1-s-1 cl11 p-b-16">
								Any questions? Call us on (+1) 96 716 6879
							</p> -->

							<div class="p-t-15">
								<a href="https://www.facebook.com/profile.php?id=100093544205050&mibextid=ZbWKwL" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-facebook-f"></span>
								</a>

								<a href="https://x.com/OgbodoN45608?t=2uvY9Nv-qaWsNnjoKM0K8Q&s=08" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-twitter"></span>
								</a>

								<a href="https://pin.it/uER5MJ2YH" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-pinterest-p"></span>
								</a>

								<!-- <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-vimeo-v"></span>
								</a> -->

								<a href="https://youtube.com/@codingchess" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
									<span class="fab fa-youtube"></span>
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Popular Posts
							</h5>
						</div>

						<ul>
							<li class="flex-wr-sb-s p-b-20">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[7]['ID']) ?>" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src=".././metaimages/images/<?php echo htmlspecialchars($erandomresults[7]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[7]['ID']) ?>" class="f1-s-5 cl11 hov-cl10 trans-03">
										<?php echo htmlspecialchars($erandomresults[7]['Title']) ?>
										</a>
									</h6>

									<span class="f1-s-3 cl6">
									<?php echo htmlspecialchars(datefunction($erandomresults[7]['Date'])) ?>
									</span>
								</div>
							</li>

							<li class="flex-wr-sb-s p-b-20">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[9]['ID']) ?>" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src=".././metaimages/images/<?php echo htmlspecialchars($prandomresults[9]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[9]['ID']) ?>" class="f1-s-5 cl11 hov-cl10 trans-03">
										<?php echo htmlspecialchars($prandomresults[9]['Title']) ?>
										</a>
									</h6>

									<span class="f1-s-3 cl6">
									<?php echo htmlspecialchars(datefunction($prandomresults[9]['Date'])) ?>
									</span>
								</div>
							</li>

							<li class="flex-wr-sb-s p-b-20">
								<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[9]['ID']) ?>" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src=".././metaimages/images/<?php echo htmlspecialchars($airandomresults[9]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="../blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[9]['ID']) ?>" class="f1-s-5 cl11 hov-cl10 trans-03">
										<?php echo htmlspecialchars($airandomresults[9]['Title']) ?>
										</a>
									</h6>

									<span class="f1-s-3 cl6">
									<?php echo htmlspecialchars(datefunction($airandomresults[9]['Date'])) ?>
									</span>
								</div>
							</li>
						</ul>
					</div>

					<div class="col-sm-6 col-lg-4 p-b-20">
						<div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Category
							</h5>
						</div>

						<ul class="m-t--12">
							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Programming (<?php echo htmlspecialchars($pcount); ?>)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									AI/Robotics (<?php echo htmlspecialchars($aicount); ?>)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Computers (<?php echo htmlspecialchars($ccount); ?>)
								</a>
							</li>

							<li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									Engineering (<?php echo htmlspecialchars($ecount); ?>)
								</a>
							</li>

							<!-- <li class="how-bor1 p-rl-5 p-tb-10">
								<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
									DIY & Crafts (16)
								</a>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="bg11">
			<div class="container size-h-4 flex-c-c p-tb-15">
				<span class="f1-s-1 cl0 txt-center">
					<a href="#" class="f1-s-1 cl10 hov-link1"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Coding Tech
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</span>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<span class="fas fa-angle-up"></span>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="video-mo-01">
					<!-- <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe> -->
					<iframe src="https://m.youtube.com/watch?v=TjqEBn_Yfyo&si=iAh7Qk3tS4j03wSH" allowfullscreen></iframe>
					<!-- <video width="320" height="240" controls>
						<source src=".././metaimages/videos/Codingtech Blog Video.mp4" type="video/mp4">
						Your browser does not support the video tag.
					</video> -->
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
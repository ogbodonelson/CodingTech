<?php

include('../../../includes/conn.php');
// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');

if($conn){
	
	// $category = $_GET['category'];
	$ymalcategory = '';
	// For getting a particular ID
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // echo $id;
    if($_GET['id']){
        $sql = "SELECT * FROM publish WHERE id = $id";
        $query = mysqli_query($conn, $sql);
        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
		// echo $ymalcategory;
		// print_r($results);

		switch ($results[0]['Category']) {
			default:
			  echo "No Associated Category Found";
			  break;
			case 'Programming':
			  	$ymalcategory = 'Programming';
			  break;
			case 'AI':
			  	$ymalcategory = 'AI';
				break;
			case 'Computers':
			  	$ymalcategory = 'Computers';
			  break;
			case 'Engineering':
			  	$ymalcategory = 'Engineering';
		  }
        
		  // programming random result
		$ymalrandomsql = "SELECT * FROM publish WHERE Category = '$ymalcategory' ";
		$ymalrandomquery = mysqli_query($conn, $ymalrandomsql);
		$ymalrandomresults = mysqli_fetch_all($ymalrandomquery, MYSQLI_ASSOC);
		shuffle($ymalrandomresults);
		// print_r($ymalrandomresults);
		if(mysqli_num_rows($ymalrandomquery) > 0){
			// $pcount = count($ymalrandomresults);
		}
    }

	$categories = ['Programming', 'AI', 'Computers', 'Engineering',];
	
	// programming random result
	$prandomsql = "SELECT * FROM publish WHERE Category = '$categories[0]' ORDER BY id DESC";
	$prandomquery = mysqli_query($conn, $prandomsql);
	$prandomresults = mysqli_fetch_all($prandomquery, MYSQLI_ASSOC);
	shuffle($prandomresults);
	// print_r($prandomresults);
	if(mysqli_num_rows($prandomquery) > 0){
		$pcount = count($prandomresults);
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

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CodingTech Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="Home/images/icons/favicon.png"/> -->
	<link rel="icon" type="image/png" href="./metaimages/images/CTlogo2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Home/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Home/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Home/css/util.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Home/css/main.css">
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

							<img class="m-b-1 m-rl-8" src="./Home/images/icons/icon-night.png" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

						<a href="./Home/" class="left-topbar-item">
							Home
						</a>

						<a href="./Aboutus/About/" class="left-topbar-item">
							Contact
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
					<a href="index.html"><img src="./metaimages/images/CTlogo2.png" alt="IMG-LOGO"></a>
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

							<img class="m-b-1 m-rl-8" src="Home/images/icons/icon-night.png" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>
					</li>

					<li class="left-topbar">
						<a href="./Aboutus/About/" class="left-topbar-item">
							About
						</a>

						<a href="./Aboutus/About/" class="left-topbar-item">
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
					</li>
				</ul>

				<ul class="main-menu-m">
					<!-- <li>
						<a href="index.html">Home</a>
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
						<a href="Home/eachcategory.php?category=Programming">Programming</a>
					</li>

					<li>
						<a href="Home/eachcategory.php?category=AI">AI/Robotics</a>
					</li>

					<li>
						<a href="Home/eachcategory.php?category=Computers">Computers</a>
					</li>

					<li>
						<a href="Home/eachcategory.php?category=Engineering">Engineering</a>
					</li>

					<!-- <li>
						<a href="category-01.html">Life Style</a>
					</li>

					<li>
						<a href="category-02.html">Video</a>
					</li> -->

					<li>
						<a href="#">Others</a>
						<ul class="sub-menu-m">
							<li><a href="./Aboutus/About/">About Us</a></li>
							<li><a href="./Aboutus/About/">Contact Us</a></li>
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
					<!-- <a href="index.png"><img src="./metaimages/images/codingtechlogo1.png" alt="LOGO"></a> -->
					<a href="index.png"><img src="./metaimages/images/CTlogo1.png" alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<div class="banner-header">
					<!-- <a href="#"><img src="./metaimages/images/cc.png" alt="IMG"></a> -->
				</div>
			</div>	
			
			<!-- dropdown movable -->
			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="index.html">
							<img src="./metaimages/images/CTlogo1.png" alt="LOGO">
						</a>

						<ul class="main-menu">

							<li class="mega-menu-item">
								<a href="#">Programming</a>

								<div class="sub-mega-menu">
									<div class="nav flex-column nav-pills" role="tablist">
										<a class="nav-link active" data-toggle="pill" href="#news-0" role="tab">All</a>
										<a class="nav-link" data-toggle="pill" href="#news-1" role="tab">Trending</a>
										<!-- <a class="nav-link" data-toggle="pill" href="#news-2" role="tab">Fashion</a>
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="metaimages/images/<?php echo htmlspecialchars($prandomresults[7]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																	<?php echo htmlspecialchars($prandomresults[7]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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

										<div class="tab-pane" id="news-2" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-21.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 18
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-24.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 15
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-22.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 12
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-23.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 20
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="news-3" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-25.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 18
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-27.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 20
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-26.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 12
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-34.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 15
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="news-4" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-35.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 18
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-36.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 12
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-37.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 20
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-38.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 15
																</span>
															</span>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="tab-pane" id="news-5" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-39.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 18
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-41.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 20
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-42.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 15
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-40.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
							</li>

							<li class="mega-menu-item">
								<a href="#">AI/Robotics</a>

								<div class="sub-mega-menu">
									<div class="nav flex-column nav-pills" role="tablist">
										<a class="nav-link active" data-toggle="pill" href="#enter-1" role="tab">All</a>
										<a class="nav-link" data-toggle="pill" href="#enter-2" role="tab">Trending</a>
										<!-- <a class="nav-link" data-toggle="pill" href="#enter-3" role="tab">Celebrity</a> -->
									</div>

									<div class="tab-content">
										<div class="tab-pane show active" id="enter-1" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[7]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($airandomresults[7]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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

										<div class="tab-pane" id="enter-3" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-39.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Feb 18
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-41.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 20
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-42.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
																	Jan 15
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
															<img src="images/post-40.jpg" alt="IMG">
														</a>

														<div class="p-t-10">
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
							</li>

							<li class="mega-menu-item">
								<a href="#">Computers</a>

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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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

										<div class="tab-pane" id="travel-2" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[4]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[4]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[4]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[4]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[5]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[5]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[5]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[5]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[5]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[6]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[6]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
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

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[7]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($crandomresults[7]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($crandomresults[7]['Date']))?>
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($erandomresults[0]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[0]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[0]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($erandomresults[1]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[1]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($erandomresults[2]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[2]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[2]['Date']))?>
																</span>
															</span>
														</div>
													</div>
												</div>

												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
														<img src="./metaimages/images/<?php echo htmlspecialchars($erandomresults[3]['Metaimage']) ?>" alt="IMG">
														</a>

														<div class="p-t-10">
															<h5 class="p-b-5">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[3]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
																<?php echo htmlspecialchars($erandomresults[3]['Title']) ?>
																</a>
															</h5>

															<span class="cl8">
																<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[3]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
																	New
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																<?php echo htmlspecialchars(datefunction($erandomresults[3]['Date']))?>
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

							<li class="main-menu-active">
								<a href="#">Others</a>
								<ul class="sub-menu">
									<li><a href="./Aboutus/About/">About Us</a></li>
									<li><a href="./Aboutus/About/">Contact Us</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>		
	
		</div>
	</header>

	<!-- Breadcrumb -->
	<div class="container">
		<div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<a href="blog-list-01.html" class="breadcrumb-item f1-s-3 cl9">
					Blog 
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
				<?php echo htmlspecialchars($results[0]['Category']); ?>
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

	<!-- Content -->
	<section class="bg0 p-b-140 p-t-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-30">
					<div class="p-r-10 p-r-0-sr991">
						<!-- Blog Detail -->
						<div class="p-b-70">
							<a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                                <?php echo htmlspecialchars($results[0]['Category']); ?>
							</a>

							<h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                <?php echo htmlspecialchars($results[0]['Title']); ?>
							</h3>
							
							<div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        <?php echo htmlspecialchars($results[0]['Author']); ?>
									</a>

									<span class="m-rl-3">-</span>

									<span>
									<?php echo htmlspecialchars(datefunction($results[0]['Date'])); ?>
									</span>
								</span>

								<span class="f1-s-3 cl8 m-r-15">
									5239 Views
								</span>

								<a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
									50 Comment
								</a>
							</div>

                            <!-- detail -->
							<!-- <div class="wrap-pic-max-w p-b-30">
								<img src="Home/images/blog-list-01.jpg" alt="IMG">
							</div> -->

							<div class="f1-s-11 cl6 p-b-25">
                                <?php echo htmlspecialchars($results[0]['Content']); ?>
                            </div>

							<!-- Tag -->
							<div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Apps
									</a>

									<a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
										Software
									</a>
								</div>
							</div>

							<!-- Follow -->
							<div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Follow:
								</span>
								
								<div class="flex-wr-s-s size-w-0">
									<a href="https://www.facebook.com/profile.php?id=100093544205050&mibextid=ZbWKwL" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-facebook-f m-r-7"></i>
										Facebook
									</a>

									<a href="https://x.com/OgbodoN45608?t=2uvY9Nv-qaWsNnjoKM0K8Q&s=08" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-twitter m-r-7"></i>
										Twitter
									</a>

									<a href="https://youtube.com/@codingchess" class="dis-block f1-s-13 cl0 bg-youtube borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-youtube m-r-7"></i>
										Youtube
									</a>

									<a href="https://pin.it/uER5MJ2YH" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
										<i class="fab fa-pinterest-p m-r-7"></i>
										Pinterest
									</a>
								</div>
							</div>
						</div>

						<!-- Leave a comment -->
						
					</div>
				</div>
				
				<!-- Sidebar -->
				<div class="col-md-10 col-lg-4 p-b-30">
					<div class="p-l-10 p-rl-0-sr991 p-t-70">						
						<!-- Category -->
						<div class="p-b-60">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Category
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="how-bor3 p-rl-4">
									<a href="Home/eachcategory.php?category=Programming" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Programming
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="Home/eachcategory.php?category=AI" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										AI/Robotics
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="Home/eachcategory.php?category=Computers" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Computers
									</a>
								</li>

								<li class="how-bor3 p-rl-4">
									<a href="Home/eachcategory.php?category=Engineering" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										Engineering
									</a>
								</li>

								<!-- <li class="how-bor3 p-rl-4">
									<a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
										DIY & Crafts
									</a>
								</li> -->
							</ul>
						</div>

						<!-- Archive -->
						<div class="p-b-37">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									Blog Description
								</h3>
							</div>

							<ul class="p-t-32">
								<li class="p-rl-4 p-b-19">
										<span class="flex-wr-sb-c f1-s-10 cl2 hov-cl10 trans-03" style="font-size: 100%">
											<?php echo htmlspecialchars($results[0]['Metadescription']); ?>
										</span>
								</li>
							</ul>
						</div>

						<!-- Popular Posts -->
						<!-- You Might Also Like -->
						<div class="p-b-30">
							<div class="how2 how2-cl4 flex-s-c">
								<h3 class="f1-m-2 cl3 tab01-title">
									You Might Also Like
								</h3>
							</div>

							<ul class="p-t-35">
								<li class="flex-wr-sb-s p-b-30">
									<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[0]['ID']) ?>" class="size-w-10 wrap-pic-w hov1 trans-03">
										<img src="./metaimages/images/<?php echo htmlspecialchars($ymalrandomresults[0]['Metaimage'])?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[0]['ID']) ?>">
												<?php echo htmlspecialchars($ymalrandomresults[0]['Title'])?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[0]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo htmlspecialchars($ymalrandomresults[0]['Category'])?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												Feb 18
											</span>
										</span>
									</div>
								</li>

								<li class="flex-wr-sb-s p-b-30">
									<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[1]['ID']) ?>" class="size-w-10 wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($ymalrandomresults[1]['Metaimage']) ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[1]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo htmlspecialchars($ymalrandomresults[1]['Title']) ?>
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[1]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo htmlspecialchars($ymalrandomresults[0]['Category']) ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												Feb 16
											</span>
										</span>
									</div>
								</li>

								<li class="flex-wr-sb-s p-b-30">
									<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[2]['ID']) ?>" class="size-w-10 wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($ymalrandomresults[2]['Metaimage']) ?>" alt="IMG">
									</a>

									<div class="size-w-11">
										<h6 class="p-b-4">
											<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[2]['ID']) ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
												<?php echo htmlspecialchars($ymalrandomresults[2]['Title']) ?>		
											</a>
										</h6>

										<span class="cl8 txt-center p-b-24">
											<a href="blogdetails.php?id=<?php echo htmlspecialchars($ymalrandomresults[2]['ID']) ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
												<?php echo htmlspecialchars($ymalrandomresults[2]['Category']) ?>
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												Feb 12
											</span>
										</span>
									</div>
								</li>
							</ul>
						</div>

						<!-- Tag -->
						<div>
							<div class="how2 how2-cl4 flex-s-c m-b-30">
								<h3 class="f1-m-2 cl3 tab01-title">
									Tags
								</h3>
							</div>

							<div class="flex-wr-s-s m-rl--5">
								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Software
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
						<div class="size-h-3 flex-s-c mt-5">
							<a href="index.html">
								<img class="max-s-full" src="./metaimages/images/CTlogo3.png" alt="LOGO">
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
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[7]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[7]['ID']) ?>" class="f1-s-5 cl11 hov-cl10 trans-03">
										<?php echo htmlspecialchars($prandomresults[7]['Title']) ?>
										</a>
									</h6>

									<span class="f1-s-3 cl6">
									<?php echo htmlspecialchars(datefunction($prandomresults[7]['Date'])) ?>
									</span>
								</div>
							</li>

							<li class="flex-wr-sb-s p-b-20">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($airandomresults[7]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[7]['ID']) ?>" class="f1-s-5 cl11 hov-cl10 trans-03">
										<?php echo htmlspecialchars($airandomresults[7]['Title']) ?>
										</a>
									</h6>

									<span class="f1-s-3 cl6">
									<?php echo htmlspecialchars(datefunction($airandomresults[7]['Date'])) ?>
									</span>
								</div>
							</li>

							<li class="flex-wr-sb-s p-b-20">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID']) ?>" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($crandomresults[7]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[7]['ID']) ?>" class="f1-s-5 cl11 hov-cl10 trans-03">
										<?php echo htmlspecialchars($crandomresults[7]['Title']) ?>
										</a>
									</h6>

									<span class="f1-s-3 cl6">
									<?php echo htmlspecialchars(datefunction($crandomresults[7]['Date'])) ?>
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


<!--===============================================================================================-->	
	<script src="Home/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Home/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Home/vendor/bootstrap/js/popper.js"></script>
	<script src="Home/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Home/js/main.js"></script>

</body>
</html>
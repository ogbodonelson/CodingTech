<?php
// $conn = mysqli_connect('localhost', 'Wondamuda', '', 'Wondamuda');
include('../../../includes/conn.php');

if($conn){
	$category = $_GET['category'];
	// echo 'this is the category' . $category;
	// $sql = "SELECT * FROM publish WHERE Category = 'Programming' ORDER BY id ASC LIMIT 4";
	$sql = "SELECT * FROM publish WHERE Category = '$category'";
	$query = mysqli_query($conn, $sql);
	// $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
	$Totalnumrows = mysqli_num_rows($query);
	$perpage = 8;
	$maximumpagenum = ceil($Totalnumrows/$perpage);
	// echo $maximumpagenum;
	// while($row = mysqli_fetch_array($query)){
	// 	echo $row['ID'] . ' ' . $row['Title'] . '</br>';
	// }

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}

	$startnumber = ($page - 1)*$perpage;
	// $a = 5;
	if($page > 1){
		// $val = $page - 1;
		// echo '<a href="viewall.php?page=' . ($page - 1) .'">Previous</a> ';
	}

	for($i=1;$i<=$maximumpagenum;$i++){
		// echo $i;
	}

	if($i > $page){
		// $val = $page - 1;
		// echo '<a href="viewall.php?page=' . ($page + 1) .'">Next</a> ';
	}

	// $sql = "SELECT * FROM publish WHERE Category = the selected id from GET ORDER BY id ASC LIMIT 4";
	$sqll = "SELECT * FROM publish WHERE Category = '$category' LIMIT $startnumber, $perpage";
	$queryy = mysqli_query($conn, $sqll);
	$results = mysqli_fetch_all($queryy, MYSQLI_ASSOC);

	if(empty($results[0])){
		$itemonedisplay = 'none';
	}
	if(empty($results[1])){
		$itemtwodisplay = 'none';
	}
	if(empty($results[2])){
		$itemthreedisplay = 'none';
	}
	if(empty($results[3])){
		$itemfourdisplay = 'none';
	}
	if(empty($results[4])){
		$itemfivedisplay = 'none';
	}
	if(empty($results[5])){
		$itemsixdisplay = 'none';
	}
	if(empty($results[6])){
		$itemsevendisplay = 'none';
	}
	if(empty($results[7])){
		$itemeightdisplay = 'none';
	}
	if(empty($results[8])){
		$itemninedisplay = 'none';
	}
	if(empty($results[9])){
		$itemtendisplay = 'none';
	}
	if(empty($results[10])){
		$itemelevendisplay = 'none';
	}
	if(empty($results[11])){
		$itemtwelvedisplay = 'none';
	}

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

	$categories = ['Programming', 'AI', 'Computers', 'Engineering',];
	
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

	foreach ($crandomresults as $crandom) {
		// print_r($crandom);
		if (empty($crandom)) {
			echo "Variable 'a' is empty.<br>".  print_r($crandom['Title']);
		}
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

	//   for getting random category values
	// $randomcatsql = "SELECT * FROM publish WHERE Category = '$category' ORDER BY id DESC";
	// $randomcatquery = mysqli_query($conn, $randomcatsql);
	// $randomcatresults = mysqli_fetch_all($randomcatquery, MYSQLI_ASSOC);
	// shuffle($randomcatresults);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CodingTech Viewall</title>
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

							<img class="m-b-1 m-rl-8" src="Home/images/icons/icon-night.png" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

						<a href="./Aboutus/About/index.html" class="left-topbar-item">
							About
						</a>

						<a href="./Aboutus/About/index.html" class="left-topbar-item">
							Contact
						</a>
					</div>

					<div class="right-topbar">
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

					<li>
						<a href="./Home/eachcategory.php?category=Programming">Programming</a>
					</li>

					<li>
						<a href="./Home/eachcategory.php?category=AI">AI/Robotics</a>
					</li>

					<li>
						<a href="./Home/eachcategory.php?category=Computers">Computers</a>
					</li>

					<li>
						<a href="./Home/eachcategory.php?category=Engineering">Engineering</a>
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
					<a href="index.html"><img src="./metaimages/images/CTlogo1.png" alt="LOGO"></a>
				</div>	

				<!-- Banner -->
				<div class="banner-header">
					<!-- <a href="#"><img src="images/banner-01.jpg" alt="IMG"></a> -->
				</div>
			</div>	
			
			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="index.html">
							<img src="./metaimages/images/CTlogo1.png"  alt="LOGO" alt="LOGO">
						</a>

						<ul class="main-menu">

							<li class="mega-menu-item main-menu-active">
								<a href="#">Programming</a>

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
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[0]['Metaimage']) ?>" alt="IMG">
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
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[1]['Metaimage']) ?>" alt="IMG">
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
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[2]['Metaimage']) ?>" alt="IMG">
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
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[3]['Metaimage']) ?>" alt="IMG">
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

										<div class="tab-pane" id="enter-2" role="tabpanel">
											<div class="row">
												<div class="col-3">
													<!-- Item post -->	
													<div>
														<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[4]['Metaimage']) ?>" alt="IMG">
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
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[5]['Metaimage']) ?>" alt="IMG">
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
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[6]['Metaimage']) ?>" alt="IMG">
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
															<img src="./metaimages/images/<?php echo htmlspecialchars($prandomresults[7]['Metaimage']) ?>" alt="IMG">
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
								<a href="#">AI/Robotics</a>

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

										<div class="tab-pane" id="business-2" role="tabpanel">
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
																<?php echo htmlspecialchars(datefunction($crandomresults[0]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($crandomresults[1]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($crandomresults[2]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($crandomresults[3]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($crandomresults[4]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($crandomresults[5]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($crandomresults[6]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($erandomresults[0]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($erandomresults[1]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($erandomresults[2]['Date'])) ?>
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
																<?php echo htmlspecialchars(datefunction($erandomresults[3]['Date'])) ?>
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
									</div>
								</div>
							</li>

							<li>
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
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="index.html" class="breadcrumb-item f1-s-3 cl9">
					Home 
				</a>

				<a href="category-02.html" class="breadcrumb-item f1-s-3 cl9">
					Category
				</a>

				<span class="breadcrumb-item f1-s-3 cl9">
					<?php echo htmlspecialchars($category) ?>
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

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2">
		<?php echo htmlspecialchars($category) ?>
		</h2>
	</div>
		
	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-md-6 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(./metaimages/images/<?php echo htmlspecialchars($prandomresults[11]['Metaimage']) ?>);">
						<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[11]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a  class="wrap-pic-w hov1 trans-03" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
							<?php echo htmlspecialchars($prandomresults[11]['Category']) ?>
							</a>

							<h3 class="how1-child2 m-t-14 m-b-10">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[11]['ID']) ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
								<?php echo htmlspecialchars($prandomresults[11]['Title']) ?>
								</a>
							</h3>

							<span class="how1-child2">
								<span class="f1-s-4 cl11">
									Top chart
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
								<?php echo htmlspecialchars(datefunction($prandomresults[11]['Date'])) ?>
								</span>
							</span>
						</div>
					</div>
				</div>

				<div class="col-md-6 p-rl-1">
					<div class="row m-rl--1">
						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(./metaimages/images/<?php echo htmlspecialchars($prandomresults[12]['Metaimage']) ?>);">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[12]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[12]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
									<?php echo htmlspecialchars($prandomresults[12]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[12]['ID']) ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($prandomresults[12]['Title']) ?>
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(./metaimages/images/<?php echo htmlspecialchars($prandomresults[10]['Metaimage']) ?>);">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[10]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[10]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
									<?php echo htmlspecialchars($prandomresults[10]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[10]['ID']) ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($prandomresults[10]['Title']) ?>
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(./metaimages/images/<?php echo htmlspecialchars($prandomresults[9]['Metaimage']) ?>);">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[9]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[9]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
									<?php echo htmlspecialchars($prandomresults[9]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[9]['ID']) ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($prandomresults[9]['Category']) ?>
										</a>
									</h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-rl-1 p-b-2">
							<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(./metaimages/images/<?php echo htmlspecialchars($prandomresults[8]['Metaimage']) ?>);">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[8]['ID']) ?>" class="dis-block how1-child1 trans-03"></a>

								<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[8]['ID']) ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
									<?php echo htmlspecialchars($prandomresults[8]['Category']) ?>
									</a>

									<h3 class="how1-child2 m-t-14">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[8]['ID']) ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
										<?php echo htmlspecialchars($prandomresults[8]['Category']) ?>
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
	<section class="bg0 p-t-70 p-b-55">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemonedisplay ?>">
							<!-- Item latest -->
								<!-- itemone  -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[0]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[0]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[0]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
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

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemtwodisplay ?>">
							<!-- Item latest -->
								<!-- itemtwo  -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[1]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[1]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[1]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
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

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemthreedisplay ?>">
							<!-- Item latest -->
								<!-- itemthree -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[2]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[2]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[2]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[2]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[2]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[2]['Author']) ?>
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
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemfourdisplay ?>">
							<!-- Item latest -->
								<!-- itemfour -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[3]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[3]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[3]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[3]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[3]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[3]['Author']) ?>
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

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemfivedisplay ?>">
							<!-- Item latest -->
								<!-- itemfive -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[4]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[4]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[4]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[4]['Title']) ?>
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[4]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[4]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results[4]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemsixdisplay ?>">
							<!-- Item latest -->	
							<!-- itemsix -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[5]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[5]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[5]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[5]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[5]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[5]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results[5]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemsevendisplay ?>">
							<!-- Item latest -->
								<!-- itemseven -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[6]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[6]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[6]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[6]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[6]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[6]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results[6]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemeightdisplay ?>">
							<!-- Item latest -->
								<!-- itemeight  -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[7]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[7]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[7]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[7]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[7]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[7]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
										<?php echo htmlspecialchars(datefunction($results[7]['Date'])) ?>
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemninedisplay ?>">
							<!-- Item latest -->
								<!-- itemnine -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[8]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[8]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[8]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[8]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[8]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[8]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 15
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemtendisplay ?>">
							<!-- Item latest -->
							<!-- itemten -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[9]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[9]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[9]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[9]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[9]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[9]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 13
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemelevendisplay ?>">
							<!-- Item latest -->
								<!-- itemeleven -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[10]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[10]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[10]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[10]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[10]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[10]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 10
										</span>
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 p-r-25 p-r-15-sr991" style="display:<?php echo $itemtwelvedisplay ?>">
							<!-- Item latest -->
							<!-- itemtwelve -->
							<div class="m-b-45">
								<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[11]['ID']) ?>" class="wrap-pic-w hov1 trans-03">
									<img src="./metaimages/images/<?php echo htmlspecialchars($results[11]['Metaimage']) ?>" alt="IMG">
								</a>

								<div class="p-t-16">
									<h5 class="p-b-5">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[11]['ID']) ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[11]['Title']) ?> 
										</a>
									</h5>

									<span class="cl8">
										<a href="./blogdetails.php?id=<?php echo htmlspecialchars($results[11]['ID']) ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
											<?php echo htmlspecialchars($results[11]['Author']) ?>
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Pagination -->
					<div class="flex-wr-s-c m-rl--7 p-t-15">
						<?php echo '<a href="viewall.php?category=' . (htmlspecialchars($category)) .'&page=' . (htmlspecialchars($page - 1)) .'" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 px-5">Previous</a> '; ?>
						<?php echo '<a href="viewall.php?category=' . (htmlspecialchars($category)) .'&page=' . (htmlspecialchars($page + 1)) .'" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 px-5 pagi-active">Next</a> '; ?>
					</div>
				</div>

				<div class="col-md-10 col-lg-4 p-b-80">
					<div class="p-l-10 p-rl-0-sr991">							
						<!-- Subscribe -->
						<div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
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

						<!-- Most Popular -->
						<div class="p-b-23">
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

									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[8]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo $airandomresults[8]['Title'] ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										2
									</div>

									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($prandomresults[5]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo $prandomresults[5]['Title'] ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										3
									</div>

									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($crandomresults[6]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo $crandomresults[6]['Title'] ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
										4
									</div>

									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($erandomresults[6]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo $erandomresults[6]['Title'] ?>
									</a>
								</li>

								<li class="flex-wr-sb-s p-b-22">
									<div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0">
										5
									</div>

									<a href="./blogdetails.php?id=<?php echo htmlspecialchars($airandomresults[4]['ID']) ?>" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
									<?php echo $airandomresults[4]['Title'] ?>
									</a>
								</li>
							</ul>
						</div>

						<!--  -->
						<div class="flex-c-s p-b-50">
							<a href="#">
								<img class="max-w-full" src="./metaimages/images/CT blog image2.jpg" alt="IMG">
							</a>
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
									Apps
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Software
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Web
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Gaming
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Cloud
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Data
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Virtual Reality
								</a>

								<a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
									Computer science
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

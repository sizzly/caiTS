<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php : 
 * ----------------------------------------------------------------------
 */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="horizontal">

<head>
  	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/png" href="/themes/caiTS/assets/images/logos/favicon.png" />

	<!-- Core Css -->
	<link rel="stylesheet" href="/themes/caiTS/assets/css/styles.css" />
	<link rel="stylesheet" href="/themes/caiTS/assets/fonts/tabler-icons/tabler-icons.css" />

	<title><?php print (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>
	<!-- Owl Carousel  -->
	<script src="/assets/jquery/js/jquery.js"></script>
	<link rel="stylesheet" href="/themes/caiTS/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="/themes/caiTS/assets/js/lity/dist/lity.min.css" />
</head>

<body>
	<!--  Header Start -->
	<div class="fixed-top">
		<nav class="navbar navbar-expand-lg bg-body fixed-top">
  			<div class="container-fluid">
    			<a class="navbar-brand" href="/">iToysoldiers</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbartoggle" aria-controls="navbartoggle" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbartoggle">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="/Collections/index">Order of Battle</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Browse</a>
							<ul class="dropdown-menu">
            					<li><a class="dropdown-item" href="/Browse/objects">Objects</a></li>
          					</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Info</a>
							<ul class="dropdown-menu">
            					<li><a class="dropdown-item" href="/About/Index">About</a></li>
								<li><a class="dropdown-item" href="/Contact/form">Contact</a></li>
								<li><a class="dropdown-item" href="https://blog.itoysoldiers.com">Blog</a></li>
          					</ul>
						</li>
					</ul>
					<form class="d-flex" role="search" action="<?php print caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>">
						<input type="text" class="form-control me-2" id="headerSearchInput" placeholder="Search" name="search" autocomplete="off" />
						<button class="btn btn btn-outline-primary" type="submit">Search</button>
					</form>
				</div>
  			</div>
		</nav>
	</div>
	<!--  Header End -->

	<div id="main-wrapper">
		<div class="page-wrapper">
			<div class="body-wrapper">
				<div class="container-fluid">
	<!-- End pageheader -->

<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php : 
 * ----------------------------------------------------------------------
 */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="dark" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/png" href="/themes/caiTS/assets/images/logos/favicon.png" />

	<!-- Core Css -->
	<link rel="stylesheet" href="/themes/caiTS/assets/css/styles.css" />

	<title><?= (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="/themes/caiTS/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css" />
</head>

<body>
	<!-- Preloader -->
	<div class="preloader">
		<img src="/themes/caiTS/assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
	</div>
	<!-- ------------------------------------- -->
	<!-- Top Bar Start -->
	<!-- ------------------------------------- -->

	<!-- ------------------------------------- -->
	<!-- Top Bar End -->
	<!-- ------------------------------------- -->

	<!-- ------------------------------------- -->
	<!-- Header Start -->
	<!-- ------------------------------------- -->
	<header class="header-fp p-0 w-100">
		<nav class="navbar navbar-expand-lg bg-primary-subtle py-2 py-lg-10">
			<div class="custom-container d-flex align-items-center justify-content-between">
				<a href="/index.php" class="text-nowrap logo-img">
					<img src="/themes/caiTS/assets/images/logos/itslogo2.png" class="dark-logo" alt="Logo-Dark" />
					<img src="/themes/caiTS/assets/images/logos/itslogo2.png" class="light-logo" alt="Logo-light" />
				</a>
				<button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
					<i class="ti ti-menu-2 fs-8"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto mb-2 gap-xl-7 gap-8 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link fs-4 fw-bold text-dark link-primary" href="/index.php/About/Index">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fs-4 fw-bold text-dark link-primary" href="/index.php/Browse/objects">Browse</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fs-4 fw-bold text-dark link-primary" href="/index.php/Search/advanced/objects">Advanced Search</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link fs-4 fw-bold text-dark link-primary d-flex gap-2" href="/index.php/Collections/index">Collections
						</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- ------------------------------------- -->
	<!-- Header End -->
	<!-- ------------------------------------- -->

	<!-- ------------------------------------- -->
	<!-- Responsive Sidebar Start -->
	<!-- ------------------------------------- -->
	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header">
			<a href="/index.php">
				<img src="/themes/caiTS/assets/images/logos/itslogo2.png" alt="Logo-light" />
			</a>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<ul class="list-unstyled ps-0">
				<li class="mb-1">
					<a href="/index.php/About/Index" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
						About
					</a>
				</li>
				<li class="mb-1">
					<a href="/index.php/Browse/objects" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
						Browse
					</a>
				</li>
				<li class="mb-1">
					<a href="/index.php/Search/advanced/objects" class="px-0 fs-4 d-flex align-items-center justify-content-start gap-2 w-100 py-2 text-dark link-primary">
						Advanced Search
					</a>
				</li>
				<li class="mb-1">
					<a href="/index.php/Collections/index" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
						Collections
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- ------------------------------------- -->
	<!-- Responsive Sidebar End -->
	<!-- ------------------------------------- -->

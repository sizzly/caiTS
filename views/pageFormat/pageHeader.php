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

	<title><?php print (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="/themes/caiTS/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css" />
</head>

<body>
	<!-- ------------------------------------- -->
  	<!-- Header Start -->
  	<!-- ------------------------------------- -->
  	<header class="header-fp p-0 w-100">
    	<nav class="navbar navbar-expand-lg bg-primary-subtle py-2 py-lg-10 max-w-100">
      		<div class="custom-container d-flex align-items-center justify-content-between">
        		<a href="/" class="text-nowrap logo-img">
          			<img src="/themes/caiTS/assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
          			<img src="/themes/caiTS/assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
        		</a>
        		<button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          			<i class="ti ti-menu-2 fs-8"></i>
        		</button>
        		<div class="collapse navbar-collapse" id="navbarSupportedContent">
          			<ul class="navbar-nav mx-auto mb-2 gap-xl-7 gap-8 mb-lg-0">
            			<li class="nav-item">
              				<a class="nav-link fs-4 fw-bold text-dark link-primary" href="/About/Index">About</a>
            			</li>
            			<li class="nav-item">
              				<a class="nav-link fs-4 fw-bold text-dark link-primary d-flex gap-2" href="/Collections/Index">Collections</a>
            			</li>
            			<li class="nav-item">
              				<a class="nav-link fs-4 fw-bold text-dark link-primary" href="/Dashboard/Index">Dashboard</a>
            			</li>
            			<li class="nav-item">
              				<a class="nav-link fs-4 fw-bold text-dark link-primary" href="/Contact/form">Contact</a>
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
      		<a href="../horizontal/frontend-landingpage.html">
        		<img src="/themes/caiTS/assets/images/logos/dark-logo.svg" alt="Logo-light" />
      		</a>
      		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    	</div>
    	<div class="offcanvas-body">
      		<ul class="list-unstyled ps-0">
        		<li class="mb-1">
          			<a href="../horizontal/frontend-aboutpage.html" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
            			About Us
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="../horizontal/frontend-blogpage.html" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Blog
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="../horizontal/frontend-portfoliopage.html" class="px-0 fs-4 d-flex align-items-center justify-content-start gap-2 w-100 py-2 text-dark link-primary">
            			Portfolio
            			<span class="badge text-primary bg-primary-subtle fs-2 fw-bolder hstack">New</span>
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="../horizontal/index.html" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Dashboard
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="../horizontal/frontend-pricingpage.html" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Pricing
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="../horizontal/frontend-contactpage.html" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Contact
          			</a>
        		</li>
        		<li class="mt-3">
          			<a href="../horizontal/authentication-login.html" class="btn btn-primary w-100">Log In</a>
        		</li>
      		</ul>
    	</div>
  	</div>
  	<!-- ------------------------------------- -->
  	<!-- Responsive Sidebar End -->
  	<!-- ------------------------------------- -->
	  <div class="main-wrapper overflow-hidden">
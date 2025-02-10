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

<body class="link-sidebar">

<div id="main-wrapper">
	<div class="page-wrapper">
		<!--  Header Start -->
		<header class="topbar">
			<!-- Horizontal config -->
			<div class="app-header with-horizontal">

<nav class="navbar navbar-expand-xl container-fluid p-0">
    <ul class="navbar-nav align-items-center">
        <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
            <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </li>
        <li class="nav-item d-none d-xl-block">
            <a href="/" class="text-nowrap nav-link navbar-brand">
				<span class="navbar-brand mb-0 h1">iToysoldiers</span>
            </a>
        </li>
        <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-xl-flex">
            <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="ti ti-search"></i>
            </a>
        </li>
    </ul>
    <ul class="navbar-nav quick-links d-none d-lg-flex align-items-center">
        <li class="nav-item dropdown-hover d-none d-lg-block">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item dropdown-hover d-none d-lg-block">
            <a class="nav-link" href="/Collections/index">Collections</a>
        </li>
        <li class="nav-item dropdown-hover d-none d-lg-block">
            <a class="nav-link dropdown-toggle" href="#">Browse</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/Browse/objects">Objects</a></li>
            </ul>
        </li>
    </ul>
    <div class="d-block d-xl-none">
        <a href="/" class="text-nowrap nav-link">
            <img src="/themes/caiTS/assets/images/logos/dark-logo.png" width="180" alt="modernize-img" />
        </a>
    </div>
    <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="p-2">
            <i class="ti ti-dots fs-7"></i>
        </span>
    </a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
            <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                <i class="ti ti-align-justified fs-7"></i>
            </a>
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <!-- ------------------------------- -->
                <!-- start Theme Toggle -->
                <!-- ------------------------------- -->
                <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a class="nav-link moon dark-layout" href="javascript:void(0)">
                        <i class="ti ti-moon moon"></i>
                    </a>
                    <a class="nav-link sun light-layout" href="javascript:void(0)">
                        <i class="ti ti-sun sun"></i>
                    </a>
                </li>
                <!-- ------------------------------- -->
                <!-- end Theme Toggle -->
                <!-- ------------------------------- -->
            </ul>
        </div>
    </div>
</nav>













			</div>
		</header>
		<!--  Header End -->

		<div class="body-wrapper">
			<div class="container-fluid">
<!-- End pageheader -->

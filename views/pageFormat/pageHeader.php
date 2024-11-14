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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />	
	<link rel="stylesheet" href="/themes/caiTS/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css" />

	<title><?= (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>

</head>

<?php
	if ($this->request->getController() == "Front" || $this->request->getController() == "About") {
?>
		<body>
			<!-- Preloader -->
			<div class="preloader">
				<img src="/themes/caiTS/assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
			</div>
			<!-- ------------------------------------- -->
			<!-- Header Start -->
			<!-- ------------------------------------- -->
			<header class="header-fp p-0 w-100">
				<nav class="navbar navbar-expand-lg bg-primary-subtle py-2 py-lg-10">
					<div class="custom-container d-flex align-items-center justify-content-between">
						<a href="/index.php" class="text-nowrap logo-img">
							<span class="fw-bold fs-8 text-white">iToysoldiers</span>					
							<!-- <img src="/themes/caiTS/assets/images/logos/itslogo2.png" class="dark-logo" alt="Logo-Dark" /> -->
							<!-- <img src="/themes/caiTS/assets/images/logos/itslogo2.png" class="light-logo" alt="Logo-light" /> -->
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
						<span class="fw-bold fs-8 text-white">iToysoldiers</span>	
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
<?php
	}else{
?>
		<body class="link-sidebar">
			<!-- Preloader -->
			<div class="preloader">
				<img src="/themes/caiTS/assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
			</div>
		
			<div id="main-wrapper">
				<!-- Sidebar Start -->
				<aside class="left-sidebar with-vertical">
					<div>
						<!-- ---------------------------------- -->
						<!-- Start Vertical Layout Sidebar -->
						<!-- ---------------------------------- -->
						<div class="brand-logo d-flex align-items-center justify-content-between">
							<a href="/index.php">
								<span class="fw-bold fs-8 text-white">iTS</span>	
							</a>
							<a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
								<i class="ti ti-x"></i>
							</a>
						</div>

						<nav class="sidebar-nav scroll-sidebar" data-simplebar>
							<ul id="sidebarnav">
								<!-- ---------------------------------- -->
								<!-- Home -->
								<!-- ---------------------------------- -->
								<li class="nav-small-cap">
									<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
									<span class="hide-menu">Navigation</span>
								</li>
								<!-- ---------------------------------- -->
								<!-- Dashboard -->
								<!-- ---------------------------------- -->
								<li class="sidebar-item">
									<a class="sidebar-link" href="/index.php" aria-expanded="false">
										<span>
											<i class="ti ti-home"></i>
										</span>
										<span class="hide-menu">Home</span>
									</a>
								</li>
								<li class="sidebar-item">
								<a class="sidebar-link" href="/index.php/About/Index" aria-expanded="false">
									<span>
										<i class="ti ti-info-circle"></i>
									</span>
									<span class="hide-menu">About</span>
								</a>
								</li>
								<li class="sidebar-item">
								<a class="sidebar-link" href="/index.php/Browse/objects" aria-expanded="false">
									<span>
										<i class="ti ti-binoculars-filled"></i>
									</span>
									<span class="hide-menu">Browse</span>
								</a>
								</li>
								<li class="sidebar-item">
								<a class="sidebar-link" href="/index.php/Search/advanced/objects" aria-expanded="false">
									<span>
										<i class="ti ti-search"></i>
									</span>
									<span class="hide-menu">Advanced Search</span>
								</a>
								</li>
								<li class="sidebar-item">
								<a class="sidebar-link" href="/index.php/Collections/index" aria-expanded="false">
									<span>
										<i class="ti ti-sitemap"></i>
									</span>
									<span class="hide-menu">Collections</span>
								</a>
								</li>
							</ul>
						</nav>

						<!-- ---------------------------------- -->
						<!-- Start Vertical Layout Sidebar -->
						<!-- ---------------------------------- -->
					</div>
				</aside>
				<!--  Sidebar End -->


				<div class="page-wrapper">
					<!--  Header Start -->
					<header class="topbar">
						<div class="with-vertical">
							<!-- ---------------------------------- -->
							<!-- Start Vertical Layout Header -->
							<!-- ---------------------------------- -->
							<nav class="navbar navbar-expand-lg p-0">
								<ul class="navbar-nav">
									<li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
										<a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
											<i class="ti ti-menu-2"></i>
										</a>
									</li>
									<li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
										<a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
											<i class="ti ti-search"></i>
										</a>
									</li>
								</ul>

								<div class="d-block d-lg-none py-4">
									<a href="../dark/index.html" class="text-nowrap logo-img">
										<a href="/index.php">
											<span class="fw-bold fs-8 text-white">iToysoldiers</span>	
										</a>
									</a>
								</div>

								<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
									<div class="d-flex align-items-center justify-content-between">
										<a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
											<i class="ti ti-align-justified fs-7"></i>
										</a>
										<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
											<!-- Intentionally Left Blank in case I want to add to it -->
										</ul>
									</div>
								</div>
							</nav>
							<!-- ---------------------------------- -->
							<!-- End Vertical Layout Header -->
							<!-- ---------------------------------- -->
						</div>
					</header>
					<!--  Header End -->
<?php
	}
?>

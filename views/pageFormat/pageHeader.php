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

<?php 
	if ($this->request->getController() == "Front" OR $this->request->getController() == "Contact" OR $this->request->getController() == "About") {
?>
<body>
	<!-- ------------------------------------- -->
  	<!-- Header Start -->
  	<!-- ------------------------------------- -->
  	<header class="header-fp p-0 w-100">
    	<nav class="navbar navbar-expand-lg bg-primary-subtle py-2 py-lg-10 max-w-100">
      		<div class="custom-container d-flex align-items-center justify-content-between">
        		<a href="/" class="text-nowrap logo-img">
          			<img src="/themes/caiTS/assets/images/logos/dark-logo.png" class="dark-logo" alt="Logo-Dark" />
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
      		<a href="/">
        		<img src="/themes/caiTS/assets/images/logos/dark-logo.svg" alt="Logo-light" />
      		</a>
      		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    	</div>
    	<div class="offcanvas-body">
      		<ul class="list-unstyled ps-0">
        		<li class="mb-1">
          			<a href="/About/Index" class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
            			About
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="https://blog.itoysoldiers.com" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Blog
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="/Dashboard/Index" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Dashboard
          			</a>
        		</li>

        		<li class="mb-1">
          			<a href="/Contact/form" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
            			Contact
          			</a>
        		</li>
      		</ul>
    	</div>
  	</div>
  	<!-- ------------------------------------- -->
  	<!-- Responsive Sidebar End -->
  	<!-- ------------------------------------- -->
	  <div class="main-wrapper overflow-hidden">
<?php
	} else {
?>
<body class="link-sidebar">

<div id="main-wrapper">
	<!-- Sidebar Start -->
	<aside class="left-sidebar with-vertical">
		<div>
			<!-- ---------------------------------- -->
			<!-- Start Vertical Layout Sidebar -->
			<!-- ---------------------------------- -->
			<div class="brand-logo d-flex align-items-center justify-content-between">
				<a href="/" class="text-nowrap logo-img">
					<img src="/themes/caiTS/assets/images/logos/dark-logo.png" class="dark-logo" alt="Logo-Dark" />
					<img src="/themes/caiTS/assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
				</a>
				<a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
					<i class="ti ti-x"></i>
				</a>
			</div>

			<nav class="sidebar-nav scroll-sidebar" data-simplebar>
				<ul id="sidebarnav">
					<!-- ---------------------------------- -->
					<!-- Nav -->
					<!-- ---------------------------------- -->
					<li class="nav-small-cap">
						<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
						<span class="hide-menu">Nav</span>
					</li>
					<!-- ---------------------------------- -->
					<!-- Main Nav -->
					<!-- ---------------------------------- -->
					<li class="sidebar-item">
						<a class="sidebar-link" href="/" id="get-url" aria-expanded="false">
							<span>
								<i class="ti ti-home"></i>
							</span>
							<span class="hide-menu">Home</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Dashboard/Index" aria-expanded="false">
							<span>
								<i class="ti ti-dashboard"></i>
							</span>
							<span class="hide-menu">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Collections/Index" aria-expanded="false">
							<span>
								<i class="ti ti-sitemap"></i>
							</span>
							<span class="hide-menu">Collections</span>
						</a>
					</li>        
					<!-- ---------------------------------- -->
					<!-- Browse pages -->
					<!-- ---------------------------------- -->
					<li class="sidebar-item">
						<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
							<span class="d-flex">
								<i class="ti ti-binoculars"></i>
							</span>
							<span class="hide-menu">Browse</span>
						</a>
						<ul aria-expanded="false" class="collapse first-level">
							<li class="sidebar-item">
								<a href="/Browse/objects" class="sidebar-link">
									<div class="round-16 d-flex align-items-center justify-content-center">
										<i class="ti ti-circle"></i>
									</div>
									<span class="hide-menu">Objects</span>
								</a>
							</li>
						</ul>
					</li>
					<!-- ---------------------------------- -->
					<!-- Other -->
					<!-- ---------------------------------- -->
					<li class="nav-small-cap">
						<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Other</span>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/About/Index" aria-expanded="false">
							<span>
								<i class="ti ti-info-circle"></i>
							</span>
							<span class="hide-menu">About</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="/Contact/form" aria-expanded="false">
							<span>
								<i class="ti ti-contract"></i>
							</span>
							<span class="hide-menu">Contact</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="https://blog.itoysoldiers.com" aria-expanded="false">
							<span>
								<i class="ti ti-book"></i>
							</span>
							<span class="hide-menu">Blog</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="https://bsky.app/profile/itoysoldiers.bsky.social" aria-expanded="false">
							<span>
								<i class="ti ti-brand-bluesky"></i>
							</span>
							<span class="hide-menu">Bluesky</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- ---------------------------------- -->
			<!-- END Vertical Layout Sidebar -->
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
						<a href="/" class="text-nowrap logo-img">
							<img src="/themes/caiTS/assets/images/logos/dark-logo.png" class="dark-logo" alt="Logo-Dark" />
							<img src="/themes/caiTS/assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
						</a>
					</div>
					<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
						<!-- ------------------------------- -->
						<!-- start language Dropdown -->
						<!-- ------------------------------- -->
						<li class="nav-item nav-icon-hover-bg rounded-circle">
							<a class="nav-link moon dark-layout" href="javascript:void(0)">
								<i class="ti ti-moon moon"></i>
							</a>
							<a class="nav-link sun light-layout" href="javascript:void(0)">
								<i class="ti ti-sun sun"></i>
							</a>
						</li>
					</ul>
					<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
						<div class="d-flex align-items-center justify-content-between">
							<a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
								<i class="ti ti-align-justified fs-7"></i>
							</a>
							
						</div>
					</div>
				</nav>
				<!-- ---------------------------------- -->
				<!-- End Vertical Layout Header -->
				<!-- ---------------------------------- -->

				<!-- ------------------------------- -->
				<!-- apps Dropdown in Small screen -->
				<!-- ------------------------------- -->
				<!--  Mobilenavbar -->
				<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
					<nav class="sidebar-nav scroll-sidebar">
						<div class="offcanvas-header justify-content-between">
							<img src="/themes/caiTS/assets/images/logos/favicon.ico" alt="modernize-img" class="img-fluid" />
							<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
						</div>
						<div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
							<ul id="sidebarnav">
								<li class="sidebar-item">
									<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
										<span>
											<i class="ti ti-apps"></i>
										</span>
										<span class="hide-menu">Apps</span>
									</a>
									<ul aria-expanded="false" class="collapse first-level my-3">
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-chat.html" class="d-flex align-items-center">
												<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
													<img src="/themes/caiTS/assets/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
												</div>
												<div>
													<h6 class="mb-1 bg-hover-primary">Small Screen Chat</h6>
													<span class="fs-2 d-block text-muted">New messages arrived</span>
												</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-invoice.html" class="d-flex align-items-center">
												<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
													<img src="/themes/caiTS/assets/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
												</div>
												<div>
													<h6 class="mb-1 bg-hover-primary">Invoice App</h6>
													<span class="fs-2 d-block text-muted">Get latest invoice</span>
												</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-cotact.html" class="d-flex align-items-center">
												<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
													<img src="/themes/caiTS/assets/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
												</div>
												<div>
													<h6 class="mb-1 bg-hover-primary">Contact Application</h6>
													<span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
												</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-email.html" class="d-flex align-items-center">
											<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
												<img src="/themes/caiTS/assets/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
											</div>
											<div>
												<h6 class="mb-1 bg-hover-primary">Email App</h6>
												<span class="fs-2 d-block text-muted">Get new emails</span>
											</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/page-user-profile.html" class="d-flex align-items-center">
											<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
												<img src="/themes/caiTS/assets/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
											</div>
											<div>
												<h6 class="mb-1 bg-hover-primary">User Profile</h6>
												<span class="fs-2 d-block text-muted">learn more information</span>
											</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-calendar.html" class="d-flex align-items-center">
											<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
												<img src="/themes/caiTS/assets/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
											</div>
											<div>
												<h6 class="mb-1 bg-hover-primary">Calendar App</h6>
												<span class="fs-2 d-block text-muted">Get dates</span>
											</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-contact2.html" class="d-flex align-items-center">
											<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
												<img src="/themes/caiTS/assets/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
											</div>
											<div>
												<h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
												<span class="fs-2 d-block text-muted">Add new contact</span>
											</div>
											</a>
										</li>
										<li class="sidebar-item py-2">
											<a href="../horizontal/app-notes.html" class="d-flex align-items-center">
											<div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
												<img src="/themes/caiTS/assets/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />
											</div>
											<div>
												<h6 class="mb-1 bg-hover-primary">Notes Application</h6>
												<span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
											</div>
											</a>
										</li>
										<ul class="px-8 mt-7 mb-4">
											<li class="sidebar-item mb-3">
											<h5 class="fs-5 fw-semibold">Quick Links</h5>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/page-pricing.html">Pricing Page</a>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/authentication-login.html">Authentication
												Design</a>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/authentication-register.html">Register Now</a>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/authentication-error.html">404 Error Page</a>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/app-notes.html">Notes App</a>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/page-user-profile.html">User Application</a>
											</li>
											<li class="sidebar-item py-2">
											<a class="fw-semibold text-dark" href="../horizontal/page-account-settings.html">Account Settings</a>
											</li>
										</ul>
									</ul>
								</li>
								<li class="sidebar-item">
									<a class="sidebar-link" href="../horizontal/app-chat.html" aria-expanded="false">
									<span>
										<i class="ti ti-message-dots"></i>
									</span>
									<span class="hide-menu">Chat</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a class="sidebar-link" href="../horizontal/app-calendar.html" aria-expanded="false">
									<span>
										<i class="ti ti-calendar"></i>
									</span>
									<span class="hide-menu">Calendar</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a class="sidebar-link" href="../horizontal/app-email.html" aria-expanded="false">
									<span>
										<i class="ti ti-mail"></i>
									</span>
									<span class="hide-menu">Email</span>
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
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
							<a href="/" class="text-nowrap nav-link">
								<img src="/themes/caiTS/assets/images/logos/dark-logo.png" class="dark-logo" width="180" alt="modernize-img" />
								<img src="/themes/caiTS/assets/images/logos/light-logo.svg" class="light-logo" width="180" alt="modernize-img" />
							</a>
						</li>
						<li class="nav-item nav-icon-hover-bg rounded-circle d-none d-xl-flex">
							<a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<i class="ti ti-search"></i>
							</a>
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

		<aside class="left-sidebar with-horizontal">
			<!-- Sidebar scroll-->
			<div>
				<!-- Sidebar navigation-->
				<nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
					<ul id="sidebarnav">
						<!-- ============================= -->
						<!-- Icon -->
						<!-- ============================= -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Home</span>
						</li>
						<!-- =================== -->
						<!-- Dashboard -->
						<!-- =================== -->
						<li class="sidebar-item">
							<a class="sidebar-link" href="/" aria-expanded="false">
								<span>
									<i class="ti ti-home-2"></i>
								</span>
								<span class="hide-menu">Home</span>
							</a>
						</li>
						<!-- ============================= -->
						<!-- Dashboard -->
						<!-- ============================= -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Dashboard</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link two-column" href="/Dashboard/Index" aria-expanded="false">
								<span>
									<i class="ti ti-dashboard"></i>
								</span>
								<span class="hide-menu">Dashboard</span>
							</a>
						</li>
						<!-- ============================= -->
						<!-- Collections -->
						<!-- ============================= -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Collections</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link" href="/Collections/index" aria-expanded="false">
								<span class="rounded-3">
									<i class="ti ti-sitemap"></i>
								</span>
								<span class="hide-menu">Collections</span>
							</a>
						</li>
						<!-- ============================= -->
						<!-- Browse -->
						<!-- ============================= -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">BROWSE</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
								<span>
									<i class="ti ti-binoculars"></i>
								</span>
								<span class="hide-menu">Browse</span>
							</a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item">
									<a href="/Browse/objects" class="sidebar-link">
										<i class="ti ti-circle"></i>
										<span class="hide-menu">Objects</span>
									</a>
								</li>
							</ul>
						</li>
						<!-- ============================= -->
						<!-- Other -->
						<!-- ============================= -->
						<li class="nav-small-cap">
							<i class="ti ti-dots nav-small-cap-icon fs-4"></i>
							<span class="hide-menu">Other</span>
						</li>
						<li class="sidebar-item">
							<a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
								<span class="rounded-3">
									<i class="ti ti-info-circle"></i>
								</span>
								<span class="hide-menu">Other</span>
							</a>
							<ul aria-expanded="false" class="collapse first-level">
								<li class="sidebar-item">
									<a href="/About/Index" class="sidebar-link">
									<i class="ti ti-circle"></i>
									<span class="hide-menu">About</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="/Contact/form" class="sidebar-link">
									<i class="ti ti-circle"></i>
									<span class="hide-menu">Contact</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="https://blog.itoysoldiers.com" class="sidebar-link">
									<i class="ti ti-circle"></i>
									<span class="hide-menu">Blog</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="https://bsky.app/profile/itoysoldiers.bsky.social" class="sidebar-link">
									<i class="ti ti-circle"></i>
									<span class="hide-menu">Bluesky</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>

		<div class="body-wrapper">
			<div class="container-fluid">
<!-- End pageheader -->
<?php
	}
?>
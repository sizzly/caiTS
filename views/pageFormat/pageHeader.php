<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php : 
 * ----------------------------------------------------------------------
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php print (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<script src="/assets/jquery/js/jquery.js"></script>
	<!-- ================== BEGIN core-css ================== -->
	<link href="/themes/caiTS/assets/css/vendor.min.css" rel="stylesheet" />
	<link href="/themes/caiTS/assets/css/app.min.css" rel="stylesheet" />
	<link href="/themes/caiTS/assets/css/mods.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
	<link href="/themes/caiTS/assets/js/lity/dist/lity.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="/themes/caiTS/assets/js/owl.carousel/dist/assets/owl.carousel.min.css" />

	<!-- ================== END core-css ================== -->

</head>
<body>
<!-- BEGIN #app -->
	<div id="app" class="app">

<!-- BEGIN #header -->
		<div id="header" class="app-header">
			<!-- BEGIN desktop-toggler -->
			<div class="desktop-toggler">
				<button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- BEGIN desktop-toggler -->
			
			<!-- BEGIN mobile-toggler -->
			<div class="mobile-toggler">
				<button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</button>
			</div>
			<!-- END mobile-toggler -->
		
<!-- BEGIN brand -->
			<div class="brand">
				<a href="/" class="brand-logo">
					<span class="brand-img">
						<span class="brand-img-text text-theme">I</span>
					</span>
					<span class="brand-text">iToysoldiers</span>
				</a>
			</div>
<!-- END brand -->
		
<!-- BEGIN menu -->
			<div class="menu">
				<nav class="nav">
					<div class="menu-item dropdown">
						<a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app" class="menu-link">
							<div class="menu-icon"><i class="bi bi-search nav-icon"></i></div>
						</a>
					</div>
				</nav>
			</div>
			<!-- END menu -->
			<!-- BEGIN menu-search -->
			<form class="menu-search" role="search" action="<?php print caNavUrl($this->request, '', 'MultiSearch', 'Index'); ?>">
				<div class="menu-search-container">
					<div class="menu-search-icon"><i class="bi bi-search"></i></div>
					<div class="menu-search-input">
						<input type="text" class="form-control form-control-lg" id="headerSearchInput" placeholder="Search" name="search" autocomplete="off" />
					</div>
					<div class="menu-search-icon">
						<a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
					</div>
				</div>
			</form>
			<!-- END menu-search -->
		</div>
		<!-- END #header -->
			<!-- BEGIN #sidebar -->
			<div id="sidebar" class="app-sidebar">
			<!-- BEGIN scrollbar -->
			<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
				<!-- BEGIN menu -->
				<div class="menu">
					<div class="menu-header">Navigation</div>
					<div class="menu-item">
						<a href="/index.php" class="menu-link">
							<span class="menu-icon"><i class="bi bi-cpu"></i></span>
							<span class="menu-text">Home</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="/index.php/About/Index" class="menu-link">
							<span class="menu-icon"><i class="fas fa-info-circle"></i></span>
							<span class="menu-text">About</span>
						</a>
					</div>
					<div class="menu-item">
						<a href="/index.php/Collections/Index" class="menu-link">
							<span class="menu-icon"><i class="fas fa-sitemap"></i></span>
							<span class="menu-text">Order of Battle</span>
						</a>
					</div>
					<div class="menu-item has-sub">
						<a href="#" class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-binoculars"></i>
							</span>
							<span class="menu-text">Browse</span>
							<span class="menu-caret"><b class="caret"></b></span>
						</a>
						<div class="menu-submenu">
							<div class="menu-item">
								<a href="/index.php/Browse/objects" class="menu-link">
									<span class="menu-text">Objects</span>
								</a>
							</div>
						</div>
					</div>
					<div class="menu-header">Other</div>
					<div class="menu-item">
						<a href="https://blog.itoysoldiers.com" class="menu-link">
							<span class="menu-icon"><i class="bi bi-book"></i></span>
							<span class="menu-text">Blog</span>
						</a>
					</div>
				</div>
				<!-- END menu -->
			</div>
			<!-- END scrollbar -->
		</div>
		<!-- END #sidebar -->
			
		<!-- BEGIN mobile-sidebar-backdrop -->
		<button class="app-sidebar-mobile-backdrop" data-toggle-target=".app" data-toggle-class="app-sidebar-mobile-toggled"></button>
		<!-- END mobile-sidebar-backdrop -->
		<!-- BEGIN #content -->
		<div id="content" class="app-content">
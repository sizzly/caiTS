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
	
		<!-- ================== BEGIN core-css ================== -->
		<link href="/themes/caiTS/assets/css/vendor.min.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/css/theme.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/css/mods.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/plugins//lity/dist/lity.min.css" rel="stylesheet" />

		<!-- ================== END core-css ================== -->
	
	</head>
	<body>
<!-- BEGIN #app -->
		<div id="app" class="app app-content-full-width">

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
<!-- END desktop-toggler -->
			
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
						<a class="nav-link" href="/">Home</a>
  						<a class="nav-link" href="/index.php/About/Index">About</a>
  						<a class="nav-link" href="/index.php/Collections/Index">Order of Battle</a>
  						<a class="nav-link" href="/index.php/Browse/objects">Browse</a>

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
		
<!-- BEGIN #content -->
			<div id="content" class="app-content">
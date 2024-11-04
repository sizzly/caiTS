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
		<link href="/themes/caiTS/assets/pawtucket/css/vendor.min.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/pawtucket/css/theme.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/pawtucket/css/mods.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/pawtucket/plugins//lity/dist/lity.min.css" rel="stylesheet" />

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
  						<a class="nav-link" href="/index.php/About/Index">About</a>
  						<a class="nav-link" href="/index.php/Collections/Index">Order of Battle</a>
  						<a class="nav-link" href="/index.php/Browse/objects">Browse</a>
					</nav>
				</div>
<!-- END menu -->
			</div>
<!-- END #header -->
		
<!-- BEGIN #content -->
			<div id="content" class="app-content">
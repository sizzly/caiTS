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
	<div id="app" class="app app-content-full-width">

<!-- BEGIN #header -->
		<div id="header" class="app-header">
		
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
				<div class="menu-item dropdown dropdown-mobile-full">
    <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
        <div class="menu-icon"><i class="bi bi-grid-3x3-gap nav-icon"></i></div>
    </a>
    <div class="dropdown-menu fade dropdown-menu-end w-300px text-center p-0 mt-1">
        <div class="row row-grid gx-0">
            <div class="col-4">
                <a href="/" class="dropdown-item text-decoration-none p-3 bg-none">
                    <div class="position-relative">
                        <i class="ti ti-home h2 opacity-5 d-block my-1"></i>
                    </div>
                    <div class="fw-500 fs-10px text-white">HOME</div>
                </a>
            </div>
            <div class="col-4">
                <a href="/index.php/About/Index" target="_blank" class="dropdown-item text-decoration-none p-3 bg-none">
                    <div><i class="ti ti-info-circle h2 opacity-5 d-block my-1"></i></div>
                    <div class="fw-500 fs-10px text-white">ABOUT</div>
                </a>
            </div>
            <div class="col-4">
                <a href="/index.php/Browse/objects" class="dropdown-item text-decoration-none p-3 bg-none">
                    <div><i class="ti ti-binoculars h2 opacity-5 d-block my-1"></i></div>
                    <div class="fw-500 fs-10px text-white">BROWSE</div>
                </a>
            </div>
        </div>
        <div class="row row-grid gx-0">
            <div class="col-8">
                <a href="/index.php/Collections/Index" class="dropdown-item text-decoration-none p-3 bg-none">
                    <div><i class="ti ti-sitemap h2 opacity-5 d-block my-1"></i></div>
                    <div class="fw-500 fs-10px text-white">ORDER OF BATTLE</div>
                </a>
            </div>
        </div>
    </div>
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
	
<!-- BEGIN #content -->
		<div id="content" class="app-content">
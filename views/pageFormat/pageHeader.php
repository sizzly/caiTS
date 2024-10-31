<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php : 
 * ----------------------------------------------------------------------
 */
	$va_lightboxDisplayName = caGetLightboxDisplayName();
	$vs_lightbox_sectionHeading = ucFirst($va_lightboxDisplayName["section_heading"]);
	$va_classroomDisplayName = caGetClassroomDisplayName();
	$vs_classroom_sectionHeading = ucFirst($va_classroomDisplayName["section_heading"]);
	
# Collect the user links: they are output twice, once for toggle menu and once for nav
	$va_user_links = array();
	if($this->request->isLoggedIn()){
		$va_user_links[] = '<li role="presentation" class="dropdown-header">'.trim($this->request->user->get("fname")." ".$this->request->user->get("lname")).', '.$this->request->user->get("email").'</li>';
		$va_user_links[] = '<li class="divider nav-divider"></li>';
		if(caDisplayLightbox($this->request)){
			$va_user_links[] = "<li>".caNavLink($this->request, $vs_lightbox_sectionHeading, '', '', 'Lightbox', 'Index', array())."</li>";
		}
		if(caDisplayClassroom($this->request)){
			$va_user_links[] = "<li>".caNavLink($this->request, $vs_classroom_sectionHeading, '', '', 'Classroom', 'Index', array())."</li>";
		}
		$va_user_links[] = "<li>".caNavLink($this->request, _t('User Profile'), '', '', 'LoginReg', 'profileForm', array())."</li>";
		$va_user_links[] = "<li>".caNavLink($this->request, _t('Logout'), '', '', 'LoginReg', 'Logout', array())."</li>";
	} else {	
		if (!$this->request->config->get(['dontAllowRegistrationAndLogin', 'dont_allow_registration_and_login']) || $this->request->config->get('pawtucket_requires_login')) { $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'LoginForm', array())."\"); return false;' >"._t("Login")."</a></li>"; }
		if (!$this->request->config->get(['dontAllowRegistrationAndLogin', 'dont_allow_registration_and_login']) && !$this->request->config->get('dontAllowRegistration')) { $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array())."\"); return false;' >"._t("Register")."</a></li>"; }
	}
	$vb_has_user_links = (sizeof($va_user_links) > 0);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>HUD | Full Width</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
	
		<!-- ================== BEGIN core-css ================== -->
		<link href="/themes/caiTS/assets/pawtucket/css/vendor.min.css" rel="stylesheet" />
		<link href="/themes/caiTS/assets/pawtucket/css/theme.css" rel="stylesheet" />
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
  						<a class="nav-link" href="/index.php/Gallery/Index">Galleries</a>
  						<a class="nav-link" href="/index.php/Collections/Index">Order of Battle</a>
  						<a class="nav-link" href="/index.php/Browse/objects">Browse</a>
					</nav>
				</div>
<!-- END menu -->
			</div>
<!-- END #header -->
		
<!-- BEGIN #content -->
			<div id="content" class="app-content">
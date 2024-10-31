<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
?>

	<div class="row">
		<div class="col-sm-12">
			<H1><?php print _t("About"); ?></H1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<h2>I'm a Dark Eldar Snob</h2>
			<p>But I also have anger management issues so I also play World Eaters.</p>
		</div>
		<div class="col-sm-3 col-sm-offset-1">
			<address>iToysoldiers<br>			24 Azar Ave<br>			Tilbury, On, N0P-2L0</address>
		
			<address>Rob Tacey, Dork<br>			<span class="info">Email</span> — <a href="#">rob@robtacey.com</a></address>
		</div>
	</div>

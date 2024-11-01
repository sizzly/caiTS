<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">About iToysoldiers
						<small>Because the content isn't clear enough</small>
					</h1>
					<hr class="mb-4" />
					<div id="topWidget" class="mb-5">
						<div class="bg-white bg-opacity-25 p-5 rounded-3">
  							<h1 class="display-4">I'm a Dark Eldar Snob</h1>
  							<p class="lead">But I also have anger management issues so I play World Eaters too.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3">
					<!-- BEGIN #sidebar -->
					<nav class="navbar navbar-sticky d-none d-xl-block">
						<nav class="nav">
							<a class="nav-link" href="#topWidget" data-toggle="scroll-to">Top</a>
						</nav>
					</nav>
					<!-- END #sidebar -->

				</div>
			</div>
		</div>
	</div>
</div>
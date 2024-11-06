<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 */
	$o_db = new Db();
	$qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
	$qr_objects->nextRow(); // the result has only 1 row.
	$vn_count = $qr_objects->get('c'); // this should be your count
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">iToysoldiers.com</h1>
					<hr class="mb-4" />
					<div it="itsWidget" class="mb-3">
						<p class="lead">iToysoldiers is an archive of my miniature wargaming collection.</p>
					</div>
					<div id="statsWidget" class="mb-3">
						<div class="row">
							<div class="col-lg-12">
								<div class="card text-decoration-none mb-3">
  									<div class="card-body d-flex align-items-center text-white m-5px bg-white bg-opacity-15">
    									<div class="flex-fill">
      										<div class="mb-1">Collection Count</div>
      										<h2><?php print $vn_count; ?></h2>
    									</div>
    									<div class="opacity-5">
      										<i class="fas fa-archive fa-4x"></i>
    									</div>
  									</div>
  									<div class="card-arrow">
										<div class="card-arrow-top-left"></div>
										<div class="card-arrow-top-right"></div>
										<div class="card-arrow-bottom-left"></div>
										<div class="card-arrow-bottom-right"></div>
  									</div>
								</div>
  							</div>
							<!--
							<div class="col-lg-6">
								<div class="card mb-3">
									<div class="card-header fw-bold small">STATS 2</div>
									<div class="card-body">content</div>
									<div class="card-arrow">
										<div class="card-arrow-top-left"></div>
										<div class="card-arrow-top-right"></div>
										<div class="card-arrow-bottom-left"></div>
										<div class="card-arrow-bottom-right"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="card mb-3">
									<div class="card-header fw-bold small">STATS 3</div>
									<div class="card-body">content</div>
									<div class="card-arrow">
										<div class="card-arrow-top-left"></div>
										<div class="card-arrow-top-right"></div>
										<div class="card-arrow-bottom-left"></div>
										<div class="card-arrow-bottom-right"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="card mb-3">
									<div class="card-header fw-bold small">STATS 4</div>
									<div class="card-body">content</div>
									<div class="card-arrow">
										<div class="card-arrow-top-left"></div>
										<div class="card-arrow-top-right"></div>
										<div class="card-arrow-bottom-left"></div>
										<div class="card-arrow-bottom-right"></div>
									</div>
								</div>
							</div>
							-->
						</div>
					</div>

					<div id="featuredWidget" class="mb-3">
						<div class="card mb-3">
							<div class="card-header fw-bold small">FEATURED ITEMS</div>
							<div class="card-body">
								<?php
									print $this->render("Front/featured_set_slideshow_html.php");
								?>	
							</div>
  							<div class="card-arrow">
    							<div class="card-arrow-top-left"></div>
    							<div class="card-arrow-top-right"></div>
    							<div class="card-arrow-bottom-left"></div>
    							<div class="card-arrow-bottom-right"></div>
  							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3">
					<!-- BEGIN #sidebar -->
					<nav class="navbar navbar-sticky d-none d-xl-block">
						<nav class="nav">
							<a class="nav-link" href="#itsWidget" data-toggle="scroll-to">iToysoldiers</a>
							<a class="nav-link" href="#statsWidget" data-toggle="scroll-to">Quick Stats</a>
							<a class="nav-link" href="#featuredWidget" data-toggle="scroll-to">Featured Items</a>
						</nav>
					</nav>
					<!-- END #sidebar -->
				</div>
			</div>
		</div>
	</div>
</div>
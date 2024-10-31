<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 */
	$o_db = new Db();
	$qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
	$qr_objects->nextRow(); // the result has only 1 row.
	$vn_count = $qr_objects->get('c'); // this should be your count

	mysqli_close($o_db);
?>

<div class="row">
	<div class="col-xl-3 col-lg-6">
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
  
  			<!-- card-arrow -->
  			<div class="card-arrow">
    			<div class="card-arrow-top-left"></div>
    			<div class="card-arrow-top-right"></div>
    			<div class="card-arrow-bottom-left"></div>
    			<div class="card-arrow-bottom-right"></div>
  			</div>
		</div>
  	</div>
 
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3">
			<div class="card-header fw-bold small">STATS 2</div>
			<div class="card-body">content</div>
  			<!-- card-arrow -->
  			<div class="card-arrow">
    			<div class="card-arrow-top-left"></div>
    			<div class="card-arrow-top-right"></div>
    			<div class="card-arrow-bottom-left"></div>
    			<div class="card-arrow-bottom-right"></div>
  			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3">
			<div class="card-header fw-bold small">STATS 3</div>
			<div class="card-body">content</div>
  			<!-- card-arrow -->
  			<div class="card-arrow">
    			<div class="card-arrow-top-left"></div>
    			<div class="card-arrow-top-right"></div>
    			<div class="card-arrow-bottom-left"></div>
    			<div class="card-arrow-bottom-right"></div>
  			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6">
		<div class="card mb-3">
			<div class="card-header fw-bold small">STATS 4</div>
			<div class="card-body">content</div>
  			<!-- card-arrow -->
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
			<div class="card-header fw-bold small">FEATURED ITEMS</div>
			<div class="card-body">
				<?php
					print $this->render("Front/featured_set_grid_html.php");
				?>	
			</div>
  			<!-- card-arrow -->
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
			<div class="card-header fw-bold small">GALLERIES</div>
			<div class="card-body">
				<?php
					print $this->render("Front/gallery_set_links_html.php");
				?>	
			</div>
  			<!-- card-arrow -->
  			<div class="card-arrow">
    			<div class="card-arrow-top-left"></div>
    			<div class="card-arrow-top-right"></div>
    			<div class="card-arrow-bottom-left"></div>
    			<div class="card-arrow-bottom-right"></div>
  			</div>
		</div>
	</div>
	<div class="col-xl-6"></div>
	<div class="col-xl-6"></div>
</div>
<?php
	$va_sets = $this->getVar("sets");
	$va_first_items_from_set = $this->getVar("first_items_from_sets");
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">Featured Galleries
						<small>Models of which I am paricularly proud</small>
					</h1>
					<hr class="mb-4" />
					<div id="carouselWidget" class="mb-5">
						<div id="carouselExample" class="carousel slide" data-ride="carousel">
  							<div class="carousel-inner">
								<?php
								$i = 0;
								foreach($va_sets as $vn_set_id => $va_set){
									if(!$vn_first_set_id){
										$vn_first_set_id = $vn_set_id;
									}
									if($i == 0){
										print "<li>";
									}
									$va_first_item = array_shift($va_first_items_from_set[$vn_set_id]);
									print caNavUrl($this->request, '*', 'Gallery', 'getSetInfo', array('set_id' => $vn_first_set_id));
								}
								?>


  							</div>
  							<a class="carousel-control-prev" href="#carouselExample" data-bs-slide="prev">
    							<span class="carousel-control-prev-icon"></span>
    							<span class="sr-only">Previous</span>
  							</a>
  							<a class="carousel-control-next" href="#carouselExample" data-bs-slide="next">
    							<span class="carousel-control-next-icon"></span>
  							</a>
						</div>
					</div>
				</div>

				<div class="col-xl-3">
					Nav Bar
				</div>
			</div>
		</div>
	</div>
</div>
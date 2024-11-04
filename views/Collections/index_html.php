<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": Order of Battle");
	$o_collections_config = $this->getVar("collections_config");
	$qr_collections = $this->getVar("collection_results");
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">Order of Battle
						<small>collection organization</small>
					</h1>
					<hr class="mb-4" />
					<div id="collectionsWidget" class="mb-3">
						<?php	
							$vn_i = 0;
							if($qr_collections && $qr_collections->numHits()) {
								while($qr_collections->nextHit()) {
									if ( $vn_i == 0) { print "<div class='row'>"; } 
										print "<div class='col-sm-6'><div class='collectionTile'><div class='title'>".caDetailLink($this->request, $qr_collections->get("ca_collections.preferred_labels"), "", "ca_collections",  $qr_collections->get("ca_collections.collection_id"))."</div>";	
										if (($o_collections_config->get("description_template")) && ($vs_scope = $qr_collections->getWithTemplate($o_collections_config->get("description_template")))) {
											print "<div>".$vs_scope."</div>";
										}
										print "</div></div>";
										$vn_i++;
										if ($vn_i == 2) {
											print "</div><!-- end row -->\n";
											$vn_i = 0;
										}
									}
									if (($vn_i < 2) && ($vn_i != 0) ) {
										print "</div><!-- end row -->\n";
									}
							} else {
								print _t('No collections available');
							}
						?>
					</div>
				</div>
				<div class="col-xl-3">
					<!-- BEGIN #sidebar -->
					<nav class="navbar navbar-sticky d-none d-xl-block">
						<nav class="nav">
							<a class="nav-link" href="#collectionsWidget" data-toggle="scroll-to">Collections</a>
						</nav>
					</nav>
					<!-- END #sidebar -->
				</div>
			</div>
		</div>
	</div>
</div>

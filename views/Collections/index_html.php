<?php
	$o_collections_config = $this->getVar("collections_config");
	$qr_collections = $this->getVar("collection_results");
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": Order of Battle");
?>
<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Order of Battle</li>
</ul>
<h1 class="page-header">Order of Battle
    <small>The organization structure of my collection</small>
</h1>
<hr class="mb-4" />

<div class="card">
	<div class="card-body p-3">
		<div class="table-responsive border rounded">
			<table class="table align-middle text-nowrap mb-0">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col"></th>
						<th scope="col"></th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody> 
<?php	
				if($qr_collections && $qr_collections->numHits()) {
					while($qr_collections->nextHit()) {
?>
						<tr>
							<td>
								<div class="d-flex align-items-center">
									<div class="ms-3">
										<h4 class="mb-0"><?php print caDetailLink($this->request, $qr_collections->get("ca_collections.preferred_labels"), "", "ca_collections",  $qr_collections->get("ca_collections.collection_id")); ?></h4>
										<p class="mb-0"><?php print $qr_collections->get("ca_collections.description"); ?></p>
									</div>
								</div>
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
<?php
					}
				} else {
					print _t('No collections available');
				}
?>
				</tbody>
			</table>	
		</div>
	</div>
	<div class='card-arrow'>
		<div class='card-arrow-top-left'></div>
		<div class='card-arrow-top-right'></div>
		<div class='card-arrow-bottom-left'></div>
		<div class='card-arrow-bottom-right'></div>
	</div>
</div>
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
	<div class="card-header fw-bold small bg-white bg-opacity-15">FACTIONS AND UNITS</div>
	<div class="list-group">

<?php	
		if($qr_collections && $qr_collections->numHits()) {
			while($qr_collections->nextHit()) {
				if(!($col_img_url = $qr_collections->get('ca_collections.collection_media.media.tiny.url'))) {
					$col_img = '<i class="ti ti-sitemap display-5 rounded-circle"></i>';
				
				}else{
					$col_img = '<img src="'.$col_img_url.'" class="rounded-circle">';
				
				}
?>
				<a href="/index.php/Detail/collections/<?php print $qr_collections->get("ca_collections.collection_id"); ?>" class="d-flex list-group-item list-group-item-action">
					<div class="w-80px h-80px d-flex align-items-center justify-content-center ms-n1 bg-dark rounded-circle">
						<?php print $col_img; ?>
					</div>
					<div class="flex-fill ps-3">
						<h4 class="mb-0"><?php print $qr_collections->get("ca_collections.preferred_labels.name"); ?></h4>
						<p class="mb-0"><?php print $qr_collections->get("ca_collections.description"); ?></p>
					</div>
				</a>
<?php
			}
		} else {
			print _t('No collections available');
		}
?>
	</div>
	<div class='card-arrow'>
		<div class='card-arrow-top-left'></div>
		<div class='card-arrow-top-right'></div>
		<div class='card-arrow-bottom-left'></div>
		<div class='card-arrow-bottom-right'></div>
	</div>
</div>
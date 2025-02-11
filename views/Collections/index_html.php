<?php
	$o_collections_config = $this->getVar("collections_config");
	$qr_collections = $this->getVar("collection_results");
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": Order of Battle");
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Order of Battle</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="/">Home</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">Order of Battle</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <!-- Future home of nav: prev/next/etc -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row el-element-overlay">
    


					<?php	
        if($qr_collections && $qr_collections->numHits()) {
            while($qr_collections->nextHit()) {
                if(!($col_img_url = $qr_collections->get('ca_collections.collection_media.media.widepreview.url'))) {
                    $col_img = '<img src="/themes/caiTS/assets/img/Locked_wide.png" class="d-block position-relative w-100">';
                
                }else{
                    $col_img = '<img src="'.$col_img_url.'" class="d-block position-relative w-100">';
                
                }
?>
<div class="col-lg-3 col-md-6">
        <div class="card overflow-hidden">
            <div class="el-card-item pb-3">
                <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                    <?php print $col_img; ?>
                </div>
                <div class="el-card-content text-center">
                    <a href="/index.php/Detail/collections/<?php print $qr_collections->get("ca_collections.collection_id"); ?>">    
                        <h4 class="mb-0 card-title"><?php print $qr_collections->get("ca_collections.preferred_labels.name"); ?></h4>
                    </a>
                    <p class="card-subtitle">&nbsp</p>
                </div>
            </div>
        </div>
			</div>
<?php
			}
		} else {
			print _t('No collections available');
		}
?>


</div>

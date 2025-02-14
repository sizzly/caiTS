<?php
/* ----------------------------------------------------------------------
 * themes/default/views/Search/ca_entities_search_subview_html.php : 
 * ----------------------------------------------------------------------
 */
 
	$qr_results 		= $this->getVar('result');
	$va_block_info 		= $this->getVar('blockInfo');
	$vs_block 			= $this->getVar('block');
	$vn_start		 	= (int)$this->getVar('start');			// offset to seek to before outputting results
	$vn_hits_per_block 	= (int)$this->getVar('itemsPerPage');
	$vn_items_per_column = (int)$this->getVar('itemsPerColumn');
	$vb_has_more 		= (bool)$this->getVar('hasMore');
	$vs_search 			= (string)$this->getVar('search');
	$vn_init_with_start	= (int)$this->getVar('initializeWithStart');
	$o_config = $this->getVar("config");
	$o_browse_config = caGetBrowseConfig();
	$va_browse_types = array_keys($o_browse_config->get("browseTypes"));
	$vs_caption_template = $va_block_info["caption_template"];
	if(!$vs_caption_template){
		$vs_caption_template = "<l>^ca_entities.preferred_labels.displayname</l>";
	}
	$va_access_values = caGetUserAccessValues($this->request);
	

	if ($qr_results->numHits() > 0) {
		if (!$this->request->isAjax()) {
			if(in_array($vs_block, $va_browse_types)){
				print '<h5 class="card-title">'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h5>';
			}else{
				print '<h5 class="card-title">'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h5>';
			}
		}
		while($qr_results->nextHit()) {
			$vs_id = $qr_results->get('ca_entities.entity_id', array("checkAccess" => $va_access_values));
?>
<div class="col-md-6 d-flex align-items-stretch">
	<div class="card w-100">
		<div class="p-4 align-items-stretch h-100">
			<div class="row">
				<div class="col-4 col-md-3 d-flex align-items-center">
					<div class="d-flex align-items-center justify-content-center">
						<i class="ti ti-affiliate display-4"></i>
					</div>
				</div>
				<div class="col-8 col-md-9 d-flex align-items-center">
					<div>
						<a href="/index.php/Detail/entities/<?php print $vs_id; ?>" class="card-title link-primary fw-semibold text-dark">
							<?php print $qr_results->get('ca_entities.preferred_labels.displayname', array("checkAccess" => $va_access_values)); ?>
						</a>
						<p class="card-subtitle mt-1">
							&nbsp;
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
		}
	}
?>
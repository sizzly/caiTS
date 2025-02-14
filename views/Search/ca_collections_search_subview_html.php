<?php
/* ----------------------------------------------------------------------
 * themes/default/views/Search/ca_collections_search_subview_html.php : 
 * ----------------------------------------------------------------------
 */
 
	$qr_results 		= $this->getVar('result');
	$va_block_info 		= $this->getVar('blockInfo');
	$va_options 		= $va_block_info["options"];
	$vs_block 			= $this->getVar('block');
	$vn_start		 	= (int)$this->getVar('start');			// offset to seek to before outputting results
	$vn_hits_per_block 	= (int)$this->getVar('itemsPerPage');
	$vb_has_more 		= (bool)$this->getVar('hasMore');
	$vs_search 			= (string)$this->getVar('search');
	$vn_init_with_start	= (int)$this->getVar('initializeWithStart');
	$va_access_values = caGetUserAccessValues($this->request);
	$o_browse_config = caGetBrowseConfig();
	$va_browse_types = array_keys($o_browse_config->get("browseTypes"));
	$o_config = caGetSearchConfig();
	$o_icons_conf = caGetIconsConfig();
	if(!($vs_default_placeholder = $o_icons_conf->get("placeholder_media_icon"))){
		$vs_default_placeholder = "<i class='fa fa-picture-o fa-2x'></i>";
	}
	$vs_default_placeholder_tag = "<div class='multisearchImgPlaceholder'>".$vs_default_placeholder."</div>";

	if ($qr_results->numHits() > 0) {
		if (!$this->request->isAjax()) {
			if(in_array($vs_block, $va_browse_types)){
				print '<h5 class="card-title">'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h5>';
			}else{
				print '<h5 class="card-title">'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h5>';
			}

		}
		
						$va_collection_ids = array();
						while($qr_results->nextHit()) {
							$va_collection_ids[] = $qr_results->get('ca_collections.collection_id');
						}
						$qr_results->seek($vn_start);
		
						$va_images = caGetDisplayImagesForAuthorityItems('ca_collections', $va_collection_ids, array('version' => 'iconlarge', 'relationshipTypes' => caGetOption('selectMediaUsingRelationshipTypes', $va_options, null), 'objectTypes' => caGetOption('selectMediaUsingTypes', $va_options, null), 'checkAccess' => $va_access_values));
			
						$vn_count = 0;
						while($qr_results->nextHit()) {
								$vs_image_tag = "";
								if (sizeof($va_images) > 0){
									$vs_image = $va_images[$qr_results->get('ca_collections.collection_id')];
									if($vs_image){
										$vs_image_tag = $qr_results->get('ca_object_representations.media.iconlarge.url', array("checkAccess" => $va_access_values));
									} 
								}
								if(!$vs_image_tag){
									$vs_image_tag = $qr_results->getWithTemplate("{$vs_placeholder_tag}");
								}
?>
<div class="col-md-6 d-flex align-items-stretch">
	<div class="card w-100">
		<div class="p-4 align-items-stretch h-100">
			<div class="row">
				<div class="col-4 col-md-3 d-flex align-items-center">
					<i class="ti ti-sitemap display-4"></i>
				</div>
				<div class="col-8 col-md-9 d-flex align-items-center">
					<a href="/index.php/Detail/collections/<?php print $qr_results->get('ca_collections.collection_id'); ?>" class="card-title link-primary fw-semibold text-dark">
						<?php print $qr_results->get('ca_collections.preferred_labels.name', array('returnAsLink' => false)); ?>
					</a>
					<p class="card-subtitle mt-1">
						&nbsp;
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
							$vn_count++;
							if ((!$vn_init_with_start && ($vn_count == $vn_hits_per_block)) || ($vn_init_with_start && ($vn_count >= $vn_init_with_start))) {break;} 
						}
						if (!$this->request->isAjax()) {

		}else{
			# --- need to change sort direction to catch default setting for direction when sort order has changed
			if($this->getVar("sortDirection") == "desc"){
?>
				
<?php
			}else{
			}
		}
	}
?>
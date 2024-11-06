<?php
/* ----------------------------------------------------------------------
 * themes/default/views/Search/ca_objects_search_subview_html.php : 
 * ----------------------------------------------------------------------
 */
 
	$qr_results 		= $this->getVar('result');
	$va_block_info 		= $this->getVar('blockInfo');
	$vs_block 			= $this->getVar('block');
	$vn_start		 	= (int)$this->getVar('start');			// offset to seek to before outputting results
	$vn_hits_per_block 	= (int)$this->getVar('itemsPerPage');
	$vb_has_more 		= (bool)$this->getVar('hasMore');
	$vs_search 			= (string)$this->getVar('search');
	$vn_init_with_start	= (int)$this->getVar('initializeWithStart');
	$va_access_values = caGetUserAccessValues($this->request);
	$o_config = caGetSearchConfig();
	$o_browse_config = caGetBrowseConfig();
	$va_browse_types = array_keys($o_browse_config->get("browseTypes"));
	$o_icons_conf = caGetIconsConfig();
	$va_object_type_specific_icons = $o_icons_conf->getAssoc("placeholders");
	if(!($vs_default_placeholder = $o_icons_conf->get("placeholder_media_icon"))){
		$vs_default_placeholder = "<i class='fa fa-picture-o fa-2x'></i>";
	}
	$vs_default_placeholder_tag = "<div class='multisearchImgPlaceholder'>".$vs_default_placeholder."</div>";

	if ($qr_results->numHits() > 0) {
		if (!$this->request->isAjax()) {
			if(in_array($vs_block, $va_browse_types)){
				print '<h3>'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h3>';
			}else{
				print '<h3>'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h3>';
			}
?>
			<div class='blockResults objects'>
				<div id='{{{block}}}Results' class='multiSearchResults'>
					<div class='list-group'>
<?php
		}
		$vn_count = 0;
		$t_list_item = new ca_list_items();
		while($qr_results->nextHit()) {
?>
			<div class='{{{block}}}Result multisearchResult'>
<?php 
				$vs_image = $qr_results->get('ca_object_representations.media.iconlarge.url', array("checkAccess" => $va_access_values));
				if(!$vs_image){
					$t_list_item->load($qr_results->get("type_id"));
					$vs_typecode = $t_list_item->get("idno");
					if($vs_type_placeholder = caGetPlaceholder($vs_typecode, "placeholder_media_icon")){
						$vs_image = "<div class='multisearchImgPlaceholder'>".$vs_type_placeholder."</div>";
					}else{
						$vs_image = $vs_default_placeholder_tag;
					}
				}			
?>
				<a href="/index.php/Detail/objects/<?php print $qr_results->get('ca_objects.object_id'); ?>" class="list-group-item list-group-item-action d-flex align-items-center text-white">
    				<div class="w-80px h-80px d-flex align-items-center justify-content-center ms-n1">
      					<img src="<?php print $vs_image; ?>" class="ms-100 mh-100 rounded-circle" />
    				</div>
    				<div class="flex-fill ps-3">
    					<div class="fw-bold">
							<?php print $qr_results->get('ca_objects.preferred_labels.name', array('returnAsLink' => false)); ?>
      					</div>
    				</div>
				</a>	
			</div><!-- end blockResult -->
<?php
			$vn_count++;
			if ((!$vn_init_with_start && ($vn_count == $vn_hits_per_block)) || ($vn_init_with_start && ($vn_count >= $vn_init_with_start))) {break;} 
		}
?>


<!-- Where the code for AJAX Goes -->
<?php	
		if (!$this->request->isAjax()) {
?>
			</div><!-- end blockResultsScroller -->
		</div>
	</div><!-- end blockResults -->
<?php
		}else{
			# --- need to change sort direction to catch default setting for direction when sort order has changed
			if($this->getVar("sortDirection") == "desc"){
?>
				
<?php
			}else{
?>
				
<?php
			}
		}
	}
?>
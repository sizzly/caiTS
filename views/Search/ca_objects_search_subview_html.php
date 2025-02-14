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
				?>
				<?php print '<h5 class="card-title">'.caNavLink($this->request, $va_block_info['displayName'].' ('.$qr_results->numHits().')', '', '', 'Search', '{{{block}}}', array('search' => $vs_search)).'</H5>'; ?>
			<?php
			}else{
				print '<h5 class="card-title">'.$va_block_info['displayName'].' ('.$qr_results->numHits().')'.'</h5>';
			}
		}
		$vn_count = 0;
		$t_list_item = new ca_list_items();
		while($qr_results->nextHit()) {
			$vs_image = $qr_results->get('ca_object_representations.media.icon.url', array("checkAccess" => $va_access_values));
			if(!$vs_image){
				$t_list_item->load($qr_results->get("type_id"));
				$vs_typecode = $t_list_item->get("idno");
				if($vs_type_placeholder = caGetPlaceholder($vs_typecode, "placeholder_media_icon")){
					$vs_image = "/themes/caiTS/assets/img/Locked_icon.png";
				}else{
					$vs_image = "/themes/caiTS/assets/img/Locked_icon.png";
				}
			}			
?>
<div class="col-md-6 d-flex align-items-stretch">
	<div class="card w-100">
		<div class="p-4 align-items-stretch h-100">
			<div class="row">
				<div class="col-4 col-md-3 d-flex align-items-center">
					<img src="<?php print $vs_image; ?>" class="rounded img-fluid w-80px h-80px">
				</div>
				<div class="col-8 col-md-9 d-flex align-items-center">
					<div>
						<a href="/index.php/Detail/objects/<?php print $qr_results->get('ca_objects.object_id'); ?>" class="card-title link-primary fw-semibold text-dark">
							<?php print $qr_results->get('ca_objects.preferred_labels.name', array('returnAsLink' => false)); ?>
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
			$vn_count++;
			if ((!$vn_init_with_start && ($vn_count == $vn_hits_per_block)) || ($vn_init_with_start && ($vn_count >= $vn_init_with_start))) {break;} 
		}
	}
?>


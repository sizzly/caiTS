<?php
/* ----------------------------------------------------------------------
 * views/Browse/browse_results_html.php : 
 * ----------------------------------------------------------------------
 */

	$qr_res 			= $this->getVar('result');				// browse results (subclass of SearchResult)
	$va_facets 			= $this->getVar('facets');				// array of available browse facets
	$va_criteria 		= $this->getVar('criteria');			// array of browse criteria
	$vs_browse_key 		= $this->getVar('key');					// cache key for current browse
	$va_access_values 	= $this->getVar('access_values');		// list of access values for this user
	$vn_hits_per_block 	= (int)$this->getVar('hits_per_block');	// number of hits to display per block
	$vn_start		 	= (int)$this->getVar('start');			// offset to seek to before outputting results
	$vn_is_advanced		= (int)$this->getVar('is_advanced');
	$vb_showLetterBar	= (int)$this->getVar('showLetterBar');	
	$va_letter_bar		= $this->getVar('letterBar');	
	$vs_letter			= $this->getVar('letter');
	$vn_row_id 			= $this->request->getParameter('row_id', pInteger);
	
	$va_views			= $this->getVar('views');
	$vs_current_view	= $this->getVar('view');
	$va_view_icons		= $this->getVar('viewIcons');
	
	$vs_current_sort	= $this->getVar('sort');
	$vs_sort_dir		= $this->getVar('sort_direction');
	
	$vs_table 			= $this->getVar('table');
	$t_instance			= $this->getVar('t_instance');
	
	$vb_is_search		= ($this->request->getController() == 'Search');

	$vn_result_size 	= (sizeof($va_criteria) > 0) ? $qr_res->numHits() : $this->getVar('totalRecordsAvailable');
	
	
	$va_options			= $this->getVar('options');
	$vs_extended_info_template = caGetOption('extendedInformationTemplate', $va_options, null);
	$vb_ajax			= (bool)$this->request->isAjax();
	$va_browse_info = $this->getVar("browseInfo");
	$vs_sort_control_type = caGetOption('sortControlType', $va_browse_info, 'dropdown');
	$o_config = $this->getVar("config");
	$vs_result_col_class = $o_config->get('result_col_class');
	$vs_refine_col_class = $o_config->get('refine_col_class');
	$va_export_formats = $this->getVar('export_formats');
	$va_browse_type_info = $o_config->get($va_browse_info["table"]);
	$va_all_facets = $va_browse_type_info["facets"];	
	$va_add_to_set_link_info = caGetAddToSetInfo($this->request);
	
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Browse</h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="../horizontal/index.html">Home</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">Browse</li>
					</ol>
				</nav>
			</div>
			<div class="col-3">
				<div class="text-center mb-n5">
				
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card position-relative overflow-hidden">
    <div class="shop-part d-flex w-100">
        <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block">
			<div class='bCriteria p-4'>
				<h6>Applied Filters</h6>
<?php
				if (sizeof($va_criteria) > 0) {
					$i = 0;
					foreach($va_criteria as $va_criterion) {
						
						if ($va_criterion['facet_name'] != '_search') {
							print caNavLink($this->request, '<button type="button" class="btn btn-default btn-sm m-1">'.$va_criterion['value'].' <span class="glyphicon glyphicon-remove-circle" aria-label="Remove filter" role="button"></span></button>', 'browseRemoveFacet', '*', '*', '*', array('removeCriterion' => $va_criterion['facet_name'], 'removeID' => urlencode($va_criterion['id']), 'view' => $vs_current_view, 'key' => $vs_browse_key));
						}else{
							print ' '.$va_criterion['value'];
							$vs_search = $va_criterion['value'];
						}
						$i++;
						if($i < sizeof($va_criteria)){
							print " ";
						}
						$va_current_facet = $va_all_facets[$va_criterion['facet_name']];
						if((sizeof($va_criteria) == 1) && !$vb_is_search && $va_current_facet["show_description_when_first_facet"] && ($va_current_facet["type"] == "authority")){
							$t_authority_table = new $va_current_facet["table"];
							$t_authority_table->load($va_criterion['id']);
							$vs_facet_description = $t_authority_table->get($va_current_facet["show_description_when_first_facet"]);
						}
					}
				}
?>		
			</div>
<?php
			print $this->render("Browse/browse_refine_subview_html.php");
?>	
        </div>

		<div class="card-body p-4 pb-0">
			<div class="d-flex justify-content-between align-items-center gap-6 mb-4">
				<a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#filtercategory" role="button" aria-controls="filtercategory">
					<i class="ti ti-menu-2 fs-6"></i>
				</a>
				<h5 class="fs-5 mb-0 d-none d-lg-block"><?php print _t('%1 %2 %3', $vn_result_size, ($va_browse_info["labelSingular"]) ? $va_browse_info["labelSingular"] : $t_instance->getProperty('NAME_SINGULAR'), ($vn_result_size == 1) ? _t("RESULT") : _t("RESULTS"));	?></h5>
				<div id="bViewButtons position-relative">
<?php
					if(is_array($va_views) && (sizeof($va_views) > 1)){
						foreach($va_views as $vs_view => $va_view_info) {
							if ($vs_current_view === $vs_view) {
								print '<a href="#" class="active"><span class="fs-6 ti '.$va_view_icons[$vs_view]['icon'].'" aria-label="'.$vs_view.'" role="button"></span></a> ';
							} else {
								print caNavLink($this->request, '<span class="fs-6 ti '.$va_view_icons[$vs_view]['icon'].'" aria-label="'.$vs_view.'" role="button"></span>', 'disabled', '*', '*', '*', array('view' => $vs_view, 'key' => $vs_browse_key)).' ';
							}
						}
					}
?>
				</div>
			</div>

            <div class="row">
<?php
				$vs_cache_key = md5($vs_browse_key.$vs_current_sort.$vs_sort_dir.$vs_current_view.$vn_start.$vn_hits_per_block.$vn_row_id.$vs_letter);
				if(($o_config->get("cache_timeout") > 0) && ExternalCache::contains($vs_cache_key,'browse_results')){
					print ExternalCache::fetch($vs_cache_key, 'browse_results');
				}else{
					$vs_result_page = $this->render("Browse/browse_results_{$vs_current_view}_html.php");
					ExternalCache::save($vs_cache_key, $vs_result_page, 'browse_results', $o_config->get("cache_timeout"));
					print $vs_result_page;
				}		
?>
            </div>
			<!-- Pagination -->
			<div class="m-3">
<?php
				$page_count = intval($vn_result_size/$vn_hits_per_block);
?>
				<ul class="pagination mb-0">
<?php
					if ($page_count < 1) {
?>
						<li class="page-item active"><a class="page-link">1</a></li>
<?php
					} else {
						$page_count++;
						$count = 1;
						while ($count <= $page_count) {
							$pag_start = ($count-1)*$vn_hits_per_block;
							if ($pag_start == $vn_start + $vn_results_output) {
								print '<li class="page-item active">';
							} else {
								print '<li class="page-item">';
							}
							print caNavLink($this->request, _t($count), 'page-link', '*', '*', '*', array('s' => ($count -1) * $vn_hits_per_block, 'key' => $vs_browse_key, 'view' => $vs_current_view, 'sort' => $vs_current_sort, '_advanced' => $this->getVar('is_advanced') ? 1  : 0));
							print '</li>';
							$count++;
						}
					}
?>
				</ul>
			</div>
			<!-- end Pagination -->
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="filtercategory" aria-labelledby="filtercategoryLabel">
            <div class="offcanvas-body shop-filters w-100 p-0">

                <div class="p-4">
                    <a href="javascript:void(0)" class="btn btn-primary w-100">Reset Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#browseResultsContainer').jscroll({
			autoTrigger: true,
			loadingHtml: "<?php print caBusyIndicatorIcon($this->request).' '.addslashes(_t('Loading...')); ?>",
			padding: 800,
			nextSelector: 'a.jscroll-next'
		});
<?php
		if($vn_row_id){
?>
			window.setTimeout(function() {
				$("window,body,html").scrollTop( $("#row<?php print $vn_row_id; ?>").offset().top);
			}, 0);
<?php
		}
		if(is_array($va_add_to_set_link_info) && sizeof($va_add_to_set_link_info)){
?>
		jQuery('#setsSelectMultiple').on('submit', function(e){		
			objIDs = [];
			jQuery('#setsSelectMultiple input:checkbox:checked').each(function() {
			   objIDs.push($(this).val());
			});
			objIDsAsString = objIDs.join(';');
			caMediaPanel.showPanel('<?php print caNavUrl($this->request, '', $va_add_to_set_link_info['controller'], 'addItemForm', array("saveSelectedResults" => 1)); ?>/object_ids/' + objIDsAsString);
			e.preventDefault();
			return false;
		});
<?php
		}
?>
	});

</script>
<?php
		print $this->render('Browse/browse_panel_subview_html.php');
?>


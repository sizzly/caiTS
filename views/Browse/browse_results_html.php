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
<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Browse</li>
</ul>
<h1 class="page-header">Browse
    <small>Filter by various criteria</small>
</h1>
<hr class="mb-4" />

<div class="row">
	<div class="col-md-3 mb-3">
		<div class='card'>
  			<div class='card-header fw-bold small bg-white bg-opacity-15'>FILTERS</div>
  			<div class='card-body'>
			  	<ul class='list-group pt-2'>
<?php
					if (sizeof($va_criteria) > 0) {
						print "<h6 class='my-3 mx-4'>Filters</h6>";
						$i = 0;
						foreach($va_criteria as $va_criterion) {
							
							if ($va_criterion['facet_name'] != '_search') {
								print caNavLink($this->request, '<li class="list-group-item border-0 p-0 mx-4 mb-2"><button type="button" class="btn btn-default btn-sm">'.$va_criterion['value'].' <span class="glyphicon glyphicon-remove-circle" aria-label="Remove filter" role="button"></span></button></li>', 'browseRemoveFacet', '*', '*', '*', array('removeCriterion' => $va_criterion['facet_name'], 'removeID' => urlencode($va_criterion['id']), 'view' => $vs_current_view, 'key' => $vs_browse_key));
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
				</ul>

<?php
				print $this->render("Browse/browse_refine_subview_html.php");
?>
  			</div>
  			<div class='card-arrow'>
				<div class='card-arrow-top-left'></div>
				<div class='card-arrow-top-right'></div>
				<div class='card-arrow-bottom-left'></div>
				<div class='card-arrow-bottom-right'></div>
			</div>
		</div>
	</div>
	<div class="col-md-9 mb-3">
		<div class='card'>
  			<div class='card-header fw-bold  bg-white bg-opacity-15 small'><?php print _t('%1 %2 %3', $vn_result_size, ($va_browse_info["labelSingular"]) ? $va_browse_info["labelSingular"] : $t_instance->getProperty('NAME_SINGULAR'), ($vn_result_size == 1) ? _t("RESULT") : _t("RESULTS"));	?></div>
			<div class='card-body'>
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
			</div>
			<div class='card-arrow'>
				<div class='card-arrow-top-left'></div>
				<div class='card-arrow-top-right'></div>
				<div class='card-arrow-bottom-left'></div>
				<div class='card-arrow-bottom-right'></div>
			</div>
		</div>
	</div>
</div>
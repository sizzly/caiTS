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
	
if (!$vb_ajax) {	// !ajax
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">
						<?php
							print _t('%1 %2 %3', $vn_result_size, ($va_browse_info["labelSingular"]) ? $va_browse_info["labelSingular"] : $t_instance->getProperty('NAME_SINGULAR'), ($vn_result_size == 1) ? _t("Result") : _t("Results"));	
						?>
					</h1>
					<hr class="mb-4" />
					<div id="resultsWidget" class="mb-5">
						<div class="row">
							<?php
								} // !ajax

								# --- check if this result page has been cached
								# --- key is MD5 of browse key, sort, sort direction, view, page/start, items per page, row_id
								$vs_cache_key = md5($vs_browse_key.$vs_current_sort.$vs_sort_dir.$vs_current_view.$vn_start.$vn_hits_per_block.$vn_row_id);
								if(($o_config->get("cache_timeout") > 0) && ExternalCache::contains($vs_cache_key,'browse_results')){
									print ExternalCache::fetch($vs_cache_key, 'browse_results');
								}else{
									$vs_result_page = $this->render("Browse/browse_results_{$vs_current_view}_html.php");
									ExternalCache::save($vs_cache_key, $vs_result_page, 'browse_results', $o_config->get("cache_timeout"));
									print $vs_result_page;
								}		

								if (!$vb_ajax) {	// !ajax
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-3">
					<!-- BEGIN #sidebar -->
					<nav class="navbar navbar-sticky d-none d-xl-block">
						<nav class="nav">
							<a class="nav-link" href="#resultsWidget" data-toggle="scroll-to">Results</a>
						</nav>
						
						<div class="browsenav">
							<hr class="mb-2" />
							<?php 
								if($vs_sort_control_type == 'list'){
									if(is_array($va_sorts = $this->getVar('sortBy')) && sizeof($va_sorts)) {
										print "<div id='bSortByList'><ul><li><strong>"._t("Sort by:")."</strong></li>\n";
										$i = 0;
										foreach($va_sorts as $vs_sort => $vs_sort_flds) {
											$i++;
											if ($vs_current_sort === $vs_sort) {
												print "<li class='selectedSort'>{$vs_sort}</li>\n";
											} else {
												print "<li>".caNavLink($this->request, $vs_sort, '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'sort' => $vs_sort, '_advanced' => $vn_is_advanced ? 1 : 0))."</li>\n";
											}
											if($i < sizeof($va_sorts)){
												print "<li class='divide'>&nbsp;</li>";
											}
										}
										print "<li>".caNavLink($this->request, '<span class="glyphicon glyphicon-sort-by-attributes'.(($vs_sort_dir == 'asc') ? '' : '-alt').'" aria-label="direction"></span>', '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'direction' => (($vs_sort_dir == 'asc') ? _t("desc") : _t("asc")), '_advanced' => $vn_is_advanced ? 1 : 0))."</li>";
										print "</ul></div>\n";
									}
								}
							?>
		
							<?php
								if (sizeof($va_criteria) > 0) {
									$i = 0;
									foreach($va_criteria as $va_criterion) {
										print "<strong>".$va_criterion['facet'].':</strong>';
										if ($va_criterion['facet_name'] != '_search') {
											print caNavLink($this->request, '<button type="button" class="btn btn-default btn-sm">'.$va_criterion['value'].' <span class="glyphicon glyphicon-remove-circle" aria-label="Remove filter"></span></button>', 'browseRemoveFacet', '*', '*', '*', array('removeCriterion' => $va_criterion['facet_name'], 'removeID' => urlencode($va_criterion['id']), 'view' => $vs_current_view, 'key' => $vs_browse_key));
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

							<?php
								if($vs_facet_description){
									print "<div class='bFacetDescription'>".$vs_facet_description."</div>";
								}

								if($vb_showLetterBar){
									print "<div id='bLetterBar'>";
									foreach(array_keys($va_letter_bar) as $vs_l){
										if(trim($vs_l)){
											print caNavLink($this->request, $vs_l, ($vs_letter == $vs_l) ? 'selectedLetter' : '', '*', '*', '*', array('key' => $vs_browse_key, 'l' => $vs_l))." ";
										}
									}
									print " | ".caNavLink($this->request, _t("All"), (!$vs_letter) ? 'selectedLetter' : '', '*', '*', '*', array('key' => $vs_browse_key, 'l' => 'all')); 
									print "</div>";
								}
							?>
							<form id="setsSelectMultiple">
								<div class="row">

								</div><!-- end row -->
							</form>

							<?php
								if(is_array($va_views) && (sizeof($va_views) > 1)){
									foreach($va_views as $vs_view => $va_view_info) {
										if ($vs_current_view === $vs_view) {
											print '<a href="#" class="active"><span class="glyphicon  '.$va_view_icons[$vs_view]['icon'].'" aria-label="'.$vs_view.'"></span></a> ';
										} else {
											print caNavLink($this->request, '<span class="glyphicon '.$va_view_icons[$vs_view]['icon'].'" aria-label="'.$vs_view.'"></span>', 'disabled', '*', '*', '*', array('view' => $vs_view, 'key' => $vs_browse_key)).' ';
										}
									}
								}
							?>

							<?php
								print $this->render("Browse/browse_refine_subview_html.php");
							?>


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
						</div>
					</nav>
					<!-- END #sidebar -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
} //!ajax
?>

<?php
/** ---------------------------------------------------------------------
 * themes/default/Lightbox/set_detail_html.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * @package CollectiveAccess
 * @subpackage theme/default
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License version 3
 *
 * ----------------------------------------------------------------------
 */
	$o_classroom_config 				= $this->getVar("classroom_config");
	$vs_classroom_displayname 			= $this->getVar("classroom_display_name");
	$vs_classroom_displayname_plural 	= $this->getVar("classroom_display_name_plural");
	$vs_classroom_section_heading		= $this->getVar("classroom_section_heading");

	$qr_set_items 					= $this->getVar("result");
	$t_set 							= $this->getVar("set");
	if($t_set->get("parent_id")){
		$t_parent_set = new ca_sets($t_set->get("parent_id"));
	}
	$vn_set_id						= $t_set->get("set_id");
	$va_set_item_info           	= $this->getVar("setItemInfo");
	$vb_write_access 				= $this->getVar("write_access");
	$va_access_values 				= caGetUserAccessValues($this->request);
			
	$va_views						= $this->getVar('views');
	$vs_current_view				= $this->getVar('view');
	$va_criteria					= $this->getVar('criteria');
	
	$vs_current_sort				= $this->getVar('sort');
	$vs_current_secondary_sort		= $this->getVar('secondarySort');
	$vs_sort_dir					= $this->getVar('sortDirection');
	$vs_sort_control_type 			= $o_classroom_config->get("sortControlType");
	if(!$vs_sort_control_type) { $vs_sort_control_type = "dropdown"; }
	
	$va_export_formats 				= $this->getVar('export_formats');
	$vs_browse_key 					= $this->getVar('key');
	$vn_hits_per_block 	            = (int)$this->getVar('hits_per_block');	// number of hits to display per block
	$vn_start		 	            = (int)$this->getVar('start');			// offset to seek to before outputting results
	$vb_ajax			            = (bool)$this->request->isAjax();
	
	$t_object 						= new ca_objects();		// ca_objects instance we need to pull representations
	$vs_caption_template = 			$o_classroom_config->get("caption_template");
	
	$qr_comments 					= $this->getVar("comments");
	$vn_num_comments 				= $qr_comments ? $qr_comments->numHits() : 0;
	$vs_user_role						= $this->getVar("user_role");
	
if (!$vb_ajax) {	// !ajax
?>	
	<div class="row">
		<div class="<?php print ($vs_left_col_class = $o_classroom_config->get("setDetailLeftColClass")) ? $vs_left_col_class : "col-sm-9 col-md-9 col-lg-8"; ?>">			
<?php 
			if($vs_sort_control_type == 'list'){
				if(is_array($va_sorts = $this->getVar('sortBy')) && (sizeof($va_sorts) > 1)) {
					print "<H5 id='bSortByList'><ul><li><strong>"._t("Sort by:")."</strong></li>\n";
					$i = 0;
					foreach($va_sorts as $vs_sort => $vs_sort_flds) {
						$i++;
						if ($vs_current_sort === $vs_sort) {
							print "<li class='selectedSort'>{$vs_sort}</li>\n";
						} else {
							print "<li>".caNavLink($this->request, $vs_sort, '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'sort' => $vs_sort))."</li>\n";
						}
						if($i < sizeof($va_sorts)){
							print "<li class='divide'>&nbsp;</li>";
						}
					}
					print "<li>".caNavLink($this->request, '<span class="glyphicon glyphicon-sort-by-attributes'.(($vs_sort_dir == 'asc') ? '' : '-alt').'"></span>', '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'direction' => (($vs_sort_dir == 'asc') ? _t("desc") : _t("asc"))))."</li>";
					print "</ul></H5>\n";
				}
			}
?>
			<div class="setsBack">
<?php
				if($t_set->get("parent_id")){
					print caNavLink($this->request, ($o_classroom_config->get("backLink")) ? $o_classroom_config->get("backLink") : "<i class='fa fa-angle-double-left'></i><div class='small'>Back</div>", "", "", "*", "setDetail", array("set_id" => $t_set->get("parent_id")));
				}else{
					print caNavLink($this->request, ($o_classroom_config->get("backLink")) ? $o_classroom_config->get("backLink") : "<i class='fa fa-angle-double-left'></i><div class='small'>Back</div>", "", "", "*", "Index");
				}
?>
			</div><!-- end setsBack -->
			<H1>
				<?php print "<span id='crSetName".$t_set->get("set_id")."'>".$t_set->getLabelForDisplay()."</span>"; ?>
				<?php print "<span class='lbSetCount'>(<span class='lbSetCountInt'>".$qr_set_items->numHits()."</span> items)</span>"; ?>
<?php
    //
    // Gear menu
    //
?>
				<div class="btn-group">
					<i class="fa fa-gear bGear" data-toggle="dropdown"></i>
					<ul class="dropdown-menu" role="menu">
<?php
						if(($vs_sort_control_type == "dropdown") && is_array($va_sorts = $this->getVar('sortBy')) && (sizeof($va_sorts) > 1)) {
							print "<li class='dropdown-header'>"._t("Sort by:")."</li>\n";
							foreach($va_sorts as $vs_sort => $vs_sort_flds) {
								if ($vs_current_sort === $vs_sort) {
									print "<li><a href='#'><strong><em>{$vs_sort}</em></strong></a></li>\n";
								} else {
									print "<li>".caNavLink($this->request, $vs_sort, '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'sort' => $vs_sort))."</li>\n";
								}
							}
							print "<li class='divider'></li>\n";
							if(is_array($va_secondary_sorts = $this->getVar('secondarySortBy')) && sizeof($va_secondary_sorts)){
								print "<li class='dropdown-header'>"._t("Refine sort by:")."</li>\n";
								foreach($va_secondary_sorts as $vs_secondary_sort => $vs_secondary_sort_flds) {
									if($vs_secondary_sort != $vs_current_sort){
										if ($vs_current_secondary_sort === $vs_secondary_sort) {
											print "<li><a href='#'><strong><em>{$vs_secondary_sort}</em></strong></a></li>\n";
										} else {
											print "<li>".caNavLink($this->request, $vs_secondary_sort, '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'secondary_sort' => $vs_secondary_sort))."</li>\n";
										}
									}
								}
								print "<li class='divider'></li>\n";
							}
							print "<li class='dropdown-header'>"._t("Sort order:")."</li>\n";
							print "<li>".caNavLink($this->request, (($vs_sort_dir == 'asc') ? '<strong><em>' : '')._t("Ascending").(($vs_sort_dir == 'asc') ? '</em></strong>' : ''), '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'direction' => 'asc'))."</li>";
							print "<li>".caNavLink($this->request, (($vs_sort_dir == 'desc') ? '<strong><em>' : '')._t("Descending").(($vs_sort_dir == 'desc') ? '</em></strong>' : ''), '', '*', '*', '*', array('view' => $vs_current_view, 'key' => $vs_browse_key, 'direction' => 'desc'))."</li>";
							print "<li class='divider'></li>";
						}
?>				
						<li><?php print caNavLink($this->request, _t("All %1", $vs_classroom_displayname_plural), "", "", "*", "Index"); ?></li>
<?php
					if($vb_write_access){
?>
                        <li class="divider"></li>
						<li><a href='#' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', '*', 'setForm', array("set_id" => $t_set->get("set_id"))); ?>"); return false;' ><?php print _t("Edit Name/Description"); ?></a></li>
<?php
						if(!$t_set->get("parent_id") && ($vs_user_role == $this->getVar("educator_role"))){
?>
							<li><a href='#' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', '*', 'shareSetForm', array()); ?>"); return false;' ><?php print _t("Share %1", ucfirst($vs_classroom_displayname)); ?></a></li>
							<li><a href='#' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', '*', 'setAccess', array()); ?>"); return false;' ><?php print _t("Manage %1 Access", ucfirst($vs_classroom_displayname)); ?></a></li>
<?php
						}
					}
?>
						<li><?php print caNavLink($this->request, _t("Start presentation"), "", "", "*", "Present", array('set_id' => $t_set->getPrimaryKey())); ?></li>
<?php
						if(is_array($va_export_formats) && sizeof($va_export_formats)){
							// Export as PDF links
							print "<li class='divider'></li>\n";
							print "<li class='dropdown-header'>"._t("Download as:")."</li>\n";
							foreach($va_export_formats as $va_export_format){
								print "<li>".caNavLink($this->request, $va_export_format["name"]." [".$va_export_format["type"]."]", "", "", "*", "setDetail", array("view" => $va_export_format['type'], "download" => true, "export_format" => $va_export_format["code"]))."</li>";
							}
						}
						if($vs_user_role == $this->getVar("educator_role")){
?>		
							<li class="divider"></li>
							<li><a href='#' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', '*', 'setForm', array()); ?>"); return false;' ><?php print _t("New %1", ucfirst($vs_classroom_displayname)); ?></a></li>
							<li class="divider"></li>
							<li><a href='#' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', '*', 'userGroupForm', array()); ?>"); return false;' ><?php print _t("New User Group"); ?></a></li>
<?php
							if(is_array($this->getVar("user_groups")) && sizeof($this->getVar("user_groups"))){
?>
							<li><a href='#' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', 'Lightbox', 'userGroupList', array()); ?>"); return false;' ><?php print _t("Manage Your User Groups"); ?></a></li>
<?php
							}
						}
?>
					</ul>
				</div><!-- end btn-group -->
			</H1>
		</div><!-- end col -->
		<div class="<?php print ($vs_right_col_class = $o_classroom_config->get("setDetailRightColClass")) ? $vs_right_col_class : "col-sm-3 col-md-3 col-lg-3 col-lg-offset-1"; ?>">
			<div id="lbViewButtons">
<?php
			if(is_array($va_views) && sizeof($va_views)){
				foreach($va_views as $vs_view => $va_view_info) {
					if(isset($va_view_info['data'])) {
						if (!$qr_set_items->hasData($va_view_info['data'])) { continue; }	// don't show view options for which there is no data (eg. map requires mappable data)
					}
					if ($vs_current_view === $vs_view) {
						print '<a href="#" class="active"><span class="glyphicon '.$va_view_info['icon'].'"></span></a> ';
					} else {
						print caNavLink($this->request, '<span class="glyphicon '.$va_view_info['icon'].'"></span>', 'disabled', '*', '*', '*', array('view' => $vs_view, 'set_id' => $t_set->get("set_id"), 'key' => $vs_browse_key)).' ';
					}
				}
			}
?>
			</div>			
		</div><!-- end col -->
	</div><!-- end row -->
	<div class="row">
		<div class="<?php print ($vs_left_col_class = $o_classroom_config->get("setDetailLeftColClass")) ? $vs_left_col_class : "col-sm-9 col-md-9 col-lg-8"; ?>">
<?php
		if($t_set->get("parent_id")){
			print '<dl class="dl-horizontal crDetailAssignmentInfo">';
			print "<dt>".ucfirst($vs_classroom_displayname)."</dt><dd>".caNavLink($this->request, $t_parent_set->getLabelForDisplay(), "", "", "*", "setDetail", array("set_id" => $t_set->get("parent_id")))."</dd>\n";
			print "<dt>"._t("Created by")."</dt><dd>".trim($t_set->get("ca_users.fname")." ".$t_set->get("ca_users.lname"))."</dd>\n";
			print "</dl>\n";
		}
		print "<p id='crSetDescription".$t_set->get("set_id")."'>";
		if ($vs_description = $t_set->get("description")) {
			print $vs_description;
		}
		print "</p><hr/>";
?>
			<div id="lbSetResultLoadContainer">
<?php
} // !ajax

		$va_view_info = $va_views[$vs_current_view];
		if ($va_view_info['data'] && !$qr_set_items->hasData($va_view_info['data'])) {
			$vs_current_view = 'thumbnail';
			print "<div class='warning'>" . _t("Displaying %1 view because required data is not available to generate a %2 view", $va_views[$vs_current_view]['name'], $va_view_info['name']) . "</div>";
		}
		switch($vs_current_view) {
			case 'map':
				print $this->render("Browse/browse_results_map_html.php");
				break;
			case 'timeline':
				print $this->render("Lightbox/set_detail_timeline_html.php");
				break;
			default:
				// First load is rendered in-template; subsequent loads are via Ajax/continuous scroll
				$t =new Timer();
				$this->setVar('set_id', $vn_set_id);
				if($vn_num_hits = $qr_set_items->numHits()){
					if ($vn_start < $qr_set_items->numHits()) {
						$qr_set_items->seek($vn_start);

						if($qr_set_items->numHits()){
							$vn_c = 0;

							$va_items = $va_placeholders = array();
							while($qr_set_items->nextHit() && ($vn_c < $vn_hits_per_block)) {
								$vn_object_id = $qr_set_items->get("ca_objects.object_id");
								if(is_array($va_set_item_info[$vn_object_id])) {
									foreach ($va_set_item_info[$vn_object_id] as $va_item_info) {	
										if(!$va_item_info['item_id']) { continue; }
										$va_items[$va_item_info['item_id']] = array(
											'object_id' => $vn_object_id, 
											'type_id' => $vn_type_id = $qr_set_items->get('ca_objects.type_id'), 
											'type' => $vs_type_idno = caGetListItemIdno($vn_type_id)
										);
									}
								}
								$vn_c++;
							}
		
							$va_item_ids = array_keys($va_items);
							$va_object_ids = caExtractArrayValuesFromArrayOfArrays($va_items, 'object_id');
							
							$va_captions = caProcessTemplateForIDs($vs_caption_template, 'ca_objects', $va_object_ids, array('returnAsArray' => true));
		
							$vs_media_version = ($vs_current_view === 'list') ? 'medium' : 'preview170';
							$va_representations = $t_object->getPrimaryMediaForIDs($va_object_ids, array($vs_media_version));
			
							$va_comment_counts = ca_set_items::getNumCommentsForIDs($va_item_ids);

							foreach($va_item_ids as $vn_i => $vn_item_id) {
								$this->setVar('item_id', $vn_item_id);
								$this->setVar('object_id', $vn_object_id = $va_items[$vn_item_id]['object_id']);
								$this->setVar('caption', $va_captions[$vn_i]);
								$this->setVar('commentCount', (int)$va_comment_counts[$vn_item_id]);
			
								$vn_representation_id = null;
								if ($vs_tag = $va_representations[$vn_object_id]['tags'][$vs_media_version]) {
									$vn_representation_id = $va_representations[$vn_object_id]['representation_id'];
									$vs_representation = "<a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'Detail', 'GetMediaOverlay', array('object_id' => $vn_object_id, 'representation_id' => $vn_representation_id, 'item_id' => $vn_item_id, 'context' => caGetDetailForType('ca_objects')))."\"); return false;'><div class='lbItemImg'>{$vs_tag}</div></a>";
								} else {
									if (!isset($va_placeholders[$vs_type_idno])) { $va_placeholders[$vs_type_idno] = caGetPlaceholder($vs_type_idno, 'placeholder_media_icon'); }
									$vs_representation = "<a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'Detail', 'GetMediaOverlay', array('object_id' => $vn_object_id, 'representation_id' => $vn_representation_id, 'item_id' => $vn_item_id, 'context' => caGetDetailForType('ca_objects')))."\"); return false;'><div class='lbItemImg lbSetImgPlaceholder'>".$va_placeholders[$vs_type_idno]."</div></a>";
								}
								$this->setVar('representation', $vs_representation);
								$this->setVar('representation_id', $vn_representation_id);
			
								switch($vs_current_view) {
									case 'list':
										print "<div class='col-xs-12 col-sm-4 lbItem{$vn_item_id}' id='row-{$vn_object_id}'><div class='lbItemContainer'>";
										break;
									default:
										print "<div class='col-xs-6 col-sm-4 col-md-3 col-lg-3 lbItem{$vn_item_id}' id='row-{$vn_object_id}'><div class='lbItemContainer'>";
										break;
								}
								print $this->render("Lightbox/set_detail_item_html.php");
								print "</div></div><!-- end col 3 -->";
							}
						}
				
						if ($vn_num_hits > $vn_start + $vn_hits_per_block) {
							print caNavLink($this->request, _t('Next %1', $vn_hits_per_block), 'jscroll-next', '*', '*', '*', array('s' => $vn_start + $vn_hits_per_block, 'key' => $vs_browse_key, 'view' => $vs_current_view));
						}
					}
				}else{
					if($vb_write_access){
						print "<div class='row'><div class='col-sm-12'>"._t("Click the %1 near items throughout the site to add items to this %2.", $o_classroom_config->get("addToClassroomIcon"), $vs_classroom_displayname)."</div></div>";
					}
				}
				break;
			}
if (!$vb_ajax) {    // !ajax
?>
            </div>
            <!-- end lbSetResultLoadContainer -->
        </div>
        <!-- end col -->
        <div class="<?php print ($vs_right_col_class = $o_classroom_config->get("setDetailRightColClass")) ? $vs_right_col_class : "col-sm-3 col-md-3 col-lg-3 col-lg-offset-1"; ?>">
<?php
        # --- show respond option to Students for parent sets (don't show respond button on reponses)
		if(!$t_set->get("parent_id")){
			$va_response_ids = $t_set->getSetResponseIds();
			$va_user_response_ids = array();
			if($vs_user_role == $this->getVar("student_role")){
				$va_user_response_ids = $t_set->getSetResponseIds($this->request->getUserID());
				$vb_response = false;
				print "<div id='crUserResponse'>";
				if(is_array($va_user_response_ids) && sizeof($va_user_response_ids)){
					$vb_response = true;
					print "<H5>Your Response</H5>";
					$t_response_set = new ca_sets();
					foreach($va_user_response_ids as $vn_response_set_id){
						if ($t_response_set->load($vn_response_set_id)) {
							$vb_write_access = $t_response_set->haveAccessToSet($this->request->getUserID(), 2);
							print caClassroomSetListItem($this->request, $t_response_set, $va_access_values, array("write_access" => $vb_write_access));
						}
						# --- unset from the list of all responses so user does not see their reponse twice
						if(($vn_key = array_search($vn_response_set_id, $va_response_ids)) !== false) {
    						unset($va_response_ids[$vn_key]);
						}
					}
				}
				print "</div>";
?>
				<div id='crUserRespond' <?php print (($vb_response) ? "style='display:none;'" : ""); ?>>
					<small>Click RESPOND to make a collection of items in response to this assignment. Once you’ve made your collection, you can add items to it while searching and browsing the site.</small>
					<div class='text-center'><a href='#' class='btn btn-default' onclick='caMediaPanel.showPanel("<?php print caNavUrl($this->request, '', '*', 'setForm', array('parent_id' => $t_set->get("set_id"))); ?>"); return false;' ><?php print _t("Respond"); ?></a></div>
				</div>
<?php
			}
			
			if(is_array($va_response_ids) && sizeof($va_response_ids)){
				print "<div class='crResponseHeader'><a href='#' onClick='jQuery(\"#crResponses\").toggle(); return false;'>"._t("%1 Response%2", sizeof($va_response_ids), ((sizeof($va_response_ids) == 1) ? "" : "s"))." <i class='fa fa-arrows-v'></i></a></div>";
				$t_response_set = new ca_sets();
				$i = 0;
				print "<div id='crResponses'".(($qr_set_items->numHits()) ? " style='display:none;'" : "").">";
				foreach($va_response_ids as $vn_response_set_id){
					if ($t_response_set->load($vn_response_set_id)) {
						print caClassroomSetResponseItem($this->request, $t_response_set, $va_access_values);
					}
				}
				print "</div>";
				print "<hr/>";
			}
		}
?>
            
            <div>
            	<H5><?php print _t("Comments"); ?></H5>
                <div id="lbSetCommentErrors" style="display: none;" class='alert alert-danger'></div>
                <form action="#" id="addComment" method="post">
                    <div class="form-group">
                        <textarea id="addCommentTextArea" name="comment" placeholder="<?php print addslashes(_t("add your comment")); ?>" class="form-control"></textarea>
                    </div>
                    <!-- end form-group -->
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default btn-xs"><?php print _t('Save'); ?></button>
                    </div>
                    <!-- end form-group -->
                </form>
            </div>
            <div class="lbSetCommentHeader" <?php print (($vn_num_comments == 0) ? "style='display:none;'" : ''); ?>><a href="#" onClick="jQuery('.lbComments').toggle(); return false;"><span id="lbSetCommentsCount">{{{commentCountDisplay}}}</span> <i class="fa fa-arrows-v"></i></a>
                <hr/>
            </div>
<?php
            print "<div class='lbComments crDetailCommentCol' " . (($vn_num_comments == 0) ? "style='display:none;'" : '') . ">";

            if ($vn_num_comments > 0) {
                $this->setVar('is_writeable', $vb_write_access);
                while ($qr_comments->nextHit()) {
                    $this->setVar('comment_id', $qr_comments->get('ca_item_comments.comment_id'));
                    $this->setVar('comment', $qr_comments->get('ca_item_comments.comment'));
                    $this->setVar('author', $qr_comments->get('ca_users.fname') . ' ' . $qr_comments->get('ca_users.lname') . ' ' . $qr_comments->get('ca_item_comments.created_on'));
                    $this->setVar('is_author', $this->getVar('user_id') == $this->request->user->get("user_id"));
                    print $this->render("Lightbox/set_comment_html.php");
                }
            }
            print "</div>";
?>
		</div><!-- end col -->
	</div><!-- end row -->
<?php
	//
	// Delete set confirm dialog - used to delete response sets
	//
?>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="Confirm delete" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<a class="btn btn-ok btn-delete"><span class="glyphicon glyphicon-trash"></span> <?php print _t('Delete'); ?></a>
				<a class="btn" data-dismiss="modal"><?php print _t('Cancel'); ?></a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#confirm-delete').on('show.bs.modal', function(e) {
			var set_id = jQuery(e.relatedTarget).data('set_id');
			var set_name = jQuery(e.relatedTarget).data('set_name');
	
			var b = '<?php print addslashes(_t('Really delete <strong><em>%1</em></strong>? This action cannot be undone.', "^set_name")); ?>';
			jQuery(".modal-body").html(b.replace("^set_name", set_name));
			jQuery('#confirm-delete .btn-delete').data('set_id', set_id);
		}).find('.btn-delete').on('click', function(e) {
			var set_id = jQuery(this).data('set_id');
			jQuery.getJSON('<?php print caNavUrl($this->request, '*', '*', 'DeleteLightbox'); ?>', {'set_id': set_id, 'csrfToken': <?= json_encode(caGenerateCSRFToken($this->request)); ?> }, function(data) {
				if(data.status == 'ok') {
					jQuery("#crSetContainer" + set_id).remove();
					jQuery("#crUserResponse").html(' ');
					jQuery('#crUserRespond').show();
					jQuery("#crSetListErrors").hide();
				} else {
					jQuery("#crSetListErrors").html(data.errors.join(';')).show();
				}
				jQuery('#confirm-delete').modal('hide');
			});
		
		});
	});
<?php
	if (in_array($vs_current_view, array('list', 'thumbnail'))) {
?>
    var pageLoadList = [];
    var dataLoading = false;
    jQuery(window).on("scroll", function(e) {
        var $e = jQuery("#lbSetResultLoadContainer");
        var _$scroll = jQuery(window),
            borderTopWidth = parseInt($e.css('borderTopWidth')),
            borderTopWidthInt = isNaN(borderTopWidth) ? 0 : borderTopWidth,
            iContainerTop = parseInt($e.css('paddingTop')) + borderTopWidthInt,
            iTopHeight = _$scroll.scrollTop(),
            innerTop = $e.length ? $e.offset().top : 0,
            iTotalHeight = Math.ceil(iTopHeight - innerTop + _$scroll.height() + iContainerTop);

        var docHeight = jQuery(document).height();
        docHeightOffset = docHeight/2;

        jQuery("#lbSetResultLoadContainer .jscroll-next").html("Loading...");
        if ((jQuery(window).scrollTop() + $(window).height() >= docHeightOffset) && !dataLoading) {
            var href = jQuery("#lbSetResultLoadContainer .jscroll-next").attr('href');

            if (href && (pageLoadList.indexOf(href) == -1)) {
                dataLoading = true;
                jQuery("#lbSetResultLoadContainer .jscroll-next").remove();
                jQuery("#lbSetResultLoadContainer").append('<div id="resultLoadTmp" />');

                jQuery("#lbSetResultLoadContainer #resultLoadTmp").load(href, function(e) {
                    pageLoadList.push(href);

                    jQuery("#resultLoadTmp").children().appendTo("#lbSetResultLoadContainer");
                    jQuery("#resultLoadTmp .jscroll-next").appendTo("#lbSetResultLoadContainer");
                    jQuery("#resultLoadTmp").remove();

                    jQuery(".sortable").sortable('refresh').sortable('refreshPositions');
                    dataLoading = false;
                });
            }
        }
    });

    jQuery(document).ready(function() {
        $("#lbSetResultLoadContainer").sortable({
            cursor: "move",
            opacity: 0.8,
            helper: 'clone',
            appendTo: 'body',
            zIndex: 10000,
            update: function( event, ui ) {
                var data = $(this).sortable('serialize');
                jQuery.ajax({
                    type: 'POST',
                    url: '<?php print caNavUrl($this->request, "", "Lightbox", "AjaxReorderItems"); ?>/row_ids/' + data
                });
            }
        });

        jQuery("#lbSetResultLoadContainer").on('click', ".lbItemDeleteButton", function(e) {
                var id = jQuery(this).data("item_id");

                jQuery.getJSON('<?php print caNavUrl($this->request, '', 'Lightbox', 'AjaxDeleteItem'); ?>', {'set_id': '<?php print $t_set->get("set_id"); ?>', 'item_id':id, 'csrfToken': <?= json_encode(caGenerateCSRFToken($this->request)); ?>} , function(data) {
                    if(data.status == 'ok') {
                        jQuery('.lbItem' + data.item_id).fadeOut(500, function() { jQuery('.lbItem' + data.item_id).remove(); });
                        jQuery('.lbSetCountInt').html(data.count);  // update count
                    } else {
                        alert('Error: ' + data.errors.join(';'));
                    }
                });

                e.preventDefault();
                return false;
            }
        );

        jQuery("#addComment").on('submit', function(e) {
            jQuery.getJSON('<?php print caNavUrl($this->request, '', 'Lightbox', 'AjaxAddComment'); ?>', {'id': '<?php print $t_set->get("set_id"); ?>', 'type': 'ca_sets', 'comment': jQuery("#addCommentTextArea").val(), 'csrfToken': <?= json_encode(caGenerateCSRFToken($this->request)); ?> } , function(data) {
                if(data.status == 'ok') {
                    jQuery("#lbSetCommentErrors").hide()
                    jQuery("#addCommentTextArea").val('');
                    jQuery('.lbComments').append(data.comment).show();
                    jQuery('.lbSetCommentHeader').show();
                    jQuery('#lbSetCommentsCount').html(data.displayCount);  // update comment count
                } else {
                    jQuery("#lbSetCommentErrors").show().html(data.errors.join(';'));
                }
            });

            e.preventDefault();
            return false;
        });

        jQuery("div.lbComments").on('click', '.lbComment', function(e) {
            var comment_id = jQuery(this).data("comment_id");
            if(comment_id) {
                jQuery.getJSON('<?php print caNavUrl($this->request, '', 'Lightbox', 'AjaxDeleteComment'); ?>', {'comment_id': comment_id, 'csrfToken': <?= json_encode(caGenerateCSRFToken($this->request)); ?> }, function(data) {
                    if(data.status == 'ok') {
                        jQuery("#lbSetCommentErrors").hide()
                        jQuery("#lbComments" + data.comment_id).remove();
                        if (data.count > 0) {
                            jQuery('.lbComments, .lbSetCommentHeader').show();
                            jQuery("#lbSetCommentsCount").html(data.displayCount);  // update comment count
                        } else {

                            jQuery('.lbComments, .lbSetCommentHeader').hide();
                        }
                    } else {
                        jQuery("#lbSetCommentErrors").show().html(data.errors.join(';'));
                    }
                });
            }
        });
    });
<?php
	}
?>
</script>
<?php
} //!ajax
?>
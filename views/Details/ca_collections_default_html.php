<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_collections_default_html.php : 
 * ----------------------------------------------------------------------
 */
 
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	
	# --- get collections configuration
	$o_collections_config = caGetCollectionsConfig();
	$vb_show_hierarchy_viewer = true;
	if($o_collections_config->get("do_not_display_collection_browser")){
		$vb_show_hierarchy_viewer = false;	
	}
	# --- get the collection hierarchy parent to use for exportin finding aid
	$vn_top_level_collection_id = array_shift($t_item->get('ca_collections.hierarchy.collection_id', array("returnWithStructure" => true)));

?>
<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
	{{{<ifdef code="ca_collections.parent_id">
		<unit relativeTo="ca_collections.parent" delimiter="">
			<li class='breadcrumb-item'>
				<l>^ca_collections.preferred_labels.name</l>
			</li>
		</unit>
	</ifdef>}}}
	<li class="breadcrumb-item" aria-current="page">{{{^ca_collections.preferred_labels.name}}}</li>
                    		
</ul>

<h1 class="page-header">{{{^ca_collections.preferred_labels.name}}}
    <small>{{{^ca_collections.type_id}}}</small>
</h1>
<hr class="mb-4" />
        
<div class="row">
	<div class="col-md-3 mb-3">
		<div class='card mb-3'>
			<div class='card-header fw-bold'>Details</div>
			<div class='card-body'>
				<p class="card-subtitle">
					{{{<ifdef code="ca_collections.description">^ca_collections.description</ifdef>}}}
				</p>
                <div class="vstack gap-3 mt-4">
					{{{<unit relativeTo="ca_collections.related" delimiter="">
						<div class='hstack gap-6'>
							<i class='ti ti-sitemap fs-6 me-1'></i> 
							<h6 class=' mb-0'><l>^ca_collections.related.preferred_labels.name</l> (^relationship_typename)</h6>
						</div>
					</unit>}}}
					{{{<unit relativeTo="ca_entities" delimiter="">
						<div class='hstack gap-6'>
							<i class='ti ti-affiliate fs-6 me-1'></i> 
							<h6 class=' mb-0'><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</h6>
						</div>
					</unit>}}}
					{{{<unit relativeTo="ca_occurrences" delimiter="">
						<div class='hstack gap-6'>
							<i class='ti ti-calendar-event fs-6 me-1'></i> 
							<h6 class=' mb-0'><l>^ca_occurrences.preferred_labels.name</l> (^relationship_typename)</h6>
						</div>
					</unit>}}}
					{{{<unit relativeTo="ca_places" delimiter="">
						<div class='hstack gap-6'>
							<i class='ti ti-map-pin text-dark fs-6 me-1'></i> 
							<h6 class=' mb-0'>^ca_places.preferred_labels.name</l> (^relationship_typename)</h6>
						</div>
					</unit>}}}
                </div>
            </div>
			<div class='card-arrow'>
				<div class='card-arrow-top-left'></div>
				<div class='card-arrow-top-right'></div>
				<div class='card-arrow-bottom-left'></div>
				<div class='card-arrow-bottom-right'></div>
			</div>
        </div>
                  		
		<div class="card shadow-none border">
			<div class='card-header fw-bold'>Hierarcy</div>
            <div class="card-body">
                <div class="list-group">
					{{{<ifdef code="ca_collections.parent_id">
						<unit relativeTo="ca_collections.parent" delimiter=""><l><div class='list-group-item list-group-item-action'>^ca_collections.preferred_labels</div></l></unit>
					</ifdef>}}}
					{{{
						<unit relativeTo="ca_collections.children" delimiter=""><l><div class='list-group-item list-group-item-action'>^ca_collections.preferred_labels</div></l></unit>
					}}}
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
	<div class="col-md-9">
		<div class='card'>
  			<div class='card-header fw-bold'>MEMBERS</div>
  			<div class='card-body'>
				<div class="row">
	  			
					{{{<ifcount code="ca_objects" min="1">
						<unit relativeTo="ca_objects" delimiter=" ">
							<div class='col-lg-4'>
								<div class='card'>
									<l>
										<img class='card-img-top img-responsive' src='^ca_object_representations.media.widepreview.url' alt=''>
									</l>
									<div class='card-body'>
										<h4 class='card-title'>
											<l>^ca_objects.preferred_labels.name</l>
										</h4>
									</div>
									<div class='card-arrow'>
										<div class='card-arrow-top-left'></div>
										<div class='card-arrow-top-right'></div>
										<div class='card-arrow-bottom-left'></div>
										<div class='card-arrow-bottom-right'></div>
									</div>
								</div>
							</div>
						</unit>
					</ifcount>}}}
					
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
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
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
              	<div class="row align-items-center">
                	<div class="col-9">
                  		<nav aria-label="breadcrumb">
                    		<ol class="breadcrumb">
								{{{<ifdef code="ca_collections.parent_id">
									<unit relativeTo="ca_collections.parent" delimiter="">
										<li class='breadcrumb-item'>
											<l>^ca_collections.preferred_labels.name</l>
										</li>
									</unit>
								</ifdef>}}}
                      			<li class="breadcrumb-item" aria-current="page">{{{^ca_collections.preferred_labels.name}}}</li>
                    		</ol>
                  		</nav>
                	</div>
                	<div class="col-3">
                  		<div class="text-center mb-n5">
                    		<!-- Navigation?? -->
                  		</div>
                	</div>
              	</div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-body p-0">
              	<img src="/themes/caiTS/assets/images/itsprofilebg.png" alt="background" height="100px">
              	<div class="row align-items-center">
                	<div class="col-lg-4 order-lg-1 order-2">
                  		<div class="d-flex align-items-center justify-content-around m-4">
                    		<!-- Left Side Panel -->
                  		</div>
                	</div>
                	<div class="col-lg-4 mt-n3 order-lg-2 order-1">
                  		<div class="mt-n5">
                    		<div class="d-flex align-items-center justify-content-center mb-2">
                      			<div class="d-flex align-items-center justify-content-center round-110">
                        			<div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                          				<img src="http://localhost/themes/caiTS/assets/images/worldeaters.svg" alt="modernize-img" class="w-100 h-100">
                        			</div>
                      			</div>
                    		</div>
                    		<div class="text-center">
                      			<h5 class="mb-0">{{{^ca_collections.preferred_labels.name}}}</h5>
                      			<p class="mb-0">{{{^ca_collections.type_id}}}</p>
                    		</div>
                  		</div>
                	</div>
                	<div class="col-lg-4 order-last">
						<!-- Right side panel -->
                	</div>
              	</div>
              	
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
              	<div class="row">
                	<div class="col-lg-4">
                  		<div class="card shadow-none border">
                    		<div class="card-body">
                      			<h4 class="mb-3">Details</h4>
								<p class="card-subtitle">
									{{{<ifdef code="ca_collections.description">^ca_collections.description</ifdef>}}}
								</p>
                      			<div class="vstack gap-3 mt-4">
								  	{{{<unit relativeTo="ca_collections" delimiter="">
										<div class='hstack gap-6'>
											<i class='ti ti-sitemap text-dark fs-6'></i>
											<h6 class=' mb-0'><l>^ca_collections.related.preferred_labels.name</l> (^relationship_typename)</h6>
										</div>
									</unit>}}}
									{{{<unit relativeTo="ca_entities" delimiter="">
										<div class='hstack gap-6'>
											<i class='ti ti-affiliate text-dark fs-6'></i>
											<h6 class=' mb-0'><l>^ca_entities.preferred_labels.displayname</l> (^relationship_typename)</h6>
									</div>
									</unit>}}}
									{{{<unit relativeTo="ca_occurrences" delimiter="">
										<div class='hstack gap-6'>
											<i class='ti ti-calendar-event text-dark fs-6'></i>
											<h6 class=' mb-0'><l>^ca_occurrences.preferred_labels.name</l> (^relationship_typename)</h6>
									</div>
									</unit>}}}
									{{{<unit relativeTo="ca_places" delimiter="">
										<div class='hstack gap-6'>
										<i class='ti ti-map-pin text-dark fs-6'></i>
										<h6 class=' mb-0'>^ca_places.preferred_labels.name</l> (^relationship_typename)</h6>
									</div>
									</unit>}}}
                      			</div>
                    		</div>
                  		</div>
                  		<div class="card shadow-none border">
                    		<div class="card-body">
                      			<h4 class="fw-semibold mb-3">Hierarchy</h4>
								  	<div class="list-group">
									  	{{{<ifdef code="ca_collections.parent_id">
											<unit relativeTo="ca_collections.parent" delimiter=""><l><div class='list-group-item list-group-item-action'>^ca_collections.preferred_labels</div></l></unit>
										</ifdef>}}}
										{{{
											<unit relativeTo="ca_collections.children" delimiter=""><l><div class='list-group-item list-group-item-action'>^ca_collections.preferred_labels</div></l></unit>
										}}}
									</div>
                    			</div>
                  			</div>
                		</div>
                		<div class="col-lg-8">
							<div class="card shadow-none border">
								<div class="card-body">
								<h4 class="fw-semibold mb-3">Members</h4>
									<div class="row">
										{{{<ifcount code="ca_objects" min="1" max="3"><unit relativeTo="ca_objects" delimiter=" ">
											<div class='col-md-6'><div class='card'><l><img class='card-img-top img-responsive' src='^ca_object_representations.media.widepreview.url' alt=''></l><div class='card-body'><h4 class='card-title'><l>^ca_objects.preferred_labels.name</l></h4></div></div></div>
										</unit></ifcount>}}}
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
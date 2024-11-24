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
		
			<div class='card-header fw-bold small bg-white bg-opacity-15'>DETAILS</div>
			<div class='card-body'>
				{{{<ifdef code="ca_collections.collection_media">

					<div class="mb-3">
						<img src="^ca_collections.collection_media.iconlarge.url" class="w-50 h-50 rounded-circle mx-auto d-block">
					</div>

				</ifdef>}}}
				
				<p class="card-subtitle">
					{{{<ifdef code="ca_collections.description">^ca_collections.description</ifdef>}}}
				</p>

				<!-- Collections -->
				{{{<ifdef code="ca_collections.related">
					<div class='list-group'>
						<h5 class='card-title text-white text-opacity-60 mt-3'>Related Collections</h5>
						<unit relativeTo="ca_collections.related" delimiter="">
							<a href='/index.php/Detail/collections/^ca_collections.collection_id' class='list-group-item list-group-item-action d-flex align-items-center'>
								<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
									<i class='ti ti-sitemap fa-lg'></i>
								</div>
								<div class='flex-fill px-3'>
									<div class='fw-bold'>^ca_collections.preferred_labels.name</div>
									<div class='small text-white text-opacity-50'>^relationship_typename</div>
								</div>
							</a>
						</unit>
					</div>
				</ifdef>}}}
				<!-- Entities -->
				{{{<ifdef code="ca_entities.related">
					<div class='list-group'>
						<h5 class='card-title text-white text-opacity-60 mt-3'>Related Entities</h5>
						<unit relativeTo="ca_entities.related" delimiter="">
						<a href='/index.php/Detail/entities/^ca_entities.entity_id' class='list-group-item list-group-item-action d-flex align-items-center'>
						<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
							<i class='ti ti-affiliate fa-lg'></i>
						</div>
						<div class='flex-fill px-3'>
							<div class='fw-bold'>^ca_entities.preferred_labels.displayname</div>
							<div class='small text-white text-opacity-50'>^relationship_typename</div>
						</div>
					</a>
						</unit>
					</div>
				</ifdef>}}}
				<!-- Occurances -->
				{{{<ifdef code="ca_occurrences">
					<div class='list-group'>
						<h5 class='card-title text-white text-opacity-60 mt-3'>Related Occurrences</h5>
						<unit relativeTo="ca_occurences.related" delimiter="">
						<a href='/index.php/Detail/occurrences/^ca_occurrences.occurrence_id' class='list-group-item list-group-item-action d-flex align-items-center'>
						<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
							<i class='ti ti-affiliates fa-lg'></i>
						</div>
						<div class='flex-fill px-3'>
							<div class='fw-bold'>^ca_occurrences.preferred_labels.displayname</div>
							<div class='small text-white text-opacity-50'>^relationship_typename</div>
						</div>
					</a>
						</unit>
					</div>
				</ifdef>}}}
				<!-- Places -->
				{{{<ifdef code="ca_places">
					<div class='list-group'>
						<h5 class='card-title text-white text-opacity-60 mt-3'>Related Places</h5>
						<unit relativeTo="ca_places.related" delimiter="">
						<a href='/index.php/Detail/places/^ca_places.place_id' class='list-group-item list-group-item-action d-flex align-items-center'>
						<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
							<i class='ti ti-affiliates fa-lg'></i>
						</div>
						<div class='flex-fill px-3'>
							<div class='fw-bold'>^ca_places.preferred_labels.displayname</div>
							<div class='small text-white text-opacity-50'>^relationship_typename</div>
						</div>
					</a>
						</unit>
					</div>
				</ifdef>}}}
  			
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
  			<div class='card-header fw-bold small bg-white bg-opacity-15'>ELEMENTS</div>
  			<div class='card-body bg-dark m-1'>
			  	<div class="list-group mb-3">
					{{{<ifdef code="ca_collections.parent_id">
						<unit relativeTo="ca_collections.parent" delimiter="">

							<a href="/index.php/Detail/collections/^ca_collections.collection_id" class="d-flex list-group-item list-group-item-action">
								<div class="w-80px h-80px d-flex align-items-center justify-content-center ms-n1 bg-theme bg-opacity-15 rounded-circle">
									<ifdef code="ca_collections.collection_media">
										<img src="^ca_collections.collection_media.media.iconlarge.url" class="rounded-circle">
									</ifdef>
									<ifnotdef code="ca_collections.collection_media">
										<i class="ti ti-sitemap display-5 rounded-circle"></i>
									</ifnotdef>
								</div>
								<div class="flex-fill ps-3">
									<h4 class="mb-0">^ca_collections.preferred_labels</h4>
									<p class="mb-0">^ca_collections.description"</p>
								</div>
								<div>
									<i class="fa fa-chevron-up"></i>
								</div>
 							</a>

						</unit>
					</ifdef>}}}
					{{{
						<unit relativeTo="ca_collections.children" delimiter="">

							<a href="/index.php/Detail/collections/^ca_collections.collection_id" class="d-flex list-group-item list-group-item-action">
								<div class="w-80px h-80px d-flex align-items-center justify-content-center ms-n1 bg-theme bg-opacity-15 rounded-circle">
									<ifdef code="ca_collections.collection_media">
										<img src="^ca_collections.collection_media.media.iconlarge.url" class="rounded-circle">
									</ifdef>
									<ifnotdef code="ca_collections.collection_media">
										<i class="ti ti-sitemap display-5 rounded-circle"></i>
									</ifnotdef>
								</div>
								<div class="flex-fill ps-3">
									<h4 class="mb-0">^ca_collections.preferred_labels</h4>
									<p class="mb-0">^ca_collections.description"</p>
								</div>
								<div>
									<i class="fa fa-chevron-down"></i>
								</div>
							</a>

						</unit>
					}}}
				</div>

				<div class="row">
					{{{<ifcount code="ca_objects" min="1">
						<unit relativeTo="ca_objects" delimiter="">
							<div class='col-lg-4 mb-3'>
								<a href='/index.php/Detail/objects/^ca_objects.object_id' class='text-decoration-none text-white'>
									<img class='card-img-top img-responsive rounded-3' src='^ca_object_representations.media.widepreview.url' alt=''>
									<div class='position-relative leadership-card z-1 bg-dark mt-n10 rounded py-3 px-8 mx-9 text-center shadow-sm'>
                                        <h5 class='fs-5 fw-semibold mb-0'>^ca_objects.preferred_labels.name</h5>
                                    </div>
								</a>	
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
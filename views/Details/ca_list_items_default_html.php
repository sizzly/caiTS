<?php
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
?>

<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
	<li class="breadcrumb-item" aria-current="page">{{{^ca_list_items.preferred_labels.name_singular}}}</li>
</ul>

<h1 class="page-header">{{{^ca_list_items.preferred_labels.name_singular}}}
    <small>Term</small>
</h1>
<hr class="mb-4" />

<div class="row">
	<div class="col-md-3 mb-3">
		<div class='card'>
  			<div class='card-header fw-bold small bg-white bg-opacity-15'>Details</div>
  			<div class='card-body'>
			  	{{{<ifdef code="ca_list_items.preferred_labels.description"><p class='card-subtitle'>^ca_list_items.preferred_labels.description</p><hr></ifdef>}}}
				<!-- Collections -->
				{{{<ifdef code="ca_collections">
					<div class='list-group'>
						<h5 class='card-title text-white text-opacity-60 mt-3'>Related Collections</h5>
						<unit relativeTo="ca_collections" delimiter="">
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

	<div class="col-md-9 mb-3">
		<div class='card'>
  			<div class='card-header fw-bold small bg-white bg-opacity-15'>Related Objects</div>
  			<div class='card-body'>
			  	{{{<ifcount code="ca_objects" min="1">
					<unit relativeTo="ca_objects" delimiter=" ">
						<a href='/index.php/Detail/objects/^ca_objects.object_id' class='list-group-item list-group-item-action d-flex align-items-center'>
							<div class='w-70px h-70px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
								<img class='rounded-2' src='^ca_object_representations.media.icon.url' alt=''>
							</div>
							<div class='flex-fill px-3'>
								<div class='fw-bold'>^ca_objects.preferred_labels.name</div>
								<div class='small text-white text-opacity-50'>^relationship_typename</div>
							</div>
						</a>
					</unit>
				</ifcount>}}}
				{{{<ifcount code="ca_objects" max="0">
					<h1>No Related Objects</h1>
				</ifcount>}}}
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
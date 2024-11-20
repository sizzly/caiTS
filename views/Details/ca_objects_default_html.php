<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2022 Whirl-i-Gig
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
 * ----------------------------------------------------------------------
 */
 
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
?>
<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
	{{{<unit relativeTo="ca_collections" delimiter=""><li class="breadcrumb-item"><l>^ca_collections.preferred_labels.name</l></li></unit>}}}
    <li class="breadcrumb-item" aria-current="page">{{{ca_objects.preferred_labels.name}}}</li>
</ul>

<h1 class="page-header">{{{ca_objects.preferred_labels.name}}}
    <small></small>
</h1>
<hr class="mb-4" />

<div class="card">
	<div class="card-body p-4">
		<div class="row">
			<div class="col-lg-6">
				<div class="mb-3">
					{{{representationViewer}}}
 				</div>
			</div>
			<div class="col-lg-6">
				<div class="card mb-3">
					<div class="card-header fw-bold small bg-white bg-opacity-15">DETAILS</div>
					<div class="card-body">
						<div class="mb-2">
							{{{<ifdef code="ca_objects.idno"><span class='badge bg-dark'>^ca_objects.idno</span></ifdef>}}}
							<span class="fw-bold">{{{<unit>^ca_objects.type_id</unit>}}}</span>
 						</div>
						<p class="mb-3">{{{<ifdef code="ca_objects.work_description">
							^ca_objects.work_description
						</ifdef>}}}</p>
					</div>
					<div class='card-arrow'>
						<div class='card-arrow-top-left'></div>
						<div class='card-arrow-top-right'></div>
						<div class='card-arrow-bottom-left'></div>
						<div class='card-arrow-bottom-right'></div>
					</div>
				</div>

				<div class='card mb-3'>
					<div class='card-header fw-bold small bg-white bg-opacity-15'>META DATA</div>
					<div class='card-body'>
						<div class="row">
						<!-- Collections -->
						{{{<ifdef code="ca_collections">


								<unit relativeTo="ca_collections.related" delimiter="">
									<div class='col-lg-4 mb-3'>
									<a href='/index.php/Detail/collections/^ca_collections.collection_id' class='list-group-item list-group-item-action d-flex align-items-center'>
										<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
											<i class='ti ti-sitemap fa-lg'></i>
										</div>
										<div class='flex-fill px-3'>
											<div class='fw-bold'>^ca_collections.preferred_labels.name</div>
											<div class='small text-white text-opacity-50'>^relationship_typename</div>
										</div>
									</a>
									</div>
								</unit>

						</ifdef>}}}
						<!-- Entities -->
						{{{<ifdef code="ca_entities.related">
		

								<unit relativeTo="ca_entities.related" delimiter="">
								<div class='col-lg-4 mb-3'>
								<a href='/index.php/Detail/entities/^ca_entities.entity_id' class='list-group-item list-group-item-action d-flex align-items-center'>
								<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
									<i class='ti ti-affiliate fa-lg'></i>
								</div>
								<div class='flex-fill px-3'>
									<div class='fw-bold'>^ca_entities.preferred_labels.displayname</div>
									<div class='small text-white text-opacity-50'>^relationship_typename</div>
								</div>
							</a>
						</div>
								</unit>

						</ifdef>}}}
						<!-- Occurances -->
						{{{<ifdef code="ca_occurrences">


								<unit relativeTo="ca_occurences.related" delimiter="">
								<div class='col-lg-4 mb-3'>
								<a href='/index.php/Detail/occurrences/^ca_occurrences.occurrence_id' class='list-group-item list-group-item-action d-flex align-items-center'>
								<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
									<i class='ti ti-affiliates fa-lg'></i>
								</div>
								<div class='flex-fill px-3'>
									<div class='fw-bold'>^ca_occurrences.preferred_labels.displayname</div>
									<div class='small text-white text-opacity-50'>^relationship_typename</div>
								</div>
							</a>
						</div>
								</unit>

						</ifdef>}}}
						<!-- Places -->
						{{{<ifdef code="ca_places">


								<unit relativeTo="ca_places.related" delimiter="">
								<div class='col-lg-4 mb-3'>
								<a href='/index.php/Detail/places/^ca_places.place_id' class='list-group-item list-group-item-action d-flex align-items-center'>
								<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
									<i class='ti ti-affiliates fa-lg'></i>
								</div>
								<div class='flex-fill px-3'>
									<div class='fw-bold'>^ca_places.preferred_labels.displayname</div>
									<div class='small text-white text-opacity-50'>^relationship_typename</div>
								</div>
							</a>
						</div>
								</unit>

						</ifdef>}}}
						<!-- Keywords -->
						{{{<ifcount code="ca_list_items" min="1">
	<unit relativeTo="ca_list_items" delimiter="">
		<div class='col-lg-4 mb-3'>
		<a href='/index.php/Detail/list_items/^ca_list_items.item_id' class='list-group-item list-group-item-action d-flex align-items-center'>
			<div class='w-40px h-40px d-flex align-items-center justify-content-center bg-theme bg-opacity-15 text-white rounded-2 ms-n1'>
				<i class='ti ti-vocabulary fa-lg'></i>
			</div>
			<div class='flex-fill px-3'>
				<div class='fw-bold'>^ca_list_items.preferred_labels.name_singular</div>
				<div class='small text-white text-opacity-50'>^relationship_typename</div>
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
	</div>
	<div class='card-arrow'>
		<div class='card-arrow-top-left'></div>
		<div class='card-arrow-top-right'></div>
		<div class='card-arrow-bottom-left'></div>
		<div class='card-arrow-bottom-right'></div>
	</div>
</div>



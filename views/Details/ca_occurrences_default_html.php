<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_occurrences_default_html.php : 
 * ----------------------------------------------------------------------
 */
	$o_db = new Db();
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$qr_muster = $o_db->query('SELECT t1.* FROM ca_objects_x_occurrences t1 INNER JOIN (SELECT object_id, MAX(edatetime) AS max_date FROM ca_objects_x_occurrences GROUP BY object_id) t2 ON t1.object_id = t2.object_id AND t1.edatetime = t2.max_date WHERE type_id = 201');

?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">{{{^ca_occurrences.preferred_labels.name}}}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/Browse/occurrences">Events</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">{{{^ca_occurrences.preferred_labels.name}}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="card">
			<div class='card-body'>
				<h6>{{{^ca_occurrences.type_id}}}</h6
				{{{<ifdef code="ca_occurrences.collection_media">
					<div class="mb-3">
						<img src="^ca_occurrences.collection_media.iconlarge.url" class="w-50 h-50 rounded-circle mx-auto d-block">
					</div>
				</ifdef>}}}
				
				<p class="card-subtitle">
					{{{<ifdef code="ca_occurrences.description">^ca_occurrences.description</ifdef>}}}
				</p>

				
            </div>
		</div>
		<!-- Collections -->
		{{{<ifdef code="ca_collections.related">
			<unit relativeTo="ca_collections.related" delimiter="">
				<div class=' col-md-12 col-xl-12'>
					<div class='card'>
						<div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
							<i class='ti ti-sitemap fs-6 me-2'></i>
							<div>
								<a href='/Detail/collections/^ca_collections.collection_id' class=''>
									<h5 class='fw-semibold mb-0'>^ca_collections.preferred_labels.name</h5>
								</a>
								<span class='fs-2 d-flex align-items-center'>
									^relationship_typename
								</span>
							</div>
						</div>
					</div>
				</div>
			</unit>
		</ifdef>}}}
		<!-- Entities -->
		{{{<ifdef code="ca_entities.related">
			<div class>
				<div class='card'>
					<div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
						<i class='ti ti-affiliate fs-6 me-2'></i>
						<div>
							<a href='/index.php/Detail/entities/^ca_entities.entity_id' class=''>
								<h5 class='fw-semibold mb-0'>^ca_entities.preferred_labels.displayname</h5>
							</a>
							<span class='fs-2 d-flex align-items-center'>
								^relationship_typename
							</span>
						</div>
					</div>
				</div>
			</div>
		</ifdef>}}}
		<!-- Occurances -->
		{{{<ifdef code="ca_occurrences">
			<unit relativeTo="ca_occurences.related" delimiter="">
				<div>
					<div class='card'>
						<div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
							<i class='ti ti-calendar fs-6 me-2'></i>
							<div>
								<a href='/Detail/occurrences/^ca_occurrences.occurrence_id' class=''>
									<h5 class='fw-semibold mb-0'>^ca_occurrences.preferred_labels.displayname</h5>
								</a>
								<span class='fs-2 d-flex align-items-center'>
									^relationship_typename
								</span>
							</div>
						</div>
					</div>
				</div>
			</unit>
		</ifdef>}}}
		<!-- Places -->
		{{{<ifdef code="ca_places">
			<unit relativeTo="ca_places.related" delimiter="">
				<div>
					<div class='card'>
						<div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
							<i class='ti ti-building-community fs-6 me-2'></i>
							<div>
								<a href='/Detail/places/^ca_places.place_id' class=''>
									<h5 class='fw-semibold mb-0'>^ca_places.preferred_labels.displayname</h5>
								</a>
								<span class='fs-2 d-flex align-items-center'>
									^relationship_typename
								</span>
							</div>
						</div>
					</div>
				</div>
			</unit>
		</ifdef>}}}

	</div>
	<div class="col-lg-8">
		<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
    		<li class="nav-item">
      			<a href="javascript:void(0)" class="nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3 active" id="all-category">
					<i class="ti ti-calendar-event fill-white"></i>
					<span class="d-none d-md-block fw-medium">All Elements</span>
      			</a>
    		</li>
			<li class="nav-item">
				<a href="javascript:void(0)" class="nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3" id="note-business">
					<i class="ti ti-chevron-up fill-white"></i>
					<span class="d-none d-md-block fw-medium">Parent</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="javascript:void(0)" class="nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3" id="note-social">
					<i class="ti ti-chevron-down fill-white"></i>
					<span class="d-none d-md-block fw-medium">Children</span>
				</a>
			</li>
			<li class="nav-item">
			<a href="javascript:void(0)" class="nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3" id="note-important">
				<i class="ti ti-swords fill-white"></i>
				<span class="d-none d-md-block fw-medium">Members</span>
			</a>
			</li>
  		</ul>
  		<div class="tab-content">
    		<div id="note-full-container" class="note-has-grid row">
				<!-- Parents -->
				{{{<ifdef code="ca_occurrences.parent_id">
					<unit relativeTo="ca_occurrences.parent" delimiter="">
						<div class='col-md-4 single-note-item all-category note-business'>
							<div class='card hover-img overflow-hidden'>
								<div class='position-relative'>
									<a href='/index.php/Detail/occurrences/^ca_occurrences.collection_id'>
										<ifdef code="ca_occurrences.collection_media">
											<img src='^ca_occurrences.collection_media.media.widepreview.url' class='card-img-top' alt='modernize-img'>
										</ifdefcode>
										<ifnotdef code="ca_occurrences.collection_media">
											<img src='/themes/caiTS/assets/img/Locked_wide.png' class='card-img-top' alt='modernize-img'>
										</ifnotdef>
									</a>
									<a href='javascript:void(0)' class='text-bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3'>
										<i class='ti ti-hierarchy fs-4'></i>
									</a>
								</div>
								<div class='card-body pt-3 p-4'>
									<h6 class='fs-4'>^ca_occurrences.preferred_labels</h6>
								</div>
							</div>
						</div>
					</unit>
				</ifdef>}}}

				<!-- Children -->
				{{{
					<unit relativeTo="ca_occurrences.children" delimiter="">
						<div class='col-md-4 single-note-item all-category note-social'>
							<div class='card hover-img overflow-hidden'>
								<div class='position-relative'>
									<a href='/index.php/Detail/occurrences/^ca_occurrences.collection_id'>
										<ifnotdef code="ca_occurrences.collection_media.media.widepreview.url"><img src='/themes/caiTS/assets/img/Locked_wide.png' class='card-img-top' alt='modernize-img'></ifnotdef>
										<ifdef code="ca_occurrences.collection_media.media.widepreview.url"><img src='^ca_occurrences.collection_media.media.widepreview.url' class='card-img-top' alt='modernize-img'></ifdef>
									</a>
									<a href='javascript:void(0)' class='text-bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3'>
										<i class='ti ti-sitemap fs-4'></i>
									</a>
								</div>
								<div class='card-body pt-3 p-4'>
									<h6 class='fs-4'>^ca_occurrences.preferred_labels</h6>
								</div>
							</div>
						</div>
					</unit>
				}}}

				<!-- Members -->
<?php
	while ($qr_muster->nextRow()) {
		if ($qr_muster->get("occurrence_id") == $t_item->get("ca_occurrences.occurrence_id")) {
			$qr_object = new ca_objects($qr_muster->get('object_id'));
			if (!$qr_object->get('ca_object_representations.media.widepreview.url')) {
				$object_image = "/themes/caiTS/assets/img/Locked_wide.png";
			} else {
				$object_image = $qr_object->get('ca_object_representations.media.widepreview.url');
			}
?>
<div class='col-md-4 single-note-item all-category note-important'>
	<div class='card hover-img overflow-hidden'>
		<div class='position-relative'>
			<a href='/Detail/objects/<?php print $qr_object->get("ca_objects.object_id"); ?>'>
				<img src='<?php print $object_image; ?>' class='card-img-top' alt='modernize-img'>
			</a>
			<a href='javascript:void(0)' class='text-bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3'>
				<i class='ti ti-swords fs-4'></i>
			</a>
		</div>
		<div class='card-body pt-3 p-4'>
			<h6 class='fs-4'><?php print $qr_object->get("ca_objects.preferred_labels.name"); ?></h6>
		</div>
	</div>
</div>
<?php
		}
	}
?>
			</div>
		</div>
	</div>
</div>

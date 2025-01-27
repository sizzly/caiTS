<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 */
    $o_db = new Db();
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
    $thumbnail =            $t_object->get('ca_object_representations.media.icon.url');
    if (!$thumbnail) {
        $thumbnail = "/themes/caiTS/assets/img/Locked.png";
    }
    $qr_activity = $o_db->query('SELECT * FROM ca_objects_x_occurrences WHERE object_id = '.$vn_id.' ORDER BY edatetime DESC');
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">{{{ca_objects.preferred_labels.name}}}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="/Browse/objects">Objects</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">{{{ca_objects.preferred_labels.name}}}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <!-- Future home of nav: prev/next/etc -->
                </div>
            </div>
        </div>
    </div>
</div>
          
<div class="card overflow-hidden">
    <div class="card-body p-0">
        <div class="row align-items-center mt-12">
            <div class="col-lg-4 order-lg-1 order-2">
                <div class="d-flex align-items-center justify-content-around m-4">
                    <div class="text-center">
                        <i class="ti ti-id-badge-2 fs-6 d-block mb-2"></i>
                        <h4 class="mb-0 lh-1">{{{<ifdef code="ca_objects.idno">^ca_objects.idno</ifdef>}}}</h4>
                        <p class="mb-0 ">Identifier</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                <div class="mt-n5">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <div class="d-flex align-items-center justify-content-center round-110">
                            <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                <img src="<?php print $thumbnail ?>" alt="object thumbnail" class="w-100 h-100">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="mb-0">{{{ca_objects.preferred_labels.name}}}</h5>
                        <p class="mb-0">{{{ca_objects.nonpreferred_labels.name}}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-last">

            </div>
        </div>
        <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-primary-subtle rounded-2 rounded-top-0" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active hstack gap-2 rounded-0 py-6" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">
                    <i class="ti ti-user-circle fs-5"></i>
                    <span class="d-none d-md-block">Details</span>
                </button>
            </li>
        </ul>
    </div>
</div>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="row">
            <div class="col-lg-8">
                {{{representationViewer}}}

                <!--Begin Meta -->
                <div class="row mt-3">
                    <!-- Muster State -->
                    {{{<ifdef code="ca_objects.history_tracking_current_value%policy=current_status">
                        ^ca_objects.history_tracking_current_value%policy=current_status%useTemplate=metadata
                    </ifdef>}}}

                    <!-- Collections -->
                    {{{<ifdef code="ca_collections">
                        <unit relativeTo="ca_collections.related" delimiter="">
                            <div class=' col-md-6 col-xl-6'>
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
                        <unit relativeTo="ca_entities.related" delimiter="">
                            <div class=' col-md-6 col-xl-6'>
                                <div class='card'>
                                    <div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
                                        <i class='ti ti-affiliate fs-6 me-2'></i>
                                        <div>
                                            <a href='/Detail/entities/^ca_entities.entity_id' class=''>
                                                <h5 class='fw-semibold mb-0'>^ca_entities.preferred_labels.displayname</h5>
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
                    <!-- Occurences -->
                    {{{<ifdef code="ca_occurrences">
                        <unit relativeTo="ca_occurences.related" delimiter="">
                            <div class=' col-md-6 col-xl-6'>
                                <div class='card'>
                                    <div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
                                        <i class='ti ti-affiliate fs-6 me-2'></i>
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
                            <div class=' col-md-6 col-xl-6'>
                                <div class='card'>
                                    <div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
                                        <i class='ti ti-affiliate fs-6 me-2'></i>
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
                    <!-- Keywords -->
                    {{{<ifcount code="ca_list_items" min="1">
                        <unit relativeTo="ca_list_items" delimiter="">
                            <div class=' col-md-6 col-xl-6'>
                                <div class='card'>
                                    <div class='card-body p-4 d-flex align-items-center gap-6 flex-wrap'>
                                        <i class='ti ti-vocabulary fs-6 me-2'></i>
                                        <div>
                                            <a href='/Detail/list_items/^ca_list_items.item_id' class=''>
                                                <h5 class='fw-semibold mb-0'>^ca_list_items.preferred_labels.name_singular</h5>
                                            </a>
                                            <span class='fs-2 d-flex align-items-center'>
                                                ^relationship_typename
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </unit>
                    </ifcount>}}}

                </div>
                <!-- End Meta -->
            </div>
            <div class="col-lg-4">
                {{{<ifdef code="ca_objects.work_description">
                    <div class="card shadow-none border">
                        <div class="card-body">
                            <p class="card-subtitle">
                                ^ca_objects.work_description
                            </p>                      
                        </div>
                    </div>
                </ifdef>}}}
                <div class="card shadow-none border">
                    <div class="card-body mb-4">
                        <h4 class="fw-semibold mb-3">Workflow</h4>
                        <ul class="timeline-widget mb-0 position-relative mb-n5">
<?php
                            while ($qr_activity->nextRow()){
                                $qr_occurrence = new ca_occurrences($qr_activity->get('occurrence_id'));
                                $qr_edate = substr($qr_activity->get('edatetime'),0,13);
                                $qr_time = substr_replace(substr_replace(substr_replace(substr_replace(substr($qr_edate,0,13),'/',4,1),'/',7,0),'T',10,0),':',13,0);
?>
                                <li class="timeline-item d-flex position-relative overflow-hidden">
                                    <div class="timeline-time text-dark flex-shrink-0 text-end">
                                        <time class="timeago" datetime="<?php print $qr_time; ?>"><?php print $qr_time; ?></time>
                                    </div>
                                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                        <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                    </div>
                                    <div class="timeline-desc fs-3 text-dark mt-n1">
                                        <?php print $qr_occurrence->get('ca_occurrences.preferred_labels.name'); ?>
                                    </div>
                                </li>
<?php
                            }
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
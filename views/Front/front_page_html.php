<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 */
    $o_db = new Db();
    $qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
    $qr_objects->nextRow(); // the result has only 1 row.
    $vn_count = $qr_objects->get('c'); // this should be your count

    $qr_shame = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0 AND status=0');
    $qr_shame->nextRow(); // the result has only 1 row.
    $vn_shame = $qr_shame->get('c'); // this should be your count

    $qr_cost = $o_db->query('SELECT SUM(value_decimal1) AS cost FROM ca_attribute_values WHERE element_id=61');
    $qr_cost->nextRow();
    $vn_cost = $qr_cost->get('cost');

    $qr_collections = $o_db->query('SELECT collection_id FROM ca_collections WHERE parent_id IS NULL');

    $qr_topmodels = $o_db->query('SELECT object_id FROM ca_objects WHERE deleted=0 ORDER BY view_count DESC LIMIT 5');

    $qr_activity = $o_db->query('SELECT * FROM ca_objects_x_occurrences ORDER BY edatetime DESC LIMIT 11')

?>
 
<ul class="breadcrumb">
	<li class="breadcrumb-item" aria-current="page">Home</li>
</ul>

<h1 class="page-header">iToysoldiers.com
    <small>The canonical archive of my miniature wargaming collection.</small>
</h1>
<hr class="mb-4" />

<div class="row">
    <div class="col-xl-3 col-lg-6 mb-3">
        <div class="card">
            <!-- BEGIN card-body -->
            <div class="card-body">
                <!-- BEGIN title -->
                <div class="d-flex fw-bold small mb-3">
                    <span class="flex-grow-1">COLLECTION OBJECTS</span>
                    <a href="#" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="The raw number of recorded items in my collection." class="text-white text-opacity-50 text-decoration-none"><i class="ti ti-help"></i></a>
                </div>
                <!-- END title -->
                <!-- BEGIN stat-lg -->
                <div class="row align-items-center mb-2">
                    <div class="col-7">
                        <h3 class="mb-0"><?php print $vn_count; ?></h3>
                    </div>
                    <div class="col-5">
                        <div class ="mt-n3 mb-n2" id="apexchart" data-type="pie" data-title="Visitors" data-height="45"></div>
                        <!-- <h3 class="text-theme box mb-2 align-top">
                            <i class="ti ti-building-warehouse"></i>
                        </h3> -->
                    </div>
                </div>
                <!-- END stat-lg -->
                <!-- BEGIN stat-sm -->
                <div class="small text-white text-opacity-50 text-truncate">
                    &nbsp;<br>
                    &nbsp;<br>
                    &nbsp;
                </div>
                <!-- END stat-sm -->
            </div>
            <!-- END card-body -->
            
            <!-- BEGIN card-arrow -->
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
            <!-- END card-arrow -->
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 mb-3">
        <div class="card">
            <!-- BEGIN card-body -->
            <div class="card-body">
                <!-- BEGIN title -->
                <div class="d-flex fw-bold small mb-3">
                    <span class="flex-grow-1">PILE OF SHAME</span>
                    <a href="#" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="Models that need to be finished. This metric is not accurate yet." class="text-white text-opacity-50 text-decoration-none"><i class="ti ti-help"></i></a>
                </div>
                <!-- END title -->
                <!-- BEGIN stat-lg -->
                <div class="row align-items-center mb-2">
                    <div class="col-7">
                        <h3 class="mb-0"><?php print $vn_shame; ?></h3>
                    </div>
                    <div class="col-5">
                        <h3 class="text-theme box mb-n2 align-top">
                            <i class="ti ti-crane"></i>
                        </h3>
                    </div>
                </div>
                <!-- END stat-lg -->
                <!-- BEGIN stat-sm -->
                <div class="small text-white text-opacity-50 text-truncate">
                    &nbsp;<br>
                    &nbsp;<br>
                    &nbsp;
                </div>
                <!-- END stat-sm -->
            </div>
            <!-- END card-body -->
            
            <!-- BEGIN card-arrow -->
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
            <!-- END card-arrow -->
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 mb-3">
        <div class="card">
            <!-- BEGIN card-body -->
            <div class="card-body">
                <!-- BEGIN title -->
                <div class="d-flex fw-bold small mb-3">
                    <span class="flex-grow-1">COLLECTION COST</span>
                    <a href="#" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="An extremely approximate amount I've spent putting my collection together." class="text-white text-opacity-50 text-decoration-none"><i class="ti ti-help"></i></a>
                </div>
                <!-- END title -->
                <!-- BEGIN stat-lg -->
                <div class="row align-items-center mb-2">
                    <div class="col-7">
                        <h3 class="mb-0">~ $<?php print number_format((float)$vn_cost, 2, '.', ','); ?></h3>
                    </div>
                    <div class="col-5">
                        <h3 class="text-theme box mb-0 align-top">
                            <i class="ti ti-currency-dollar-canadian"></i>
                        </h3>
                    </div>
                </div>
                <!-- END stat-lg -->
                <!-- BEGIN stat-sm -->
                <div class="small text-white text-opacity-50 text-truncate">
                    &nbsp;<br>
                    &nbsp;<br>
                    &nbsp;
                </div>
                <!-- END stat-sm -->
            </div>
            <!-- END card-body -->
            
            <!-- BEGIN card-arrow -->
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
            <!-- END card-arrow -->
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 mb-3">
        <div class="card">
            <!-- BEGIN card-body -->
            <div class="card-body">
                <!-- BEGIN title -->
                <div class="d-flex fw-bold small mb-3">
                    <span class="flex-grow-1">ARCHIVE COMPLETENESS</span>
                    <a href="#" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="How complete is the archive? In other words, how close does this archive reflect my collection? Right now? Not even close!" class="text-white text-opacity-50 text-decoration-none"><i class="ti ti-help"></i></a>
                </div>
                <!-- END title -->
                <!-- BEGIN stat-lg -->
                <div class="row align-items-center mb-2">
                    <div class="col-7">
                        <h3 class="mb-0">1 %</h3>
                    </div>
                    <div class="col-5">
                        <div class="progress mb-1">
                            <div class="progress-bar bg-theme" style="width: 1%">1%</div>
                        </div>
                    </div>
                </div>
                <!-- END stat-lg -->
                <!-- BEGIN stat-sm -->
                <div class="small text-white text-opacity-50 text-truncate">
                    &nbsp;<br>
                    &nbsp;<br>
                    &nbsp;
                </div>
                <!-- END stat-sm -->
            </div>
            <!-- END card-body -->
            
            <!-- BEGIN card-arrow -->
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
            <!-- END card-arrow -->
        </div>
    </div> 
</div>

<div class="row">
    <div class="col-12 mb-3">
        <div class='card'>
            <div class="card-header fw-bold small bg-white bg-opacity-15">FACTIONS AND CATEGORIES</div>
            <div class='card-body'>
                <div class="d-flex justify-content-center align-items-center">
<?php

                    while ($qr_collections->nextRow()){
                        $col_object = new ca_collections($qr_collections->get('collection_id'));
?>
                        <a class="m-1 d-flex align-items-center justify-content-center bg-theme bg-opacity-15 rounded-3 round-54 shadow text-decoration-none h-70px w-70px" href="/index.php/Detail/collections/<?php print $col_object->get('ca_collections.collection_id'); ?>" data-bs-toggle="tooltip" data-bs-title="<?php print $col_object->get('ca_collections.preferred_labels.name'); ?>">
<?php
                            if(!($col_img = $col_object->get('ca_collections.collection_media.media.tiny.url'))) {
                                print '<i class="ti ti-sitemap display-5"></i>';

                            }else{
?>
                                <img src="<?php print $col_object->get('ca_collections.collection_media.media.tiny.url'); ?>" class="rounded">
<?php
                            }
?>  
                        </a>
<?php
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
<div class="row mb-3">
    <div class="col-12">
        <div class='card'>
            <div class='card-body bg-dark m-1'>
                <?php print $this->render("Front/featured_set_slideshow_html.php"); ?>
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

<div class="row">
    <div class="col-lg-6">
        <div class='card mb-3'>
        <div class="card-header fw-bold small bg-white bg-opacity-15">POPULAR MODELS</div>
            <div class='card-body'>
                <div class="list-group">
<?php
                    $tm_count = 1;
                    while ($qr_topmodels->nextRow()){
                        $top_object = new ca_objects($qr_topmodels->get('object_id'));
?>
                    <a href='/index.php/Detail/objects/<?php print $top_object->get('ca_objects.object_id'); ?>' class='list-group-item list-group-item-action d-flex align-items-center'>
                        <div class="position-relative">
                            <div class="bg-center bg-cover bg-no-repeat w-80px h-60px" style="background-image: url(<?php print $top_object->get('ca_object_representations.media.thumbnail.url'); ?>">
                            </div>
                            <div class="position-absolute top-0 start-0">
                                <span class="badge bg-theme text-theme-900 rounded-0 d-flex align-items-center justify-content-center w-20px h-20px"><?php print $tm_count; ?></span>
                            </div>
                        </div>
                        <div class='flex-fill px-3'>
                            <div class="fw-500 text-white"><?php print $top_object->get('ca_objects.preferred_labels.name'); ?></div>
                        </div>
                    </a>
<?php
                        $tm_count++;
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
    <div class="col-lg-6">
        <div class='card mb-3'>
            <div class="card-header fw-bold small bg-white bg-opacity-15">RECENT ACTIVITY</div>
            <div class='card-body'>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless mb-2px small text-nowrap">
                        <tbody>
<?php
                        while ($qr_activity->nextRow()){
                            $qr_object = new ca_objects($qr_activity->get('object_id'));
                            $qr_occurrence = new ca_occurrences($qr_activity->get('occurrence_id'));
                            $qr_time = $qr_activity->get('edatetime');
?>
                            <tr>
                                <td>
                                    <span class="d-flex align-items-center">
                                        <i class="bi bi-circle-fill fs-6px text-theme me-2"></i>
                                        <span class="fw-bold"><?php print $qr_object->get('ca_objects.preferred_labels.name'); ?></span>
                                    </span>
                                </td>
                                <td>
                                    is now
                                </td>
                                <td>
                                    <span style="min-height: 18px"><?php print $qr_occurrence->get('ca_occurrences.preferred_labels.name'); ?></span>
                                </td>
                                <td><small><?php print $qr_time; ?></small></td>
                                <td><a href="/index.php/Detail/objects/<?php print $qr_object->get('ca_objects.object_id'); ?>" class="text-decoration-none text-white"><i class="bi bi-link"></i></a></td>
                            </tr>
<?php
                        }
?>
                        </tbody>
                    </table>
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

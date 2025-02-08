<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": Dashboard");
    $o_db = new Db();
    $qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
    $qr_objects->nextRow(); // the result has only 1 row.
    $vn_count = $qr_objects->get('c'); // this should be your count

    $qr_shame = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0 AND status=0');
    $qr_shame->nextRow(); // the result has only 1 row.
    $vn_shame = $qr_shame->get('c'); // this should be your count

    $vn_complete = ($vn_count - $vn_shame) / $vn_count * 100;

    $qr_cost = $o_db->query('SELECT SUM(value_decimal1) AS cost FROM ca_attribute_values WHERE element_id=61');
    $qr_cost->nextRow();
    $vn_cost = $qr_cost->get('cost');

    

    $qr_topmodels = $o_db->query('SELECT object_id FROM ca_objects WHERE deleted=0 ORDER BY view_count DESC LIMIT 5');

    $qr_activity = $o_db->query('SELECT * FROM ca_objects_x_occurrences ORDER BY edatetime DESC LIMIT 8');

    
?>
<!-- Hero Image -->
<div class="card">
    <div class="position-relative">
        <div class="opacity-50">
            <img class="card-img-top" src="/themes/caiTS/assets/img/IMG_0255.JPG" alt="Card image cap" style="max-height: 450px">
        </div>
        <div class="card-img-overlay p-4">
            <div class="text-white mt-3">
                <div class="mb-2 mt-4">
                    <span class="display-6">iToysoldiers</span>
                </div>
                <p class="fs-3 mb-0 opacity-75">The canonical archive of my wargaming collection</p>
            </div>
        </div>
    </div>
    <div class="card-footer text-bg-white">
        <div class="row">
            <div class="col-12">
                <div class="row text-center">
                    <div class="col-6 col-md-3 border-end">
                        <div class="mb-2">Objects</div>
                        <i class="ti ti-swords fs-9 mb-2"></i>
                        <div>
                            <?php print $vn_count; ?>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 border-end">
                        <div class="mb-2">Pile of Shame</div>
                        <i class="ti ti-certificate-2-off fs-9 mb-2"></i>
                        <div>
                            <?php print $vn_shame; ?>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 border-end">
                        <div class="mb-2">Completeness</div>
                        <i class="ti ti-archive fs-9 mb-2"></i>
                        <div>
                        <?php print number_format((float)$vn_complete, 2, '.', ''); ?>%
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="mb-2">Cost</div>
                        <i class="ti ti-currency-dollar-canadian fs-9 mb-2"></i>
                        <div>
                            $<?php print number_format((float)$vn_cost, 2, '.', ','); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<!-- ------------------------------------- -->
<!-- Leadership Start -->
<!-- ------------------------------------- -->
<div class="card w-100">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="fs-10 fw-bolder">Featured Models</h2>
                <p class="fs-4 mb-0">
                    Models of which I am particularly proud.
                </p>
            </div>
        </div>
        <?php print $this->render("Front/featured_set_slideshow_html.php"); ?>
    </div>
</div>
<!-- ------------------------------------- -->
<!-- Leadership end -->
<!-- ------------------------------------- -->

<!--  Row 1 -->
<div class="row">
    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                        <h4 class="card-title fw-semibold">Muster State</h4>
                        <p class="card-subtitle mb-0">How painted is my collection</p>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div id="chart-bar-basic" class="mx-n6"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 d-flex align-items-stretch flex-column">
        <!-- Collection Composition -->
        <div class="card w-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="card-title mb-9 fw-semibold">Composition</h4>
                        <h4 class="fw-semibold mb-3">$<?php print number_format((float)$vn_cost, 2, '.', ','); ?></h4>

                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <!-- <div id="breakup"></div> -->
                            <div id="apexchart" data-type="pie" data-title="Object Types" data-height="75"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Monthly Aquisitions -->
        <div class="card w-100">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-8">
                        <h4 class="card-title mb-9 fw-semibold">Monthly Aquisitions</h4>
                        <h4 class="fw-semibold mb-3">$6,820</h4>
                            <div class="d-flex align-items-center pb-1">
                                <span class="me-2 rounded-circle bg-danger-subtle round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-down-right text-danger"></i>
                                </span>
                                <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                <p class="fs-3 mb-0">last year</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <div class="text-white text-bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-currency-dollar fs-6"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="earning"></div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div>
                        <h4 class="card-title fw-semibold mb-1">Arms Distribution</h4>
                        <p class="card-subtitle">Model element types</p>
                        <!-- <div id="salary" class="mb-7 pb-8 mx-n4"></div> -->
                        <div id="apexRadarChart" class="mb-7 pb-8 mx-n4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-stretch flex-column">
            <div class="row">
                <!-- Projects -->
                <div class="col-sm-12 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-body">
                            <p class="mb-1 fs-3">Hobbying</p>
                            <h4 class="fw-semibold fs-7">classified</h4>
                            <div class="d-flex align-items-center mb-3">
                                <span class="me-1 rounded-circle bg-success-subtle round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                </span>
                                <p class="text-dark fs-3 mb-0">XXX</p>
                            </div>
                            <div id="projects"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Factions -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-7 pb-2">
                        <div class="me-3 pe-1">
                            <img src="/themes/caiTS/assets/img/Award.png" class="shadow-warning rounded-2" alt="New Stuff! Yay!" width="72" height="72" />
                        </div>
                        <div>
                            <h5 class="fw-semibold fs-5 mb-2">Factions and Categories</h5>
                        </div>
                    </div>
                    <div class="row">
                        <?php print $this->render("Front/factions_display_html.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card text-bg-primary border-0 w-100">
                <div class="card-body pb-0">
                    <h4 class="fw-semibold mb-1 text-white card-title">On Deck</h4>
                    <p class="fs-3 mb-3 text-white">What I'm currently working on</p>
                    <div class="row">
                        <?php print $this->render("Front/ondeck_display_html.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="mb-3">
                        <h4 class="card-title fw-semibold">Recent Activity</h4>
                    </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
<?php
                        while ($qr_activity->nextRow()){
                            $qr_object = new ca_objects($qr_activity->get('object_id'));
                            $qr_occurrence = new ca_occurrences($qr_activity->get('occurrence_id'));
                            $qr_edate = substr($qr_activity->get('edatetime'),0,13);
                            $qr_time = substr_replace(substr_replace(substr_replace(substr_replace(substr($qr_edate,0,13),'/',4,1),'/',7,0),'T',10,0),':',13,0);
?>
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end"><time class="timeago" datetime="<?php print $qr_time; ?>"><?php print $qr_time; ?></time></div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1"><a href="/index.php/Detail/objects/<?php print $qr_object->get('ca_objects.object_id'); ?>" class="text-decoration-none text-white"><?php print $qr_object->get('ca_objects.preferred_labels.name'); ?></a> &#8594; <?php print $qr_occurrence->get('ca_occurrences.preferred_labels.name'); ?></div>
                            </li>
<?php
                        }
?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <h4 class="card-title fw-semibold">Most Popular Objects</h4>
                        </div>
                    </div>
<?php
                    while ($qr_topmodels->nextRow()){
                        $top_object = new ca_objects($qr_topmodels->get('object_id'));
                        if (!$top_object->get('ca_object_representations.media.icon.url')) {
                            $obj_img = "/themes/caiTS/assets/img/Locked.png";
                        } else {
                            $obj_img = $top_object->get('ca_object_representations.media.icon.url');
                        }
?>
                        <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                            <div class="position-relative d-flex align-items-center">
                                <a href="/index.php/Detail/objects/<?php print $top_object->get('ca_objects.object_id'); ?>" class="stretched-link "></a>
                                <img src="<?php print $obj_img; ?>" width="72" class="rounded" alt="album">
                                <div class="ms-3">
                                    <h6 class="mb-0 fw-semibold"><?php print $top_object->get('ca_objects.preferred_labels.name'); ?></h6>
                                </div>
                            </div>
                        </div>
<?php
                    }
?>
            </div>
        </div>
    </div>
</div>

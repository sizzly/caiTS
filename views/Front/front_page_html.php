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
?>
<div class="main-wrapper overflow-hidden">

    <!-- ------------------------------------- -->
    <!-- banner Start -->
    <!-- ------------------------------------- -->
    <section class="bg-primary-subtle pt-7 py-lg-0 py-7">
        <div class="custom-container">
            <div class="row justify-content-center pt-lg-5 mb-4">
                <div class="col-lg-8">
                    <h1 class="text-link-color fw-bolder text-center fs-13 mb-0 pt-lg-2">
                        iToysoldiers
                    </h1>
                    <p class="text-muted fs-5 mb-0 fw-bold text-center">The canonical archive of my miniature wargaming collection.</p>
                </div>
            </div>
            <div class="row align-items-top mb-3">
                <div class="col-lg-3 d-none d-lg-block">

                    <div class="card overflow-hidden">
                        <div class="d-flex flex-row">
                            <div class="p-3 bg-info-subtle d-flex align-items-center">
                                <h3 class="text-info box mb-0">
                                    <i class="ti ti-building-warehouse"></i>
                                </h3>
                            </div>
                            <div class="p-3">
                                <h3 class="text-info mb-0 fs-6"><?php print $vn_count; ?></h3>
                                <span>Collection Objects</span>
                            </div>
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="d-flex flex-row">
                            <div class="p-3">
                                <h3 class="text-success mb-0 fs-6">~ <?php print number_format((float)$vn_cost, 2, '.', ','); ?></h3>
                                <span>Collection Cost</span>
                            </div>
                            <div class="p-3 bg-success-subtle d-flex align-items-center ms-auto">
                                <h3 class="text-success box mb-0">
                                    <i class="ti ti-currency-dollar-canadian"></i>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="card overflow-hidden">
                        <div class="d-flex flex-row">
                            <div class="p-3 bg-warning-subtle d-flex align-items-center">
                                <h3 class="text-warning box mb-0">
                                    <i class="ti ti-crane"></i>
                                </h3>
                            </div>
                            <div class="p-3">
                                <h3 class="text-warning mb-0 fs-6"><?php print $vn_shame; ?></h3>
                                <span>Pile of Shame</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="d-flex justify-content-center align-items-center gap-9 position-relative z-1 pb-lg-13">
                        <a class="d-flex align-items-center justify-content-center bg-light-subtle rounded-3 round-54 shadow" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="Drukhari">
                            <img src="/themes/caiTS/assets/images/darkeldar.svg" width="28" height="28" alt="icon">
                        </a>
                        <a class="d-flex align-items-center justify-content-center bg-light-subtle rounded-3 round-54 shadow" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="Harlequins">
                            <img src="/themes/caiTS/assets/images/harlequins.svg" width="28" height="28" alt="icon">
                        </a>
                        <a class="d-flex align-items-center justify-content-center bg-light-subtle rounded-3 round-54 shadow" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="World Eaters">
                            <img src="/themes/caiTS/assets/images/worldeaters.svg" width="28" height="28" alt="icon">
                        </a>
                        <a class="d-flex align-items-center justify-content-center bg-light-subtle rounded-3 round-54 shadow" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="Sisters of Battle">
                            <img src="/themes/caiTS/assets/images/sisters-of-battle.svg" width="28" height="28" alt="icon">
                        </a>
                        <a class="d-flex align-items-center justify-content-center bg-light-subtle rounded-3 round-54 shadow" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-title="Night Haunts">
                            <img src="/themes/caiTS/assets/images/nighthaunt.svg" width="28" height="28" alt="icon">
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-danger-subtle text-danger d-inline-block px-4 py-3 rounded">
                                    <i class="ti ti-droplet-question display-5"></i>
                                </div>
                                <div class="ms-auto">
                                    <button type="button" class="me-2 btn text-danger d-flex align-items-center" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="How complete is the archive? In other words, how close does this archive reflect my collection? Right now? Not even close!">
                                        <i class="ti ti-help fs-7"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h4 class="card-title">Archive Completeness Monitor</h4>
                                <div class="progress mt-4 bg-light">
                                    <div class="progress-bar text-bg-danger" style="width: 1%; height: 6px;" role="progressbar">
                                        <span class="sr-only">50% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- banner End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Leadership Start -->
    <!-- ------------------------------------- -->
    <?php print $this->render("Front/featured_set_slideshow_html.php"); ?>
    <!-- ------------------------------------- -->
    <!-- Leadership end -->
    <!-- ------------------------------------- -->

</div>
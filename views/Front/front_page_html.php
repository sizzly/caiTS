<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/front_page_html : Front page of site 
 * ----------------------------------------------------------------------
 */
    $o_db = new Db();
    $qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
    $qr_objects->nextRow(); // the result has only 1 row.
    $vn_count = $qr_objects->get('c'); // this should be your count
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
            <div class="row align-items-end mb-3">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="card text-white bg-primary rounded">
                        <div class="card-body p-4">
                            <span>
                                <i class="ti ti-building-warehouse fs-8"></i>
                            </span>
                            <h3 class="card-title mt-3 mb-0 text-white"><?php print $vn_count; ?></h3>
                            <p class="card-text text-white-50 fs-3 fw-normal">
                                Collection Objects
                            </p>
                        </div>
                    </div>
                    <div class="card text-white bg-success rounded">
                        <div class="card-body p-4">
                            <span>
                                <i class="ti ti-currency-dollar-canadian fs-8"></i>
                            </span>
                            <h3 class="card-title mt-3 mb-0 text-white">~ $5000</h3>
                            <p class="card-text text-white-50 fs-3 fw-normal">
                                Collection Cost
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="bg-danger-subtle text-danger d-inline-block px-4 py-3 rounded">
                                    <i class="ti ti-droplet-question display-5"></i>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0)" class="link text-dark" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-help fs-7"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <p class="ms-2">How complete is the archive? In other words, how close does this archive reflect my collection?</p>
                                            <p class="ms-2">Right now? Not even remotely!</p>
                                        </div>
                                    </div>
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
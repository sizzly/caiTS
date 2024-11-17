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

<ul class="breadcrumb">
	<li class="breadcrumb-item">Home</li>
</ul>

<h1 class="page-header">iToysoldiers.com
    <small>The canonical archive of my miniature wargaming collection.</small>
</h1>
<hr class="mb-4" />

<div class="row mb-3">
    <div class="col-lg-3">
        <div class="card overflow-hidden mb-2">
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
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>

        <div class="card overflow-hidden mb-2">
            <div class="d-flex flex-row">
                <div class="p-3 d-flex align-items-center">
                    <h3 class="text-warning box mb-0">
                        <i class="ti ti-crane"></i>
                    </h3>
                </div>
                <div class="p-3">
                    <h3 class="text-warning mb-0 fs-6"><?php print $vn_shame; ?></h3>
                    <span>Pile of Shame</span>
                </div>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>
        
        <div class="card overflow-hidden mb-2">
            <div class="d-flex flex-row">
                <div class="p-3">
                    <h3 class="text-success mb-0 fs-6">~ <?php print number_format((float)$vn_cost, 2, '.', ','); ?></h3>
                    <span>Collection Cost</span>
                </div>
                <div class="p-3 d-flex align-items-center ms-auto">
                    <h3 class="text-green box mb-0">
                        <i class="ti ti-currency-dollar-canadian"></i>
                    </h3>
                </div>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
    </div>
    <div class="col-lg-3">
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

                    <div class="progress">
                        <div class="progress-bar" style="width: 1%">1%</div>
                    </div>

                </div>
            </div>
            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>
        </div>
    </div>  
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class='card'>
            <div class="card-header fw-bold small">FEATURED MODELS</div>
            <div class='card-body'>
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




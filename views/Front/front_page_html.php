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

    $qr_collections = $o_db->query('SELECT collection_id FROM ca_collections WHERE deleted=0 AND parent_id IS NULL');

    $qr_topmodels = $o_db->query('SELECT object_id FROM ca_objects WHERE deleted=0 ORDER BY view_count DESC LIMIT 5');

    $qr_activity = $o_db->query('SELECT * FROM ca_objects_x_occurrences ORDER BY edatetime DESC LIMIT 11')

?>

<!-- ------------------------------------- -->
<!-- banner Start -->
<!-- ------------------------------------- -->
<Section class="bg-primary-subtle pt-7 py-lg-0 py-7">
    <div class="custom-container">
        <div class="row justify-content-center pt-lg-5 mb-4">
            <div class="col-lg-8">
                <h1 class="text-link-color fw-bolder text-center fs-11 mb-0 pt-lg-2">
                    iToysoldiers is the <span class="text-primary">canonical record</span> of my miniature wargaming collection
                </h1>
            </div>
        </div>
        <div class="row align-items-end mb-3">
            <div class="col-lg-3 d-none d-lg-block">

            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center align-items-center gap-9">
                    <p class="text-muted fs-5 mb-0 fw-bold">We have stats. Stats are cool.</p>
                </div>
                <div class="d-flex justify-content-center align-items-center gap-4 my-4 position-relative z-1">

                </div>
                <div class="d-flex justify-content-center align-items-center gap-9 position-relative z-1 pb-lg-13">
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
            <div class="col-lg-3 d-none d-lg-block">

            </div>
        </div>
    </div>
</Section>
<!-- ------------------------------------- -->
<!-- banner End -->
<!-- ------------------------------------- -->

<!-- ------------------------------------- -->
<!-- Leadership Start -->
<!-- ------------------------------------- -->
<section class="py-5 py-md-14 py-lg-12">
    <div class="container-fluid">
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
</section>
<!-- ------------------------------------- -->
<!-- Leadership end -->
<!-- ------------------------------------- -->

<!-- ------------------------------------- -->
<!-- Metric Start -->
<!-- ------------------------------------- -->
<section class="py-lg-12 py-13 border-top data-shadow">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <h2 class="fs-10 fw-bolder mb-3">Key metrics at a glance</h2>
                <p class="fs-4 mb-0">
                One of the coolest things about iToysoldiers is the ability to visualize the details of my collection. The Dashboard has more but here's the core set of stats.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-5">
                            <p class="text-primary text-uppercase fs-2 fw-bold mb-0">founded</p>
                            <h3 class="fs-12 fw-semibold ">2024</h3>
                            <p class="mb-0 fs-4">When this iteration was introduced</p>
                        </div>
                        <div class="mb-5">
                            <p class="text-primary text-uppercase fs-2 fw-bold mb-0">Objects</p>
                            <h3 class="fs-12 fw-semibold "><?php print $vn_count; ?></h3>
                            <p class="mb-0 fs-4">Objects in collection</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-5">
                            <p class="text-primary text-uppercase fs-2 fw-bold mb-0">Value</p>
                            <h3 class="fs-12 fw-semibold ">$<?php print number_format((float)$vn_cost, 2, '.', ','); ?></h3>
                            <p class="mb-0 fs-4">Estimate of collection value</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ------------------------------------- -->
<!-- Metric End -->
<!-- ------------------------------------- -->

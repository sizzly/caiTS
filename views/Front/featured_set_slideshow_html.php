<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/featured_set_slideshow_html : Featured models carousel 
 * ----------------------------------------------------------------------
 */
	$va_access_values = $this->getVar("access_values");
	$qr_res = $this->getVar('featured_set_items_as_search_result');
	$o_config = $this->getVar("config");
	$vs_img_template = "^ca_object_representations.media.widepreview.url";
	if($qr_res && $qr_res->numHits()){
?>   

<section id="featuredCarousel" class="py-5 py-md-14 py-lg-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <p class="fs-4 mb-0">
                    Models of which I am especially proud.
                </p>
            </div>
        </div>
		<div class="owl-carousel leadership-carousel owl-theme mt-5">
				
<?php
			while($qr_res->nextHit()){
				if($qr_res->get("ca_object_representations.media.widepreview")){
					if($vs_media = $qr_res->getWithTemplate("$vs_img_template", array("checkAccess" => $va_access_values))){
?>
                        <div class="item">
                            <a href="/index.php/Detail/objects/<?php print $qr_res->get("ca_objects.object_id"); ?>" class="text-decoration-none">
                                <div class='card'>
                                    <img src="<?php print $vs_media; ?>" alt="Featured Model">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php print $qr_res->get("ca_objects.preferred_labels.name"); ?></h5>
                                    </div>
                                    <div class='card-arrow'>
                                        <div class='card-arrow-top-left'></div>
                                        <div class='card-arrow-top-right'></div>
                                        <div class='card-arrow-bottom-left'></div>
                                        <div class='card-arrow-bottom-right'></div>
                                    </div>
                                </div>
                            </a>
                        </div>
<?php
					}
				}
			}
?>

	</div><!-- end owl carousel-wrapper -->
</section>
<?php
	}
?>
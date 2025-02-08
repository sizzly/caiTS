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

        <div class="owl-carousel leadership-carousel owl-theme mt-5">
            
                        
<?php
            while($qr_res->nextHit()){
                if($qr_res->get("ca_object_representations.media.widepreview")){
                    if($vs_media = $qr_res->getWithTemplate("$vs_img_template", array("checkAccess" => $va_access_values))){
?>
                        <div class="item">
                            <a href="/index.php/Detail/objects/<?php print $qr_res->get("ca_objects.object_id"); ?>" class="text-decoration-none">
                                <img src="<?php print $vs_media; ?>" class="rounded-3" alt="Featured Model">
                                <div class="position-relative leadership-card z-1 bg-white mt-n10 rounded py-3 px-8 mx-9 text-center shadow-sm">
                                    <h5 class="fs-5 fw-semibold mb-0"><?php print $qr_res->get("ca_objects.preferred_labels.name"); ?></h5>
                                </div>
                            </a>
                        </div>
<?php
                    }
                }
            }
?>
        </div><!-- end owl carousel-wrapper -->
<?php
	}
?>
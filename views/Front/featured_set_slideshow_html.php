<?php
/** ---------------------------------------------------------------------
 * themes/default/Front/featured_set_slideshow_html : Front page Carousel
 * ----------------------------------------------------------------------
 */
	$va_access_values = $this->getVar("access_values");
	$qr_res = $this->getVar('featured_set_items_as_search_result');
	$o_config = $this->getVar("config");
	$vs_caption_template = $o_config->get("front_page_set_item_caption_template");
	if(!$vs_caption_template){
		$vs_caption_template = "<l>^ca_objects.preferred_labels.name</l>";
	}
	if($qr_res && $qr_res->numHits()){
?>   
		<div id="carouselFront" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php
					$indcount = 0;
					while($indcount < $qr_res->numHits()){
						if($indcount == 0){
							print '<li data-bs-target="#carouselFront" data-bs-slide-to="'.$indcount.'" class="active"></li>';
						} else {
							print '<li data-bs-target="#carouselFront" data-bs-slide-to="'.$indcount.'"></li>';
						}
						$indcount++;
					}
				?>
			</ol>
    		<div class="carousel-inner">
        		<?php
            		$count = 0;
		    		while($qr_res->nextHit()){
			    		if($vs_media = $qr_res->getWithTemplate('<l>^ca_object_representations.media.widepreview</l>', array("checkAccess" => $va_access_values, "class" => 'd-block w-100'))){
							if($count == 0){
                        		print "<div class='carousel-item active'>".$vs_media;
                    		}
                    		else {
                        		print "<div class='carousel-item'>".$vs_media;
                    		}
				   			 $vs_caption = $qr_res->getWithTemplate($vs_caption_template);
				    		if($vs_caption){
					    		print "<div class='carousel-caption d-none d-md-block bg-gray-600 opacity-8 mb-4'><h5 class='text-dark'>".$vs_caption."</h5></div>";
				    		}
				    		print "</div>";
				    		$vb_item_output = true;
			    		}
                		$count++;
            		}
        		?>
    		</div>
    		<a class="carousel-control-prev" href="#carouselFront" data-bs-slide="prev">
        		<span class="carousel-control-prev-icon"></span>
        		<span class="sr-only">Previous</span>
     		</a>
    		<a class="carousel-control-next" href="#carouselFront" data-bs-slide="next">
        		<span class="carousel-control-next-icon"></span>
    		</a>
		</div>
<?php
	}
?>
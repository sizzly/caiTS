<?php
	$o_config = caGetContactConfig();
	$va_errors = $this->getVar("errors");
	$vn_num1 = rand(1,10);
	$vn_num2 = rand(1,10);
	$vn_sum = $vn_num1 + $vn_num2;
	$vs_page_title = ($o_config->get("contact_page_title")) ? $o_config->get("contact_page_title") : _t("Contact");
	
	# --- if a table has been passed this is coming from the Item Inquiry/Ask An Archivist contact form on detail pages
	$pn_id = $this->request->getParameter("id", pInteger);
	$ps_table = $this->request->getParameter("table", pString);
	
	if($pn_id && $ps_table){
		$t_item = Datamodel::getInstanceByTableName($ps_table);
		if($t_item){
			$t_item->load($pn_id);
			$vs_url = $this->request->config->get("site_host").caDetailUrl($this->request, $ps_table, $pn_id);
			$vs_name = $t_item->get($ps_table.".preferred_labels");
			$vs_idno = $t_item->get($ps_table.".idno");
			$vs_page_title = ($o_config->get("item_inquiry_page_title")) ? $o_config->get("item_inquiry_page_title") : _t("Item Inquiry");
		}
	}
?>
<!-- ------------------------------------- -->
<!-- Banner Start -->
<!-- ------------------------------------- -->
<section class="bg-primary-subtle mb-5 pb-sm-0 pb-1">
	<div class="container-fluid">
		<div class="text-center mb-sm-14 mb-5 pt-5 pt-lg-0">
			<p class="text-primary fw-bolder fs-4 mb-1">Contact</p>
			<h1 class="text-dark fs-13 fw-bolder">I'd love to hear from you</h1>
		</div>
	</div>
</section>
<!-- ------------------------------------- -->
<!-- Banner End -->
<!-- ------------------------------------- -->

<!-- ------------------------------------- -->
<!-- Social Media Start -->
<!-- ------------------------------------- -->
<section class="features-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                <div class="text-center mb-5">
					<a href="https://bsky.app/profile/itoysoldiers.bsky.social">
						<i class="d-block ti ti-brand-bluesky text-primary fs-10"></i>
						<h5 class="fs-5 fw-semibold mt-8">Bluesky</h5>
						<p class="mb-0 text-dark">
							For sure I'm on other social media sites but let's just use Bluesky.
						</p>
					</a>
                </div>
            </div>
			<div class="col-sm-6 col-md-4 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                <div class="text-center mb-5">
					<a href="mailto:rob@robtacey.com">
						<i class="d-block ti ti-mail text-primary fs-10"></i>
						<h5 class="fs-5 fw-semibold mt-8">Email</h5>
						<p class="mb-0 text-dark">
							You could just email me.
						</p>
					</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                <div class="text-center mb-5">
                    <i class="d-block ti ti-forms text-primary fs-10"></i>
                    <h5 class="fs-5 fw-semibold mt-8">Form</h5>
                    <p class="mb-0 text-dark">
                    	Alas, the form isn't working quite yet.
                    </p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                <div class="text-center mb-5">
					<a href="https://blog.itoysoldiers.com">
						<i class="d-block ti ti-brand-disqus text-primary fs-10"></i>
						<h5 class="fs-5 fw-semibold mt-8">Blog Comments</h5>
						<p class="mb-0 text-dark">
							I've got Disqus set up on my blog so feel free to weigh in.
						</p>
					</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ------------------------------------- -->
<!-- Social Media -->
<!-- ------------------------------------- -->

<!-- ------------------------------------- -->
<!-- Form Start -->
<!-- ------------------------------------- -->
<section class="py-lg-12 py-md-14 py-5">
	<div class="container-fluid">
		<div class="row g-7">
			<div class="col-lg-8">
				<form class="">
					<div class="d-flex flex-column gap-sm-7 gap-3">
						<div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
							<div class="d-flex flex-column flex-grow-1 gap-2">
								<label for="Fname" class="fs-3 fw-semibold text-dark">
									First Name *
								</label>
								<input type="text" name="Fname" id="Fname" placeholder="First Name" class="form-control">
							</div>
							<div class="d-flex flex-column flex-grow-1 gap-2">
								<label for="Lname" class="fs-3 fw-semibold text-dark">
									Last Name *
								</label>
								<input type="text" name="Lname" id="Lname" placeholder="Last name" class="form-control">
							</div>
						</div>
						<div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
							<div class="d-flex flex-column flex-grow-1 gap-2">
								<label for="email" class="fs-3 fw-semibold text-dark">
									Email *
								</label>
								<input type="email" name="email" id="email" placeholder="Email" class="form-control">
							</div>
						</div>
						<div class="d-flex flex-column gap-2">
							<label for="message" class="fs-3 fw-semibold text-dark">Message</label>
							<textarea name="message" id="message" class="form-control" rows="5"></textarea>
						</div>
					</div>
					<!-- <button class="btn btn-primary mt-sm-7 mt-3 px-9 py-6">Submit</button> -->
				</form>
			</div>
			<div class="col-lg-4">
				<div class="bg-primary p-7 rounded-4 position-relative overflow-hidden connect-details-shape">
					<div class="position-relative z-1">
						<div class="pb-10 border-bottom border-white border-opacity-10">
							<h3 class="text-white fs-6 fw-bolder mb-3">Reach Out</h3>
							<p class="fs-4 mb-0 text-white">
								Have questions, comments or need assistance? Let me know. I live for feedback.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ------------------------------------- -->
<!-- Form End -->
<!-- ------------------------------------- -->

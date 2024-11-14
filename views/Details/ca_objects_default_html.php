<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2022 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */
 
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
?>

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        	<div class="card-body px-4 py-3">
            	<div class="row align-items-center">
                	<div class="col-9">
                  		<h4 class="fw-semibold mb-8">{{{ca_objects.preferred_labels.name}}}</h4>
                  		<nav aria-label="breadcrumb">
                    		<ol class="breadcrumb">
                      			<li class="breadcrumb-item">
					  				{{{<unit relativeTo="ca_collections" delimiter="</li><li class='breadcrumb-item'>"><l>^ca_collections.preferred_labels.name</l></unit><ifcount min="1" code="ca_collections"></ifcount>}}}
                      			</li>
                      			<li class="breadcrumb-item" aria-current="page">{{{ca_objects.preferred_labels.name}}}</li>
                    		</ol>
                  		</nav>
                	</div>
                	<div class="col-3">
                  		<div class="text-center mb-n5">
                    		<!-- Navigation?? -->
                  		</div>
                	</div>
              	</div>
            </div>
        </div>
        <div class="shop-detail">
            <div class="card shadow-none border">
              	<div class="card-body p-4">
                	<div class="row">
                  		<div class="col-lg-6">
							{{{representationViewer}}}
                  		</div>
                  		<div class="col-lg-6">
                    		<div class="shop-content">
                      			<div class="d-flex align-items-center gap-2 mb-2">
					 				{{{<ifdef code="ca_objects.idno"><span class='badge text-bg-light fs-2 fw-semibold'>^ca_objects.idno</span></ifdef>}}}
                        			<span class="fs-2">{{{<unit>^ca_objects.type_id</unit>}}}</span>
                      			</div>
                      			<h4>{{{ca_objects.preferred_labels.name}}}</h4>
                      			<p class="mb-3">{{{<ifdef code="ca_objects.work_description">
									^ca_objects.work_description
								</ifdef>}}}</p>

								<div class="d-flex align-items-center gap-8 py-7 border-top">
									{{{<ifdef code="ca_objects.dateSet.setDisplayValue"><div class="unit"><label>Date</label>^ca_objects.dateSet.setDisplayValue</div></ifdef>}}}

									<div class="row">
						<div class="col-sm-6">		
							{{{<ifcount code="ca_entities" min="1"><div class="unit">
								<ifcount code="ca_entities" min="1" max="1"><label>Related person</label></ifcount>
								<ifcount code="ca_entities" min="2"><label>Related people</label></ifcount>
								<unit relativeTo="ca_entities" delimiter="<br/>"><l>^ca_entities.preferred_labels</l> (^relationship_typename)</unit>
							</div></ifcount>}}}
							
							{{{<ifcount code="ca_occurrences" min="1"><div class="unit">
								<ifcount code="ca_occurrences" min="1" max="1"><label>Related occurrence</label></ifcount>
								<ifcount code="ca_occurrences" min="2"><label>Related occurrences</label></ifcount>
								<unit relativeTo="ca_occurrences" delimiter="<br/>"><l>^ca_occurrences.preferred_labels</l> (^relationship_typename)</unit>
							</div></ifcount>}}}
							
							{{{<ifcount code="ca_places" min="1"><div class="unit">
								<ifcount code="ca_places" min="1" max="1"><label>Related place</label></ifcount>
								<ifcount code="ca_places" min="2"><label>Related places</label></ifcount>
								<unit relativeTo="ca_places" delimiter="<br/>"><l>^ca_places.preferred_labels</l> (^relationship_typename)</unit>
							</div></ifcount>}}}
							
							{{{<ifcount code="ca_list_items" min="1"><div class="unit">
								<ifcount code="ca_list_items" min="1" max="1"><label>Related Term</label></ifcount>
								<ifcount code="ca_list_items" min="2"><label>Related Terms</label></ifcount>
								<unit relativeTo="ca_list_items" delimiter="<br/>"><l>^ca_list_items.preferred_labels.name_plural</l> (^relationship_typename)</unit>
							</div></ifcount>}}}
							
						</div><!-- end col -->				
						<div class="col-sm-6 colBorderLeft">
							{{{map}}}
						</div>
					</div>
								</div>
                    		</div>
                  		</div>
                	</div>
              	</div>
            </div>
			<!-- Bottom Tabs
            <div class="card shadow-none border">
              	<div class="card-body p-4">
                	<ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                  		<li class="nav-item" role="presentation">
                    		<button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                      			Narrative Text
                    		</button>
                  		</li>
                  		<li class="nav-item" role="presentation">
                    		<button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">
                      			Additional Details
                    		</button>
                  		</li>
                	</ul>
                	<div class="tab-content pt-4" id="pills-tabContent">
                  		<div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
				  			{{{<ifdef code="ca_objects.work_description">
								<div class="unit">
									<span>^ca_objects.work_description</span>
								</div>
							</ifdef>}}}
                  		</div>
                  		<div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                    		<div class="row">
                      			<div class="col-lg-4 d-flex align-items-stretch">
                        			<div class="card shadow-none border w-100 mb-7 mb-lg-0">
                          				<div class="card-body text-center p-4 d-flex flex-column justify-content-center">
                            				<h6 class="mb-3">Average Rating</h6>
                            				<h2 class="text-primary mb-3 fw-semibold fs-9">4/5</h2>
                            				<ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
												<li>
													<a class="me-1" href="javascript:void(0)">
														<i class="ti ti-star text-warning fs-6"></i>
													</a>
												</li>
												<li>
													<a class="me-1" href="javascript:void(0)">
														<i class="ti ti-star text-warning fs-6"></i>
													</a>
												</li>
												<li>
													<a class="me-1" href="javascript:void(0)">
														<i class="ti ti-star text-warning fs-6"></i>
													</a>
												</li>
												<li>
													<a class="me-1" href="javascript:void(0)">
														<i class="ti ti-star text-warning fs-6"></i>
													</a>
												</li>
												<li>
													<a href="javascript:void(0)">
														<i class="ti ti-star text-warning fs-6"></i>
													</a>
												</li>
                            				</ul>
                          				</div>
                        			</div>
                      			</div>
                      			<div class="col-lg-4 d-flex align-items-stretch">
                        			<div class="card shadow-none border w-100 mb-7 mb-lg-0">
                          				<div class="card-body p-4 d-flex flex-column justify-content-center">
                            				<div class="d-flex align-items-center gap-9 mb-3">
                              					<span class="flex-shrink-0 fs-2">1 Stars</span>
                              					<div class="progress bg-primary-subtle w-100 h-4">
                                					<div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                              					</div>
                              					<h6 class="mb-0">(485)</h6>
                            				</div>
											<div class="d-flex align-items-center gap-9 mb-3">
												<span class="flex-shrink-0 fs-2">2 Stars</span>
												<div class="progress bg-primary-subtle w-100 h-4">
													<div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
												</div>
												<h6 class="mb-0">(215)</h6>
											</div>
											<div class="d-flex align-items-center gap-9 mb-3">
												<span class="flex-shrink-0 fs-2">3 Stars</span>
												<div class="progress bg-primary-subtle w-100 h-4">
													<div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
												</div>
												<h6 class="mb-0">(110)</h6>
											</div>
											<div class="d-flex align-items-center gap-9 mb-3">
												<span class="flex-shrink-0 fs-2">4 Stars</span>
												<div class="progress bg-primary-subtle w-100 h-4">
													<div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
												</div>
												<h6 class="mb-0">(620)</h6>
											</div>
											<div class="d-flex align-items-center gap-9">
												<span class="flex-shrink-0 fs-2">5 Stars</span>
												<div class="progress bg-primary-subtle w-100 h-4">
													<div class="progress-bar" role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%;"></div>
												</div>
												<h6 class="mb-0">(160)</h6>
                            				</div>
                          				</div>
                        			</div>
                      			</div>
                      			<div class="col-lg-4 d-flex align-items-stretch">
                        			<div class="card shadow-none border w-100 mb-7 mb-lg-0">
                          				<div class="card-body p-4 d-flex flex-column justify-content-center">
                            				<button type="button" class="btn btn-outline-primary d-flex align-items-center gap-2 mx-auto">
                              					<i class="ti ti-pencil fs-7"></i>Write an Review
                            				</button>
                          				</div>
                        			</div>
                      			</div>
                    		</div>
                  		</div>
                	</div>
              	</div>
            </div>
			Bottom Tabs Supressed -->
        </div>
    </div>
</div>
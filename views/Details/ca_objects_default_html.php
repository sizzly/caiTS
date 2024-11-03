<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
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
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<h1 class="page-header">{{{ca_objects.preferred_labels.name}}}
						<small>Alternative title here</small>
					</h1>
					<hr class="mb-4" />

					<div id="imagesWidget" class="mb-5">
						<div class="card mb-3">
							<div class="card-body">
								<div class="d-flex">
									{{{representationViewer}}}
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

					<div id="descriptionWidget" class="mb-5">
						<h4>Description</h4>
						{{{<ifdef code="ca_objects.work_description">
							<p>^ca_objects.work_description</p>
						</ifdef>}}}
					</div>

					<div id="metaWidget" class="mb-5">
						<h4>Meta Data</h4>
						<div class="card mb-3">
							<div class="card-body">
								<div class="list-group">
									<!--begin Order of Battle -->
									{{{<unit relativeTo="ca_collections" delimiter="<br/>">
										<div class="list-group-item d-flex align-items-center">
											<div class="w-40px h-40px d-flex align-items-center justify-content-center bg-dark text-white rounded-2 ms-n1">
												<i class="fa fa-shield-alt fa-lg"></i>
											</div>
											<div class="flex-fill px-3">
												<div class="fw-bold"><l>^ca_collections.preferred_labels.name</l></div>
												<div class="small text-white text-opacity-50">Order of Battle</div>
											</div>
										</div>
									</unit>}}}
									<!-- end Order of Battle -->
					
									<!--begin Identification Number -->
									{{{<ifdef code="ca_objects.idno">
										<div class="list-group-item d-flex align-items-center">
											<div class="w-40px h-40px d-flex align-items-center justify-content-center bg-dark text-white rounded-2 ms-n1">
												<i class="fa fa-hashtag fa-lg"></i>
											</div>
											<div class="flex-fill px-3">
												<div class="fw-bold">^ca_objects.idno</div>
												<div class="small text-white text-opacity-50">Identifier</div>
											</div>
										</div>
									</ifdef>}}}
									<!-- end Identification Number -->

									<!-- begin Workflow -->
									{{{<ifdef code="ca_objects.status">
										<div class="list-group-item d-flex align-items-center">
											<div class="w-40px h-40px d-flex align-items-center justify-content-center bg-dark text-white rounded-2 ms-n1">
												<i class="fas fa-chart-pie fa-lg"></i>
											</div>
											<div class="flex-fill px-3">
												<div class="fw-bold">^ca_objects.status</div>
												<div class="small text-white text-opacity-50">State of Muster</div>
											</div>
										</div>
									</ifdef>}}}
									<!-- end Workflow -->
					
									<!-- begin Entities -->
									{{{<unit relativeTo="ca_entities" delimiter="">
										<div class="list-group-item d-flex align-items-center">
											<div class="w-40px h-40px d-flex align-items-center justify-content-center bg-dark text-white rounded-2 ms-n1">
												<i class="fas fa-building fa-lg"></i>
											</div>
											<div class="flex-fill px-3">
												<div class="fw-bold"><l>^ca_entities.preferred_labels</l></div>
												<div class="small text-white text-opacity-50">^relationship_typename</div>
											</div>
										</div>
									</unit>}}}
									<!-- end Entities -->
								</div>
								<!-- end LIST GROUP -->
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

				<div class="col-xl-3">
					<!-- BEGIN #sidebar -->
					<nav class="navbar navbar-sticky d-none d-xl-block">
						<nav class="nav">
							<a class="nav-link" href="#imagesWidget" data-toggle="scroll-to">Images</a>
							<a class="nav-link" href="#descriptionWidget" data-toggle="scroll-to">Description</a>
							<a class="nav-link" href="#metaWidget" data-toggle="scroll-to">Meta Data</a>
						</nav>
					</nav>
					<!-- END #sidebar -->
				</div>

			</div>
		</div>
	</div>
</div>
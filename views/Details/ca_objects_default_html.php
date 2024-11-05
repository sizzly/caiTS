<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 */
 
	$t_object = 				$this->getVar("item");
	$va_comments = 				$this->getVar("comments");
	$va_tags = 					$this->getVar("tags_array");
	$vn_comments_enabled = 		$this->getVar("commentsEnabled");
	$vn_share_enabled = 		$this->getVar("shareEnabled");
	$vn_pdf_enabled = 			$this->getVar("pdfEnabled");
	$vn_representation_count = 	$this->getVar('representation_count');
	$vn_id =					$t_object->get('ca_objects.object_id');
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<!--
					<h1 class="page-header">{{{ca_objects.preferred_labels.name}}}</h1>
					<hr class="mb-4" />
-->
					<div id="summaryWidget" class="mb-3">
						<div class="card">
  							<div class="m-1 bg-white bg-opacity-15">
    							<div class="position-relative overflow-hidden" style="height: 165px">
      								<div class="card-img-overlay text-white text-center bg-dark-transparent-5">
        								<div class="mb-2"></div>
										<div>
											<h1 class="page-header">{{{ca_objects.preferred_labels.name}}}</h1>
										</div>
									</div>
								</div>
								<!--
								<div class="card-body py-2 px-3">
									<div class="row text-center">
										<div class="col-4">
										<div class="fw-bold">415</div>
										<div class="fs-12px">posts</div>
										</div>
										<div class="col-4">
										<div class="fw-bold">140k</div>
										<div class="fs-12px">followers</div>
										</div>
										<div class="col-4">
										<div class="fw-bold">697</div>
										<div class="fs-12px">following</div>
										</div>
									</div>
								</div>
								-->
							</div>
							<div class="card-arrow">
								<div class="card-arrow-top-left"></div>
								<div class="card-arrow-top-right"></div>
								<div class="card-arrow-bottom-left"></div>
								<div class="card-arrow-bottom-right"></div>
							</div>
						</div>
					</div>
					<div id="descriptionWidget" class="mb-3">
						<div class='card'>
							<div class='card-header fw-bold small'>Description</div>
							<div class='card-body'>
								{{{<ifdef code="ca_objects.work_description">
									<p>^ca_objects.work_description</p>
								</ifdef>}}}
							</div>
							<div class='card-arrow'>
								<div class='card-arrow-top-left'></div>
								<div class='card-arrow-top-right'></div>
								<div class='card-arrow-bottom-left'></div>
								<div class='card-arrow-bottom-right'></div>
							</div>
						</div>
					</div>

					<div id="imagesWidget" class="mb-3">
						<div class="card mb-3">
							<div class="card-header fw-bold small">Images</div>
							<div class="card-body">
								<div class="widget-img-list">
									{{{<unit><unit relativeTo="ca_objects_x_object_representations" delimiter="">
										<div class="widget-img-list-item"><a href="^ca_object_representations.media.original.url" data-lity><span class="img" style="background-image: url(^ca_object_representations.media.preview.url)"></span></a></div>
									</unit></unit>}}}
									
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

					<div id="metaWidget" class="mb-3">
						<div class="card mb-3">
							<div class="card-header fw-bold small">Meta Data</div>
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
							<a class="nav-link" href="#summaryWidget" data-toggle="scroll-to">Summary</a>
							<a class="nav-link" href="#descriptionWidget" data-toggle="scroll-to">Description</a>
							<a class="nav-link" href="#imagesWidget" data-toggle="scroll-to">Images</a>
							<a class="nav-link" href="#metaWidget" data-toggle="scroll-to">Meta Data</a>
						</nav>
					</nav>
					<!-- END #sidebar -->
				</div>

			</div>
		</div>
	</div>
</div>
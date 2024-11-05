<?php
	$t_item = $this->getVar("item");
	$va_comments = $this->getVar("comments");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");

	# --- get collections configuration
	$o_collections_config = caGetCollectionsConfig();
	$vb_show_hierarchy_viewer = true;
	if($o_collections_config->get("do_not_display_collection_browser")){
		$vb_show_hierarchy_viewer = false;
	}
	# --- get the collection hierarchy parent to use for exportin finding aid
	$vn_top_level_collection_id = array_shift($t_item->get('ca_collections.hierarchy.collection_id', array("returnWithStructure" => true)));

?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10">
			<div class="row">
				<div class="col-xl-9">
					<div id="summaryWidget" class="mb-3">
						<div class="card">
  							<div class="m-1 bg-white bg-opacity-15">
    							<div class="position-relative overflow-hidden" style="height: 165px">
      								<div class="card-img-overlay text-white text-center bg-dark-transparent-5">
        								<div class="mb-2"></div>
										<div>
											<h1 class="page-header">{{{^ca_collections.preferred_labels.name}}}</h1>
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
								{{{<ifdef code="ca_collections.description">
									<p>^ca_collections.description</p>
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


						<div class="card">
							<div class="card-header fw-bold small">Members</div>
  							<div class="card-body">
    							<div class="widget-img-list">

									{{{<unit relativeTo="ca_objects" delimiter="">
										<div class="widget-img-list-item"><a href="/index.php/Detail/objects/^ca_objects.object_id"><span class="img" style="background-image: url(^ca_object_representations.media.preview.url)"></span></a></div>
									</unit>}}}

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

					<div id="metaWidget" class="mb-5">
						<div class="card mb-3">
							<div class="card-header fw-bold small">Meta Data</div>
							<div class="card-body">
								<p>Coming soon</p>
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
							<a class="nav-link" href="#imagesWidget" data-toggle="scroll-to">Members</a>
							<a class="nav-link" href="#metaWidget" data-toggle="scroll-to">Meta Data</a>
						</nav>
					</nav>
					<!-- END #sidebar -->
				</div>
			</div>
		</div>
	</div>
</div>

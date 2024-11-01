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
					<h1 class="page-header">{{{^ca_collections.preferred_labels.name}}}</h1>
					<hr class="mb-4" />

					<div id="imagesWidget" class="mb-5">
						<h4>Members</h4>

						<div class="card">
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

					<div id="descriptionWidget" class="mb-5">
						<h4>Description</h4>
						<p>
							{{{<ifdef code="ca_collections.description">
								^ca_collections.description
							</ifdef>}}}
						</p>
					</div>

					<div id="metaWidget" class="mb-5">
					<h4>Meta Data</h4>
						<div class="card mb-3">
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

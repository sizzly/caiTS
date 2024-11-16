<?php
	$o_collections_config = $this->getVar("collections_config");
	$qr_collections = $this->getVar("collection_results");
?>
<div class="body-wrapper">
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
              	<div class="row align-items-center">
                	<div class="col-9">
                  		<nav aria-label="breadcrumb">
                    		<ol class="breadcrumb">
                      			<li class="breadcrumb-item">
                        			<a class="text-muted text-decoration-none" href="/index.php">Home</a>
                      			</li>
                      			<li class="breadcrumb-item" aria-current="page">Collections</li>
                    		</ol>
                  		</nav>
                	</div>
                	<div class="col-3">
                  		<div class="text-center mb-n5">
                  	</div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-list">
        <div class="card">
            <div class="card-body p-3">
                <div class="table-responsive border rounded">
                  	<table class="table align-middle text-nowrap mb-0">
                    	<thead>
                      		<tr>
								<th scope="col">Collections</th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
								<th scope="col"></th>
                      		</tr>
                    	</thead>
                    	<tbody>
<?php	
	if($qr_collections && $qr_collections->numHits()) {
		while($qr_collections->nextHit()) {
?>
<tr>
	<td>
		<div class="d-flex align-items-center">
			<div class="ms-3">
				<h4 class="mb-0"><?php print caDetailLink($this->request, $qr_collections->get("ca_collections.preferred_labels"), "", "ca_collections",  $qr_collections->get("ca_collections.collection_id")); ?></h4>
				<p class="mb-0"><?php print $qr_collections->get("ca_collections.description"); ?></p>
			</div>
		</div>
	</td><td></td><td></td><td></td><td></td>
</tr>
<?php
		}
	} else {
		print _t('No collections available');
	}
?>
                    	</tbody>
                  	</table>
                </div>
            </div>
        </div>
    </div>
</div>
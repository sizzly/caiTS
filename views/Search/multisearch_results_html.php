<?php
	$va_results = $this->getVar('results');
	$va_result_count = $va_results['_info_']['totalCount'];
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8"><?php print _t("Search results for %1", caUcFirstUTF8Safe($this->getVar('searchForDisplay'))); ?></h4>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a class="text-muted text-decoration-none" href="/">Home</a>
						</li>
						<li class="breadcrumb-item" aria-current="page">Search</li>
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

<div class="card position-relative overflow-hidden">
    <div class="shop-part d-flex w-100">
        <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block">
			<div class='bCriteria p-4'>
				<h6>Search Summary</h6>
				<?php
				$i = 0;
				foreach($this->getVar('blockNames') as $vs_block) {
					if ($va_results[$vs_block]['count'] == 0) { continue; }
					$i++;
					if($i > 1){
						print " <br /> ";
					}
					print "<a href='#{$vs_block}'>".$va_results[$vs_block]['displayName']." (".$va_results[$vs_block]['count'].")</a>";
				}
?>
			</div>
        </div>

		<div class="card-body p-4 pb-0">
			<div class="d-flex justify-content-between align-items-center gap-6 mb-4">
				<a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#filtercategory" role="button" aria-controls="filtercategory">
					<i class="ti ti-menu-2 fs-6"></i>
				</a>
			</div>
<?php
			if ($va_result_count > 0) {
				foreach($this->getVar('blockNames') as $vs_block) {
?>
					<a href='#' name='<?php print $vs_block; ?>' aria-label='<?php print $vs_block; ?>'></a>

					<div class="row">
						<?php print $va_results[$vs_block]['html']; ?>
					</div>
<?php
				} 
			}else{
				print "<H1>"._t("Your search for %1 returned no results", caUcFirstUTF8Safe($this->getVar('search')))."</H1>";
			}
?>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="filtercategory" aria-labelledby="filtercategoryLabel">
            <div class="offcanvas-body shop-filters w-100 p-0">
				<div class="p-4">
					<h6>Search Summary</h6>
					<?php
					$i = 0;
					foreach($this->getVar('blockNames') as $vs_block) {
						if ($va_results[$vs_block]['count'] == 0) { continue; }
						$i++;
						if($i > 1){
							print " <br /> ";
						}
						print "<a href='#{$vs_block}'>".$va_results[$vs_block]['displayName']." (".$va_results[$vs_block]['count'].")</a>";
					}
?>
				</div>
            </div>
        </div>
    </div>
</div>
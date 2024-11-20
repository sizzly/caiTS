<?php
	$va_results = $this->getVar('results');
	$va_result_count = $va_results['_info_']['totalCount'];
?>

<ul class="breadcrumb">
	<li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Search Results</li>
</ul>

<h1 class="page-header"><?php print _t("Search results for %1", caUcFirstUTF8Safe($this->getVar('searchForDisplay'))); ?>
</h1>
<hr class="mb-4" />

<div class="row">
	<div class="col-md-3 mb-3">
		<div class='card'>
			<div class='card-header fw-bold small bg-white bg-opacity-15'>SUMMARY</div>
  			<div class='card-body'>
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
			<div class='card-arrow'>
				<div class='card-arrow-top-left'></div>
				<div class='card-arrow-top-right'></div>
				<div class='card-arrow-bottom-left'></div>
				<div class='card-arrow-bottom-right'></div>
			</div>
		</div>
	</div>
	<div class="col-md-9 mb-3">
		<div class='card'>
  			<div class='card-header fw-bold small bg-white bg-opacity-15'>RESULTS</div>
			<div class='card-body'>
<?php
				if ($va_result_count > 0) {
					foreach($this->getVar('blockNames') as $vs_block) {
?>
						<a href='#' name='<?php print $vs_block; ?>' aria-label='<?php print $vs_block; ?>'></a>
						<div id="<?php print $vs_block; ?>Block" class='resultBlock'>
							<?php print $va_results[$vs_block]['html']; ?>
						</div>
<?php
					} 
				}else{
					print "<H1>"._t("Your search for %1 returned no results", caUcFirstUTF8Safe($this->getVar('search')))."</H1>";
				}
?>
			</div>
			<div class='card-arrow'>
				<div class='card-arrow-top-left'></div>
				<div class='card-arrow-top-right'></div>
				<div class='card-arrow-bottom-left'></div>
				<div class='card-arrow-bottom-right'></div>
			</div>
		</div>
	</div>
</div>

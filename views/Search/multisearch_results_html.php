<?php
	$va_results = $this->getVar('results');
	$va_result_count = $va_results['_info_']['totalCount'];
	if ($va_result_count > 0) {
?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="row">
						<div class="col-xl-9">
							<div id="summaryWidget" class="mb-3">
								<h1 class="page-header"><?php print _t("Search results for %1", caUcFirstUTF8Safe($this->getVar('searchForDisplay'))); ?></h1>
								<hr class="mb-4" />
							</div>
<?php
							foreach($this->getVar('blockNames') as $vs_block) {
?>
								<div id="<?php print $vs_block; ?>Block" class='mb-4'>
									<?php print $va_results[$vs_block]['html']; ?>
								</div>
<?php
							}
?>	
						</div>
						<div class="col-xl-3">
							<!-- BEGIN #sidebar -->
							<nav class="navbar navbar-sticky d-none d-xl-block">
								<nav class="nav">
									<a class="nav-link" href="#summaryWidget" data-toggle="scroll-to">Summary</a>
<?php
									$i = 0;
									foreach($this->getVar('blockNames') as $vs_block) {
										if ($va_results[$vs_block]['count'] == 0) { continue; }
										$i++;
										print "<a href='#{$vs_block}Block' data-toggle='scroll-to' class='nav-link'>".$va_results[$vs_block]['displayName']." (".$va_results[$vs_block]['count'].")</a>";
									}
?>
								</nav>
							</nav>
							<!-- END #sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
	} else {
		print "<H1 class='page_header'>"._t("Your search for %1 returned no results", caUcFirstUTF8Safe($this->getVar('search')))."</H1>";
	}
?>
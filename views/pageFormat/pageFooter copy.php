<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php : 
 * ----------------------------------------------------------------------
  */
?>

	</div>
<!-- END #app -->

	<div id="footer" class="app-footer">
		<div class="row">
			<div class="col-lg-4">
				© 2024 RST All Right Reserved
			</div>
			<div class="col-lg-4">
			</div>
			<div class="col-lg-4 text-end">
				Powered by <a href="https://collectiveaccess.org">Collective Access</a>
			</div>
		</div>
	</div>
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="/themes/caiTS/assets/js/vendor.min.js"></script>
	<script src="/themes/caiTS/assets/js/app.min.js"></script>
	<script src="/themes/caiTS/assets/js/homepage.js"></script>
	<script src="/themes/caiTS/assets/js/productDetail.js"></script>
	<!-- ================== END core-js ================== -->

	<!-- ================== BEGIN page-js ================== -->
	<script src="/themes/caiTS/assets/js/lity/dist/lity.min.js"></script>
	<script src="/themes/caiTS/assets/js/owl.carousel/dist/owl.carousel.min.js"></script>
	<script src="/themes/caiTS/assets/js/apexcharts/dist/apexcharts.min.js"></script>
	<script src="/themes/caiTS/assets/js/jquery.timeago.js"></script>
	<!-- ================== END page-js ================== -->
<?php 
	if ($this->request->getController() == "Front") {
		print $this->render("Front/dashboard_stats_html.php");
	}
?>
	<script>
	jQuery(document).ready(function() {
	jQuery("time.timeago").timeago();
	});
	</script>
</body>
</html>
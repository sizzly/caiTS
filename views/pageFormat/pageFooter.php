<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php : 
 * ----------------------------------------------------------------------
  */
?>
    </div>
    <!-- ------------------------------------- -->
    <!-- Footer Start -->
    <!-- ------------------------------------- -->
    <footer>
        <div class="container-fluid">
            <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
                <div class="d-flex gap-3 align-items-center">
                    <img src="/themes/caiTS/assets/images/logos/favicon.png" alt="icon">
                    <p class="fs-4 mb-0">All rights reserved by iToysoldiers. </p>
                </div>
                <div>
                    <p class="mb-0">Powered by <a target="_blank" href="https://collectiveaccess.org/" class="text-primary link-primary">Collective Access</a>.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ------------------------------------- -->
    <!-- Footer End -->
    <!-- ------------------------------------- -->

    <!-- Scroll Top -->
    <a href="javascript:void(0)" class="top-btn btn btn-primary d-flex align-items-center justify-content-center round-54 p-0 rounded-circle">
        <i class="ti ti-arrow-up fs-7"></i>
    </a>

    <script src="/themes/caiTS/assets/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="/themes/caiTS/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/themes/caiTS/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="/themes/caiTS/assets/js/theme/app.horizontal.init.js"></script>
    <script src="/themes/caiTS/assets/js/theme/theme.js"></script>
    <script src="/themes/caiTS/assets/js/theme/app.min.js"></script>
    <script src="/themes/caiTS/assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/themes/caiTS/assets/js/frontend-landingpage/homepage.js"></script>
    <script src="/themes/caiTS/assets/js/jquery.timeago.js"></script>

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
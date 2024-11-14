<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php : 
 * ----------------------------------------------------------------------
 */
	if ($this->request->getController() == "Front" || $this->request->getController() == "About") {
?>
        <!-- Code for Front and About -->
<?php
    }else{
?>
        <!-- Code for other pages -->
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>

<?php
    }
?>
    <!-- ------------------------------------- -->
    <!-- Footer Start -->
    <!-- ------------------------------------- -->
    <footer>
        <div class="container-fluid">
            <div class="border-bottom">
                <div class="row mb-sm-12 mb-4">

                </div>
            </div>
            <div class="d-flex justify-content-between py-7 flex-md-nowrap flex-wrap gap-sm-0 gap-3">
                <div class="d-flex gap-3 align-items-center">
                    <img src="/themes/caiTS/assets/pawtucket/graphics/logos/itsicon.jpg" alt="icon">
                    <p class="fs-4 mb-0">All rights reserved by RST.</p>
                </div>
            <div>
            <p class="mb-0">Theme by <a target="_blank" href="https://adminmart.com/" class="text-primary link-primary">AdminMart</a>.</p>
            <p class="mb-0">Powered by <a target="_blank" href="https://collectiveaccess.org/" class="text-primary link-primary">Collective Access</a>.</p>
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
    <script src="/themes/caiTS/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/themes/caiTS/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="/themes/caiTS/assets/js/theme/app.dark.init.js"></script>
    <script src="/themes/caiTS/assets/js/theme/theme.js"></script>
    <script src="/themes/caiTS/assets/js/theme/app.min.js"></script>
    <script src="/themes/caiTS/assets/js/frontend-landingpage/homepage.js"></script>
    <script src="/themes/caiTS/assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/themes/caiTS/assets/js/apps/productDetail.js"></script>
</body>
</html>

<?php
	MetaTagManager::setWindowTitle($this->request->config->get("app_display_name").": About");
	$o_db = new Db();
    $qr_objects = $o_db->query('SELECT count(*) AS c FROM ca_objects WHERE deleted=0');
    $qr_objects->nextRow(); // the result has only 1 row.
    $vn_count = $qr_objects->get('c'); // this should be your count

    $qr_cost = $o_db->query('SELECT SUM(value_decimal1) AS cost FROM ca_attribute_values WHERE element_id=61');
	$qr_cost->nextRow();
	$vn_cost = $qr_cost->get('cost');
?>

  <!-- ------------------------------------- -->
    <!-- banner Start -->
    <!-- ------------------------------------- -->
    <section>
      <div class="bg-primary-subtle py-lg-12 py-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <h2 class="fs-12 fw-bolder ">Get to know Modernize Dashboard Template</h2>
              <div class="d-flex mt-4 gap-3 flex-sm-nowrap flex-wrap">
                <a href="javascript:void(0)" class="btn btn-primary px-9 py-6">Create an Account</a>
                <a href="javascript:void(0)" class="btn btn-outline-primary px-9 py-6">View Open
                  Positions</a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="d-flex h-100 align-items-center mt-lg-0 mt-4">
                <p class="fs-4 mb-0">
                  Do you need a highly customizable and developer friendly premium bootstrap admin
                  template packed with numerous features? <span class="text-dark">Modernize Bootstrap
                    Admin</span> Template has everything you
                  need. This <span class="text-dark">bootstrap</span> based admin template is designed
                  in accordance with industry
                  standards and best practices to provide you.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- banner End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Process Start -->
    <!-- ------------------------------------- -->
    <section class="pt-5 pt-md-14 pt-lg-12 pb-4 pb-md-5 pb-lg-14">
      <div class="container-fluid">
        <h2 class="fs-10 fw-bolder text-center mb-5">The hassle-free setup process</h2>
        <div class="row">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="card shadow-none w-100 bg-warning-subtle rounded-24">
              <div class="card-body text-center px-8 py-5">
                <img src="../assets/images/frontend-pages/icon-briefcase.svg" alt="icon">
                <h5 class="my-3 fw-bolder fs-5">Light & Dark Color Schemes</h5>
                <p class="mb-0 fs-4">Choose your preferred visual style effortlessly.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="card shadow-none w-100 bg-secondary-subtle rounded-24">
              <div class="card-body text-center px-9 py-10">
                <h5 class="mb-3 fw-bolder fs-5">12+ Ready to Use Application Designs</h5>
                <p class="mb-0 fs-4"> Instantly deployable designs for your applications.</p>
              </div>
              <div class="d-flex justify-content-center mx-9">
                <img src="../assets/images/frontend-pages/playframe.png" class="img-fluid" alt="icon">
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="card shadow-none w-100 bg-secondary-subtle rounded-24">
              <div class="card-body text-center px-8 py-5">
                <img src="../assets/images/frontend-pages/icon-speech-bubble.svg" alt="icon">
                <h5 class="my-3 fw-bolder fs-5">Code Improvements</h5>
                <p class="mb-0 fs-4"> Benefit from continuous improvements and optimizations.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="card shadow-none w-100 bg-danger-subtle rounded-24">
              <div class="card-body text-center px-8 py-5">
                <img src="../assets/images/frontend-pages/icon-favorites.svg" alt="icon">
                <h5 class="my-3 fw-bolder fs-5">50+ UI Components</h5>
                <p class="mb-0 fs-4"> A rich collection for seamless user experiences.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- Process End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Metric Start -->
    <!-- ------------------------------------- -->
    <section class="py-lg-12 py-13 border-top data-shadow">
      <div class="container-fluid">
        <div class="row justify-content-between">
          <div class="col-lg-5 mb-5 mb-lg-0">
            <h2 class="fs-10 fw-bolder mb-3">Key metric at a glance</h2>
            <p class="fs-4 mb-0">
              From the year we were founded to the impressive customer base we've built, and the growth
              percentages that reflect our continuous improvement, these numbers tell our story at a
              glance. Explore the data that drives our mission and underscores our commitment to
              excellence.
            </p>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-sm-6">
                <div class="mb-5">
                  <p class="text-primary text-uppercase fs-2 fw-bold mb-0">founded</p>
                  <h3 class="fs-12 fw-semibold ">2019</h3>
                  <p class="mb-0 fs-4">When we founded Modernize</p>
                </div>
                <div class="">
                  <p class="text-primary text-uppercase fs-2 fw-bold mb-0">customers</p>
                  <h3 class="fs-12 fw-semibold ">300k+</h3>
                  <p class="mb-0 fs-4">Customers on Modernize</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="mb-5">
                  <p class="text-primary text-uppercase fs-2 fw-bold mb-0">Growth</p>
                  <h3 class="fs-12 fw-semibold ">1,400%</h3>
                  <p class="mb-0 fs-4">Revenue growth in 2024</p>
                </div>
                <div class="">
                  <p class="text-primary text-uppercase fs-2 fw-bold mb-0">Dashboards</p>
                  <h3 class="fs-12 fw-semibold ">25k+</h3>
                  <p class="mb-0 fs-4">Dashboards built using Modernize</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- Metric End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Leadership Start -->
    <!-- ------------------------------------- -->
    <section class="py-7 py-md-5 py-lg-12">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5">
            <h2 class="fs-10 fw-bolder">Our leadership</h2>
            <p class="fs-4 mb-0">
              Our robust analytics offer rich insights into the
              information buyers want, informing where teams
            </p>
          </div>
        </div>
        <div class="owl-carousel leadership-carousel owl-theme mt-5">
          <div class="item">
            <div class="">
              <img src="../assets/images/frontend-pages/alex.jpg" alt="leader" class="rounded-3">
              <div class="position-relative leadership-card z-1 bg-white mt-n10 rounded py-3 px-8 mx-9 text-center">
                <h4 class="fs-5 fw-semibold mb-2">Alex Martinez</h4>
                <p class="fs-3 mb-0">CEO & Co-Founder</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <img src="../assets/images/frontend-pages/jordan.jpg" alt="leader" class="rounded-3">
              <div class="position-relative leadership-card z-1 bg-white mt-n10 rounded py-3 px-8 mx-9 text-center">
                <h4 class="fs-5 fw-semibold mb-2">Jordan Nguyen</h4>
                <p class="fs-3 mb-0">CTO & Co-Founder</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <img src="../assets/images/frontend-pages/taylor.jpg" alt="leader" class="rounded-3">
              <div class="position-relative leadership-card z-1 bg-white mt-n10 rounded py-3 px-8 mx-9 text-center">
                <h4 class="fs-5 fw-semibold mb-2">Taylor Roberts</h4>
                <p class="fs-3 mb-0">Product Manager</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <img src="../assets/images/frontend-pages/morgan.jpg" alt="leader" class="rounded-3">
              <div class="position-relative leadership-card z-1 bg-white mt-n10 rounded py-3 px-8 mx-9 text-center">
                <h4 class="fs-5 fw-semibold mb-2">Morgan Patel</h4>
                <p class="fs-3 mb-0">Lead Developer</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <img src="../assets/images/frontend-pages/kiana.jpg" alt="leader" class="rounded-3">
              <div class="position-relative leadership-card z-1 bg-white mt-n10 rounded py-3 px-8 mx-9 text-center">
                <h4 class="fs-5 fw-semibold mb-2">Morgan Patel</h4>
                <p class="fs-3 mb-0">Lead Developer</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- Leadership end -->
    <!-- ------------------------------------- -->

    <section class="bg-primary py-9">
      <div class="container-fluid">
        <div class="d-flex gap-3 justify-content-center align-items-center flex-md-nowrap flex-wrap">
          <ul class="hstack mb-0">
            <li class="ms-n8">
              <a href="javascript:void(0)" class="me-1">
                <img src="../assets/images/profile/user-5.jpg" class="rounded-circle border border-2 border-white" width="44" height="44" alt="modernize-img">
              </a>
            </li>
            <li class="ms-n8">
              <a href="javascript:void(0)" class="me-1">
                <img src="../assets/images/profile/user-2.jpg" class="rounded-circle border border-2 border-white" width="44" height="44" alt="modernize-img">
              </a>
            </li>
          </ul>
          <p class="text-white fs-4 mb-0 text-md-start text-center">Save valuable time and effort spent
            searching for a solution.</p>
          <a href="javascript:void(0)" class="text-white fs-4 fw-semibold text-underline">Contact us now</a>
        </div>
      </div>
    </section>

    <!-- ------------------------------------- -->
    <!-- Testimonial Start -->
    <!-- ------------------------------------- -->
    <section class="pt-10 pt-lg-0 pb-5 pb-md-14 pb-lg-12">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-5">
            <div class="">
              <h2 class="fs-10 fw-bolder mb-3">
                What our clients
                <br /> think
                <img src="../assets/images/logos/favicon.png" alt="icon"> about us?
              </h2>
              <p class="fs-4">
                Our users' feedback is a testament to our commitment to quality and user satisfaction.
                Read what they have to say about their journey with us.
              </p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="border p-7 p-md-5 rounded-3">
              <h3 class="fs-7 fw-semibold text-dark">Features avaibility</h3>
              <div class="owl-carousel testimonial-carousel owl-theme">
                <div class="item">
                  <div>
                    <div class="d-flex align-items-center gap-3 my-4">
                      <div>
                        <img src="../assets/images/frontend-pages/user_1.png" width="56" height="56" alt="user">
                      </div>
                      <p class="fs-4 fw-semibold mb-0 text-dark">Sophia Johnson</p>
                    </div>
                    <p class="fs-5 border-bottom pb-4 mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.
                    </p>

                  </div>
                </div>
                <div class="item">
                  <div>
                    <div class="d-flex align-items-center gap-3 my-4">
                      <div>
                        <img src="../assets/images/frontend-pages/user-2.png" width="56" height="56" alt="user">
                      </div>
                      <p class="fs-4 fw-semibold mb-0 text-dark">Jenny Wilson</p>
                    </div>
                    <p class="fs-5 border-bottom pb-4 mb-4">
                      This template is great, UI-rich and up-to-date. Although it is pretty much
                      complete, I suggest to improve a bit of documentation. Thanks & Highly
                      recommended!
                    </p>

                  </div>
                </div>
                <div class="item">
                  <div>
                    <div class="d-flex align-items-center gap-3 my-4">
                      <div>
                        <img src="../assets/images/frontend-pages/user-3.png" width="56" height="56" alt="user">
                      </div>
                      <p class="fs-4 fw-semibold mb-0 text-dark">Liam Carter</p>
                    </div>
                    <p class="fs-5 border-bottom pb-4 mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.
                    </p>

                  </div>
                </div>
                <div class="item">
                  <div>
                    <div class="d-flex align-items-center gap-3 my-4">
                      <div>
                        <img src="../assets/images/frontend-pages/user_1.png" width="56" height="56" alt="user">
                      </div>
                      <p class="fs-4 fw-semibold mb-0 text-dark">Sophia Johnson</p>
                    </div>
                    <p class="fs-5 border-bottom pb-4 mb-4">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua.
                    </p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- Testimonial End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Plans Start -->
    <!-- ------------------------------------- -->
    <section class="pb-lg-12">
      <div class="container-fluid">
        <div class="">
          <h2 class="fw-bolder fs-10 text-center">111,476+ Trusted developers &
            <br /> many tech giants
            as well
          </h2>
          <div class="row my-sm-5 my-4">
            <div class="col-xl-3 col-sm-6 mb-4">
              <div class="card p-7 mb-0 rounded-3 border">
                <h3 class="fs-6 fw-bolder mb-0">Single Use</h3>
                <p class="fs-2 mt-3 pb-sm-7 pb-3 mb-0 fw-bold border-bottom">
                  Use for single end product which end
                  users can’t be charged for.
                </p>
                <h3 class="fs-3 fw-normal mt-sm-7 mt-3 text-muted">
                  <span class="fs-10 fw-bolder text-dark">$49</span>/
                  one time pay
                </h3>
                <div class="my-sm-7 my-3 d-flex flex-column gap-3">
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Full source code</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Documentation</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-x.svg" alt="">
                    <p class="fs-3 fw-bold mb-0 text-muted">Use in SaaS app</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One</span>
                      Project
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Technical
                      Support
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Free
                      Updates
                    </p>
                  </div>
                </div>
                <a href="javascript:void(0)" class="btn btn-primary">Purchase Now</a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
              <div class="card p-7 mb-0 rounded-3 border">
                <h3 class="fs-6 fw-bolder mb-0">Multiple Use</h3>
                <p class="fs-2 mt-3 mb-0 pb-sm-7 pb-3 fw-bold border-bottom">
                  Use for unlimited end products end users
                  can’t be charged for.
                </p>
                <h3 class="fs-3 fw-normal mt-sm-7 mt-3 text-muted">
                  <span class="fs-10 fw-bolder text-dark">$89</span>/
                  one time pay
                </h3>
                <div class="my-sm-7 my-3 d-flex flex-column gap-3">
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Full source code</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Documentation</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-x.svg" alt="">
                    <p class="fs-3 fw-bold mb-0 text-muted">Use in SaaS app</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One</span>
                      Project
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Technical
                      Support
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Free
                      Updates
                    </p>
                  </div>
                </div>
                <button class="btn btn-primary">Purchase Now</button>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
              <div class="card p-7 mb-0 rounded-3 border">
                <h3 class="fs-6 fw-bolder mb-0">
                  Extended Use <span class="text-primary fs-2 fw-bolder bg-primary-subtle py-1 px-2 rounded ms-2">Popular</span>
                </h3>
                <p class="fs-2 mt-3 mb-0 pb-sm-7 pb-3 fw-bold border-bottom">
                  Use for single end product which end
                  users can be charged for.
                </p>
                <h3 class="fs-3 fw-normal mt-sm-7 mt-3 text-muted">
                  <span class="fs-10 fw-bolder text-dark">$299</span>/
                  one time pay
                </h3>
                <div class="my-sm-7 my-3 d-flex flex-column gap-3">
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Full source code</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Documentation</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold mb-0 text-dark">Use in SaaS app</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One</span>
                      Project
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Technical
                      Support
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Free
                      Updates
                    </p>
                  </div>
                </div>
                <button class="btn btn-primary">Purchase Now</button>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card p-7 mb-0 rounded-3 border">
                <h3 class="fs-6 fw-bolder mb-0">
                  Unlimited Use
                </h3>
                <p class="fs-2 mt-3 pb-sm-7 pb-3 mb-0 fw-bold border-bottom">
                  Use in unlimited end products end users
                  can be charged for.
                </p>
                <h3 class="fs-3 fw-normal mt-sm-7 mt-3 text-muted">
                  <span class="fs-10 fw-bolder text-dark">$499</span>/
                  one time pay
                </h3>
                <div class="my-sm-7 my-3 d-flex flex-column gap-3">
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Full source code</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">Documentation</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold mb-0 text-dark">Use in SaaS app</p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One</span>
                      Project
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Technical
                      Support
                    </p>
                  </div>
                  <div class="d-flex gap-2">
                    <img src="../assets/images/frontend-pages/icon-circle-check.svg" alt="">
                    <p class="fs-3 fw-bold text-dark mb-0">
                      <span class="fw-bolder">One Year</span>
                      Free
                      Updates
                    </p>
                  </div>
                </div>
                <button class="btn btn-primary">Purchase Now</button>
              </div>
            </div>
          </div>
          <div class="">
            <p class="fs-4 fw-bold text-center mb-7">Secured payment with PayPal & Razorpay</p>
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div class="d-flex align-items-center justify-content-between gap-4 flex-wrap">
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Visa">
                    <img src=" ../assets/images/frontend-pages/visa.png" alt="visa">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mastercard">
                    <img src="../assets/images/frontend-pages/mastercard.png" alt="mastercard">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Americanexpress">
                    <img src="../assets/images/frontend-pages/americanexpress.png" alt="americanexpress">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Paypal">
                    <img src="../assets/images/frontend-pages/paypal.png" alt="paypal">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Maestro">
                    <img src="../assets/images/frontend-pages/maestro.png" alt="maestro">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="JCB">
                    <img src="../assets/images/frontend-pages/jcb.png" alt="jcb">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dinersclub">
                    <img src="../assets/images/frontend-pages/dinersclub.png" alt="dinersclub">
                  </a>
                  <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Discover">
                    <img src="../assets/images/frontend-pages/discover.png" alt="discover">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- Plans End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Develop Start -->
    <!-- ------------------------------------- -->
    <section class="my-md-12 my-14">
      <div class="custom-container">
        <div class="bg-primary-subtle rounded-3 position-relative overflow-hidden">
          <div class="row">
            <div class="col-lg-6">
              <div class="py-lg-12 ps-lg-12 py-5 px-lg-0 px-9">
                <h2 class="fs-10 fw-bolder text-lg-start text-center">
                  Develop with feature-rich Bootstrap Dashboard
                </h2>
                <div class="d-flex justify-content-lg-start justify-content-center gap-3 my-4 flex-sm-nowrap flex-wrap">
                  <a href="../horizontal/authentication-login.html" class="btn btn-primary py-6 px-9">Member Login</a>
                  <a href="../horizontal/authentication-register.html" class="btn btn-outline-primary py-6 px-9">Register as Member</a>
                </div>
                <p class="fs-3 text-lg-start text-center mb-0">
                  <span class="fw-bolder">One-time purchase</span> - no recurring fees.
                </p>
              </div>
            </div>
            <div class="col-lg-6 d-lg-block d-none">
              <img src="../assets/images/frontend-pages/design-collection.png" alt="banner" class="position-absolute develop-feature-rich">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------- -->
    <!-- Develop End -->
    <!-- ------------------------------------- -->
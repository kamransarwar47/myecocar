    <!-- Promo Block -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
      <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-black-opacity-0_3--after" style="height: 120%; background-image: url(assets/img/bg/m3_infos-pratiques-m3.2services-pratiques-se-deplacer-autrement-2ajava.jpg);"></div>

      <div class="container g-pt-100">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-6 col-lg-7 g-mb-100">
            <!-- Content Info -->
            <div class="mb-5">
              <h1 class="g-color-white g-font-weight-600 g-font-size-50 mb-3"><?php echo _l('new_carpool'); ?></h1>
              <p class="g-color-white g-font-size-18"><?php echo _l('header_slider_detail'); ?></p>
            </div>
            <!-- End Content Info -->
          </div>

          <div class="col-md-6 col-lg-4 g-mb-100">
            <!-- Join Form -->
            <form class="rounded g-px-30 g-py-40" autocomplete="off" method="get" action="<?php echo base_url('research_trip'); ?>">
              <div class="text-center">
                <h2 class="h3 g-font-weight-600 g-mb-35"></h2>
              </div>

              <input class="form-control rounded g-px-20 g-py-12 mb-3" type="text" placeholder="<?php echo _l('homepage_field1'); ?>" id="search_departure_city" name="dc">
              <input class="form-control rounded g-px-20 g-py-12 mb-3" type="text" placeholder="<?php echo _l('homepage_field2'); ?>" id="search_arrival_city" name="ac">
              <div class="form-group g-mb-30">
               <div class="input-group g-brd-primary--focus">
                <input id="datepickerDefault" class="form-control form-control-md u-datepicker-v1 g-brd-right-none rounded" placeholder="<?php echo _l('homepage_field3'); ?>" type="text" name="dt">
                <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-dark-v5 rounded-0">
                  <i class="icon-calendar"></i>
                </div>
              </div>
             </div>

                <input type="hidden" id="search_d_city" name="sdcty">
                <input type="hidden" id="search_d_country" name="sdcnt">
                <input type="hidden" id="search_a_city" name="sacty">
                <input type="hidden" id="search_a_country" name="sacnt">

              <div class="g-mb-35">
                <button class="btn btn-block u-btn-primary g-font-weight-500 g-font-size-12 text-uppercase g-px-25 g-py-13" type="submit"><?php echo _l('submit'); ?></button>
              </div>
            </form>
            <!-- End Join Form -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Promo Block -->
     <!-- Icon Blocks -->
    <div class="row no-gutters g-brd-bottom--lg g-brd-gray-light-v4">
      <div class="col-lg-4 g-pa-60">
        <!-- Icon Blocks -->
        <div class="text-center">
          <span class="d-inline-block u-icon-v3 u-icon-size--xl g-font-size-36 g-bg-primary g-color-white rounded-circle g-mb-20">
              <i class="icon-finance-086 u-line-icon-pro"></i>
            </span>
          <h3 class="h4 g-color-gray-dark-v2 mb-3"><?php echo _l('homepage_tab1_1'); ?></h3>
          <p class="mb-0"><?php echo _l('homepage_tab1_2'); ?></p>
        </div>
        <!-- End Icon Blocks -->
      </div>

      <div class="col-lg-4 g-brd-left--lg g-brd-gray-light-v4 g-pa-60">
        <!-- Icon Blocks -->
        <div class="text-center">
          <span class="d-inline-block u-icon-v3 u-icon-size--xl g-font-size-36 g-bg-primary g-color-white rounded-circle g-mb-20">
              <i class="icon-education-031 u-line-icon-pro"></i>
            </span>
          <h3 class="h4 g-color-gray-dark-v2 mb-3"><?php echo _l('homepage_tab2_1'); ?></h3>
          <p class="mb-0"><?php echo _l('homepage_tab2_2'); ?></p>
        </div>
        <!-- End Icon Blocks -->
      </div>

      <div class="col-lg-4 g-brd-left--lg g-brd-gray-light-v4 g-pa-60">
        <!-- Icon Blocks -->
        <div class="text-center">
          <span class="d-inline-block u-icon-v3 u-icon-size--xl g-font-size-36 g-bg-primary g-color-white rounded-circle g-mb-20">
              <i class="icon-finance-222 u-line-icon-pro"></i>
            </span>
          <h3 class="h4 g-color-gray-dark-v2 mb-3"><?php echo _l('homepage_tab3_1'); ?></h3>
          <p class="mb-0"><?php echo _l('homepage_tab3_2'); ?></p>
        </div>
        <!-- End Icon Blocks -->
      </div>
    </div>
    <!-- End Icon Blocks -->

     <!-- Testimonials -->
    <section class="g-bg-secondary g-py-50">
      <div class="container">
        <header class="text-center g-width-60x--md mx-auto g-mb-60">
          <div class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
            <h2 class="h3 u-heading-v2__title g-color-gray-dark-v2 text-uppercase g-font-weight-600"><?php echo _l('homepage_view'); ?></h2>
          </div>
          <p class="lead"><?php echo _l('homepage_view_heading'); ?></p>
        </header>

        <div class="row">
          <div class="col-md-6 g-mb-50 g-mb-0--lg">
            <!-- Testimonials -->
            <blockquote class="lead u-blockquote-v1 rounded g-pl-60 g-pr-30 g-py-30 g-mb-40">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit amet</blockquote>
            <div class="media">
              <img class="d-flex align-self-center rounded-circle g-width-60 g-height-60 g-brd-around g-brd-3 g-brd-white mr-3" src="assets/img-temp/100x100/img4.jpg" alt="Image description">
              <div class="media-body align-self-center">
                <h4 class="h6 g-color-gray-dark-v2 g-font-weight-600 g-mb-0">Alexandra Pottorf</h4>
                <em class="g-color-gray-dark-v4 g-font-style-normal">Amoureux d'aventure</em>
              </div>
            </div>
            <!-- End Testimonials -->
          </div>

          <div class="col-md-6">
            <!-- Testimonials -->
            <blockquote class="lead u-blockquote-v1 rounded g-pl-60 g-pr-30 g-py-30 g-mb-40">lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit amet</blockquote>
            <div class="media">
              <img class="d-flex align-self-center rounded-circle g-width-60 g-height-60 g-brd-around g-brd-3 g-brd-white mr-3" src="assets/img-temp/100x100/img7.jpg" alt="Image description">
              <div class="media-body align-self-center">
                <h4 class="h6 g-color-gray-dark-v2 g-font-weight-600 g-mb-0">Bastien Rojanawisut</h4>
                <em class="g-color-gray-dark-v4 g-font-style-normal">Amoureux de la vie</em>
              </div>
            </div>
            <!-- End Testimonials -->
          </div>

      
        </div>
      </div>
    </section>
    <!-- End Testimonials -->
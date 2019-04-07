<!-- cookies -->
<div id="cookieConsent"> 
    <div id="closeCookieConsent">x</div>
    This website is using cookies. <a href="<?php echo base_url('cookies'); ?>" target="_blank">More info</a>. <a class="cookieConsentOK">That's Fine</a>
</div>
<!-- Header -->
<header id="js-header" class="u-header u-header--static u-header--toggle-section u-header--change-appearance"
        data-header-fix-moment="300">
    <!-- Top Bar -->
    <div class="u-header__section u-header__section--hidden u-header__section--dark g-bg-black g-transition-0_3 g-py-10">
        <div class="container">
            <div class="row flex-column flex-sm-row justify-content-between align-items-center text-uppercase g-font-weight-600 g-color-white g-font-size-12 g-mx-0--lg">
                <!--<div class="col-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-tumblr"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>-->

                <div class="col-auto">
                    <i class="fa fa-phone g-font-size-18 g-valign-middle g-color-primary g-mr-10 g-mt-minus-2"></i>
                    8 800 1234 4321
                </div>

                <div class="col-auto">
                    <i class="fa fa-clock-o g-font-size-18 g-valign-middle g-color-primary g-mr-10 g-mt-minus-2"></i>
                    Mon-Fri: 9 AM - 5 PM
                </div>

                <div class="col-auto g-pos-rel">
                    <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                        <!-- language
                        <li class="list-inline-item g-mx-4">|</li>-->
                        <?php if ($this->session->userdata('User_LoginId')) { ?>
                            <li class="list-inline-item g-mx-4">
                                <a class="g-color-white g-color-primary--hover g-text-underline--none--hover"
                                   href="<?php echo base_url('user_profile'); ?>"><?php _l('dashboard'); ?></a>
                            </li> |
                            <li class="list-inline-item g-mx-4">
                                <a class="g-color-white g-color-primary--hover g-text-underline--none--hover"
                                   href="<?php echo base_url('login/logout'); ?>"><?php _l('logout'); ?></a>
                            </li>
                        <?php } else { ?>
                            <li class="list-inline-item g-mx-4">
                                <a class="g-color-white g-color-primary--hover g-text-underline--none--hover"
                                   href="<?php echo base_url('login'); ?>"><?php _l('header_connection'); ?></a>
                            </li>
                            <li class="list-inline-item g-mx-4">|</li>
                            <li class="list-inline-item g-mx-4">
                                <a class="g-color-white g-color-primary--hover g-text-underline--none--hover"
                                   href="<?php echo base_url('registration'); ?>"><?php _l('header_register'); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="u-header__section u-header__section--light g-bg-white-opacity-0_8 g-py-10"
         data-header-fix-moment-exclude="g-bg-white-opacity-0_8 g-py-10"
         data-header-fix-moment-classes="g-bg-white u-shadow-v18 g-py-0">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0"
                        type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                        data-toggle="collapse" data-target="#navBar">
		  <span class="hamburger hamburger--slider">
		<span class="hamburger-box">
		  <span class="hamburger-inner"></span>
		  </span>
		  </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Logo -->
                <a href="index.php" class="navbar-brand">
                    <img src="<?php echo base_url('assets/img/bg/logo-new.png'); ?>" alt="Image Description">
                </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
                    <ul class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                        <li class="nav-item g-mx-20--lg <?php echo (isset($header_link_active) && $header_link_active == 'home') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url(); ?>" class="nav-link px-0"><?php _l('header_home'); ?>

                            </a>
                        </li>
                        <li class="nav-item g-mx-20--lg <?php echo (isset($header_link_active) && $header_link_active == 'propose_route') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('propose_route'); ?>"
                               class="nav-link px-0"><?php _l('header_route'); ?>
                            </a>
                        </li>
                        <li class="nav-item g-mx-20--lg <?php echo (isset($header_link_active) && $header_link_active == 'search_route') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('research_trip'); ?>"
                               class="nav-link px-0"><?php _l('header_search'); ?>

                            </a>
                        </li>
                        <li class="nav-item g-mx-20--lg <?php echo (isset($header_link_active) && $header_link_active == 'about_page') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url('contact_us'); ?>"
                               class="nav-link px-0"><?php _l('contact_us'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Navigation -->
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->
<style>
    #map {
        height: 425px;
    }
    .pac-container:after {
        /* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */
        background-image: none !important;
        height: 0px;
    }
</style>

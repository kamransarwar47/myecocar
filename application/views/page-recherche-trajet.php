<!-- Page Title -->
<section class="dzsparallaxer auto-init height-is-based-on-content use-loading"
         data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
    <!-- Parallax Image -->
    <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-white-gradient-opacity-v3--after"
         style="height: 130%; background-image: url(assets/img/bg/covoiturage-995x310.jpg);"></div>
    <!-- End Parallax Image -->

    <div class="container text-center g-py-100--md g-py-80">
        <h2 class="h1 text-uppercase g-font-weight-300 g-mb-30">Recherchez votre trajet</h2>

        <!-- Search Form -->
        <form method="get" class="g-width-60x--md mx-auto" autocomplete="off">
            <div class="form-group g-mb-20">
                <div class="input-group u-shadow-v21 rounded g-mb-15">
                    <input class="form-control form-control-md g-brd-white g-font-size-16 border-right-0 pr-0 g-py-15"
                           type="text" placeholder="<?php echo _l('departure_city'); ?>" id="search_departure_city" name="dc"
                           value="<?php echo (isset($_GET['dc'])) ? $_GET['dc'] : ''; ?>">

                    <input class="form-control form-control-md g-brd-white g-font-size-16 border-right-0 pr-0 g-py-15"
                           type="text" placeholder="<?php echo _l('arrival_city') ?>" id="search_arrival_city" name="ac"
                           value="<?php echo (isset($_GET['ac'])) ? $_GET['ac'] : ''; ?>">

                    <input id="datepickerDepartureResearch"
                           class="form-control form-control-md u-datepicker-v1 g-brd-white"
                           placeholder="<?php echo _l('departure_date'); ?>" type="text" name="dt"
                           value="<?php echo (isset($_GET['dt'])) ? $_GET['dt'] : ''; ?>">
                    <div class="input-group-addon d-flex align-items-center g-bg-white g-brd-white g-color-gray-light-v1 g-pa-2">
                        <button class="btn u-btn-primary g-font-size-16 g-py-15 g-px-20" type="submit">
                            <i class="icon-magnifier g-pos-rel g-top-1"></i>
                        </button>
                    </div>
                </div>

                <input type="hidden" id="search_d_city" name="sdcty"
                       value="<?php echo (isset($_GET['sdcty'])) ? $_GET['sdcty'] : ''; ?>">
                <input type="hidden" id="search_d_country" name="sdcnt"
                       value="<?php echo (isset($_GET['sdcnt'])) ? $_GET['sdcnt'] : ''; ?>">
                <input type="hidden" id="search_a_city" name="sacty"
                       value="<?php echo (isset($_GET['sacty'])) ? $_GET['sacty'] : ''; ?>">
                <input type="hidden" id="search_a_country" name="sacnt"
                       value="<?php echo (isset($_GET['sacnt'])) ? $_GET['sacnt'] : ''; ?>">

                <small class="form-text g-opacity-0_8 g-font-size-default">Entrez vos villes de départ et de
                    destination, votre date de voyage et choisissez les conducteurs qui vous conviennent. Si vous voulez
                    des précisions sur un trajet, vous pouvez dialoguer avec le conducteur.
                </small>
            </div>
        </form>
        <!-- End Search Form -->
    </div>
</section>

<!-- Page Title -->

<section class="g-pt-50 g-pb-90">
    <div class="container">
        <div class="row">

            <!-- Search Results -->
            <div class="col-lg-12">
                <!-- Search Info -->
                <div class="card border-0">

                    <div class="d-md-flex justify-content-between g-mb-30">
                        <h3 class="h6 text-uppercase g-mb-10 g-mb--lg"><?php echo _l('about_text'); ?> <span
                                    class="g-color-gray-dark-v1"><?php echo $total_records; ?></span> <?php echo _l('result_text'); ?></h3>
                    </div>
                    <!-- End Search Info -->

                    <!-- Search Result -->
                    <div class="row">
                        <?php
                        if (!empty($search_records)) {
                            foreach ($search_records as $record) {
                                ?>
                                <div class="col-lg-6 g-mb-30">
                                    <!-- Search Result -->
                                    <article class="g-pa-25 u-shadow-v11 rounded">
                                        <h2 class="h4 g-mb-15">
                                            <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover"
                                               href="<?php echo base_url('research_trip/trip_details?id=' . $record['route_id']); ?>"><?php echo $record['origin_city']; ?>
                                                <i
                                                        class="icon-arrow-right-circle"> <?php echo $record['dest_city']; ?></i></a>
                                        </h2>

                                        <!-- Search Info -->
                                        <ul class="list-inline d-flex justify-content-between g-mb-20">
                                            <li class="list-inline-item g-mr-10">
                                                <img class="g-height-25 g-width-25 rounded-circle g-mr-5"
                                                     src="<?php echo base_url(); ?>assets/uploads/<?php echo userimage_by_id($record['user_id']); ?>"
                                                     alt="Image Description"><a href="<?php echo base_url('driver_detail/index/' . $record['user_id']); ?>" class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover"><?php echo username_by_id($record['user_id']); ?></a>
                                            </li>
                                        </ul>
                                        <!-- End Search Info -->
                                        <!-- Search Info -->
                                        <ul class="list-inline d-flex justify-content-between g-mb-20">
                                            <li class="list-inline-item">
                                                <i class="icon-calendar g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i>
                                                <?php echo date('l d F, Y', strtotime($record['datepickerFrom'])); ?>
                                                <?php echo _l('at_text'); ?> <?php echo date('H:i', strtotime($record['depart_time_input'])); ?>
                                            </li>
                                        </ul>

                                        <!-- Search Info -->
                                        <ul class="list-inline d-flex justify-content-between g-mb-20">
                                            <li class="list-inline-item">
                                                <i class="icon-location-pin g-pos-rel g-top-1 g-color-primary g-mr-5"></i>
                                                <?php echo $record['origin_input']; ?>
                                            </li>
                                        </ul>
                                        <!-- End Search Info -->

                                        <!-- Search Info -->
                                        <ul class="list-inline d-flex justify-content-between g-mb-20">
                                            <li class="list-inline-item">
                                                <i class="icon-location-pin g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i>
                                                <?php echo $record['destination_input']; ?>
                                            </li>
                                        </ul>
                                        <!-- End Search Info -->

                                        <!-- Share, Print and More -->
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item g-mr-20">
                                                <span class="d-block g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer">
                                                <i class="icon-check g-pos-rel g-top-1 g-mr-5"></i>
                                                <?php echo _l('vehicle_text'); ?>: <?php echo $record['vehicle_model_make']; ?>
                                                </span>
                                            </li>
                                            <li class="list-inline-item g-mr-20">
                                                <span class="d-block g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer">
                                                <i class="icon-check g-pos-rel g-top-1 g-mr-5"></i> <?php echo remaining_places_by_route_id($record['route_id']) . ' ' . _l('rem_plc_text'); ?>
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                        <span class="d-block g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer">
                            <i class="icon-check g-pos-rel g-top-1"></i> <?php echo _l('post_ad_acceptance'); ?> : <?php echo $record['acceptance']; ?>
                          </span>
                                            </li>
                                            <li class="list-inline-item">
                        <span class="d-block g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer">
                            <i class="icon-check g-pos-rel g-top-1"></i> <?php echo _l('pay_mtd_text'); ?> : <?php echo ($record['payment_method'] == 'cash') ? ucwords($record['payment_method']) . ' ' . '<i class="fa fa-money g-font-size-20 align-self-center mx-auto g-color-darkblue"></i>' : ucwords($record['payment_method']) . ' ' . '<i class="fa fa-paypal g-font-size-20 align-self-center mx-auto g-color-darkblue"></i>'; ?>

                          </span>
                                            </li>
                                        </ul>
                                        <!-- End Share, Print and More -->
                                    </article>
                                    <!-- End Search Result -->
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- End Search Result -->
                </div>
                <!-- End Search Results -->
            </div>
        </div>
</section>


<a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
</main>
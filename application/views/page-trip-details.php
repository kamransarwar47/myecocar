<!-- Jobs Description -->
<section class="g-py-100">
    <div class="container">
        <?php
        if (!isset($_SESSION['User_LoginId'])) {
            ?>
            <div class="alert alert-dismissible fade show g-bg-yellow rounded-0" role="alert">
                <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
          <i class="icon-info g-font-size-25"></i>
        </span>
                    <span class="media-body align-self-center">
          <?php echo _l('trip_page_not_login_msg'); ?>
        </span>
                </div>
            </div>
            <?php
        }
        // validation errors
        if (validation_errors() != false) {
            ?>
            <!-- Warning Alert -->
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="h5">
                    <i class="fa fa-exclamation-triangle"></i>
                    Warning!
                </h4>
                <p><?php echo _l('form_error_msg'); ?></p>
                <?php
                echo validation_errors();
                ?>
            </div>
            <!-- End Warning Alert -->
            <?php
        }
        // form submission message
        echo $this->session->flashdata('message');
        ?>
        <div class="row">
            <!-- Content -->
            <div class="col-lg-12 g-mb-30 g-mb-0--lg">
                <article class="u-shadow-v11 rounded g-pa-30">
                    <!-- Content Header -->
                    <form autocomplete="off"
                          action="<?php echo base_url('research_trip/trip_details?id=') . $route_id; ?>" method="post">
                        <div class="row">
                            <div class="col-md-9 g-mb-30 g-mb-0--md">
                                <div class="media">
                                    <div class="d-flex align-self-center g-mt-3 g-mr-20">
                                        <img class="g-width-40 g-height-40"
                                             src="<?php echo base_url(); ?>assets/img/bg/trajet.png"
                                             alt="Image Description">
                                    </div>
                                    <div class="media-body">
                      <span class="d-block g-mb-3">
                          <span class="u-icon-v1 g-color-primary g-mr-5">
                        <i class="icon-communication-011 u-line-icon-pro"></i>
                      </span> <?php echo $search_data['origin_input']; ?>
                        </span><span class="d-block g-mb-3">
                          <span class="u-icon-v1 g-color-primary g-mr-5">
                        <i class="icon-communication-011 u-line-icon-pro"></i>
                      </span> <?php echo $search_data['destination_input']; ?>
                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-self-center text-md-right">
                                <ul class="list-unstyled g-mb-12 g-mb-0--md">
                                    <?php
                                    $remaining_place = remaining_places_by_route_id($search_data['route_id']);
                                    if ($remaining_place > 0) {
                                        ?>
                                        <li class="d-flex align-items-center g-mb-12">
                                            <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                            <span class="d-block"><strong><?php echo $remaining_place; ?>
                                                    <?php echo _l('rem_plc_text'); ?></strong></span>
                                        </li>
                                        <li class="d-flex align-items-center g-mb-12">
                                            <select class="form-control" name="places_booked">
                                                <option value=""><?php echo _l('book_seat_text'); ?></option>
                                                <?php
                                                for ($i = 1; $i <= $remaining_place; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?><?php echo _l('seat_text'); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="d-flex align-items-center g-mb-12">
                                            <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                            <span class="d-block"><strong><?php echo _l('no_seat_text'); ?></strong></span>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <input type="hidden" name="amount_per_seat"
                                       value="<?php echo $search_data['travel_charges']; ?>">
                                <button class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12"
                                        name="submit"
                                        type="submit" <?php echo (!isset($_SESSION['User_LoginId']) || $remaining_place < 1) ? 'disabled="disabled"' : ''; ?>>
                                    <?php echo _l('accept_btn'); ?>
                                </button>

                            </div>
                        </div>
                    </form>
                    <!-- End Content Header -->

                    <hr class="g-brd-gray-light-v4">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="col-lg g-mb-30 g-mb-0--lg">
                                <h3 class="h5 g-color-gray-dark-v1 g-mb-10"><?php echo _l('offer_detail_text'); ?></h3>
                                <ul class="list-unstyled mb-0">
                                    <li class="media g-mb-10">
                      <span class="d-block g-color-gray-dark-v5 g-width-110">
                          <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> <?php echo _l('date_time_text'); ?>:
                        </span>
                                        <span class="media-body"><?php echo date('d M, Y', strtotime($search_data['datepickerFrom'])); ?>
                                            - <?php echo date('H:i', strtotime($search_data['depart_time_input'])); ?></span>
                                    </li>
                                    <li class="media">
                      <span class="d-block g-color-gray-dark-v5 g-width-110">
                          <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> <?php echo _l('price_text'); ?>:
                        </span>
                                        <span class="u-label g-bg-cyan g-rounded-20 g-px-10">&euro; <?php echo $search_data['travel_charges']; ?>
                                            <?php echo _l('per_seat_text'); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg g-mb-30 g-mt-30 g-mb-0--lg">
                                <h3 class="h5 g-color-gray-dark-v1 g-mb-10"><?php echo _l('post_ad_veh_info'); ?></h3>
                                <ul class="list-unstyled g-mb-12 g-mb-0--md">
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('vehicle_text'); ?>
                                            : <?php echo $search_data['vehicle_model_make']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('post_ad_fuel'); ?>
                                            : <?php echo $search_data['fuel_type']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('post_ad_baggage'); ?>
                                            : <?php echo $search_data['baggages']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('post_ad_max_detour'); ?>
                                            : <?php echo $search_data['max_detour']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('post_ad_sch_flex'); ?>
                                            : <?php echo $search_data['sch_flex']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('post_ad_acceptance'); ?>
                                            : <?php echo $search_data['acceptance']; ?></span>
                                    </li>
                                    <li class="d-flex align-items-center g-mb-12">
                                        <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                        <span class="d-block"><?php echo _l('pay_mtd_text'); ?>
                                            : <?php echo ($search_data['payment_method'] == 'cash') ? ucwords($search_data['payment_method']) . ' ' . '<i class="fa fa-money g-font-size-20 align-self-center mx-auto g-color-darkblue"></i>' : ucwords($search_data['payment_method']) . ' ' . '<i class="fa fa-paypal g-font-size-20 align-self-center mx-auto g-color-darkblue"></i>'; ?></span>
                                    </li>
                                </ul>
                                <h3 class="h5 g-color-gray-dark-v1 g-mb-10 g-mt-30"><?php echo _l('post_ad_travel_desc'); ?></h3>
                                <p><?php echo $search_data['travel_description']; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Default Outline Panel-->
                            <div class="card rounded-0">
                                <h3 class="card-header h5 rounded-0">
                                    <i class="fa fa-car g-font-size-default g-mr-5"></i>
                                    <?php echo _l('driver_text'); ?>
                                </h3>

                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-4 g-mb-30 g-mb-0--lg">
                                            <div class="u-block-hover g-pos-rel">
                                                <figure>
                                                    <a href="<?php echo base_url('driver_detail/index/' . $user_details['user_id'].'/'.$_GET['id']); ?>"><img class="img-fluid w-100 u-block-hover__main--zoom-v1"
                                                                    src="<?php echo base_url(); ?>assets/uploads/<?php echo userimage_by_id($user_details['user_id']); ?>"
                                                                    alt="Image Description"></a>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 g-mb-30 g-mb-0--lg">
                                            <h4 class="h5"><a href="<?php echo base_url('driver_detail/index/' . $user_details['user_id'].'/'.$_GET['id']); ?>"><?php echo $user_details['first_name'] . ' ' . $user_details['second_name']; ?></a>
                                            </h4>
                                            <h4 class="h6">
                                            <?php echo calc_age_from_dob(date('Y-m-d', strtotime($user_details['date_of_birth']))); ?>
                                                <?php echo _l('years_old_text'); ?>
                                            </h4>
                                            <h4 class="h6"><?php echo $user_details['gender']; ?></h4>
                                        </div>
                                    </div>
                                    <hr class="g-brd-gray-light-v4">
                                    <div class="row">
                                        <div class="col-lg-12 g-mb-30 g-mb-0--lg">
                                            <span class="h5 mb-30"><?php echo _l('verifications_text'); ?></span>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <i class="fa fa-mobile fa-2x"></i>
                                                </div>
                                                <div class="col-lg-8">
                                                    <?php echo _l('verified_phone_text'); ?>
                                                </div>
                                                <div class="col-lg-2">
                                                    <i class="fa fa-check-circle g-color-green"></i>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <i class="fa fa-envelope-o fa-2x"></i>
                                                </div>
                                                <div class="col-lg-8">
                                                    <?php echo _l('verified_email_text'); ?>
                                                </div>
                                                <div class="col-lg-2">
                                                    <?php echo ($user_details['is_verified'] == '1') ? '<i class="fa fa-check-circle g-color-green"></i>' : '<i class="fa fa-times-circle g-color-red"></i>'; ?>
                                                </div>
                                            </div>

                                            <hr class="g-brd-gray-light-v4">

                                            <span class="h5 mb-30"><?php echo _l('activity_text'); ?></span>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php echo _l('posted_ads_text'); ?>
                                                    : <?php echo get_ads_post_by_user_id($user_details['user_id']); ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php echo _l('registration_date_text'); ?>
                                                    : <?php echo date('l, F d, Y', strtotime($user_details['register_datetime'])); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Default Outline Panel-->
                        </div>
                    </div>

                </article>
            </div>
            <!-- End Content -->
        </div>
    </div>
</section>
<!-- End Jobs Description -->


<a class="js-go-to u-go-to-v1" href="#" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
</main>

<!-- Jobs Description -->
<section class="g-py-100">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-lg-12 g-mb-30 g-mb-0--lg">
                <article class="u-shadow-v11 rounded g-pa-30">

                    <h3><?php echo _l('profile_of_text') . ' ' . $user_details['first_name'] . ' ' . $user_details['second_name'] . ' <small>' . _l('passenger_and_driver_text') . '</small>' ?></h3>

                    <hr class="g-brd-gray-light-v4">

                    <div class="row">
                        <div class="col-lg-2 g-mb-30 g-mb-0--lg">
                            <div class="u-block-hover g-pos-rel">
                                <figure>
                                    <img class="img-fluid w-100 u-block-hover__main--zoom-v1"
                                         src="<?php echo base_url(); ?>assets/uploads/<?php echo userimage_by_id($user_details['user_id']); ?>"
                                         alt="Image Description">
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-5 g-mb-30 g-mb-0--lg">
                            <div class="shortcode-html">
                                <!-- Default Outline Panel-->
                                <div class="card rounded-0">
                                    <h3 class="card-header h5 rounded-0">
                                        <i class="fa fa-tasks g-font-size-default g-mr-5"></i>
                                        <?php echo _l('member_description'); ?>
                                    </h3>

                                    <div class="card-block">
                                        <h4 class="h5"><?php echo $user_details['first_name'] . ' ' . $user_details['second_name']; ?>
                                            <small>
                                                , <?php echo calc_age_from_dob(date('Y-m-d', strtotime($user_details['date_of_birth']))); ?>
                                                <?php echo _l('years_old_text'); ?>
                                            </small>
                                        </h4>
                                        <h4 class="h5"><?php echo _l('gender_text'); ?>
                                            : <?php echo $user_details['gender']; ?></h4>
                                    </div>
                                </div>
                                <!-- End Default Outline Panel-->
                            </div>
                        </div>
                        <div class="col-lg-5 g-mb-30 g-mb-0--lg">
                            <div class="shortcode-html">
                                <!-- Default Outline Panel-->
                                <div class="card rounded-0">
                                    <h3 class="card-header h5 rounded-0">
                                        <i class="fa fa-info-circle g-font-size-default g-mr-5"></i>
                                        <?php echo _l('member_information'); ?>
                                    </h3>

                                    <div class="card-block">
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
                                <!-- End Default Outline Panel-->
                            </div>
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
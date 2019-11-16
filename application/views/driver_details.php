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

                                    <div class="card-block mb-10">
                                        <h4 class="h5"><?php echo $user_details['first_name'] . ' ' . $user_details['second_name']; ?>
                                            <small>
                                                , <?php echo calc_age_from_dob(date('Y-m-d', strtotime($user_details['date_of_birth']))); ?>
                                                <?php echo _l('years_old_text'); ?>
                                            </small>
                                        </h4>
										<h4>
								<p>
									<span class="text-muted" style="font-size:32px;">
									<?php 
								 $self_like_smooking = '';
								 $self_like_music = '';
								 $self_like_talk = '';
								 $user_like_smooking = '';
								 $user_like_music = '';
								 $user_like_talk = '';
								if (isset($favourite) && $favourite->num_rows() > 0){
									 $favourite         = $favourite->row_array();
									 $self_like_smooking = $favourite['self_like_smooking'];
									 $self_like_music = $favourite['self_like_music'];
									 $self_like_talk = $favourite['self_like_talk'];
									 $user_like_smooking = $favourite['user_like_smooking'];
									 $user_like_music = $favourite['user_like_music'];
									 $user_like_talk = $favourite['user_like_talk'];
								}
								
								
											$smoke = '';
											$music = '';
											$notalk = '';
											if ($self_like_smooking == 0) {
												$smoke = 'no';
											}
											if ($self_like_music == 0) {
												$music = 'no';
											}
											if ($self_like_talk == 0) {
												$notalk = 'no';
											}
										?>
									<img src="<?php echo base_url(); ?>/assets/img/icon-images/<?php echo $smoke; ?>smoke.png"> 
											<img src="<?php echo base_url(); ?>/assets/img/icon-images/<?php echo $music; ?>music.png"> 
											<img src="<?php echo base_url(); ?>/assets/img/icon-images/<?php echo $notalk; ?>talk.png">
									</span>
									<br>
								</p>
								<p><h4 class="h5"><?php echo _l('preferences'); ?> : <span class="text-muted" style="font-size:32px;">
								
								<?php
											$user_smoke = '';
											$user_music = '';
											$user_notalk = '';
											if ($user_like_smooking == 0) {
												$user_smoke = 'no';
											}
											if ($user_like_music == 0) {
												$user_music = 'no';
											}
											if ($user_like_talk == 0) {
												$user_notalk = 'no';
											}
										?>
											<img src="<?php echo base_url(); ?>/assets/img/icon-images/<?php echo $user_smoke; ?>smoke.png"> 
											<img src="<?php echo base_url(); ?>/assets/img/icon-images/<?php echo $user_music; ?>music.png"> 
											<img src="<?php echo base_url(); ?>/assets/img/icon-images/<?php echo $user_notalk; ?>talk.png">
									</span>
									</h4>
									</p>
								</h4>
                                        <h4 class="h5"><?php echo _l('gender_text'); ?>
                                            : <?php echo $user_details['gender']; ?></h4>
											<h4 class="h5"><?php echo _l('my_description'); ?>: </h4><i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo ($user_details['user_description'] != '') ? $user_details['user_description'] :  _l('drive_nodescription'); ?></font></font></i>
                                    </div>
                                </div>
                                <?php
                                // check if user logged in
                                if (check_user_login()) {
                                    ?>
                                    <a class="mt-4 btn btn-xl btn-block u-btn-outline-bluegray text-uppercase g-font-weight-600 g-font-size-12"
                                       href="<?php echo base_url('chat/index/user/' . $route_id); ?>"><i
                                                class="fa fa-comments"></i> <?php echo _l('chat_with_driver_text') ?>
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <button class="mt-4 btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12"
                                            type="button"><i
                                                class="fa fa-comments"></i> <?php echo _l('login_to_chat_with_driver_text') ?>
                                    </button>
                                    <?php
                                }
                                ?>
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

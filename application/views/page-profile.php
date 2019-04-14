<!-- Breadcrumb -->
<section class="g-my-30">
    <div class="container">
        <ul class="u-list-inline">
            <li class="list-inline-item g-mr-7">
                <a class="u-link-v5 g-color-main g-color-primary--hover" href="#"><?php echo _l('home'); ?></a>
                <i class="fa fa-angle-right g-ml-7"></i>
            </li>
            <li class="list-inline-item g-color-primary">
                <span><?php echo _l('dashboard'); ?></span>
            </li>
        </ul>
    </div>
</section>
<!-- End Breadcrumb -->

<section class="g-mb-100">
    <div class="container">
        <div class="row">
            <?php $this->load->view('includes/user_sidebar'); ?>

            <!-- Profle Content -->
            <div class="col-lg-10">
			<?php
				echo $this->session->flashdata('message');
				echo validation_errors();
			?>
                <!-- Nav tabs -->
                <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20"
                    role="tablist" data-target="nav-1-1-default-hor-left-underline"
                    data-tabs-mobile-type="slide-up-down"
                    data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
                    <li class="nav-item">
                        <a class="nav-link g-py-10 active" data-toggle="tab"
                           href="#nav-1-1-default-hor-left-underline--1" role="tab"><?php echo _l('edit_profile_tab'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--2"
                           role="tab"><?php echo _l('trips_tab'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3"
                           role="tab"><?php echo _l('reservations_tab'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--4"
                           role="tab"><?php echo _l('settings_tab'); ?></a>
                    </li>
                </ul>
                <!-- End Nav tabs -->

                <!-- Tab panes -->
                <div id="nav-1-1-default-hor-left-underline" class="tab-content">
                    <!-- Edit Profile -->
                    <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
                        <h2 class="h4 g-font-weight-300"><?php echo _l('manage_profile_heading'); ?></h2>
                        <p><?php echo _l('manage_profile_details'); ?></p>
							<form enctype="multipart/form-data" action="<?php echo base_url('user_profile/img_upload_user_profile'); ?>" method="post">
								<input type="file" name="user_profile_img" id="user_profile_img form-control profile_fields" >
								<button type="submit" class="btn btn-sm u-btn-primary rounded-0">Submit</button>
							</form>
                        <?php
                        if (isset($user_data) && $user_data->num_rows() > 0){
                        $user_data         = $user_data->row_array();
                        $first_name        = $user_data['first_name'];
                        $second_name       = $user_data['second_name'];
                        $gender            = $user_data['gender'];
                        $mobile            = $user_data['mobile'];
                        $date_of_birth     = date('d-m-Y', strtotime($user_data['date_of_birth']));
                        $user_id           = $user_data['user_id'];
                        $email             = $user_data['email'];
                        $is_verified       = $user_data['is_verified'];
                        $register_datetime = date('d-m-Y H:i:s', strtotime($user_data['register_datetime']));

                        ?>
                        <form id="edit_sigup_from" action="<?php echo base_url('user_profile'); ?>" method="post">
                            <ul class="list-unstyled g-mb-30">
                                <!-- Name -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php echo _l('user_profile_first_name'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $first_name; ?></span>
                                    </div>
                                    <input name="first_name" id="first_name" class="form-control profile_fields"
                                           style="width:70%" value="<?php echo $first_name; ?>" type="text"
                                           placeholder="Votre nom" required>
                                    <span>
						<i class="icon-finance-067 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                    </span>
                                </li>
                                <!-- End Name -->

                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php echo _l('user_profile_sec_name'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $second_name; ?></span>
                                    </div>
                                    <input name="second_name" id="second_name" class="form-control profile_fields"
                                           style="width:70%" value="<?php echo $second_name; ?>" type="text"
                                           placeholder="Votre nom" required>
                                    <span>
						<i class="icon-finance-067 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                    </span>
                                </li>

                                <!-- Your ID -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php echo _l('user_profile_email'); echo ($is_verified == 0) ?  '<span style="color:red; font-size: 12px;"> Not Verified</span> <button type="button" class="btn btn-xs u-btn-darkgray rounded-0" data-id="'.$user_id.'" data-name="'.$first_name .'" data-email="'.$email.'" id="send_verifying_email">Verify</button>' : '<span style="color:#72c02c; font-size: 12px;"> Verified</span>'; ?></strong>
                                        <span class="align-top profile_values">
										<?php echo $email; ?></span>
                                    </div>
                                    <input value="<?php echo $email; ?>" name="reg_email" id="reg_email"
                                           class="form-control profile_fields" style="width:70%" type="email"
                                           placeholder="Votre email" required>
                                    <span>
					<i class="icon-communication-062 u-line-icon-pro u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                                </li>
                                <!-- End Your ID -->

                                <!-- Company Name -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php echo _l('user_profile_dob'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $date_of_birth; ?></span>
                                    </div>
                                    <input name="date_of_birth" id="datepickerDefault" placeholder="DOB"
                                           class="form-control profile_fields" style="width:70%"
                                           value="<?php echo $date_of_birth; ?>" type="text" required>
                                    <span>
						<i class="icon-calendar u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                                </li>
                                <!-- End Company Name -->


                                <!-- Phone Number -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php echo _l('user_profile_mobile'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $mobile; ?></span>
                                    </div>
                                    <input value="<?php echo $mobile; ?>" style="width:70%" name="mobile" id="mobile"
                                           class="form-control profile_fields" type="tel" placeholder="Mobile" required>
										   <input type="hidden" name="verify_mobile" id="verify_mobile" value="<?php echo $mobile; ?>" >
                                    <span>
						
						<i class="icon-phone u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                                </li>
                                <!-- End Phone Number -->

                                <!-- Position -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php echo _l('user_profile_gender'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $gender; ?></span>
                                    </div>
                                    <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-2 profile_fields">
                                        <input <?php if ($gender == 'Male') { ?>  checked="checked" <?php } ?>
                                                value="male" id="reg_gender_1" name="reg_gender"
                                                class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 reg_gender"
                                                type="radio" required>
                                        <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon="&#xf00c"></i>
                                        </div>
                                        Male
                                    </label>

                                    <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-2 profile_fields">
                                        <input <?php if ($gender == 'Female') { ?>  checked="checked" <?php } ?>
                                                value="female" id="reg_gender_2" name="reg_gender"
                                                class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 reg_gender"
                                                type="radio" required>
                                        <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon="&#xf00c"></i>
                                        </div>
                                        Female
                                    </label>
                                    <span>
                        <i class="icon-finance-067 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                                </li>
                                <!-- End Position -->
                            </ul>
                            <?php } ?>
                            <div class="text-sm-right">
                                <button id="cancel_profile_btn"
                                        class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" type="button">
                                    <?php echo _l('cancel_btn'); ?>
                                </button>
                                <button id="edit_profile_btn"
                                        class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" type="button">Edit
                                    Profile
                                </button>
                                <button id="save_profile_btn" class="btn u-btn-primary rounded-0 g-py-12 g-px-25"
                                        type="button"><?php echo _l('submit'); ?>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- End Edit Profile -->

                    <!-- Security Settings -->
                    <div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--2" role="tabpanel">
                        <h2 class="h4 g-font-weight-300"><?php echo _l('my_routes'); ?></h2>
                        <p class="g-mb-25"></p>


                        <div class="shortcode-html">
                            <!-- Basic Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo _l('date_time_text'); ?></th>
                                        <th><?php echo _l('departure'); ?></th>
                                        <th class="hidden-sm"><?php echo _l('arrival'); ?></th>
                                        <th><?php echo _l('seat_text'); ?></th>
                                        <th><?php echo _l('remaining_seats'); ?></th>
                                        <th><?php echo _l('price_per_seat'); ?></th>
                                        <th><?php echo _l('status'); ?></th>
                                        <th><?php echo _l('reservations_tab'); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    if (isset($route_data) && $route_data->num_rows() > 0) {
                                        $route_data = $route_data->result_array();
                                        $n          = 0;
                                        foreach ($route_data as $route) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php
													$datepickerFrom = date('d-m-Y', strtotime($route['datepickerFrom'])) . ' - ' . date('H:i', strtotime($route['depart_time_input']));
                                                    echo $datepickerFrom;
                                                    ?>
                                                </td>
                                                <td><?php echo $route['origin_input']; ?></td>
                                                <td class="hidden-sm"><?php echo $route['destination_input']; ?></td>
                                                <td><?php echo $route['free_spaces']; ?></td>
												<?php
												$this->db->select('count(places_booked) as total_reserved_seats');
												$this->db->where('route_id', $route['route_id']);
												$this->db->group_by('route_id');
												$result = $this->db->get('bookings');
												if($result->num_rows() > 0){
													$total_reserve = $result->row()->total_reserved_seats;
													$total_reserve = $route['free_spaces'] - $total_reserve;
												}else{
													$total_reserve = $route['free_spaces'];
												}
												?>
                                                <td><?php echo $total_reserve; ?></td>
                                                <td>
                                                    <span class="u-label g-bg-cyan g-rounded-20 g-px-10">&euro; <?php echo $route['travel_charges']; ?></span>
                                                </td>
												<?php
												$datepickerFrom_informate = date('d-m-Y', strtotime($route['datepickerFrom'])) . ' ' . date('H:i', strtotime($route['depart_time_input']));
												$status = 'Expired';
												$color = 'red';
												if(strtotime($datepickerFrom_informate) >= strtotime(date('d-m-Y H:i'))){
													$status = "Active";
													$color = 'blue';
												}
												if($route['route_status'] == 'Cancel'){
													$status = "Cancel";
													$color = 'pink';
												}
												?>
												<td>
												<span class="u-label g-bg-<?php echo $color; ?> g-rounded-20 g-px-10"><?php echo $status; ?></span>
												</td>
                                                <td>
													<?php if($status == 'Active' && $total_reserve == $route['free_spaces']){ ?>
														<a href="<?php echo base_url('propose_route/index/edit/'.$route['route_id']); ?>" class="btn btn-primary btn-xs">Edit</a>
														<button type="button" data-id="<?php echo $route['route_id']; ?>" class="btn btn-danger btn-xs trip_del">Del</button>
													<?php }else{ 
													if($route['route_status'] != 'Cancel'){
													?>
<button  id="cancel_trip" data-route_id="<?php echo $route['route_id']; ?>" class="cancel_trip btn btn-info btn-xs">Cancel</button>
													<?php } } ?>
													<button data-toggle="collapse" data-target="#accordion_<?php echo $n; ?>"
													class="btn btn-xs btn-warning"
													style="cursor: pointer;"><i class="icon-eye u-line-icon-pro g-color-white-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i></button>
												</td>
                                            </tr>
                                            <tr>
                                                <td colspan="8">
                                                    <div id="accordion_<?php echo $n; ?>"
                                                         class="collapse table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th><?php echo _l('date_time_res'); ?></th>
                                                                <th><?php echo _l('res_person'); ?></th>
                                                                <th><?php echo _l('res_person_details'); ?></th>
                                                                <th><?php echo _l('res_seats_res'); ?></th>
                                                                <th><?php echo _l('res_amount'); ?></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $bookings = boooking_by_route_id($route['route_id']);
                                                            if (!empty($bookings)) {
                                                                foreach ($bookings as $book) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo date('d-m-Y - H:i', strtotime($book['booking_datetime'])); ?></td>
                                                                        <td>
                                                                            <i class="icon-finance-067 u-line-icon-pro"></i> <?php echo ucwords($book['first_name'] . ' ' . $book['second_name']); ?>
                                                                        </td>
																		<td>
																		<i class="icon-phone u-line-icon-pro"></i> <?php echo $book['mobile']; ?>
                                                                            <br><i class="icon-communication-062 u-line-icon-pro"></i> <?php echo $book['email']; ?>
																		</td>
                                                                        <td>
                                                                            <span class="u-label g-bg-orange g-rounded-20 g-px-10"><i class="icon-flag u-line-icon-pro"></i> <?php echo $book['places_booked']; ?></span>
                                                                            <br>
                                                                            <strong>Approval Status:</strong>
                                                                            <br>
                                                                            <span id="booking_text"><?php echo ucwords($book['booking_status']); ?></span>
                                                                            <?php
                                                                            if ($book['booking_status'] == 'pending') {
                                                                                ?>
                                                                                <br>
                                                                                <span class="block u-label u-label-success g-color-white u-label-with-icon g-mt-5 g-cursor-pointer approve_reservation" data-booking_email="<?php echo $book['email']; ?>" data-from="<?php echo $route['origin_input']; ?>" 
																				data-to="<?php echo $route['destination_input']; ?>" data-name="<?php echo $book['first_name']; ?>"
                                                                                      data-booking_id="<?php echo $book['booking_id']; ?>"><i
                                                                                            class="fa fa-check"></i>Approuver</span>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <span class="u-label g-bg-green g-rounded-20 g-px-10">&euro; <?php echo $book['total_amount']; ?></span>
                                                                            <br>
                                                                            <strong>Amount Status:</strong>
                                                                            <br>
                                                                            <span id="amount_text"><?php echo ucwords($book['amount_status']); ?></span>
                                                                            <?php
                                                                            if ($book['amount_status'] == 'pending') {
                                                                                ?>
                                                                                <br>
                                                                                <span class="block u-label u-label-success g-color-white u-label-with-icon g-mt-5 g-cursor-pointer collect_payment" data-booking_email="<?php echo $book['email']; ?>" 
																				data-from="<?php echo $route['origin_input']; ?>" data-to="<?php echo $route['destination_input']; ?>" data-name="<?php echo $book['first_name']; ?>"
                                                                                      data-booking_id="<?php echo $book['booking_id']; ?>"><i
                                                                                            class="fa fa-check"></i>collecte</span>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <tr>
                                                                    <td colspan="5"><strong><?php echo _l('no_res_msg'); ?></strong></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            $n++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Basic Table -->
                        </div>

                    </div>
                    <!-- End Security Settings -->

                    <!-- Payment Options -->
                    <div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--3" role="tabpanel">
                        <h2 class="h4 g-font-weight-300"><?php echo _l('my_res_heading'); ?></h2>
                        <p class="g-mb-25"><?php echo _l('my_res_heading_details'); ?></p>

                        <div class="shortcode-html">
                            <!-- Basic Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><?php echo _l('date_time_text'); ?></th>
                                        <th><?php echo _l('departure'); ?></th>
                                        <th class="hidden-sm"><?php echo _l('arrival'); ?></th>
                                        <th><?php echo _l('my_res_seats'); ?></th>
                                        <th><?php echo _l('price_text'); ?></th>
                                        <th><?php echo _l('my_res_status'); ?></th>
                                        <th><?php echo _l('payment_Status'); ?></th>
                                        <th><?php echo _l('action'); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    if (isset($booking_data) && $booking_data->num_rows() > 0) {
                                        $booking_data = $booking_data->result_array();
                                        foreach ($booking_data as $booking) {
                                            ?>
                                            <tr>
                                                <td><?php echo date('d/m/Y', strtotime($booking['date'])); ?>
                                                    - <?php echo date('H:i', strtotime($booking['time'])); ?></td>
                                                <td><?php echo $booking['start']; ?></td>
                                                <td class="hidden-sm"><?php echo $booking['end']; ?></td>
                                                <td><?php echo $booking['places']; ?></td>
                                                <td>
                                                    <span class="u-label g-bg-cyan g-rounded-20 g-px-10">&euro; <?php echo $booking['total_amount']; ?></span>
                                                </td>
                                                <td>
                                                    <span class="u-label <?php echo ($booking['booking_status'] == 'pending') ? 'g-bg-blue' : 'g-bg-green'; ?> g-rounded-20 g-px-10"><?php echo ucwords($booking['booking_status']); ?></span>
                                                </td> 
												<td>
                                                    <span class="u-label <?php echo ($booking['amount_status'] == 'pending') ? 'g-bg-blue' : 'g-bg-green'; ?> g-rounded-20 g-px-10"><?php echo ucwords($booking['amount_status']); ?></span>
                                                </td>
												<td>
												<?php if($booking['route_status'] != 'Cancel' && $booking['is_route_end'] != 1){ ?>
												<button  id="cancel_booking" data-book_id="<?php echo $booking['booking_id']; ?>" class="cancel_booking btn btn-danger btn-xs">Cancel</button>
												<?php }else if($booking['route_status'] == 'Cancel'){ ?>
													<span class="u-label g-rounded-20 g-px-10 g-bg-blue">Cancel</span>
												<?php }else if($booking['is_route_end'] == 1){ ?>
													<span class="u-label g-rounded-20 g-px-10 g-bg-green">Completed</span>
												<?php } ?>
												</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Basic Table -->
                        </div>
                    </div>
                    <!-- End Payment Options -->

                    <!-- Notification Settings -->
                    <div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--4" role="tabpanel">
                        <h2 class="h4 g-font-weight-300"><?php echo _l('my_settings_heading'); ?></h2>
                        <p class="g-mb-25"><?php echo _l('my_settings_heading_details'); ?></p>

                        <form id="change_password_form" method="post"
                              action="<?php echo base_url('user_profile/change_password'); ?>">
                            <!-- Current Password -->
                            <div class="form-group row g-mb-25">
                                <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10"><?php echo _l('my_settings_curr_pass'); ?></label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input name="current_password"
                                               class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                               type="password" placeholder="<?php echo _l('my_settings_curr_pass'); ?>" required>
                                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Current Password -->

                            <!-- New Password -->
                            <div class="form-group row g-mb-25">
                                <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10"><?php echo _l('my_settings_new_pass'); ?></label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input name="new_password" id="new_password"
                                               class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                               type="password" placeholder="<?php echo _l('my_settings_new_pass'); ?>" required>
                                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End New Password -->

                            <!-- Verify Password -->
                            <div class="form-group row g-mb-25">
                                <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10"><?php echo _l('my_settings_confirmation'); ?></label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input id="confirm_new_password" name="confirm_new_password"
                                               class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                               type="password" placeholder="<?php echo _l('my_settings_confirmation'); ?>" required>
                                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Verify Password -->
                            <div class="text-sm-right">
                                <button id="change_password" class="btn u-btn-primary rounded-0 g-py-12 g-px-25"
                                        href="#"><?php echo _l('submit'); ?>
                                </button>
                            </div>
                            <!-- End Verify Password -->
                        </form>
                    

						<!--Deactivate Account -->
						<form id="deactivate_account_form" method="post"
                              action="">
							<hr class="g-brd-gray-light-v4 g-my-25">

							   <h2 class="h4 g-font-weight-300"><?php echo _l('my_settings_Deactivation_heading'); ?></h2>
							   <p class="g-mb-25"><?php echo _l('my_settings_Deactivation_heading_details'); ?></p>

								<!-- Verify Password -->
							  <div class="form-group row g-mb-25">
								<label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10"><?php echo _l('my_settings_Deactivation'); ?></label>
								<div class="col-sm-9">
								  <div class="input-group g-brd-primary--focus">
									<input name="deactivate_account" id="deactivate_account" class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" type="password" placeholder="" required>
									<div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
									  <i class="icon-lock"></i>
									</div>
								  </div>
								</div>
							  </div>
							  
							  <div class="text-sm-right">
								   <button id="deactivate_account_btn" type="button" class="btn u-btn-primary rounded-0 g-py-12 g-px-25" ><?php echo _l('submit'); ?></button>
							  </div>
						 </form>
						  <!-- End Deactivate Account -->
						 
						<!-- Delete Account -->						 
						 <form id="delete_account_form" method="post"
                              action="">
							  
							  <hr class="g-brd-gray-light-v4 g-my-25">

							   <h2 class="h4 g-font-weight-300"><?php echo _l('my_settings_Suppression_heading'); ?> </h2>
							   <p class="g-mb-25"><?php echo _l('my_settings_Suppression_heading_details'); ?></p>

							  <div class="form-group row g-mb-25">
								<label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10"><?php echo _l('my_settings_Deactivation'); ?></label>
								<div class="col-sm-9">
								  <div class="input-group g-brd-primary--focus">
									<input class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0" name="delete_account" id="delete_account" type="password" placeholder="" required>
									<div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
									  <i class="icon-lock"></i>
									</div>
								  </div>
								</div>
							  </div>
							  
							  <div class="text-sm-right">
								   <button id="delete_account_btn"  type="button" class="btn u-btn-primary rounded-0 g-py-12 g-px-25"><?php echo _l('submit'); ?></button>
							  </div>
                        </form>
						<!-- End Delete Account -->
					
					</div>
                    <!-- End Notification Settings -->
                </div>
                <!-- End Tab panes -->
            </div>
            <!-- End Profle Content -->
        </div>
		

		<!-- Modal -->
		<div data-backdrop="static" data-keyboard="false" id="cancellation_reason" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title">Cancellation Reason</h4>
			  </div>
			  <div class="modal-body">
				<form method="post" id="cancel_trip_reason_form">
					 <div class="form-group mb-0">
						<div class="u-input-group-v2 div-input-group">
						<input type="hidden" name="route_id" id="route_id" />
						<textarea id="cancel_trip_reason" class="form-control rounded-0 u-form-control g-resize-none div-input-group"
								  name="cancel_trip_reason" rows="4" required></textarea>
							<label for="message"><?php echo _l('cancellation_reason'); ?></label>
						</div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="cancel_trip_confirm" class="btn btn-success" >Submit</button>
			  </div>
			</div>

		  </div>
		</div>
		
    </div>
</section>
<script>
    $('.profile_fields').hide();
    $(document).on('click', '#edit_profile_btn', function () {
        $('.profile_values').hide();
        $('.profile_fields').show();
    });
    $(document).on('click', '#cancel_profile_btn', function () {
        $('.profile_values').show();
        $('.profile_fields').hide();
    });
    //Validation of Form edit profile
    $(document).on('click', '#save_profile_btn', function (e) {
        e.preventDefault();
		$('input').css('width', '70%');
        var req_input = $('#edit_sigup_from input[required]');
        var is_valid = true;
		if($('#verification_code').length > 0){
			$('#verification_code').css('width', '10%');
			$('#mobile').css('width', '44%');
			if($('#verification_code').val() == ''){
				$('#verification_code').css('border-color', 'red');
				is_valid = false;
			}
		 }
        var input_types_1 = ['text', 'tel', 'number'];
        var input_types_3 = ['radio'];
        var input_types_4 = ['email'];
        $.each(req_input, function (k, input) {
            var error_msg_id = $(this).attr('id') + '_error_msg';
            $('#' + error_msg_id).remove();
            if (input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == '') {
				$('#'+$(this).attr('id')).css('width', '60%');
                $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">required*</p>');
                is_valid = false;
            } else if (input_types_3.indexOf($(this).attr('type')) != -1) {
                $('#reg_gender_1_error_msg').remove();
                if ($('#reg_gender_1').attr("checked") !== 'checked' && $('#reg_gender_2').attr("checked") !== 'checked') {
                    $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">required*</p>');
                    is_valid = false;
                } else {
                    $('#reg_gender_1_error_msg').remove();
                    $('#reg_gender_2_error_msg').remove();
                }

            } else if (input_types_4.indexOf($(this).attr('type')) != -1) {
                var email = $(this).val();
                if (email !== '') {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    var valid_email = regex.test($(this).val());
                    if (!valid_email) {
						$(this).css('width', '47%');
                        $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">Enter the valid email address</p>');
                        is_valid = false;
                    }
                } else {
					$(this).css('width', '60%');
                    $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">required*</p>');
                    is_valid = false;
                }
            }
        });
        if (is_valid) {
            $('#edit_sigup_from').submit();
        }
    });

    //Validation of Form for change password
    $(document).on('click', '#change_password', function (e) {
        e.preventDefault();
        var req_input = $('#change_password_form input[required]');
        var is_valid_form = true;
        var input_types_1 = ['password'];

        $.each(req_input, function (k, input) {
            var error_msg_id = $(this).attr('id') + '_error_msg';
            $('#' + error_msg_id).remove();
            if (input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == '') {
                $(this).parent().after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
                is_valid_form = false;
            }
        });
        //confirm password


        if (is_valid_form) {
            $('#change_password_form').submit();
        }
    });

    // approve reservation
    $(document).on('click', '.approve_reservation', function () {
        var thisObj = $(this);
        var booking_id = $(thisObj).data('booking_id');
		var booking_email = $(thisObj).data('booking_email');
        var name = $(thisObj).data('name');
        var from = $(thisObj).data('from');
        var to = $(thisObj).data('to');
		
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user_profile/approve_boooking'); ?>",
            data: {'booking_id': booking_id, 'booking_email': booking_email, 'from': from, 'to': to, 'name': name},
            cache: false,
            success: function (data) {
                if(data == 'TRUE'){
                    $(thisObj).closest('td').find('span#booking_text').html('Approved');
                    $(thisObj).remove();
					swal ( "Succcess" ,  "Approved Reservation Successfully!" ,  "success" );
                }
            }
        });
    });

    // collect payment
    $(document).on('click', '.collect_payment', function () {
        var thisObj = $(this);
        var booking_email = $(thisObj).data('booking_email');
        var booking_id = $(thisObj).data('booking_id');
        var name = $(thisObj).data('name');
        var from = $(thisObj).data('from');
        var to = $(thisObj).data('to');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user_profile/collect_payment'); ?>",
            data: {'booking_id': booking_id, 'booking_email': booking_email, 'from': from, 'to': to, 'name': name},
            cache: false,
            success: function (data) {
                if(data == 'TRUE'){
                    $(thisObj).closest('td').find('span#amount_text').html('Collected');
                    $(thisObj).remove();
					swal ( "Succcess" ,  "Collect Payment Successfully!" ,  "success" );
                }
            }
        });
    });

	// Confirmation for delete
    $(document).on('click', '.trip_del', function () {
		 swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this Record!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			  // Del trip if no user booked
			   var thisObj = $(this);
				var trip_id = thisObj.data('id');
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('user_profile/delete_trip'); ?>",
					data: {'trip_id': trip_id},
					cache: false,
					success: function (data) {
					   if(data == 'TRUE'){
						   thisObj.closest('tr').remove();
						   swal("Poof! Your Record has been deleted!", {
							  icon: "success",
							});
					   }else{
						  swal ( "Oops" ,  "Something went wrong!" ,  "error" );
					   }
					}
				});

		  } else {
			swal("Your Record is safe!");
		  }
		});
    });

	//send verfication message
	$(document).on('click', '#send_verification_code', function(){
		var mobile_number = $('#mobile').val();
		$.ajax({
                cache: false,
                type: 'POST',
                url: "<?php echo site_url('registration/mobile_verification'); ?>",
                data: 'mobile_number=' +mobile_number,
                success: function (responce) {
					var responce = JSON.parse(responce);
					if(responce.action == 'warning'){
						$('#mobile').parent().parent('.div-input-group').append('<p id="mobile_error_msg" class="" style="color:red">'+responce.msg+'</p>');
					}else if(responce.action == 'error'){
						swal("Warning!", responce.msg, "warning");
					}else if(responce.action == 'success'){
						$('#mobile').css('width', '44%');
						$('#verification_code').remove();
						$('#mobile').after('<input style="width: 10%; display: block;" name="verification_code" id="verification_code" class="form-control profile_fields g-state-not-empty" type="text">');
						swal("Successfully Send!", responce.msg, "success");
					}
                }
            });
	});

	// send mobile verification code
	$(document).on('keyup', '#mobile', function(){
		var mobile_number = $('#mobile').val();
		var verify_mobile = $('#verify_mobile').val();
		$('.send_verification_code').remove();
		if(mobile_number !==  verify_mobile){
			if($('#verification_code').length > 0){
				$('#mobile').css('width', '44%');
			}else{
				$('#mobile').css('width', '57%');
			}

			 var btn = '<button type="button" class="btn send_verification_code u-btn-primary rounded-0" id="send_verification_code" class="form-control">Verification</button>';
			 if($('#verification_code').length > 0){
				 $('#verification_code').after(btn);
			 }else{
				 $(this).after(btn);
			 }


		}else if(mobile_number ===  verify_mobile){
			$('#verification_code').remove();
			$('.send_verification_code').remove();
			$('#mobile').css('width', '70%');
		}
		if(mobile_number == ''){
			$('#verification_code').remove();
			$('.send_verification_code').remove();
			$('#mobile').css('width', '70%');
		}
	});

	//send verifying email to verified email
	$(document).on('click', '#send_verifying_email', function(){
		var user_id = $(this).data('id');
		var email = $(this).data('email');
		var name = $(this).data('name');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('user_profile/verifying_email'); ?>",
			data: {'user_id': user_id, 'email': email, 'name': name},
			cache: false,
			success: function (data) {
			   if(data){
				   swal("Email has been send to your email address successfully please verified.", {
					  icon: "success",
					});
			   }else{
				  swal ( "Oops" ,  "Something went wrong!" ,  "error" );
			   }
			}
		});
	});
	
	// Delete account
    $(document).on('click', '#delete_account_btn', function (e) {
        e.preventDefault();
		var delete_account_val =$('#delete_account').val();
        var req_input = $('#delete_account_form input[required]');
        var is_valid_form = true;
        var input_types_1 = ['password'];

        $.each(req_input, function (k, input) {
            var error_msg_id = $(this).attr('id') + '_error_msg';
            $('#' + error_msg_id).remove();
            if (input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == '') {
                $(this).parent().after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
                is_valid_form = false;
            }
        });
        //confirm password


        if (is_valid_form) {
			 $.ajax({
            type: "POST",
            url: "<?php echo base_url('user_profile/delete_account_email'); ?>",
			data: {'delete_account_val': delete_account_val},
            cache: false,
            success: function (data) {
				var res = JSON.parse(data);
                if(res.action == 'info'){
                   swal("Info!", res.msg, "info");
                }else{
					 swal("Success!", res.msg, "success");
				}
            }
        });
        }
    });	
	
	// deactivate account
    $(document).on('click', '#deactivate_account_btn', function (e) {
        e.preventDefault();
		var deactivate_account_val =$('#deactivate_account').val();
        var req_input = $('#deactivate_account_form input[required]');
        var is_valid_form = true;
        var input_types_1 = ['password'];

        $.each(req_input, function (k, input) {
            var error_msg_id = $(this).attr('id') + '_error_msg';
            $('#' + error_msg_id).remove();
            if (input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == '') {
                $(this).parent().after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
                is_valid_form = false;
            }
        });

        if (is_valid_form) {
				 $.ajax({
				type: "POST",
				url: "<?php echo base_url('user_profile/deactivate_account'); ?>",
				data: {'deactivate_account_val': deactivate_account_val},
				cache: false,
				success: function (data) {
					var res = JSON.parse(data);
					 if(res.action == 'info'){
						   swal("Info!", res.msg, "info");
						}else{
							swal({
							  title: "Disabled?",
							  text: res.msg,
							  icon: "warning",
							  buttons: false,
							  dangerMode: true,
							})
							.then((willDelete) => {
								window.location.reload();
							});
						}	
				}
			});
        }
    });
	
		
	// Confirmation for Cancellation of trip
    $(document).on('click', '#cancel_trip', function () {
		var route_id = $(this).data('route_id');	
		 swal({
		  title: "Are you sure?",
		  text: "Once Cancel your trip you will not be able to Reactive your this trip!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			  // open modal box for cancellation reason
			  $('#route_id').val(route_id);
			  $('#cancellation_reason').modal('show');	
		  } else {
			swal("Your have choosen a better option!");
		  }
		});
    });
	
	// Cancellation of trip
	 $(document).on('click', '#cancel_trip_confirm', function (e) {
		 e.preventDefault();
		var route_id = $('#route_id').val();		
		var cancel_trip_reason = $('#cancel_trip_reason').val();		
        var req_textarea = $('#cancel_trip_reason_form textarea[required]');
        var is_valid_cancel_trip_form = true;

		$.each(req_textarea, function(k, input){
			var error_msg_id = $(this).attr('id')+'_error_msg';
			$('#'+error_msg_id).remove();
			if($(this).val() == ''){
				$(this).parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				is_valid_cancel_trip_form = false;
			}
		});
		
			if (is_valid_cancel_trip_form == true) {
				jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url('propose_route/cancel_trip'); ?>",
					data: {'route_id': route_id, 'cancel_trip_reason': cancel_trip_reason},
					cache: false,
					success: function (data) {
						var res = JSON.parse(data);
						if(res.action == 'info'){
						   swal(res.msg, {
							  icon: "info",
							});
						}else if (res.action == 'warning') {
							swal(res.msg, {
							  icon: "warning",
							});
						}else{
							$('#cancellation_reason').modal('hide');
						 swal(res.msg, {
							  icon: "success",
							});
						}
					}
				});
			}
		});
		
		$("#cancellation_reason").on("hidden.bs.modal", function () {
			$('#route_id').val('');
			$('#cancel_trip_reason').val('');
		});
		
		
	// Confirmation for cancel booking
    $(document).on('click', '.cancel_booking', function () {
		 swal({
		  title: "Are you sure?",
		  text: "Once Cancel, This booking will be deleted.",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
			  // Del trip if no user booked
			   var thisObj = $(this);
				var book_id = thisObj.data('book_id');
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('user_profile/cancel_booking'); ?>",
					data: {'book_id': book_id},
					cache: false,
					success: function (data) {
					   if(data == 'TRUE'){
						   thisObj.closest('tr').remove();
						   swal("Your booking Has been cancelled!", {
							  icon: "success",
							});
					   }else{
						  swal ( "Oops" ,  "Something went wrong!" ,  "error" );
					   }
					}
				});

		  } else {
			swal("Your Record is safe!");
		  }
		});
    });

</script>
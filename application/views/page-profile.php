<!-- Breadcrumb -->
<section class="g-my-30">
    <div class="container">
        <ul class="u-list-inline">
            <li class="list-inline-item g-mr-7">
                <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Accueil</a>
                <i class="fa fa-angle-right g-ml-7"></i>
            </li>
            <li class="list-inline-item g-color-primary">
                <span>Tableau de bord</span>
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
            <div class="col-lg-9">
                <!-- Nav tabs -->
                <ul class="nav nav-justified u-nav-v1-1 u-nav-primary g-brd-bottom--md g-brd-bottom-2 g-brd-primary g-mb-20"
                    role="tablist" data-target="nav-1-1-default-hor-left-underline"
                    data-tabs-mobile-type="slide-up-down"
                    data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
                    <li class="nav-item">
                        <a class="nav-link g-py-10 active" data-toggle="tab"
                           href="#nav-1-1-default-hor-left-underline--1" role="tab">Editer le profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--2"
                           role="tab">Trajets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--3"
                           role="tab">Resérvations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link g-py-10" data-toggle="tab" href="#nav-1-1-default-hor-left-underline--4"
                           role="tab">Paramètres</a>
                    </li>
                </ul>
                <!-- End Nav tabs -->

                <!-- Tab panes -->
                <div id="nav-1-1-default-hor-left-underline" class="tab-content">
                    <!-- Edit Profile -->
                    <div class="tab-pane fade show active" id="nav-1-1-default-hor-left-underline--1" role="tabpanel">
                        <h2 class="h4 g-font-weight-300">Gérez votre nom, votre identifiant et vos adresses email</h2>
                        <p>Vous trouverez ci-dessous le nom, l’adresse e-mail, les contacts, etc., enregistrés pour
                            votre compte.</p>
                        <?php
                        if (isset($user_data) && $user_data->num_rows() > 0){
                        $user_data         = $user_data->row_array();
                        $first_name        = $user_data['first_name'];
                        $second_name       = $user_data['second_name'];
                        $gender            = $user_data['gender'];
                        $mobile            = $user_data['mobile'];
                        $date_of_birth     = date('d-m-Y', strtotime($user_data['date_of_birth']));
                        $email             = $user_data['email'];
                        $register_datetime = date('d-m-Y H:i:s', strtotime($user_data['register_datetime']));

                        echo $this->session->flashdata('message');
                        echo validation_errors();
                        ?>
                        <form id="edit_sigup_from" action="<?php echo base_url('user_profile'); ?>" method="post">
                            <ul class="list-unstyled g-mb-30">
                                <!-- Name -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php _l('user_profile_first_name'); ?></strong>
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
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php _l('user_profile_sec_name'); ?></strong>
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
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php _l('user_profile_email'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $email; ?></span>
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
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php _l('user_profile_dob'); ?></strong>
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
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php _l('user_profile_mobile'); ?></strong>
                                        <span class="align-top profile_values"><?php echo $mobile; ?></span>
                                    </div>
                                    <input value="<?php echo $mobile; ?>" style="width:70%" name="mobile" id="mobile"
                                           class="form-control profile_fields" type="tel" placeholder="Mobile" required>
                                    <span>
						<i class="icon-phone u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                      </span>
                                </li>
                                <!-- End Phone Number -->

                                <!-- Position -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10"><?php _l('user_profile_gender'); ?></strong>
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
                                    Anuller
                                </button>
                                <button id="edit_profile_btn"
                                        class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" type="button">Edit
                                    Profile
                                </button>
                                <button id="save_profile_btn" class="btn u-btn-primary rounded-0 g-py-12 g-px-25"
                                        type="button">Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- End Edit Profile -->

                    <!-- Security Settings -->
                    <div class="tab-pane fade" id="nav-1-1-default-hor-left-underline--2" role="tabpanel">
                        <h2 class="h4 g-font-weight-300">Mes Trajets</h2>
                        <p class="g-mb-25"></p>


                        <div class="shortcode-html">
                            <!-- Basic Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Date / heure</th>
                                        <th>Départ</th>
                                        <th class="hidden-sm">Arrivée</th>
                                        <th>Des places</th>
                                        <th>Remaining Seats</th>
                                        <th>Prix ​​par place</th>
                                        <th>Status</th>
                                        <th>les réservations</th>
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
												?>
												<td>
												<span class="u-label g-bg-<?php echo $color; ?> g-rounded-20 g-px-10"><?php echo $status; ?></span>
												</td>
                                                <td data-toggle="collapse" data-target="#accordion_<?php echo $n; ?>"
                                                    class="clickable"><span
                                                            class="u-label u-label-warning g-color-white"
                                                            style="cursor: pointer;">Cliquez ici</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="8">
                                                    <div id="accordion_<?php echo $n; ?>"
                                                         class="collapse table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Date / Heure réservation</th>
                                                                <th>Personne réservant</th>
                                                                <th>Person Details</th>
                                                                <th>Sièges réservés</th>
                                                                <th>Montant total</th>
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
                                                                                <span class="block u-label u-label-success g-color-white u-label-with-icon g-mt-5 g-cursor-pointer approve_reservation"
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
                                                                                <span class="block u-label u-label-success g-color-white u-label-with-icon g-mt-5 g-cursor-pointer collect_payment"
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
                                                                    <td colspan="5"><strong>Pas encore de
                                                                            réservations.</strong></td>
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
                        <h2 class="h4 g-font-weight-300">Mes Reservations</h2>
                        <p class="g-mb-25">Vous trouverez ci-dessous les réservations effectuées pour votre compte.</p>

                        <div class="shortcode-html">
                            <!-- Basic Table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Date / heure</th>
                                        <th>Départ</th>
                                        <th class="hidden-sm">Arrivée</th>
                                        <th>Places réservées</th>
                                        <th>Prix</th>
                                        <th>Statut approuvé</th>
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
                        <h2 class="h4 g-font-weight-300">Mes Paramètres</h2>
                        <p class="g-mb-25">Pour modifier votre mot de passe, veuillez remplir les trois champs
                            ci-dessous.</p>

                        <form id="change_password_form" method="post"
                              action="<?php echo base_url('user_profile/change_password'); ?>">
                            <!-- Current Password -->
                            <div class="form-group row g-mb-25">
                                <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Mot
                                    de passe actuel</label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input name="current_password"
                                               class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                               type="password" placeholder="Mot de passe actuel" required>
                                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Current Password -->

                            <!-- New Password -->
                            <div class="form-group row g-mb-25">
                                <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Nouveau
                                    mot de passe</label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input name="new_password" id="new_password"
                                               class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                               type="password" placeholder="Nouveau mot de passe" required>
                                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End New Password -->

                            <!-- Verify Password -->
                            <div class="form-group row g-mb-25">
                                <label class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Confirmation</label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input id="confirm_new_password" name="confirm_new_password"
                                               class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                               type="password" placeholder="Confirmation" required>
                                        <div class="input-group-addon d-flex align-items-center g-bg-white g-color-gray-light-v1 rounded-0">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Verify Password -->
                            <div class="text-sm-right">
                                <button id="change_password" class="btn u-btn-primary rounded-0 g-py-12 g-px-25"
                                        href="#">Enregistrer
                                </button>
                            </div>
                            <!-- End Verify Password -->
                        </form>
                    </div>
                    <!-- End Notification Settings -->
                </div>
                <!-- End Tab panes -->
            </div>
            <!-- End Profle Content -->
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
        var req_input = $('#edit_sigup_from input[required]');
        var is_valid = true;
        var input_types_1 = ['text', 'tel', 'number'];
        var input_types_3 = ['radio'];
        var input_types_4 = ['email'];
        $.each(req_input, function (k, input) {
            var error_msg_id = $(this).attr('id') + '_error_msg';
            $('#' + error_msg_id).remove();
            if (input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == '') {
                $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
                is_valid = false;
            } else if (input_types_3.indexOf($(this).attr('type')) != -1) {
                $('#reg_gender_1_error_msg').remove();
                if ($('#reg_gender_1').attr("checked") !== 'checked' && $('#reg_gender_2').attr("checked") !== 'checked') {
                    $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
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
                        $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">Please enter the valid email address</p>');
                        is_valid = false;
                    }
                } else {
                    $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
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
                $(this).after('<p id="' + error_msg_id + '" class="" style="color:red">This Field is required</p>');
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
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user_profile/approve_boooking'); ?>",
            data: {booking_id: booking_id},
            cache: false,
            success: function (data) {
                if(data == 'TRUE'){
                    $(thisObj).closest('td').find('span#booking_text').html('Approved');
                    $(thisObj).remove();
                }
            }
        });
    });

    // collect payment
    $(document).on('click', '.collect_payment', function () {
        var thisObj = $(this);
        var booking_id = $(thisObj).data('booking_id');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('user_profile/collect_payment'); ?>",
            data: {booking_id: booking_id},
            cache: false,
            success: function (data) {
                if(data == 'TRUE'){
                    $(thisObj).closest('td').find('span#amount_text').html('Collected');
                    $(thisObj).remove();
                }
            }
        });
    });
</script>
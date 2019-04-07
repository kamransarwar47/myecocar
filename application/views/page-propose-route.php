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
          <?php echo _l('route_page_not_login_msg'); ?>
        </span>
                </div>
            </div>
            <?php
        }
        // validation errors
        if(validation_errors() != false) {
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
                <p><?php echo _l('form_error_msg') ?></p>
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
            <div class="col-lg-8 g-mb-30 g-mb-0--lg">
                <form autocomplete="off" action="<?php echo base_url('propose_route'); ?>" method="post"
                      id="route_from">
                    <article class="u-shadow-v11 rounded g-pa-30">
                        <!-- Content Header -->
                        <div class="row">
                            <div class="col-md-9 g-mb-30 g-mb-0--md">
                                <div class="media">
                                    <div class="d-flex align-self-center g-mt-3 g-mr-20">
                                        <img class="g-width-40 g-height-40" src="<?php echo base_url(); ?>assets/img/bg/trajet.png"
                                             alt="Image Description">
                                    </div>
                                    <div class="media-body">
                      <span class="d-block g-mb-3">
                          <a class="u-link-v5 g-font-size-18 g-color-gray-dark-v1 g-color-primary--hover" href="#"><?php echo _l('post_ad_heading'); ?></a>
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Content Header -->

                        <hr class="g-brd-gray-light-v4">

                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">

                            <div class="form-group g-mb-25 div-input-group">
                                <label for="disabledTextInput"><?php echo _l('post_ad_field1'); ?>
                                    <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                        <i class="icon-communication-011 u-line-icon-pro"></i>
                      </span>
                                </label>
                                <input type="text" id="origin-input" name="origin_input"
                                       class="form-control form-control-md g-font-size-default g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                       type="text" placeholder="<?php echo _l('post_ad_field1_placeholder'); ?>" value="<?php echo set_value('origin_input',  ($edit != false) ? $route_data['origin_input'] : '') ?>" required>
                                <input type="hidden" id="origin-city" name="origin_city" value="<?php echo set_value('origin_city',  ($edit != false) ? $route_data['origin_city'] : '') ?>">
                                <input type="hidden" id="origin-country" name="origin_country" value="<?php echo set_value('origin_country',  ($edit != false) ? $route_data['origin_country'] : '') ?>">
                            </div>

                            <div class="form-group g-mb-25 div-input-group">
                                <label for="disabledTextInput"><?php echo _l('post_ad_field2'); ?>
                                    <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                        <i class="icon-communication-011 u-line-icon-pro"></i>
                      </span>
                                </label>
                                <input type="text" id="destination-input" name="destination_input"
                                       class="form-control form-control-md g-font-size-default g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                       type="text" placeholder="<?php echo _l('post_ad_field2_placeholder'); ?>" required value="<?php echo set_value('destination_input',  ($edit != false) ? $route_data['destination_input'] : '') ?>">
                                <input type="hidden" id="dest-city" name="dest_city" value="<?php echo set_value('dest_city',  ($edit != false) ? $route_data['dest_city'] : '') ?>">
                                <input type="hidden" id="dest-country" name="dest_country" value="<?php echo set_value('dest_country',  ($edit != false) ? $route_data['dest_country'] : '') ?>">
                            </div>
                        </div>
                        <hr class="g-brd-gray-light-v4">

                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="disabledTextInput" class="pull-left"><?php echo _l('post_ad_heading_schedule'); ?>
                                    </label>
                                    <label class="form-check-inline u-check g-pl-25 pull-right">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox"
                                               id="round-trip-checkbox" name="round_trip_checkbox" <?php echo set_checkbox('round_trip_checkbox',  'on', ($edit != false) ? false : true) ?>>
                                        <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon=""></i>
                                        </div>
                                        <?php echo _l('post_ad_round_trip'); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="g-mb-10"></label>

                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus div-input-group">
                                            <input id="datepickerFrom" name="datepickerFrom"
                                                   class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="text" placeholder="<?php echo _l('post_ad_dept_date'); ?>" data-range="true"
                                                   data-to="datepickerTo" required value="<?php echo set_value('datepickerFrom',  ($edit != false) ? date('d-m-Y', strtotime($route_data['datepickerFrom'])) : '') ?>">
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus div-input-group">
                                            <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="time" id="depart-time-input"
                                                   name="depart_time_input" required value="<?php echo set_value('depart_time_input',  ($edit != false) ? date('H:i:s', strtotime($route_data['depart_time_input'])) : '00:00:00') ?>">
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                </div>

                                <div class="row" id="date-retour-box" <?php echo ($edit != false) ? "style='display: none;'" : ""; ?>>
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus div-input-group">
                                            <input id="datepickerTo" name="datepickerTo"
                                                   class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="text" placeholder="<?php echo _l('post_ad_arr_date'); ?>" required>

                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus div-input-group">
                                            <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="time" value="00:00:00" id="arrival-time-input"
                                                   name="arrival_time_input" required>
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="g-brd-gray-light-v4">

                        <!-- Column Sizing -->
                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">
                            <label for="disabledTextInput"><?php echo _l('post_ad_veh_info'); ?>
                                <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                       <!-- <i class="icon-communication-011 u-line-icon-pro"></i> -->
                      </span>
                            </label>
                            <div class="form-group row g-mb-25">


									<div class="col-md-4">
										<div class="div-input-group">
											<input id="vehicle-model-make" name="vehicle_model_make"
												   class="form-control form-control-md g-font-size-default g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
												   type="text" placeholder="<?php echo _l('post_ad_veh_mkmdl'); ?>" required value="<?php echo set_value('vehicle_model_make',  ($edit != false) ? $route_data['vehicle_model_make'] : '') ?>">
										</div>
									</div>


                                <div class="col-md-4 div-input-group">
                                    <select class="form-control" id="fuel-type" name="fuel_type" required>
                                        <option value=""><?php echo _l('post_ad_fuel'); ?></option>
                                        <option value="Disiel" <?php echo set_select('fuel_type',  'Disiel', ($edit != false) ? ($route_data['fuel_type'] == 'Disiel') ? true : false : false); ?>>Disiel</option>
                                        <option value="Essence" <?php echo set_select('fuel_type',  'Essence', ($edit != false) ? ($route_data['fuel_type'] == 'Essence') ? true : false : false); ?>>Essence</option>
                                    </select>
                                </div>

                                <div class="col-md-4 div-input-group">
                                    <select class="form-control" id="free-spaces" name="free_spaces" required>
                                        <option value=""><?php echo _l('post_ad_free_place'); ?></option>
                                        <option value="1" <?php echo set_select('free_spaces',  '1', ($edit != false) ? ($route_data['free_spaces'] == '1') ? true : false : false); ?>>1</option>
                                        <option value="2" <?php echo set_select('free_spaces',  '2', ($edit != false) ? ($route_data['free_spaces'] == '2') ? true : false : false); ?>>2</option>
                                        <option value="3" <?php echo set_select('free_spaces',  '3', ($edit != false) ? ($route_data['free_spaces'] == '3') ? true : false : false); ?>>3</option>
                                        <option value="4" <?php echo set_select('free_spaces',  '4', ($edit != false) ? ($route_data['free_spaces'] == '4') ? true : false : false); ?>>4</option>
                                        <option value="5" <?php echo set_select('free_spaces',  '5', ($edit != false) ? ($route_data['free_spaces'] == '5') ? true : false : false); ?>>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row g-mb-25">

                                <div class="col-md-4 div-input-group">
                                    <select class="form-control" id="baggages" name="baggages" required>
                                        <option value=""><?php echo _l('post_ad_baggage'); ?></option>
                                        <option value="petite taille" <?php echo set_select('baggages',  'petite taille', ($edit != false) ? ($route_data['baggages'] == 'petite taille') ? true : false : false); ?>>petite taille</option>
                                        <option value="moyenne taille" <?php echo set_select('baggages',  'moyenne taille', ($edit != false) ? ($route_data['baggages'] == 'moyenne taille') ? true : false : false); ?>>moyenne taille</option>
                                        <option value="grande taille" <?php echo set_select('baggages',  'grande taille', ($edit != false) ? ($route_data['baggages'] == 'grande taille') ? true : false : false); ?>>grande taille</option>
                                    </select>
                                </div>

                                <div class="col-md-4 div-input-group">
                                    <select class="form-control" id="max-detour" name="max_detour" required>
                                        <option value=""><?php echo _l('post_ad_max_detour'); ?></option>
                                        <option value="aucun détour" <?php echo set_select('max_detour',  'aucun détour', ($edit != false) ? ($route_data['max_detour'] == 'aucun détour') ? true : false : false); ?>>aucun détour</option>
                                        <option value="15 minutes" <?php echo set_select('max_detour',  '15 minutes', ($edit != false) ? ($route_data['max_detour'] == '15 minutes') ? true : false : false); ?>>15 minutes</option>
                                        <option value="30 minutes" <?php echo set_select('max_detour',  '30 minutes', ($edit != false) ? ($route_data['max_detour'] == '30 minutes') ? true : false : false); ?>>30 minutes</option>
                                        <option value="45 minutes" <?php echo set_select('max_detour',  '45 minutes', ($edit != false) ? ($route_data['max_detour'] == '45 minutes') ? true : false : false); ?>>45 minutes</option>
                                    </select>
                                </div>

                                <div class="col-md-4 div-input-group">
                                    <select class="form-control" id="sch-flex" name="sch_flex" required>
                                        <option value=""><?php echo _l('post_ad_sch_flex'); ?></option>
                                        <option value="Pile a l'heure" <?php echo set_select('sch_flex',  "Pile a l'heure", ($edit != false) ? ($route_data['sch_flex'] == "Pile a l'heure") ? true : false : false); ?>>Pile a l'heure</option>
                                        <option value="15 minutes" <?php echo set_select('sch_flex',  "15 minutes", ($edit != false) ? ($route_data['sch_flex'] == "15 minutes") ? true : false : false); ?>>15 minutes</option>
                                        <option value="30 minutes" <?php echo set_select('sch_flex',  "30 minutes", ($edit != false) ? ($route_data['sch_flex'] == "30 minutes") ? true : false : false); ?>>30 minutes</option>
                                        <option value="45 minutes" <?php echo set_select('sch_flex',  "45 minutes", ($edit != false) ? ($route_data['sch_flex'] == "45 minutes") ? true : false : false); ?>>45 minutes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row g-mb-25">
                                <div class="col-md-4 div-input-group">
                                    <select class="form-control" id="acceptance" name="acceptance" required>
                                        <option value=""><?php echo _l('post_ad_acceptance'); ?></option>
                                        <option value="moins de 1h" <?php echo set_select('acceptance',  "moins de 1h", ($edit != false) ? ($route_data['acceptance'] == "moins de 1h") ? true : false : false); ?>>moins de 1h</option>
                                        <option value="moins de 3h" <?php echo set_select('acceptance',  "moins de 3h", ($edit != false) ? ($route_data['acceptance'] == "moins de 3h") ? true : false : false); ?>>moins de 3h</option>
                                        <option value="moins de 6h" <?php echo set_select('acceptance',  "moins de 6h", ($edit != false) ? ($route_data['acceptance'] == "moins de 6h") ? true : false : false); ?>>moins de 6h</option>
                                        <option value="moins de 12h" <?php echo set_select('acceptance',  "moins de 12h", ($edit != false) ? ($route_data['acceptance'] == "moins de 12h") ? true : false : false); ?>>moins de 12h</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="u-input-group-v2 div-input-group">
                                <textarea id="message" class="form-control rounded-0 u-form-control g-resize-none div-input-group"
                                          name="travel_description" rows="4" required><?php echo ($edit != false) ? $route_data['travel_description'] : ''; ?></textarea>
                                    <label for="message"><?php echo _l('post_ad_travel_desc'); ?></label>
                                </div>
                            </div>
                        </div>
                        <!-- End Column Sizing -->

                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">

                            <div class="form-group row g-mb-25">
                                <label for="disabledTextInput"><?php echo _l('post_ad_price_heading'); ?>
                                    <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                       <!-- <i class="icon-communication-011 u-line-icon-pro"></i>-->
                      </span>
                                </label>

                                <div class="form-group row mb-0">

                                    <div class="col-md-12">
                                        <!-- Quantity -->
                                        <div class="form-group g-mb-20 div-input-group">
                                            <label class="g-mb-10"></label>
                                            <div class="js-quantity input-group u-quantity-v1 w-100 g-brd-gray-light-v3 g-brd-primary--focus div-input-group">
                                                <input class="js-result form-control text-center g-font-size-16  g-pa-10-16  g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                       type="number" placeholder="<?php echo _l('post_ad_price_field'); ?>" id="travel-charges"
                                                       name="travel_charges" required value="<?php echo set_value('travel_charges',  ($edit != false) ? $route_data['travel_charges'] : '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Options -->
                            <div class="row">
                                <!-- Visa Card -->
                                <div class="col-md-8">
                                    <label class="u-check w-100 g-mb-25">
                                        <strong class="d-block g-color-gray-dark-v2 g-font-weight-700 g-mb-10"><?php echo _l('post_ad_cash_icon'); ?></strong>
                                        <input class="g-hidden-xs-up g-pos-abs g-top-10 g-right-10" type="radio" name="payment_method" data-toggle="tooltip" data-placement="top" title="Tooltip on top" <?php echo ($edit != false) ? ($route_data['payment_method'] == "cash") ? 'checked="checked"' : "" : 'checked="checked"'; ?> value="cash">

                                        <div class="g-brd-primary--checked g-bg-primary-opacity-0_2--checked g-brd-around g-brd-gray-light-v2 g-rounded-5">
                                            <div class="media g-pa-12">
                                                <div class="media-body align-self-center g-color-black">
                                                    <i class="fa fa-money g-font-size-30 align-self-center mx-auto"></i>
                                                </div>

                                                <div class="d-flex align-self-center g-width-20 g-ml-15">
                                                    <div class="u-check-icon-radio-v5 g-pos-rel g-width-20 g-height-20"><i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <!-- End Visa Card -->

                                <!-- Paypal -->
                                <div class="col-md-8">
                                    <label class="u-check w-100 g-mb-25">
                                        <strong class="d-block g-color-gray-dark-v2 g-font-weight-700 g-mb-10">Paypal</strong>
                                        <input class="g-hidden-xs-up g-pos-abs g-top-10 g-right-10" type="radio" name="payment_method" value="paypal" <?php echo ($edit != false) ? ($route_data['payment_method'] == "paypal") ? 'checked="checked"' : "" : ""; ?>>

                                        <div class="g-brd-primary--checked g-bg-primary-opacity-0_2--checked g-brd-around g-brd-gray-light-v2 g-rounded-5">
                                            <div class="media g-pa-12">
                                                <div class="media-body align-self-center g-color-darkblue">
                                                    <i class="fa fa-paypal g-font-size-30 align-self-center mx-auto"></i>
                                                </div>

                                                <div class="d-flex align-self-center g-width-20 g-ml-15">
                                                    <div class="u-check-icon-radio-v5 g-pos-rel g-width-20 g-height-20"><i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <!-- End Paypal -->
                            </div>
                            <!-- End Payment Options -->

                            <!-- End Column Sizing -->
                    </article>
                    <?php
                    if($edit != false){
                        ?>
                        <input type="hidden" name="edit_check" value="1">
                        <input type="hidden" name="edit_check_id" value="<?php echo $route_data['route_id']; ?>">
                    <?php
                    }
                    ?>
                    <input type="hidden" name="check_login" id="check_login" value="<?php echo (!isset($_SESSION['User_LoginId'])) ? 'not_login' : $_SESSION['User_LoginId']; ?>">
                    <button class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12"
                            id="route_btn" name="route_from" type="button" ><?php echo _l('post_ad_publish_btn'); ?>
                    </button>
                </form>
            </div>

            <!-- End Content -->

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="u-shadow-v11 rounded g-pa-30">
                    <!-- Content Header -->
                    <div class="media g-mb-20">
                        <div class="d-flex align-self-center g-mt-3 g-mr-15">
                            <img class="g-width-40 g-height-40" src="<?php echo base_url(); ?>assets/img/bg/trajet.png" alt="Image Description">
                        </div>
                        <div class="media-body">
                  <span class="d-block">
                      <a class="u-link-v5 g-font-size-18 g-color-gray-dark-v1 g-color-primary--hover" href="#"><?php echo _l('post_ad_heading_itinerary'); ?></a>
                   </span>
                            <!--<span class="js-rating d-inline-block small g-color-primary g-mr-15" data-rating="4.5"></span>
                            <span class="g-color-gray-dark-v5">4713 Reviews</span>-->
                        </div>
                    </div>
                    <!-- End Content Header -->

                    <!-- Google Map -->
                    <div id="map"></div>
                    <!-- End Google Map -->

                    <div id="route-detail-box" style="display: none;">
                        <hr class="g-brd-gray-light-v4">
                        <!-- Route Details -->
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-baseline g-mb-12">
                                <i class="icon-cursor g-color-gray-dark-v5 g-mr-10"></i>
                                <span id="route-directions"></span>
                            </li>
                            <li class="d-flex align-items-baseline g-mb-10">
                                <i class="et-icon-map g-color-gray-dark-v5 g-mr-10"></i>
                                <span id="route-dist-time"></span>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <!-- Sidebar -->
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
<script>
	//Validation of Form
	$(document).on('click', '#route_btn', function(event){
		if($('#check_login').val() == 'not_login'){
			swal("Warning!", 'Please Login First', "warning");
			return false;
		}else{
			var req_input = $('#route_from input[required]');
			var req_select = $('#route_from select[required]');
			var req_textarea = $('#route_from textarea[required]');
			var is_valid = true;
			var input_types_1 = ['text', 'tel', 'time', 'number'];

			$.each(req_input, function(k, input){
					var error_msg_id = $(this).attr('id')+'_error_msg';
					$('#'+error_msg_id).remove();
					if(input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == ''){
						$(this).parent('.div-input-group').after('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
						is_valid = false;
                        if($(this).attr('id') == 'datepickerTo' && ($('#round-trip-checkbox').is(':checked') == false)){
                            $('#'+error_msg_id).remove();
                            is_valid = true;
                        }
					}
				});
				$.each(req_select, function(k, input){
					var error_msg_id = $(this).attr('id')+'_error_msg';
					$('#'+error_msg_id).remove();
					if($(this).val() == ''){
						$(this).parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
						is_valid = false;
					}
				});

				$.each(req_textarea, function(k, input){
					var error_msg_id = $(this).attr('id')+'_error_msg';
					$('#'+error_msg_id).remove();
					if($(this).val() == ''){
						$(this).parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
						is_valid = false;
					}
				});

			if(is_valid){
				$('#route_from')[0].submit();
			}
		}
	});

    <?php
    if($edit != false){
        ?>
    window.onload = function() {
        calculateRoute($("#origin-input").val(), $("#destination-input").val());
    };
    <?php
    }
    ?>
</script>

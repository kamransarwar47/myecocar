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
          <strong>Pas connecté!</strong> Veuillez vous <strong>connecter / vous inscrire</strong> pour poster une annonce.
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
                <p>Corrigez ces erreurs avant de soumettre le formulaire.</p>
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
                          <a class="u-link-v5 g-font-size-18 g-color-gray-dark-v1 g-color-primary--hover" href="#">Publier une annonce</a>
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Content Header -->

                        <hr class="g-brd-gray-light-v4">

                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">

                            <div class="form-group g-mb-25">
                                <label for="disabledTextInput">D’où partez-vous ?
                                    <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                        <i class="icon-communication-011 u-line-icon-pro"></i>
                      </span>
                                </label>
                                <input type="text" id="origin-input" name="origin_input"
                                       class="form-control form-control-md g-font-size-default g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                       type="text" placeholder="Adresse de départ">
                                <input type="hidden" id="origin-city" name="origin_city">
                                <input type="hidden" id="origin-country" name="origin_country">
                            </div>

                            <div class="form-group g-mb-25">
                                <label for="disabledTextInput">Où allez-vous ?
                                    <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                        <i class="icon-communication-011 u-line-icon-pro"></i>
                      </span>
                                </label>
                                <input type="text" id="destination-input" name="destination_input"
                                       class="form-control form-control-md g-font-size-default g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                       type="text" placeholder="Adresse d'Arrivée">
                                <input type="hidden" id="dest-city" name="dest_city">
                                <input type="hidden" id="dest-country" name="dest_country">
                            </div>
                        </div>
                        <hr class="g-brd-gray-light-v4">

                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="disabledTextInput" class="pull-left">Horaire
                                    </label>
                                    <label class="form-check-inline u-check g-pl-25 pull-right">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox"
                                               checked=""
                                               id="round-trip-checkbox" name="round_trip_checkbox">
                                        <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon=""></i>
                                        </div>
                                        aller-retour
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="g-mb-10"></label>

                                <div class="row" style="margin-bottom: 15px;">
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus">
                                            <input id="datepickerFrom" name="datepickerFrom"
                                                   class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="text" placeholder="Date de départ" data-range="true"
                                                   data-to="datepickerTo">
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus">
                                            <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="time" value="00:00:00" id="depart-time-input"
                                                   name="depart_time_input">
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                </div>

                                <div class="row" id="date-retour-box">
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus">
                                            <input id="datepickerTo" name="datepickerTo"
                                                   class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="text" placeholder="Date de retour">

                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Datepicker -->
                                        <div class="input-group g-brd-primary--focus">
                                            <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                   type="time" value="00:00:00" id="arrival-time-input"
                                                   name="arrival_time_input">
                                        </div>
                                        <!-- End Datepicker -->
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="g-brd-gray-light-v4">

                        <!-- Column Sizing -->
                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">
                            <label for="disabledTextInput">Information sur vehicule
                                <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                       <!-- <i class="icon-communication-011 u-line-icon-pro"></i> -->
                      </span>
                            </label>
                            <div class="form-group row g-mb-25">

                                <div class="col-md-4">
                                    <input id="vehicle-model-make" name="vehicle_model_make"
                                           class="form-control form-control-md g-font-size-default g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                           type="text" placeholder="Marque et modèle">
                                </div>

                                <div class="col-md-4">
                                    <select class="form-control" id="fuel-type" name="fuel_type">
                                        <option value="">Carburant</option>
                                        <option value="Disiel">Disiel</option>
                                        <option value="Essence">Essence</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select class="form-control" id="free-spaces" name="free_spaces">
                                        <option value="">Places libres</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row g-mb-25">

                                <div class="col-md-4">
                                    <select class="form-control" id="baggages" name="baggages">
                                        <option value="">Bagages</option>
                                        <option value="petite taille">petite taille</option>
                                        <option value="moyenne taille">moyenne taille</option>
                                        <option value="grande taille">grande taille</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select class="form-control" id="max-detour" name="max_detour">
                                        <option value="">Détour maximum</option>
                                        <option value="aucun détour">aucun détour</option>
                                        <option value="15 minutes">15 minutes</option>
                                        <option value="30 minutes">30 minutes</option>
                                        <option value="45 minutes">45 minutes</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select class="form-control" id="sch-flex" name="sch_flex">
                                        <option value="">Flexibilité Horaire</option>
                                        <option value="Pile a l'heure">Pile a l'heure</option>
                                        <option value="15 minutes">15 minutes</option>
                                        <option value="30 minutes">30 minutes</option>
                                        <option value="45 minutes">45 minutes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row g-mb-25">
                                <div class="col-md-4">
                                    <select class="form-control" id="acceptance" name="acceptance">
                                        <option value="">Acceptation</option>
                                        <option value="moins de 1h">moins de 1h</option>
                                        <option value="moins de 3h">moins de 3h</option>
                                        <option value="moins de 6h">moins de 6h</option>
                                        <option value="moins de 12h">moins de 12h</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="u-input-group-v2">
                                <textarea id="message" class="form-control rounded-0 u-form-control g-resize-none"
                                          name="travel_description" rows="4"></textarea>
                                    <label for="message">Description du trajet</label>
                                </div>
                            </div>
                        </div>
                        <!-- End Column Sizing -->

                        <div class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" style="background:#afcb0838">

                            <div class="form-group row g-mb-25">
                                <label for="disabledTextInput">Quel prix pour votre trajet ?
                                    <span class="u-icon-v1 g-color-primary g-mr-15 g-mb-15">
                       <!-- <i class="icon-communication-011 u-line-icon-pro"></i>-->
                      </span>
                                </label>

                                <div class="form-group row mb-0">

                                    <div class="col-md-12">
                                        <!-- Quantity -->
                                        <div class="form-group g-mb-20">
                                            <label class="g-mb-10"></label>
                                            <div class="js-quantity input-group u-quantity-v1 w-100 g-brd-gray-light-v3 g-brd-primary--focus">
                                                <input class="js-result form-control text-center g-font-size-16  g-pa-10-16  g-color-gray-dark-v4 g-placeholder-gray-dark-v3 border-0 g-rounded-right-50 g-rounded-left-50  g-px-20"
                                                       type="text" placeholder="entrer le montant" id="travel-charges"
                                                       name="travel_charges">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Column Sizing -->
                    </article>
                    <button class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12"
                            name="submit" type="submit" <?php echo (!isset($_SESSION['User_LoginId'])) ? 'disabled="disabled"' : ''; ?>>Publier
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
                      <a class="u-link-v5 g-font-size-18 g-color-gray-dark-v1 g-color-primary--hover" href="#">Votre itinéraire</a>
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

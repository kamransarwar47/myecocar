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
          <strong>Pas connecté!</strong> Veuillez vous <strong>connecter / vous inscrire</strong> accepter une offre.
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
                                                    places restantes</strong></span>
                                        </li>
                                        <li class="d-flex align-items-center g-mb-12">
                                            <select class="form-control" name="places_booked">
                                                <option value="">Siège de livre</option>
                                                <?php
                                                for ($i = 1; $i <= $remaining_place; $i++) {
                                                    ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?> Siège</option>
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
                                            <span class="d-block"><strong>Pas de place restante</strong></span>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <input type="hidden" name="amount_per_seat"
                                       value="<?php echo $search_data['travel_charges']; ?>">
                                <button class="btn btn-xl btn-block u-btn-primary text-uppercase g-font-weight-600 g-font-size-12"
                                        name="submit"
                                        type="submit" <?php echo (!isset($_SESSION['User_LoginId'])) ? 'disabled="disabled"' : ''; ?>>
                                    Acceptez
                                </button>

                            </div>
                        </div>
                    </form>
                    <!-- End Content Header -->

                    <hr class="g-brd-gray-light-v4">

                    <div class="col-lg g-mb-30 g-mb-0--lg">
                        <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Détail de l'offre</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="media g-mb-10">
                      <span class="d-block g-color-gray-dark-v5 g-width-110">
                          <i class="icon-calendar g-pos-rel g-top-1 g-mr-5"></i> Date - heure:
                        </span>
                                <span class="media-body"><?php echo date('d M, Y', strtotime($search_data['datepickerFrom'])); ?>
                                    - <?php echo date('H:i', strtotime($search_data['depart_time_input'])); ?></span>
                            </li>
                            <li class="media">
                      <span class="d-block g-color-gray-dark-v5 g-width-110">
                          <i class="icon-wallet g-pos-rel g-top-1 g-mr-5"></i> Prix:
                        </span>
                                <span class="u-label g-bg-cyan g-rounded-20 g-px-10">&euro; <?php echo $search_data['travel_charges']; ?>
                                    par place</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg g-mb-30 g-mt-30 g-mb-0--lg">
                        <h3 class="h5 g-color-gray-dark-v1 g-mb-10">Détail du véhicule</h3>
                        <ul class="list-unstyled g-mb-12 g-mb-0--md">
                            <li class="d-flex align-items-center g-mb-12">
                                <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                <span class="d-block">Véhicule: <?php echo $search_data['vehicle_model_make']; ?></span>
                            </li>
                            <li class="d-flex align-items-center g-mb-12">
                                <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                <span class="d-block">Carburant: <?php echo $search_data['fuel_type']; ?></span>
                            </li>
                            <li class="d-flex align-items-center g-mb-12">
                                <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                <span class="d-block">Bagages: <?php echo $search_data['baggages']; ?></span>
                            </li>
                            <li class="d-flex align-items-center g-mb-12">
                                <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                <span class="d-block">Détour maximum: <?php echo $search_data['max_detour']; ?></span>
                            </li>
                            <li class="d-flex align-items-center g-mb-12">
                                <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                <span class="d-block">Flexibilité Horaire: <?php echo $search_data['sch_flex']; ?></span>
                            </li>
                            <li class="d-flex align-items-center g-mb-12">
                                <i class="icon-check d-block g-color-primary g-mr-8"></i>
                                <span class="d-block">Acceptation : <?php echo $search_data['acceptance']; ?></span>
                            </li>
                        </ul>
                        <h3 class="h5 g-color-gray-dark-v1 g-mb-10 g-mt-30">Description du trajet</h3>
                        <p><?php echo $search_data['travel_description']; ?></p>
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

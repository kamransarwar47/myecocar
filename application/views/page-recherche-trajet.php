
    <!-- Page Title -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading" data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
      <!-- Parallax Image -->
      <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-white-gradient-opacity-v3--after" style="height: 130%; background-image: url(assets/img/bg/covoiturage-995x310.jpg);"></div>
      <!-- End Parallax Image -->

      <div class="container text-center g-py-100--md g-py-80">
        <h2 class="h1 text-uppercase g-font-weight-300 g-mb-30">Recherchez votre trajet</h2>

        <!-- Search Form -->
        <form method="get" class="g-width-60x--md mx-auto" autocomplete="off">
          <div class="form-group g-mb-20">
            <div class="input-group u-shadow-v21 rounded g-mb-15">
               <input class="form-control form-control-md g-brd-white g-font-size-16 border-right-0 pr-0 g-py-15" type="text" placeholder="Ville de départ?" id="search_departure_city" name="dc" value="<?php echo (isset($_GET['dc'])) ? $_GET['dc'] : ''; ?>">
               <input class="form-control form-control-md g-brd-white g-font-size-16 border-right-0 pr-0 g-py-15" type="text" placeholder="Ville d'arrivée?" id="search_arrival_city" name="ac" value="<?php echo (isset($_GET['ac'])) ? $_GET['ac'] : ''; ?>">
               <input id="datepickerDepartureResearch" class="form-control form-control-md u-datepicker-v1 g-brd-white" placeholder="Date de départ?" type="text" name="dt" value="<?php echo (isset($_GET['dt'])) ? $_GET['dt'] : ''; ?>">
              <div class="input-group-addon d-flex align-items-center g-bg-white g-brd-white g-color-gray-light-v1 g-pa-2">
                <button class="btn u-btn-primary g-font-size-16 g-py-15 g-px-20" type="submit">
                  <i class="icon-magnifier g-pos-rel g-top-1"></i>
                </button>
              </div>
            </div>
            <small class="form-text g-opacity-0_8 g-font-size-default">Entrez vos villes de départ et de destination, votre date de voyage et choisissez les conducteurs qui vous conviennent. Si vous voulez des précisions sur un trajet, vous pouvez dialoguer avec le conducteur.</small>
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
              <h3 class="h6 text-uppercase g-mb-10 g-mb--lg">Environ <span class="g-color-gray-dark-v1">384,907</span> résultats</h3>
            </div>
            <!-- End Search Info -->

            <!-- Search Result -->
          <div class="row">
              <div class="col-lg-6 g-mb-30">
                <!-- Search Result -->
                <article class="g-pa-25 u-shadow-v11 rounded">
                  <h2 class="h4 g-mb-15">
                      <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">Paris <i class="icon-arrow-right-circle"> Toulouse</i></a>
                    </h2>
                   

                  <!-- Search Info -->
                  <ul class="list-inline d-flex justify-content-between g-mb-20">
                    <li class="list-inline-item g-mr-10">
                      <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="assets/img/bg/img7.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">John pika</a>
                    </li>
                  </ul>
                  <!-- End Search Info -->  
                  <!-- Search Info -->
                  <ul class="list-inline d-flex justify-content-between g-mb-20">
                    <li class="list-inline-item">
                      <i class="icon-calendar g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i> Samedi 16 Février 2019 à 08h30
                    </li> 
                  </ul>

                  <!-- Search Info -->
                  <ul class="list-inline d-flex justify-content-between g-mb-20">
                    <li class="list-inline-item">
                      <i class="icon-location-pin g-pos-rel g-top-1 g-color-primary g-mr-5"></i> 127 Avenue André Ampère Résidence Les Fauvettes Bat.C Toulon France
                    </li> 
                  </ul>
                  <!-- End Search Info -->

                  <!-- Search Info -->
                  <ul class="list-inline d-flex justify-content-between g-mb-20">
                    <li class="list-inline-item">
                      <i class="icon-location-pin g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i>  27 Rue Anatole France Grenoble France
                    </li> 
                  </ul>
                  <!-- End Search Info -->
                  <div class="g-mb-15">
                    <span class="js-rating g-color-primary mr-2" data-rating="5"><div class="g-rating" style="display: inline-block; position: relative; z-index: 1; white-space: nowrap; margin-left: -2px; margin-right: -2px;"><div class="g-rating-forward" style="position: absolute; left: 0px; top: 0px; height: 100%; overflow: hidden; width: 100%;"><i class="fa fa-star" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star" style="margin-left: 2px; margin-right: 2px;"></i></div><div class="g-rating-backward" style="position: relative; z-index: 1;"><i class="fa fa-star-o" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star-o" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star-o" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star-o" style="margin-left: 2px; margin-right: 2px;"></i><i class="fa fa-star-o" style="margin-left: 2px; margin-right: 2px;"></i></div></div></span>
                    <span class="g-color-gray-dark-v5">Avis</span>
                  </div>

                  <!-- Share, Print and More -->
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="#!">
                        <i class="icon-check g-pos-rel g-top-1 g-mr-5"></i> Véhicule: Polo Volsvagein
                      </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="#!">
                        <i class="icon-check g-pos-rel g-top-1 g-mr-5"></i> 3 places restantes
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <div class="dropdown g-mb-10 g-mb-0--md">
                        <span class="d-block g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-check g-pos-rel g-top-1"></i> Acceptation : moins de 1h
                          </span>
                      </div>
                    </li>
                  </ul>
                  <!-- End Share, Print and More -->
                </article>
                <!-- End Search Result -->
              </div>
            </div>
            <!-- End Search Result -->

            <hr class="g-brd-gray-light-v4 g-my-40">

            <!-- Pagination -->
            <nav class="g-mb-50" aria-label="Page Navigation">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-13" href="#!" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-left"></i>
                    </span>
                    <span class="sr-only">Précédente</span>
                  </a>
                </li>
                <li class="list-inline-item g-hidden-sm-down">
                  <a class="u-pagination-v1__item u-pagination-v1-5 u-pagination-v1-5--active rounded g-pa-4-11" href="#!">1</a>
                </li>
                <li class="list-inline-item g-hidden-sm-down">
                  <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-11" href="#!">2</a>
                </li>
                <li class="list-inline-item g-hidden-sm-down">
                  <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-11" href="#!">3</a>
                </li>
                <li class="list-inline-item g-hidden-sm-down">
                  <span class="g-pa-4-11">...</span>
                </li>
                <li class="list-inline-item g-hidden-sm-down">
                  <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-11" href="#!">80</a>
                </li>
                <li class="list-inline-item">
                  <a class="u-pagination-v1__item u-pagination-v1-5 rounded g-pa-4-13" href="#!" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-right"></i>
                    </span>
                    <span class="sr-only">Suivante</span>
                  </a>
                </li>
                <li class="list-inline-item float-right">
                  <span class="u-pagination-v1__item-info g-pa-4-11">Page 1 sur 80</span>
                </li>
              </ul>
            </nav>
            <!-- End Pagination -->
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
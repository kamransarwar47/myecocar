
<?php include 'header.php'; ?>
    <!-- Page Title -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading" data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'>
      <!-- Parallax Image -->
      <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-white-gradient-opacity-v3--after" style="height: 130%; background-image: url(assets/img/bg/covoiturage-995x310.jpg);"></div>
      <!-- End Parallax Image -->

      <div class="container text-center g-py-100--md g-py-80">
        <h2 class="h1 text-uppercase g-font-weight-300 g-mb-30">Recherchez votre trajet</h2>

        <!-- Search Form -->
        <form class="g-width-60x--md mx-auto">
          <div class="form-group g-mb-20">
            <div class="input-group u-shadow-v21 rounded g-mb-15">
               <input class="form-control form-control-md g-brd-white g-font-size-16 border-right-0 pr-0 g-py-15" type="text" placeholder="Ville de départ?">
               <input class="form-control form-control-md g-brd-white g-font-size-16 border-right-0 pr-0 g-py-15" type="text" placeholder="Ville d'arrivée?">
               <input id="datepickerDefault" class="form-control form-control-md u-datepicker-v1 g-brd-white" placeholder="Date de départ?" type="text">
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
          <!-- Sidebar -->
          <div class="col-lg-3 g-pr-40--lg g-mb-50 g-mb-0--lg">
            <!-- Categories -->
            <h2 class="h5 text-uppercase g-color-gray-dark-v1">Horaire</h2>
            <hr class="g-brd-gray-light-v4 g-my-15">
            <ul class="list-unstyled g-mb-40">
              <li class="my-3">
                 <div class="form-group g-mb-25">
                   <label for="disabledTextInput">A partir de
                      <span class="u-icon-v1 g-color-primary g-mr-15 ">
                        <i class="fa fa-clock-o u-line-icon-pro"></i>
                      </span>
                   </label>
                   <select class="form-control rounded-0">
                        <option value="0" selected="">00h</option>
                        <option value="1">01h</option>
                        <option value="2">02h</option>
                        <option value="3">03h</option>
                        <option value="4">04h</option>
                        <option value="5">05h</option>
                        <option value="6">06h</option>
                        <option value="7">07h</option>
                        <option value="8">08h</option>
                        <option value="9">09h</option>
                        <option value="10">10h</option>
                        <option value="11">11h</option>
                        <option value="12">12h</option>
                        <option value="13">13h</option>
                        <option value="14">14h</option>
                        <option value="15">15h</option>
                        <option value="16">16h</option>
                        <option value="17">17h</option>
                        <option value="18">18h</option>
                        <option value="19">19h</option>
                        <option value="20">20h</option>
                        <option value="21">21h</option>
                        <option value="22">22h</option>
                        <option value="23">23h</option>
                  </select>
               </div>
              </li>
              <li class="my-3">
                 <div class="form-group g-mb-25">
                   <label for="disabledTextInput">Jusqu'à
                      <span class="u-icon-v1 g-color-primary g-mr-15 ">
                        <i class="fa fa-clock-o u-line-icon-pro"></i>
                      </span>
                   </label>
                   <select class="form-control rounded-0">
                        <option value="1">01h</option>
                        <option value="2">02h</option>
                        <option value="3">03h</option>
                        <option value="4">04h</option>
                        <option value="5">05h</option>
                        <option value="6">06h</option>
                        <option value="7">07h</option>
                        <option value="8">08h</option>
                        <option value="9">09h</option>
                        <option value="10">10h</option>
                        <option value="11">11h</option>
                        <option value="12">12h</option>
                        <option value="13">13h</option>
                        <option value="14">14h</option>
                        <option value="15">15h</option>
                        <option value="16">16h</option>
                        <option value="17">17h</option>
                        <option value="18">18h</option>
                        <option value="19">19h</option>
                        <option value="20">20h</option>
                        <option value="21">21h</option>
                        <option value="22">22h</option>
                        <option value="23" selected="">23h</option>
                  </select>
               </div>
              </li>
             
            </ul>
            <!-- End Categories -->

            <!-- Sort By -->
            <h2 class="h5 text-uppercase g-color-gray-dark-v1">Prix</h2>
            <hr class="g-brd-gray-light-v4 g-my-15">
            <div class="btn-group justified-content g-mb-40">
              <label class="u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio" checked>
                <span class="btn btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">Meilleurs</span>
              </label>
              <label class="u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio">
                <span class="btn btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">Moyens</span>
              </label>
               <label class="u-check">
                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio">
                <span class="btn btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">Elevé</span>
              </label>
            </div>
            <!-- End Sort By -->



            <!-- Result Types -->
            <h2 class="h5 text-uppercase g-color-gray-dark-v1">Temps de réponse</h2>
            <hr class="g-brd-gray-light-v4 g-my-15">
            <form>

               <!-- Checkbox -->
              <div class="form-group g-mb-10">
              <label class="u-check g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup2_1" type="radio" checked="">
                      <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                      </div>
                      Tous
                    </label>
              </div>
              <!-- End Checkbox -->
              <!-- Checkbox -->
              <div class="form-group g-mb-10">
                <label class="u-check g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup2_1" type="radio">
                      <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                      </div>
                      immédiat
                    </label>
              </div>
              <!-- End Checkbox -->

              <!-- Checkbox -->
              <div class="form-group g-mb-10">
                <label class="u-check g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup2_1" type="radio">
                      <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                      </div>
                      Moins de 1h
                    </label>
              </div>
              <!-- End Checkbox -->

              <!-- Checkbox -->
              <div class="form-group g-mb-10">
<label class="u-check g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup2_1" type="radio">
                      <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                      </div>
                      Moins de 3h
                    </label>
              </div>
              <!-- End Checkbox -->

              <!-- Checkbox -->
              <div class="form-group g-mb-10">
                
                <label class="u-check g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup2_1" type="radio">
                      <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                      </div>
                      Moins de 6h
                    </label>
                
              </div>
              <!-- End Checkbox -->

              <!-- Checkbox -->
              <div class="form-group g-mb-10">
                <label class="u-check g-pl-25">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup2_1" type="radio">
                      <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                      </div>
                      Moins de 12h
                    </label>
              </div>
              <!-- End Checkbox -->

             
            </form>
            <!-- End Result Types -->
          </div>
          <!-- End Sidebar -->

          <!-- Search Results -->
          <div class="col-lg-9">
            <!-- Search Info -->
             <div class="card border-0">
                  <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
                    <h3 class="h6 mb-0">
                        <i class="icon-directions g-pos-rel g-top-1 g-mr-5"></i> Options
                      </h3>
                    <div class="dropdown g-mb-10 g-mb-0--md">
                      <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-options-vertical g-pos-rel g-top-1"></i>
                        </span>
                      <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Trier par Date
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Trier par Prix
                        </a>
                        <a class="dropdown-item g-px-10" href="#!">
                          <label class="u-check g-pl-30">
                            <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" checked="">
                            <div class="u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                              <i class="fa" data-check-icon=""></i>
                            </div>
                            Afficher les offres complètes
                          </label>
                        </a>
                       

                      <!--  <a class="dropdown-item g-px-10" href="#!">
                          <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                        </a> -->
                      </div>
                    </div>
                  </div>
            <div class="d-md-flex justify-content-between g-mb-30">
              <h3 class="h6 text-uppercase g-mb-10 g-mb--lg">Environ <span class="g-color-gray-dark-v1">384,907</span> résultats</h3>

             <!-- <ul class="list-inline">
                <li class="list-inline-item g-mr-30">
                  <a class="u-link-v5 g-color-gray-dark-v5 g-color-gray-dark-v5--hover" href="#!">
                    <i class="icon-list g-pos-rel g-top-1 g-mr-5"></i> List View
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">
                    <i class="icon-grid g-pos-rel g-top-1 g-mr-5"></i> Grid View
                  </a>
                </li>
              </ul>-->
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
                       <!-- <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-directions g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Report
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-star g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Save
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-question g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Info
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-cloud-download g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Ger More Info
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                          </a>
                        </div>-->
                      </div>
                    </li>
                  </ul>
                  <!-- End Share, Print and More -->
                </article>
                <!-- End Search Result -->
              </div>
              <div class="col-lg-6 g-mb-30">
                <!-- Search Result -->
                <article class="g-pa-25 u-shadow-v11 rounded">
                  <h2 class="h4 g-mb-15">
                      <a class="u-link-v5 g-color-gray-dark-v1 g-color-primary--hover" href="#!">Toulon <i class="icon-arrow-right-circle"> Grenoble</i></a>
                    </h2>
                   

                  <!-- Search Info -->
                  <ul class="list-inline d-flex justify-content-between g-mb-20">
                    <li class="list-inline-item g-mr-10">
                      <img class="g-height-25 g-width-25 rounded-circle g-mr-5" src="assets/img/bg/img4.jpg" alt="Image Description"> <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Nathalie</a>
                    </li>
                  </ul>
                  <!-- End Search Info -->  
                  <!-- Search Info -->
                  <ul class="list-inline d-flex justify-content-between g-mb-20">
                    <li class="list-inline-item">
                      <i class="icon-calendar g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i> Dimanche 17 Février 2019 à 18h30
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
                        <i class="icon-check g-pos-rel g-top-1 g-mr-5"></i> Véhicule: clio Volsvagein
                      </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover" href="#!">
                        <i class="icon-check g-pos-rel g-top-1 g-mr-5"></i> 2 places restantes
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <div class="dropdown g-mb-10 g-mb-0--md">
                        <span class="d-block g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-check g-pos-rel g-top-1"></i> Acceptation : moins de 3h
                          </span>
                       <!-- <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-directions g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Report
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-star g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Save
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-question g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Info
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-cloud-download g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Ger More Info
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                          </a>
                        </div>-->
                      </div>
                    </li>
                  </ul>
                  <!-- End Share, Print and More -->
                </article>
                <!-- End Search Result -->
              </div>
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
                       <!-- <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-directions g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Report
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-star g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Save
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-question g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Info
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-cloud-download g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Ger More Info
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                          </a>
                        </div>-->
                      </div>
                    </li>
                  </ul>
                  <!-- End Share, Print and More -->
                </article>
                <!-- End Search Result -->
              </div>
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
                       <!-- <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-directions g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Report
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-star g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Save
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-question g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Info
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-cloud-download g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Ger More Info
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                          </a>
                        </div>-->
                      </div>
                    </li>
                  </ul>
                  <!-- End Share, Print and More -->
                </article>
                <!-- End Search Result -->
              </div>
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
                       <!-- <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-directions g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Report
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-star g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Save
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-question g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Info
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-cloud-download g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Ger More Info
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                          </a>
                        </div>-->
                      </div>
                    </li>
                  </ul>
                  <!-- End Share, Print and More -->
                </article>
                <!-- End Search Result -->
              </div>
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
                       <!-- <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-directions g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Report
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-star g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Save
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-question g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Info
                          </a>
                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-cloud-download g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Ger More Info
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item g-px-10" href="#!">
                            <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                          </a>
                        </div>-->
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

            <h3 class="h5 g-color-gray-dark-v1 g-mb-20">Trajets proposés</h3>

           <div id="shortcode12">
                <div class="shortcode-html">
                  <div class="row">
                     <article class="w-20 d-sm-table g-bg-gray-light-v5 g-transform-scale-1_05--hover g-transition-0_3">
                          <!-- Article Info -->
                          <div class="text-center text-sm-left g-valign-middle g-brd-right--dashed--sm g-brd-gray-light-v4 g-pa-10">
                           <em class="d-block g-font-style-normal g-font-weight-300 g-mt-minus-5 g-mb-20">à partir de</em>
                            <strong class="g-font-size-36 g-color-primary">18 €</strong>
                            
                            
                          </div>
                          <!-- End Article Info -->

                          <!-- Article Content -->
                          <div class="text-center text-sm-left g-valign-middle g-pa-10">
                            <h4 class="text-uppercase g-color-black g-font-size-default g-font-weight-700">lile vers luxembourg</h4>
                            <p class="mb-0">Meilleurs conditions</p>
                          </div>
                          <!-- End Article Content -->
                        </article>

          
                     <article class="w-20 d-sm-table g-bg-gray-light-v5 g-transform-scale-1_05--hover g-transition-0_3">
                          <!-- Article Info -->
                          <div class="text-center text-sm-left g-valign-middle g-brd-right--dashed--sm g-brd-gray-light-v4 g-pa-10">
                           <em class="d-block g-font-style-normal g-font-weight-300 g-mt-minus-5 g-mb-20">à partir de</em>
                            <strong class="g-font-size-36 g-color-primary">13 €</strong>
                            
                            
                          </div>
                          <!-- End Article Info -->

                          <!-- Article Content -->
                          <div class="text-center text-sm-left g-valign-middle g-pa-10">
                            <h4 class="text-uppercase g-color-black g-font-size-default g-font-weight-700">paris vers belford</h4>
                            <p class="mb-0">Meilleurs conditions</p>
                          </div>
                          <!-- End Article Content -->
                        </article>
        
                     <article class="w-20 d-sm-table g-bg-gray-light-v5 g-transform-scale-1_05--hover g-transition-0_3">
                          <!-- Article Info -->
                          <div class="text-center text-sm-left g-valign-middle g-brd-right--dashed--sm g-brd-gray-light-v4 g-pa-10">
                           <em class="d-block g-font-style-normal g-font-weight-300 g-mt-minus-5 g-mb-20">à partir de</em>
                            <strong class="g-font-size-36 g-color-primary">40 €</strong>
                            
                            
                          </div>
                          <!-- End Article Info -->

                          <!-- Article Content -->
                          <div class="text-center text-sm-left g-valign-middle g-pa-10">
                            <h4 class="text-uppercase g-color-black g-font-size-default g-font-weight-700">Bordeaux vers toulouse</h4>
                            <p class="mb-0">Meilleurs conditions</p>
                          </div>
                          <!-- End Article Content -->
                        </article>
                        
          
                    
                   </div>
              </div>
            </div>
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

<?php include 'footer.php'; ?>

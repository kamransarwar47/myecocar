<!-- jQuery UI Core -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/widget.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/version.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/keycode.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/position.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/unique-id.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/safe-active-element.js"></script>

<!-- JS Global Compulsory -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.easing/js/jquery.easing.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/offcanvas.js"></script>

<!-- JS Implementing Plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.filer/js/jquery.filer.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/gmaps/gmaps.min.js"></script>

<!-- jQuery UI Core -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.core.min.js"></script>


<!-- jQuery UI Helpers -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>

<!-- jQuery UI Widgets -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/widgets/autocomplete.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery-ui/ui/widgets/slider.js"></script>

<!-- JS Unify -->
<script src="<?php echo base_url(); ?>assets/js/hs.core.js"></script>


<script src="<?php echo base_url(); ?>assets/js/components/hs.header.js"></script>
<script src="<?php echo base_url(); ?>assets/js/helpers/hs.hamburgers.js"></script>

<script src="<?php echo base_url(); ?>assets/js/helpers/hs.rating.js"></script>
<script src="<?php echo base_url(); ?>assets/js/helpers/hs.not-empty-state.js"></script>
<script src="<?php echo base_url(); ?>assets/js/helpers/hs.focus-state.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.file-attachement.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.slider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.masked-input.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.count-qty.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.autocomplete.js"></script>

<script src="<?php echo base_url(); ?>assets/js/components/hs.autocomplete-local-search.js"></script>
<script src="<?php echo base_url(); ?>assets/style-switcher/vendor/cookiejs/jquery.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/helpers/hs.shortcode-filter.js"></script>

<script src="<?php echo base_url(); ?>assets/js/components/hs.go-to.js"></script>

<!-- Show / Copy Code -->
<script src="<?php echo base_url(); ?>assets/vendor/prism/prism.core.min.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/custombox/custombox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/clipboard/dist/clipboard.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/components/hs.scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.modal-window.js"></script>
<script src="<?php echo base_url(); ?>assets/js/helpers/hs.modal-markup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.markup-copy.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/hs.tabs.js"></script>
<script src="<?php echo base_url(); ?>assets/js/components/gmap/hs.map.js"></script>

<script>
    $(document).on('ready', function () {
        $.HSCore.helpers.HSModalMarkup.init('.js-modal-markup');

        $.HSCore.components.HSMarkupCopy.init('.js-copy');
    });
</script>
<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of forms
        $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
        $.HSCore.helpers.HSRating.init();
        $.HSCore.helpers.HSFocusState.init();
        $.HSCore.helpers.HSNotEmptyState.init();
        $.HSCore.components.HSDatepicker.init('#datepickerFrom, #datepickerDefault, #datepickerDepartureResearch');
        $.HSCore.components.HSSlider.init('#regularSlider, #regularSlider2, #regularSlider3, #rangeSlider, #rangeSlider2, #rangeSlider3, #stepSlider, #stepSlider2, #stepSlider3');
        $.HSCore.components.HSMaskedInput.init('[data-mask]');
        $.HSCore.components.HSCountQty.init('.js-quantity');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });

    $(window).on('load', function () {
        // initialization of autocomplet
        $.HSCore.components.HSLocalSearchAutocomplete.init('#autocomplete1');

        // initialization of autocomplet
        $.HSCore.components.HSAutocomplete.init('#autocomplete2');

        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });
    });
</script>
<script>
    $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });

    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });
</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=APIKEY&libraries=places&callback=initMap"
    async defer></script>

    <script>
        // initialization of google map
        var map;
    function initMap() {
        initAutocomplete();
        map = new google.maps.Map(document.getElementById('map'), {
            mapTypeControl: false,
            streetViewControl: false,
            center: {lat: 46.2276, lng: 2.2137},
            zoom: 5
        });

        new AutocompleteDirectionsHandler(map);
    }

    /**
     * @constructor
     */

    function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');

        var originAutocomplete = new google.maps.places.Autocomplete(originInput);
        // Specify just the place data fields that you need.
        originAutocomplete.setFields(['place_id', 'address_components']);

        var destinationAutocomplete =
            new google.maps.places.Autocomplete(destinationInput);
        // Specify just the place data fields that you need.
        destinationAutocomplete.setFields(['place_id', 'address_components']);

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
    }

    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (autocomplete, mode) {
        var me = this;

        autocomplete.bindTo('bounds', this.map);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            // Get each component of the address from the place details
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                var val = place.address_components[i]['long_name'];
                if (mode === 'ORIG') {
                    if (addressType == 'locality') {
                        document.getElementById('origin-city').value = val;
                    }
                    if (addressType == 'country') {
                        document.getElementById('origin-country').value = val;
                    }
                } else {
                    if (addressType == 'locality') {
                        document.getElementById('dest-city').value = val;
                    }
                    if (addressType == 'country') {
                        document.getElementById('dest-country').value = val;
                    }
                }
            }
            if (!place.place_id) {
                window.alert('Please select an option from the dropdown list.');
                return;
            }
            if (mode === 'ORIG') {
                me.originPlaceId = place.place_id;
            } else {
                me.destinationPlaceId = place.place_id;
            }
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.route = function () {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }

        var me = this;

        this.directionsService.route(
            {
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: this.travelMode
            },
            function (response, status) {
                if (status === 'OK') {
                    clearDisplayObj();
                    var point = response.routes[0].legs[0];
                    $('div#route-detail-box').css('display', 'block');
                    $('span#route-directions').html(point.start_address + ' <i class="fa fa-arrow-circle-right"></i> ' + point.end_address);
                    $('span#route-dist-time').html('Estimated travel time: ' + point.duration.text + ' (' + point.distance.text + ')');
                    me.directionsDisplay.setDirections(response);
                } else {
                    $('div#route-detail-box').css('display', 'none');
                    window.alert('Directions request failed due to ' + status);
                }
            });
    };

</script>
<script>
    $(document).ready(function () {
        // Round trip checkbox
        $('input#round-trip-checkbox').on('click',function () {
            if (this.checked) {
                $('div#date-retour-box').css('display', 'flex');
            } else {
                $('div#date-retour-box').css('display', 'none');
            }
        });
    });
</script>
<script>
    // search page form
    var search_departure_city, search_arrival_city;

    function initAutocomplete() {
        search_departure_city = new google.maps.places.Autocomplete(
            document.getElementById('search_departure_city'), {types: ['(cities)']});
        search_departure_city.setFields('address_components');
        search_departure_city.addListener('place_changed', fillInAddressDeparture);

        search_arrival_city = new google.maps.places.Autocomplete(
            document.getElementById('search_arrival_city'), {types: ['(cities)']});
        search_arrival_city.setFields('address_components');
        search_arrival_city.addListener('place_changed', fillInAddressArrival);
    }

    function fillInAddressDeparture() {
        // Get the place details from the autocomplete object.
        var place = search_departure_city.getPlace();
        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            var val = place.address_components[i]['long_name'];
            if (addressType == 'locality') {
                document.getElementById('search_d_city').value = val;
            }
            if (addressType == 'country') {
                document.getElementById('search_d_country').value = val;
            }
        }
    }

    function fillInAddressArrival() {
        // Get the place details from the autocomplete object.
        var place = search_arrival_city.getPlace();
        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            var val = place.address_components[i]['long_name'];
            if (addressType == 'locality') {
                document.getElementById('search_a_city').value = val;
            }
            if (addressType == 'country') {
                document.getElementById('search_a_country').value = val;
            }
        }
    }
</script>

<script>
    var displayObj;
    function calculateRoute(from, to) {
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
            origin: from,
            destination: to,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(
            directionsRequest,
            function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    displayObj = new google.maps.DirectionsRenderer({
                        map: map,
                        directions: response
                    });
                    var point = response.routes[0].legs[0];
                    $('div#route-detail-box').css('display', 'block');
                    $('span#route-directions').html(point.start_address + ' <i class="fa fa-arrow-circle-right"></i> ' + point.end_address);
                    $('span#route-dist-time').html('Estimated travel time: ' + point.duration.text + ' (' + point.distance.text + ')');
                }
                else {
                    $('div#route-detail-box').css('display', 'none');
                    window.alert('Directions request failed due to ' + status);
                }
            }
        );
    }

    function clearDisplayObj(){
        if(displayObj != null){
            displayObj.setMap(null);
        }
    }
</script>
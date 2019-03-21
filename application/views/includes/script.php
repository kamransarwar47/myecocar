
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
  <script src="assets/js/hs.core.js"></script>


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


  <!-- JS Custom -->
  <script src="assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
      // initialization of forms
      $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
      $.HSCore.helpers.HSRating.init();
      $.HSCore.helpers.HSFocusState.init();
      $.HSCore.helpers.HSNotEmptyState.init();
      $.HSCore.components.HSDatepicker.init('#datepickerDefault, #datepickerInline, #datepickerInlineFrom, #datepickerFrom');
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
    // initialization of google map
      function initMap() {
        $.HSCore.components.HSGMap.init('.js-g-map');
      }


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
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAhHUpUqyneq9dHxqa3nk7fQGbQhz9Qea8&amp;callback=initMap" async defer></script>

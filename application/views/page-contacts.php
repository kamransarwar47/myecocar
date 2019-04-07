 <!-- Promo Block -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
      <!-- Parallax Image -->
      <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-size-cover g-bg-pos-top-center g-bg-black-opacity-0_2--after" style="height: 140%; background-image: url(assets/img-temp/1920x800/img6.jpg);"></div>
      <!-- End Parallax Image -->

      <!-- Promo Block Content -->
      <div class="container g-color-white text-center g-pt-150 g-pb-200">
        <h3 class="h2 g-font-weight-300 mb-0">Vous êtes venus au bon endroit</h3>
        <h2 class="g-font-weight-700 g-font-size-80 text-uppercase">CONTACTEZ NOUS</h2>
      </div>
      <!-- Promo Block Content -->
    </section>
    <!-- End Promo Block -->

    <!-- Contact Form -->
    <section class="container">
      <!-- Icon Blocks -->
      <div class="row no-gutters u-shadow-v21 g-mt-minus-100">
        <div class="col-sm-6 col-md-4 g-brd-right--md g-brd-gray-light-v4">
          <!-- Icon Blocks -->
          <div class="g-bg-white text-center g-py-100">
            <span class="u-icon-v1 u-icon-size--xl g-color-primary mb-3">
                <i class="icon-real-estate-027 u-line-icon-pro"></i>
              </span>
            <h4 class="h5 g-font-weight-600 g-mb-5">adresse</h4>
            <span class="d-block">61 xxxxxx xxx., xxxxxx, 3xxxxG</span>
          </div>
          <!-- End Icon Blocks -->
        </div>

        <div class="col-sm-6 col-md-4 g-hidden-xs-down g-brd-right--md g-brd-gray-light-v4">
          <!-- Icon Blocks -->
          <div class="g-bg-white text-center g-py-100">
            <span class="u-icon-v1 u-icon-size--xl g-color-primary mb-3">
                <i class="icon-communication-062 u-line-icon-pro"></i>
              </span>
            <h4 class="h5 g-font-weight-600 g-mb-5">Numéro de téléphone</h4>
            <span class="d-block">1-000-000-0000</span>
          </div>
          <!-- End Icon Blocks -->
        </div>

        <div class="col-sm-6 col-md-4 g-hidden-sm-down">
          <!-- Icon Blocks -->
          <div class="g-bg-white text-center g-py-100">
            <span class="u-icon-v1 u-icon-size--xl g-color-primary mb-3">
                <i class="icon-electronics-005 u-line-icon-pro"></i>
              </span>
            <h4 class="h5 g-font-weight-600 g-mb-5">Email</h4>
            <span class="d-block">mail@myecocar.com</span>
          </div>
          <!-- End Icon Blocks -->
        </div>
      </div>
      <!-- End Icon Blocks -->

      <div class="g-py-100">
        <div class="row justify-content-center">
          <div class="col-lg-9">
		  <?php
				echo $this->session->flashdata('message');
				echo validation_errors();
			?>
            <h3 class="g-color-black g-font-weight-600 text-center mb-5">Qui êtes-vous et comment pouvons-nous vous aider?</h3>
            <form method="post" action="<?php echo base_url('contact_us'); ?>" id="contactus_form">
              <div class="row">
                <div class="col-md-6 form-group g-mb-20 div-input-group">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Nom</label>
                  <input name="name" id="name" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="text" placeholder="nom & prénom" required>
                </div>

                <div class="col-md-6 form-group g-mb-20 div-input-group">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Email</label>
                  <input name="email" id="email" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="email" placeholder="exemple@gmail.com" required>
                </div>

                <div class="col-md-6 form-group g-mb-20 div-input-group">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Sujet</label>
                  <input name="subject" id="subject" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="text" placeholder="Retour d'information" required>
                </div>

                <div class="col-md-12 form-group g-mb-40 div-input-group">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Message</label>
                  <textarea name="descriptions" id="descriptions" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-resize-none rounded-3 g-py-13 g-px-15" rows="7" placeholder="Salut, je voudrais ..." required></textarea>
                </div>
              </div>          

			  <div class="col-md-12 form-group g-mb-40 div-input-group">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Captcha</label>
                  <?php 
				  
					  $options = array();
					  $options['input_name']             = 'ct_captcha'; // change name of input element for form post
					  $options['disable_flash_fallback'] = false; // allow flash fallback

					  if (!empty($_SESSION['ctform']['captcha_error'])) {
						// error html to show in captcha output
						$options['error_html'] = $_SESSION['ctform']['captcha_error'];
					  }

					  echo "<div id='captcha_container_1'>\n";
					  echo Securimage::getCaptchaHtml($options);
					  echo "\n</div>\n";
				  ?>
                </div>
             
              <div class="text-center">
                <button id="send_contactus_email" class="btn u-btn-primary g-font-weight-600 g-font-size-13 text-uppercase g-rounded-25 g-py-15 g-px-30" type="button" role="button">Envoyer une demande</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Form -->

    <hr class="g-brd-gray-light-v4 my-0">

    <a class="js-go-to u-go-to-v1" href="#" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
  </main>
  <script> 
  $(function(){
	  $('#captcha_code').attr('required', 'required');
  });
	//Validation of Form
	$(document).on('click', '#send_contactus_email', function(e){
		var req_input = $('#contactus_form input[required]');
		var is_valid = true;
		var input_types_1 = ['text', 'tel', 'number', 'password']; 
		var input_types_4 = ['email']; 
		var req_textarea = $('#contactus_form textarea[required]');
		
		$.each(req_input, function(k, input){
			var error_msg_id = $(this).attr('id')+'_error_msg';
			$('#'+error_msg_id).remove();
			if(input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == ''){
				console.log($(this).attr('id'));
				if($(this).attr('id') != 'captcha_code'){
					$(this).parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				}else{
					$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				}
				is_valid = false;
			}else if(input_types_4.indexOf($(this).attr('type')) != -1){
				var email = $(this).val();
				if(email !== ''){
				    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					var valid_email =  regex.test($(this).val());
					if(!valid_email){
						$(this).parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">Please enter the valid email address</p>');
						is_valid = false;
					}
				}else{
					$(this).parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
					is_valid = false;
				}
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
			$('#contactus_form').submit();
		}
	});
</script>
  
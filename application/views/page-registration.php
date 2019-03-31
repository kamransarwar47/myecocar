    <!-- Login & Signup -->
    <section class="u-bg-overlay g-bg-pos-top-center g-bg-img-hero g-bg-black-opacity-0_3--after g-py-150" style="background-image: url(assets/img/bg/slideshow_wp_01.jpg);">
      <div class="container u-bg-overlay__inner">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-8">
            <!-- Heading -->
            <h1 class="g-color-white text-uppercase mb-4">Connectez-vous ou créez un compte</h1>
            <div class="d-inline-block g-width-35 g-height-2 g-bg-white mb-4"></div>
            <p class="lead g-color-white">L'auto-stoppeur est un individu qui cherche à se faire rouler sans pour autant en être de sa poche.</p>
            <!-- End Heading -->
          </div>
        </div>
		<div class="row justify-content-center align-items-center no-gutters">
			<div class="col-lg-5 g-bg-white g-rounded-right-5--lg-up">
            <div class="g-pa-50">
			<?php 
				echo $this->session->flashdata('message'); 
				echo validation_errors();
			?>
              <!-- Form -->
              <form autocomplete="off" class="g-py-15" action="<?php echo base_url('registration'); ?>" method="post" id="sigup_from">
                <h2 class="h3 g-color-black mb-4">Inscrvez-vous</h2>
                <p class="mb-4">inscrivez-vous &amp; cherchez votre propre trajet, profitez du covoiturage ! </p>

                <div class="mb-4 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-user u-line-icon-pro"></i>
                        </span>
                    <input name="first_name" id="first_name"  class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="text" placeholder="Votre nom" required>
                  </div>
                </div>              
				<div class="mb-4 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-user u-line-icon-pro"></i>
                        </span>
                    <input name="second_name" id="second_name" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="text" placeholder="nom de famille" required>
                  </div>
                </div>			
	
				<div class="mb-4 div-input-group">
                  <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-2">
                    <input value="male" id="reg_gender_1" name="reg_gender" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 reg_gender" type="radio" required>
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon="&#xf00c"></i>
                    </div>
                     Male
                  </label>
				  
				   <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-2">
                    <input value="female" id="reg_gender_2" name="reg_gender" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 reg_gender" type="radio" required>
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon="&#xf00c"></i>
                    </div>
                     Female
                  </label>
                </div>

				<div class="mb-4 div-input-group">
                  <div class="input-group rounded">
				    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-calendar u-line-icon-pro"></i>
                        </span>
                <input name="date_of_birth" id="datepickerDefault" placeholder="DOB" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="text" required>
				</div>
              </div>
                <div class="mb-4 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-phone u-line-icon-pro"></i>
                        </span>
                    <input name="mobile" id="mobile" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="tel" placeholder="Mobile" required>
                  </div>
                </div>    
				<div class="mb-4 div-input-group">
					<button type="button" id="send_verification_code" class="form-control">Sent Verification Code</button>
				</div>
                <div class="mb-4 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-communication-062 u-line-icon-pro"></i>
                        </span>
                    <input name="reg_email" id="reg_email" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="email" placeholder="Votre email" required>
                  </div>
                </div>

                <div class="mb-4 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-media-094 u-line-icon-pro"></i>
                        </span>
                    <input name="password" id="password" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="password" placeholder="Mot de passe" required>
                  </div>
                </div>
				<div class="mb-4 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
                          <i class="icon-media-094 u-line-icon-pro"></i>
                        </span>
                    <input name="confirm_password" id="confirm_password" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="password" placeholder="Confirmez le mot de passe" required>
                  </div>
                </div>

                <div class="mb-1 div-input-group">
                  <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-2">
                    <input name="term_conditions" id="term_conditions" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" required>
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon="&#xf00c"></i>
                    </div>
                     J'accepte les <a href="#">Termes et les Conditions</a>
                  </label>
                </div>

                <div class="mb-3 div-input-group">
                  <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-2">
                    <input name="subscribe_newletter" id="subscribe_newletter" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox">
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon="&#xf00c"></i>
                    </div>
                    Abonnez-vous à notre newsletter
                  </label>
                </div>

                <button type="button" id="sigup_save_btn" name="sigup_save_btn" class="btn btn-md btn-block u-btn-primary rounded text-uppercase g-py-13" type="button">Se connecter</button>
              </form>
              <!-- End Form -->
            </div>
          </div>
       </div>
       </div>
    </section>
    <!-- End Login & Signup -->
<script> 
	//Validation of Form
	$(document).on('click', '#sigup_save_btn', function(e){
		var req_input = $('#sigup_from input[required]');
		var is_valid = true;
		var input_types_1 = ['text', 'tel', 'number', 'password']; 
		var input_types_2 = ['checkbox']; 
		var input_types_3 = ['radio']; 
		var input_types_4 = ['email']; 
		$.each(req_input, function(k, input){
			var error_msg_id = $(this).attr('id')+'_error_msg';
			$('#'+error_msg_id).remove();
			if(input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == ''){
				$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				is_valid = false;
			}else if(input_types_2.indexOf($(this).attr('type')) != -1 && $(this).attr('checked') !== "checked"
){	
				$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				is_valid = false;
				
			}else if(input_types_3.indexOf($(this).attr('type')) != -1){
				$('#reg_gender_1_error_msg').remove();
				if($('#reg_gender_1').attr("checked") !== 'checked' && $('#reg_gender_2').attr("checked") !== 'checked'){
					$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
					is_valid = false;
				}else{
					$('#reg_gender_1_error_msg').remove();
					$('#reg_gender_2_error_msg').remove();
				}
		
			}else if(input_types_4.indexOf($(this).attr('type')) != -1){
				var email = $(this).val();
				if(email !== ''){
				    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					var valid_email =  regex.test($(this).val());
					if(!valid_email){
						$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">Please enter the valid email address</p>');
						is_valid = false;
					}
				}else{
					$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
					is_valid = false;
				}
			}
		});	
		//confirm password
		var password = $('#password').val();
		var confirm_password = $('#confirm_password').val();
		if( password !== '' && confirm_password !== ''){
			if(password.length >= 8 ){
				if(password !== confirm_password){
					$('#confirm_password').parent().parent('.div-input-group').append('<p id="confirm_password_error_msg" class="" style="color:red">Your Confirm password does not Match</p>');
					is_valid = false;
				}
			}else{
				$('#confirm_password').parent().parent('.div-input-group').append('<p id="confirm_password_error_msg" class="" style="color:red">Password Length should be Greater then or Equal to 8</p>');
					is_valid = false;
			}			
		}
		if(is_valid){
			$('#sigup_from').submit();
		}
	});
	
	$('#send_verification_code').click(function(){
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
						$('#verification_code_group').remove();
						$('#mobile').parent().parent('.div-input-group').after('<div id="verification_code_group" class="mb-4 div-input-group"> <div class="input-group rounded"> <span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5"> <i class="icon-flag u-line-icon-pro"></i> </span> <input name="mobile_verification_code" id="mobile_verification_code" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="tel" placeholder="Verification Code" required> </div></div>');
						swal("Successfully Send!", responce.msg, "success");
					}
                }
            });
	});
</script>
<!-- heading_message -->
<section class="u-bg-overlay g-bg-pos-top-center g-bg-img-hero g-bg-black-opacity-0_3--after g-py-150" style="background-image: url(assets/img/bg/slideshow_wp_01.jpg);">
    <div class="container u-bg-overlay__inner">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-8">
            <!-- Forget Password -->
			<div class="row justify-content-center align-items-center no-gutters">
				<div class="col-lg-12 g-bg-white g-rounded-right-5--lg-up">
					<div class="g-pa-50">
						<?php 
							echo $this->session->flashdata('message'); 
							echo validation_errors();
						?>
						<form autocomplete="off" class="g-py-15" action="<?php echo base_url('login/change_password'); ?>" method="post" id="change_password_form">
							<h2 class="h3 g-color-black mb-4">Change Password</h2>
							<input type="hidden" value="<?php echo  isset($_GET['code']) ? $_GET['code'] : ''; ?>" name="code">
							<input type="hidden" value="<?php echo isset($_GET['u_id']) ? $_GET['u_id'] : ''; ?>" name="u_id">
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
							 <button type="button" id="change_password" name="change_password" class="btn btn-md btn-block u-btn-primary rounded text-uppercase g-py-13" type="button">Send Email</button>
						</form>
					</div>
			    </div>
			</div>
			<!-- Forget Password -->
        </div>
	</div>
  </div>
</section>
<script>
	$(document).on('click', '#change_password', function(e){
		var is_valid = true;
		var req_input = $('#change_password_form input[required]');
		var input_types_1 = ['password']; 
		$.each(req_input, function(k, input){
			var error_msg_id = $(this).attr('id')+'_error_msg';
			$('#'+error_msg_id).remove();
			if(input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == ''){
				$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				is_valid = false;
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
			$('#change_password_form').submit();
		}
	});
</script>


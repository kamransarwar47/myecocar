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
						<form autocomplete="off" class="g-py-15" action="<?php echo base_url('login/forget_password'); ?>" method="post" id="forget_password">
							<h2 class="h3 g-color-black mb-4">Forget Password</h2>
							<div class="mb-4 div-input-group">
							  <div class="input-group rounded">
								<span class="input-group-addon g-width-45 g-brd-gray-light-v4 g-color-gray-dark-v5">
									  <i class="icon-communication-062 u-line-icon-pro"></i>
									</span>
								<input name="verification_email" id="verification_email" class="form-control g-color-black g-brd-left-none g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-13" type="email" placeholder="Votre email" required>
							  </div>
							</div>
							 <button type="button" id="recover_password" name="recover_password" class="btn btn-md btn-block u-btn-primary rounded text-uppercase g-py-13" type="button">Send Email</button>
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
	$(document).on('click', '#recover_password', function(e){
		var req_input = $('#forget_password input[required]');
		var is_valid = true;
		var input_types_4 = ['email']; 
		$.each(req_input, function(k, input){
			var error_msg_id = $(this).attr('id')+'_error_msg';
			$('#'+error_msg_id).remove();
			if(input_types_4.indexOf($(this).attr('type')) != -1){
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
		
		if(is_valid){
			$('#forget_password').submit();
		}
	});
</script>


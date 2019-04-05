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
          <div class="col-lg-5 g-bg-teal g-rounded-left-5--lg-up">
            <div class="g-pa-50">
			<?php 
				echo validation_errors();
				echo $this->session->flashdata('message'); 
			?>
              <!-- Form -->
              <form class="g-py-15" method="post" id="login_form" action="<?php echo base_url('login'); ?>">
                <h2 class="h3 g-color-white mb-4">Se connecter</h2>
                <div class="mb-4 div-input-group">
                  <div class="input-group">
                    <span class="input-group-addon g-width-45 g-brd-white g-color-white">
                        <i class="icon-finance-067 u-line-icon-pro"></i>
                      </span>
                    <input name="user_email" id="user_email" class="form-control g-color-black g-brd-left-none g-brd-white g-bg-transparent g-color-white g-placeholder-white g-pl-0 g-pr-15 g-py-13" type="email" placeholder="nom d'utilisateur" required>
                  </div>
                </div>

                <div class="g-mb-40 div-input-group">
                  <div class="input-group rounded">
                    <span class="input-group-addon g-width-45 g-brd-white g-color-white">
                           <i class="icon-media-094 u-line-icon-pro"></i>
                        </span>
                    <input name="user_password" id="user_password" class="form-control g-color-black g-brd-left-none g-brd-white g-bg-transparent g-color-white g-placeholder-white g-pl-0 g-pr-15 g-py-13" type="password" placeholder="mot de passe" required>
                  </div>
                </div>
               <div class="g-mb-40">
                    <a href="<?php echo base_url('login/forget_password'); ?>" class="g-color-white mb-4">Forget Password</a>
                </div>
                <div class="g-mb-60">
                  <button id="login_btn" class="btn btn-md btn-block u-btn-primary rounded text-uppercase g-py-13" type="button">Connexion</button>
                </div>

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
	$(document).on('click', '#login_btn', function(e){
		var req_input = $('#login_form input[required]');
		var is_valid = true;
		var input_types_1 = ['password']; 
		var input_types_4 = ['email']; 
		$.each(req_input, function(k, input){
			var error_msg_id = $(this).attr('id')+'_error_msg';
			$('#'+error_msg_id).remove();
			if(input_types_1.indexOf($(this).attr('type')) != -1 && $(this).val() == ''){
				$(this).parent().parent('.div-input-group').append('<p id="'+error_msg_id+'" class="" style="color:red">This Field is required</p>');
				is_valid = false;
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

		if(is_valid){
			$('#login_form').submit();
		}
	});
</script>
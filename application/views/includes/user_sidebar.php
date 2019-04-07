<!-- Profile Sidebar -->
          <div class="col-lg-2 g-mb-50 g-mb-0--lg">
            <!-- User Image -->
            <div class="u-block-hover g-pos-rel">
              <figure>
			  <?php
				$user_image_name = 'no-image.jpg';
				$img_res = $this->common_model->get('users', ['user_id' => $this->session->userdata('User_LoginId')], 'user_profile_img');
				if($img_res->num_rows() > 0 && $img_res->row()->user_profile_img != ''){
					$user_image_name = $img_res->row()->user_profile_img;
				}
			  ?>
                <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="<?php echo base_url(); ?>assets/uploads/<?php echo $user_image_name; ?>" alt="Image Description">
              </figure>
            </div>
            <!-- User Image -->
          </div>
          <!-- End Profile Sidebar -->
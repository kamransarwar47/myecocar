 <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
	 <!-- momentJS date library -->
    <script src="<?php echo base_url(); ?>bower_components/moment/min/moment.min.js"></script>

	
	<!-- common functions -->
    <script src="<?php echo base_url(); ?>assets/js/admin/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url(); ?>assets/js/admin/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url(); ?>assets/js/admin/altair_admin_common.min.js"></script>    
	<!-- sweetalert -->
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>


    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>
<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<html lang="en">
<?php $this->load->view('includes/head'); ?>
<body>
  <main>
	<?php $this->load->view('includes/header'); ?>
	<?php echo $content; ?>
  </main>
  <div class="u-outer-spaces-helper"></div>
<?php $this->load->view('includes/footer'); ?>
<?php $this->load->view('includes/script'); ?>
</body>
</html>
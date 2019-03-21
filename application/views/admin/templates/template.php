<!doctype html>
<html lang="en"> 
<?php $this->load->view('admin/includes/head.php'); ?>
<body class="sidebar_main_open">
	<?php $this->load->view('admin/includes/header.php'); ?>
	<?php $this->load->view('admin/includes/aside.php'); ?>
    <div id="page_content">
        <div id="page_content_inner">
			<?php echo $content; ?>
        </div>
    </div>
	<?php $this->load->view('admin/includes/script.php'); ?>
</body>
</html>
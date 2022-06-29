<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>College Management System</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"/>
	<script src="<?php echo base_url('assets/js/jquery-3.1.0.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<style type="text/css">
		.buttons{
			color: #2196f3;
			border: 1px solid #cabdbd;
			border-radius: 5px;
			padding: 2px 10px 2px 10px;
		}
	</style>
	
	
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">College Management System</a>
			</div>
			<div  style="margin-top: 15px;" id="bs-example-navbar-collapse-2">
			
			
				<ul style="dropdown-menu">
				<?php
					echo $user_id = $this->session->userdata('user_id');
				?>
				<?php if( $user_id == '7' ):?>
					<li style="color:white"><a style="color:white" class="dropdown-item"<?php echo anchor("Admin/dashboard",  'Dashboard');?></a></li>
					<li style="color:white"><a style="color:white" class="dropdown-item"<?php echo anchor("Admin/coadmins", 'View Co Admins');?></a></li>
					<li style="color:white"><a style="color:white" class="dropdown-item"<?php echo anchor("Welcome/logout", 'Logout');?></a></li>
					<?php else:?>
					<li><a class="dropdown-item"<?php echo anchor("Welcome/logout", 'Logout');?></a></li>
					<?php endif;?>
				</ul>
			</div>
		</div>
	</div>
</nav>


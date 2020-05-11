<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets\css\bootstrap.min.css'); ?>">
	<script src="<?php echo base_url('assets\js\jquery-3.1.0.js'); ?>"> </script>
	<script src="<?php echo base_url('assets\js\bootstrap.min.js'); ?>"> </script>
	<script src="<?php echo base_url('assets\js\modal.js'); ?>"> </script>
	<script src="<?php echo base_url('assets\js\tableDataSort.js'); ?>"> </script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/mystyle.css'); ?>">

</head>

<body>
	<header class="container-fluid">
		<h1>CAPABANK</h1>
		<div class="df">
		<span class=""><?php if (isset($uname)) echo 'Hola '. strtoupper($uname); ?></span>	<a href="<?php echo base_url('web/SessionController/logout'); ?>" class="icon-block"><i class="material-icons">
		power_settings_new
		</i></a>
		</div>
	
	</header>
<html>
<head>
	<title>Dashboard | Monita Loker</title>
	<link rel="icon" type="text/css" href="<?= base_url('assets/img/koala-svg.svg'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/icons.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="<?= base_url('assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css');?>" rel="stylesheet" media="screen">

</head>
<body style="background-color:#f3f3f3"  >
<!-- Sidebar -->
	<div class="sidebar fixed-top h-100 text-white" id="nav">
		<ul class="nav flex-column" >
			<li class="mt-2">
				<center>	
					<span class="top" ><b>Daun Biru<br>Engineering</b></font></span>
				</center>
			</li>
			<li>
				<h5 class="text-uppercase">Monita Loker </h5>
			</li>	

			<!-- Navigation -->
			<small>Getting Started</small>
			<li class="nav-item mt-1">
				<a href="<?= base_url('Sistem/dashboard'); ?>" class="nav-link active ">
				<i class="ti ti-home pr-1"></i> Dashboard </a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('Sistem/lain'); ?>" class="nav-link ">
				<i class="fa fa-fw fa-sign-out "></i> Logout </a>
			</li>
		</ul>
	</div>	

	<div class="navbar float-right">
		<span><?= $header ?></span>
	</div>

	<div class="content">
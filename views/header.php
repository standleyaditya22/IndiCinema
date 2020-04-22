<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<title>Paper Company</title>
	<style type="text/css">
		@media (min-width: 768px){
			.navbar-brand{
		        position: absolute;
		        left: 50%;
		        transform: translateX(-50%);
			}
		}
	</style>
</head>
<body background="assets/img/background.jpg">

	<?php

	include 'koneksi.php';
	
	?>

	<nav id="topNav" class="navbar fixed-to navbar-expand-md navbar-dark bg-dark">
	    <a class="navbar-brand mx-auto" href="#">Paper Company</a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
	        Menu
	    </button>
	    <div class="navbar-collapse collapse">
	        <ul class="navbar-nav">
	            <li class="nav-item">
	                <a class="nav-link" href="laporan.php">Laporan Pimpinan</a>
	            </li>
	        </ul>
	    </div>
	</nav>
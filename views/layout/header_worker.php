<!DOCTYPE html>
<html>
<head>
	<title>Worker Page</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			background-image: url('<?php echo base_url() ?>assets/img/background3.jpg');
			background-size: cover;
		}
		#menuu {
			background-color: ghostwhite;
			height: 50px;
			margin-top: 20px;
			opacity: 0.9;
		}
		.navLink {
			font-family: 'Lobster', cursive;
			font-size: 20px;
			color: black;
		}
		#mainMenu {
			height: 560px;
			width: 1100px;
			background: rgba(255, 255, 255, 0.8);
			opacity: ;
		}
		#amountM {
	      width: 100px;
	      margin-top: 25px;
	      margin-bottom: 25px;
	    }
	    #sel1 {
	    	width: 200px;
	    	margin-bottom: 25px;
	    }
	</style>
</head>
<body>	
	<div class="container-fluid">
		<div class="row" id="menuu">
			<div class="col-sm-5">
				<div style="margin-top: 5px; float: right;">
					<a href="<?php echo site_url('workerHome'); ?>"><text class="navLink" style="margin-right: 60px;">Home</text></a>
					<a href="<?php echo site_url('workerHome/OrderPage'); ?>"><text class="navLink">Order</text></a>
				</div>
			</div>
			<center><div class="col-sm-2">
				<img src="<?php echo base_url() ?>assets/img/worker2.png" style="margin-bottom:20px; background-color: ghostwhite; padding: 10px;" width="125px">
			</div></center>
			<div class="col-sm-5">
				<div style="margin-top: 11px;">
					<a href="<?php echo site_url('workerHome/StockPage'); ?>"><text class="navLink" style="margin-right: 60px;">Stock</text></a>
					<a href="<?php echo site_url('workerHome/ReportPage'); ?>"><text class="navLink">Report</text></a>
					<a href="<?php echo site_url('Welcome'); ?>" style="float:right; "><img src="<?php echo base_url() ?>assets/img/logout.png" width="25px"></a>
				</div>
			</div>
		</div>
	</div>
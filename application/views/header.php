<?php 
$sess=$this->session->userdata('logged_in');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fast Delivery </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/headercss.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/consignorcss.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/formcss.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/footercss.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome-4.4.0/css/font-awesome.css" />
	<script src="<?php echo base_url();?>js/jquery.js" ></script>
	<script src="<?php echo base_url();?>js/jquery-ui.js"></script>
</head>
<body>
	<div class="head-container">
		<div class="row">
			<div class="col-md-2 col-md-offset-1 ">
				<div class="logo"><span class="one">F</span>ast <i class="fa fa-car" style="color:#DB040B;"></i> <span class="one">D</span>elivery</div>
			</div>	
			<div class="col-md-5 text-left " style="margin-top: 14px;">
				<nav>
					<ul>
						<li><a href="<?php echo base_url();?>Consin"><span class="juz">C</span>onsignor</a></li>|
						<li><a href="<?php echo base_url();?>Invoice"><span class="juz">I</span>nvoice</a></li>|
						<li><a href="#"><span class="juz">P</span>roof of Delivery</a></li>|
						<li><a href="#"><span class="juz">E</span>xpenses</a></li>|
						<li><a href="#"><span class="juz">T</span>racking</a></li>
					</ul>	
				</nav>
			</div>
			<div class="col-md-4 text-center" style="margin-top: 14px;">
				<nav>
					<ul>
						<li><span class="font">Welcome : </span><div class="username"><?php  echo $sess['username']; ?></div></li>
						<li><a href="<?php echo base_url();?>Login/logout"><span class="juz">L</span>ogout</a></li>
					</ul>
				</nav>
			</div>
		</div>	
	</div>	
</body>
</html>
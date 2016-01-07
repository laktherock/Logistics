<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/logincss.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome-4.4.0/css/font-awesome.css" />-->
</head>
<body>
	<header style="padding: 28px;">
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<div class="logo"><span class="one">F</span>ast <i class="fa fa-car" style="color:#DB040B;"></i> <span class="one">D</span>elivery</div>
			</div>	
			<div class="col-md-4 text-center">	
				<nav>
					<ul>
						<li><a href="#section2">Our Services</a></li>
					</ul>
				</nav>
			</div>		
			<div class="col-md-2">		
				<div class="tell"><i class="fa fa-phone fa-1x phone"></i>&nbsp9445293444</div>
			</div>	
		</div>	
	</header>
	<section>
		<div class="section1">
		<img src="<?php echo base_url();?>images/truck1.jpeg" width="1502px" height="641px" >
			<div class="login">
				
				<form name="login1" class="form" method="POST">
					<div class="error"><?php echo form_error('username'); ?></div>
					<!--<div class="error"><?php if(empty($error)){ echo $error;} ?></div>-->
					<div class="error1"><?php echo form_error('password'); ?></div>
					    <p>
					        <input type="text" id="login" name="username" placeholder="Username">
					        <input type="password" name="password" id="password" placeholder="Password"> 
					    </p>
					    <button type="submit" name="submit">
					    	
					    <i class="fa fa-arrow-right fa-3x"></i><!--<span class="sign">Sign in</span>-->
					    </button>     
				</form>​​​​
			</div>
		</div>
	</section>
	<section>
		<div id="section2">
			<div class="row">
				<div class="about col-md-12 text-center"><span class="one">O</span>ur <span class="one">S</span>ervices</div>
			</div>	
			<div class="row">
				<div class="col-md-3 text-center">
					<h4 class="cont-head"> Deliver</h4>
					<i class="fa fa-opencart fa-3x phone"></i>
					<p class="content">We Deliver your products at a right time. Without any delay in our services. We are working consistently to achieve our goals</p>
				</div>
				<div class="col-md-3 text-center">
					<h4 class="cont-head "> Maintainence</h4>
					<i class="fa fa-cogs fa-3x phone"></i>
					<p class="content">We Deliver your products at a right time. Without any delay in our services. We are working consistently to achieve our goals</p>
				</div>
				<div class="col-md-3 text-center">
					<h4 class="cont-head"> work </h4>
					<i class="fa fa-hourglass-half fa-3x phone"></i>
					<p class="content">We Deliver your products at a right time. Without any delay in our services. We are working consistently to achieve our goals</p>
				</div>
				<div class="col-md-3 text-center">
					<h4 class="cont-head"> Transport </h4>
					<i class="fa fa-truck fa-3x phone"></i>
					<p class="content">We Deliver your products at a right time. Without any delay in our services. We are working consistently to achieve our goals</p>
				</div>
			</div>	
		</div>	
	</section>
	<footer>
		Copyright and registered to yes yes services
	</footer>
</body>
</html>
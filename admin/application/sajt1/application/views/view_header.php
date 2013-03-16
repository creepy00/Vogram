<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--[if !IE 7]>
	<style type="text/css">
		#wrap {display:table;height:100%}
	</style>
<![endif]-->
	<?php
		echo @$head;
	?>
	<meta charset="utf-8" />
	<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/incl/css/style.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>/incl/css/global.css" type="text/css" />
	<!--[if lte IE 6]><link rel="stylesheet" href="style_ie.css" type="text/css" media="screen, projection" /><![endif]-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/incl/js/jquery.easing.1.3.js"></script>
	<script src="<?php echo base_url(); ?>/incl/js/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: '<?php echo base_url(); ?>/incl/img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>
	
	
</head>

<body onLoad="setFocus();">

<div class="wrapper">

	<header id="header">
		
	<a href="<?php echo site_url("index"); ?>">
		<div id="logo"></div>
	</a>
	<a href="<?php echo site_url("korpa"); ?>">
		<img src="<?php echo base_url(); ?>/incl/images/korpa.jpg" class="korpa" alt="Apoteka 9, korpa" />
		<p class="korpa_tekst">Vaša korpa</p>
		<p class="korpa_tekst2">Proizvoda ( <span id="ukupnakolicina"><?php echo $this->cart->total_items(); ?></span> ) kom.</p>
	</a>
	<?php
	if($this->session->userdata('ulogovan')==1)
		{	
	?>
	
	<a class="prijava" href="<?php echo site_url("login/odjava"); ?>"><div id="tekst_prijava">Odjavite se</div></a>
	<?php 
	}else{
	?>
	
	<a class="prijava" href="<?php echo site_url("login"); ?>"><div id="tekst_prijava">Prijava</div></a>
	<a class="registracija" href="<?php echo site_url("reg"); ?>"><div id="tekst_registracija">Registracija</div></a>
	<?php
	}
	?>
	
	<div id="meni">
		<ul>
		
			<li <?php if($this->uri->uri_string()=="index"){echo "class='aktivan'";} ?> ><?php echo anchor("index","Početna");?></li>
			<li <?php if($this->uri->uri_string()=="index/onama"){echo "class='aktivan'";} ?> ><?php echo anchor("index/onama","O nama");?></li>
			<li <?php if($this->uri->segment(1)=="proizvodi"){echo "class='aktivan'";} ?> ><?php echo anchor("proizvodi","Proizvodi");?></li>
			<li <?php if($this->uri->uri_string()=="index/saradnici"){echo "class='aktivan'";} ?> ><?php echo anchor("index/saradnici","Saradnici");?></li>
			<li <?php if($this->uri->uri_string()=="index/kontakt"){echo "class='aktivan'";} ?> ><?php echo anchor("index/kontakt","Kontakt - Lokacija");?></li>
			<li>
					<form id="search" action="<?php echo site_url('proizvodi/pretraga/0'); ?>" method="post" >
						<input type="text" class="searchbox" placeholder="pretraga..." name="search" value="<?php echo @$search; ?>"/>
						<input type="submit" class="button" value=""/>
					</form>
				
			</li>
		
		</ul>
	</div>
	
	</header><!-- #header-->
<!DOCTYPE html>
<html>
<head>
  <title>Vogram</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="<?php echo base_url('stylesheets/reset.css'); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('stylesheets/stylesheet.css'); ?>" type="text/css" />
  <script type="text/javascript" src="<?php echo base_url('javascript/jquery.js'); ?>"></script>

  <!--[if lt IE 10]> <link rel="stylesheet" href="<?php echo base_url('stylesheets/addonIE8.css') ?>" type="text/css" /><![endif]-->
  <link rel="icon" type="image/png" href="<?php echo base_url('images/favicon.png') ?>" />
</head>
<body>
<div class="container holder">
  <div class="grid_12 site-holder">
    <div class="header">
      <div class="header-items">
        <a href="http://linkedin.com/in/vogram" target="_blank"><img src="<?php echo base_url('images/icon-linked.png') ?>" alt="" /></a>
        <a href="http://twitter.com/vogram" target="_blank"><img src="<?php echo base_url('images/icon-twitter.png') ?>" alt=""/></a>
        <a href="http://youtube.com/user/vogram" target="_blank"><img src="<?php echo base_url('images/icon-yt.png') ?>" alt="" /></a>
        <a href="http://facebook.com/vogram-serbia" target="_blank"><img src="<?php echo base_url('images/icon-fb.png') ?>" alt="" /></a>
        <form class="header-search" action="#">
          <div class="wrapper">
            <button class="search_button" type="submit"><img title="Search" src="<?php echo base_url('images/icon-magnify.png') ?>" alt="Find" /></button>
            <input type="text" placeholder="Pretraga sajta.." name="search" class="search_box">
          </div>
        </form>
        <a href="#"><img src="<?php echo base_url('images/icon-rs.png') ?>" alt="" /></a>
        <a href="#"><img src="<?php echo base_url('images/icon-en.png') ?>" alt="" /></a>
      </div>
    </div>
    <div class="logo-holder">
      <div class="logo">
        <img src="<?php echo base_url('images/logo.png') ?>" alt="Logo" />
      </div>
      <div class="logo-background"></div>
    </div>
    <div class="clear separator"></div>
    <div class="main-holder" id="<?php echo $mirko; ?>">
      <div class="grid_2 left-column">
        <div class="sidebar">
          <ul>
            <li><a href="<?php echo base_url(); ?>">Naslovna</a></li>

            <li class="main-menu" type="o-nama"><a href="#">O nama</a></li>
            <li class="sub-menu o-nama"><a href="<?php echo site_url('o_nama'); ?>">o nama</a></li>
            <li class="sub-menu o-nama"><a href="<?php echo site_url('o_nama/mirko'); ?>">o Mirku</a></li>
            <li class="sub-menu o-nama"><a href="<?php echo site_url('o_nama/press'); ?>">press</a></li>

            <li class="main-menu" type="projekti"><a href="<?php echo site_url('projekti'); ?>">Projekti</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/kultura'); ?>">kultura i umetnost</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/ekologija'); ?>">ekologija</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/edukacija'); ?>">edukacija i seminari</a></li>
            <li class="sub-menu projekti"><a href="<?php echo site_url('projekti/akcije'); ?>">akcije</a></li>

            <li class="main-menu" type="edukacija"><a href="#">Edukacija</a></li>
            <li class="sub-menu edukacija"><a href="#">radionice i seminari</a></li>
            <li class="sub-menu edukacija"><a href="#">edukativni materijali</a></li>

            <li class="main-menu" type="multimedija"><a href="#">Multimedija</a></li>
            <li class="sub-menu multimedija"><a href="#">video</a></li>
            <li class="sub-menu multimedija"><a href="#">audio</a></li>
            <li class="sub-menu multimedija"><a href="#">dizajn</a></li>
            <li class="sub-menu multimedija"><a href="#">murali</a></li>

            <li class="main-menu" type="online-shop"><a href="#">Online shop</a></li>
            <li class="sub-menu online-shop"><a href="#">dizajn i multimedia</a></li>
            <li class="sub-menu online-shop"><a href="#">Vogram moda</a></li>

            <li><a href="#">Partneri</a></li>
            <li><a href="<?php echo site_url('home/kontakti'); ?>">Kontakti</a></li>
          </ul>
        </div>
      </div>
      <script type="text/javascript">
        $("li.main-menu").hover(
            function () {
              var type_name = $(this).attr('type');
              var child = $("li." + type_name+":first");
              if (child.is(":visible")) {

              } else {
                $("li.sub-menu").slideUp('medium');
                $("li."+type_name).slideDown('medium');
              }
            }
        );

      </script>
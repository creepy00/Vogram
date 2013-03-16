<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @$title; ?></title>
<?php echo @$head;?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>incl/css/style2.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>incl/js/clockp.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>incl/js/clockh.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>incl/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>incl/js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='<?php echo base_url(); ?>incl/images2/plus.gif' class='statusicon' />", "<img src='<?php echo base_url(); ?>incl/images2/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>incl/js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>incl/js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>incl/css/niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#">Apoteka Biljana i Luka</a></div>
    
    <div class="right_header"><a href="<?php echo base_url(); ?>../index.php/index" target="_blank">Sajt</a> | <a href="<?php echo site_url('login/odjava'); ?>" class="logout">Odjava</a></div>
    <div id="clock_a"></div>
    </div>
    
    <div class="main_content">
  <br>
	
                   
				   <!--
						Ovde je bio horizontalni meni!
				   -->
                    
                 
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		<div class="sidebar_search">
            <?php 	$attributes = array('name' => 'pretraga');
					echo  form_open('apo/pretraga', $attributes);
			?>
            <input type="text" name="pretraga" class="search_input" value="pretraga" onclick="this.value=''" />
            <input type="image" class="search_submit" src="<?php echo base_url(); ?>/incl/images2/search.png" />
            </form>            
            </div>
    
            <div class="sidebarmenu">
            
                
                <a class="menuitem submenuheader" href="" >Kategorije</a>
                <div class="submenu">
                    <ul>
                    <li><?php echo anchor("apo/unosnovekategorije", "Unos nove kategorije", array("accesskey" => "1")); ?></li>
                    <li><?php echo anchor("apo/unosnoveslike", "Unos slike kategorije", array("accesskey" => "2")); ?></li>
                    <li><?php echo anchor("apo/brisanjeslike", "Brisanje slike kategorije", array("accesskey" => "3")); ?></li>
                    
                    </ul>
                </div>
				<a class="menuitem submenuheader" href="">Proizvodi</a>
                <div class="submenu">
                    <ul>
                    
                    <li><?php echo anchor("apo/unosnovogproizvoda", "Unos novog proizvoda", array("accesskey" => "4")); ?></li>
                    <li><?php echo anchor("apo/proizvodi", "Svi proizvodi", array("accesskey" => "5")); ?></li>
                    <li><?php echo anchor("apo/brisikomentar", "Komentari", array("accesskey" => "6")); ?></li>
                    
                    </ul>
                </div>
				 <a class="menuitem submenuheader" href="" >Administratori</a>
				<div class="submenu">
                    <ul>
                    <li><?php echo anchor("apo/administracija", "Administracija korisnika", array("accesskey" => "8")); ?></li>
                    <li><?php echo anchor("apo/brisanjekorisnika", "Brisanje korisnika", array("accesskey" => "9")); ?></li>
                    
                    </ul>
                </div>
				<a class="menuitem submenuheader" href="" >Narudžbine</a>
				<div class="submenu">
                    <ul>
                    <li><?php echo anchor("narudzbine", "Narudžbine", array("accesskey" => "N")); ?></li>
                    
                    </ul>
                </div>
               
               
            </div>
            
            
            
          
            
        
    
    </div>
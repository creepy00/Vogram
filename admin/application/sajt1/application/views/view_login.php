<div id="content">

<div id="logincontainer">


	
<?php echo form_open('login/provera',array('name'=>'provera'));
	echo @$greska;
?>
		
		<br />
		Korisničko ime:<br />
		<input type="text" name="korime" id="korime" /><br /><br />
		Lozinka:<br />
		<input type="password" name="lozinka" /><br /><br />
		<!--Ostani ulogovan <input type="checkbox" name='ostaniulogovan' />-->
		<br />
		<input type="hidden" value="<?php echo @$_SERVER['HTTP_REFERER']; ?>" name="referer" />
		<input type="submit" value="Prijavite se" name="prijavise"/><br><br>
		<?php //echo anchor("reg/novkorisnik", "Registrujte se", array("accesskey" => "2")); ?>

</div>

</div><div class="push"></div>
</div>
 

<div id="footer">
	<div class="kontakt">Kontakt
	<div id="strelica">
	<img src="<?php echo base_url(); ?>/incl/images/strelica.png" /> Tel: 011/3239-888
	<br />
	<img src="<?php echo base_url(); ?>/incl/images/strelica.png" /> Fax: 021/423-386
	<br />
	<img src="<?php echo base_url(); ?>/incl/images/strelica.png" /> e-pošta: <?php echo mailto('bilukabg@sbb.rs', 'bilukabg@sbb.rs'); ?>
	</div>
	</div>
  <div id="copyright">Copyright © 2012 Sva prava zadržava Apoteka “Biljana i Luka”. Designed by “Best Software Solutions”</div>
</div><!-- #footer-->

</body>
</html>
<div id="content">

<div id="regcontainer">


	
	<h1>Unesite Vaše podatke</h1><br>
	<h2><?php echo @$greska; ?></h2><br>
<?php echo form_open('korpa/placanje', array('name'=>'forma'));?>
	<div id="body">
		Ime:<br />
		<input type="text" name="name" value="<?php echo @$name;?>" id="name" size="50"/><br /><br />
		Prezime:<br />
		<input type="text" name="surname" value="<?php echo @$surname;?>" id="surname" size="50"/><br /><br />
		Adresa:<br />
		<input type="text" name="address" value="<?php echo @$address;?>" id="address" size="50"/><br /><br />
		Mesto:<br />
		<input type="text" name="city" value="<?php echo @$city;?>" id="city" size="50"/><br /><br />
		Poštanski broj:<br />
		<input type="text" name="postal" value="<?php echo @$postal;?>" id="postal" size="50"/><br /><br />
		Broj telefona:<br />
		<input type="text" name="phone" value="<?php echo @$phone;?>" id="phone" size="50"/><br /><br />
		Adresa elektronske pošte:<br />
		<input type="text" name="email" value="<?php echo @$email;?>" size="50"/>
		<span style="color:red;font-weight:bold;">&nbsp;*</span><br /><br /><span style="color:red;font-weight:bold;">*</span>obavezno popuniti<br /><br />proverite ispravnost podataka pre potvrde<br /><br />
		<input type="submit" value="Završite kupovinu" name="registracija"/>

	</div>
</form>
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
</body>
</html>
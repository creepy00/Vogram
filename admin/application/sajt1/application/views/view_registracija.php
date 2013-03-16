<div id="content">

<div id="regcontainer">


	
	<h1>Unesite Vaše podatke za registraciju</h1><br>
	<h2><?php echo @$greska; ?></h2><br>
<?php echo form_open('reg/registruj', array('name'=>'forma'));?>
	<div id="body">
		
		Željeno korisničko ime:<br />
		<input type="text" name="username" value="<?php echo @$this->input->post('username');?>" id="username" size="50"/><span style="color:red;font-weight:bold;">&nbsp;*</span><br /><br />
		Lozinka:<br />
		<input type="password" name="password" size="50"/><span style="color:red;font-weight:bold;">&nbsp;*</span><br /><br />
		
		Ime:<br />
		<input type="text" name="name" value="<?php echo @$this->input->post('name');?>" id="name" size="50"/><br /><br />
		Prezime:<br />
		<input type="text" name="surname" value="<?php echo @$this->input->post('surname');?>" id="surname" size="50"/><br /><br />
		Adresa:<br />
		<input type="text" name="address" value="<?php echo @$this->input->post('address');?>" id="address" size="50"/><br /><br />
		Mesto:<br />
		<input type="text" name="city" value="<?php echo @$this->input->post('city');?>" id="city" size="50"/><br /><br />
		Poštanski broj:<br />
		<input type="text" name="postal" value="<?php echo @$this->input->post('postal');?>" id="postal" size="50"/><br /><br />
		Broj telefona:<br />
		<input type="text" name="phone" value="<?php echo @$this->input->post('phone');?>" id="phone" size="50"/><br /><br />
		
		Adresa elektronske pošte:<br />
		<input type="text" name="email" value="<?php echo @$this->input->post('email');?>" size="50"/><span style="color:red;font-weight:bold;">&nbsp;*</span><br /><br /><span style="color:red;font-weight:bold;">*</span>obavezno popuniti<br /><br />proverite ispravnost podataka pre registracije<br /><br />
		<input type="submit" value="Registrujte se" name="registracija"/>

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
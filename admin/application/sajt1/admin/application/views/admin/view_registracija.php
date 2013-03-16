<div id="container">
	<h1>Unesite Vaše podatke za registraciju</h1>
	<h2><?php echo @$greska; ?></h2>
<?php echo form_open('reg/registruj', array('name'=>'forma'));?>
	<div id="body">
		Korisničko ime:<br />
		<input type="text" name="username" size="50"/><br /><br />
		Lozinka:<br />
		<input type="password" name="password" size="50"/><br /><br />
		Adresa elektronske pošte:<br />
		<input type="text" name="email" size="50"/><br /><br />
		<input type="submit" value="Registrujte se" name="registracija"/>

	</div>
</form>
</div>

</body>
</html>
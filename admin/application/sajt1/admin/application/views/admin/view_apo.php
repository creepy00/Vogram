<div id="container">
	<h1>Apoteka 9 admin panel</h1>

<?php //$imeForme['name'] = "forma"; echo form_open('login/odjava', $imeForme); ?>
	<div id="body">	
		Pojam za pretragu: <?php echo $input; ?>
		
	</div>
	<p class="footer">
	<div class='afooter'><a href = "<?php echo site_url('/admin/login/odjava'); ?>">Odjavi se</a></div>
	</p>
<!--</form>-->
</div>

</body>
</html>
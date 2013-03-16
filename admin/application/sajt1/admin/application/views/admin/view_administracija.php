<div class="right_content">  <h2>Unos novog administratora<?php echo @$greska; ?></h2>
<div class="form">
<?php

$attributes = array('class' => 'niceform', 'name' => 'forma');
 echo  form_open_multipart('apo/novadmin', $attributes);?>
	<fieldset>
		<dl>
			<dt><label for="korime">Korisničko ime:</label></dt>
			<dd><input type="text" name="korime" id="" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="lozinka">Lozinka:</label></dt>
			<dd><input type="password" name="lozinka"  id="txtChar" size="54" /></dd>
		</dl>
		<dl class="submit">
			<input type="submit" value="Unesi u bazu" id="submit" name="unosadmina"/>
		</dl>
	
  </fieldset>
	
</form>
</div>
<div class="form">
<h2>Promena lozinke</h2>
<?php
$attributes = array('class' => 'niceform', 'name' => 'forma2');
 echo  form_open_multipart('apo/promenalozinke', $attributes);?>
	<fieldset>
		<dl>
			<dt><label for="korime">Korisničko ime:</label></dt>
			<dd><input type="text" name="korime" id="" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="lozinka">Trenutna lozinka:</label></dt>
			<dd><input type="password" name="oldlozinka"  id="txtChar" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="lozinka">Nova lozinka:</label></dt>
			<dd><input type="password" name="newlozinka"  id="txtChar" size="54" /></dd>
		</dl>
		<dl class="submit">
			<input type="submit" value="Izmeni" id="submit" name="unosadmina"/>
		</dl>
	
  </fieldset>
	
</form>
</div>
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->
</body>
</html>
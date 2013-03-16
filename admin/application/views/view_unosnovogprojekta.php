<div class="right_content">  <h2>Unos novog projekta<?php echo @$greska; ?></h2>
<div class="form">
<?php
$attributes = array('class' => 'niceform', 'name' => 'forma');
 echo  form_open_multipart('vog/unesiprojekat', $attributes);?>
	<fieldset>
		<dl>
			<dt><label for="type">Tip projekta:</label></dt>
			<dd>
				<select size="1" name="type" id="" style="width:80px;">
					<option>Kultura i umetnost</option>
					<option>Ekologija</option>
					<option>Edukacija i seminari</option>
					<option>Akcije</option>
				</select>
			</dd>
		</dl>
		<dl>
			<dt><label for="text">Tekst projekta:</label></dt>
			<dd><input type="text" name="text" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="video_link">Video link:</label></dt>
			<dd><input type="text" name="video_link" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="links">Linkovi (odvojeni zarezom):</label></dt>
			<dd><textarea name="links" rows="5" id="" cols="35"></textarea></dd>
		</dl>
		<dl>
			<dt><label for="sinopsis">Sinopsis:</label></dt>
			<dd><textarea name="sinopsis" rows="5" id="" cols="35"></textarea></dd>
		</dl>
		<dl>
			<dt><label for="name">Naziv projekta:</label></dt>
			<dd><input type="text" name="name"  size="54" /></dd>
		</dl>
		<br>
		
		<div style="clear:both;">
		<div style="clear:both;"></div></div>
		</p>
		<dl class="submit">
			<input type="submit" value="Unesi u bazu" id="submit" name="unosproizvoda"/>
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
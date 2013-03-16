<div class="right_content">  <h2>Unos novog proizvoda<?php echo @$greska; ?></h2>
<div class="form">
<?php
$attributes = array('class' => 'niceform', 'name' => 'forma');
 echo  form_open_multipart('apo/unesiproizvod', $attributes);?>
	<fieldset>
		<dl>
			<dt><label for="product_name">Naziv proizvoda:</label></dt>
			<dd><input type="text" name="product_name" id="" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="product_price">Cena proizvoda:</label></dt>
			<dd><input type="text" name="product_price"  id="txtChar" onkeypress="return isNumberKey(event)" size="54" /></dd>
		</dl>
		<dl>
			<dt><label for="description">Opis proizvoda:</label></dt>
			<dd><textarea name="description" id="" rows="5" cols="35"></textarea></dd>
		</dl>
		<dl>
			<dt><label for="userfile">Slika proizvoda:</label></dt>
			<dd><input type="file" name="userfile" id="upload" /></dd>
		</dl>
		<br>
		
		<div style="clear:both;">
		<div style="float:left; width: 170px; height: 35px; padding: 0 10px 10px 0; text-align: right; line-height: 34px; color: #666666;
    font-size: 11px;
    font-weight: bold;">
		Kategorija: 
		</div>
		<div style="float:left;">
		<!--<dl>
			<dt><label for="category">Kategorija:</label></dt>
			-->
		
		<?php
/*
		function print_dropdown($query){
				$queried = mysql_query($query);
				$menu = '<dd><select size="1" name="category_id" id="">';
				//$menu = '<dd>';
					while ($result = mysql_fetch_array($queried)) {
						$menu .= '<option value="' . $result['category_id'] . '">' . $result['category_name'] . '</option>';
						//$menu .= '<input type="radio" name="group2" value="'.$result['category_id'].'">' .$result['category_name'] . '<br />';
			}
			$menu .= '</select></dd></dl>';
			//$menu .= '</dd></dl>';
			return $menu;
		}
		
		echo print_dropdown("SELECT category_id, category_name FROM category");
		//echo urlencode (print_dropdown("SELECT category_id, category_name FROM category"));
*/
function print_dropdown($query){
				$queried = mysql_query($query);
				$menu = '<select size="1" name="category_id" id="" style="width:100px;">';
				//$menu = '<dd>';
					while ($result = mysql_fetch_array($queried)) {
						$menu .= '<option value="' . $result['category_id'] . '">' . $result['category_name'] . '</option>';
						//$menu .= '<input type="radio" name="group2" value="'.$result['category_id'].'">' .$result['category_name'] . '<br />';
			}
			$menu .= '</select>';
			//$menu .= '</dd></dl>';
			return $menu;
		}
		
		echo print_dropdown("SELECT category_id, category_name FROM category");
		//echo urlencode (print_dropdown("SELECT category_id, category_name FROM category"));
		?>
		</div><div style="clear:both;"></div></div>
		</p>
		<dl class="submit">
			<input type="submit" value="Unesi u bazu" id="submit" name="unosproizvoda"/>
		</dl>
	
  </fieldset>
	
</form>
</div>

*slika mora biti manja od 1200*1200 piksela i manja od 150kB, dozvoljeni su jpg i jpeg formati.

</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->
</body>
</html>
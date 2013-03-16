<div id="content">
	
	
		<div id="product">
		<form name="Add" action="<?php echo site_url();?>/proizvod/dodpost" method="post">
			<div id="product_image">
				<img alt="Slika odabranog proizvoda" src="<?php echo base_url();?>/uploads/<?php echo $image;?>" />
			</div>
			
			<div id="product_name">
				
				<h1><?php echo $product_name; ?></h1>
			
			
				<div id="product_price">
					<?php echo $product_price; ?> dinara
				
					<div id="add_button">
						<a onClick="Add.submit(); return false;" href="" style="text-decoration:none;"><img alt="Dugme dodaj u korpu" src="<?php echo base_url();?>/incl/images/add_button.png" />
							<div class="text_add">
								Dodaj u korpu
							</div>
						</a>
						
					</div>
					
				</div>
					<div class="minus_plus">
					
					<input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id; ?>">
					<a href="#" onclick="subOne()"><img alt="Dugme minus" src="<?php echo base_url();?>/incl/images/minus.png" /></a>
					<input type="text" name="pieces" class="pieces" value="1"  onkeypress="return isNumberKey(event)"> 
					<a href="#" onclick="addOne()"><img alt="Dugme plus" src="<?php echo base_url();?>/incl/images/plus.png" /></a>
					
					</div>
			</div>
			
							<script type="text/javascript">
								addOne = function(){ document.Add.pieces.value = document.Add.pieces.value*1 + 1 ; }
								subOne = function(){ document.Add.pieces.value = document.Add.pieces.value*1 - 1 ; 
								if (document.Add.pieces.value < 1){document.Add.pieces.value = 1 ; }
								}
								
							</script> 
			<div class="hr">
				<hr />
			</div>
			
			<div id="product_description">
				<?php echo $description; ?>
			</div>
			</form>
		</div>
	<?php
	//kod za THUMBOVE
	echo "<div style='float:right;'>";
		if($this->session->userdata('ulogovan')==1)
		{
		
		echo "<div style='float:left;'><a href='". site_url('proizvod/setthumb/' . $product_id . '/1') ."'><img src=" . base_url() . "incl/img/thumbsup.png></a></div>";
		echo "<div id='thumbsupdown' style = \"background:url('" . base_url() . "incl/img/thumbsempty.png');\">" . $thumbUpDown . "</div>";
		echo "<div style='float:left;'><a href='". site_url('proizvod/setthumb/' . $product_id . '/0') ."'><img src=" . base_url() . "incl/img/thumbsdown.png></a></div>";
		
		} else {
		
		echo "<div style='float:left;'><img src=" . base_url() . "incl/img/thumbsup.png></div>";
		echo "<div id='thumbsupdown' style = \"background:url('" . base_url() . "incl/img/thumbsempty.png');\">" . $thumbUpDown . "</div>";
		echo "<div style='float:left;'><img src=" . base_url() . "incl/img/thumbsdown.png></div>";
		
		}
		echo "</div>";
	?>
	<div id="leave_comment">
	
	<script>
		subkomentar = function(){
			document.komforma.submit();
		}
	</script>
	
	<?php
	if($this->session->userdata('ulogovan')==1)
		{	
	?>
	
	<div>Ostavite komentar za ovaj proizvod:</div>	
	<?php echo form_open('proizvod/dotkom', array('name'=>'komforma'));?>
	<input type="hidden" name="product_id" value="<?php echo $product_id ?>">
	<textarea name="komentar" rows="10" cols="50"></textarea><br><br>
	<a href="javascript:;" onClick="subkomentar();" class="prijavakom"><div id="tekst_prijavakom">Pošalji komentar</div></a>
	
	</form><div id="hr"><hr /></div>
	<?php
	} else {
	echo "Morate biti prijavljeni da biste ocenili ili ostavili komentar za proizvod. Molimo Vas, prijavite se.<div id='hr' style='padding-bottom:20px;'><hr /></div>";
	}
	if($komentari!==false){
		foreach ($komentari as $row){
		echo "<div class='komsbox'>";
			$datum = strtotime($row['datetime']);
			echo nl2br($row['comment']) . "<br/>";
			echo "<div class='komsdatetime'>Datum i vreme komentara: " . date("d.m.Y. H:i", $datum) . "&nbsp; Korisnik: " . $row['username'] . "</div>";
		echo "</div>";
		}
	}
	?>
	</div>
	</div><!-- #content-->
 <div class="push"></div>
 <?php
	if($this->session->userdata('dod')){
	$dod = $this->session->userdata('dod');
	
	if(isset($dod['update'])){
		$poruka = "Dodato u korpu: " . $dod['name'] . ",<br> cena: " . $dod['price']. " din.<br>komada: " . $dod['qty'] . "<br>iznos: " . $dod['price']*$dod['qty'];
	}else{
		$poruka = "Artikal: <b>" . $dod['name'] . "</b> <br>Sa cenom: <b>" . $dod['price']. "</b> din,<br> komada: <b>" . $dod['qty']. "</b><br>iznos: <b>" . $dod['price']*$dod['qty'] . "</b> din.<br>je uspešno dodat u korpu!";  
	}
?>	
	<script>
		function closeTooltip(){
			//document.getElementById('bgtooldiv').myChildNode.parentNode.removeChild(document.getElementById('bgtooldiv'));
			//$('#bgtooldiv').remove();
			//$('#frtooldiv').remove();
			document.location=document.location;
		}
		document.body.style['overflow'] = 'hidden';
	</script>
<div>

	<div style="position:absolute; opacity:0.8; width:100%; height:100%; left:0px; top:0px; z-index:1000; background: none repeat scroll 0 0 gray;" onClick="closeTooltip(); id='bgtooldiv'">
	</div>
	<div style="position:absolute; display:block;  background: white; border-radius: 10px 10px 10px 10px;box-shadow: 0 0 10px black; z-index:1001; width:350px; height:250px; margin: -400px 0px 0px -150px;  left:50%; right:auto; padding:10px;" onClick="closeTooltip();" id='frtooldiv'>
		<div style="font-size:16px;float:left;max-width:170px;">
		<?php 
		echo $poruka;
		?>
		<br>
		<br>
		
		<a href="">Nastavite sa kupovinom</a><br><br>
		<?php echo anchor('korpa', 'Sadržaj Vaše korpe'); ?>
		</div>
		<div style="float:right;"><img src="<?php 
	echo base_url() . "/uploads/" . $dod['image'];
	?>"></div>
	</div>
</div>
<?php
	$this->session->unset_userdata('dod');
	}
?>



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
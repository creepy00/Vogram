<div id="content">
		<div id="category">
		<span class="categories">Kategorije</span>
			<img src="<?php echo base_url(); ?>/incl/images/kategorije.png" alt="pozadinska slika za kategorije">
			
			<?php
			
				echo $meni_kategorije;
				
			?>
			<!--
			<a href="#" class="button_text"><span id="category_button">Lekovi</span></a>
			<a href="#" class="button_text"><span id="category_button">Aparati</span></a>
			<a href="#" class="button_text"><span id="category_button">Parafarmaceutski preparati</span></a>
			<a href="#" class="button_text_selected"><span id="category_button">Kozmetika</span></a>
			<a href="#" class="button_text"><span id="category_button">Preparati za kosu</span></a>
			<a href="#" class="button_text"><span id="category_button">Anatomska obuca</span></a>
			<a href="#" class="button_text"><span id="category_button">Kozmetika za trudnice i porodilje</span></a>
			<a href="#" class="button_text"><span id="category_button">Kozmetika za bebe</span></a>
			<a href="#" class="button_text"><span id="category_button">Hrana za bebe</span></a>
			<a href="#" class="button_text"><span id="category_button">Oprema za bebe</span></a>
			-->
		
		</div>


		<div id="products" style="margin-top:143px;">
		
		
			<span class="sort_text"></span>
			<?php 
			$j = 0;
			//var_dump($proizvodi);
			if ($proizvodi){
			foreach ($proizvodi as $row){
	
			?>
			<div id="single_product">
			
			<a href="<?php echo site_url("proizvod/index/".$row['product_id']);?>">
				<img src="<?php echo base_url(); ?>incl/images/addtocart.png" alt="Dugme dodaj u korpu" usemap="#addcart<?php echo $row['product_id']; ?>" class="single_cart">
						<map name="addcart<?php echo $row['product_id']; ?>">
						  <area shape="rect" coords="0,0,145,125" href="<?php echo site_url("proizvod/index/".$row['product_id']);?>" alt="slika proizvoda">
						  <area shape="rect" coords="0,125,145,155" href="<?php echo site_url("proizvod/dod/".$row['product_id']);?>" alt="dodaj u korpu">
						</map> 				
				<img src="<?php echo base_url(); ?>uploads/<?php echo $row['image']; ?>" alt="slika proizvoda" class="product_image">
			</a>
			<span class="product_cost"><?php echo $row['product_price']; ?> Din.</span>

			<a href="<?php echo site_url("proizvod/index/".$row['product_id']);?>" class="more_link"><span style="background-image:url('<?php echo base_url(); ?>/incl/images/more.png');" class="more">više...</span></a>
				<span class="description_head"><?php echo $row['product_name']; ?></span>
				<div id="description"><?php echo $row['description']; ?></div>

			</div>
			<?php 
			$j++;
			}
			} else { 
				echo "Nema rezultata pretrage.";
			}
			?>
			
				
		</div>
			<span class="products_pagination">

			</span>
				
	</div><!-- #content-->
 <div class="push"></div>
<?php
	if($this->session->userdata('dod')){
	$dod = $this->session->userdata('dod');
	
	if(isset($dod['update'])){
		$poruka = "Dodato u korpu: " . $dod['name'] . ", cena: " . $dod['price'];
	}else{
		$poruka = "Artikal: <b>" . $dod['name'] . "</b> <br>Sa cenom: <b>" . $dod['price'] . "</b><br> je uspešno dodat u korpu!";  
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
	<div style="position:absolute; display:block;  background: white; border-radius: 10px 10px 10px 10px;box-shadow: 0 0 10px black; z-index:1001; width:350px; height:210px; margin: 0px 0px 0px -150px;  left:50%; right:auto; padding:10px;" onClick="closeTooltip();" id='frtooldiv'>
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
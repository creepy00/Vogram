<div id="content">
	
		<div id="cart">
			<img src="<?php echo base_url(); ?>/incl/images/cart.png" alt="slika korpe"><div id="cart_text">Vaša korpa</div>
		</div>
		
		<div id="cart_content">
		<img src="<?php echo base_url(); ?>/incl/images/line.png" class="line">
			<table class="products" cellpadding="0" cellspacing="0">
				
				<tr>
					<th style="width:400px;">Naziv artikla</th>
					<th style="text-align:center;width:150px;">cena</th>
					<th style="text-align:center;width:150px;">količina</th>
					<th style="text-align:center;width:150px;">ukupno</th>
				</tr>

<?php $i = 1; $total=0; ?>

<?php foreach ($this->cart->contents() as $items): ?>
	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
				<tr>
					<td style="padding-left:15px;">
					<div style="float:left; width:370px;">
					<a href="#"><?php echo $items['name']; ?></a>
					</div>
					<div style="float:right;vertical-align:middle;">
					<a href="<?php echo site_url() . '/korpa/izbaci/' .  $items['rowid']; ?>"><img src="<?php echo base_url(); ?>/incl/images2/trash.png" /></a>
					</div>
					</td>
					<td class="price" id="<?php echo "p" . $items['rowid']; ?>"><?php echo number_format(($items['price']),2,',','.'); ?> din.</td>
					<td class="price">
						<form name="Add<?php echo $i; ?>" action="" method="">
							<a href="#" class="subtract_button" ><img alt="Dugme minus" src="<?php echo base_url(); ?>/incl/images/minus.png" /></a>
								<input type="text" name="pieces<?php echo $i; ?>" class="pieces_cart" id="<?php echo $items['rowid']; ?>" value="<?php echo $items['qty'] ?>">
							<a href="#" class="add_button"><img alt="Dugme plus" src="<?php echo base_url(); ?>/incl/images/plus.png" /></a>
						</form>
					</td>
					<td class="price" id="<?php echo "s" . $items['rowid']; ?>"><?php echo number_format(($items['subtotal']),2,',','.'); $total += $items['subtotal'];?></td>
				</tr>

<?php $i++; ?>

<?php
endforeach; 
?>

			</table>
			<div id="sum"><?php echo number_format(($total),2,',','.'); ?> din.</div>
			<div id="pay">
				<div class="order_button">
					<?php echo anchor('proizvodi', 'Nastavite naručivanje', array('class'=>'text_order')); ?>
				</div>
				<div class="pay_button">
         <?php echo anchor('korpa/placanje', 'Plaćanje', array('class'=>'text_order')); ?>
				</div>
			</div>
	</div>
	
	</div>
	<!-- #content-->
 <div class="push"></div>
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

<script type="text/javascript">
var url = '<?php echo site_url('korpa/promenikolicinu'); ?>';
  $("a.add_button").click(function() {
    var input = $(this).prev();
    var value = parseInt(input.val());
	var id = input.attr('id');
	value = value + 1;
    if (isNaN(value)) {
      input.val(0);
    } else {
		//term = obj.parentNode.parentNode.getElementsByTag('input')[0].value;
		var posting = $.post( url, { qtt: value, id: id } );
		posting.done(function( data ) {
			var obj = jQuery.parseJSON(data);
			input.val(obj.qty);
			subtotal = document.getElementById("s" + obj.rowid);
			subtotal.innerHTML = (obj.qty * obj.price).formatMoney(2, ',', '.');
			sum = document.getElementById("sum");
			sum.innerHTML = obj.total.formatMoney(2, ',', '.') + " din.";
			var ukupnakolicina = document.getElementById('ukupnakolicina');
			ukupnakolicina.innerHTML = obj.totalqty;
		});
      
    } //if
  });
  $("a.subtract_button").click(function() {
    var input = $(this).next();
    var value = parseInt(input.val());
	var id = input.attr('id');
	value = value - 1;
	
	if (value < 1)value = 1 ; 
    if (isNaN(value)) {//
      input.val(0);
    } else {
		//term = obj.parentNode.parentNode.getElementsByTag('input')[0].value;
		var posting = $.post( url, { qtt: value, id: id } );
		posting.done(function( data ) {
			var obj = jQuery.parseJSON(data);
			input.val(obj.qty);
			subtotal = document.getElementById("s" + obj.rowid);
			subtotal.innerHTML = (obj.qty * obj.price).formatMoney(2, ',', '.');
			sum = document.getElementById("sum");
			sum.innerHTML = obj.total.formatMoney(2, ',', '.') + " din.";
			var ukupnakolicina = document.getElementById('ukupnakolicina');
			ukupnakolicina.innerHTML = obj.totalqty;
		});
      
    }
  }); 
  $("input.pieces_cart").focusout(function() {
    var input = $(this);
    var value = parseInt(input.val());
	var id = input.attr('id');
    if (isNaN(value)) {
      input.val(0);
    } else {
		//term = obj.parentNode.parentNode.getElementsByTag('input')[0].value;
		var posting = $.post( url, { qtt: value, id: id } );
		posting.done(function( data ) {
			var obj = jQuery.parseJSON(data);
			input.val(obj.qty);
			subtotal = document.getElementById("s" + obj.rowid);
			subtotal.innerHTML = (obj.qty * obj.price).formatMoney(2, ',', '.');
			sum = document.getElementById("sum");
			sum.innerHTML = obj.total.formatMoney(2, ',', '.') + " din.";
			var ukupnakolicina = document.getElementById('ukupnakolicina');
			ukupnakolicina.innerHTML = obj.totalqty;
		});
      
    }
  });
Number.prototype.formatMoney = function(c, d, t){
var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
</script>
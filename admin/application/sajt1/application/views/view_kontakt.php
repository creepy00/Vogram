<div id="content">
	<style type="text/css">
    .address {
      cursor: pointer;
    }
  </style>
	<div id="contact_table">
    <table class="table" cellpadding="0" cellspacing="0">
      <tr>
        <th class="heading">Adresa</th>
        <th class="heading_2" colspan="2">Telefoni</th>
      </tr>
      <tr>
        <td class="first address" map-link = "https://maps.google.rs/maps?ie=UTF8&amp;cid=13152068055825413544&amp;q=Apoteka&amp;gl=RS&amp;hl=en&amp;t=m&amp;ll=45.257428,19.833434&amp;spn=0.005287,0.00912&amp;z=16&amp;iwloc=A&amp;output=embed">1. Novi Sad - Bulevar Oslobodenja 65</td>
        <td class="second">021/420-757<br />021/6624-317</td>
        <td class="third">062/590-516</td>
      </tr>
      <tr>
        <td class="first address" map-link = "https://maps.google.rs/maps?ie=UTF8&amp;cid=9276963181716389692&amp;q=Apoteka&amp;gl=RS&amp;hl=en&amp;t=m&amp;ll=45.244301,19.841094&amp;spn=0.005288,0.00912&amp;z=16&amp;iwloc=A&amp;output=embed">2. Novi Sad - Bulevar Oslobodenja 103</td>
        <td class="second">021/520-485<br />021/528-232</td>
        <td class="third">062/590-517</td>
      </tr>
      <tr>
        <td class="first address" map-link = "">3. Novi Sad - Jevrejska 33</td>
        <td class="second">021/420-400<br />021/421-090</td>
        <td class="third">062/590-508</td>
      </tr>
      <tr>
        <td class="first address" map-link = "">4. Novi Sad - Bulevar Cara Lazara 88</td>
        <td class="second">021/6371-722<br />021/6372-322</td>
        <td class="third">062/590--523</td>
      </tr>
      <tr>
        <td class="first address" map-link = "">5. Novi Sad - Bulevar Oslobođenja 18</td>
        <td class="second">021/6615-482<br />021/446-445</td>
        <td class="third">062/590-503</td>
      </tr>
      <tr>
        <td class="first address" map-link = "">6. Novi Sad - Sentandrejski put bb - Univerexport</td>
        <td class="second">021/6334-700<br />021/6334-701</td>
        <td class="third">062/590-215</td>
      </tr>
      <tr>
        <td class="first address" map-link = "">7. Novi Sad - Bulevar Oslobođenja 52</td>
        <td class="second">021/420-959<br />021/425-227</td>
        <td class="third">062/590-529</td>
      </tr>
      <tr>
        <td class="first address" map-link = "">8. Novi Sad - Bulevar Jovana Dučića 19</td>
        <td class="second">021/6399-133</td>
        <td class="third">062/590-534</td>
      </tr>
      <tr>
        <td class="first address" map-link="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Apoteka+Biljana+i+Luka+9,+Svetozara+Markovi%C4%87a,+Belgrade&amp;aq=0&amp;oq=apoteka+bilja&amp;sll=45.252383,19.84001&amp;sspn=0.005665,0.016501&amp;ie=UTF8&amp;hq=Apoteka+Biljana+i+Luka+9,+Svetozara+Markovi%C4%87a,&amp;hnear=Belgrade,+City+of+Belgrade,+Serbia&amp;ll=44.806047,20.466661&amp;spn=0.031919,0.009765&amp;t=m&amp;output=embed">9. Beograd - Svetozara Markovića 38</td>
        <td class="second">011/3239-888</td>
        <td class="third">062/590-533</td>
      </tr>
    </table> <img src="<?php echo base_url(); ?>/incl/images/map_holder.png" alt="pozadina za mapu" class="holder">
    <iframe class="map" id="google_map" frameborder="0" scrolling="no" src="https://maps.google.rs/maps?ie=UTF8&amp;cid=13152068055825413544&amp;q=Apoteka&amp;gl=RS&amp;hl=en&amp;t=m&amp;ll=45.257428,19.833434&amp;spn=0.005287,0.00912&amp;z=16&amp;iwloc=A&amp;output=embed">
    </iframe>

    <script type="text/javascript">
      $('.address').click(function(){
        $('#google_map').attr('src', $(this).attr('map-link'));
      });
    </script>

	</div><?php echo @$greska;?>
    <!--<div id="message">Ovde možete napisati poruku svojim korisnicima koji žele da vam postave neko pitanje ili žele neku informaciju.</div>-->
    <div id="contact_form">
		<form name="contact" action="<?php echo site_url("index/kontakt_mail"); ?>" method="POST">
		
			<span id="send_text">Pošaljite e-mail</span>
			
			<label for="name_text">Vaše ime:</label>
				<input type="text" class="contact_name" id="name_text" name="name" value="">
			<label for="email_text">Vaša e-mail adresa:</label>
				<input type="text" class="contact_mail" id="email_text" name="mail" value="">
			<label for="textarea">Tekst poruke:</label>
				<div id="textarea"><textarea name="textarea" class="textarea"></textarea><input type="submit" name="send" value="Pošalji" class="send"></div>
		
		</form>	
	</div>
	</div><!-- #content-->
 <div class="push"></div>
</div>
<div id="footer">
	<div class="kontakt">Kontakt
	<div id="strelica">
	<img src="<?php echo base_url(); ?>/incl/images/strelica.png" /> Tel: 011/3239-888
	<br />
	<img src="<?php echo base_url(); ?>/incl/images/strelica.png" /> Fax: 021/423-386
	<br />
	<img src="<?php echo base_url(); ?>/incl/images/strelica.png" /> E-pošta: <a href="mailto:bilukabg@sbb.rs">bilukabg@sbb.rs</a>
	</div>
	</div>
  <div id="copyright">Copyright © 2012 Sva prava zadržava Apoteka “Biljana i Luka”. Designed by “Best Software Solutions”</div>
</div><!-- #footer-->

</body>
</html>
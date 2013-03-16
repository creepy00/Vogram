<div class="right_content">
<div class="form">
<?php

$attributes = array('class' => 'niceform', 'name' => 'forma');
 echo  form_open_multipart('apo/briskor', $attributes);?>
	  <h2>Sve slike <?php echo @$greska; ?></h2>
		<table id="rounded-corner">
    <thead>
    	<tr>
            <th scope="col" class="rounded">Kategorija</th>
            <th scope="col" class="rounded">Slika</th>
            <th scope="col" class="rounded-q4">Obriši</th>
        </tr>
    </thead>
	<tfoot>
    	<tr>
        	<td colspan="2" class="rounded-foot-left"><em>Biljana i Luka administracija</em></td>
        	<td class="rounded-foot-right"></td>

        </tr>
    </tfoot>
	<tbody>
		<?php
		
			echo $upit;
		
		?>
		 </tbody>
         </table>
		 </form>
</div>
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->
</body>
</html>
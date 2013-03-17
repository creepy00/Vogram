<div class="right_content">
<h2>Svi projekti<?php echo @$greska; ?></h2>

		<table id="rounded-corner">
    <thead>
    	<tr>
            <th scope="col" class="rounded">Naziv</th>
            <th scope="col" class="rounded">Sinopsis</th>
            <th scope="col" class="rounded">Tekst</th>
            <th scope="col" class="rounded">Linkovi</th>
            <th scope="col" class="rounded">Video link</th>
           <th scope="col" class="rounded-q4">Obriši</th>
        </tr>
    </thead>
	<tfoot>
    	<tr>
        	<td colspan="4" class="rounded-foot-left"><em>Vogram administracija</em></td>
        	<td class="rounded-foot-right"></td>

        </tr>
    </tfoot>
	<tbody>
		<?php
		
			echo $upit;
		
		?>
		 </tbody>
         </table>

        

</div><!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->

</body>
</html>
		<div class="right_content">  <h2>Narudžbine <?php echo @$greska; ?></h2>
		<table id="rounded-corner" style="table-layout: fixed;">
    <thead>
    	<tr>
            <th scope="col" class="rounded" colspan=2>Podaci o kupcu</th>
            <th scope="col" class="rounded">Naziv proizvoda</th>
            <th scope="col" class="rounded">Količina</th>
            <th scope="col" class="rounded">Cena</th>
            <th scope="col" class="rounded-q4">Iznos</th>
        </tr>
    </thead>
	<tfoot>
    	<tr>
        	<td colspan="5" class="rounded-foot-left"><em>Biljana i Luka administracija</em></td>
        	<td class="rounded-foot-right"></td>

        </tr>
    </tfoot>
	<tbody>
		<?php
		
			echo $upit;
		
		?>
		 </tbody>
         </table>
		   <div class="pagination"><?php echo $pagination; ?></div> 

    
     
         <div class="form">
         <form action="" method="post" class="niceform">
         
                <fieldset>
                   
                     
                     
                    
                </fieldset>
                
         </form>
         </div>
	

</div><!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->

</body>
</html>
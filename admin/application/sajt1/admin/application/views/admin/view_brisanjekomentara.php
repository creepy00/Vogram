<div class="right_content">  <h2><?php echo @$greska; ?></h2>

	<br>
		Lista svih komentara:
		<table id="rounded-corner">
    <thead>
    	<tr>
            <th scope="col" class="rounded">Komentar</th>
            <th scope="col" class="rounded">Proizvod</th>
            <th scope="col" class="rounded">Datum i vreme</th>
           <th scope="col" class="rounded">Korisnik</th>
           <th scope="col" class="rounded-q4">Obriši</th>
        </tr>
    </thead>
	<tfoot>
    	<tr>
        	<td colspan="4" class="rounded-foot-left"><em>Biljana i Luka administracija</em></td>
        	<td class="rounded-foot-right"></td>

        </tr>
    </tfoot>
	<tbody>
		<?php
		
			echo $upit;
		
		?>
		 </tbody>
         </table>
		

    
     
         <div class="form">
         <form action="" method="post" class="niceform">
         
                <fieldset>
                   
                     
                     
                    
                </fieldset>
                
         </form>
         </div>  

	
</form>
</div><!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->

</body>
</html>
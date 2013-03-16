		<div class="right_content">  <h2>Svi proizvodi<?php echo @$greska; ?></h2>
		<table id="rounded-corner" style="table-layout: fixed;">
    <thead>
    	<tr>
            <th scope="col" style="width:20px;" class="rounded">ID</th>
            <th scope="col" class="rounded">Naziv</th>
            <th scope="col" class="rounded">Cena</th>
            <th scope="col" class="rounded">Opis</th>
            <th scope="col" class="rounded">Slika</th>
			<th scope="col" style="width:100px;" class="rounded">Naziv slike</th>
            <th scope="col" class="rounded">Kategorija</th>
            <th scope="col" class="rounded">Izmeni</th>
            <th scope="col" class="rounded-q4">Obriši</th>
        </tr>
    </thead>
	<tfoot>
    	<tr>
        	<td colspan="8" class="rounded-foot-left"><em>Biljana i Luka administracija</em></td>
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
		 *slika mora biti manja od 1200*1200 piksela i manja od 150kB, dozvoljeni su jpg i jpeg formati.
	

</div><!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->

</body>
</html>

		
<?php //echo form_open('isadv/unesiproizvod', array('name'=>'forma'));?>

		<div class="right_content">  
		<?php
		if ($nazivi!=""){
		?>
		<h2>Pronađeno u nazivu: <?php echo @$greska; ?></h2>
		<table id="rounded-corner">
    <thead>
    	<tr>
            <th scope="col" class="rounded">ID</th>
            <th scope="col" class="rounded">Naziv</th>
            <th scope="col" class="rounded">Cena</th>
            <th scope="col" class="rounded">Opis</th>
            <th scope="col" class="rounded">Slika</th>
			<th scope="col" class="rounded">Naziv slike</th>
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
			echo $nazivi;
			
		?>
	</tbody>
         </table>
			<?php
			}
		if ($opisi!=""){
		?>
		 <h2>Pronađeno u opisu:</h2>
		<table id="rounded-corner">
    <thead>
    	<tr>
            <th scope="col" class="rounded">ID</th>
            <th scope="col" class="rounded">Naziv</th>
            <th scope="col" class="rounded">Cena</th>
            <th scope="col" class="rounded">Opis</th>
            <th scope="col" class="rounded">Slika</th>
			<th scope="col" class="rounded">Naziv slike</th>
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
			
		echo $opisi;
		?>
	</tbody>
         </table>
		<?php
		}
		?>

    
     
         <div class="form">
         <form action="" method="post" class="niceform">
         
                <fieldset>
                   
                     
                     
                    
                </fieldset>
                
         </form>
         </div>  
		 <?php
		 if ($nazivi !="" and $opisi !=""){
		 ?>
		 *slika mora biti manja od 1200*1200 piksela i manja od 150kB
		<?php
			}else{echo "Nema rezultata.";}
		?>

</div><!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->

</body>
</html>
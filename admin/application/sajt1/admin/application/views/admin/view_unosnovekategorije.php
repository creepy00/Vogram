<div class="right_content">  <h2>Unos nove kategorije <?php echo @$greska; ?></h2>
	
<?php echo form_open('apo/unesikategoriju', array('name'=>'forma')); ?>
	
		Naziv kategorije:<br />
		<input type="text" name="category_name" size="50"/><br /><br />
		<input type="submit" value="Unesi u bazu" name="unos_kategorije"/>
</form>
	<br>
		Lista svih kategorija:
		<table id="rounded-corner">
    <thead>
    	<tr>
            <th scope="col" class="rounded">ID</th>
            <th scope="col" class="rounded">Naziv</th>
            <th scope="col" class="rounded">Izmeni</th>
           <th scope="col" class="rounded-q4">Obriši</th>
        </tr>
    </thead>
	<tfoot>
    	<tr>
        	<td colspan="3" class="rounded-foot-left"><em>Biljana i Luka administracija</em></td>
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

	
</form>
</div><!-- end of right content-->
</div>   <!--end of center content -->               
<div class="clear"></div>
</div> <!--end of main content-->

</div><!--main_content-->
</div><!--main_container-->

</body>
</html>
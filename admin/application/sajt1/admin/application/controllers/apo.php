<?php
class Apo extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		// Your own constructor code
		if($this->session->userdata('ulogovan')==0)
		{		
			redirect(base_url("/index.php/login"), 'refresh');
		}
	}
	
	public function index()
	{
	
	//$this->session->sess_destroy();
	

		$this->load->helper('form');
		$this->load->model('model_login');
		/*
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
			
			"tutle"=>"",
			
			"body"=>"onload='setFocus()'",
			
			"head"=>'<SCRIPT language=JavaScript>function setFocus() {
				document.getElementById("searchbox").focus();
			}</script>'
		
		);
		$option['tutle']="Vrednost tutle";
		$option['head'] .= $this->model_pretraga->jscript(site_url('apo/pretraga'));
		$option['input'] = $this->model_pretraga->input();
		//echo base_url();
		*/
		//ucitavanje view_header sa promenljivama
		$this->load->view('admin/view_header');
		
		//ucitavanje view_apo
		$this->load->view('admin/view_indexlog');
		
	}
	
	public function indexlog()
	{
	
	//$this->session->sess_destroy();
	

		$this->load->helper('form');
		$this->load->model('model_login');
		/*
		//dodeljivanje vrednosti promenljivama koje se prosledjuju view_header-u
		$option=array(
		
			"title"=>"Apoteka 9",
			
			"tutle"=>"",
			
			"body"=>"onload='setFocus()'",
			
			"head"=>'<SCRIPT language=JavaScript>function setFocus() {
				document.getElementById("searchbox").focus();
			}</script>'
		
		);
		$option['tutle']="Vrednost tutle";
		$option['head'] .= $this->model_pretraga->jscript(site_url('apo/pretraga'));
		$option['input'] = $this->model_pretraga->input();
		//echo base_url();
		*/
		//ucitavanje view_header sa promenljivama
		$this->load->view('admin/view_header');
		
		//ucitavanje view_apo
		$this->load->view('admin/view_indexlog');
		
		
	}
	
	function unosnovekategorije($greska = 0, $page = 0)
	{
		/*
		if($greska==="brisanjekategorije"){
			$category_id = end($this->uri->segment_array());
			redirect('apo/brisanjekategorije/' . $category_id);
		}
		*/
		$this->load->helper('form');
		$option['title'] = "Unos nove kategorije";
		$option['body'] = "onload='setFocus()'";	
		//$forma = form_open('apo/unosnovekategorije/'.$page, array('name'=>'forma'));	
		$forma2 = form_open('apo/izmenakategorija/'.$page, array('name'=>'forma2'));
		//echo form_close();
		$brisanjek = site_url("apo/brisanjekategorije/");
		$option['head'] = "<SCRIPT language=JavaScript>
							function setFocus() {
								document.forma2.category_name.focus();
							}
							function Crudkat(td){
								id = td.parentNode.childNodes[0].textContent;
								category_name = td.parentNode.childNodes[1].textContent;
								td.parentNode.innerHTML = '<td colspan=3>$forma2<input type=\"hidden\" value=\"' + id + '\" name = \"category_id\" />naziv:<input type=\"text\" size=\"60\" name=\"category_name\" value=\"' + category_name + '\" /><input type=\"submit\" value=\"Snimi\"></td>';
							}
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.childNodes[0].textContent;
								brisanjek = '$brisanjek';
							}
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']='Uneto u bazu!';}
		elseif ($greska==2){$option['greska']='Nedovoljno podataka, morate uneti najmanje 1 naziv!';}
		elseif ($greska==3){$option['greska']='<br>Kategorija je vezana za proizvod, obrišite prvo proizvode iz te kategorije.';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		
		////ISPIS SVIH KATEGORIJA
		function print_cat($query){
		
				$queriedc = mysql_query($query);
				$menuc = "";
					while ($resultc = mysql_fetch_array($queriedc)) {
					
						$menuc .= '<tr id="'.$resultc['category_id'].'">';
						$menuc .= '<td>' . $resultc['category_id'] . '</td><td>' . $resultc['category_name'] . '<td onClick="Crudkat(this);"><a href="#"><img src="'. base_url().'/incl/images2/user_edit.png" alt="" title="" border="0" /></a></td><td><a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a></td></td>';
						$menuc .= '</tr>';//
			}
			return $menuc;
		}
		$option['upit'] = print_cat("SELECT * FROM `category` ORDER BY category_id LIMIT $page, 20;");
		$queriedc = mysql_query("SELECT count(*) as br FROM  `category`;");
		$resultc = mysql_fetch_array($queriedc);
		$config['total_rows'] = $resultc['br'];
		$queriedc = mysql_query("SELECT * from `category`;");
					$menuc = "";
		while ($resultc = mysql_fetch_array($queriedc)) {
			$menuc .= '<option value="' . $resultc['category_id'] . '">' . $resultc['category_name'] . '</option>';
		}
		$config['category_name'] = $resultc['category_name'];
						
		$this->load->library('pagination');
		//$config['base_url'] = 'http://localhost/apo/index.php/apo/unosnovekategorije/0';
		$config['base_url'] = site_url('apo/unosnovekategorije/0');
		
		$config['per_page'] = 20; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$option['pagination'] = $this->pagination->create_links();
		$option['page'] = $page; //escape this!!!!
		
		
		//$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']='Uneto u bazu!';}
		elseif ($greska==2){$option['greska']='Nedovoljno podataka, morate uneti najmanje 1 naziv!';}
		elseif ($greska==3){$option['greska']='<br>Kategorija je vezana za proizvod, obrišite prvo proizvode iz te kategorije.';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_unosnovekategorije',$option);
	}
		
	function izmenakategorija($page){
		$this->load->helper('url');
		$this->load->model('model_unos');
		$greska = $this->model_unos->izmenakategorije($this->input->post('category_id'),$this->input->post('category_name'));
		redirect('/apo/unosnovekategorije/' . $greska.'/'.$page, 'refresh');
	}
	
	function unesikategoriju()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		$greska = $this->model_unos->unoskategorije($this->input->post('category_name'));
		redirect('/apo/unosnovekategorije/' . $greska, 'refresh');
	}
	
	function unosnovogproizvoda($greska = 0)
	{
		$this->load->helper('form');
		
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Unos novog proizvoda";
		$option['body'] = "onload='setFocus()'";			
		$option['head'] = "<SCRIPT language=JavaScript>
							<!--
							function setFocus() {
								document.forma.product_name.focus();
							}
							 
							function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
						   //-->
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=' Uneto u bazu!';}
		elseif ($greska==2){$option['greska']=' Nedovoljno podataka, morate uneti bar 4 podatka, sve sem slike!';}
		else {$option['greska']=' Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_unosnovogproizvoda',$option);
	}
	
	function unesiproizvod()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$config['upload_path'] = './../uploads/';
		$config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
		$config['max_size']	= '150';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$slika="";
			//var_dump($error);
			//napraviti stranicu za izjavljivanje greske
			//$this->load->view('admin/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$slika = $data['upload_data']['file_name'];
			$this->model_unos->resizeslike($data['upload_data']['full_path']);
			//$this->load->view('upload_success', $data);
		}
		
		$greska = $this->model_unos->unosproizvoda($this->input->post('product_name'),$this->input->post('product_price'),$this->input->post('description'),$slika,$this->input->post('category_id'));
		redirect('/apo/unosnovogproizvoda/' . $greska, 'refresh');
	}
	
	function kategorije($greska = 0)
	{
	
	function print_categories($query){
				$queried = mysql_query($query);
				$menu = '<ul>';
					while ($result = mysql_fetch_array($queried)) {
						$menu .= '<li>' . $result['category_id'] . ' ' . $result['category_name'] . '</li>';
			}
			$menu .= '</ul>';
			return $menu;
		}
		echo print_categories("SELECT category_id, category_name FROM category");
		$this->load->view('admin/view_header');
	}

	
	function novkorisnik($greska = 0)
	{
		$this->load->helper('form');
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Registrujte se";
		$option['body'] = "onload='setFocus()'";			
		$option['head'] = "<SCRIPT language=JavaScript>
							function setFocus() {
								document.forma.username.focus();
							}
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']='Uneto u bazu!';}
		elseif ($greska==2){$option['greska']='Nedovoljno podataka, morate uneti sva 3 podatka!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_registracija',$option);
	}
	
	function registruj()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		$greska = $this->model_unos->unosregistracija($this->input->post('username'),$this->input->post('password'),$this->input->post('email'));
		redirect('/apo/novkorisnik/' . $greska, 'refresh');
	}
	function proizvodi($greska = 0, $page = 0)
	{
	
		$this->load->helper('form');
		function print_products($query){
				$queried = mysql_query($query);
				$menu = "";
					while ($result = mysql_fetch_array($queried)) {
					
						$menu .= '<tr id="'.$result['product_id'].'">';
						$menu .= '<td>' . $result['product_id'] . '</td><td style="overflow:hidden;">' . $result['product_name'] . '</td><td>' . $result['product_price'] . '</td><td>' . $result['description'] . '</td><td>
						<img width="20px" height="20px" src="'. base_url().'../uploads/' . $result['image'] . '"></td><td  style="overflow:hidden;">' . $result['image'] . '</td><td>' . $result['category_name'] . '<td onClick="Crud(this);"><img src="'. base_url().'/incl/images2/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a></td></td>';
						$menu .= '</tr>';
			}
			
			return $menu;
		}
		$option['upit'] = print_products("SELECT *
				FROM 
					`product`
					INNER JOIN `category` 
						ON (`product`.`category_id` = `category`.`category_id`) ORDER BY product_id LIMIT $page, 20;");
		$queried = mysql_query("SELECT count(*) as br
				FROM 
					`product`
					INNER JOIN `category` 
						ON (`product`.`category_id` = `category`.`category_id`);");
		$result = mysql_fetch_array($queried);
		$config['total_rows'] = $result['br'];
		$queried = mysql_query("SELECT *
					from `category`;");
					$menu = "";
		while ($result = mysql_fetch_array($queried)) {
			$menu .= '<option value="' . $result['category_id'] . '">' . $result['category_name'] . '</option>';
		}
		
		
		$config['category_name'] = $result['category_name'];
						
		$this->load->library('pagination');
		$config['base_url'] = site_url('apo/proizvodi/0');
		
		$config['per_page'] = 20; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$option['pagination'] = $this->pagination->create_links();
		$option['page'] = $page; //escape this!!!!
		
		$forma = form_open_multipart('apo/izmenaproizvoda/'.$page, array('name'=>'forma'));
		
		$brisanjek = site_url("apo/brisanjeproizvoda/");
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Svi proizvodi";	
		$option['head'] = "<SCRIPT language=JavaScript>
		function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
							function Crud(td){
								id = td.parentNode.childNodes[0].textContent;
								product_name = td.parentNode.childNodes[1].textContent;
								product_price = td.parentNode.childNodes[2].textContent;
								description = td.parentNode.childNodes[3].textContent;
								image = td.parentNode.childNodes[5].textContent;
								kategorija = td.parentNode.childNodes[6].textContent;
								var tr = td.parentNode;
								tr.innerHTML = '<td colspan=5>$forma<input type=\"hidden\" value=\"' + id + '\" name = \"product_id\" />naziv:<input type=\"text\" size=\"15\" name=\"product_name\" value=\"' + product_name + '\" /><br>cena:<input type=\"text\" size=\"15\" name=\"product_price\" id=\"txtChar\" onkeypress=\"return isNumberKey(event)\"value=\"' + product_price + '\" /><br>opis:<textarea name=\"description\" rows=\"5\" cols=\"30\">' + description + '</textarea><br>slika:<input type=\"file\" name=\"userfile\"/>' + image + '<br>kategorija:<select name=\"category_id\">" . $menu . "</select><input type=\"submit\" value=\"Snimi\"></td>';
								
								var lista = tr.getElementsByTagName('select')[0];
								for (var i = 0; i < lista.childNodes.length; i++) {
								  element = lista.childNodes[i];
								  if (element.innerHTML==kategorija){
									element.defaultSelected = true;
									element.selected = true;
								  }
								}
							}
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.childNodes[0].textContent;
								brisanjek = '$brisanjek';
							}
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}//<input type=\"text\" size=\"35\" name=\"description\" value=\"' + description + '\" />
		elseif ($greska==1){$option['greska']=' Uneto u bazu!';}
		elseif ($greska==2){$option['greska']=' Nedovoljno podataka, morate uneti sva 3 podatka!';}
		elseif ($greska==4){$option['greska']=' Slika je prevelika!';}
		elseif ($greska==5){$option['greska']=' Slika nije izmenjena!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_proizvodi',$option);
		
	}
	
	function izmenaproizvoda($page = 0){
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$config['upload_path'] = './../uploads/';
		$config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
		$config['max_size']	= '150';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$greska = 5;
			$error = array('error' => $this->upload->display_errors());
			//var_dump($error);
			if (strpos($error["error"], "larger than the permitted") > 0)
			{
				$greska = 4;
				redirect('/apo/proizvodi/' . $greska . '/'.$page, 'refresh');
				//die('UKUNFDSFDS');
			}
			
			if (strpos($error["error"], "uploaded file exceeds the maximum") > 0)
			{
				$greska = 4;
				redirect('/apo/proizvodi/' . $greska . '/'.$page, 'refresh');
				//die('UKUNFDSFDS');
			}
			$slika="";
			//napraviti stranicu za izjavljivanje greske
			//
			//$this->load->view('admin/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$slika = $data['upload_data']['file_name'];
			$this->model_unos->resizeslike($data['upload_data']['full_path']);
			//$this->load->view('upload_success', $data);
		}
		
		//$this->input->post('userfile')
		$greska = $this->model_unos->izmenaproizvoda($this->input->post('product_name'),$this->input->post('product_price'),$this->input->post('description'),$slika,$this->input->post('category_id'),$this->input->post('product_id'));
		redirect('/apo/proizvodi/' . $greska.'/'.$page, 'refresh');
	}
	
	function brisanjekategorije($category_id)
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		//$category_id = end($this->uri->segment_array());
		//die ($category_id);
		IF (!$this->model_unos->isproizvodkategorija($category_id)){
		
		$greska = $this->model_unos->brisanjekategorije($category_id);
		//$greska = $this->model_unos->brisanjekategorije($id);
		redirect('/apo/unosnovekategorije/' . $greska, 'refresh');
		}else{
		$greska = 3;
		redirect('/apo/unosnovekategorije/' . $greska, 'refresh');
		}
	}
	
	function brisanjeproizvoda($idpro)
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		
		$greska = $this->model_unos->brisanjeproizvoda($idpro);
		redirect('/apo/proizvodi/' . $greska, 'refresh');
	}
	
	function administracija($greska = 0)
	{
		$this->load->helper('form');
		
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Unos novog administratora";
		$option['body'] = "onload='setFocus()'";			
		$option['head'] = "<SCRIPT language=JavaScript>
							<!--
							function setFocus() {
								document.forma.korime.focus();
							}
							 
							function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
						   //-->
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=', Uneto u bazu!';}
		elseif ($greska==2){$option['greska']=', Korisnik već postoji.';}
		elseif ($greska==3){$option['greska']=', Pogrešno korisničko ime ili lozinka.';}
		elseif ($greska==4){$option['greska']=', Unesite sve podatke.';}
		elseif ($greska==5){$option['greska']=', Lozinka je uspešno izmenjena.';}
		else {$option['greska']=' Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_administracija',$option);
	}	
	function novadmin(){
		$this->load->model('model_admin');
		if (!($this->input->post('korime')) or (!($this->input->post('lozinka')))){
			//return 4;
			redirect('/apo/administracija/4', 'refresh');
		}
		$greska = $this->model_admin->novadmin($this->input->post('korime'), $this->input->post('lozinka'));
		redirect('/apo/administracija/' . $greska, 'refresh');
	}
	function promenalozinke(){
		$this->load->model('model_admin');
		if (!($this->input->post('korime')) or (!($this->input->post('oldlozinka'))) or (!($this->input->post('newlozinka')))){
			//return 4;
			redirect('/apo/administracija/4', 'refresh');
		}
		$greska = $this->model_admin->promenalozinke($this->input->post('korime'), $this->input->post('oldlozinka'), $this->input->post('newlozinka'));
		redirect('/apo/administracija/' . $greska, 'refresh');
	}
	
	function brisanjekorisnika($greska = 0)
	{
		$this->load->helper('form');
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Brisanje korisnika";
		$option['body'] = "onload='setFocus()'";		
		$brisanjek =  site_url("apo/briskor/");
		$option['head'] = "<SCRIPT language=JavaScript>
							<!--
							function setFocus() {
								document.forma.korime.focus();
							}
							 
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.childNodes[0].childNodes[0].value;
								brisanjek = '$brisanjek';
							}
						   //-->
							</script>";
		$query = mysql_query("SELECT * from `user` order by isadmin desc;");
		$ispis = "";
		
		echo "<table>";
			while ($result = mysql_fetch_array($query)) {
			if ($result['isadmin']>0){$isadmin="Da";}else{$isadmin="Ne";}
				$ispis .= '<tr><td><input type="hidden" value="' . $result['user_id'] . '">' . $result['username'] . '</td><td>' . $isadmin . '</td>
				<td>';
				if ($result['isadmin']<$this->session->userdata('admin')){
					$ispis .= '<a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a>';
				}
				$ispis .= '</td></tr>';
			}
		echo "</table>";
		$option['upit'] = $ispis;
		$this->load->view('admin/view_header',$option);
		
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=', Korisnik je uspešno obrisan!';}
		elseif ($greska==2){$option['greska']=', Niste ovlašćeni za brisanje korisnika!';}
		elseif ($greska==3){$option['greska']=', Pogrešno korisničko ime ili lozinka.';}
		elseif ($greska==4){$option['greska']=', Unesite sve podatke.';}
		elseif ($greska==5){$option['greska']=', Lozinka je uspešno izmenjena.';}
		else {$option['greska']=' Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_brisanjekorisnika',$option);
	}
	
	function briskor($user_id){
		$this->load->helper('url');
		$this->load->model('model_admin');
		$greska = $this->model_admin->briskor($user_id);
		redirect('/apo/brisanjekorisnika/' . $greska, 'refresh');
	}
	function pretraga(){
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('model_unos');
		$nazivi = $this->model_unos->pretraganaziv($this->input->post('pretraga'));
		$opisi = $this->model_unos->pretragaopis($this->input->post('pretraga'));
		$brisanjek = site_url("apo/brisanjeproizvoda/");
		$queried = mysql_query("SELECT *
					from `category`;");
					$menu = "";
		while ($result = mysql_fetch_array($queried)) {
			$menu .= '<option value="' . $result['category_id'] . '">' . $result['category_name'] . '</option>';
		}
		$forma = form_open_multipart('apo/izmenaproizvoda/', array('name'=>'forma'));
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Pretraga";	
		$option['head'] = "<SCRIPT language=JavaScript>
		function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
							function Crud(td){
								id = td.parentNode.childNodes[0].textContent;
								product_name = td.parentNode.childNodes[1].textContent;
								product_price = td.parentNode.childNodes[2].textContent;
								description = td.parentNode.childNodes[3].textContent;
								image = td.parentNode.childNodes[5].textContent;
								kategorija = td.parentNode.childNodes[6].textContent;
								td.parentNode.innerHTML = '<td colspan=5>$forma<input type=\"hidden\" value=\"' + id + '\" name = \"product_id\" />naziv:<input type=\"text\" size=\"15\" name=\"product_name\" value=\"' + product_name + '\" /><br>cena:<input type=\"text\" size=\"15\" name=\"product_price\" id=\"txtChar\" onkeypress=\"return isNumberKey(event)\"value=\"' + product_price + '\" /><br>opis:<textarea name=\"description\" rows=\"5\" cols=\"35\">' + description + '</textarea><br>slika:<input type=\"file\" name=\"userfile\"/>' + image + '<br>kategorija:<select name=\"category_id\">" . $menu . "</select><input type=\"submit\" value=\"Snimi\"></td>';
							}
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.childNodes[0].textContent;
								brisanjek = '$brisanjek';
							}
							</script>";
		$option['nazivi'] = $nazivi;	
		$option['opisi'] = $opisi;	
		$this->load->view('admin/view_header',$option);		
		$this->load->view('admin/view_pretraga',$option);		
	}
	function slikekatagorije()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$config['upload_path'] = './../uploads/slikekategorije/';
		$config['allowed_types'] = 'gif|bmp|jpg|jpeg|png';
		$config['max_size']	= '150';
		$config['max_width']  = '1200';
		$config['max_height']  = '1200';

		$this->load->library('upload', $config);
		$greska = 0;
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$slika="";
			$greska = 4;
			//var_dump($error);
			//napraviti stranicu za izjavljivanje greske
			//$this->load->view('admin/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$slika = $data['upload_data']['file_name'];
			$this->model_unos->resizeslikekategorije($data['upload_data']['full_path']);
			//$this->load->view('upload_success', $data);
		}
		if ($greska != 4){
			$greska = $this->model_unos->unosslikekategorije($this->input->post('category_id'), $slika);
		}
		redirect('/apo/unosnoveslike/' . $greska, 'refresh');
	}
	function unosnoveslike($greska = 0)
	{
		$this->load->helper('form');
		
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Unos nove slike";
		$option['body'] = "onload='setFocus()'";			
		$option['head'] = "<SCRIPT language=JavaScript>
							<!--
							function setFocus() {
								document.forma.product_name.focus();
							}
							 
							function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
						   //-->
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=' Uneto u bazu!';}
		elseif ($greska==2){$option['greska']=' Morate odabrati jednu sliku!';}
		elseif ($greska==3){$option['greska']=' Morate odabrati kategoriju i jednu sliku!';}
		elseif ($greska==4){$option['greska']=' Slika je prevelika!';}
		else {$option['greska']=' Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_unosnoveslike',$option);
	}
	function brisanjeslike($greska = 0)
	{
	
		$this->load->helper('form');
		function print_products($query){
				$queried = mysql_query($query);
				$menu = "";
					while ($result = mysql_fetch_array($queried)) {
					
						$menu .= '<tr id="'.$result['id'].'">';
						$menu .= '<td>' . $result['category_name'] . '</td><td><img src="' . base_url('../uploads/slikekategorije/' .$result['image']) . '"></td></td>
            <td><a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a></td></td>';
						$menu .= '</tr>';
			}
			
			return $menu;
		}
		$option['upit'] = print_products("SELECT *
				FROM 
					`category`
					INNER JOIN `category_images` 
						ON (`category`.`category_id` = `category_images`.`category_id`) ORDER BY category_images.category_id;");
		$queried = mysql_query("SELECT count(*) as br
				FROM 
					`category_images`
					INNER JOIN `category` 
						ON (`category_images`.`category_id` = `category`.`category_id`);");
		$result = mysql_fetch_array($queried);
		$config['total_rows'] = $result['br'];  //za paginaciju
		$queried = mysql_query("SELECT *
					from `category`;");
					$menu = "";
		while ($result = mysql_fetch_array($queried)) {
			$menu .= '<option value="' . $result['category_id'] . '">' . $result['category_name'] . '</option>';
		}
		
		
		$config['category_name'] = $result['category_name'];
						
		/*
		$this->load->library('pagination');
		
		$config['base_url'] = 'http://localhost/apo/index.php/apo/proizvodi/0';
		
		$config['per_page'] = 20; 
		$config['uri_segment'] = 4; 
		
		$this->pagination->initialize($config); 
		
		$option['pagination'] = $this->pagination->create_links();
		$option['page'] = $page; //escape this!!!!
		*/
		//$forma = form_open_multipart('apo/izmenaproizvoda/'.$page, array('name'=>'forma'));
		
		$brisanjek = site_url("apo/obrisisliku/");
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Sve slike";	
		$option['head'] = "<SCRIPT language=JavaScript>
		function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
							
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.id;
								brisanjek = '$brisanjek';
							}
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}//<input type=\"text\" size=\"35\" name=\"description\" value=\"' + description + '\" />
		elseif ($greska==1){$option['greska']=' Slika je obrisana!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_brisanjeslike',$option);
		
	}
	function obrisisliku($id){
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$greska = $this->model_unos->brisanjeslike($id);
		redirect('/apo/brisanjeslike/' . $greska, 'refresh');
	}
	function brisikomentar($greska = 0)
	{
	
		$this->load->helper('form');
		function print_products($query){
				$queried = mysql_query($query);
				$menu = "";
					while ($result = mysql_fetch_array($queried)) {
					
						$menu .= '<tr id="'.$result['comment_id'].'">';
						$menu .= '<td>' . $result['comment'] . '</td><td>' . $result['product_name'] . '</td><td>' . $result['datetime'] . '</td><td>' . $result['username'] . '</td></td>
            <td><a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a></td></td>';
						$menu .= '</tr>';
			}
			
			return $menu;
		}
		$option['upit'] = print_products("SELECT * FROM `comment`
					INNER JOIN `product` ON (`comment`.`product_id` = `product`.`product_id`)
					INNER JOIN `user` ON (`comment`.`user_id` = `user`.`user_id`)
					ORDER BY comment.datetime;");

					$menu = "";

		
						
		$brisanjek = site_url("apo/brisanjekomentara/");
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Svi komentari";	
		$option['head'] = "<SCRIPT language=JavaScript>
		function isNumberKey(evt)
						   {
							  var charCode = (evt.which) ? evt.which : event.keyCode;
							  if (charCode != 46 && charCode > 31 
								&& (charCode < 48 || charCode > 57))
								 return false;

							  return true;
						   }
							
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.id;
								brisanjek = '$brisanjek';
							}
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}//<input type=\"text\" size=\"35\" name=\"description\" value=\"' + description + '\" />
		elseif ($greska==1){$option['greska']=' Komentar je obrisan!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_brisanjekomentara',$option);
		
	}
	function brisanjekomentara($comment_id){
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$greska = $this->model_unos->brisikomentar($comment_id);
		redirect('/apo/brisikomentar/' . $greska, 'refresh');
	}
}
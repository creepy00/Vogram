<?php
class Vog extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->model('model_login');
		$this->load->view('view_header');
		$this->load->view('view_indexlog');
		
	}
	
	public function indexlog()
	{
	
		$this->load->helper('form');
		$this->load->model('model_login');
		$this->load->view('view_header');
		$this->load->view('view_indexlog');
		
		
	}
	
	function unosnovogprojekta($greska = 0)
	{
		$this->load->helper('form');
		
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Unos novog projekta";
		$option['body'] = "onload='setFocus()'";			
		
		$this->load->view('view_header',$option);
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=', Uneto u bazu!';}
		elseif ($greska==2){$option['greska']=', Nedovoljno podataka: morate uneti sve sem video linka i linka!';}
		else {$option['greska']=', Nepredvidjena greška... #1453SystemHALTED! Restart application.';}
		$this->load->view('view_unosnovogprojekta',$option);
	}
	
	function unesiprojekat()
	{
		$this->load->helper('url');
		$this->load->model('model_unos');
		
		$explodeLinks = array(explode("\n",$this->input->post('links')));
		$links = serialize($explodeLinks);

		//die($links);
		
		$greska = $this->model_unos->unosprojekta($this->input->post('type'),$this->input->post('text'),$this->input->post('video_link'),$links,$this->input->post('sinopsis'),$this->input->post('name'));
		redirect('/vog/unosnovogprojekta/' . $greska, 'refresh');
	}
	
	function brisanjeprojekta($greska = 0)
	{
		$this->load->helper('form');
		$option['title'] = "Brisanje projekta";
		$option['body'] = "onload='setFocus()'";		
		$brisanjek =  site_url("vog/brisproj/");
		$option['head'] = "<SCRIPT language=JavaScript>
							<!--
							function Crudkatdel(td){
								id = td.parentNode.parentNode.parentNode.childNodes[0].childNodes[0].value;
								brisanjek = '$brisanjek';
							}
						   //-->
							</script>";
		$query = mysql_query("SELECT * from `projects` order by id desc;");
		$ispis = "";
		
		//echo "<table>";
		
			while ($result = mysql_fetch_array($query)) {
				$ispis .= '<tr><td><input type="hidden" value="' . $result['id'] . '">' . $result['name'] . '</td><td>' . $result['sinopsis'] . '</td><td>' . $result['text'] . '</td><td>' . unserialize($result['links']) . '</td><td><a href="' . $result['video_link'] . '" target="_blank">' . $result['video_link'] . '</a></td><td>';
				$ispis .= '<a href="#" class="ask"><img src="'. base_url().'/incl/images2/trash.png" alt="" title="" border="0" /></a>';
				$ispis .= '</td></tr>';
			}
		//echo "</table>";
		$option['upit'] = $ispis;
		$this->load->view('view_header',$option);
		
		if ($greska==0){$option['greska']='';}
		elseif ($greska==1){$option['greska']=', Projekat je uspešno obrisan!';}
		elseif ($greska==2){$option['greska']=', Niste ovlašćeni za brisanje korisnika!';}
		elseif ($greska==3){$option['greska']=', Pogrešno korisničko ime ili lozinka.';}
		elseif ($greska==4){$option['greska']=', Unesite sve podatke.';}
		elseif ($greska==5){$option['greska']=', Lozinka je uspešno izmenjena.';}
		else {$option['greska']=' Nepredvidjena greška... #1453SystemHALTED! Restart application.';}
		$this->load->view('view_brisanjeprojekta',$option);
	}
	
	function brisproj($id){
		$this->load->helper('url');
		$this->load->model('model_brisanje');
		$greska = $this->model_brisanje->brisproj($id);
		redirect('/vog/brisanjeprojekta/' . $greska, 'refresh');
	}
}
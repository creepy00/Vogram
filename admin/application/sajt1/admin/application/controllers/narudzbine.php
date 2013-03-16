<?php
class Narudzbine extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
	}
	
	public function index($greska = 0, $page = 0)
	{
	
		$this->load->helper('form');
		function print_products($query){
		$menu = "";
				if($queried = mysql_query($query)){
				
					while ($result = mysql_fetch_array($queried)) { //orders
						//$menu .= '<h3></h3>';
						$ukupno = 0;
						$i = 0;
						$menu1 = "";
						$sql = "select * from items where order_id = '" . $result['order_id'] . "'";
						$results = mysql_query($sql);
						while ($result1 = mysql_fetch_array($results)) { //items
							$menu1 .= '<tr><td>' . $result1['product_name'] . '</td>';
							$menu1 .= '<td>' . $result1['quantity'] . '</td>';
							$menu1 .= '<td>' . $result1['product_price'] . '</td>';
							$menu1 .= '<td>' . $result1['sum_price'] . '</td></tr>';
							$ukupno += $result1['sum_price'];
							$i++;
						}
						$datum = explode(' ',$result['datetime']);
						$datum = $datum[0];
						$novidatum = explode('-',$datum);
						$novidatum = $novidatum[2].'.'.$novidatum[1].'.'.$novidatum[0].'.';
						
						$menu .= '<tr id=' . $result['order_id'] . '>';
						$menu .= '<td colspan=2 rowspan=' . ($i+1) . '>' . $result['surname'] . ' ' . $result['name'] . '<br/>';
						$menu .= '' . $result['postal'] . ', ' . $result['city'] . '<br/>' . $result['address'] . '<br/>';
						$menu .= '' . $result['phone'] . '<br/>';
						$menu .= '' . $result['email'] . '<br/>';
						$menu .= 'datum narudžbine: ' . $novidatum . '</td>';
						$menu .= $menu1;
						$menu .= '</tr><tr><td colspan=4 style="background-color:#E0FfF0;"> Ukupno: ' . $ukupno . ' din</td>';
						if ($result['shipped']==0){
							$menu .= '<td style="background-color:#E0FfF0;">' . anchor("narudzbine/isporuceno/" . $result['order_id'], "Označi kao isporučeno") . '</td>';
						} else {
							$menu .= '<td style="background-color:#E0FfF0;">Isporučeno</td>';
						}
						if ($result['payed']==0){
							$menu .= '<td style="background-color:#E0FfF0;">' . anchor("narudzbine/placeno/" . $result['order_id'], "Označi kao plaćeno") . '</td>';
						} else {
							$menu .= '<td style="background-color:#E0FfF0;">Plaćeno</td>';
						}
						
						$menu .= '</tr>';

					}
				}
			
			return $menu;
		}
		$option['upit'] = print_products("SELECT *
				FROM 
					`orders` order by (shipped and payed) asc, order_id LIMIT $page, 20;");
				function totalproducts()
				{
					$sql = "SELECT * FROM orders";
						//echo $sql;
						$query = $this->db->query($sql);
						return $query->num_rows();
				}
		
		
						
		$this->load->library('pagination');
		//$config['base_url'] = 'http://localhost/apo/index.php/apo/proizvodi/0';
		$config['base_url'] = site_url('narudzbine/index/0');
		$config['per_page'] = 20; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config); 
		$option['pagination'] = $this->pagination->create_links();
		$option['page'] = $page; //escape this!!!!
		
		$forma = form_open_multipart('apo/izmenaproizvoda/'.$page, array('name'=>'forma'));
		
		$brisanjek = site_url("apo/brisanjeproizvoda/");
		$option['footer'] = "TEST!!!!!!!!!!!!!!";
		$option['title'] = "Narudžbine";	
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
								id = td.parentNode.parentNode.parentNode.childNodes[0].textContent;
								brisanjek = '$brisanjek';
							}
							</script>";
		$this->load->view('admin/view_header',$option);
		if ($greska==0){$option['greska']='';}//<input type=\"text\" size=\"35\" name=\"description\" value=\"' + description + '\" />
		elseif ($greska==1){$option['greska']=' Izvršeno!';}
		elseif ($greska==2){$option['greska']=' Greška!';}
		else {$option['greska']='Nepredvidjena greska... #1453SystemHALTED! Restart application.';}
		$this->load->view('admin/view_narudzbine', $option);
		
	}
	
	public function isporuceno($id, $page = 0)
	{
		$this->load->helper('url');
		$this->load->model('model_narudzbine');
		$greska = $this->model_narudzbine->isporuceno($id);
		redirect('/narudzbine/index/' . $greska.'/'.$page.'#'.$id, 'refresh');
	}
	public function placeno($id, $page = 0)
	{		
		$this->load->helper('url');
		$this->load->model('model_narudzbine');
		$greska = $this->model_narudzbine->placeno($id);
		redirect('/narudzbine/index/' . $greska.'/'.$page.'#'.$id, 'refresh');
	}
}
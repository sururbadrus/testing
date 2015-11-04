<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
       
		$this->load->model('m_global');

	}
	function json(){
		
		$query=$this->db->query("select * from (SELECT customerNumber id,concat(customerName,' ',contactLastName) name FROM customers) tt where name like '%".$this->input->post('search')."%' limit 10" );
		$query=$query->result_array();
		//echo json_encode($query); exit();
		echo json_encode($query);
		}
	public function index() {
		$data_header["dd"]=true; 
		$data_header["dp"]=true; 
		$data_header["ac"]=true; 
		$data_header["dt_loc"]=true; 
		$data_header["dt_svr"]=true; 
		if($this->session->userdata('logged_in')){
			$tm= $this->m_global->tampil_header();
			$data_header["tampil_menu"]=$tm; 
		
		}else{
			
			$data_header["tampil_menu"]=''; 
			
		}
		$data["fk_ms_bank_id57"]=$this->m_global->getcombo("select id,nama_bank AS nama from k_ms_bank where aktif=1");
		$data_header["profil"] ='';
		$data['tbl']=' <table id="tblku" class="table display" cellspacing="0" width="100%">
       
        <thead>
			
            <tr>
				<th>NO</th>
                <th>fk_ms_bank_id</th>
                <th>id</th>
                <th>NAMA BANK</th>
                <th>ALAMAT BANK</th>
                <th>NO REK</th>
               
               
            </tr>
        </thead>
		<tfoot>
		<tr>
			<th>NO</th>
                <th class="filter_column filter_text">fk_ms_bank_id</th>
                <th>id</th>
                <th class="filter_column filter_text">NAMA BANK</th>
                <th class="filter_column filter_text">ALAMAT BANK</th>
                <th class="filter_column filter_text">NO REK</th>
		</tr>
	</tfoot>
 
        
        
        </table>';
		$this->load->view('charisma/header_menu',$data_header);
		$this -> load -> view('tester/datatable__',$data);
		 $this->load->view('charisma/footer');
	}
	
	public function dataTable(){
		$sql="SELECT
    k_ms_bank.nama_bank
    , k_ms_detail_bank.alamat
    , k_ms_detail_bank.no_rekening
    , k_ms_detail_bank.fk_ms_bank_id
    , k_ms_detail_bank.id
FROM
    k_ms_detail_bank
    INNER JOIN k_ms_bank 
        ON (k_ms_detail_bank.fk_ms_bank_id = k_ms_bank.id); ";
		$data_tbl=array();
		$sql_query=$this->db->query($sql);
		$no=1;
		foreach($sql_query->result_array() as $row ){
			$data_tbl[]=array($no,$row['fk_ms_bank_id'],$row['id'],$row['nama_bank'],$row['alamat'],$row['no_rekening']);
			$no++;
			}
		//print_r($data_tbl); exit();
		echo json_encode(array('data'=>$data_tbl));
		
	}
	
	public function dataTable_load(){
		$sql="SELECT customerNumber,customerName,contactLastName,contactFirstName,phone,postalCode,country FROM customers ";
		$data_tbl=array();
		$sql_query=$this->db->query($sql);
		$no=1;
		foreach($sql_query->result_array() as $row ){
			$data_tbl[]=array($no,$row['customerNumber'],$row['customerName'],$row['contactLastName'],$row['contactFirstName'],$row['phone'],$row['postalCode'],$row['country']);
			$no++;
			}
		//print_r($data_tbl); exit();
		echo json_encode(array('data'=>$data_tbl));
		
	}
}
?>
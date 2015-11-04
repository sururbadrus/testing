<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
        class Customer extends CI_Controller {

        public function __construct() {
                parent::__construct();
               
                $this->load->library("session" );
				 $this->load->helper("form" ); 
                     $this->load->helper("url" ); 
                     $this->load->helper("array" ); 
                     $this->load->helper("security" ); 
                     
		// $this->load->model('customer_model');
		$this->load->model('m_global');
		
            
        }

		function index(){
		$data_header["pnm"]="Nama Page"; 
		$data_header["dt_loc"]=true; 
		$data_header["dt_svr"]=false; 
		$data_header["tampil_menu"]=''; 
		//$this->m_menu->tampil_menu();
		$data_header["profil"] ='';
		//$this->m_menu->tampil_profil();
		
			$data["customername16"]=gmdate("d-m-Y",mktime(date("H")+7));
			$data_header["dp"]=true;   
			$data['tbl_dt16']=' <table id="dt16" class="table display" cellspacing="0" width="100%">
               <thead>
			      <tr><th>CUSTOMERNAME</th><th>CONTACTLASTNAME</th><th>CONTACTFIRSTNAME</th><th>PHONE</th><th>CUSTOMERNUMBER</th>	
				 </tr>
        		</thead>
 	       </table>';
		$data["ub"]='';
		$this->load->view('charisma/header_menu',$data_header);
        $this->load->view('v_customer',$data);
        $this->load->view('charisma/footer');
		
    }  

		function json_dt16(){
		$i=0;
		$no=0;
			$sql="select customernumber,customername,contactlastname,contactfirstname,phone from customers";
		 
		$data1 = $this->m_global->grid_view($sql)->result_array();
		
		$data_tbl=array();
		foreach($data1 as $line){
			
			$data_tbl[]=array($line['customername'],$line['contactlastname'],$line['contactfirstname'],$line['phone'],$line['customernumber']); 
	    	
			
			$i++;
			$no++;
		}
		echo json_encode(array('data'=>$data_tbl));
		
		} 
		function crud() {
		
	    $data_post=$this->security->xss_clean($_POST);
	  	echo json_encode(array('ket'=>'Berhasil'));
		}
	
		}
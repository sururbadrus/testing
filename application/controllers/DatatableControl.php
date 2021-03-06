<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DatatableControl extends CI_Controller {
	  public function __construct() {

        parent::__construct();
		
		$this->load->helper('menu_item');
		
	  }
	public function index() {
		$data["dd"]=true; 
		$data["dp"]=true; 
		$data["ac"]=true; 
		$data["dt_lcl"]=true; 
		$data["dt_svr"]=true; 
		$this -> load -> view('charisma/header_menu', $data);
		$this -> load -> view('datatable');
	}
	
	public function dataTable() {
		$this -> load -> library('Datatable', array('model' => 'order_dt', 'rowIdCol' => 'orderNumber'));
		
		$jsonArray = $this -> datatable -> datatableJson(array(
                'orderDate' => 'date',
                'creditLimit' => 'currency'
            ));
		$this -> output -> set_header("Pragma: no-cache");
        $this -> output -> set_header("Cache-Control: no-store, no-cache");
        $this -> output -> set_content_type('application/json') -> set_output(json_encode($jsonArray));
		
	}
	
}
?>
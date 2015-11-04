<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report extends CI_Controller {
 
	public function pdf()
	{
		$this->load->library('pdfgenerator');
 
		$data['users']=array(
			array('firstname'=>'Agung','lastname'=>'Setiawa nsadasdas dasdsa dsadasdsa dasdasda sdasd','email'=>'ag@setiawan.com'),
			array('firstname'=>'Hauril','lastname'=>'Maulida Nisfar','email'=>'hm@setiawan.com'),
			array('firstname'=>'Akhtar','lastname'=>'Setiawan','email'=>'akh@setiawan.com'),
			array('firstname'=>'Gitarja','lastname'=>'Setiawan','email'=>'git@setiawan.com')
		);
 
	    $html = $this->load->view('pdf', $data, true);
	    
	    $this->pdfgenerator->generate($html,'contoh');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkbl extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$tgl_cair='2015-02-02';
		$hutang=12000000;
		$periode_hutang=12;
		$bunga=$hutang*(0.5/100);
		$periode_bayar=3;
		$bln_cair=2; 
		$bln_gross=3;
		$bln_bayar=5;
		$v_bunga=0;
		$v_pokok=$hutang/$periode_hutang;
		$v_periode_bayar=0;
		$hasil_data=array();
		$v_pokok1=0; $v_bunga=0;
		$ib=0;
		$bayar=0; $v_hutang=0;
		for($i=1; $i<=$periode_hutang; $i++){
			$ib++;
			$bayar+=$v_pokok;
			$v_pokok1+=$v_pokok;
			if($bln_bayar==12){
				
				$bln_gross=0;
				$v_bunga+=$bunga;
				$v_hutang=$hutang-$v_pokok1;
				$bunga=$v_hutang*(0.5/100);
		
			}else{
				
				$v_bunga+=$bunga;
				$v_hutang=$hutang;
			}
			
			
			if($ib==$periode_bayar){
				$ib=0;
				$hasil_data[]=array($bln_gross,$v_pokok,$v_hutang,$v_bunga,$bayar);
				$v_bunga=0;
			}
			
			$bln_gross++;
			}
			
		
			//print_r($hasil_data)."<br>";
			for($i=0; $i<count($hasil_data); $i++ ){
				echo $hasil_data[$i][0]." ". $hasil_data[$i][1]." ". $hasil_data[$i][2]." ". $hasil_data[$i][3]." ". $hasil_data[$i][4]."<br>";
			
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
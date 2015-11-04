<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function ubet(){
	
	$this->load->library('pdf');
	$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
	//$pdf->setPrintHeader(false);
	//$pdf->setPrintFooter(false);
	$pdf->SetPrintFooter(false);
//$pdf->SetAutoPageBreak(true, 9);
$pdf->SetFont('dejavusans', '', 10);
	//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->AddPage();
	$pdf->SetFillColor(255, 255, 127);
	//$pdf->SetFont('helvetica', 'B', 12);
	
	 //$pdf->getPageDimensions();
	//$hasBorder = false; //flag for fringe case
 	$sql="select customerName,contactLastName,contactFirstName from customers";
	$sqlq=$this->db->query($sql);
	$sqla=$sqlq->result_array();
	//print_r($sqla); //exit();
	$page=0;
foreach($sqla as $row) {
	$maxnocells = 0;
	$cellcount = 0;
	//write text first
	$startX = $pdf->GetX();
	$startY = $pdf->GetY();
	
	//draw cells and record maximum cellcount
	//cell height is 6 and width is 80
	$cellcount = $pdf->MultiCell(30,6,$row['customerName'],0,'L',0,0);
	if ($cellcount > $maxnocells ) {$maxnocells = $cellcount;}
	$cellcount = $pdf->MultiCell(80,6,$row['contactLastName'],0,'L',0,0);
	if ($cellcount > $maxnocells ) {$maxnocells = $cellcount;}
	$cellcount = $pdf->MultiCell(80,6,$row['contactFirstName'],0,'L',0,0);
	if ($cellcount > $maxnocells ) {$maxnocells = $cellcount;}
	$page++;
	$pdf->SetXY($startX,$startY);
 	//if($page>20){
		//$pdf->AddPage();
		//$page=0;
		//}
	//now do borders and fill
	//cell height is 6 times the max number of cells
	$pdf->MultiCell(30,$maxnocells * 6,'',1,'L',0,0);
	$pdf->MultiCell(80,$maxnocells * 6,'',1,'L',0,0);
	$pdf->MultiCell(80,$maxnocells * 6,'',1,'L',0,0);
 
	$pdf->Ln();
}
 
	//$pdf->Cell(240,0,'','T');  //last bottom border
		$pdf->Output('example_005.pdf', 'I');
		
		
		
		} 
	public function index()
	{
		$this->load->library('pdf');
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();
		$pdf->SetFillColor(255, 255, 127);
		$pdf->SetFont('helvetica', 'B', 12);
		//($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		
		$pdf->MultiCell(10, 8, "NO", 'LBT', 'C', true, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(30, 8, 'NO RM', 'LBT', 'C', true, 0, '', '', true, 0, false, true, 0, 'M',true);
		$pdf->MultiCell(59, 8, "NAMA PASIEN", 'LBT', 'C', true, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(10, 8, "SEX", 'LBT', 'C', true, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(13, 8, "UMR", 'LBT', 'C', true, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(70, 8, 'ALAMAT', 'LBTR', 'C', true, 1, '', '', true, 0, false, true, 0, 'M',true);
		$pdf->SetFont('helvetica', '', 11);
		$pdf->MultiCell(10, '', "1", 'LB', 'C', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(30, '', '000001223455', 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M',true);
		$pdf->MultiCell(59, '', "Sulaiman", 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(10, '', "L", 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(13, '', "20", 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(70, '', 'Jln Kembang No 10 Surabaya', 'LBR', 'L', false, 1, '', '', true, 0, false, true, 0, 'M',true);
		
		$pdf->MultiCell(10, '', "2", 'LB', 'C', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(30, '', '000001223454', 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M',true);
		$pdf->MultiCell(59, '', "H Naib bin arif bin soleh bin herman bin junidi bin kurniawan bin heri bin bintang bin karo karo bin saturasi bin sholeh", 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M', false);
		$pdf->MultiCell(10, '', "L", 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(13, '', "34", 'LB', 'L', false, 0, '', '', true, 0, false, true, 0, 'M', true);
		$pdf->MultiCell(70, '', 'Jln Kembang No 10 Surabaya', 'LBR', 'L', false, 1, '', '', true, 0, false, true, 0, 'M',true);
		
		
		$pdf->MultiCell(59, 11, "badger badger badger badger badger badger badger badger - mushroom! mushroom!", 'LB', 'L', false, 0, 50, 60, true, 0, false, false, 0, 'T', true);
		//Close and output PDF document
		$pdf->Output('example_005.pdf', 'I');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
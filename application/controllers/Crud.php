<?php
 
class Crud extends CI_Controller {
    private $controllername; // controller name
    private $fname; // form name
    private $form_title; // form tite
    private $modelname;// model tite
	private $model_other_name='m_global';
    private $listviewname;
    private $create_viewname;
	private $tselect;
	private $a_tselect=array();
	//private $;
	private $a_=array();
	private $jqgrid;
	private $a_jqgrid=array();
	private $ugrid;
	private $a_ugrid=array();
	private $loopfield='';
	private $sql='';
	private $loopfield_='';
	private $loopfield_s='';
	private $jdl_jqgrid='';
	private $desc_asc='';
	private $orderby='';
	private $join_s_id='';
	private $form_tampil = '';
	private $form_hiden =  '';
	private	$tipe_field =  '';
	private	$load_field =  '';
	private $caption_field_a=array();
	private	$form_tampil_a = array();
	private	$form_hiden_a = array();
	private	$tipe_field_a = array();
	private	$load_field_a = array();
	private	$join_field_form = array();
	
	private	$arr_aso_= array();
	private	$arr_aso_tselect= array();
	
	private $tbl_insert='';
	private $field_insert='';
	private $tbl_update='';
	private $field_update='';
	private $id_update='';
	private $tbl_delete='';
	private $id_delete='';
	
	private $full_q;
	private $tbl_pk;
    private $first_min_no = 5;
    private $style_col = 4;
    private $auther = "Shabeeb";
    private $auther_mail = "mail@shabeebk.com";
    private $created_date;
    private $header = 'charisma/header_menu';
    private $footer = 'charisma/footer';
    private $header_data = '';
    private $footer_data = 'footer';
    private $controller_data = '';
    private $model_data = '';
    private $create_data = '';
    private $list_data = '';
    private $library_list = array( "session");
    private $helper_list = array("form","url","array","security");
	private $gen_id = '';
	private $dd = array();
	private $dp = array();
	private $ac = array();
	private $penggunaan=1;
	private $marge_vh=array();
	private $marge_sh=array();
	private $arr_aso_form_hiden=array();
	private $arr_aso_form_tampil=array();
		

    public function __construct() {

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('zip');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('file');
		$this->load->helper('security');
        $this->load->helper('download');
        $this->created_date = date('Y-m-d ');
		$this->load->helper('array');
    }

    /**
     * Functon index
     * 
     * load the form and process
     * 
     * @auther shabeeb <mail@shabeebk.com>
     * @createdon  17-06-2014
     * @
     * 
     * @param type 
     * @return type
     * exceptions
     * 
     */
    public function index() {

      


		$data_header["dd"]=true; 
		$data_header["dp"]=true; 
		$data_header["ac"]=true; 
		$data_header["dt_loc"]=true; 
		$data_header["dt_svr"]=true;
		$data_header["tampil_menu"]=''; 
		$data_header["profil"] ='';
		$this->load->view('charisma/header_menu',$data_header);
        $this->load->view('ciig');
        $this->load->view('charisma/footer');
		
        
    }
	
	function download_data(){
		
            $data = '';
			$this->penggunaan=$this->input->post("penggunaan");
			$this->full_q = strtolower($this->input->post("full_q"));
           	$this->tselect = strtolower(trim($this->input->post("tselect")));
			$this->a_tselect = explode(',',$this->tselect);
			$this->hselect = strtolower(trim($this->input->post("hselect")));
			$this->a_hselect = explode(',',$this->hselect);
			$this->jqgrid = strtolower(trim($this->input->post("jqgrid")));
			$this->a_jqgrid = explode(',',$this->jqgrid);
			$this->ugrid = trim($this->input->post("ugrid"));
			$this->a_ugrid = explode(',',$this->ugrid);
			$this->jdl_jqgrid = trim($this->input->post("jdl_jqgrid"));
			$this->desc_asc = strtolower(trim($this->input->post("desc_asc")));
			$this->orderby = strtolower(trim($this->input->post("orderby")));
			
			$this->join_s_id = explode(',',($this->hselect.','.$this->tselect)); 
			
			$arr_aso_tselect_=array();
			for($ub=0; $ub<count($this->a_tselect); $ub++){
				
				$arr_aso_tselect_[$this->a_tselect[$ub]]=$this->a_tselect[$ub];
				
				}
			$arr_aso_hselect_=array();	
			for($ub=0; $ub<count($this->a_hselect); $ub++){
				
				$arr_aso_hselect_[$this->a_hselect[$ub]]=$this->a_hselect[$ub];
				
				}
			$this->arr_aso_hselect=$arr_aso_hselect_;
			$this->arr_aso_tselect=$arr_aso_tselect_;
			
			
			
			
			$this->marge_sh=array_merge($this->a_tselect,$this->a_hselect);
			
			
			
			$this->tbl_insert = explode(',',strtolower($this->input->post("tbl_insert")));
			$this->field_insert = explode('*',strtolower($this->input->post("field_insert")));
			
			$this->tbl_update = explode(',',strtolower($this->input->post("tbl_update")));
			$this->field_update = explode('*',strtolower($this->input->post("field_update")));
			$this->id_update = explode(',',strtolower($this->input->post("id_update")));
			
			$this->tbl_delete = explode(',',strtolower($this->input->post("tbl_delete")));
			$this->id_delete = explode(',',strtolower($this->input->post("id_delete")));
			
					
			$this->form_tampil = strtolower(trim($this->input->post("form_tampil")));
			$this->form_hiden = strtolower(trim($this->input->post("form_hiden")));
			$this->tipe_field = strtolower(trim($this->input->post("tipe_field")));
			$this->load_field = strtolower(trim($this->input->post("load_field")));
			
			$this->form_tampil_a = explode(',',$this->form_tampil);
			$this->form_hiden_a = explode(',',$this->form_hiden);
			$this->tipe_field_a = explode(',',$this->tipe_field);
			$this->load_field_a = explode('|',$this->load_field);
			$this->caption_field_a = explode(',',strtolower($this->input->post("caption_field")));
			$this->join_field_form = explode(',',($this->form_tampil.','.$this->form_hiden)); 
					
			$cname = strtolower($this->input->post("cname"));
			$this->controllername = str_replace(' ', '_', $cname);
            $this->fname = strtolower($this->input->post("fname"));
            $this->modelname = $this->controllername . '_model';
            $this->create_viewname = 'v_' . $this->controllername;
           
		  	$arr_aso_form_tampil_=array();
			for($ub=0; $ub<count($this->form_tampil_a); $ub++){
				
				$arr_aso_form_tampil_[$this->form_tampil_a[$ub]]=$this->form_tampil_a[$ub];
				
				}
			$arr_aso_form_hiden_=array();	
			for($ub=0; $ub<count($this->form_hiden_a); $ub++){
				
				$arr_aso_form_hiden_[$this->form_hiden_a[$ub]]=$this->form_hiden_a[$ub];
				
				}
			$this->arr_aso_form_hiden=$arr_aso_form_hiden_;
			$this->arr_aso_form_tampil=$arr_aso_form_tampil_;
		   
		   for($i=0; $i<count($this->tipe_field_a); $i++){
				if($this->tipe_field_a[$i]=='dd'){
					
					$this->dd[$this->form_tampil_a[$i]]=$this->load_field_a[$i];
					}
				else if($this->tipe_field_a[$i]=='dp'){
					
					$this->dp[]=$this->form_tampil_a[$i];
					}
				else if($this->tipe_field_a[$i]=='ac'){
					
					$this->ac[$this->form_tampil_a[$i]]=$this->load_field_a[$i];
					}
			}
		   
		   
            $this->controller_data = $controller = $this->build_controller();
            $this->create_data = $view_create = $this->build_view_create();
           
            
        		$this->load->helper('file');
				$data = $this->controller_data;
		
				if ( ! write_file('./application/controllers/'.$this->controllername.'.php', $data))
				{
					 echo 'Unable to write the file';
				}
				
				
				$data = $this->create_data;
		
				if ( ! write_file('./application/views/'.$this->create_viewname.'.php', $data))
				{
					 echo 'Unable to write the file';
				}
				
				if($this->penggunaan==1){
					echo json_encode(array('ket'=>'Generate Berhasil','url'=>$this->controllername)) ;
				}
				else
				{
					echo json_encode(array('ket'=>'Generate Berhasil','url'=>0)) ;
				}
                
				
	}
           
		

    /**
     * Functon buld controller
     * 
     * it will bult structure of controller
     * 
     * @auther shabeeb <me@shabeebk.com>
     * @createdon  17-06-2014
     * @
     * 
     * @param type 
     * @return type 
     * exceptions controller name empty
     * 
     */
    function build_controller() {

        $library_list = $this->library_list;
        $helper_list = $this->helper_list;
		$model_other_name= $this->model_other_name;

        $controller = '<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		
        class ' . ucfirst($this->controllername) . ' extends CI_Controller {

        public function __construct() {
                parent::__construct();
               
               ';
        if (!empty($library_list)) {
            foreach ($library_list as $lib) {

                $controller .= ' $this->load->library("' . $lib . '" );
				';
            }
        }


        if (!empty($helper_list)) {
            foreach ($helper_list as $help) {
                $controller .= ' $this->load->helper("' . $help . '" ); 
                    ';
            }
        }
        //$this->load->helper('url');

		$this->gen_id=gmdate("s",mktime(date("H")+7));
        $controller .= ' 
		// $this->load->model(\'' . $this->modelname . '\');
		$this->load->model(\'' . $this->model_other_name . '\');
		
            
        }

		function index(){
		$data_header["pnm"]="Nama Page"; 
		$data_header["dt_loc"]=true; 
		$data_header["dt_svr"]=false; 
		$data_header["tampil_menu"]=\'\'; 
		//$this->m_menu->tampil_menu();
		$data_header["profil"] =\'\';
		//$this->m_menu->tampil_profil();
		';
		foreach($this->dd as $in=>$val){
		$controller .= '
			$data["'.trim($in.$this->gen_id).'"]=$this->m_global->getcombo("'.trim($val).'");
			';
		}
		for($i=0; $i<count($this->dp); $i++){
			$controller .= '
			$data["'.trim($this->dp[$i].$this->gen_id).'"]=gmdate("d-m-Y",mktime(date("H")+7));
			';
			}
		if(count($this->dd)>0) $controller .= '$data_header["dd"]=true; ';	
		if(count($this->ac)>0) $controller .= '$data_header["ac"]=true;  ';	
		if(count($this->dp)>0) $controller .= '$data_header["dp"]=true;  ';	
		$hdg='';
		$this->marge_vh=array_merge($this->a_jqgrid,$this->a_hselect);
		
		$controller .= ' 
			$data[\'tbl_dt'.$this->gen_id.'\']=\' <table id="dt'.$this->gen_id.'" class="table display" cellspacing="0" width="100%">
               <thead>
			      <tr>';
				  for($i=0; $i<count($this->marge_vh); $i++){
					$controller .= '<th>'.strtoupper($this->marge_vh[$i]).'</th>';
					
					}
					
				$controller .= '	
				 </tr>
        		</thead>
 	       </table>\';';
			
			
		if($this->penggunaan==1){
		$controller .= '
		$data["ub"]=\'\';
		$this->load->view(\'' . $this->header . '\',$data_header);
        $this->load->view(\'' . $this->create_viewname . '\',$data);
        $this->load->view(\'' . $this->footer . '\');
		';
		}else{
			
		$controller .= '
		$data["ub"]=\'\';
		$this->load->view(\'' . $this->create_viewname . '\',$data);
        
		';
			}
		$controller .= '
    }';

        $controller .= '  

		function json_dt'.$this->gen_id.'(){
		$i=0;
		$no=0;
			';
			
		$sql='$sql="'.$this->full_q.'";
		';
		$controller .= $sql; 
		
	  	$controller .= ' 
		$data1 = $this->m_global->grid_view($sql)->result_array();
		';
		
		
		$i=0;
		$no=1;
		
		
		$loopfield_s='';		
		$jml_count_fs=count($this->marge_sh)-1;
			for($i=0; $i<count($this->marge_sh); $i++){
					if($jml_count_fs>$i){
						$loopfield_s .='$line[\''.trim($this->marge_sh[$i]).'\'],';
					}
					else{
						
						$loopfield_s .='$line[\''.trim($this->marge_sh[$i]).'\']';
						}
					}
					
		$controller .= '
		$data_tbl=array();
		foreach($data1 as $line){
			
			$data_tbl[]=array('.trim($loopfield_s).'); 
	    	
			
			$i++;
			$no++;
		}
		echo json_encode(array(\'data\'=>$data_tbl));
		
		}';
		
		
		$controller .= ' 
		function crud() {
		';
		$controller .= '
	    $data_post=$this->security->xss_clean($_POST);
	    switch (element("action", $data_post)) {
			
	        case \'Simpan\':
			';
			
			for($i=0; $i<count($this->tbl_insert); $i++){
			$arr_insr_=array();
			$arr_insr = explode(',',strtolower($this->field_insert[$i]));
			for($iub=0; $iub<count($arr_insr); $iub++){
				$controller .= '$arr_insr_[\''.trim($arr_insr[$iub]).'\']=element(\''.trim($arr_insr[$iub]).'\', $data_post);
				';
			}
				$controller .= '
				 $sql_q['.$i.']= $this->db->insert_string(\''.trim($this->tbl_insert[$i]).'\', $arr_insr_); 
				 ';
			
			}
			 $controller .= '
			 
			 	$this->db->trans_begin();
				
				for($iub=0; $iub<count($sql_q); $iub++){
					
					$this->db->query($sql_q[$iub]);
					
				}
			
				if ($this->db->trans_status() === FALSE)
				{
						$this->db->trans_rollback();
						echo json_encode(array(\'ket\'=>"Gagal Insert")) ;
				}
				else
				{
						$this->db->trans_commit();
						echo json_encode(array(\'ket\'=>"Penambahan Data Berhasil")) ;
				}
			 
				
				break;
	        case \'Ubah\':
				';
				for($i=0; $i<count($this->tbl_update); $i++){
			$arr_insr_=array();
			$arr_insr = explode(',',strtolower($this->field_update[$i]));
			for($iub=0; $iub<count($arr_insr); $iub++){
				$controller .= '$arr_insr_[\''.trim($arr_insr[$iub]).'\']=element(\''.trim($arr_insr[$iub]).'\', $data_post);
				';
			}
				$controller .= '
				$where['.$i.'] = \''.$this->id_update[$i].' =\'. element(\''.$this->id_update[$i].'\', $data_post);
				 $sql_q['.$i.']=  $this->db->update_string(\''.trim($this->tbl_insert[$i]).'\', $arr_insr_,$where['.$i.']); 
				 ';
			
			}
			 $controller .= '
				$this->db->trans_begin();
				
				for($iub=0; $iub<count($sql_q); $iub++){
					
					$this->db->query($sql_q[$iub]);
					
				}
			
				if ($this->db->trans_status() === FALSE)
				{
						$this->db->trans_rollback();
						echo json_encode(array(\'ket\'=>"Gagal Update")) ;
				}
				else
				{
						$this->db->trans_commit();
						echo json_encode(array(\'ket\'=>"Update Data Berhasil")) ;
				}
			 
	          
	            break;
	        case \'del\':
			';
				for($i=0; $i<count($this->tbl_delete); $i++){
			
				$controller .= '
				$this->db->where(\''.trim($this->id_delete[$i]).'\', element(\''.trim($this->id_delete[$i]).'\', $data_post));
				$this->db->delete(\''.trim($this->tbl_delete[$i]).'\');
				 ';
			
			}
			 $controller .= '
			echo json_encode(array(\'ket\'=>"Hapus Data Berhasil")) ;
	           
	        break;
		}
	}';
	
		
	// ini cut
		
		foreach($this->ac as $inx=>$val){
			$controller .= ' 
			function '.$inx.'(){
			$data=array();
			$ftr  = element(\''.$inx.'\',$_POST);
			$sql="'.$val.' where '.$inx.' like \'%".trim($ftr)."%\'";
			$hasil = $this->db->query($sql);
			 foreach ($hasil->result_array() as $row)
				 {
					$data[] = $row;
				 }
			
			echo json_encode($data);
			}
			';
		}

        $controller .= '  
		}';

        return $controller;
    }




function build_view_create() {

   		$view='';
		$view .= '
<div class="row">
	<div  class="col-lg-12">
		<div class="container">
		 <div class="row">
         	<h4 class="col-xs-12 col-sm-10 col-md-10 col-lg-10 "><u>'.ucfirst($this->fname).'</u></h4>
         </div>
		 
							<?php
								$attributes = array(\'class\' => \'form-group\',\'name\' => \'form_'.trim($this->controllername).$this->gen_id.'\', \'id\' => \'form_'.trim($this->controllername).$this->gen_id.'\');
								echo form_open(\'\', $attributes);
								?>
								';
								
								for($i=0; $i<count($this->form_hiden_a); $i++){
				
					 $view .= '<input name="'.trim($this->form_hiden_a[$i]).$this->gen_id.'" id="'.trim($this->form_hiden_a[$i]).$this->gen_id.'" type="hidden" value="" />
								   ';}
					$view .= '						   
		<div class="row">';
        $p = 0;
		for($i=0; $i<count($this->form_tampil_a); $i++){
				
				if($this->tipe_field_a[$i]=='dd'||$this->tipe_field_a[$i]=='chk'||$this->tipe_field_a[$i]=='ta'){
					if($this->tipe_field_a[$i]=='dd'){// dropdwon
						$view .= '   
					 <div class="col-xs-'.($this->style_col*2).' col-sm-'.$this->style_col.' col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
					 	<label>'.ucfirst(trim($this->caption_field_a[$i])).'</label>
                           <div class="field">
						  <?php echo form_dropdown(\''.trim($this->form_tampil_a[$i].$this->gen_id).'\',$'.trim($this->form_tampil_a[$i].$this->gen_id).',\'\',\'id="'.trim($this->form_tampil_a[$i].$this->gen_id).'" data-live-search="true" class="form-control selectpicker dropdown validate[required]" \')?>
							</div>
                      </div>
					  ';
						}
					else if($this->tipe_field_a[$i]=='chk'){ //cheked
						$view .= '   
					  <div class="col-xs-'.($this->style_col*2).' col-sm-'.$this->style_col.' col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
					 	 <label>'.ucfirst(trim($this->caption_field_a[$i])).'</label>
                         	<div class="field" style="padding-top: 2.2%;">
								<input name="'.trim($this->form_tampil_a[$i].$this->gen_id).'" id="' . trim($this->form_tampil_a[$i].$this->gen_id) . '" type="checkbox"  class="validate[required]" placeholder="' . ucfirst(trim($this->caption_field_a[$i])) . '"  />
							 </div>
                     </div>
					 ';
					}
					else{ //text area
						$view .= ' 
						<div class="col-xs-'.($this->style_col*2).' col-sm-'.$this->style_col.' col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
					 		<label>' . ucfirst(trim($this->caption_field_a[$i])) . '</label>
                              <div class="field">
								<textarea name="'.trim($this->form_tampil_a[$i].$this->gen_id). '" id="'.trim($this->form_tampil_a[$i].$this->gen_id).'"   class="validate[required] form-control" placeholder="'.ucfirst(trim($this->caption_field_a[$i])).'" ></textarea>
								</div>
                         </div>
						 ';
					}
				}
				else//input
				
				{
					
					
					 $view .= '   
					 
					 <div class="col-xs-'.($this->style_col*2).' col-sm-'.$this->style_col.' col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
					 	<label>'.ucfirst(trim($this->caption_field_a[$i])).'</label>
                          <div class="field">
							';
							if($this->tipe_field_a[$i]=='dp'){
							$view .= ' 										
                            <input name="'.trim($this->form_tampil_a[$i].$this->gen_id).'" id="'.trim($this->form_tampil_a[$i].$this->gen_id).'" type="text"  class=" validate[required] form-control" placeholder="'.ucfirst(trim($this->caption_field_a[$i])).'" value="<?=$'.trim($this->form_tampil_a[$i].$this->gen_id).'?>" />
							';
							}else{
							$view .= ' 										
                             <input name="'.trim($this->form_tampil_a[$i].$this->gen_id).'" id="'.trim($this->form_tampil_a[$i].$this->gen_id).'" type="text"  class=" validate[required] form-control" placeholder="'.ucfirst(trim($this->caption_field_a[$i])).'" value="" />
							';
							}
							$view .= ' 
                             </div>
                      </div>';
					
					
				}
					}
		$view .= 
		
		'</div>   
         <div class="row">                            
            			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
             	<br/>
            	 <input type="submit" id="simpandata'.$this->gen_id.'" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="reset"  id="batal'.$this->gen_id.'" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" id="hpus'.$this->gen_id.'" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <a href=\'<?=site_url(\''.$this->controllername.'/export_pdf'.$this->gen_id.'\')?>\'	target=\'_blank\'  class="btn btn-success"id="tampil_pdf'.$this->gen_id.'" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a>&nbsp;&nbsp;
                  <a href=\'<?=site_url(\''.$this->controllername.'/excell'.$this->gen_id.'\')?>\'	target=\'_blank\' class="btn btn-success"id="tampil_excel'.$this->gen_id.'" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a>
                
                
                         
          </div>
			
		</div>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">   
              <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9 jqGrid"  >
             	<div class="panel panel-default">
            	<div class="panel-body">
           			<?php echo $tbl_dt'.$this->gen_id.'?>
                </div>
             	</div>
          		</div>
        </div>

		</div>
	</div>    
</div>';


        $view .= ' 
		
		 <script>
		 	
			$(document).ready(function () {
				
			var mygrid'.$this->gen_id.'=$(\'#dt'.$this->gen_id.'\').DataTable(
			{
				"select": {
					"style": "single"
				},
				//"scrollY":"350px",
        		//"scrollCollapse": true,
        		//"paging":false,
				"ajax":{"url":"<?php echo base_url() ?>index.php/'.trim(strtolower($this->controllername)).'/json_dt'.$this->gen_id.'","type": "POST","data":{"nama":"ubet"}},
				 "order": [[ 0, "asc" ]],
				 "columnDefs": [
				 ';
				
		$jmlgab=0; $jmlselect=0; $jmlselect_=0;	 
		$jmlgab=count($this->marge_sh);
		$jmlselect=count($this->a_tselect);
		$jmlselect_=$jmlgab-1;	
			
			for($jmlselect=$jmlselect; $jmlselect<$jmlgab; $jmlselect++){
					if($jmlselect_>$jmlselect){
						$view .= '{"targets": ['.$jmlselect.'],"visible": false},';
					}
					else{
						$view .= '{"targets": ['.$jmlselect.'],"visible": false}';
						}
					}
					
			 $view .= '],
				fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) { // Row click
								$(nRow).unbind(\'click\');
								$(nRow).bind(\'click\', function() {
								$(\'#simpandata'.$this->gen_id.'\').val(\'Ubah\');
								';
								
								$hsl__='';
					$i=0;	$iu=0;
					
					for($i=0; $i<count($this->marge_sh); $i++){
						
						$hsl__=element(trim($this->marge_sh[$i]), $this->arr_aso_form_tampil);
						//echo $this->marge_sh[$i]."<br/>";
						//print_r($this->arr_aso_form_tampil)."<br/>";
						//die();
						if(is_null($hsl__)){
							
							$hsl__=element(trim($this->marge_sh[$i]), $this->arr_aso_form_hiden);
								for($iu=0; $iu<count($this->form_hiden_a); $iu++){
								if(trim($this->form_hiden_a[$iu])==trim($hsl__)){
									$view .= '
									$("#'.trim($hsl__.$this->gen_id).'").val(aData['.$i.']);
									';
								}
								}
								
							}else{
								
								for($iu=0; $iu<count($this->form_tampil_a); $iu++){
								if(trim($this->form_tampil_a[$iu])==trim($hsl__)){
								if($this->tipe_field_a[$iu]=='chk'){
								$view .= '
								if(aData['.$i.'])==\'1\'){
									$("#'.trim($hsl__.$this->gen_id).'").prop("checked", true);
								}else{
									$("#'.trim($hsl__.$this->gen_id).'").prop("checked", false);
								}
							';
								}else{
									
								$view .= '
							$("#'.trim($hsl__.$this->gen_id).'").val(aData['.$i.']);
						';
								}}}}}
							$view .= '
								
			 				});
		 				}
				}
			);
		  
		';
		
		$view .= '
		
		  $(\'#form_'.trim($this->controllername).$this->gen_id.'\').submit(function() { 
		   $(this).ajaxSubmit({
			data:{"act":$(\'#simpandata'.$this->gen_id.'\').val()},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($(\'#form_'.trim($this->controllername).$this->gen_id.'\').validationEngine("validate")){
								var conf = confirm("Yakin Akan Mengubah Data Ini?");
								if(conf)return true; else return false;
								
							}else{
								return false;
							}
						} ,
			success:       function(data)  { 
							alert(data.ket);
							$(\'#simpandata'.$this->gen_id.'\').val(\'Simpan\');
						} ,
	 
			url:"<?php echo base_url()?>index.php/'.trim($this->controllername).'/crud",
			type:"post",       
			dataType:"JSON",   
			clearForm: true,   
			resetForm: true    
	 
			}); 
	 
			return false; 
		}); 
			
			
		
		$(\'#hpus'.$this->gen_id.'\').click(function(){
			
			';
				
				
				for($i=0; $i<count($this->form_hiden_a); $i++){
						$view .= '
							
							if($(\'#'.trim($this->form_hiden_a[$i].$this->gen_id).'\').val()==\'\') {
								alert(\'Pilih Data Yang Akan Di Hapus\'); 
								
								return false;
							}
							';
						
						}
						
					$view .= '
					
				var conf = confirm("Yakin Akan Menghapus Data Ini?");
				
            	if (conf) {
					$.ajax({
					url : "<?=base_url()?>index.php/'.trim($this->controllername).'/crud",
					data : {
						action : "del",';
						
						for($i=0; $i<count($this->form_hiden_a); $i++){
						$view .= '
							'.trim($this->form_hiden_a[$i]).' : $(\'#'.trim($this->form_hiden_a[$i].$this->gen_id).'\').val(),';
						
						}
												   
		$view .= '
					},
					type : \'POST\',
					dataType :\'JSON\',
					beforeSend:function(){
						                
					},
					success : function(data){
						
						alert(data.ket);  
						jQuery("#list2'.$this->gen_id.'").trigger("reloadGrid");
						$("#batal'.$this->gen_id.'").trigger(\'click\');
					 }
					});
				}
			
			});
			';
			
			for($i=0; $i<count($this->dp); $i++){
			
				$view .= '
				$( "#'.trim($this->dp[$i].$this->gen_id).'").datetimepicker({
				language:  \'id\',
				format:\'dd-mm-yyyy\',
				autoclose:1,
				todayBtn: true,
				startView: 2,
				minView: 2,
	
				}).on(\'hide\', function(e) {
					
					if($(this).val()!=\'\'){
						//alert(\'\');
						}
				 });
				';			
			}
			
			$ubi=0;
			
			foreach($this->ac as $inx=>$val){
			
			$view .= ' 
			$(\'#'.$inx.$this->gen_id.').typeahead({
			onSelect: function(item) {
				 $("#'.trim($inx.$this->gen_id.$ubi).'").val(ui.item.allData.id);
			},
			ajax: {
				url: \'<?=base_url()."'.$this->controllername.'/'.$inx.'/"?>\',
				timeout: 500,
				triggerLength: 1,
				method: "post",
				loadingClass: "loading-circle",
				preDispatch: function (query) {
					return {
						search: \''.$inx.'\' : $("#'.trim($inx.$this->gen_id).'").val()
					}
				},
				preProcess: function (data) {
					//showLoadingMask(false);
					if (data.success === false) {
						// Hide the list, there was some error
						return false;
					}
					// We good!
					return data;
				}
			}
		});
			
			
			';
		$ubi++;
		
		}
		$view .= '
			})
			 		
			</script>
		';
		return $view;
    }

function build_model() {


        
        $model = ' <?php ';
        $model .= '

if (!defined("BASEPATH"))
    exit(\'No direct script access allowed\');

class ' . trim(ucfirst($this->modelname)) . ' extends CI_Model { 
                
     ';

        $model .= '  


 public function __construct() {
    	
        parent::__construct();
       
      
    }
    

';

     


        $model .= '
    
function total_row($q) {
		$query = $this->db->query($q);
        return $query->num_rows(); 
    }
	function grid_view($q) {
		$this->db->query($q);
		return $this->db->query($q);
	}
	
	function tampil_minta($q){
		
		$profil = $this->db->query($q);

		
			return $profil->result_array();
			 
		
		}
		
	function tampil_bulan($q){
		$data = array();
		$query = $this->db->query($q);
		 
		 if ($query->num_rows()> 0){
			 foreach ($query->result_array() as $row)
			 {
			 	$data[$row[\'id_bulan\']] = $row[\'nama_bulan\'];
			 }
			 $query->free_result();
		 }
		 
		 return $data;
			 
		
		}
		
	function puskesmas()
	 {
		 $query = $this->db->query("SELECT PUSK_ID,IF(PUSK=\'\',\'Semua\',PUSK)  PUSK FROM puskesmas");
		 
		 if ($query->num_rows()> 0){
			 foreach ($query->result_array() as $row)
			 {
			 	$data[$row[\'PUSK_ID\']] = $row[\'PUSK\'];
			 }
		 }
		 return $data;
	 }
	 
	 function penjamin()
	 {
		 $query = $this->db->query("SELECT 	kp_id_sic, KP FROM kategori_pasien GROUP BY kp_id_sic");
		 
		 if ($query->num_rows()> 0){
			 foreach ($query->result_array() as $row)
			 {
			 	$data[$row[\'kp_id_sic\']] = $row[\'KP\'];
			 }
		 }
		 return $data;
	 }
		
		
	function tampil_tahun($q){
		$data = array();
		$awal=$q-5;
		$akhir=$q+5;
		for($awal=$awal; $awal<=$akhir; $awal++) { 
		
			$data[$awal] = $awal;
		
		
		} 
		return $data;
		}';


        $model .= ' }';
        return $model;
    }





    function download() {

        //$this->controller_data = $controller = $this->build_controller($fields);
        //// $this->create_data = $view_create = $this->build_view_create($fields);
        /// $this->model_data = $model = $this->build_model($fields);
        // $this->list_data
		$this->load->helper('file');
		$data = $this->controller_data;

		if ( ! write_file('./application/controllers/'.$this->controllername.'.php', $data))
		{
			 echo 'Unable to write the file';
		}
		
		
		$data = $this->create_data;

		if ( ! write_file('./application/views/'.$this->create_viewname.'.php', $data))
		{
			 echo 'Unable to write the file';
		}
		
		return json_encode(array('ket'=>'Generate Berhasil','url'=>$this->controllername.'.php')) ;
		
//
//        $this->load->library('zip');
//        $controller_date = $this->controller_data;
//        $model_date = $this->model_data;
//        $create_view_date = $this->create_data;
//        $create_list_date = $this->list_data;
//        $header_date = $this->header_data;
//        $footer_date = $this->footer_data;
//
//        $controller_file_name = 'controllers/' . $this->controllername . '.php';
//        $model_file_name = 'models/' . $this->modelname . '.php';
//        $createview_file_name = 'views/' . $this->create_viewname . '.php';
//        $listview_file_name = 'views/' . $this->create_viewname . '.php';
//
//
//
//        $header_file_name = 'views/' . $this->header . '.php';
//        $footer_file_name = 'views/' . $this->footer . '.php';
//        $this->zip->add_data($controller_file_name, $controller_date);
//        $this->zip->add_data($model_file_name, $model_date);
//        $this->zip->add_data($createview_file_name, $create_view_date);
//        $this->zip->add_data($listview_file_name, $create_list_date);
//
//        //header and footer
//        $this->zip->add_data($header_file_name, $header_date);
//        $this->zip->add_data($footer_file_name, $footer_date);
//
//// Write the zip file to a folder on your server. Name it "my_backup.zip"
//        $this->zip->archive('temp/' . $this->controllername . '.zip');
//
//// Download the file to your desktop. Name it "my_backup.zip"
//        $this->zip->download($this->controllername . '.zip');
//        //force_download($name, $data);
    }

}

?>

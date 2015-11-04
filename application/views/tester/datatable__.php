<?php
//$data['jsArray'] = array('js/jQuery.dtplugin.js');
//$data['cssArray'] = array();

//$this -> load -> view('header', $data);
?>

<div class="row">
 
				<div  class="col-lg-12">
                	<div class="container">
                    	<div class="row">
	
    	<?php
								$attributes = array('class' => 'form-group','name' => 'form_ms_detil_bank57', 'id' => 'form_ms_detil_bank57');
								echo form_open('', $attributes);
								?>
								
                                   
                                   <input name="id57" id="id57" type="hidden" value="" />
								   						   
		<div class="row">						      
					 
					 <div class="col-xs-8 col-sm-3 col-md-4 col-lg-4">  
					 
                                    <label>Nama bank</label>
                                    <div class="field">
<?=form_dropdown('fk_ms_bank_id57',$fk_ms_bank_id57,'','id="fk_ms_bank_id57"  data-live-search="true"  class=" selectpicker dropup"')?>
										

 
                                    </div>
                             </div>   
					 

					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>No rekening</label>
                                    <div class="field">
										 										
                                        <input name="no_rekening57" id="no_rekening57" type="text"  class="xxwide text input validate[required] form-control" placeholder="No rekening" value="" />
										 
                                    </div>
                             </div>

             </div>
             
          <div class="row">						      
					 
					 <div class="col-xs-8 col-sm-3 col-md-4 col-lg-4">  
					 
                                    <label>Nama bank</label>
                                    <div class="field">
<?=form_dropdown('fk_ms_bank_id57',$fk_ms_bank_id57,'','id="fk_ms_bank_id57"  data-live-search="true"  class=" selectpicker dropdown"')?>
										

 
                                    </div>
                             </div>   
					 

					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 
                                    <label>Tanggal</label>
                                    <div class="field">
										 										
                                        <input name="tgl57" id="tgl57" type="text" readonly="readonly"  class="xxwide text input validate[required] form-control" placeholder="Tanggal" value="" />
										 
                                    </div>
                             </div>

             </div>
             
        
          <div class="row">						      
					 
					 <div class="col-xs-8 col-sm-3 col-md-4 col-lg-4">  
					 
                                    <label>Nama bank</label>
                                    <div class="field">
	 <input name="auto57" id="auto57" type="text"   class="xxwide text input validate[required] form-control" placeholder="Nama" value="" />
										

 
                                    </div>
                             </div>   
					 
		</div>
        
        
        <div class="row">
        
        	
              <ul class="nav nav-tabs" role="tablist" id="myTabs">
                <li role="presentation" class="active"><a id="ub" href="#home" aria-controls="home"  role="tab" data-toggle="tab" data-url="<?php echo base_url('welcome')?>">Home</a></li>
                <li role="presentation" ><a href="#profile" aria-controls="profile"  role="tab" data-toggle="tab" data-url="<?php echo base_url('crud')?>">Profile</a></li>
                <li role="presentation" ><a href="#messages" aria-controls="messages"  role="tab" data-toggle="tab" data-url="<?php echo base_url('welcome')?>">Messages</a></li>
              </ul>
              
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home">This is the home pane...</div>
                <div role="tabpanel" class="tab-pane fade " id="profile"></div>
                <div role="tabpanel" class="tab-pane fade " id="messages"></div>
              </div>
           
            
        </div>
        
          <div class="row">                            
            			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
             	<br />
            	 <input type="button" id="simpandata49" class="btn btn-success" value="Simpan">  
                 <input  type="button"  id="batal49" class="btn btn-info" value="Batal">  
                 <input  type="button" id="hpus49" class="btn btn-danger" value="Hapus">  
                   <button id="btn_pop" type="button" class="btn btn-primary">Large modal</button>
			</div>
                         
          </div>
    

   <br />
    
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel panel-default">
            	<div class="panel-body">
      
      			<?=$tbl;?>
                </div>
             </div>
 		</div>
    </div>
    		
            </div>
            
    	</div>
    </div>
 </div>


<script>
	
	//wait till the page is fully loaded before loading table
	//dataTableSearch() is optional.  It is a jQuery plugin that looks for input fields in the thead to bind to the table searching
		$(document).ready(function() {
			
			
			
		  $("#btn_pop").click(function(){
			 
			  $.ajax({
				  		type: "post",
						url:"<?=base_url('welcome')?>",
						dataType: "html",
						cache: true,
						success: function(hsl) {
							$("#tampilbody").html(hsl);
							$(".bs-example-modal-lg").modal("show")
						}
				  })
			})
			
			
			 $(".bs-example-modal-lg").on("hidden.bs.modal", function (e) {
			   
			  	$("#tampilbody").html('');
			})
			
		$('#myTabs a').click(function (e) {
			e.preventDefault();
		  
			var url = $(this).attr("data-url");
			var href = this.hash;
			var pane = $(this);
			//alert(href);
			// ajax load from data-url
			$(href).load(url,function(result){      
				pane.tab('show');
			});
		});
		
		
		$.ajax({
			url:$('.active #ub').attr("data-url"),
			data:{'ub':'ub'},
			method:"get",
			success:function(xdata){
				$('#home').html(xdata);
				}
			});
		
		
		$("#auto57").typeahead({
			onSelect: function(item) {
				alert(item.value);
			},
			ajax: {
				url: "<?php echo base_url('tester/local/json')?>",
				timeout: 500,
				triggerLength: 1,
				method: "post",
				loadingClass: "loading-circle",
				preDispatch: function (query) {
					//showLoadingMask(true);
					return {
						search: query
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
    
		
		
		
		//$.post("<?php echo base_url('tester/local/json')?>", function(data){
//			$("#auto57").typeahead({ 
//				source:data,
//				minLength:2,
//				items:10 ,
//				displayField:"customerNumber",
//				onSelect:function(item){
//					console.log(item);
//					}
//				});
//		},'json');
			
		$('#fk_ms_bank_id57').change(function(){
			//alert('');
			});
		$('#tgl57').datetimepicker({
			language:  'id',
			format:'dd-mm-yyyy',
			autoclose:1,
			todayBtn: true,
			startView: 2,
			minView: 2,

			}).on('hide', function(e) {
				
       			if($(this).val()!=''){
					alert('');
					}
   			 });
			 
		
		$('#tblku').DataTable(
			{
				"select": {
					"style": "single"
				},
				//"scrollY":"350px",
        		//"scrollCollapse": true,
        		//"paging":false,
				"ajax":{"url":"<?=site_url('tester/local/dataTable')?>","type": "POST","data":{"nama":"ubet"}},
				 "order": [[ 0, "asc" ]],
				 "columnDefs": [
									{	
										"targets": [ 1 ],
										"visible": false,
										
									},
									{
										"targets": [ 2 ],
										"visible": false,
										
									}
								],
				fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) { // Row click
								$(nRow).unbind('click');
								$(nRow).bind('click', function() {
								 $('#fk_ms_bank_id57').selectpicker('val',aData[1]);
								$('#no_rekening57').val(aData[5]);
								//alert('contactNameFull  '+aData[2]+' ini index :  '+iDisplayIndex);
								//return false;
			 				});
		 				}
				})
		
		
		
		$('#load_url').click(function(){
			var ub_dt=$('#tblku').DataTable()
			
			ub_dt.ajax.url("<?=site_url('tester/local/dataTable_load')?>").load();
		})
				
			
	});
	</script>
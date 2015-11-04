
<div class="row">
	<div  class="col-lg-12">
		<div class="container">
		 <div class="row">
         	<h4 class="col-xs-12 col-sm-10 col-md-10 col-lg-10 "><u>Custemer list</u></h4>
         </div>
		 
							<?php
								$attributes = array('class' => 'form-group','name' => 'form_customer16', 'id' => 'form_customer16');
								echo form_open('', $attributes);
								?>
								<input name="customernumber16" id="customernumber16" type="hidden" value="" />
								   						   
		<div class="row">   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 	<label>Customername</label>
                          <div class="field">
							 										
                            <input name="customername16" id="customername16" type="text"  class=" validate[required] form-control" placeholder="Customername" value="<?=$customername16?>" />
							 
                             </div>
                      </div>   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 	<label>Contactlastname</label>
                          <div class="field">
							 										
                             <input name="contactlastname16" id="contactlastname16" type="text"  class=" validate[required] form-control" placeholder="Contactlastname" value="" />
							 
                             </div>
                      </div>   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 	<label>Contactfirstname</label>
                          <div class="field">
							 										
                             <input name="contactfirstname16" id="contactfirstname16" type="text"  class=" validate[required] form-control" placeholder="Contactfirstname" value="" />
							 
                             </div>
                      </div>   
					 
					 <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">  
					 	<label>Phone</label>
                          <div class="field">
							 										
                             <input name="phone16" id="phone16" type="text"  class=" validate[required] form-control" placeholder="Phone" value="" />
							 
                             </div>
                      </div></div>   
         <div class="row">                            
            			
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
             	<br/>
            	 <input type="submit" id="simpandata16" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button"  id="batal16" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" id="hpus16" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <a href='<?=site_url('customer/export_pdf16')?>'	target='_blank'  class="btn btn-success"id="tampil_pdf16" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a>&nbsp;&nbsp;
                  <a href='<?=site_url('customer/excell16')?>'	target='_blank' class="btn btn-success"id="tampil_excel16" >
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
           			<?php echo $tbl_dt16?>
                </div>
             	</div>
          		</div>
        </div>

		</div>
	</div>    
</div> 
		
		 <script>
		 	
			$(document).ready(function () {
				
			// $('#form_customer16').validationEngine('attach', {scroll: false, addFailureCssClassToField: 'inputbox-error'});
    		
			var mygrid16=$('#dt16').DataTable(
			{
				"select": {
					"style": "single"
				},
				//"scrollY":"350px",
        		//"scrollCollapse": true,
        		//"paging":false,
				"ajax":{"url":"<?php echo base_url() ?>index.php/customer/json_dt16","type": "POST","data":{"nama":"ubet"}},
				 "order": [[ 0, "asc" ]],
				 "columnDefs": [
				 {"targets": [4],"visible": false}],
				fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) { // Row click
								$(nRow).unbind('click');
								$(nRow).bind('click', function() {
								$('#simpandata16').val('Ubah');
								
							$("#customername16").val(aData[0]);
						
							$("#contactlastname16").val(aData[1]);
						
							$("#contactfirstname16").val(aData[2]);
						
							$("#phone16").val(aData[3]);
						
									$("#customernumber16").val(aData[4]);
									
								
			 				});
		 				}
				}
			);
		  
		
			
			
		
		
		$('#hpus16').click(function(){
			
			
							
							if($('#customernumber16').val()=='') {
								alert('Pilih Data Yang Akan Di Hapus'); 
								
								return false;
							}
							
					
				var conf = confirm("Yakin Akan Menghapus Data Ini?");
				
            	if (conf) {
					$.ajax({
					url : "<?=base_url()?>index.php/customer/crud",
					data : {
						action : "del",
							customernumber : $('#customernumber16').val(),
					},
					type : 'POST',
					dataType :'JSON',
					beforeSend:function(){
						                
					},
					success : function(data){
						
						alert(data.ket);  
						jQuery("#list216").trigger("reloadGrid");
						$("#batal16").trigger('click');
					 }
					});
				}
				
				
			
		
		
		});

		
		$("#batal16").click(function(){
			
			
			$('#simpandata16').val('Simpan');
			
						
						$('#customernumber16').val('');
							$('#customername16').val('');
						
							$('#contactlastname16').val('');
						
							$('#contactfirstname16').val('');
						
							$('#phone16').val('');
						
			})
			
				$( "#customername16").datetimepicker({
				language:  'id',
				format:'dd-mm-yyyy',
				autoclose:1,
				todayBtn: true,
				startView: 2,
				minView: 2,
	
				}).on('hide', function(e) {
					
					if($(this).val()!=''){
						//alert('');
						}
				 });
				 

    $('#form_customer16').submit(function() { 
       $(this).ajaxSubmit({
		data:{'act':$('#simpandata16').val()},
		beforeSubmit:  function (formData, jqForm, options) { 
						if($("#form_customer16").validationEngine('validate')){
							var conf = confirm("Yakin Akan Mengubah Data Ini?");
							if(conf)return true; else return false;
							
						}else{
							return false;
						}
					} ,
        success:       function(data)  { 
						alert(data.ket);
						$('#simpandata16').val('Simpan');
					} ,
 
        url:"<?php echo base_url().'index.php/customer/crud' ?>",
        type:"post",       
        dataType:"JSON",   
        clearForm: true,   
        resetForm: true    
 
		}); 
 
        return false; 
    }); 

 			 
				
			})
			 		
					
					
			</script>
		
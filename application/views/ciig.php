            
            <div class="row">
				<div  class="col-lg-12">
                	<div class="container">
                    	<div class="row">
                        
                <form name="" id="ubet_form" class="form-signin"  method="post">
                    <h4 class="form-signin-heading" ><u>TABLE MVC </u> </h4>
                    <?php echo validation_errors(); ?>
                    
                    <div class="row">
                    	
                      
                        <div id="body" class="col-lg-3">
                            <label>Controller Name</label> 
                            <input type="text" style="font-size:14; font-weight:bold; color:#FF3300"  class="form-control validate[required]" placeholder="Controller Name" id="cname" name="cname" value="">
                        </div>
                        
                         <div id="body" class="col-lg-3">
                            <label>Pengunanan</label> 
                            <select data-live-search="true" class="form-control selectpicker dropdown" style="font-size:14; font-weight:bold; color:#FF3300"  id="penggunaan" name="penggunaan" ><option value="1"  >Independen Controler</option><option value="2" >Tampil Pada Tab / PopUP</option></select>
                        </div>
                        
                    </div>
                    
                    <h4 class="form-signin-heading" ><u>Grid Data Table</u></h4>
                    <div class="row">
                    <div id="body"  class="col-lg-12">
                        <label>Full Query Data Table</label>  <textarea style="font-size:14; font-weight:bold; color:#FF3300" id="full_q"  name="full_q"  class="form-control validate[required]" rows="5" cols="50"  placeholder="Full Query"  ></textarea>
                    </div>
                    
                   <!-- <div id="body"  class="col-lg-4">
                        <label>Caption D</label>  <input type="text" style="font-size:14; font-weight:bold; color:#FF3300" name="jdl_jqgrid" id="jdl_jqgrid"  class="form-control validate[required]" value=""   placeholder="Judul Jqgrid"  >
                    </div>-->
                    <!-- <div id="body"  class="col-lg-3">
                        <label>Order By (Nama Field)</label>  <input type="text" style="font-size:14; font-weight:bold; color:#FF3300" name="orderby" id="orderby"  class="form-control validate[required]" value=""   placeholder="Pengurutan"  >
                    </div>
                    <div id="body"  class="col-lg-3">
                        <label>Desc/Asc</label>  <select id="desc_asc" name="desc_asc" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]"    >
                        <option  value="asc">Asc</option> 
                        <option  value="desc">Desc</option>
                        </select>
                    </div>-->
                    
                    
                    
                    <div id="body"  class="col-lg-3">
                       
                    </div>
                    </div>
                    
                     <div class="row">
					<div id="body"  class="col-lg-12">
                        <label>Header Data Table (Use Koma Sebagai Pemisah)</label>  <textarea style="font-size:14; font-weight:bold; color:#FF3300" id="jqgrid" name="jqgrid"  class="form-control validate[required]"   placeholder="Header Grid"  ></textarea >
                    </div>
					<!--<div id="body"  class="col-lg-6">
                        <label>Ukuran Grid (Use Koma Sebagai Pemisah)</label>  <textarea style="font-size:14; font-weight:bold; color:#FF3300" id="ugrid" name="ugrid"  class="form-control validate[required]"   placeholder="Ukuran Grid"></textarea>
                    </div>-->
                    
					</div>
                    
                    <div class="row">
					<div id="body"  class="col-lg-6">
                        <label>Field Tampil (Use Koma Sebagai Pemisah)</label>  <textarea style="font-size:14; font-weight:bold; color:#FF3300"   name="tselect" id="tselect"  class="form-control validate[required]"   placeholder="Field Tampil"  ></textarea>
                    </div>
					<div id="body"  class="col-lg-6">
                        <label>Field Hiden (Use Koma Sebagai Pemisah)</label>  <textarea style="font-size:14; font-weight:bold; color:#FF3300" id="hselect"  name="hselect"  class="form-control validate[required]"   placeholder="Field Tampil"  ></textarea>
                    </div>
                    </div>
					
                    
                    
                    
                    
                    
                     <h4 class="form-signin-heading" ><u>FORM</u></h4>
                    <div class="row">
                    <div id="body"  class="col-lg-3">
                            <label>Form title</label>  <textarea  name="fname" id="fname" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]"   placeholder="Form title"  ></textarea>
                        </div>
                        <div id="body"  class="col-lg-6">
                            <label>Field Tampil (Use Koma Sebagai Pemisah)</label>  <textarea  style="font-size:14; font-weight:bold; color:#FF3300" name="form_tampil" id="form_tampil"  class="form-control validate[required]"   placeholder="Form Tampil"  ></textarea>
                        </div>
                         <div id="body"  class="col-lg-3">
                            <label>Field Hiden( Use Koma )</label>  <textarea   name="form_hiden" style="font-size:14; font-weight:bold; color:#FF3300" id="form_hiden" class="form-control validate[required]"  placeholder="Form Hiden"  ></textarea>
                        </div>
                        
                    
                    </div>
                    
                    <div class="row">
                        <div id="body"  class="col-lg-12">
                            <label>Tipe Field (dd:Dropdown,chk=Cheked,ta=Text area,dp=Datepicker,ac=Autocomplite Use Koma Sebagai Pemisah)</label>  <textarea style="font-size:14; font-weight:bold; color:#FF3300"  name="tipe_field" id="tipe_field"  class="form-control validate[required]"   placeholder="Tipe Field"  ></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>Caption Field</label>  <textarea  name="caption_field" id="caption_field" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]"   placeholder="Caption Field"  ></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-12">
                            <label>Load Query Field (Use | Sebagai Pemisah)</label>  <textarea   name="load_field" style="font-size:14; font-weight:bold; color:#FF3300" id="load_field" class="form-control validate[required]" placeholder="Load Field"  ></textarea>
                        </div>
                        
                        
                       
                        
                    
                    </div>
                    
                     <h4 class="form-signin-heading" ><u>CRUD</u></h4>
                    <div class="row">
                        <div id="body"  class="col-lg-6">
                            <label>Tabel Insert Gunakan Tanda Koma Sebagai Pemisah</label>  <input type="text" style="font-size:14; font-weight:bold; color:#FF3300" name="tbl_insert" id="tbl_insert"  class="form-control validate[required]" value=""   placeholder="Tabel Insert"  >
                        </div>
                         <div id="body"  class="col-lg-6">
                            <label>Field Insert Gunakan * Sebagai Pemisah</label>  <textarea   name="field_insert" style="font-size:14; font-weight:bold; color:#FF3300" id="field_insert" class="form-control validate[required]"   placeholder="Field Insert"  ></textarea>
                        </div>
                        
                    
                    </div>
                    
                    
                   
                    <div class="row">
                        <div id="body"  class="col-lg-4">
                            <label>Tabel Update  Gunakan Tanda Koma Sebagai Pemisah</label>  <input type="text"  name="tbl_update" id="tbl_update" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]" value=""   placeholder="Tabel Update"  >
                        </div>
                         <div id="body"  class="col-lg-4">
                            <label>Field Update Gunakan * Sebagai Pemisah</label>  <textarea  name="field_update" id="field_update" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]"    placeholder="Field Update"  ></textarea>
                        </div>
                        
                         <div id="body"  class="col-lg-4">
                            <label>ID Update</label>  <input type="text"  name="id_update" id="id_update" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]" value=""   placeholder="ID Update"  >
                        </div>
                        
                    
                    </div>
                    
                    
                    <div class="row">
                        <div id="body"  class="col-lg-6">
                            <label>Tabel Delete  Gunakan Tanda Koma Sebagai Pemisah</label>  <input type="text" style="font-size:14; font-weight:bold; color:#FF3300" name="tbl_delete" id="tbl_delete"  class="form-control validate[required]" value=""   placeholder="Tabel Delete"  >
                        </div>
                         
                        
                         <div id="body"  class="col-lg-6">
                            <label>ID Delete</label>  <input type="text"  name="id_delete" id="id_delete" style="font-size:14; font-weight:bold; color:#FF3300" class="form-control validate[required]" value=""   placeholder="ID Delete"  >
                        </div>
                        
                    
                    </div>
                    
                    <div id="body"  class="col-lg-3">
                       <!-- <input id="" type="submit" name="submit" class="btn btn-lg btn-primary" value="submit"> -->
                        <input type="submit" id="download" name="download" class="btn btn-lg btn-primary " value="Dowload">
                    </div>

                    <div id="body"  class="col-lg-2">
                        
                    </div>
                </form>


               
                        
                        

			</div>
		</div>
	</div>

  </div>




            
          


<script type="text/javascript" >
    $(document).ready(function() {
		
		//
//		$("#btn_pop").click(function(){
//			 
//			  $.ajax({
//				  		type: "post",
//						url:"<?=base_url('welcome')?>",
//						dataType: "html",
//						cache: true,
//						success: function(hsl) {
//							$("#tampilbody").html(hsl);
//							$(".bs-example-modal-lg").modal("show")
//						}
//				  })
//			})
//			
//			
//			 $(".bs-example-modal-lg").on("hidden.bs.modal", function (e) {
//			   
//			  	$("#tampilbody").html('');
//			})

        $('#ubet_form').validationEngine('attach', {scroll: false, addFailureCssClassToField: 'inputbox-error'});
    
	
	
	 $('#ubet_form').on('submit', function(e) {
            e.preventDefault(); // <-- important
            $(this).ajaxSubmit({
				type: "post",
            	url: "<?=base_url()?>crud/download_data",
           	 dataType: "json",
            //data: $('#ubet_form').serialize(),
				beforeSubmit: function(formData, jqForm, options){
					 	for (var i=0; i < formData.length; i++) { 
							if (!formData[i].value) { 
								alert('Please enter a value for both Username and Password'); 
								return false; 
							} 
						} 

			var jml_array_tselect=$('#tselect').val();
				jml_array_tselect=jml_array_tselect.split(',');
				jml_array_tselect=jml_array_tselect.length;
				
			var jml_array_jqgrid=$('#jqgrid').val();
				jml_array_jqgrid=jml_array_jqgrid.split(',');
				jml_array_jqgrid=jml_array_jqgrid.length;
				
			//var jml_array_ugrid=$('#ugrid').val();
//				jml_array_ugrid=jml_array_ugrid.split(',');
//				jml_array_ugrid=jml_array_ugrid.length;
			
			if(jml_array_tselect!=jml_array_jqgrid){
				$('#tselect').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
				
			//if(jml_array_tselect!=jml_array_ugrid){
//				$('#jqgrid').focus();
//				alert('Jml colom tidak konsisten');
//				return false;
//				}
				
			//if(jml_array_jqgrid!=jml_array_ugrid){
//				$('#ugrid').focus();
//				alert('Jml colom tidak konsisten');
//				return false;
//				}
			
		
			var jml_array_ft=$('#form_tampil').val();
				jml_array_ft=jml_array_ft.split(',');
				jml_array_ft=jml_array_ft.length;
				
			var jml_array_tf=$('#tipe_field').val();
				jml_array_tf=jml_array_tf.split(',');
				jml_array_tf=jml_array_tf.length;
				
			var jml_array_cf=$('#caption_field').val();
				jml_array_cf=jml_array_cf.split(',');
				jml_array_cf=jml_array_cf.length;
			
			var jml_array_lf=$('#load_field').val();
				jml_array_lf=jml_array_lf.split('|');
				jml_array_lf=jml_array_lf.length;
			
			
			if(jml_array_ft!=jml_array_tf){
				$('#form_tampil').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			if(jml_array_ft!=jml_array_cf){
				$('#caption_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			if(jml_array_ft!=jml_array_lf){
				$('#load_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
			
			
			if(jml_array_cf!=jml_array_lf){
				$('#load_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
				
			if(jml_array_cf!=jml_array_tf){
				$('#tipe_field').focus();
				alert('Jml colom tidak konsisten');
				return false;
				}
							
					},
            	success: function(dt) {
				alert(dt.ket);
				var n_url="<?=base_url()?>"+dt.url;
				if(dt.url!=0){
					var win = window.open(n_url, '_blank');
					win.focus();
				}
				
            }
			});
        });
});
	
	
</script>

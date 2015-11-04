<?php
//$data['jsArray'] = array('js/jQuery.dtplugin.js');
//$data['cssArray'] = array();

?>
    <div class="page-header">
	   <h1>CI-DataTables Library Example</h1>
	</div>
	
	<div class="row">
	    <div class="container">
	        <!--div class="panel panel-default"-->
              <!--div class="panel-body"-->
              		<table id="sampleOrderTable" cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
              			<thead>
              				<tr>
              					<th><input type="text" class="search-input-text" /></th>
              					<th><input type="text" class="search-input-text" /></th>
              					<th><input type="text" class="search-input-text" /></th>
              					<th><input type="text" class="search-input-text" /></th>
              					<th><input type="text" class="search-input-text" /></th>
              					<th><input type="text" class="search-input-text" /></th>
              				</tr>
              				<tr>
              					<th>Order#</th>
              					<th>Order Dt</th>
              					<th>Status</th>
              					<th>Customer</th>
              					<th>Contact</th>
              					<th>Credit Limit</th>
              				</tr>
              			</thead>
              			<tbody></tbody>
              		</table>
              <!--/div>
            </div-->
	    </div>
	</div>

	<script>
	$(function() {
	//wait till the page is fully loaded before loading table
	//dataTableSearch() is optional.  It is a jQuery plugin that looks for input fields in the thead to bind to the table searching
	$("#sampleOrderTable").dataTable({
		 processing: true,
        serverSide: true,
		 
        ajax: {
            "url": JS_BASE_URL + "/DatatableControl/dataTable",
            "type": "POST"
        },
        columns: [
        	{ data: "o.orderNumber" },
        	{ data: "o.orderDate" },
        	{ data: "o.status" },
        	{ data: "c.customerName" },
        	{ data: "$.contactNameFull" },
        	{ data: "c.creditLimit" }
        ],
		
		fnRowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
    // Row click
			$(nRow).on('click', function() {
				alert(aData.o.status+'  contactNameFull  '+aData.$.contactNameFull)
			 // console.log('Row Clicked. Look I have access to all params, thank You closures.', this, aData, iDisplayIndex, iDisplayIndexFull);
			});
		 
			// Cell click
			
		  }
		
	})
	
	
	
	
	});
	</script>

	
<?php
$this->load->view('footer');
?>
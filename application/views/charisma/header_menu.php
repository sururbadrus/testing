
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title><?php if(isset($pnm) && $pnm!=""){echo $pnm;} else{ echo 'app';}?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Disperindag">

       <link href="<?php echo base_url()?>assets/css/bootstrap-cerulean.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/css/validate_engine.css" rel="stylesheet" />
           
		<script type="text/javascript">
			var JS_BASE_URL = '<?php echo site_url(); ?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
       	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/validate_engine.js"></script>
         <script type="text/javascript" src="<?php echo base_url()?>assets/js/validate_engine_eng.js"></script>
         <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.form.js"></script>
         <script type="text/javascript" src="<?php echo base_url()?>assets/js/sb-admin.js"></script>
         
         <?php
        
			if (isset($dp) && $dp==true) {
				echo assets_css(array('bootstrap-datetimepicker.min.css'));
                echo assets_js(array('bootstrap-datetimepicker.min.js','bootstrap-datetimepicker.id.js'));
            }
			if (isset($dd) && $dd==true) {
				echo assets_css(array('bootstrap-select.min.css'));
                echo assets_js(array('bootstrap-select.min.js'));
            }
			if (isset($ac) && $ac==true) {
				echo assets_js(array('bootstrap3-typeahead.min.js'));
            }
			if (isset($dt_loc) && $dt_loc==true) {
				echo assets_css(array('jquery.dataTables.min.css'));
                echo assets_js(array('jquery.dataTables.min.js','dataTables.select.min.js','data_table.search.min.js'));
            }
		?>

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
   	<style type="text/css">
    .bawah {
      height:60px;
      background-color: lightblue;
    }
    .bawah p {
     margin-top:10px;
    }
	
	
	</style>

</head>

<body>

    <!-- topbar starts -->
   
          
    <div class="navbar  navbar-inverse navbar-fixed-top"  role="navigation">
      <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
        </button>
           
                <span class="hidden-xs">Charisma</span>

            <!-- user dropdown starts --><!-- user dropdown ends -->

            <!-- theme selector starts --><!-- theme selector ends -->

                
               
                <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a style="font-size:20px; font-weight:bold" href="#">&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                <li><a href="<?=base_url('crud')?>"><i class="glyphicon glyphicon-home"></i> Crud Ci </a></li>
                <li><a href="<?=base_url('buat_tab')?>"><i class="glyphicon glyphicon-edit"></i> Buat Tab </a></li>
                 <li><a href="<?=base_url('buat_lap')?>"><i class="glyphicon glyphicon-list-alt"></i> Buat Laporan </a></li>
                <li><a href="<?=base_url('buat_chart')?>"><i class="glyphicon glyphicon-star"></i> Buat Grafik </a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-plus"></i></i> Template Code <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?=base_url('dpicker')?>">Date Picker</a></li>
                        <li><a href="<?=base_url('dpicker/popup_')?>">Dialog Pop Up</a></li>
                        <li><a href="<?=base_url('dpicker/autocom')?>">AutoComplite</a></li>
                       
                        <li><a href="<?=base_url('dpicker/popup_')?>">Tree</a></li>
                       
                        <li><a href="<?=base_url('dpicker/popup_')?>">Chart</a></li>
                    </ul>
                </li>
               
            </ul>
            
            

      </div>
    </div>
        
       
       < <div id="wrapper-loading">
        <div id="wrapper-loading-transparent">
            <div id="loading-content">
                <div class="rainbow-loading"></div>
            </div>
        </div>
    	</div>
        <br/> <br/> <br/>
<div class="container-fluid" >
   

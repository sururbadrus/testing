<!DOCTYPE html>
<html>
    <head>
        <title><?php echo isset($title) ? $title : 'Zepernick CI Playground' ?></title>
        <?php $ts = time(); ?>
		<link href="<?php echo base_url()?>assets/css/bootstrap-cerulean.min.css" rel="stylesheet">
		<!--link href="<?php echo base_url()?>assets/css/responsive.dataTables.min.css" rel="stylesheet" /-->
		<link href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" rel="stylesheet" />
		<link href="<?php echo base_url()?>assets/css/select.dataTables.min.css" rel="stylesheet" />
		
		<!--link href="<?php echo base_url()?>css/zepernick.css" rel="stylesheet" /-->
		<script type="text/javascript">
			var JS_BASE_URL = '<?php echo site_url(); ?>';
		</script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.select.min.js"></script>
        <!--script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables.responsive.min.js"></script-->
        <script type="text/javascript" src="<?php echo base_url()?>assets/js/ dataTables.foundation.min.js"></script>
       
		<script type="text/javascript" src="<?php echo base_url()?>js/zjs.utils.js?ts=<?php echo $ts ?>"></script>
		<?php
            if (isset($jsArray) && is_array($jsArray)) {
                foreach ($jsArray as $value) {
                    echo '<script type="text/javascript" src="' . base_url() . $value . '?ts=' . $ts . '"></script>' . PHP_EOL;
                }
            }
            if (isset($cssArray)) {
                foreach ($cssArray as $value) {
                    echo '<link href="' . base_url() . $value . '?ts=' . $ts . '" type="text/css" rel="stylesheet" />' . PHP_EOL;
                }
            }
			
		?>
	</head>
	<body>
		<!-- sticky footer here using this answer
			http://stackoverflow.com/a/14595609/1771306
			 -->
			<div id="wrap">
		 		<?php
		       			$this -> load -> view('menu');	
		       		?>
		       <div class="container-fluid">
		           
		           <div class="row">
		               <div class="col-md-10">
		               		<div class="container-fluid">
	                        <!-- Content Block -->                    	               
		               

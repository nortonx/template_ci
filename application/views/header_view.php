<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title><?=$title?></title> 

	<?php
	echo link_tag('assets/css/reset.css');
	echo link_tag('assets/css/960.css');
	echo link_tag('assets/css/blitzer/jquery-ui-1.8.10.custom.css');
	echo link_tag('assets/css/text.css');
	echo link_tag('assets/css/site.css');	
	?>
	<script src="<?=base_url()?>assets/js/jquery-1.4.4.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/jquery-ui-1.8.10.custom.min.js" type="text/javascript"></script>
	
	<script>
		$(document).ready(function(){
			$('input:submit, input:button, input:reset').button();
		});
	
	</script>
</head>  
<body>
<div id="conteiner" class="container_16">
	<div id="header" class="grid_16">
		Header
	</div>
	<div class="clear"></div>
	
		

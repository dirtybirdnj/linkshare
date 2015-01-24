<?php //Top of layout ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Link-o-matic - Link Sharing Coding Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Link-o-matic - Image Sharing Site">
    <meta name="author" content="Mat Gilbert">

    <!-- Le styles -->
    <?php 
    echo $this->pix->css('bootstrap/css/bootstrap',false);
    echo $this->pix->css('bootstrap/css/bootstrap-responsive',false);    
    echo $this->pix->css('style');        
	?>
	
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    <div class="container">

	  <?php $this->pix->element('navbar'); ?>
	  
	  <div class="row-fluid">
	  	<div class="span12">
<?php 

//Content gets included here 	  	

//Bottom closes off the page

?>
  <div class="masthead">
  
  	<?php if(isset($_SESSION['User'])){ ?>
	  	
  		<div id="logoutform" class="pull-right">
  	  	<form action="<?php echo $pix->base_url(); ?>users/logout" method="post" class="form-inline">
  	  	<input class="btn pull-right" type="submit" value="Log Out"/>
  	  	<strong><?php echo $_SESSION['User']['email']; ?></strong>
  	  	</form>
  	  	</div>
  	  	
  	
  	<?php } else { ?>
  
  
    <form action="<?php echo $pix->base_url(); ?>users/login" class="navbar-form pull-right">
      <input id="loginEmail" class="span2" type="text" placeholder="Email">
      <input id="loginPassword" class="span2" type="password" placeholder="Password">
      <button id="btnLogin" type="button" class="btn">Log in</button>
    </form>       
    
    <?php } ?>
      
    <h3 class="muted">Link-o-<span class="titleEm">mat</span>ic</h3>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
          <?php if(!isset($_SESSION['User'])){ ?>
			<li><?php echo $pix->link('Home',''); ?></li>
			<li><?php echo $pix->link('Browse Links','browse'); ?></li>			
			
			<?php } else { ?>
          
            <li><?php echo $pix->link('Browse All Links','browse'); ?></li>
            <li><?php echo $pix->link('My Public Links','public'); ?></li>
            <li><?php echo $pix->link('My Private Links','private'); ?></li>
            <?php if(isset($_SESSION['User']) && $_SESSION['User']['admin'] === '1'){ ?><li><?php echo $pix->link('Users','users'); ?></li><?php } ?>
            
            <?php } ?>
            
          </ul>
        </div>
      </div>
      
   
      
    </div><!-- /.navbar -->
  </div><!-- /.masthead -->
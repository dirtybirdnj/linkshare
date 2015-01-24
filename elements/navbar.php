  <div class="masthead">
  
  	<?php if(isset($_SESSION['User'])){ ?>
	  	
	  	


  	  	<form action="users/logout" method="post" class="pull-right form-inline">
  	  	<input class="btn pull-right" type="submit" value="Log Out"/>
  	  	<p>You are logged in as <?php echo $_SESSION['User']['email']; ?></p>
  	  	
  	  	</form>

  	
  	<?php } else { ?>
  
  
    <form action="users/login" class="navbar-form pull-right">
      <input id="loginEmail" class="span2" type="text" placeholder="Email">
      <input id="loginPassword" class="span2" type="password" placeholder="Password">
      <button id="btnLogin" type="button" class="btn">Log in</button>
    </form>       
    
    <?php } ?>
      
    <h3 class="muted">Link-o-matic</h3>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li class="active"><?php echo $pix->link('Home',''); ?></li>
            <li><?php echo $pix->link('Links','links'); ?></li>
            <li><?php echo $pix->link('Users','users'); ?></li>
          </ul>
        </div>
      </div>
      
   
      
    </div><!-- /.navbar -->
  </div><!-- /.masthead -->
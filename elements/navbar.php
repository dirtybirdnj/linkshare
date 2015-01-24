  <div class="masthead">
    <form class="navbar-form pull-right">
      <input id="loginEmail" class="span2" type="text" placeholder="Email">
      <input id="loginPassword" class="span2" type="password" placeholder="Password">
      <button id="btnLogin" type="button" class="btn">Log in</button>
    </form>         
    <h3 class="muted">Pixamatic</h3>
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container">
          <ul class="nav">
            <li class="active"><?php echo $pix->link('Home',''); ?></li>
            <li><?php echo $pix->link('Photos','photos'); ?></li>
            <li><?php echo $pix->link('Users','users'); ?></li>
          </ul>
        </div>
      </div>
      
   
      
    </div><!-- /.navbar -->
  </div><!-- /.masthead -->
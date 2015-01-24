	  	</div>
	  </div>


      <div class="footer">
        <p>&copy; Mat Gilbert <?php echo date('Y'); ?></p>
      </div>
      
	  
	  <?php $pix->element('signup_modal'); ?>
      

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php
    
    echo $pix->script('jquery-1.11.1.min');
    echo $pix->script('main');    
    echo $pix->script('bootstrap/js/bootstrap-modal',false);    
    ?>
    
    <!--
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    <script src="bootstrap/js/bootstrap-alert.js"></script>
    
    <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="bootstrap/js/bootstrap-tab.js"></script>
    <script src="bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="bootstrap/js/bootstrap-popover.js"></script>
    <script src="bootstrap/js/bootstrap-button.js"></script>
    <script src="bootstrap/js/bootstrap-collapse.js"></script>
    <script src="bootstrap/js/bootstrap-carousel.js"></script>
    <script src="bootstrap/js/bootstrap-typeahead.js"></script> -->

  </body>
</html>
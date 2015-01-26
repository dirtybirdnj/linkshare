<div class="pull-right">
<strong>Add a New Private Link</strong>
<form class="form-inline" action="<?php echo $this->pix->base_url(); ?>links/add" method="post" >
	Link: <input id="linkURL" name="url" type="text">
    <input type="hidden" name="private" value="1">
  <button type="submit" class="btn">Submit</button>
</form>
</div>

<h1>My Private Links</h1>
<p>Only you can see these links!</p>

<?php 

if(!empty($links)){ ?>



<table class="table">
<tr>
	<!--
	<th>id</th>
	<th>userid</th>
	<th>email</th>
	-->
	<th>created</th>
	<th>url</th>
	
</tr>
<?php 
foreach($links as $link){
	
	echo '<tr>';
	echo '<td><small>' . $link['created'] . '</small></td><td>' . $this->pix->linkURL($link['url'],$link['url']) . '</td>';
	//foreach($link as $elem){ echo "<td>$elem</td>"; }
	
	echo '</tr>';
}


?>
</table>

<?php

	
	
} else { 
	
?><p>You have no private links.</p><?php }
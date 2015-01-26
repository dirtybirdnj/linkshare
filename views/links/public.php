<div class="pull-right linkAdd">
<strong>Add a New Public Link</strong>
<form class="form-inline" action="<?php echo $this->pix->base_url(); ?>links/add" method="post" >
	Link: <input id="linkURL" name="url" type="text">
    <!-- <input type="hidden" name="private" value="1"> -->
  <button type="submit" class="btn">Submit</button>
</form>
</div>

<h1>My Public Links</h1>
<p>Everybody can see these links.</p>
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
		<th>&nbsp;</th>
		
	</tr>
	<?php 
	foreach($links as $link){
		
		echo '<tr>';
		echo '<td><small>' . $link['created'] . '</small></td><td>' . $this->pix->linkURL($link['url'],$link['url']) . '</td>';
		echo '<td><form method="post" class="pull-right" action="' . $this->pix->base_url() . 'links/delete"><input type="hidden" name="id" value="' . $link['id'] . '"/><input type="submit" class="btn btn-danger btn-small deleteLink" value="delete" /></form></td>';
		//foreach($link as $elem){ echo "<td>$elem</td>"; }
		
		echo '</tr>';
	}
	
	
	?>
	</table>

	<?php
} else { ?><p>You have no public links.</p><?php }
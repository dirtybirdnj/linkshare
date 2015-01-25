
<h1>My Links</h1>
<?php 




if(!empty($links)){ ?>



<table class="table">
<tr>
	<th>id</th>
	<th>userid</th>
	<th>email</th>
	<th>created</th>
	<th>url</th>
	
</tr>
<?php 
foreach($links as $link){
	
	echo '<tr>';
	
	foreach($link as $elem){ echo "<td>$elem</td>"; }
	
	echo '</tr>';
}


?>
</table>

<?php

	
	
} else { 
	
?><p>There are no links to display.</p><?php }

echo $pix->link('Add a Link','links/add'); ?>
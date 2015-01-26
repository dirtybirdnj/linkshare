<h1>All Links From All Users</h1>
<em>Drinking from the firehose!</em>
<br/><br/>
<?php 

if(!empty($links)){ ?>

<table class="table">
<tr>
	<th>created</th>
	<th>email</th>
	<th>url</th>	
</tr>
<?php 
foreach($links as $link){
	
	echo '<tr>';
	
	echo '<td><small>' . $link['created'] . '</small></td><td>' . $link['email'] . '</td><td>' . $this->pix->linkURL($link['url'],$link['url']) . '</td>';
	//foreach($link as $elem){ echo "<td>$elem</td>"; }
	
	echo '</tr>';
}


?>
</table>

<?php

	
	
} else { 
	
?><p>There are no links to display.</p><?php }
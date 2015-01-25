
<h1>Add a new link</h1>

<form action="<?php echo $pix->base_url(); ?>links/add" method="post" >

<p>Link: <input id="linkURL" name="url" type="text"></p>
<p>Private: <input id="linkPrivate" name="private" type="checkbox" value="1"/></p>
<p><input id="btnSubmitImage" type="submit" value="Submit"/></p>

</form>
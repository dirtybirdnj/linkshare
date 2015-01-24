<?php

include_once('vendors/krumo/class.krumo.php');

session_start();

include_once('classes/db.php');
include_once('classes/auth.php');
include_once('linkomatic.php');

$pix = new linkomatic();

include_once('routing.php');

?>
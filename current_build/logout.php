<?php
//initialize session
require('config.php');
session_start();

//unset all session variables
$_SESSION = array();

//destroy the session
session_destroy();

//redirect to index page
header("location: index.php");
exit;
?>
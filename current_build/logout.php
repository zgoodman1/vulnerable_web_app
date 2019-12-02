<?php
<<<<<<< HEAD
// start and then destory session
session_start();
=======
//initialize session
require('config.php');
session_start();
//unset all session variables
$_SESSION = array();
//destroy the session
>>>>>>> jwfeshuk-master
session_destroy();
//redirect to index page
header("location: index.php");
exit;
?>
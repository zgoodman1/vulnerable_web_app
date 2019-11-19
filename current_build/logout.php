<?php

// start and then destory session
session_start();
session_destroy();

//redirect to index page
header("location: index.php");
//exit;
?>
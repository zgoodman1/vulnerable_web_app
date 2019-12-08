<?php include('transaction.php') ?>
<html>

<head>
    <title>Transaction Confirmed</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Main</button></a></li>
        <a href='home.php'><button type='button'>Home</button></a></li>
    </header>

    <div class="header">
        Transaction Confirmed
    </div>

    <div class="content">
        <?php

        // if (isset($_GET['vals']) && !empty($_GET['vals'])) {
        //     $transactions = $_GET['vals'];
        //     include('transactions.php');
        // }

        ?>

        <?php include('transactions.php'); ?>

        <div class='link'><a href='home.php'> Return to Home Page</a></div>

    </div>

</body>

</html>
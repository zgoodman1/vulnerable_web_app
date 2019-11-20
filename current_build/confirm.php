<?php include('transaction.php') ?>
<html>

<head>
    <title>Transaction Confirmed</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Home</button></a></li>
        <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>

    <div class="header">
        Transaction Confirmed
    </div>

    <div class="content">
        <?php 
        
        if(isset($_GET['vals']) && !empty($_GET['vals'])) {
            $transactions = $_GET['vals'];
            include('transactions.php'); 
        }
        
        ?>

        <div class='link'><a href='home.php'> Return to Home Page</a></div>

    </div>




    <h3>
        <?php
        /*
        // require('config.php');
        // session_start();
        $deposit = $_POST['deposit'];
        // echo $deposit;
        $currUsername = $_SESSION['username'];
        // echo $currUsername;
        $sql = "UPDATE users SET balance = '{$deposit}' + balance WHERE username = '$currUsername'";
        // echo mysqli_query($link, $sql);
        if (mysqli_query($db, $sql)) {
            echo "Your deposit was processed successfully<br>";
            echo $deposit . " Deposited";
            echo "<div class='form'>
                <a href='home.php'> Return to Home Page</a></div>";
        } else {
            echo "There was an error processing your request, 
                please try again later, Error: " . mysqli_error($db);
            echo "<div class='form'>
                <a href='home.php'> Return to Home Page</a></div>";
        }
        */
        ?>
    </h3>

</body>

</html>
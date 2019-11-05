<html>

<head>
    <meta charset="utf-8">
    <title>Deposit Confirm</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Home</button></a></li>
        <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>

    <div class="content">
        <h3>
            <?php
            require('config.php');
            session_start();
            $deposit = $_POST['deposit'];
            echo $deposit;
            $currUsername = $_SESSION['username'];
            // echo $currUsername;
            $sql = "UPDATE bank_app_info_2 SET user_balance = '{$deposit}' + user_balance WHERE user_id = '$currUsername'";

            // echo mysqli_query($link, $sql);

            if (mysqli_query($link, $sql)) {
                echo "Your deposit was processed successfully<br>";
                echo "<div class='form'>
                <a href='home.php'> Return to Home Page</a></div>";
            } else {
                echo "There was an error processing your request, 
                please try again later, Error: " . mysqli_error($link);
                echo "<div class='form'>
                <a href='home.php'> Return to Home Page</a></div>";
            }
            ?>
        </h3>
    </div>
</body>

</html>
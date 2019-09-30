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
<<<<<<< HEAD
            $amt = $_GET['amount'];
=======
            $deposit = $_POST['deposit'];
            echo $deposit;
>>>>>>> e5602de6fb22187d49f022b18d9d32ad859a2d18
            $currUsername = $_SESSION['username'];
            $user_bal = "SELECT user_balance FROM `bank_app_info_2` WHERE user_id = '$currUsername'";
            // echo $currUsername;
<<<<<<< HEAD
            $sql = "UPDATE bank_app_info_2 SET user_balance=$amt+user_balance WHERE 
            user_id = '$currUsername'";
            
            
            
            // echo mysqli_query($link, $sql);
            if(mysqli_query($link, $sql)){
                if($amt < 0 && abs($amt) > $user_bal){
                    echo "There was an error processing your request, 
                    please try again later, Error: You input a value which would create a negative
                    balance in your account" . mysqli_error($link);
                    echo "<div class='form'>
                    <a href='home.php'> Return to Home Page</a></div>";
                    $sql2 = "UPDATE bank_app_info_2 SET user_balance=$user_bal WHERE 
                    user_id = '$currUsername'";
                    mysqli_query($link, $sql2);
                } else {
=======
            $sql = "UPDATE bank_app_info_2 SET user_balance = '{$deposit}' + user_balance WHERE user_id = '$currUsername'";

            // echo mysqli_query($link, $sql);

            if (mysqli_query($link, $sql)) {
>>>>>>> e5602de6fb22187d49f022b18d9d32ad859a2d18
                echo "Your deposit was processed successfully<br>";
                echo "<div class='form'>
                <a href='home.php'> Return to Home Page</a></div>";
            }    
            }
            ?>
        </h3>
    </div>
</body>

</html>
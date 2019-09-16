<html> 
    <head>
            <meta charset="utf-8">
            <title>Deposit Confirm</title>
            <link rel='stylesheet' href='css/style.css'/>
            <link rel="stylesheet" type="text/css"
            href="styles.css">
    </head>
    <body>
        <h3>
            <?php 
            require('config.php');
            session_start();
            $amt = $_GET['amount'];
            // echo $amt;
            $currUsername = $_SESSION['username'];
            // echo $currUsername;
            $sql = "UPDATE bank_app_info_2 SET user_balance=$amt+user_balance WHERE 
            user_id = $currUsername";
            // echo mysqli_query($link, $sql);
            if(mysqli_query($link, $sql)){
                echo "Your deposit was processed successfully<br>";
                echo "<div class='form'>
                <a href='index.php'> Return to Home Page</a></div>";
            } else {
                echo "There was an error processing your request, 
                please try again later, Error: " . mysqli_error($link);
                echo "<div class='form'>
                <a href='index.php'> Return to Home Page</a></div>";
            }
            ?>
        </h3>
    </body>
</html>
<html>
    <head>
        <meta charset="ut-8">
        <title>Home</title>
        <link rel='stylesheet' href='css/style.css'/>
        <link rel="stylesheet" type="text/css"
        href="styles.css">
</head>
<body>
    <h1>
        <?php
         require('config.php');
         session_start();
     
         $currUsername = $_SESSION['username'];
     
         echo "Welcome, " . $currUsername . "</br>";
        ?>
    </h1>
    <h2>
        <?php 
        $currUsername = $_SESSION['username'];
        $sql = "SELECT user_balance FROM bank_app_info_2 WHERE user_id = '$currUsername'";
        $balance = $link->query($sql);
        if($row = $balance->fetch_assoc()){
            echo "</br>Balance: " . $row['user_balance'] . "</br>";
        }
        ?>
    </h2>
    
    <h3>
        <?php
        echo "<div class='form'>
        <br/>Click here to <a href='deposit.php'>Make a Deposit</a></div>";
        ?>
    </h3>
    
    <h4>
        <?php
        echo "<div class='form'>
        <br/>Click here to <a href='logout.php'>Log Out</a></div>";
        ?>
</body>
</html>
    


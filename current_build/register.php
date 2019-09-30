<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" type="text/css"
        href="styles.css">
    </head>
    <body>
        <?php
        require('config.php');
        // if form is submitted, insert values to the database
        if (isset($_REQUEST['username'])){
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            // escapes special chars in a str
            $username = mysqli_real_escape_string($link, $username);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($link, $email);
            $password = stripslashes($_REQUEST['password']);
            $passwrod = mysqli_real_escape_string($link, $password);
            $cc_num =  stripslashes($_REQUEST['cc_num']);
            $cc_num = mysqli_real_escape_string($link, $cc_num);
            
            $query = "INSERT into `bank_app_info_2` (user_id, user_email, user_pw, 
            user_cc_num) VALUES ('$username', '$email', '$password', '$cc_num')";
            $result = mysqli_query($link, $query);
            if ($result){
                echo "<div class='form'>
                <h3>You have been registered successfully.</h3>
                <br/>Click here to <a href='login.php'>Login</a></div>";
            } 
            }else {
                ?>
                <div class="form-container">
            <div class="user-img"></div>
            <h3>Registration</h3>
            <form method="post">
            <ul class="list">
                <li><input type="text" name="username" placeholder="Username"></li>
                <li><input type="email" name="email" placeholder="Email"></li>
                <li><input type="password" name="password" placeholder="Password" class="form-control"></li>
                <li><input type="number" name="cc_num" class="form-control" placeholder="Card Number"></li>
                <li><input type="submit" class="btn btn-primary" value="Submit"></li>
            </ul>
            </form>
            <div class='form'>
                Already have an account? <a href='login.php'> Login here</a>
            </div>
        </div>   
            <?php } ?>
            </body>
            </html>
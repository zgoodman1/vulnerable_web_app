<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Main</button></a></li>
        <a href='home.php'><button type='button'>Home</button></a></li>
    </header>

    <div class="header">
        Register
    </div>
    <div class="content">
        <?php
        require('config.php');
        // if form is submitted, insert values to the database
        if (isset($_REQUEST['username'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            // escapes special chars in a str
            $username = mysqli_real_escape_string($link, $username);
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($link, $email);
            $password = stripslashes($_REQUEST['password']);
            $passwrod = mysqli_real_escape_string($link, $password);
            $bal = 0;
            //$cc_num =  stripslashes($_REQUEST['cc_num']);
            //$cc_num = mysqli_real_escape_string($link, $cc_num);
            $query = "INSERT into `users` (username, email, password, 
            balance) VALUES ('$username', '$email', '$password', '$bal')";
            $result = mysqli_query($link, $query);
            if ($result) {
                echo "<div class='form'>
                <h3>You have been registered successfully.</h3>
                <br/>Click here to <a href='login.php'>Login</a></div>";
            }
        } else {
            ?>
            <div class="form-container">
                <div class="user-img"></div>
                <h3>Registration</h3>
                <form method="post">
                        <div class='input-group'><input type="text" name="username" placeholder="Username"></div>
                        <div class='input-group'><input type="email" name="email" placeholder="Email"></div>
                        <div class='input-group'><input type="password" name="password" placeholder="Password" class="form-control"></div>
                        <div class='input-group'><input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password"></div>
                        <div class='input-group'><input type="submit" class="btn btn-primary" value="Submit"></div>
                </form>
                <div class='form'>
                    Already have an account? <a href='login.php'> Login here</a>
                </div>
            </div>
        <?php } ?>
</body>

</html>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Home</button></a></li>
        <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>

    <div class="header">
        Login
    </div>

    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
</body>

</html>


<!-- <html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Home</button></a></li>
        <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>

    <div class="content">

        <?php
        /*
        require('config.php');
        session_start();

        if (isset($_POST['username'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM `bank_app_info_2` WHERE user_id = '$username' and user_pw = '$password'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                $_SESSION['username'] = $username;      // initialize session with php variable
                header("Location: home.php");
            } else {
                echo "<div class='form'>
                <h3>Username/password is incorrect.</h3>";
            }
        }
        */
        ?>

        <div class="form">
            <h1> Login Form</h1>
            <form action="" method="post" name="login">
                <p>Username: <input type="text" name="username" placeholder="Username" required /> </p>
                <p>Password: <input type="password" name="password" placeholder="Password" required /> </p>
                <input name="submit" type="submit" value="Submit" />
            </form>
            <p>Not registered yet? <a href='register.php'>Register Here</a></p>
        </div>

    </div>

</body>

</html> -->
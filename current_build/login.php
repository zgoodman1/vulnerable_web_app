<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<<<<<<< HEAD
    <?php
    require('config.php');
    session_start();

    if(isset($_GET['username'])){
        $username = stripslashes($_GET['username']);
        $username = mysqli_real_escape_string($link, $username);
        $password = stripslashes($_GET['password']);
        $password = mysqli_real_escape_string($link, $password);
        $query = "SELECT * FROM `bank_app_info_2` WHERE user_id = '$username' and 
        user_pw = '$password'";
        $result = mysqli_query($link, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $_SESSION['username'] = $username;

            header("Location: home.php");
        } else{
            echo "<div class='form'>
            <h3>Username/password is incorrect.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }
=======

    <header>
        <a href='index.php'><button type='button'>Home</button></a></li>
        <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>

    <div class="content">

        <?php
        require('config.php');
        session_start();

        if (isset($_POST['username'])) {

            // $username = stripslashes($_REQUEST['username']);
            // $username = mysqli_real_escape_string($link, $username);
            // $password = stripslashes($_REQUEST['password']);
            // $password = mysqli_real_escape_string($link, $password);

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM `bank_app_info_2` WHERE user_id = '$username' and user_pw = '$password'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                $_SESSION['username'] = $username;
                header("Location: home.php");
            } else {
                echo "<div class='form'>
                <h3>Username/password is incorrect.</h3>";
            }
        }
>>>>>>> e5602de6fb22187d49f022b18d9d32ad859a2d18
        ?>

        <div class="form">
<<<<<<< HEAD
            <h1> Log In </h1>
            <form action="<?php $_PHP_SELF ?>" method="get" name="login">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input name="submit" type="submit" value="Login" />
            </form>
            <p>Not registered yet? <a href='register.php'>Register Here</a></p>
        </div>
=======
            <h1> Login Form</h1>
            <form action="" method="post" name="login">
                <p>Username: <input type="text" name="username" placeholder="Username" required /> </p>
                <p>Password: <input type="password" name="password" placeholder="Password" required /> </p>
                <input name="submit" type="submit" value="Submit" />
            </form>
            <p>Not registered yet? <a href='register.php'>Register Here</a></p>
        </div>

    </div>

>>>>>>> e5602de6fb22187d49f022b18d9d32ad859a2d18
</body>

</html>
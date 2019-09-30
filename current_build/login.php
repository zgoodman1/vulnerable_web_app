<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" type="text/css"
        href="styles.css">
    </head>
<body>
    <?php
    require('config.php');
    session_start();

    if(isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($link, $username);
        $password = stripslashes($_REQUEST['password']);
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
    } else{
        ?>
        <div class="form">
            <h1> Log In </h1>
            <form action="" method="post" name="login">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input name="submit" type="submit" value="Login" />
            </form>
            <p>Not registered yet? <a href='register.php'>Register Here</a></p>
        </div>
        <?php } ?>
</body>
</html>
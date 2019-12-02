<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<header>
        <a href='index.php'><button type='button'>Main</button></a></li>
        <a href='home.php'><button type='button'>Home</button></a></li>
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

<?php include('server.php') ?>

<?php
//session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    // array_push($errors, "You must log in first");
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Main</button></a></li>
        <a href='home.php'><button type='button'>Home</button></a></li>
    </header>

    <div class="header">
        Home
    </div>

    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p> <a href="home.php?logout='1'" style="color: red;">Logout</a> </p>
        <?php endif ?>

        <h2>

            <?php
            $username = $_SESSION['username'];
            $user = $db->query("SELECT * FROM users WHERE username = '$username'");
            if ($user->num_rows > 0) {
                while ($row = $user->fetch_assoc()) {
                    echo "</br>" . $row['username'] . "'s balance: " . $row['balance'] . "</br>";
                }
            }
            ?>

        </h2>

        <h3>

            <?php
            echo "<div class='form'>
            <br/>Click here to <a href='deposit.php'>Make a Deposit</a>
            <br/>Click here to <a href='transfer.php'>Make a Transfer</a>
            </div>";
            ?>

        </h3>


    </div>

</body>

</html>

<!--
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <a href='index.php'><button type='button'>Home</button></a></li>
        <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>
    <div class="content">
        <h1>
            <?php
            /*
            require('config.php');
            session_start();
            $currUsername = $_SESSION['username'];
            echo "Welcome, " . $currUsername . "</br>";
            */
            ?>
        </h1>
        <h2>
            <?php
            /*
            $currUsername = $_SESSION['username'];
            $sql = "SELECT user_balance FROM bank_app_info_2 WHERE user_id = '$currUsername'";
            $balance = $link->query($sql);
            if ($row = $balance->fetch_assoc()) {
                echo "</br>Balance: " . $row['user_balance'] . "</br>";
            }
            */
            ?>
        </h2>
        <h3>
            <?php
            /*
            echo "<div class='form'>
            <br/>Click here to <a href='deposit.php'>Make a Deposit</a></div>";
            */
            ?>
        
        </h3>
        <h4>
            <?php
            /*
            echo "<div class='form'>
            <br/>Click here to <a href='logout.php'>Log Out</a></div>";
            */
            ?>
        </h4>
    </div>
</body>
</html>
        -->
<?php include('server.php') ?>

<?php
//session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    // array_push($errors, "You must log in first");
    header('location: login.php');
}

/*
if (isset($_SESSION['usertype'])) {
    if ($_SESSION['usertype'] === 'admin') {
        header('location: admin_home.php');
    }
}
*/

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

        <h3>
            <?php
            $username = $_SESSION['username'];
            $user = $db->query("SELECT * FROM users WHERE username = '$username'");
            if ($user->num_rows > 0) {
                while ($row = $user->fetch_assoc()) {
                    echo "</br>" . $row['username'] . "'s balance: " . $row['balance'] . "</br>";
                }
            }
            ?>
        </h3>

        <h4>
            <br/>Click here to <a href='deposit.php'>Make a Deposit</a>
            <br/>Click here to <a href='transfer.php'>Make a Transfer</a>
        </h4>

        <!-- admin functionality -->
        <?php if (isset($_SESSION['usertype'])) : ?>
            <?php if ($_SESSION['usertype'] === 'admin') : ?>
                <h3>
                    <br/><p>**** Admin Functions: ****</p>
                </h3>    
                <h4>
                    <br/><a href="create_user.php"> Create a New User</a>
                </h4>
            <?php endif ?>
        <?php endif ?>


    </div>
</body>

</html>

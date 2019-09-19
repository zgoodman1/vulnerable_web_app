<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "teststyle.css" />
</head>

<body>
    <div class="header">
        <a href="index.php" class="logo">Bank of InfoSec</a>
        <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
        </div>
    </div>

    <div style="padding-left:20px">

        <h2>
            <?php
            echo "<div class='form'>
            <br/>Click here to <a href='login.php'>Login</a></div>";
            ?>
        </h3>

        <h2>
            <?php
            echo "<div class='form'>
            <br/>Click here to <a href='register.php'>Register</a></div>";
            ?>
        </h3>

    </div>

</body>

</html>

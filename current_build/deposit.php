<html>

<head>
    <meta charset="utf-8">
    <title>Deposit</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <header>
            <a href='index.php'><button type='button'>Home</button></a></li>
            <a href='home.php'><button type='button'>Account Home</button></a></li>
    </header>

    <!--
        <form action='up_bal.php' method='get'>
            <-- using get method as it will display everything in 
            the url and is less secure, would use post in any other 
            situation where security matters more
            Deposit Amount: <input type='number' name='amount'><br>
            <input type='submit'>
        </form>
        -->
    <div class="content">
        <form action="up_bal.php" method="post" autocomplete="off">
            <label for="deposit">
                Deposit Amount:
                <input type="text" name="deposit" id="deposit">
            </label>
            <input type="submit" value="Deposit">
        </form>
    </div>

</body>

</html>
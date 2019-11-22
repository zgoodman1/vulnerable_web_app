<?php include('transaction.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Deposit</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Main</button></a></li>
        <a href='home.php'><button type='button'>Home</button></a></li>
    </header>

    <div class="header">
        Deposit
    </div>

    <form method="post" action="transfer.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Deposit Amount</label>
            <input type="number" name="amount">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="deposit">Deposit</button>
        </div>
    </form>

</body>

</html>
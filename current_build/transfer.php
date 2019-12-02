<?php include('transaction.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Transfer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <header>
        <a href='index.php'><button type='button'>Main</button></a></li>
        <a href='home.php'><button type='button'>Home</button></a></li>
    </header>

    <div class="header">
        Transfer
    </div>

    <form method="post" action="transfer.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Transfer Amount</label>
            <input type="number" name="amount">
        </div>
        <div class="input-group">
            <label>Destination User</label>
            <input type="text" name="dest">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="transfer">Transfer</button>
        </div>
    </form>


</body>

</html>
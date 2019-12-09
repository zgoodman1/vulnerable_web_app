<?php include('server.php') ?>

<?php
$transactions = array();
// TRANSFER
if (isset($_POST['transfer'])) {
    $username = $_SESSION['username'];
    $amount = floatval($_POST['amount']);
    // $amount = 10;
    // $amount = settype($amount, "float");
    // (gettype($amount));
    $dest = $_POST['dest'];
    if (empty($amount)) {
        array_push($errors, "Transfer amount is required");
    }
    if (empty($dest)) {
        array_push($errors, "Destination User is required");
    }
    if (count($errors) == 0) {
        $user_check_query = "SELECT * FROM users WHERE username='$dest'";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if ($user) {        // destination user was found
            // $query = $db->query("UPDATE users SET balance = balance - 10 WHERE username = $username");
            // $query = $db->query("UPDATE `users` SET `balance` = `balance` - 10 WHERE `username` = $username");
            $sql = "UPDATE `users` SET `balance` = `balance` - $amount WHERE `username` = '$username'";
            if ($db->query($sql) === TRUE) {
                array_push($transactions, "Withdrew: " . $amount . " from: " . $dest);
                // echo "Withdrew: " . $amount . " from: " . $username . '<br>';
            } else {
                array_push($errors, "Error updating balance: " . $db->error);
                // echo "Error updating balance: " . $db->error;
            }
            $sql = "UPDATE `users` SET `balance` = `balance` + $amount WHERE `username` = '$dest'";
            if ($db->query($sql) === TRUE) {
                array_push($transactions, "Transferred: " . $amount . " to: " . $dest);
            } else {
                array_push($errors, "Error updating balance: " . $db->error);
                // echo "Error updating balance: " . $db->error;
            }
            // die($amount . " " . $username);
            // $_SESSION['username'] = $username;
            // $_SESSION['success'] = "You are now logged in";
            // include('transactions.php');
            header('location: confirm.php?' . http_build_query($transactions));
        } else {
            array_push($errors, "Destination User does not exist.");
        }
    }
}
// DEPOSIT
if (isset($_GET['amount'])) { 
    $amount = $_GET['amount'];
    array_push($transactions, "Please confirm" . $amount);
}

if (isset($_POST['deposit'])) {
    $username = $_SESSION['username'];
    $amount = $_POST['amount'];
    // $amount = 10;
    // $amount = settype($amount, "float");
    // (gettype($amount));
    if (empty($amount)) {
        array_push($errors, "Deposit amount is required");
    }
    if (count($errors) == 0) {
        $sql = "UPDATE users SET balance = '{$amount}' + balance WHERE username = '$username'";
        if ($db->query($sql) === TRUE) {
            array_push($transactions, "Deposited: " . $amount . " to: " . $username);
            header('location: confirm.php?' . http_build_query($transactions));
        } else {
            array_push($errors, "Error updating balance: ". $amount . $db->error);
        }
    }
}
?>
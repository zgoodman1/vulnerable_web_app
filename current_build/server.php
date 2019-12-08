<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {                // register button submitted

    // receive all input values from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // SQL Injection happens here...

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);


    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        // $password = md5($password_1);    //encrypt the password before saving in the database

        if (isset($_POST['user_type'])) {
			$user_type = $_POST['user_type'];
			$query = "INSERT INTO `users` (`username`, `email`, `user_type`, `password`, `balance`) VALUES('$username', '$email', '$user_type', '$password_1', 0)";
            mysqli_query($db, $query);
            
			$_SESSION['success'] = "New user successfully created";
			header('location: home.php');
		}else{
			$query = "INSERT INTO `users` (`username`, `email`, `user_type`, `password`, `balance`) VALUES('$username', '$email', 'user', '$password_1', 0)";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username; // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: home.php');	
		}

    }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (!empty($username) && !empty($password) && mysqli_num_rows($results) == 0) {
        array_push($errors, "Username / Password combination not found!");
    }

  
    if (count($errors) == 0) {
        // $password = md5($password);

        /* Working Here 
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
        */

        /* New implementation Here */
    
        // die($username . $password);		// for testing to display inputs
    
        $user = $db->query("SELECT * FROM users WHERE username = '$username' && password = '$password'");

        if (!empty($user) && $user->num_rows > 0) {
            while ($row = $user->fetch_assoc()) {
                // echo "id: " . $row["id"] . " - username: " . $row["username"] . " - password: " . $row["password"] . "<br>";
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                $_SESSION['success'] = "You are now logged in";
                // $_SESSION['usertype'] = $row['user_type'];

                if ($row['user_type'] === 'admin') {
                    $_SESSION['usertype'] = $row['user_type'];
                }

                header('location: home.php');

            }
        }

    }
}

/*
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

        if ($user) {        // desitination user was found

            // $query = $db->query("UPDATE users SET balance = balance - 10 WHERE username = $username");
            // $query = $db->query("UPDATE `users` SET `balance` = `balance` - 10 WHERE `username` = $username");

            $sql = "UPDATE `users` SET `balance` = `balance` - $amount WHERE `username` = '$username'";

            if ($db->query($sql) === TRUE) {
                echo "Withdrew: " . $amount . " from: " . $username . '<br>';
            } else {
                array_push($errors, "Error updating balance: " . $db->error);
                // echo "Error updating balance: " . $db->error;
            }

            $sql = "UPDATE `users` SET `balance` = `balance` + $amount WHERE `username` = '$dest'";

            if ($db->query($sql) === TRUE) {
                echo "Transferred: " . $amount . " to: " . $dest;
            } else {
                array_push($errors, "Error updating balance: " . $db->error);
                // echo "Error updating balance: " . $db->error;
            }

            // die($amount . " " . $username);

        } else {
            array_push($errors, "Destination User does not exist.");
        }

    }
}
*/

?>
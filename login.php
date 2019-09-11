<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
<body>
    <?php
    require('config.php');
    session_start();

    if(isset($_POST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $password = stripslashes($_REQUEST['password']);
        $query = "SELECT * FROM `bank_app_info_2` WHERE user_id = '$username' and 
        user_pw = '".md5($password)."'"
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $_SESSION['username'] = $username;

            header("Location: index.php");
        } else{
            echo "<div class='form'>
            <h3>Username/password is incorrect.</h3>
            <br/>Click here to <a href='login.php'>Login</a></div>"
        }
    }



<!-- <?php -->

// session_start();

// // check if user is already logged in, if so, redirect to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;
// }

 
// // Include config file
// require_once "config.php";
 
// // Define variables and initialize with empty values
// $username = $password = "";
// $username_err = $password_err = "";
 
// // Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
 
//     // Check if username is empty
//     if(empty(trim($_POST["username"]))){
//         $username_err = "Please enter username.";
//     } else{
//         $username = trim($_POST["username"]);
//     }
    
//     // Check if password is empty
//     if(empty(trim($_POST["password"]))){
//         $password_err = "Please enter your password.";
//     } else{
//         $password = trim($_POST["password"]);
//     }

    // // Validate credentials
    // if(empty($username_err) && empty($password_err)){
    //     // Prepare a select statement
    //     $sql = "SELECT username, password FROM users WHERE username = ?";
        
    //     if($stmt = mysqli_prepare($link, $sql)){
    //         // Bind variables to the prepared statement as parameters
    //         mysqli_stmt_bind_param($stmt, "s", $param_username);
            
    //         // Set parameters
    //         $param_username = $username;
            
    //         // Attempt to execute the prepared statement
    //         if(mysqli_stmt_execute($stmt)){
    //             // Store result
    //             mysqli_stmt_store_result($stmt);
                
    //             // Check if username exists, if yes then verify password
    //             if(mysqli_stmt_num_rows($stmt) == 1){                    
    //                 // Bind result variables
    //                 mysqli_stmt_bind_result($stmt, $username, $password);
    //                 if(mysqli_stmt_fetch($stmt)){
    //                     if(password_verify($password, $password)){
    //                         // Password is correct, so start a new session
                            // session_start();
                            
    //                         // Store data in session variables
                            // $_SESSION["loggedin"] = true;
                            // $_SESSION["username"] = $username;                            
                            
    //                         // Redirect user to welcome page
                            // header("location: welcome.php");
    //                     } else{
    //                         // Display an error message if password is not valid
    //                         $password_err = "The password you entered was not valid.";
    //                     }
    //                 }
    //             } else{
    //                 // Display an error message if username doesn't exist
    //                 $username_err = "No account found with that username.";
    //             }
    //         } else{
    //             echo "Oops! Something went wrong. Please try again later.";
    //         }
    //     }
        
    //     // Close statement
    //     mysqli_stmt_close($stmt);
    // }
    
    // // Close connection
    // mysqli_close($link);
// }
// ?>


<?php
// include config file
require_once "config.php";

// define variables and initialize as empty
$username = $email = $password = $cc_num = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST METHOD"] == "POST"){

    // validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username";
    } else {
        // prep a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // get email and cc_num, no security checks for these as we
    // don't want security for this project
    $email = trim($_POST["email"]);
    $cc_num = trim($_POST["cc_num"]);

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO bank_app_info_2 (user_id, user_email, 
        user_pw, user_cc_num) VALUES ('$username', '$email', 
        '$password', '$cc_num')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_email
            , $param_password, $param_cc_num);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password; 
            // Could create a password
            //hash but not for this project
            $param_email = $email;
            $param_cc_num = $cc_num;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font:14px sans-serif; }
            .wrapper{ width: 350px; padding:20px; }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account</p>
            <form action="<?php echo htmlspecialchars(
                $_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Card Number </label>
                <input type="number" name="cc_num" class="form-control" value="<?php echo $cc_num; ?>">
            </div>
            <div class="alert alert-danger" role="alert">
                PLEASE ENTER A FAKE CARD NUMBER, NOT YOUR OWN, THIS APPLICATION IS INTENTIONALLY VULNERABLE TO ATTACKS
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>

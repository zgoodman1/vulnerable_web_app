<?php
header("Location: home.html");
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password'); 
$cc_num = filter_input(INPUT_POST, 'cc_num');

if(!empty($username)){
    if(!empty($email)){
        if(!empty($password)){
            if(!empty($cc_num)){
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "test_db";

                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                if(mysqli_connect_error()){
                    die('Connect Error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
                }
                else{
                    $sql = "INSERT INTO bank_app_info_2 (user_id, user_email, user_pw, user_cc_num)
                    VALUES ('$username', '$email', '$password', '$cc_num')";
                    if($conn->query($sql)){
                        echo "New user registered successfully";
                    }
                    else{
                        echo "Error: ". $sql ."<br>". $conn->error;
                    }
                    $conn->close();
                }
            }
            else {
                echo "Please enter a 16 digit card number (a fake one, please don't enter your own)";
                die();
            }
        }
        else {
            echo "Password should not be empty";
            die();
        }
    }
    else {
        echo "Email should not be empty";
        die();
    }
}
else {
    echo "Username should not be empty";
    die();
}











?>

<?php
    require("depend/config.php");

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pass"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo ("$email is a valid email address");
    } else {
        echo ("$email is not a valid email address");
        echo "<a href ='register.php'>Register</a>";
        return;
    }
    $sql = "SELECT * FROM users where user_name= '$username' or user_email = '$email'";
    $result = $db->query($sql) or die($db->error);
    $row = $result->fetch_assoc(); // table to array
    $count  = $result->num_rows;



    if ($count > 0) {
        //error message
        echo "User name or email already in use";
        echo "<a href ='register.php'>Register</a>";
    } else {
        $enc_pass = md5($password);
        $sql = "INSERT INTO users (user_name, user_pass, user_email) VALUES ('$username', '$enc_pass', '$email')";

        //if query is error free
        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
            $row = $result->fetch_assoc();
            $_SESSION['current_user'] = $row['user_id'];
            header("Location:login.php");

        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    }
?>
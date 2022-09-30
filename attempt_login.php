<?php
    require("depend/config.php");

    $email = $_POST["email"];
    $password = $_POST["pass"];

    $enc_password = md5($password);

    // look for users with this user credential
    $sql = "SELECT * FROM users where user_email = '$email' and user_pass = '$enc_password' LIMIT 1";


    $result = $db->query($sql) or die('<div><br><br> <h><b>Error</b> </h> <p>User not found</p> <a src = "login.php"> GO BACK </a></div>');
    $row = $result->fetch_assoc();
    //var_dump($row);

    //setting current user cookie to access site wide
    setcookie("username", $row['user_name'], time() + (86400 * 30), "/");
    setcookie("current_user", $row['user_id'], time() + (86400 * 30), "/");
    setcookie("user_password", $row['user_pass'], time() + (86400 * 30), "/");

    // any users that matched our query
    if ($result->num_rows > 0) {
        $_SESSION['current_user'] = $row['user_id'];
        header("Location:index.php"); // go to index
    } else {
        echo "<div><br><br> <h><b>Error</b> </h> <p>User not found</p> <a href = 'login.php'> GO BACK </a></div>"; // error page
    }
    exit();
?>
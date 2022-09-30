<?php
    setcookie("username", "", time() - 3600, '/');
    setcookie("current_user", "", time() - 3600, '/');
    setcookie("user_password", "", time() - 3600, '/');
    header("Location:index.php");
?>
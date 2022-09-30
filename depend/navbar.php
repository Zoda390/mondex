<html>
    <?php
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">MonDex</a>
                </li>';

        if(array_key_exists('username', $_COOKIE)){
            echo '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="">Messages</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="user.php">User</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="log_out.php">Log Out</a>
                </li>';
        }
        else{
            echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            </li>';
        }

        echo '</ul></nav>';
    ?>
</html>
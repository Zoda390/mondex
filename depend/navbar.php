<html>
    <?php
        echo '
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <nav class="navbar navbar-light navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">MonDex</a>
        ';

        if(array_key_exists('username', $_COOKIE)){
            echo '
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" href="user.php">Your Monsters</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Messages</a>
            </li>
            </ul>
            ';
        }
        else{
            echo '
            <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="login.php">Login</a>
            </li>
            </ul>
            ';
        }

        $value = '';
        if(array_key_exists('search', $_POST)){
            $value = $_POST['search'];
        }
        echo '
        <form class="d-flex mb-0" role="search" method="post" action = "#">
        <input class="form-control me-2" id="search" name="search" type="search" placeholder="Search" value="'.$value.'" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
        ';

        if(array_key_exists('username', $_COOKIE)){
            echo '
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    '.$_COOKIE['username'].'
                </a>
                <ul class="dropdown-menu" style = "left:-34px">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Options</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="log_out.php">Log Out</a></li>
                </ul>
            </li>
            </ul>
            ';
        }

        echo '</div></nav>';
    ?>
</html>
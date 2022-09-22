<html>
    <head>
        <title>MonDex</title>
        <script src="https://kit.fontawesome.com/907911d053.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center sm-justify-content-start md-justify-content-center">
                <div class="col-4 bg-warning rounded border border-3 border-secondary">
                    <div id="upload" class="container">
                        <h3>Login</h3>
                        <form action="attempt_login.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username:</label><br>
                            <input type="text" id="username" name="username" placeholder="Username ..."><br>
                            <label for="pass">Password:</label><br>
                            <input type="text" id="pass" name="pass" placeholder="Password ..."><br><br>
                        </div>

                        <button class="btn btn-dark" type="submit"  name="submit">Login</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
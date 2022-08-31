<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            $id = 7;
            $name = $_POST['name'];
            $owner = "Christian";
            $desc = $_POST['desc'];
            
            $sql = "INSERT INTO monsters ('Id', 'Name', 'Owner', 'Desc') VALUES ('$id','$name','$owner','$desc')";
            
            var_dump($db->query($sql));
            //header("Location:index.php");
        ?>
    </body>
</html>
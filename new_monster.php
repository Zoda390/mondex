<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            $name = $_POST['name'];
            $owner = "Christian";
            $desc = $_POST['desc'];
            
            $sql = "INSERT INTO monsters (mon_name, mon_owner, mon_desc) VALUES ('$name', '$owner', '$desc')";
            
            var_dump($db->query($sql));
            header("Location:index.php");
        ?>
    </body>
</html>
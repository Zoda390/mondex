<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            
            $cur_mon_id = $_POST['Id'];
            $name = $_POST['name'];
            $owner = "Christian";
            $desc = $_POST['desc'];
            $sql = "UPDATE monsters SET mon_name='$name', mon_desc='$desc' WHERE mon_id=2";
            
            var_dump($db->query($sql));
            
        ?>
    </body>
</html>
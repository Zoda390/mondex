<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            
            $cur_mon_id = $_POST['Id'];
            $sql = "DELETE FROM monsters WHERE mon_id=$cur_mon_id;";
            
            var_dump($db->query($sql));
            header("Location:index.php");
        ?>
    </body>
</html>
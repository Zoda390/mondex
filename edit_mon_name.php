<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            
            $cur_mon_id = $_POST['Id'];
            $sql = "UPDATE monsters SET mon_desc='A small creature that likes to bite.' WHERE mon_id=2";
            
            var_dump($db->query($sql));
            
        ?>
    </body>
</html>
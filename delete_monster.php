<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            
            //update all the mon_render_ids
            $sql = ""

            $cur_mon_id = $_POST['Id'];
            $sql = "DELETE FROM monsters WHERE mon_id=$cur_mon_id;";
            
            var_dump($db->query($sql));

            

            header("Location:index.php");
        ?>
    </body>
</html>
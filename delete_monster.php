<html>
    <body>
        <?php
            require("depend\config.php");
            
            

            $cur_mon_id = $_POST['Id'];

            //Select the current monster to get their render id
            $sql = "SELECT * FROM monsters WHERE mon_id=$cur_mon_id";
            $result = $db->query($sql);
            $result = $result->fetch_assoc();
            $cur_mon_render_id = $result['mon_render_id'];

            //update all the mon_render_ids
            $sql = "SELECT * FROM monsters WHERE mon_render_id > $cur_mon_render_id";
            $result = $db->query($sql);
            if ($result !== false && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $new_render_id = ($row['mon_render_id']-1);
                    var_dump($new_render_id);
                    $sql2 = 'UPDATE monsters SET mon_render_id='.$new_render_id.' WHERE mon_render_id='.$row["mon_render_id"];
                    $db->query($sql2);
                }
            }

            //delete the selected monster
            $sql = "DELETE FROM monsters WHERE mon_id=$cur_mon_id;";
            
            var_dump($db->query($sql));
            header("Location:index.php");
        ?>
    </body>
</html>
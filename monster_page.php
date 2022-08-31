<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            $cur_disp_id = $_POST['disp_id'];
            $cur_mon_id = $_POST['Id'];
            $sql = "SELECT * FROM monsters WHERE mon_id=$cur_mon_id Order by mon_id ASC";
            $result = $db->query($sql) or die($db->error);

            if ($result !== false && $result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<h1> #" . $cur_disp_id . " " . $row['mon_name'] . "</h3>";
                    echo '<form action="edit_mon_name.php" method="post"> <input type="text" id="Id" name="Id" style="visibility:hidden; height: 0px;" value= ' . $row['mon_id'] . '> <input type="submit" value="Edit Name" name="submit"> </form>';
                    echo "<h4>" . $row['mon_owner'] . "</h6>";
                    echo "<p>" . $row['mon_desc'] . "</p>";
                    echo '<form action="delete_monster.php" method="post"> <input type="text" id="Id" name="Id" style="visibility:hidden; height: 0px;" value= ' . $row['mon_id'] . '> <input type="submit" value="Delete" name="submit"> </form>';
                }
            }
            
        ?>
    </body>
</html>
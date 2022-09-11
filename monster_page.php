<html>
    <head>
    <script src="https://kit.fontawesome.com/907911d053.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class = "bg-dark">
        <script type="text/javascript">
            function toggle_visibility(id) {
                var e = document.getElementById(id);
                if(e.style.display == 'block')
                    e.style.display = 'none';
                else
                    e.style.display = 'block';
            }
        </script>

        <?php
            require("depend/navbar.php");
        ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 bg-light border border-3 border-secondary rounded" style="padding: 10px 10px">
                    <?php
                        require("depend/config.php");
                        $cur_user = "Christian";
                        //$cur_disp_id = $_POST['disp_id'];
                        $cur_mon_id = $_POST['Id'];
                        $sql = "SELECT * FROM monsters WHERE mon_id=$cur_mon_id Order by mon_id ASC";
                        $result = $db->query($sql) or die($db->error);

                        if ($result !== false && $result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<img src="depend/image.php?id='. $row['mon_id'] .'" width="256" height="256">';
                                echo "<h1> #" . $row['mon_render_id'] . " " . $row['mon_name'] . "</h3>";
                                echo "<h4>" . $row['mon_owner'] . "</h6>";
                                echo "<div class='text-break'><p>" . $row['mon_desc'] . "</p></div>";
                                if($cur_user == $row['mon_owner']){
                                    echo '<div class="bg-warning rounded border border-secondary border-3"><form action="edit_mon.php" method="post"><label for="name">Name:</label><br><input type="text" id="name" name="name" placeholder="Monsters Name ..."><br><label for="desc">Description:</label><br><input type="text" id="desc" name="desc" placeholder="Monsters Description ..."><br><br><input type="text" id="Id" name="Id" style="display:none; height: 0px;" value= ' . $cur_mon_id . '><input type="text" id="disp_id" name="disp_id" style="display:none; height: 0px;" value= ' . $row['mon_render_id'] . '><button class="btn btn-dark" type="submit"  name="submit">Edit  <i class="fa-regular fa-paper-plane"></i></button></form></div>';
                                    echo '<form action="delete_monster.php" method="post"> <input type="text" id="Id" name="Id" style="display:none; height: 0px;" value= ' . $row['mon_id'] . '> <button class="btn btn-danger" type="submit" name="submit">Delete  <i class="fa-solid fa-trash"></i></button> </form>';
                                }
                                echo '<a href="index.php" class="btn btn-secondary">Back</a>';
                            }
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
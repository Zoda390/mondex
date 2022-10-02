<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MonDex</title>
        <script src="https://kit.fontawesome.com/907911d053.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
        <script type="text/javascript" src="sketch.js"></script>
    </head>

    <body class = "bg-dark ">
        <div>
            <?php
                require("depend/navbar.php");
                require("depend/config.php");

                session_start();

                $_SESSION['current_page']='mondex';
                $sql = "SELECT * FROM monsters Order by mon_id ASC";
                if(array_key_exists('search', $_POST)){
                    $sql = "SELECT * FROM monsters WHERE mon_name REGEXP '".$_POST['search']."' Order by mon_id ASC";
                }
                $result = $db->query($sql) or die($db->error);


                
                //echo "number of monsters: " . $result->num_rows;
                
                if ($result !== false && $result->num_rows > 0) {
                    // output data of each row
                    $render_num = 0;
                    $row_num = 0;
                    echo '<div class="container" style = "max-width: 98%"><div class="row">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class = "col-3 col-sm-2 col-lg-1" style="padding: 10px 10px">';
                        echo '<div id = "mon" class = "bg-light rounded border border-secondary border-3">';
                        echo '<form action="monster_page.php" method="post"> <input type="text" id="Id" name="Id" style="display:none; height: 0px;" value= ' . $row['mon_id'] . '> <input type="text" id="disp_id" name="disp_id" style="display:none; height: 0px;" value= ' . $row['mon_render_id'] . '> <input type="image" src="depend/image.php?id='. $row['mon_id'] .'" width="64" height="64" name="submit"> </form>';
                        echo "<p> #" . $row['mon_render_id'] . " " . $row['mon_name'] . "</p>";
                        
                        echo "</div></div>";
                        $render_num++;
                        if($render_num >= 12){
                            echo '</div>';
                            echo '<div class="row">';
                            $render_num = 0;
                            $row_num ++;
                        }
                    }
                    echo '</div>';
                } else {
                    echo "0 results";
                }
            ?>
        </div>
        <?php
        if(array_key_exists('username', $_COOKIE)){
            echo '<div class="container">
                <div class="row justify-content-center sm-justify-content-start md-justify-content-center">
                    <div class="col-4 bg-warning rounded border border-3 border-secondary">
                        <div id="upload" class="container">
                            <h3>Add Your Own Monster</h3>
                            <form action="new_monster.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name:</label><br>
                                <input type="text" id="name" name="name" placeholder="Monster\'s Name ..."><br>
                                <label for="desc">Description:</label><br>
                                <input type="text" id="desc" name="desc" placeholder="Monster\'s Description ..."><br><br>
                            </div>
                            <input type="file" name="FileName" id="fileToUpload" /><br><br>
                            <div class = "pb-2" id="canvasContainer"></div>
                            <div class = "pb-2" id="rSliderContainer"></div>
                            <div class = "pb-2" id="gSliderContainer"></div>
                            <div class = "pb-2" id="bSliderContainer"></div>

                            <div class = "pb-2" id="gridButtonContainer">
                                <input type="checkbox" class="btn-check" id="btncheck1">
                                <label class="btn btn-outline-dark" for="btncheck1">Grid</label>
                            </div>
                            
                            <button class="btn btn-dark" type="submit"  name="submit">Upload  <i class="fa-regular fa-paper-plane"></i></button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>';
        }
        ?>
        
    </body>
</html>

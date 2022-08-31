<html>
    <head>
        <?php

        ?>
        <title> MonDex</title>
        <style>

        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div>
            <?php
                require("depend\config.php");
                
                session_start();
                $_SESSION['current_page']='mondex';
                $sql = "SELECT * FROM monsters Order by Id ASC";
                $result = $db->query($sql) or die($db->error);
                //echo "number of monsters: " . $result->num_rows;
                
                if ($result !== false && $result->num_rows > 0) {
                    // output data of each row
                    $render_num = 0;
                    echo '<div class="container" style = "max-width: 98%"><div class="row">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class = "col-2">';
                        echo '<div id = "mon" class = "bg-primary">';
                        echo "<h3> #" . $row['Id'] . " " . $row['Name'] . "</h3>";
                        echo "<h6>" . $row['Owner'] . "</h6>";
                        echo "<p>" . $row['Desc'] . "</p>";
                        echo "</div></div>";
                        $render_num++;
                        if($render_num >= 6){
                            echo '</div>';
                            echo '<div class="row">';
                        }
                    }
                    echo '</div>';
                } else {
                    echo "0 results";
                }
            ?>
        </div>
        <div id="upload" class="container" style="background-color: yellow; max-width: 98%;">
            <h3>Add Your Own Monster</h3>
            <form action="new_monster.php" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Monster's Name ..."><br>
            <label for="desc">Description:</label><br>
            <input type="text" id="desc" name="desc" placeholder="Monster's Description ..."><br><br>
            <input type="submit" value="Upload" name="submit">
            </form> 
        </div>
    </body>
</html>

<html>
    <head>
        
    </head>
    <body>
        <?php
            require("depend\config.php");
            $name = $_POST['name'];
            $owner = "Christian";
            $desc = $_POST['desc'];
            $FileName = $_FILES["FileName"]["name"];
            
            echo "Extension:" . strtolower(pathinfo($FileName, PATHINFO_EXTENSION)) . "\n";
            $Extension = strtolower(pathinfo($FileName, PATHINFO_EXTENSION));

            $whitelist = array("png");

            if (in_array($Extension, $whitelist)) {
                $image = addslashes(file_get_contents($_FILES["FileName"]["tmp_name"])); //prep as blob

                $sql = "INSERT INTO monsters (mon_name, mon_owner, mon_desc, mon_img) VALUES ('$name', '$owner', '$desc', '$image')";

                var_dump($db->query($sql));
            } else {
                echo "Sorry $FileName file type is not .png";
            }
            header("Location:index.php");
        ?>
    </body>
</html>
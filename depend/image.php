<?php
    require("config.php");
    $id = $_GET['id'];
    $imageFile = $db->query('SELECT mon_img FROM monsters WHERE mon_id =' . $id);
    header('Content-Type: image/png');
    if ($imageFile) {
        echo $imageFile->fetch_assoc()['mon_img'];
    } else {
        http_response_code(404);
        echo ":(";
    }
?>
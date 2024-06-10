<?php

// echo ("Remove From Recent Process");

require "connection.php";

if (isset($_GET["id"])) {

    $rid = $_GET["id"];
    // echo ($rid);

    $recent_rs = Database::search("SELECT * FROM `recent` WHERE `recent_id`='".$rid."'");
    $recent_count = $recent_rs->num_rows;
    
    if ($recent_count == 0) {
        echo ("Something went wrong. Please try again later.");
    } else {
        
        Database::iud("DELETE FROM `recent` WHERE `recent_id`='".$rid."'");

        echo ("success");

    }

} else {
    echo("Please select a product");
}

?>
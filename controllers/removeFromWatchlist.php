<?php

// echo ("Remove From Watchlist Process");

require "../connection.php";

if (isset($_GET["id"])) {

    $wid = $_GET["id"];
    // echo ($wid);

    $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `watchlist_id`='".$wid."'");
    $watch_count = $watch_rs->num_rows;
    
    if ($watch_count == 0) {
        echo ("Something went wrong. Please try again later.");
    } else {
        
        $watch_data = $watch_rs->fetch_assoc();

        Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('".$watch_data["product_id"]."','".$watch_data["user_email"]."')");

        Database::iud("DELETE FROM `watchlist` WHERE `watchlist_id`='".$wid."'");

        echo ("success");

    }

} else {
    echo("Please select a product");
}

?>
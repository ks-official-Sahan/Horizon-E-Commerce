<?php

// echo ("Add to Watch List Process");

session_start();

require "../connection.php";

if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];

    $mail = $user["email"];
    // $mail = $_GET["mail"];
    $pid = $_GET["id"];
    // echo ($mail);

    $watchList_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $mail . "'");
    if ($watchList_rs->num_rows > 0) {
        echo ("Already available on your watchlist");
    } else {
        Database::iud("INSERT INTO `watchlist` (`product_id`, `user_email`) VALUES ('" . $pid . "', '" . $mail . "');");
        echo ("success");
    }

} else {
    echo ("Please Sign in or Register");
}

?>
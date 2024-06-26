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

    $recent_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "' AND `user_email`='" . $mail . "'");
    if ($recent_rs->num_rows == 0) {
        Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('" . $pid . "','" . $mail . "')");
        echo ("success");
    }

} else {
    echo ("Please Sign in or Register");
}

?>
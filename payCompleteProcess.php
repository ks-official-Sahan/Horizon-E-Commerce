<?php

// echo ("Pay Complete Process");

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];

    $mail = $_POST["mail"];

    // echo ($mail);

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");

    $validity = date('Y-m-d', strtotime('+1 month'));

    $subscription_rs = Database::search("SELECT * FROM `subscription`");
    $subscription_data = $subscription_rs->fetch_assoc();

    Database::iud("INSERT INTO `student_has_subscription` (`user_email`,`subscription_id`,`date`,`validity`) VALUES ('" . $mail . "','" . $subscription_data["id"] . "','" . $date . "', '".$validity."')");

    echo ("1");

} else {
    echo ("Please Sign in or Register");
}

?>
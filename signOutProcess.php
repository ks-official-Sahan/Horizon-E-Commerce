<?php

// echo ("Sign Out Process");

require "connection.php";

session_start();

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    Database::iud("UPDATE `user` SET `online`='0',`last_seen`='".$date."' WHERE `email`='".$email."'");

    $_SESSION["user"] = null;

    session_destroy();

    echo ("user");

} else if (isset($_SESSION["admin"])) {

    $email = $_SESSION["admin"]["email"];

    Database::iud("UPDATE `user` SET `online`='0',`last_seen`='".$date."' WHERE `email`='".$email."'");

    $_SESSION["admin"] = null;

    session_destroy();

    echo ("admin");

}

?>
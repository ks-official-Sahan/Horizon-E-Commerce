<?php

// echo ("Admin Sign In Process");

session_start();

require "connection.php";

if (!empty($_POST["vcode"])) {

    if (isset($_POST["vcode"])) {

        $vcode = $_POST["vcode"];

        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `verification_code`='".$vcode."'");
        $admin_count = $admin_rs->num_rows;

        if ($admin_count > 0) {

            $admin_data = $admin_rs->fetch_assoc();

            if (isset($_POST["email"])) {

                $email = $_POST["email"];

                if ($admin_data["email"] == $email) {

                    $_SESSION["admin"] = $admin_data;

                    echo ("success");

                } else {
                    echo ("Error finding the user. Please try again or Contact the developer");
                }

            } else {
                echo ("Something went wrong. Please try again");
            }

        } else {
            echo ("Invalid Verification Code. Check your inbox for latest Verification Code.");
        }

    } else {
        echo ("Invalid Verification Code");
    }

} else {
    echo ("Enter your Verification Code !!");
}

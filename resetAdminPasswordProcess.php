<?php

// echo ("Reset Password Process");

require "connection.php";

if (isset($_POST["email"])) {

    $email = $_POST["email"];

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
    $admin_count = $admin_rs->num_rows;

    if ($admin_count == 1) {

        $admin_data = $admin_rs->fetch_assoc();

        $password = $_POST["password"];
        $check = $_POST["check"];

        if (empty($password)) {
            echo ("Enter your New Password");
        } else if (empty($check)) {
            echo ("Please re-enter your New Password");
        } else if (strlen($password) > 30 || strlen($password) < 5) {
            echo ("Password should contain 5 to 30 characters");
        } else if ($password != $check) {
            echo ("Passwords do not match. Please check again");
        } else if ($password == $admin_data["password"]) {
            echo ("You've entered an old password. Please enter a new password.");
        } else {

            if (!empty($_POST["vcode"])) {

                if (isset($_POST["vcode"])) {

                    $vcode = $_POST["vcode"];

                    if ($user_data["verification_code"] == $vcode) {

                        Database::iud("UPDATE `admin` SET `password`='" . $password . "' WHERE `email`='" . $email . "'");

                        echo ("success");

                    } else {
                        echo ("Invalid Verification Code. Check your inbox for latest Verification Code.");
                    }

                } else {
                    echo ("Invalid Verification Code");
                }

            } else {
                echo ("Please enter your Verification Code");
            }

        }

    } else {
        echo ("Invalid Admin. Please try agian or contact Database Administrator");
    }

} else {
    echo ("Invalid Email");
}

?>
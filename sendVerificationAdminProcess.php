<?php

// echo ("Send Verificaion Admin Process");

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (!empty($_POST["email"])) {

    if (isset($_POST["email"])) {

        $email = $_POST["email"];

        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $email . "'");
        $admin_count = $admin_rs->num_rows;

        if ($admin_count > 0) {

            $admin_data = $admin_rs->fetch_assoc();

            if (!empty($_POST["mobile"])) {

                if (isset($_POST["mobile"])) {

                    $mobile = $_POST["mobile"];

                    if ($admin_data["mobile"] == $mobile) {

                        $code = uniqid();

                        Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "' AND `mobile`='" . $mobile . "'");

                        $subject = 'Horizon CSR Verification Code (Admin Login)';
                        $bodyContent = "<div><h2 style='color:blue;'>Your Verification code is " . $code . "</h2></div>";

                        $response = PHPMailer::setupMail($email,$subject,$bodyContent);

                        echo($response);

                    } else {
                        echo ("Incorrect admin mobile number. Check again or contact Database Administrator.");
                    }

                } else {
                    echo ("Invalid Mobile");
                }

            } else {
                echo ("Please enter your mobile");
            }

        } else {
            echo ("Your a not a valid Admin");
        }

    } else {
        echo ("Invalid Email !!");
    }

} else {
    echo ("Email should not be emptied. Please enter your Email.");
}
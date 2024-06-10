<?php

// echo ("Forgot Password Process");

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (!empty($_GET["e"])) {

    if (isset($_GET["e"])) {

        $email = $_GET["e"];

        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."'");
        $admin_count = $admin_rs->num_rows;

        if ($admin_count == 1) {

            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

            $subject = 'Horizon CSR Verification Code (Admin Forgot Password)';
            $content = "<div><h2 style='color: aqua;'>Your Verification code is " . $code . "</h2></div>";

            $response = PHPMailer::setupMail($email,$subject,$content);

            echo ($response);

        } else {
            echo ("Invalid Admin. Please try agian or contact Database Administrator");
        }

    } else {
        echo ("Invalid Email");
    }

} else {
    echo ("Please enter your Email");
}

?>
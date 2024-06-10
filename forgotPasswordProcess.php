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

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."'");
        $user_count = $user_rs->num_rows;

        if ($user_count == 1) {

            $code = uniqid();

            Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

            $subject = 'Horizon CSR Verification Code (User Forgot Password)';
            $content = "<div><h2 style='color: darkblue;'>Your Verification code is " . $code . "</h2></div>";

            $response = PHPMailer::setupMail($email,$subject,$content);

            echo ($response);

        } else {
            echo ("Invalid User. Please try agian or register");
        }

    } else {
        echo ("Invalid Email");
    }

} else {
    echo ("Please enter your Email");
}

?>
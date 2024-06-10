<?php

// echo ("Sign Up Process");

session_start();

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$country = $_POST["country"];
$gender = $_POST["gender"];

// echo ($fname." : ".$lname." : ".$email." : ".$password." : ".$mobile." : ".$country." : ".$gender);

    // Validations
    if (empty($fname)) {
        echo ("Please enter your First Name !!!");
    }else if (strlen($fname) > 50) {
        echo ("First Name must have less than 50 characters !");
    }else if (empty($lname)) {
        echo ("Please enter your Last Name !!!");
    }else if (strlen($lname) > 50) {
        echo ("Last Name must have less than 50 characters !");
    }else if (empty($email)) {
        echo ("Please enter your Email !!!");
    }else if (strlen($email) > 100) {
        echo ("Email must have less than 100 Characters !");
    }else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo ("Invalid Email !!! (Check the format) eg: username@domain.com");
    }else if (empty($password)) {
        echo ("Please enter your Password !!!");
    }else if (strlen($password) < 5 || strlen($password) > 30) {
        echo ("Password should be between 5 and 30 characters");
    }else if (empty($mobile)) {
        echo ("Please enter your Mobile !!!");
    }else if (strlen($mobile) != 9) {
        echo ("Mobile must have 9 digits ! (Try without 0 in the beginning)");
    }else if (!preg_match("/7[0,1,2,4,5,6,7,8][0-9]/",$mobile)) {
        echo ("Invalid Mobile !!! (Try without 0 in the beginning) eg: 7xxxxxxxx");
    }else if ($gender == 0) {
        echo ("Please enter your Gender !!!");
    }else {
        
        $result = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
        $count = $result->num_rows;

        if ($count > 0) {

            echo ("User with the same Email or Mobile already exists !");
        
        } else {

            // Date Configurations
            $date = new DateTime();
            $timezone = new DateTimeZone("Asia/Colombo");
            $date->setTimezone($timezone);
            $currentDate = $date->format("Y-m-d H:i:s");
            // Date Configurations

            $country_rs = Database::search("SELECT * FROM `country` WHERE `id`='".$country."'");
            $country_data = $country_rs->fetch_assoc();
            
            // Valid Data Insertion
            Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`,`mobile`,`gender_id`,`joined_date`,`status`,`country_id`) VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$mobile."','".$gender."','".$currentDate."','1','".$country."')");
            // Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`password`,`mobile`,`gender_id`,`joined_date`,`status`,`country`) VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$country_data["code"].$mobile."','".$gender."','".$currentDate."','1','".$country."')");

            // Database::iud("INSERT INTO `address` ('user_email`,`city_id`) VALUES ('".$email."',`2`)");
            // Database::iud("INSERT INTO `profile_image` ('user_email`) VALUES ('".$email."')");

            $resultNew = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
            $countNew = $resultNew->num_rows;

            if ($countNew == 1) {

                $data = $resultNew->fetch_assoc();

                if (isset($_SESSION["user"])) {

                    $_SESSION["user"] = $data; 

                }
            
            }
            // Valid Data Insertion

            echo ("success");

        }

    }
    // Validations

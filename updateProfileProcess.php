<?php

    // echo ("Update Profile Process");

    session_start();

    require "connection.php";

    if (isset($_SESSION["user"])) {
        
        // echo ("Session Checked");
        $user = $_SESSION["user"];

        // echo($user["email"]);

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $mobile = $_POST["mobile"];
        $line1 = $_POST["line1"];
        $line2 = $_POST["line2"];
        $country = $_POST["country"];
        $province = $_POST["province"];
        $district = $_POST["district"];
        $city = $_POST["city"];
        $pcode = $_POST["pcode"];

        // echo($fname." : ".$lname." : ".$mobile." : ".$line1." : ".$line2." : ".$country." : ".$province." : ".$district." : ".$city." : ".$pcode);

        if (isset($_FILES["image"])) {

            $file = $_FILES["image"];
            
            $allowed_file_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
            $file_ex = $file["type"];
            
            if (!in_array($file_ex,$allowed_file_extentions)) {
                echo ("Selected image type is unsupported! " . $file_ex . " . Please select a valid Image.");
            }else {
                
                $new_file_extention;
                
                if ($file_ex == "image/jpg") {
                    $new_file_extention = ".jpg";
                } else if ($file_ex == "image/jpeg") {
                    $new_file_extention = ".jpeg"; 
                } else if ($file_ex == "image/png") {
                    $new_file_extention = ".png";
                }else if ($file_ex == "image/svg+xml") {
                    $new_file_extention = ".svg";
                }
                
                if (!is_dir("shared")) {
                    mkdir("shared", 0755);
                }
                if (!is_dir("shared/profile_img")) {
                    mkdir("shared/profile_img", 0755);
                }
                if (!is_dir("shared/profile_img/".$user["fname"])) {
                    mkdir("shared/profile_img/".$user["fname"], 0755);
                }

                if (!is_dir("shared/profile_img/".$user["fname"]."/".$user["lname"])) {
                    mkdir("shared/profile_img/".$user["fname"]."/".$user["lname"], 0755);
                }

                if (!is_dir("shared/profile_img/".$user["fname"]."/".$user["lname"]."/".$user["email"])) {
                    mkdir("shared/profile_img/".$user["fname"]."/".$user["lname"]."/".$user["email"], 0755);
                }

                // echo ($new_file_extention);
                $file_name = "shared/profile_img/".$user["fname"]."/".$user["lname"]."/".$user["email"]."/IMG"."_".uniqid().$new_file_extention;
                // echo ($file_name);
                
                move_uploaded_file($file["tmp_name"],$file_name);
                
                // echo ("success");
                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='".$user["email"]."'");
                $image_count = $image_rs->num_rows;
                
                if ($image_count == 1) {
                    Database::iud("UPDATE `profile_image` SET `path`='".$file_name."' WHERE `user_email`='".$user["email"]."'");
                }else {
                    Database::iud("INSERT INTO `profile_image` (`path`,`user_email`) VALUES ('".$file_name."','".$user["email"]."')");
                }
                
            }
            
        }
        
        // echo ($fname." : ".$lname." : ".$mobile." : ".$line1." : ".$line2." : ".$province." : ".$district." : ".$city." : ".$pcode);
        
        Database::iud("UPDATE `user` SET `fname`='".$fname."', `lname`='".$lname."', `mobile`='".$mobile."', `country_id`='".$country."' WHERE `email`='".$user["email"]."'");
        
        $address_rs = Database::search("SELECT * FROM `address` WHERE `user_email`='".$user["email"]."'");
        $address_count = $address_rs->num_rows;

        if ($address_count == 1) {
            Database::iud("UPDATE `address` SET `city_id`='".$city."', `line1`='".$line1."', `line2`='".$line2."', `postal_code`='".$pcode."' WHERE `user_email`='".$user["email"]."'");
        } else {
            if ($city != 0) {
                Database::iud("INSERT INTO `address` (`city_id`,`line1`,`line2`,`postal_code`,`user_email`) VALUES ('".$city."','".$line1."','".$line2."','".$pcode."','".$user["email"]."')");
            }
        }

        echo ("Profile Update Success");
    
    } else {
        echo ("Please Login First !!");
    }

?>
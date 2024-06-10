<?php

// echo ("Pay Now Process");

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $user = $_SESSION["user"];
    $email = $user["email"];

    if ($_GET["e"] == $email) {

        $umail = $_GET["e"];

        $array;
        $order_id = uniqid();

        $st_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $st_count = $st_rs->num_rows;

        if ($st_count == 1) {

            $st_data = $st_rs->fetch_assoc();

            $condition;

            $shs_rs = Database::search("SELECT * FROM `user_has_subscription` WHERE `user_email`='" . $umail . "'");
            $shs_count = $shs_rs->num_rows;

            if ($shs_count == 0) {
                $condition = false;
            } else {
                $shs_data = $shs_rs->fetch_assoc();
                $end_date = $shs_data["validity"];

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $today = $d->format("Y-m-d");
    
                if (strtotime($today) > strtotime($end_date)) {
                    Database::search("DELETE FROM `user_has_subscription` WHERE  `user_has_subscription_id`='".$shs_data["user_has_subscription_id"]."'");

                    $condition = true;
                } else {
                    $condition = false;
                }

            }


            if ($condition) {
                echo ("4");
            } else {

                $city_rs = Database::search("SELECT * FROM `address` WHERE `user_email`='" . $email . "'");
                $city_count = $city_rs->num_rows;

                if ($city_count == 1) {

                    $city_data = $city_rs->fetch_assoc();

                    if ($city_data["city_id"] != 0) {

                        $city_id = $city_data["city_id"];
                        $address = $city_data["line1"] . $city_data["line2"];

                        $district_rs = Database::search("SELECT * FROM `city` WHERE `city_id`='" . $city_id . "'");
                        $district_data = $district_rs->fetch_assoc();

                        $subscription_rs = Database::search("SELECT * FROM `subscription`");
                        $subscription_data = $subscription_rs->fetch_assoc();

                        $item = "Portal Fee : " . $subscription_data["value"];

                        $amount = (int)$subscription_data["value"];

                        $fname = $user["fname"];
                        $lname = $user["lname"];
                        $mobile = $user["mobile"];
                        $user_address = $address;
                        $city = $district_data["city"];

                        $array["id"] = $order_id;
                        $array["item"] = $item;
                        $array["amount"] = $amount;
                        $array["fname"] = $fname;
                        $array["lname"] = $lname;
                        $array["mobile"] = $mobile;
                        $array["adress"] = $address;
                        $array["city"] = $city;
                        $array["mail"] = $email;

                        echo (json_encode($array));
                    } else {
                        echo ("3");
                    }
                } else {
                    echo ("3");
                }
            }
        }
    } else {
        echo ("2");
    }
} else {
    echo ("1");
}

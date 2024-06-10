<?php

// echo ("Sign In Process");

require "connection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$remember = $_POST["remember"];

if (empty($username)) {
    echo ("Please enter your Email !!!");
}else if (strlen($username) > 100) {
    echo ("Email must have less than 100 Characters !");
}else if (!filter_var($username,FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!!");
}else if (empty($password)) {
    echo ("Please enter your Password !!!");
}else if (strlen($password) < 5 || strlen($password) > 30) {
    echo ("Password should be between 5 and 30 characters");
}else {

    $result = Database::search("SELECT * FROM `user` WHERE `email`='".$username."'");
    $count = $result->num_rows;

    if ($count == 1) {

        $data = $result->fetch_assoc();

        if ($data["status"] == 1) {

            if ($data["password"] == $password) {

                session_start();

                $_SESSION["user"] = $data;

                $d = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $d->setTimezone($tz);
                $date = $d->format("Y-m-d H:i:s");

                Database::iud("UPDATE `user` SET `online`='2',`last_seen`='".$date."' WHERE `email`='".$username."'");
                Database::iud("UPDATE `content` SET `status`='2' WHERE `from`='".$username."' OR `to`='".$username."' AND `status`='1'");
    
                if ($remember == "true") {
    
                    setcookie("email", $username, time()+(60*60*24*365));
                    setcookie("password", $password, time()+(60*60*24*365));
    
                } else {
    
                    setcookie("email", "", -1);
                    setcookie("password", "", -1);
    
                }

                echo ("success");
    
            } else {
                echo ("Incorrect Password. Please try again");
            }    

        } else {
            echo ("You have been blocked by the Admins. Please contact Support to appeal.");
        }

    } else {
        echo ("Can't find an account with this Email. Please try again or register");
    }

}

?>
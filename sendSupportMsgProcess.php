<?php

// echo ("Send Support Message Process");

session_start();

require "connection.php";

if (isset($_POST["admin"])) {

    $admin = $_POST["admin"];

    if (!empty($_POST["email"])) {

        $email = $_POST["email"];

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $user_count = $user_rs->num_rows;

        if ($user_count == 1) {

            if (!empty($_POST["subject"])) {

                if (!empty($_POST["content"])) {

                    $subject = $_POST["subject"];
                    $content = $_POST["content"];

                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");

                    Database::iud("INSERT INTO `support` (`email`,`subject`,`content`,`datetime`,`to`,`status`) VALUES ('" . $email . "','" . $subject . "','" . $content . "','" . $date . "','" . $admin . "','0')");

                    if (isset($_SESSION["user"])) {
                        echo ("user success");
                    } else {
                        echo ("success");
                    }

                } else {
                    echo ("Describe your problem in the content section");
                }

            } else {
                echo ("Enter your problem briefly in Subject field");
            }

        } else {
            echo ("Please use a registered email on the application in order to get support");
        }

    } else {
        echo ("Email is essential. Please enter your email.");
    }

} else {
    echo ("Select an admin to get Support");
}

?>
<?php

// Support Message Complete

?>
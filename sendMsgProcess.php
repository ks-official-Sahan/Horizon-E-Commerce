<?php

// echo ("Send Message Process");

require "connection.php";

if (isset($_POST["rmail"])) {

    $rmail = $_POST["rmail"];

    $receiver_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $rmail . "'");
    $receiver_count = $receiver_rs->num_rows;

    if ($receiver_count > 0) {

        $receiver_data = $receiver_rs->fetch_assoc();

        if ($receiver_data["status"] == 1) {

            if (isset($_POST["smail"])) {

                $smail = $_POST["smail"];

                $chat_id_rs = Database::search("SELECT chat_id FROM `chat` WHERE (`user1`='" . $smail . "' AND `user2`='" . $rmail . "') OR (`user2`='" . $smail . "' AND `user1`='" . $rmail . "')");
                $chat_id = $chat_id_rs->fetch_assoc();

                if (isset($_POST["txt"])) {

                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $tcdate = $d->format("Y-m-d H:i:s"); // Current Date Time
                    // echo ($tcdate);

                    $tdate = $d->format("Y-m-d"); // Current Date 
                    $ttime = $d->format("H:i:s"); // Current Time

                    $txt = $_POST["txt"];
                    $file_count = sizeof($_FILES);
                    // echo($file_count);

                    if (!empty($txt)) {

                        Database::iud("INSERT INTO `content` (`chat_id`,`content`,`status`,`datetime`,`date`,`time`,`from`,`to`) VALUES ('" . $chat_id["chat_id"] . "','" . $txt . "','1','" . $tcdate . "','" . $tdate . "','" . $ttime . "','" . $smail . "','" . $rmail . "')");
                        Database::iud("UPDATE `chat` SET `datetime`='" . $tcdate . "' WHERE `chat_id`='" . $chat_id["chat_id"] . "'");
                        echo ("txt success");
                    } else if ($file_count > 0) {

                        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

                        for ($x = 0; $x < $file_count; $x++) {
                            if (isset($_FILES["img" . $x])) {

                                $image_file = $_FILES["img" . $x];
                                $file_extention = $image_file["type"];
                                // echo ($file_extention);

                                if (in_array($file_extention, $allowed_img_extentions)) {

                                    $new_img_extention;

                                    if ($file_extention == "image/jpg") {
                                        $new_img_extention = ".jpg";
                                    } else if ($file_extention == "image/jpeg") {
                                        $new_img_extention = ".jpeg";
                                    } else if ($file_extention == "image/png") {
                                        $new_img_extention = ".png";
                                    } else if ($file_extention == "image/svg+xml") {
                                        $new_img_extention = ".svg";
                                    }

                                    if (!is_dir("shared")) {
                                        // mkdir("shared", 0600);
                                        mkdir("shared", 0755);
                                        // mkdir("shared", 0777);
                                    }

                                    if (!is_dir("shared/files")) {
                                        // mkdir("shared/files", 0600);
                                        mkdir("shared/files", 0755);
                                        // mkdir("shared/files", 0777);
                                    }

                                    if (!is_dir("shared/files/" . $smail)) {
                                        // mkdir("shared/files/".$smail, 0600);
                                        mkdir("shared/files/" . $smail, 0755);
                                        // mkdir("shared/files/".$smail, 0777);
                                    }

                                    if (!is_dir("shared/files/" . $smail . "/" . $rmail)) {
                                        // mkdir("shared/files/".$smail."/".$rmail, 0600);
                                        mkdir("shared/files/" . $smail . "/" . $rmail, 0755);
                                        // mkdir("shared/files/".$smail."/".$rmail, 0777);
                                    }
                                    if (!is_dir("shared/files/" . $smail . "/" . $rmail . "/" . $tdate)) {
                                        // mkdir("shared/files/".$smail."/".$rmail."/".$tdate, 0600);
                                        mkdir("shared/files/" . $smail . "/" . $rmail . "/" . $tdate, 0755);
                                        // mkdir("shared/files/".$smail."/".$rmail."/".$tdate, 0777);
                                    }

                                    $time = explode(":", $ttime);
                                    $t = $time[0] . "-" . $time[1] . "-" . $time[2];

                                    $file_2_name = "shared//files//" . $smail . "//" . $rmail . "/" . $tdate . "//IMG_" . $tdate . "_" . $t . $new_img_extention;
                                    copy($image_file["tmp_name"], $file_2_name);

                                    if (!is_dir("shared/img")) {
                                        // mkdir("shared/img", 0600);
                                        mkdir("shared/img", 0755);
                                        // mkdir("shared/img", 0777);
                                    }

                                    $file_name = "shared//img//IMG_" . $tdate . "_" . uniqid() . $new_img_extention;
                                    move_uploaded_file($image_file["tmp_name"], $file_name);

                                    Database::iud("INSERT INTO `attachment` (`attachment`,`type`) VALUES ('" . $file_name . "','" . $file_extention . "')");
                                    $attach_id = Database::$connection->insert_id;
                                    // echo ($attach_id);
                                    Database::iud("INSERT INTO `content` (`chat_id`,`attachment_id`,`status`,`datetime`,`date`,`time`,`from`,`to`) VALUES ('" . $chat_id["chat_id"] . "','" . $attach_id . "','1','" . $tcdate . "','" . $tdate . "','" . $ttime . "','" . $smail . "','" . $rmail . "')");
                                    Database::iud("UPDATE `chat` SET `datetime`='" . $tcdate . "' WHERE `chat_id`='" . $chat_id["chat_id"] . "'");
                                } else {
                                    echo ("Unsupported image type : " . $file_extention);
                                }
                            }
                        }

                        echo ("attach success");
                    } else {
                        echo ("Can't send empty Messages or Attachments");
                    }
                } else {
                    echo ("Message couldn't found");
                }
            } else {
                echo ("Sender didn't found. Please try again");
            }
        } else {
            echo ("The receiver is blocked by the system");
        }
    } else {
        echo ("Receiver isn't available");
    }
} else {
    echo ("Something went wrong. Receiver didn't found.");
}

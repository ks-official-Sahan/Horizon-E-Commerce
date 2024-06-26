<?php

// echo ("Load Chat Process");

require "connection.php";

session_start();

$obj = new stdClass();

if (!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
    $obj->result = "Something went wrong. Please Sign In again";
} else {

    if (isset($_POST["email"])) {

        $email = $_POST["email"];
        // echo ($_SESSION["user"]["email"]);

        $user_type = "user";
        if (isset($_SESSION["admin"])) {
            $user_type = "admin";
        }
        if ($_SESSION[$user_type]["email"] == $email) {

            ob_start();

            Database::iud("UPDATE `content` SET `status`='2' WHERE `to`='" . $email . "' AND `status`='1'");

            $chat_rs = Database::search("SELECT * FROM content INNER JOIN (SELECT chat_id AS c_id, `datetime` AS latest, user1, user2 FROM chat WHERE `user1`='" . $email . "' OR `user2`='" . $email . "') AS result ON chat_id=c_id WHERE `datetime`=latest ORDER BY `datetime` DESC");
            $chat_count = $chat_rs->num_rows;

            $count_rs = Database::search("SELECT * FROM content INNER JOIN (SELECT chat_id AS c_id, `datetime` AS latest, user1, user2 FROM chat WHERE `user1`='" . $email . "' OR `user2`='" . $email . "') AS result ON chat_id=c_id");
            $obj->count = $count_rs->num_rows;

            if ($chat_count > 0) {

                ?>

                <!-- Chats -->
                <div class="col-12 w-100 overflow-auto">
                    <div class="row g-0 justify-content-center">

                        <?php

                        for ($x = 0; $x < $chat_count; $x++) {

                            $chat_data = $chat_rs->fetch_assoc();

                            $user;
                            if ($email == $chat_data["to"]) {
                                // Received
                                $user = $chat_data["from"];
                            } else {
                                // Sent
                                $user = $chat_data["to"];
                            }

                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $user . "'");
                            $user_data = $user_rs->fetch_assoc();

                            $name = $user_data["fname"] . " " . $user_data["lname"];

                            // Getting The Current Date & Time according to the Relevant Time Zone
                            $d = new DateTime();
                            $tz = new DateTimeZone("Asia/Colombo");
                            $d->setTimezone($tz);
                            $dateTime = $d->format("Y-m-d H:i:s"); // Current Date Time
        
                            // Getting The Date of Today
                            $today = $d->format("Y-m-d"); // Current Date 
        
                            // Getting The Time of Relevant Message
                            $msgTime = $chat_data["time"]; // Msg Time H:i:s
                            $timeArray = explode(":", $msgTime);
                            $msgTime = $timeArray[0] . ":" . $timeArray[1]; // Msg Time H.i
        
                            // Getting The Date of Relevant Message
                            $msgDate = $chat_data["date"]; // Msg Date Y-m-d
        
                            // Getting The Date of Yesterday
                            $yd = new DateTime('yesterday', $tz);
                            $yesterday = $yd->format("Y-m-d");

                            // Setting The Relevant Date or Time of the Message
                            $dayOrTime;
                            if ($msgDate == $today) {
                                $dayOrTime = $msgTime;
                            } else if ($msgDate == $yesterday) {
                                $dayOrTime = "Yesterday";
                            } else {
                                $dayOrTime = $msgDate;
                            }

                            // User's Profile Picture
                            $user_profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user . "'");
                            $user_profile_count = $user_profile_rs->num_rows;

                            $user_profile_path;
                            if ($user_profile_count > 0) {

                                $user_profile_data = $user_profile_rs->fetch_assoc();

                                $user_profile_path = $user_profile_data["path"];
                            } else {

                                $user_profile_path = "resources/avatar.svg";
                            }

                            ?>

                            <div class="col-12 pe-2" onclick="openChat('<?php echo ($user); ?>', <?php echo ($chat_data['chat_id']); ?>);"
                                style="max-height: 100px; min-height: 77px;">
                                <div class="row chatBody g-0">
                                    <!-- Img -->
                                    <div class="col-2 pt-2 pb-2 ps-0 pe-3">
                                        <img src="<?php echo ($user_profile_path); ?>" style="max-height: 55px; width: 80%;"
                                            class="img-fluid rounded-circle ms-2 my-2 me-2">
                                    </div>
                                    <!-- Img -->
                                    <!-- Content -->
                                    <div class="col-10 border-bottom border-opacity-25 border-light mt-1">
                                        <div class="row g-0  mb-2">
                                            <!-- Msg -->
                                            <div class="col-lg-9 col-8 pt-2">
                                                <div class="row g-0 ">
                                                    <!-- User -->
                                                    <div class="col-12 text-white">
                                                        <span class="fs-5"><?php echo ($name); ?></span>
                                                    </div>
                                                    <!-- User -->
                                                    <!-- Txt -->
                                                    <div class="col-12 mt-1 pt-1 text-white-50">
                                                        <div class="row g-0 ">
                                                            <!-- Status -->
                                                            <?php

                                                            if ($email == $chat_data["from"]) {

                                                                ?>
                                                                <div class="col-2 col-lg-1 ps-1">
                                                                    <?php

                                                                    if ($chat_data["status"] == 1) {

                                                                        ?>
                                                                        <span><i class="bi bi-check2"></i></span>
                                                                        <?php

                                                                    } else if ($chat_data["status"] == 2) {

                                                                        ?>
                                                                            <span class="text-white"><i class="bi fs-6 bi-check2-all"></i></span>&nbsp;
                                                                        <?php

                                                                    } else if ($chat_data["status"] == 3) {

                                                                        ?>
                                                                                <span class="text-primary"><i class="bi fs-6 bi-check2-all"
                                                                                        style="color: hsl(227, 61%, 41%);"></i></span>&nbsp;
                                                                        <?php

                                                                    }

                                                                    ?>
                                                                </div>
                                                                <?php

                                                            }

                                                            ?>
                                                            <!-- Status -->
                                                            <!-- msg txt -->
                                                            <div class="col-10 col-lg-11" style="overflow: hidden; max-height: 1.8em;">
                                                                <?php

                                                                if ($chat_data["content"] != null) {

                                                                    ?>
                                                                    <span class="fs-6"><?php echo ($chat_data["content"]); ?></span>
                                                                    <?php

                                                                } else if ($chat_data["attachment_id"] != 0) {

                                                                    $attach_rs = Database::search("SELECT * FROM `attachment` WHERE `attachment_id`='" . $chat_data["attachment_id"] . "'");
                                                                    $attach_data = $attach_rs->fetch_assoc();

                                                                    ?>
                                                                        <div style="width: 50%; height: 25px;">
                                                                            <img src="<?php echo ($attach_data["attachment"]); ?>" class="img-fluid"
                                                                                style="max-height: 25px; min-height: 20px;"
                                                                                height="20px" />&nbsp;&nbsp;
                                                                            <span class="fs-6">Image File</span>
                                                                        </div>
                                                                    <?php

                                                                }

                                                                ?>
                                                            </div>
                                                            <!-- msg txt -->
                                                        </div>
                                                    </div>
                                                    <!-- Txt -->
                                                </div>
                                            </div>
                                            <!-- Msg -->
                                            <!-- Info -->
                                            <div class="col-3 p-1 pt-2 pe-3">
                                                <div class="row g-0 ">
                                                    <!-- Time -->
                                                    <div class="offset-3 col-9 text-start">
                                                        <div class="row g-0 ">
                                                            <div class="col-12 text-end">
                                                                <span class="text-white-50"
                                                                    style="font-size: 12px;"><?php echo ($dayOrTime); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Time -->
                                                    <?php

                                                    if ($email == $chat_data["to"]) {

                                                        $user = $chat_data["from"];

                                                        $msg_count_rs = Database::search("SELECT * FROM `content` WHERE `status`='1' AND `from`='" . $user . "' AND `to`='" . $email . "'");
                                                        $msg_count = $msg_count_rs->num_rows;

                                                        if ($msg_count > 0) {

                                                            ?>
                                                            <!-- Msg Count -->
                                                            <div class="col-4 offset-7 mt-2 rounded-circle">
                                                                <span
                                                                    class="badge bg-success rounded rounded-5 rounded-circle text-white-50 fs-6"><?php echo ($msg_count); ?></span>
                                                            </div>
                                                            <!-- Msg Count -->
                                                            <?php

                                                        }
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                            <!-- Info -->
                                        </div>
                                    </div>
                                    <!-- Content -->
                                </div>
                            </div>
                            <!-- Chat -->

                            <?php

                        }

                        ?>

                    </div>
                </div>
                <!-- Chats -->

                <?php

            } else {

                $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                $profile_count = $profile_rs->num_rows;
                ;

                $path;
                if ($profile_count > 0) {

                    $profile_data = $profile_rs->fetch_assoc();

                    $path = $profile_data["path"];
                } else {

                    $path = "resources/avatar.svg";
                }

                ?>

                <!-- Empty Chats -->
                <div class="col-12 pb-0 float-start overflow-hidden" style="max-height: 70vh; height: max-content; min-height: 60vh;">
                    <div class="row justify-content-center">

                        <div class="col-4 mt-4">
                            <img src="<?php echo ($path); ?>" class="img-fluid w-100" />
                        </div>
                        <div class="col-9 mt-2 mb-3 text-center text-white">
                            <span class="fs-5 mt-2 mb-3">You haven't stated a conversation with anyone yet. Use Chat Search or use the
                                following button to start a new Conversation.</span><br />
                            <button class="btn shadow btn-outline-success mt-4" id="btn2" onclick="searchChat();">Click here to start
                                new Conversation</button>
                        </div>

                    </div>
                </div>
                <!-- Empty Chats -->

                <?php

            }

            $obj->content = ob_get_clean();

            $obj->result = "success";

        } else {
            $obj->result = "Please Sign In";
        }

    } else {
        $obj->result = "Something went wrong. Couldn't Find the User's Email";
    }
}

$json = json_encode($obj);

echo ($json);

?>
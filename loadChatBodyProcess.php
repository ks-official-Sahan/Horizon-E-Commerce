<?php

// echo ("Load Chat Body Process");

session_start();

require "connection.php";

$obj = new stdClass();

ob_start();

$umail;
if (isset($_SESSION["user"])) {
    $umail = $_SESSION["user"]["email"];
} else if (isset($_SESSION["admin"])) {
    $umail = $_SESSION["admin"]["email"];
} else {
    header("Location:home.php");
}

if (isset($_POST["email"])) {

    $cmail = $_POST["email"];

    if (isset($_POST["c_id"])) {

        $c_id = $_POST["c_id"];

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $cmail . "'");
        $user_data = $user_rs->fetch_assoc();

        $total_rs = Database::search("SELECT * FROM `content` WHERE `chat_id`='" . $c_id . "'");

        // $chat_rs = Database::search("SELECT DISTINCT `date`, chat_id FROM `content` INNER JOIN (SELECT CASE WHEN `to`='" . $cmail . "' THEN `from` WHEN `from`='" . $cmail . "' THEN `to`END AS other, `datetime` AS dt FROM `content` WHERE `from`='" . $umail . "' OR `to`='" . $umail . "') AS alias ON (`from`='" . $cmail . "' AND `to`=other OR `to`='" . $cmail . "' AND `from`=other) AND `datetime`=dt ORDER BY `date`");
        $chat_rs = Database::search("SELECT DISTINCT `date` FROM `content` WHERE `chat_id`='" . $c_id . "' ORDER BY `date` DESC");
        $chat_count = $chat_rs->num_rows;

        for ($y = 0; $y < $chat_count; $y++) {

            $chat_data = $chat_rs->fetch_assoc();

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $dateTime = $d->format("Y-m-d H:i:s"); // Current Date Time

            $today = $d->format("Y-m-d"); // Current Date 
            $time = $d->format("Y-m-d"); // Current Time

            $cdate = $chat_data["date"]; // Msg Date Y-m-d

            $yd = new DateTime('yesterday', $tz);
            $ydate = $yd->format("Y-m-d");

            $day;
            if ($cdate == $today) {
                $day = "Today";
            } else if ($cdate == $ydate) {
                $day = "Yesterday";
            } else {
                $day = $cdate;
            }

?>

            <!-- Date -->
            <div class="col-12 mt-4 mb-4">
                <div class="row justify-content-center">
                    <div class="col-3 text-center">
                        <span class="fs-6 text-white-50 rounded-3 p-2 ps-3 pe-3 shadow" style="background-color: hsl(203,22%,16%);"><?php echo ($day); ?></span>
                    </div>
                </div>
            </div>
            <!-- Date -->

            <?php

            $msg_rs = Database::search("SELECT * FROM `content` WHERE `chat_id`='" . $c_id . "' AND `date`='" . $chat_data["date"] . "' ORDER BY `time` ASC");
            $msg_count = $msg_rs->num_rows;

            for ($x = 0; $x < $msg_count; $x++) {

                $msg_data = $msg_rs->fetch_assoc();

                $ct = $msg_data["time"]; // Msg Time H:i:s
                $ctarray = explode(":", $ct);
                $ctime = $ctarray[0] . ":" . $ctarray[1]; // Msg Time H:i

                if ($msg_data["from"] == $umail || $msg_data["to"] == $umail) {

                    if ($msg_data["from"] == $cmail && $msg_data["to"] == $umail) {

                        Database::iud("UPDATE `content` SET `status`='3' WHERE `chat_id`='" . $msg_data["chat_id"] . "' AND `status`='2'")

            ?>

                        <!-- Receive -->
                        <div class="col-10 text-start d-flex mb-1 flex-row justify-content-start">
                            <div class="d-inline-block pt-2 ps-3 pe-3 pb-2 rounded rounded-4 shadow" style="background-color: hsl(203,22%,20%); align-items: center; justify-content: center;">

                                <?php

                                if ($msg_data["content"] != null) {

                                ?>
                                    <span class="text-white"><?php echo ($msg_data["content"]); ?></span>&nbsp;&nbsp;&nbsp;
                                <?php

                                } else if ($msg_data["attachment_id"] != 0) {

                                    $attach_rs = Database::search("SELECT * FROM `attachment` WHERE `attachment_id`='" . $msg_data["attachment_id"] . "'");
                                    $attach_data = $attach_rs->fetch_assoc();

                                ?>
                                    <div class="w-100">
                                        <img src="<?php echo ($attach_data["attachment"]); ?>" class="img-fluid" style="max-height: 250px; min-height: 200px;" />
                                    </div>
                                <?php

                                }

                                ?>

                                <span class="text-white-50" style="font-size: 11px;"><?php echo ($ctime); ?></span>&nbsp;&nbsp;
                            </div>
                        </div>
                        <!-- Receive -->

                    <?php

                    } else if ($msg_data["to"] == $cmail && $msg_data["from"] == $umail) {

                    ?>

                        <!-- Sent -->
                        <div class="offset-2 col-10 text-start mb-1 d-flex flex-row justify-content-end">
                            <div class="bg-success d-inline-block pt-2 ps-3 pe-3 pb-2 shadow rounded rounded-4">
                                <?php

                                if ($msg_data["content"] != null) {

                                ?>
                                    <span class="text-white"><?php echo ($msg_data["content"]); ?></span>&nbsp;&nbsp;&nbsp;
                                <?php

                                } else if ($msg_data["attachment_id"] != 0) {

                                    $attach_rs = Database::search("SELECT * FROM `attachment` WHERE `attachment_id`='" . $msg_data["attachment_id"] . "'");
                                    $attach_data = $attach_rs->fetch_assoc();

                                ?>
                                    <div class="w-100">
                                        <img src="<?php echo ($attach_data["attachment"]); ?>" class="img-fluid" style="max-height: 250px; min-height: 200px;" />
                                    </div>
                                <?php

                                }

                                ?>

                                <span class="text-white-50" style="font-size: 11px;"><?php echo ($ctime); ?></span>&nbsp;&nbsp;&nbsp;

                                <?php

                                if ($umail == $msg_data["from"]) {

                                    if ($msg_data["status"] == 1) {

                                ?>
                                        <span><i class="bi bi-check2"></i></span>&nbsp;
                                    <?php

                                    } else if ($msg_data["status"] == 2) {

                                    ?>
                                        <span class="text-white"><i class="bi fs-6 bi-check2-all"></i></span>&nbsp;
                                    <?php

                                    } else if ($msg_data["status"] == 3) {

                                    ?>
                                        <span class="text-primary"><i class="bi fs-6 bi-check2-all" style="color: hsl(227, 61%, 41%);"></i></span>&nbsp;
                                <?php

                                    }
                                }

                                ?>

                            </div>
                        </div>
                        <!-- Sent -->

<?php

                    }

                }
            }
        }
        
        $obj->result = "success";
    } else {
        
        $obj->result = "Something went wrong!";
    }
} else {
    
    $obj->result = "Something went wrong";
}

$obj->count = $total_rs->num_rows;

$obj->content = ob_get_clean();

$json = json_encode($obj);

echo ($json);

?>
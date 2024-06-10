<?php

// echo ("Search Chat Process");

require "connection.php";

session_start();

$umail;
if (isset($_SESSION["user"])) {
    $umail = $_SESSION["user"]["email"];
}
if (isset($_SESSION["admin"])) {
    $umail = $_SESSION["admin"]["email"];
}

if (isset($_POST["txt"])) {

    $txt = $_POST["txt"];

    if (!empty($txt)) {

        $user_rs = Database::search("SELECT * FROM `user` WHERE (`email` LIKE '%" . $txt . "%' OR `fname` LIKE '%" . $txt . "%' OR `lname` LIKE '%" . $txt . "%' OR `mobile` LIKE '%" . $txt . "%') AND `email`!='" . $umail . "' AND `status`='1'");
        $user_count = $user_rs->num_rows;

        if ($user_count > 0) {

?>

            <!-- Chats -->
            <div class="col-12 w-100 overflow-auto">
                <div class="row g-0 justify-content-center">

                    <?php

                    for ($x = 0; $x < $user_count; $x++) {

                        $user_data = $user_rs->fetch_assoc();

                        $email = $user_data["email"];
                        $name = $user_data["fname"] . " " . $user_data["lname"];

                        $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                        $profile_count = $profile_rs->num_rows;

                        $path;
                        if ($profile_count > 0) {

                            $profile_data = $profile_rs->fetch_assoc();

                            $path = $profile_data["path"];
                        } else {

                            $path = "resources/avatar.svg";
                        }

                    ?>

                        <!-- Chat -->
                        <div class="col-12 pe-2" onclick="openChat('<?php echo ($user_data['email']); ?>');" style="max-height: 100px; min-height: 77px;">
                            <div class="row chatBody g-0">
                                <!-- Img -->
                                <div class="col-2 pt-2 pb-2 ps-0 pe-3">
                                    <img src="<?php echo ($path); ?>" style="max-height: 55px; width: 80%;" class="img-fluid rounded-circle ms-2 my-2 me-2">
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
                                                        <!-- msg txt -->
                                                        <div class="col-10 col-lg-11">
                                                            <span class="fs-6"><?php echo ($user_data["email"]); ?></span>
                                                        </div>
                                                        <!-- msg txt -->
                                                    </div>
                                                </div>
                                                <!-- Txt -->
                                            </div>
                                        </div>
                                        <!-- Msg -->
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

        ?>

            <!-- Empty Chats -->
            <div class="col-12 pb-0 float-start overflow-hidden" style="max-height: 70vh; height: max-content; min-height: 60vh;">
                <div class="row justify-content-center">

                    <div class="col-4 mt-4">
                        <img src="resources/logo/HS logo PSD green png .png" class="img-fluid w-100" />
                    </div>
                    <div class="col-9 mt-2 mb-3 text-center text-white">
                        <span class="fs-5 mt-2 mb-3">Can't find the user. Plese try again.</span><br />
                    </div>

                </div>
            </div>
            <!-- Empty Chats -->

<?php

        }

    } else {

        echo ("empty");
    }
    
} else {
    echo ("Something went wrong");
}

?>
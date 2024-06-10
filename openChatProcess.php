<?php

// echo ("Open Chat Process");

session_start();

require "connection.php";

if (!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
    echo ("Something went wrong. Please sign in again");
} else {

    $umail;
    if (isset($_SESSION["user"])) {
        $umail = $_SESSION["user"]["email"];
    } else if (isset($_SESSION["admin"])) {
        $umail = $_SESSION["admin"]["email"];
    }

    // Checking for the Other User's Email
    if (isset($_POST["email"])) {

        $email = $_POST["email"];

        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
        $user_data = $user_rs->fetch_assoc();

        $name = $user_data["fname"] . " " . $user_data["lname"];

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

        <div class="row g-0 vh-100 w-100 d-flex">

            <!-- Head -->
            <Header class="col-12 order-0 cursor-pointer border-start border-light border-opacity-25 w-100"
                style="min-height: 50px; max-height: 60px; background-color: hsl(203,22%,18%); margin-bottom: auto;">
                <div class="row g-0">

                    <!-- Img -->
                    <div class="col-3 col-lg-2 d-grid p-2 d-flex flex-row justify-content-start">
                            <button class="ms-1 ms-lg-0 btn rounded rounded-3" onclick="backToChat();"><i
                            class="bi bi-arrow-left fs-5 text-white-50"></i></button>
                            <img src="<?php echo ($path); ?>" style="max-height: 40px; width: 65%;"
                            class="img-fluid rounded-circle ms-2 my-1 me-2">
                    </div>
                    <!-- Img -->
                    <!-- Content -->
                    <div class="col-9 col-lg-10">
                        <div class="row g-0  mb-2">
                            <!-- User -->
                            <div class="col-10 pt-3">
                                <div class="row g-0 ">
                                    <div class="col-12 text-white text-start p-1 text-lg-center">
                                        &nbsp;&nbsp;<span class="fs-5">
                                            <?php echo ($name); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- User -->
                            <!-- More Option -->
                            <div class="col-2 pt-3 text-end pe-3">
                                    <span><i class="bi bi-three-dots-vertical text-white fs-4"></i></span>
                            </div>
                            <!-- More Option -->
                        </div>
                    </div>
                    <!-- Content -->

                </div>
            </Header>
            <!-- Head -->

            <!-- Body -->
            <div
                class="col-12 order-1 overflow-auto d-flex flex-column-reverse align-items-between justify-content-start vh-100 rounded-2 w-100 p-3 pb-1 openChatBody">
                <!-- <div class="col-12 order-1 overflow-auto d-flex flex-column-reverse align-items-between justify-content-start vh-100 rounded-2 border-top border-opacity-25 border-light w-100 p-3 pb-1 openChatBody"> -->
                <div class="row g-1 pt-3 align-content-end align-items-end">

                    <!-- Alert -->
                    <div class="offset-2 col-8 text-warning text-center p-2 rounded rounded-4 mb-4 shadow"
                        style="background-color: hsl(203,22%,16%);">
                        <span class="fs-6">No one outside the chat can read the messages</span>
                    </div>
                    <!-- Alert -->

                    <!-- ChatBody -->
                    <div class="col-12">
                        <div class="row g-0" id="chatContents">

                        </div>
                    </div>
                    <!-- ChatBody -->

                    <!-- Typing -->
                    <div class="offset-2 col-10 text-start d-flex flex-row justify-content-end d-none" id="typeDiv">
                        <div
                            class="bg-success d-inline-block pt-2 ps-2 pe-3 pb-2 shadow rounded rounded-4 text-white text-start">
                            <div class="text-white container d-flex flex-column"
                                style="overflow-wrap: break-word; word-wrap: break-word; align-items: center; justify-content: center;"
                                id="typing"></div>
                        </div>
                    </div>
                    <!-- Typing -->

                </div>
            </div>
            <!-- Body -->

            <!-- Sender -->
            <Footer class="col-12 pe-3 pe-lg-2 pt-lg-3 pt-3 pb-2 pb-lg-3 order-2 overflow-hidden"
                style="max-height: 70px; background-color: hsl(203,22%,18%); margin-top: auto; justify-content: center;">
                <div class="row g-0 justify-content-center" style="align-items: center;">

                    <div class="col-1 d-grid">
                        <input type="file" class="form-control bg-transparent d-none border-0" id="attach" accept="images/*"
                            multiple />
                        <label for="attach" class="btn text-center form-label" onclick="viewChat();"><i
                                class="bi bi-paperclip fs-5 text-white-50"></i></label>
                    </div>
                    <div class="col-10 ps-2 rounded-3">
                        <div contenteditable="true" id="msgtxt"
                            class="form-control text-white-50 p-1 rounded-4 border-0 shadow mb-1 ps-3 overflow-auto msgtxt"
                            onkeydown="viewChat();" id="msgtxt"
                            style="background-color: hsl(203,22%,21%); max-height: 50px; overflow-x: hidden; overflow-wrap: break-word; word-wrap: break-word;">
                        </div>
                    </div>
                    <div class="col-1 d-grid">
                        <button class="btn rounded text-center rounded-3"
                            onclick="sendMsg('<?php echo ($email); ?>','<?php echo ($umail); ?>');"><i
                                class="bi bi-send-fill fs-5 text-white-50"></i></button>
                    </div>

                </div>
            </Footer>
            <!-- Sender -->

        </div>

        <?php

    } else {
        echo ("Something went wrong. Please try again");
    }

}

?>
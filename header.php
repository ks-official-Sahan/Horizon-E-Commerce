<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php

    $email;
    $fname;
    $lname;

    if (isset($_SESSION["user"])) {

        $user = $_SESSION["user"];
        $email = $user["email"];
        $fname = $user["fname"];
        $lname = $user["lname"];

        Database::iud("UPDATE `user` SET `status`='1' WHERE `email`='" . $email . "'");
    } else {

        $email = null;
        $fname = "Horizon";
        $lname = "CSR";
    }

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

    <!-- Header -->
    <div class="col-12 text-white bg-transparent">
        <div class="row g-1 align-items-center justify-content-center align-content-center">

            <div class="col-lg-10 col-2">
                <!-- Navbar -->
                <?php include "navbar.php"; ?>
                <!-- Navbar -->
            </div>

            <div class="col-2 d-lg-none">
                <div class="logo" style="height: 50px;"></div>
            </div>

            <div class="offset-lg-0 offset-2 col-6 col-lg-2">
                <div class="row align-items-center">

                    <?php

                    if (isset($_SESSION["user"])) {

                        ?>

                        <div class="col-12">
                            <div class="dropdown justify-content-end d-grid">
                                <button class="btn dropdown-toggle border-0" type="button" style="min-width: 70px;"
                                    data-bs-toggle="dropdown">
                                    <img src="<?php echo ($path); ?>" class="rounded-circle"
                                        style="height: 40px; width: 100%;">
                                </button>
                                <ul class="dropdown-menu shadow w-100 dropdown-menu-lg-end dropdown-menu-start"
                                    style="background-image: linear-gradient(90deg, hsl(270, 88%, 45%) 0%, hsl(240, 68%, 45%) 100%); letter-spacing: 0.1rem;">
                                    <li class="mt-1 p-2 text-center text-white"><span class="fs-5">Hi,
                                            <?php echo ($fname); ?></span></li>
                                    <li class="mt-1">
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li class="mt-1"><a class="dropdown-item fw-bold text-dark" href="#"
                                            onclick="viewProfile();">Profile</a></li>
                                    <li class="mt-1"><a class="dropdown-item fw-bold text-dark" href="watchList.php">Watch
                                            List</a></li>
                                    <li class="mt-1"><a class="dropdown-item fw-bold text-dark"
                                            href="messages.php?m">Messages</a></li>
                                    <li class="mt-1"><a class="dropdown-item fw-bold text-dark"
                                            href="recents.php">Recents</a></li>
                                    <li class="mt-1">
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li class="p-1 text-center"><span
                                            class="fw-bold btn fs-5 dropdown-item mt-1 mb-1 text-warning"
                                            onclick="signOut();">Sign Out</span></li>
                                </ul>
                            </div>
                        </div>

                        <?php

                    } else {

                        ?>
                        <span class="fw-bold cursor-pointer btn text-warning" onclick="window.location = 'index.php';">Sign
                            in or Register</span>
                        <?php

                    }

                    ?>

                </div>
            </div>

        </div>
    </div>
    <!-- Header -->

    <!-- Support Modal -->
    <?php

    require "bg-color.php";

    $angle0 = "120";
    $color1 = "320, 96%, 32%, 25%";
    $color2 = "223, 97%, 34%, 25%";
    $color3 = "230, 99%, 29%, 25%";
    $result1 = bgColor::setColorMain($angle0, $color1, $color2, $color3);

    $result = bgColor::setDefaultColor();

    ?>
    <div class="modal pe-5" tabindex="-1" id="supportModal" style="<?php echo ($result1); ?>">
        <!-- <div class="modal pe-5" tabindex="-1" id="supportModal" style="background-image: linear-gradient(90deg, hsl(351, 70%, 56%) 0%, hsl(223, 67%, 44%) 50%, hsl(253, 46%, 32%) 100%);"> -->
        <div class=" modal-dialog modal-fullscreen p-4 pe-5">
            <div class="modal-content rounded rounded-4 shadow" style="<?php echo ($result); ?>">
                <!-- <div class="modal-content" style="background-image: linear-gradient(90deg, hsl(351, 70%, 56%) 0%, hsl(223, 67%, 44%) 50%, hsl(253, 46%, 32%) 100%);"> -->
                <div class="modal-header text-center shadow">
                    <h5 class="modal-title text-primary fw-bold text-uppercase fs-4" style="letter-spacing: 0.1rem;">
                        Help & Support</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="row justify-content-center align-items-center align-content-center">

                            <div class="col-12 text-start mb-1">
                                <span class="text-white fw-bold fs-5" id="title">Contact Admin</span>
                            </div>

                            <div class="col-12 h-100 border-top">
                                <div class="row align-content-center align-items-center justify-content-center py-lg-3">

                                    <div class="col-5 col-lg-4 h-100">
                                        <div class="row justify-content-center align-items-center align-content-center"
                                            style="overflow-y: auto;">
                                            <?php

                                            $admin_rs = Database::search("SELECT * FROM `admin` ORDER BY `fname`");
                                            $admin_count = $admin_rs->num_rows;

                                            for ($x = 0; $x < $admin_count; $x++) {

                                                $admin_data = $admin_rs->fetch_assoc();

                                                ?>
                                                <div class="col-11 d-grid">
                                                    <!-- <span class="text-black-50 fw-bold fs-6 btn btn-outline-light mb-3 mt-3 border-0" style="letter-spacing: 0.1rem;" onclick="setAdminMail('<?php echo ($admin_data['email']); ?>');"> -->
                                                    <span
                                                        class="text-black-50 fw-bold fs-6 shadow btn btn-outline-light mb-3 mt-3 border-0"
                                                        style="letter-spacing: 0.1rem; <?php // echo ($result); 
                                                            ?>"
                                                        onclick="setAdminMail('<?php echo ($admin_data['email']); ?>');">
                                                        <?php

                                                        echo ($admin_data["fname"] . " " . $admin_data["lname"]);

                                                        $owner = "ks.official.sahan@gmail.com";
                                                        $co_owner = "wjshashini@gmail.com";

                                                        if ($admin_data["email"] == $owner) {
                                                            echo (" [Owner]");
                                                        } else if ($admin_data["email"] == $co_owner) {
                                                            echo (" [Co-Owner]");
                                                        } else {
                                                            echo (" [Admin]");
                                                        }

                                                        ?>
                                                    </span>
                                                </div>
                                                <?php

                                            }

                                            ?>

                                        </div>
                                    </div>

                                    <div
                                        class="col-7 col-lg-8 text-white border-start rounded-3 px-3 mt-2 mt-lg-2 d-flex">
                                        <div class="row justify-content-center align-content-center align-items-center">

                                            <div class="col-12 d-none">
                                                <label class="form-label">Admin</label>
                                                <input type="email" class="form-control" id="amail"
                                                    value="<?php echo ($owner); ?>" />
                                            </div>
                                            <div class="col-12 mb-3 mt-1">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" value="<?php echo ($email); ?>"
                                                    id="umail" placeholder="Enter your email" />
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="subject"
                                                    placeholder="Enter the subject" />
                                            </div>
                                            <div class="col-12 mb-3">
                                                <textarea cols="30" rows="9" class="form-control" id="content"
                                                    placeholder="Enter your problem"></textarea>
                                            </div>

                                            <div class="col-12 col-lg-6 d-grid mb-2 mb-lg-4">
                                                <button class="btn btn-light text-dark fs-6 text-uppercase"
                                                    onclick="sendSupportMsg();">Send</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-4 d-grid">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Support Modal -->

    <!-- <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script> -->
</body>

</html>
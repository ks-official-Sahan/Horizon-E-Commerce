<?php

require "connection.php";

session_start();

if (isset($_GET["m"])) {

    $umail;
    if (isset($_SESSION["admin"])) {
        $umail = $_SESSION["admin"]["email"];
    } else if (isset($_SESSION["user"])) {
        $umail = $_SESSION["user"]["email"];
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Messages | Horizon CSR</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap2.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

        <link rel="icon" href="resources/logo/HS logo black png.png" />

    </head>

    <!-- <body style="overflow-x: hidden;" class="vh-100" onload="setInterval(function () { loadChat('<?php // echo ($umail); ?>'); }, 10*1000);"> -->

    <body style="overflow-x: hidden;" class="vh-100" onload="loadChat('<?php echo ($umail); ?>');">

        <div class="container-fluid vh-100 w-100 p-0">
            <div class="row g-0  justify-content-center">

                <!-- Content -->
                <div class="col-12 col-lg-5 chats vh-100 overflow-hidden">

                    <div class="row g-0 ">

                        <!-- Head -->
                        <div class="col-12">
                            <div class="row g-0 ">
                                <?php

                                if (isset($_SESSION["admin"])) {

                                ?>

                                    <!-- Header -->
                                    <!-- Navbar -->
                                    <nav class="navbar pb-1 pb-lg-2" style="background-color: hsl(202,23%,16%);">

                                        <?php

                                        $email;
                                        $path;
                                        if (isset($_SESSION["admin"])) {

                                            $admin = $_SESSION["admin"];
                                            $email = $admin["email"];
                                            $fname = $admin["fname"];
                                            $lname = $admin["lname"];

                                            $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                                            $profile_count = $profile_rs->num_rows;

                                            if ($profile_count > 0) {

                                                $profile_data = $profile_rs->fetch_assoc();

                                                $path = $profile_data["path"];
                                            } else {

                                                $path = "resources/avatar.svg";
                                            }

                                        ?>

                                            <div class="container-fluid">
                                                <div class="col-6">
                                                    <button class="navbar-toggler btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                                        <span class="navbar-toggler-icon"></span>
                                                    </button>
                                                </div>
                                                <div class="col-6 d-block text-end mt-2 pe-3 opacity-75">
                                                    <span class="fw-bold link-light text-uppercase cursor-pointer me-3" onclick="signOut();">Sign Out</span>
                                                </div>
                                                <div class="col-lg-11 col-12 d-lg-block my-1">
                                                    <div class="row g-0 ">

                                                        <div class="col-12">
                                                            <div class="row g-0  justify-content-center">

                                                                <!-- Title -->
                                                                <div class="col-8 mt-2 col-lg-10">
                                                                    <div class="row g-0 ">
                                                                        <div class="col-12 text-start ps-3 pt-2">
                                                                            <span class="fs-4 text-white-50 text-uppercase fw-bold" style="letter-spacing: 0.5rem;">Horizon CSR</span>
                                                                            <!-- <span class="fs-4 text-white-50 text-uppercase fw-bold" style="letter-spacing: 0.5rem;">Messages Horizon CSR</span> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Title -->

                                                                <!-- Profile -->
                                                                <div class="col-4 col-lg-2">
                                                                    <div class="dropdown d-grid">
                                                                        <button class="btn dropdown-toggle border-0" type="button" data-bs-toggle="dropdown">
                                                                            <img src="<?php echo ($path); ?>" class="rounded-circle" height="40px">
                                                                        </button>
                                                                        <ul class="dropdown-menu bg-secondary shadow w-100 dropdown-menu-end">
                                                                            <li><a class="dropdown-item" href="#" onclick="viewProfile(<?php echo ($email); ?>);">Profile</a></li>
                                                                            <li><a class="dropdown-item" href="myProducts.php">Products</a></li>
                                                                            <li>
                                                                                <span class="fw-bold cursor-pointer dropdown-item" onclick="signOut();">Sign Out</span>

                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- Profile -->

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                                <!-- Offcanvas -->
                                                <div class="offcanvas offCanvasAdmin text-uppercase offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                                                    <div class="offcanvas-header bg-dark">
                                                        <h5 class="offcanvas-title text-info" id="offcanvasNavbarLabel"><?php echo ($fname . " " . $lname); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                    </div>

                                                    <div class="offcanvas-body bg-dark">

                                                        <div class="d-flex mb-3" role="search">
                                                            <input class="text-white form-control me-2 bg-transparent" id="panelSearch_input" type="search" placeholder="Search" aria-label="Search">
                                                            <button class="btn btn-outline-success text-white" onclick="panelSearch();">Search</button>
                                                        </div>

                                                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                                            <li class="nav-item"><a class="nav-link text-white" href="adminPanel.php">Dashboard</a></li>
                                                            <li class="nav-item dropdown mb-2">
                                                                <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Manage</a>
                                                                <ul class="dropdown-menu border-light border rounded-3 pt-2 rounded bg-secondary">
                                                                    <li><a class="dropdown-item" href="manageUsers.php">Users</a></li>
                                                                    <li><a class="dropdown-item" href="manageproducts.php">Products</a></li>
                                                                </ul>
                                                            </li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="messages.php?m">Messages</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="home.php">Home</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="cart.php">Cart</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="recents.php">Recents</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="#">Purchase History</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="watchList.php">Watch List</a></li>
                                                            <li class="nav-item dropdown mb-2">
                                                                <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                                                                <ul class="dropdown-menu border-light border rounded-3 pt-2 rounded bg-secondary">
                                                                    <?php

                                                                    $limit;
                                                                    if (isset($_GET["limit"])) {
                                                                        $limit = $_GET["limit"];
                                                                    } else {
                                                                        $limit = "LIMIT 4";
                                                                    }

                                                                    $query = "SELECT * FROM `category`" . $limit;

                                                                    $category_rs = Database::search($query);
                                                                    $category_count = $category_rs->num_rows;;

                                                                    for ($x = 0; $x < $category_count; $x++) {

                                                                        $category_data = $category_rs->fetch_assoc();

                                                                    ?>
                                                                        <li class="mt-1"><a class="dropdown-item" href="#" onclick="viewCategory(<?php echo ($category_data['category_id']); ?>);"><?php echo ($category_data["category"]); ?></a></li>
                                                                    <?php

                                                                    }

                                                                    ?>
                                                                    <li class="mt-1 mb-0">
                                                                        <hr class="dropdown-divider mt-3 mb-0">
                                                                    </li>

                                                                    <?php

                                                                    if (isset($_GET["limit"])) {

                                                                    ?>
                                                                        <li class="mb-3"><a class="dropdown-item" href="?">Collapse</a></li>
                                                                    <?php

                                                                    } else {

                                                                    ?>
                                                                        <li class="mb-3"><a class="dropdown-item" href="?limit=LIMIT 100&m=">All</a></li>
                                                                    <?php

                                                                    }

                                                                    ?>
                                                                </ul>
                                                            </li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="#">Monitor</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="#">Forcast</a></li>
                                                            <li class="nav-item"><a class="nav-link text-white" href="#">Cost & Billing Management</a></li>
                                                        </ul>

                                                    </div>
                                                </div>
                                                <!-- Offcanvas -->
                                            </div>

                                        <?php

                                        } else {
                                            header("Location:index.php");
                                        }

                                        ?>
                                    </nav>
                                    <!-- Navbar -->
                                    <!-- Header -->

                                <?php

                                } else if (isset($_SESSION["user"])) {

                                    $user = $_SESSION["user"];
                                    $email = $user["email"];
                                    $fname = $user["fname"];
                                    $lname = $user["lname"];

                                    Database::iud("UPDATE `user` SET `online`='2'");

                                    $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                                    $profile_count = $profile_rs->num_rows;;

                                    $path;
                                    if ($profile_count > 0) {

                                        $profile_data = $profile_rs->fetch_assoc();

                                        $path = $profile_data["path"];
                                    } else {

                                        $path = "resources/avatar.svg";
                                    }

                                ?>

                                    <!-- Navbar -->
                                    <nav class="navbar pb-1 pb-lg-2" style="background-color: hsl(202,23%,16%);">
                                        <div class="container-fluid">
                                            <div class="col-6">
                                                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button>
                                            </div>
                                            <div class="col-6 d-block text-end mt-2 pe-3 opacity-75">
                                                <span class="fw-bold link-light text-uppercase cursor-pointer me-3" onclick="signOut();">Sign Out</span>
                                            </div>
                                            <div class="col-lg-11 col-12 d-lg-block my-1">
                                                <div class="row g-0 ">

                                                    <div class="col-12">
                                                        <div class="row g-0  justify-content-center">

                                                            <!-- Title -->
                                                            <div class="col-8 mt-2 col-lg-10">
                                                                <div class="row g-0 ">
                                                                    <div class="col-12 text-start ps-3 pt-2">
                                                                        <span class="fs-4 text-white-50 text-uppercase fw-bold" style="letter-spacing: 0.5rem;">Horizon CSR</span>
                                                                        <!-- <span class="fs-4 text-white-50 text-uppercase fw-bold" style="letter-spacing: 0.5rem;">Messages Horizon CSR</span> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Title -->

                                                            <!-- Profile -->
                                                            <div class="col-4 col-lg-2">
                                                                <div class="dropdown d-grid">
                                                                    <button class="btn dropdown-toggle border-0" type="button" data-bs-toggle="dropdown">
                                                                        <img src="<?php echo ($path); ?>" class="rounded-circle" height="40px">
                                                                    </button>
                                                                    <ul class="dropdown-menu bg-secondary shadow w-100 dropdown-menu-end">
                                                                        <?php

                                                                        if (isset($_SESSION["user"])) {

                                                                        ?>
                                                                            <li><a class="dropdown-item text-white" href="#" onclick="viewProfile();">Profile</a></li>
                                                                            <li><a class="dropdown-item text-white" href="myProducts.php">My Products</a></li>
                                                                            <li><a class="dropdown-item text-white" href="watchList.php">Watch List</a></li>
                                                                            <li><a class="dropdown-item text-white" href="purchaseHistory.php">Purchase History</a></li>
                                                                            <li><a class="dropdown-item text-white" href="messages.php?m">Messages</a></li>
                                                                            <li><a class="dropdown-item text-white" href="Recents & Saved">Saved</a></li>
                                                                        <?php

                                                                        } else {

                                                                        ?>
                                                                            <li class="text-center"><span class="fw-bold cursor-pointer text-warning" onclick="window.location = 'index.php';">Sign in or Register</span></li>
                                                                        <?php

                                                                        }

                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- Profile -->

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Offcanvas -->
                                            <div class="offcanvas text-uppercase offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                                                <div class="offcanvas-header bg-dark">
                                                    <h5 class="offcanvas-title text-info" id="offcanvasNavbarLabel"><?php echo ($fname . " " . $lname); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>

                                                <div class="offcanvas-body bg-dark">

                                                    <ul class="navbar-nav justify-content-end flex-grow g-0 -1 pe-3">
                                                        <li class="nav-item"><a class="nav-link  text-white" href="home.php">Home</a></li>
                                                        <li class="nav-item"><a class="nav-link text-white" href="userProfile.php">Profile</a></li>
                                                        <li class="nav-item active"><a class="nav-link active text-white" href="messages.php?m">Messages</a></li>
                                                        <!-- <li class="nav-item"><a class="nav-link text-white" href="cart.php">Cart</a></li> -->
                                                        <li class="nav-item"><a class="nav-link text-white" href="watchList.php">Watch List</a></li>
                                                        <li class="nav-item"><a class="nav-link text-white" href="recents.php">Recents</a></li>
                                                        <!-- <li class="nav-item"><a class="nav-link text-white" href="purchaseHistory.php">Purchase History</a></li> -->
                                                        <li class="nav-item dropdown mb-2">
                                                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                                                            <ul class="dropdown-menu-dark border-light border rounded-3 pt-2 rounded bg-dark">
                                                                <?php

                                                                $limit;
                                                                if (isset($_GET["limit"])) {
                                                                    $limit = $_GET["limit"];
                                                                } else {
                                                                    $limit = "LIMIT 4";
                                                                }

                                                                $query = "SELECT * FROM `category`" . $limit;

                                                                $category_rs = Database::search($query);
                                                                $category_count = $category_rs->num_rows;;

                                                                for ($x = 0; $x < $category_count; $x++) {

                                                                    $category_data = $category_rs->fetch_assoc();

                                                                ?>
                                                                    <li class="mt-1"><a class="dropdown-item text-white" href="#" onclick="viewCategory(<?php echo ($category_data['category_id']); ?>);"><?php echo ($category_data["category"]); ?></a></li>
                                                                <?php

                                                                }

                                                                ?>
                                                                <li class="mt-1 mb-0">
                                                                    <hr class="dropdown-divider mt-3 mb-0">
                                                                </li>

                                                                <?php

                                                                if (isset($_GET["limit"])) {

                                                                ?>
                                                                    <li class="mb-3"><a class="dropdown-item text-white" href="?">Collapse</a></li>
                                                                <?php

                                                                } else {

                                                                ?>
                                                                    <li class="mb-3"><a class="dropdown-item text-white" href="?limit=LIMIT 100">All</a></li>
                                                                <?php

                                                                }

                                                                ?>
                                                            </ul>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                            <!-- Offcanvas -->
                                        </div>
                                    </nav>
                                    <!-- Navbar -->
                                <?php

                                } else {
                                    header("Location:index.php");
                                }

                                ?>
                            </div>
                        </div>
                        <!-- Head -->

                    </div>

                    <div class="row g-0 nav nav-tabs" id="myTab" role="tablist" style="background-color: hsl(202,23%,16%); padding-bottom: 0.13rem;">

                        <div class="nav-item d-grid col-6" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Chats</button>
                        </div>
                        <div class="nav-item d-grid col-6" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Support</button>
                        </div>

                    </div>

                    <div class="tab-content text-white row g-0 overflow-hidden" id="myTabContent">

                        <!-- Chat Box -->
                        <div class="tab-pane fade show active col-12 text-white rounded-2 rounded p-1" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <!-- <div class="tab-pane fade show active col-12 text-white border-end border-opacity-25 border-light rounded-2 rounded p-1" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"> -->
                            <div class="row g-0 ">

                                <!-- Search -->
                                <div class="col-12 mt-3 pt-1 border-bottom rounded-3 border-opacity-25 border-light">
                                    <div class="row g-0  justify-content-center">
                                        <div class="col-10">
                                            <div class="input-group mb-3 rounded rounded-3" style="background-color: hsl(203,22%,21%);">
                                                <button class="btn rounded-end rounded-3" type="button" id="btn" onclick="searchChat('<?php echo ($umail); ?>');"><i class="bi bi-search text-success"></i></button>
                                                <input type="text" onclick="searchChat('<?php echo ($umail); ?>');" id="txt" class="form-control bg-transparent rounded-start text-white border-0 rounded-3" placeholder="Search users by Email" />
                                            </div>
                                        </div>
                                        <!-- <div class="col-1"></div> -->
                                    </div>
                                </div>
                                <!-- Search -->

                                <!-- Chat Div -->
                                <div class="col-12">
                                    <div class="row g-0" id="chatDiv">

                                    </div>
                                </div>
                                <!-- Chat Div -->

                            </div>
                        </div>
                        <!-- Chat Box -->

                        <!-- Support -->
                        <div class="tab-pane fade col-12 text-white rounded rounded-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="row g-0 ">

                                <!-- Support Div -->
                                <div class="col-12">
                                    <div class="row g-0" id="supportDiv">

                                        <!-- Empty Support -->
                                        <div class="col-12 pb-0 float-start overflow-hidden" style="max-height: 70vh; height: max-content; min-height: 60vh;">
                                            <div class="row justify-content-center">

                                                <div class="col-4 mt-4">
                                                    <img src="resources/logo/HS logo PSD circle png.png" class="img-fluid w-100" />
                                                </div>
                                                <div class="col-9 mt-2 mb-3 text-center text-white">
                                                    <span class="fs-5 mt-2 mb-3">This part is still in development.</span><br />
                                                    <!-- <button class="btn shadow btn-outline-success mt-4" id="btn2" onclick="searchChat();">Click here to start new Conversation</button> -->
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Empty Support -->

                                    </div>
                                </div>
                                <!-- Support Div -->

                            </div>
                        </div>
                        <!-- Support -->

                    </div>

                </div>

                <div class="col-12 col-lg-7 d-flex flex-column tab-pane fade show active" id="recent-tab-pane" role="tabpanel" aria-labelledby="recent-tab" tabindex="1" style="background-color: hsl(203,22%,13%);">
                    <div class="row g-0 ">

                        <div class="col-12">
                            <div class="row g-0 ">

                                <!-- Chat -->
                                <div class="col-12 d-none d-flex vh-100" id="chatBox">
                                </div>
                                <!-- Chat -->

                                <!-- Support -->
                                <div class="col-12 d-none d-flex vh-100" id="supportBox">
                                </div>
                                <!-- Support -->

                                <!-- Empty -->
                                <div class="col-12 vh-100 overflow-hidden border-start border-light border-opacity-25 opacity-75" id="emptyBox" style="background-color: hsl(203,22%,18%);">
                                    <div class="row justify-content-center">

                                        <div class="col-10 pt-5" style="height: 90vh;">
                                            <div class="row">

                                                <!-- <div class="col-12 shadow">
                                                    <div class="row"> -->
                                                <div class="col-12 rounded-5 mt-5 mb-4 pt-4">
                                                    <div class="row">
                                                        <div class="col-12 cover" style="height: 300px; width: 100%;"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-0 mb-5 text-center text-white">
                                                    <span class="fs-4">Send and Receive Messages Conveniently via Horizon CSR Message Platform</span>
                                                </div>
                                                <!-- </div>
                                                </div> -->

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Empty -->

                            </div>
                        </div>


                    </div>
                </div>
                <!-- Content -->

            </div>
        </div>

        <?php include "scripts.php"; ?>
    </body>

    </html>

<?php

} else {
    header("Location:messages.php?m");
}

?>
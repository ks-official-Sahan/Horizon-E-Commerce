<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

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

    ?>

    <!-- Navbar -->
    <nav class="navbar" style="background-color: transparent;">
        <div class="container-fluid">
            <div class="col-6 col-lg-1">
                <button class="navbar-toggler btn-dark" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="col-lg-1 d-none d-lg-block">
                <div class="logo" style="height: 50px;"></div>
            </div>

            <div class="col-lg-10 col-12 d-none d-lg-block my-1 ps-4">
                <div class="row">
                    <?php include "search.php"; ?>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="offcanvas text-uppercase offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header bg-dark">
                    <h5 class="offcanvas-title text-info" id="offcanvasNavbarLabel">
                        <?php echo ($fname . " " . $lname); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body bg-dark">

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <div class="col-12 d-lg-none my-1">
                                <div class="row">
                                    <?php include "search.php"; ?>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link  text-white" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="userProfile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="messages.php?m">Messages</a></li>
                        <!-- <li class="nav-item"><a class="nav-link text-white" href="cart.php">Cart</a></li> -->
                        <li class="nav-item"><a class="nav-link text-white" href="watchList.php">Watch List</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="recents.php">Recents</a></li>
                        <!-- <li class="nav-item"><a class="nav-link text-white" href="purchaseHistory.php">Purchase History</a></li> -->
                        <li class="nav-item dropdown mb-2">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
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
                                $category_count = $category_rs->num_rows;

                                for ($x = 0; $x < $category_count; $x++) {

                                    $category_data = $category_rs->fetch_assoc();

                                    ?>
                                    <li class="mt-1"><a class="dropdown-item text-white" href="#"
                                            onclick="viewCategory(<?php echo ($category_data['category_id']); ?>);"><?php echo ($category_data["category"]); ?></a>
                                    </li>
                                    <?php

                                }

                                ?>

                                <li class="dropdown-divider mt-3 mb-3">
                                    <!-- <hr class="mt-3 mb-3"> -->
                                </li>

                                <?php

                                if (isset($_GET["limit"])) {

                                    ?>
                                    <li class="mb-3"><a class="dropdown-item text-white" href="?">Collapse</a></li>
                                    <?php

                                } else {

                                    ?>
                                    <li class="mb-3"><a class="dropdown-item text-white" href="?limit=LIMIT 100">All</a>
                                    </li>
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

    <!-- <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script> -->

</body>

</html>
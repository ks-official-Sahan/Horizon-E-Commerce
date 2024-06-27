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

    <!-- Navbar -->
    <nav class="navbar" style="background-color: transparent;">

        <?php

        // require "connection.php";
        
        $email;
        $path;
        if (isset($_SESSION["admin"])) {

            $admin = $_SESSION["admin"];
            $email = $admin["email"];

            $path = "resources/avatar.svg";

            ?>

            <div class="container-fluid">
                <div class="col-6 col-lg-4">
                    <button class="navbar-toggler btn-dark" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="row">
                        <div class="col-12 logo" style="height: 60px;"></div>
                    </div>
                </div>

                <!-- Profile -->
                <div class="col-6 col-lg-4">
                    <div class="row justify-content-lg-end justify-content-center">
                        <div class="col-8">
                            <div class="dropdown-center d-grid">
                                <button class="btn dropdown-toggle justify-content-end" type="button"
                                    data-bs-toggle="dropdown">
                                    <img src="<?php echo ($path); ?>" height="40px">
                                </button>
                                <ul class="bg-white dropdown-menu w-100 dropdown-menu-lg-end dropdown-menu-start">
                                    <li><a class="dropdown-item" href="#"
                                            onclick="viewProfile(<?php echo ($email); ?>);">Profile</a></li>
                                    <li><a class="dropdown-item" href="myProducts.php">Products</a></li>
                                    <li>
                                        <span class="fw-bold cursor-pointer dropdown-item" onclick="signOut();">Sign
                                            Out</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile -->

                <!-- Offcanvas -->
                <div class="offcanvas text-uppercase offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">

                    <div class="offcanvas-header bg-white">
                        <h5 class="offcanvas-title text-info" id="offcanvasNavbarLabel">
                            <?php echo ($admin["fname"] . " " . $admin["lname"]); ?>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body bg-white">

                        <div class="d-flex mb-3" role="search">
                            <input class="text-white form-control me-2" id="panelSearch_input" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success text-dark" onclick="panelSearch();">Search</button>
                        </div>

                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item"><a class="nav-link" href="adminPanel.php">Dashboard</a></li>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Manage</a>
                                <ul class="dropdown-menu bg-white">
                                    <li><a class="dropdown-item" href="manageUsers.php">Users</a></li>
                                    <li><a class="dropdown-item" href="manageproducts.php">Products</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="messages.php">Messages</a></li>
                            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                            <li class="nav-item"><a class="nav-link" href="recents.php">Recents</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Purchase History</a></li>
                            <li class="nav-item"><a class="nav-link" href="watchList.php">Watch List</a></li>
                            <li class="nav-item dropdown mb-2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">Categories</a>
                                <ul class="dropdown-menu bg-white">
                                    <li><a class="dropdown-item" href="#">Analogue Electronics</a></li>
                                    <li><a class="dropdown-item" href="#">Computer Electronics</a></li>
                                    <li><a class="dropdown-item" href="#">Digital Electronics</a></li>
                                    <li><a class="dropdown-item" href="#">Phone & Accessories</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Monitor</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Forcast</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Cost & Billing Management</a></li>
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

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
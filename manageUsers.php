<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    $admin = $_SESSION["admin"];

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Manage Users | Horizon CSR</title>

        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

        <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />


    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <!-- Header -->
                <!-- Navbar -->
                <?php include "adminNavbar.php"; ?>
                <!-- Navbar -->
                <!-- Header -->

                <div class="col-12">
                    <hr />
                </div>

                <!-- Content -->
                <div class="col-12 text-center mb-3">
                    <span class="fs-2 fw-bolder h2 text-success my-3">Manage</span>
                </div>

                <div class="col-12 px-4 mb-2">
                    <div class="row">

                        <div class="col-12 border-primary border rounded px-lg-4 py-2">
                            <div class="row">

                                <div class="col-12 pt-3">
                                    <ul class="nav nav-tabs justify-content-center justify-content-lg-start">
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none link-dark fs-5"
                                                href="manageProducts.php">Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active fs-5" aria-current="page" href="#">Users</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Analysis -->
                                <div class="col-12">
                                    <div class="row">

                                        <!-- Time Ranges -->
                                        <?php // include "timeRanges.php"; ?>
                                        <!-- Time Ranges -->

                                        <!-- Records -->
                                        <!-- <div class="col-12 mb-3 pt-2 px-4">
                                            <div class="row justify-content-center">

                                                <div class="col-sm-6 col-lg-4">
                                                    <div class="card text-bg-primary mb-3">
                                                        <div class="card-body">
                                                            <div class="card-title text-dark">
                                                                <div>
                                                                    <span class="fw-bold fs-4">3,500</span>
                                                                    <span class="fs-5">(+17.2%)</span><br />
                                                                    <span class="fs-3">Users</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-4">
                                                    <div class="card text-bg-success mb-3">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <div>
                                                                    <span class="fw-bold fs-4">10,000</span>
                                                                    <span class="fs-5">(+7.2%)</span><br />
                                                                    <span class="fs-3">Sessions</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-4">
                                                    <div class="card text-bg-secondary mb-3">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <div>
                                                                    <span class="fw-bold fs-4">6,000</span>
                                                                    <span class="fs-5">(+9.2%)</span><br />
                                                                    <span class="fs-3">Active</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> -->
                                        <!-- Records -->

                                    </div>
                                </div>
                                <!-- Analysis -->

                                <div class="col-12 mb-3">
                                    <hr class="border border-primary" />
                                </div>

                                <!-- User Records -->
                                <div class="col-12">
                                    <div class="row justify-content-center">

                                        <!-- New Users -->
                                        <div class="col-12 text-center d-grid px-lg-5 mb-3" id="newUsers">

                                            <span class="fw-bold fs-4 mb-2">New Users</span>

                                            <!-- <div class="row mb-3">
                                                <div class="col-12 col-lg-6">
                                                    <span class="fw-bold">Number of Total New Users : 18,500</span>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <span class="fw-bold">Number of Active New Users : 18,489</span>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <span class="fw-bold">Number of Total New Sellers : 5,300</span>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <span class="fw-bold">Number of Active New Sellers : 5,280</span>
                                                </div>
                                            </div> -->

                                            <div class="table-responsive">
                                                <table
                                                    class="table table-hover table-striped-columns table-primary border border-success rounded">
                                                    <thead>
                                                        <tr class="border border-1 border-primary">
                                                            <th>#</th>
                                                            <th>Email</th>
                                                            <th>First Name</th>
                                                            <th>Time</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $user_rs = Database::search("SELECT * FROM `user` ORDER BY `joined_date` DESC LIMIT 5");
                                                        if ($user_rs->num_rows > 0) {
                                                            for ($count = 0; $count < $user_rs->num_rows; $count++) {
                                                                $user_data = $user_rs->fetch_assoc();
                                                                ?>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td><?php echo ($count); ?></td>
                                                                    <td><?php echo ($user_data["email"]); ?></td>
                                                                    <td><?php echo ($user_data["fname"]); ?></td>
                                                                    <td><?php echo ($user_data["joined_date"]); ?></td>
                                                                    <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <tr class="border-bottom border-secondary">
                                                                <td colspan="5">0 Users Found</td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6" class="text-center text-primary">
                                                                <!-- Pagination -->
                                                                <div class="offset-2 offset-lg-4 col-8 col-lg-4 my-2">
                                                                    <nav aria-label="Page navigation example">
                                                                        <ul class="pagination justify-content-center">
                                                                            <li class="page-item">
                                                                                <a class="page-link" href="#"
                                                                                    aria-label="Previous">
                                                                                    <span aria-hidden="true">&laquo;</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="page-item"><a class="page-link"
                                                                                    href="#">1</a></li>
                                                                            <li class="page-item">
                                                                                <a class="page-link" href="#"
                                                                                    aria-label="Next">
                                                                                    <span aria-hidden="true">&raquo;</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </nav>
                                                                </div>
                                                                <!-- Pagination -->
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- New Users -->

                                        <!-- Users -->
                                        <div class="col-12 mb-3 d-none" id="allUsers">
                                            <div class="row">

                                                <div class="col-12 text-center px-lg-5 ps-md-4 mb-3">

                                                    <?php
                                                    $user_rs = Database::search("SELECT * FROM `user` ORDER BY `joined_date` DESC");
                                                    if ($user_rs->num_rows > 0) {
                                                        ?>
                                                        <span class="fw-bold fs-4 mb-3">All Users</span>

                                                        <div class="row mb-3">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="fw-bold">Number of Total Users :
                                                                    <?php echo ($user_rs->num_rows) ?></span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="fw-bold">Number of Active Users :
                                                                    <?php echo ($user_rs->num_rows) ?></span>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                    <!-- Table -->
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table align-middle table-dark table-hover table-responsive-sm table-striped border-bottom border-success rounded">
                                                            <thead>
                                                                <tr class="border-bottom border-1 border-primary">
                                                                    <th>#</th>
                                                                    <th>Email</th>
                                                                    <th>First Name</th>
                                                                    <th>Joined Date</th>
                                                                    <th>Status</th>
                                                                    <th>Manage</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $user_rs = Database::search("SELECT * FROM `user` ORDER BY `joined_date` DESC");
                                                                if ($user_rs->num_rows > 0) {
                                                                    for ($count = 0; $count < $user_rs->num_rows; $count++) {
                                                                        $user_data = $user_rs->fetch_assoc();
                                                                        ?>
                                                                        <tr class="border-bottom border-secondary">
                                                                            <td><?php echo ($count); ?></td>
                                                                            <td><?php echo ($user_data["email"]); ?></td>
                                                                            <td><?php echo ($user_data["fname"]); ?></td>
                                                                            <td><?php echo ($user_data["joined_date"]); ?></td>
                                                                            <td>
                                                                                <div class="form-check form-switch">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        role="switch" id="status" checked />
                                                                                    <label class="form-check-label"
                                                                                        for="switch">Deactive</label>
                                                                                </div>
                                                                            </td>
                                                                            <td><button class="btn btn-primary mx-3">Manage</button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <tr class="border-bottom border-secondary">
                                                                        <td colspan="6">0 Users Found</td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="6" class="text-center text-primary">
                                                                        <!-- Pagination -->
                                                                        <div
                                                                            class="offset-2 offset-lg-4 col-8 col-lg-4 my-2">
                                                                            <nav aria-label="Page navigation example">
                                                                                <ul
                                                                                    class="pagination justify-content-center">
                                                                                    <li class="page-item">
                                                                                        <a class="page-link" href="#"
                                                                                            aria-label="Previous">
                                                                                            <span
                                                                                                aria-hidden="true">&laquo;</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="page-item"><a
                                                                                            class="page-link" href="#">1</a>
                                                                                    </li>
                                                                                    <li class="page-item"><a
                                                                                            class="page-link" href="2">2</a>
                                                                                    </li>
                                                                                    <li class="page-item">
                                                                                        <a class="page-link" href="#"
                                                                                            aria-label="Next">
                                                                                            <span
                                                                                                aria-hidden="true">&raquo;</span>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </nav>
                                                                        </div>
                                                                        <!-- Pagination -->
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <!-- Table -->

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Users -->

                                        <div class="col-12 col-lg-8 d-grid mb-3">
                                            <button class="btn btn-outline-primary fw-bold fs-5" id="listButton"
                                                onclick="listAllUsers();">List All Users</button>
                                        </div>

                                    </div>
                                </div>
                                <!-- User Records -->

                            </div>
                        </div>

                    </div>
                </div>
                <!-- Content -->

                <div class="col-12">
                    <hr />
                </div>

                <!-- Footer -->
                <?php include "adminFooter.php"; ?>
                <!-- Footer -->

            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

    <?php

} else if (isset($_SESSION["user"])) {

    header("Location:home.php");
} else {

    header("Location:index.php");
}

?>
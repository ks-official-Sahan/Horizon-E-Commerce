<?php

session_start();

if (isset($_SESSION["admin"])) {

    $admin = $_SESSION["admin"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Panel | Horizon CSR</title>

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

                <!-- <div class="col-12">
                    <hr />
                </div> -->

                <!-- Content -->
                <div class="col-12 text-center mb-3">
                    <span class="fs-2 fw-bolder h2 text-success my-3">Dashboard</span>
                </div>

                <div class="col-12 px-4 mb-2">
                    <div class="row">
                        <div class="col-12 border border-primary rounded px-lg-3 py-2">
                            <div class="row">

                                <div class="col-12 pt-3">
                                    <ul class="nav nav-tabs justify-content-center justify-content-lg-start">
                                        <li class="nav-item">
                                            <a class="nav-link active fs-5" aria-current="page" href="#">Summary</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Analysis -->
                                <div class="col-12">
                                    <div class="row">

                                        <!-- Time Ranges -->
                                        <?php include "timeRanges.php"; ?>
                                        <!-- Time Ranges -->

                                        <!-- Records -->
                                        <div class="col-12 mb-3 pt-2 px-4">
                                            <div class="row">

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
                                                    <div class="card text-bg-warning mb-3">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <div>
                                                                    <span class="fw-bold fs-4">1,000</span>
                                                                    <span class="fs-5">(+12.2%)</span><br />
                                                                    <span class="fs-3">Products</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-4">
                                                    <div class="card text-bg-info mb-3">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <div>
                                                                    <span class="fw-bold fs-4">200,000 USD</span>
                                                                    <span class="fs-5">(+10.2%)</span><br />
                                                                    <span class="fs-3">Income</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-lg-4">
                                                    <div class="card text-bg-danger mb-3">
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <div>
                                                                    <span class="fw-bold fs-4">20,000</span>
                                                                    <span class="fs-5">(+23.2%)</span><br />
                                                                    <span class="fs-3">Sales</span>
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
                                        </div>
                                        <!-- Records -->

                                    </div>
                                </div>
                                <!-- Analysis -->

                                <div class="col-12 px-4">
                                    <hr class="border border-1 border-primary" />
                                </div>

                                <!-- Table Records -->
                                <div class="col-12 mb-3 px-4 py-2">
                                    <div class="row">

                                        <!-- Users -->
                                        <div class="col-12 text-center d-grid px-lg-5">

                                            <span class="fw-bold fs-4 mb-2">New Users</span>

                                            <!-- Table -->
                                            <div class="table-responsive">
                                                <table class="table align-middle table-hover  table-striped-columns table-danger border-bottom border-success rounded">
                                                    <thead>
                                                        <tr class="border-bottom border-1 border-primary">
                                                            <th>#</th>
                                                            <th>Email</th>
                                                            <th>Fisrt Name</th>
                                                            <th>Time</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18500</td>
                                                            <td>horizon.csr.official6@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:10</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18499</td>
                                                            <td>horizon.csr.official5@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:09</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18498</td>
                                                            <td>horizon.csr.official4@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:08</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18497</td>
                                                            <td>horizon.csr.official3@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:07</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18496</td>
                                                            <td>horizon.csr.official2@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:06</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18495</td>
                                                            <td>horizon.csr.official1@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:05</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="5" class="text-center text-primary">
                                                                <a href="manageUsers.php" class="text-decoration-none fs-5 fw-bold">See All</a>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- Table -->

                                        </div>
                                        <!-- Users -->

                                        <div class="col-12 px-4 mb-3">
                                            <hr class="border border-1 border-primary" />
                                        </div>

                                        <!-- Products -->
                                        <div class="col-12">
                                            <div class="row justify-content-center">

                                                <div class="col-12 text-center mb-3">
                                                    <span class="fw-bold fs-4 pt-4">New Products</span>
                                                </div>

                                                <!-- Card -->
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card">
                                                        <div class="row justify-content-center">
                                                            <img src="resources/item_img/iphone14.jpg" class="card-img-top px-2 py-2" style="height: 200px; width: 200px;" />
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <span class="card-title fw-bold fs-4">Apple iPhone 14</span><br />
                                                            <span class="card-text text-success fw-bold fs-6">699 USD</span><br />
                                                            <span class="card-text text-warning fw-bold fs-6">10 Items Available</span><br />
                                                            <div class="d-grid">
                                                                <button class="btn btn-danger" onclick="manageProduct(0);">Manage</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->
                                                <!-- Card -->
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card">
                                                        <div class="row justify-content-center">
                                                            <img src="resources/item_img/iphone14.jpg" class="card-img-top px-2 py-2" style="height: 200px; width: 200px;" />
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <span class="card-title fw-bold fs-4">Apple iPhone 14</span><br />
                                                            <span class="card-text text-success fw-bold fs-6">699 USD</span><br />
                                                            <span class="card-text text-warning fw-bold fs-6">10 Items Available</span><br />
                                                            <div class="d-grid">
                                                                <button class="btn btn-danger" onclick="manageProduct(0);">Manage</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->
                                                <!-- Card -->
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card">
                                                        <div class="row justify-content-center">
                                                            <img src="resources/item_img/iphone14.jpg" class="card-img-top px-2 py-2" style="height: 200px; width: 200px;" />
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <span class="card-title fw-bold fs-4">Apple iPhone 14</span><br />
                                                            <span class="card-text text-success fw-bold fs-6">699 USD</span><br />
                                                            <span class="card-text text-warning fw-bold fs-6">10 Items Available</span><br />
                                                            <div class="d-grid px-4">
                                                                <button class="btn btn-danger" onclick="manageProduct(0);">Manage</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->
                                                <!-- Card -->
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card">
                                                        <div class="row justify-content-center">
                                                            <img src="resources/item_img/iphone14.jpg" class="card-img-top px-2 py-2" style="height: 200px; width: 200px;" />
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <span class="card-title fw-bold fs-4">Apple iPhone 14</span><br />
                                                            <span class="card-text text-success fw-bold fs-6">699 USD</span><br />
                                                            <span class="card-text text-warning fw-bold fs-6">10 Items Available</span><br />
                                                            <div class="d-grid">
                                                                <button class="btn btn-danger" onclick="manageProduct(0);">Manage</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->

                                                <div class="col-12 col-lg-8 d-grid text-center pt-4 mb-3">
                                                    <a href="manageProducts.php" class="btn btn-outline-primary fw-bold text-decoration-none fs-5">See All</a>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Products -->

                                    </div>
                                </div>
                                <!-- Table Records -->

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
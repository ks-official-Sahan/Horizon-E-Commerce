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
                                            <a class="nav-link text-decoration-none link-dark fs-5" href="manageProducts.php">Products</a>
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
                                        <?php include "timeRanges.php"; ?>
                                        <!-- Time Ranges -->

                                        <!-- Records -->
                                        <div class="col-12 mb-3 pt-2 px-4">
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
                                        </div>
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

                                            <div class="row mb-3">
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
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped-columns table-primary border border-success rounded">
                                                    <thead>
                                                        <tr class="border border-1 border-primary">
                                                            <th>#</th>
                                                            <th>Email</th>
                                                            <th>First Name</th>
                                                            <th>Time</th>
                                                            <th>Type</th>
                                                            <th>Manage</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18500</td>
                                                            <td>horizon.csr.official6@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:10</td>
                                                            <td>Seller</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18499</td>
                                                            <td>horizon.csr.official5@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:09</td>
                                                            <td>Seller</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18498</td>
                                                            <td>horizon.csr.official4@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:08</td>
                                                            <td>Seller</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18497</td>
                                                            <td>horizon.csr.official3@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:07</td>
                                                            <td>Seller</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18496</td>
                                                            <td>horizon.csr.official2@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:06</td>
                                                            <td>Seller</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                        <tr class="border-bottom border-secondary">
                                                            <td>18495</td>
                                                            <td>horizon.csr.official1@gmail.com</td>
                                                            <td>Horizon</td>
                                                            <td>28-10-2022 00:30:05</td>
                                                            <td>Seller</td>
                                                            <td><button class="btn btn-primary mx-3">Manage</button></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="6" class="text-center text-primary">
                                                                <!-- Pagination -->
                                                                <div class="offset-2 offset-lg-4 col-8 col-lg-4 my-2">
                                                                    <nav aria-label="Page navigation example">
                                                                        <ul class="pagination justify-content-center">
                                                                            <li class="page-item">
                                                                                <a class="page-link" href="#" aria-label="Previous">
                                                                                    <span aria-hidden="true">&laquo;</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                            <li class="page-item">
                                                                                <a class="page-link" href="#" aria-label="Next">
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

                                                    <span class="fw-bold fs-4 mb-3">All Users</span>

                                                    <div class="row mb-3">
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Total Users : 300,000</span>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Active Users : 298,520</span>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Total Sellers : 120,000</span>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Active Sellers : 119,980</span>
                                                        </div>
                                                    </div>

                                                    <!-- Table -->
                                                    <div class="table-responsive">
                                                        <table class="table align-middle table-dark table-hover table-responsive-sm table-striped border-bottom border-success rounded">
                                                            <thead>
                                                                <tr class="border-bottom border-1 border-primary">
                                                                    <th>#</th>
                                                                    <th>Email</th>
                                                                    <th>First Name</th>
                                                                    <th>Type</th>
                                                                    <th>Status</th>
                                                                    <th>Manage</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218500</td>
                                                                    <td>horizon.csr.official6@gmail.com</td>
                                                                    <td>Horizon</td>
                                                                    <td>Seller</td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218499</td>
                                                                    <td>horizon.csr.official5@gmail.com</td>
                                                                    <td>Horizon</td>
                                                                    <td>Seller</td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218498</td>
                                                                    <td>horizon.csr.official4@gmail.com</td>
                                                                    <td>Horizon</td>
                                                                    <td>Seller</td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218497</td>
                                                                    <td>horizon.csr.official3@gmail.com</td>
                                                                    <td>Horizon</td>
                                                                    <td>Seller</td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218496</td>
                                                                    <td>horizon.csr.official2@gmail.com</td>
                                                                    <td>Horizon</td>
                                                                    <td>Seller</td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218495</td>
                                                                    <td>horizon.csr.official1@gmail.com</td>
                                                                    <td>Horizon</td>
                                                                    <td>Seller</td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="6" class="text-center text-primary">
                                                                        <!-- Pagination -->
                                                                        <div class="offset-2 offset-lg-4 col-8 col-lg-4 my-2">
                                                                            <nav aria-label="Page navigation example">
                                                                                <ul class="pagination justify-content-center">
                                                                                    <li class="page-item">
                                                                                        <a class="page-link" href="#" aria-label="Previous">
                                                                                            <span aria-hidden="true">&laquo;</span>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                                    <li class="page-item">
                                                                                        <a class="page-link" href="#" aria-label="Next">
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
                                                    <!-- Table -->

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Users -->

                                        <div class="col-12 col-lg-8 d-grid mb-3">
                                            <button class="btn btn-outline-primary fw-bold fs-5" id="listButton" onclick="listAllUsers();">List All Users</button>
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
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

        <title>Manage Products | Horizon CSR</title>

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
                                            <a class="nav-link active fs-5" aria-current="page" href="#">Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-decoration-none link-dark fs-5" href="manageUsers.php">Users</a>
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

                                            </div>
                                        </div>
                                        <!-- Records -->

                                    </div>
                                </div>
                                <!-- Analysis -->

                                <div class="col-12 px-3 mb-3">
                                    <hr class="border border-primary" />
                                </div>

                                <!-- Product Records -->
                                <div class="col-12">
                                    <div class="row justify-content-center">

                                        <!-- New Products -->
                                        <div class="col-12" id="newProducts">
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

                                            </div>
                                        </div>
                                        <!-- New Products -->

                                        <!-- Products -->
                                        <div class="col-12 d-none" id="allProducts">
                                            <div class="row">

                                                <div class="col-12 text-center px-lg-5 ps-md-4">

                                                    <span class="fw-bold fs-4 mb-3">All Products</span>

                                                    <div class="row mb-3">
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Total Products : 900,000</span>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Active Products : 898,520</span>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Total Items : 3,000,000</span>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <span class="fw-bold">Number of Active Items : 2,919,980</span>
                                                        </div>
                                                    </div>

                                                    <!-- Table -->
                                                    <div class="table-responsive">
                                                        <table class="table align-middle table-dark table-hover table-responsive-sm table-striped border-bottom border-success rounded">
                                                            <thead>
                                                                <tr class="border-bottom border-1 border-primary">
                                                                    <th>#</th>
                                                                    <th>Category</th>
                                                                    <th>Title</th>
                                                                    <th>Seller</th>
                                                                    <th>Time</th>
                                                                    <th>Manage</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218500</td>
                                                                    <td>Phone & Accessories</td>
                                                                    <td>Apple iPhone 14</td>
                                                                    <td>horizon.csr.official1@gmail.com</td>
                                                                    <td>29-10-2022 00:00:31</td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218499</td>
                                                                    <td>Phone & Accessories</td>
                                                                    <td>Apple iPhone 14</td>
                                                                    <td>horizon.csr.official1@gmail.com</td>
                                                                    <td>29-10-2022 00:00:31</td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218497</td>
                                                                    <td>Phone & Accessories</td>
                                                                    <td>Apple iPhone 14</td>
                                                                    <td>horizon.csr.official1@gmail.com</td>
                                                                    <td>29-10-2022 00:00:31</td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="border-bottom border-secondary">
                                                                    <td>218496</td>
                                                                    <td>Phone & Accessories</td>
                                                                    <td>Apple iPhone 14</td>
                                                                    <td>horizon.csr.official1@gmail.com</td>
                                                                    <td>29-10-2022 00:00:31</td>
                                                                    <td><button class="btn btn-danger mx-3">Manage</button></td>
                                                                    <td>
                                                                        <div class="form-check form-switch">
                                                                            <input class="form-check-input" type="checkbox" role="switch" id="status" checked />
                                                                            <label class="form-check-label" for="switch">Deactive</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="7" class="text-center text-primary">
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
                                        <!-- Products -->

                                        <div class="col-12 col-lg-8 text-center pt-4 mb-3 d-grid">
                                            <button class="btn btn-outline-primary fw-bold fs-5" onclick="listAllProducts();">List All</button>
                                        </div>

                                    </div>
                                </div>
                                <!-- Product Records -->

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
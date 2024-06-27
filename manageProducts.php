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
                                            <a class="nav-link text-decoration-none link-dark fs-5"
                                                href="manageUsers.php">Users</a>
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
                                        </div> -->
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

                                                <?php
                                                $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `year` ON `year`.`year_id`=`product`.`year_id` INNER JOIN `category` ON `product`.`category_id`=`category`.`category_id` ORDER BY `datetime_added` DESC LIMIT 5");
                                                if ($product_rs->num_rows > 0) {
                                                    for ($count = 0; $count < $product_rs->num_rows; $count++) {
                                                        $product_data = $product_rs->fetch_assoc();

                                                        $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["product_id"] . "'");
                                                        $img_count = $img_rs->num_rows;

                                                        $code;
                                                        if ($img_count > 0) {
                                                            $img_data = $img_rs->fetch_assoc();
                                                            $code = $img_data["path"];
                                                        } else {
                                                            $code = "resources/item_img/images.jpg";
                                                        }

                                                        ?>
                                                        <!-- Card -->
                                                        <div class="col-12 col-sm-6 col-lg-3">
                                                            <div class="card">
                                                                <div class="row justify-content-center">
                                                                    <img src="<?php echo ($code); ?>" class="card-img-top px-2 py-2"
                                                                        style="height: 200px; width: 200px;" />
                                                                </div>
                                                                <div class="card-body text-center">
                                                                    <span
                                                                        class="card-title fw-bold fs-4"><?php echo ($product_data["title"]); ?></span><br />
                                                                    <span class="card-text text-success fw-bold fs-6">Year:
                                                                        <?php echo ($product_data["year"]); ?></span><br />
                                                                    <span
                                                                        class="card-text text-warning fw-bold fs-6">Category<?php echo ($product_data["category"]); ?></span><br />
                                                                    <div class="d-grid">
                                                                        <button class="btn btn-danger"
                                                                            onclick="manageProduct(<?php echo ($product_data['product_id']); ?>);">Manage</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Card -->

                                                        <?php
                                                    }
                                                } else {
                                                    ?>

                                                    <!-- Card -->
                                                    <div class="col-12 col-sm-6 col-lg-3">
                                                        <div class="card">
                                                            <div class="row justify-content-center">
                                                                <img src="resources/item_img/image2.jpg"
                                                                    class="card-img-top px-2 py-2"
                                                                    style="height: 200px; width: 200px;" />
                                                            </div>
                                                            <div class="card-body text-center">
                                                                <span class="card-text text-warning fw-bold fs-6">No products
                                                                    found</span><br />
                                                                <div class="d-grid">
                                                                    <button class="btn btn-danger" onclick="addProduct();">Add
                                                                        New Products</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Card -->
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <!-- New Products -->

                                        <!-- Products -->
                                        <div class="col-12 d-none" id="allProducts">
                                            <div class="row">

                                                <div class="col-12 text-center px-lg-5 ps-md-4">

                                                    <span class="fw-bold fs-4 mb-3">All Products</span>

                                                    <?php
                                                    $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `year` ON `year`.`year_id`=`product`.`year_id` INNER JOIN `category` ON `product`.`category_id`=`category`.`category_id` ORDER BY `datetime_added` DESC");
                                                    if ($product_rs->num_rows > 0) {
                                                        ?>
                                                        <div class="row mb-3">
                                                            <div class="col-12 col-lg-6">
                                                                <span class="fw-bold">Number of Total Products :
                                                                    <?php echo ($product_rs->num_rows); ?></span>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                <span class="fw-bold">Number of Active Products :
                                                                    <?php echo ($product_rs->num_rows); ?></span>
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
                                                                    <th>Category</th>
                                                                    <th>Title</th>
                                                                    <th>Seller</th>
                                                                    <th>Time</th>
                                                                    <th>Manage</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php
                                                                $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `year` ON `year`.`year_id`=`product`.`year_id` INNER JOIN `category` ON `product`.`category_id`=`category`.`category_id` ORDER BY `datetime_added` DESC LIMIT 5");
                                                                if ($product_rs->num_rows > 0) {
                                                                    for ($count = 0; $count < $product_rs->num_rows; $count++) {
                                                                        $product_data = $product_rs->fetch_assoc();

                                                                        ?>
                                                                        <tr class="border-bottom border-secondary">
                                                                            <td><?php echo ($product_data["product_id"]); ?></td>
                                                                            <td><?php echo ($product_data["category"]); ?></td>
                                                                            <td><?php echo ($product_data["title"]); ?></td>
                                                                            <td><?php echo ($product_data["admin_email"]); ?></td>
                                                                            <td><?php echo ($product_data["datetime_added"]); ?>
                                                                            </td>
                                                                            <td><button class="btn btn-danger mx-3">Manage</button>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-check form-switch">
                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        role="switch" id="status" checked />
                                                                                    <label class="form-check-label"
                                                                                        for="switch">Active</label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>


                                                                    <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="7" class="text-center text-primary">
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
                                        <!-- Products -->

                                        <div class="col-12 col-lg-8 text-center pt-4 mb-3 d-grid">
                                            <button class="btn btn-outline-primary fw-bold fs-5"
                                                onclick="listAllProducts();">List All</button>
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
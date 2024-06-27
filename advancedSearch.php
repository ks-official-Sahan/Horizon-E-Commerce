<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advance Search | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <!-- <link rel="stylesheet" href="bootstrap-icons.css" /> -->

    <link rel="icon" href="resources/logo/HS logo black png.png" type="image/svg" />
</head>

<body class="home">

    <div class="container-fluid vh-100 w-100">
        <div class="row">

            <!-- header -->
            <?php
            require "connection.php";

            session_start();

            if (isset($_SESSION["admin"])) {

                ?>

                <!-- Header -->
                <!-- Navbar -->
                <?php include "adminNavbar.php"; ?>
                <!-- Navbar -->
                <!-- Header -->

                <?php

            } else {

                ?>

                <!-- Header -->
                <?php include "header.php"; ?>
                <!-- Header -->

                <?php

            }

            ?>
            <!-- header -->

            <!-- Head -->
            <div class="col-12 bg-body bg-opacity-10 mt-1 mb-2">
                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4">
                        <div class="row g-3">
                            <div class="col-3">
                                <img src="resources/logo/HS logo black png.png " class="p-2 my-3"
                                    style="height: 100px;">
                            </div>
                            <div class="col-9 text-center">
                                <p class="fs-1 text-black-50 fw-bold mt-1 pt-2">Advanced Search</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Head -->

            <!-- Content -->
            <div class="p-3 px-2 bg-transparent">
                <!-- Filters -->
                <div class="col-12 offset-lg-2 col-lg-8 mb-2 bg-body bg-opacity-25 rounded">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 mt-3 mb-3">
                            <div class="row">

                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-10">
                                            <input type="text" id="advancedSearch"
                                                placeholder="Enter keyword to Search .." class="form-control" />
                                        </div>
                                        <div class="col-12 col-lg-2 d-grid">
                                            <button class="btn btn-primary" onclick="advancedSearch(0);">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border border-2 rounded border-primary" />
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <select class="form-select" id="category">
                                                <option value="0">Select Category</option>
                                                <?php

                                                $cat_rs = Database::search("SELECT * FROM `category`");
                                                $cat_count = $cat_rs->num_rows;

                                                for ($x = 0; $x < $cat_count; $x++) {

                                                    $cat_data = $cat_rs->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo ($cat_data['category_id']); ?>">
                                                        <?php echo ($cat_data["category"]); ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <select class="form-select" id="genre">
                                                <option value="0">Select Genre</option>
                                                <?php

                                                $sub_rs = Database::search("SELECT * FROM `sub_category`");
                                                $sub_count = $sub_rs->num_rows;

                                                for ($x = 0; $x < $sub_count; $x++) {

                                                    $sub_data = $sub_rs->fetch_assoc();

                                                    ?>
                                                    <option value="<?php echo ($sub_data['sub_category_id']); ?>">
                                                        <?php echo ($sub_data["sub_category"]); ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <select class="form-select" id="year">
                                                <option value="0">Select Year</option>
                                                <?php

                                                $year_rs = Database::search("SELECT * FROM `year`");
                                                $year_count = $year_rs->num_rows;

                                                for ($x = 0; $x < $year_count; $x++) {

                                                    $year_data = $year_rs->fetch_assoc();

                                                    ?>
                                                    <option value="<?php echo ($year_data['year_id']); ?>">
                                                        <?php echo ($year_data["year"]); ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 offset-lg-2 col-lg-8 rounded mb-2 bg-body bg-opacity-25 px-2">
                    <div class="row">
                        <div class="offset-4 col-8 offset-lg-6 col-lg-6 mb-2 mt-2">
                            <div class="row">
                                <div class="col-12">
                                    <select id="sort"
                                        class="form-select shadow-none border border-2 border-primary border-start-0 border-top-0 border-end-0">
                                        <option value="0">SORT BY</option>
                                        <option value="1">Name ASC</option>
                                        <option value="2">Name DESC</option>
                                        <option value="3">Year ASC</option>
                                        <option value="4">Year DESC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Filters -->

                <!-- Products & Results -->
                <div class="col-12 offset-lg-2 col-lg-8 rounded mb-2 bg-body bg-opacity-10">
                    <div class="row">
                        <div class="col-12 offset-lg-1 col-lg-10 mb-2 mt-2 text-center">

                            <div class="row justify-content-center" id="result-body-1">
                                <div class="col-12 mt-3 mb-4">
                                    <span class="h2 text-black-50"><i class="bi bi-search"
                                            style="font-size: 100px;"></i></span>
                                </div>
                                <div class="col-12 mb-4">
                                    <span class="h2 text-black-50">No Items Searched Yet ...</span>
                                </div>
                            </div>

                            <div class="row justify-content-center d-none" id="result-body-2">

                                <!-- Cards -->
                                <div class="card mb-3 mt-3 col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-4 mt-4" onclick="viewProduct(0);">
                                            <img src="resources/item_img/iphone14.jpg"
                                                class="img-fluid rounded-start my-1" alt="..." style="height: 100px;" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title fw-bold">iPhone 14</h5>
                                                <span class="card-text text-primary fw-bold">USD 699</span>
                                                <br />
                                                <span class="card-text text-success fw-bold fs">10 Items Left</span>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row g-1">
                                                            <div class="col-12 col-lg-6 d-grid">
                                                                <button class="btn btn-success fs"
                                                                    onclick="playNow(0);">Play Now</button>
                                                            </div>
                                                            <div class="col-12 col-lg-6 d-grid">
                                                                <button class="btn btn-danger fs"
                                                                    onclick="addToCart(0);"><i class="bi bi-cart"
                                                                        style="font-size: 15px;"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cards -->

                                <!-- Pagination -->
                                <div>
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

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Products & Results -->

            </div>
            <!-- content -->

            <!-- footer -->
            <?php include "footer.php"; ?>
            <!-- footer -->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
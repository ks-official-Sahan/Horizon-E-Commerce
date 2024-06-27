<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />
</head>

<body>

    <div class="container-fluid homex vh-100 w-100">
        <div class="row justify-content-center align-items-center">

            <!-- header -->
            <?php //include "header.php"; ?>
            <!-- header -->

            <!-- nav -->
            <?php

            require "connection.php";

            include "adminNavbar.php"; ?>
            <!-- nav -->

            <hr />

            <!-- content -->
            <div class="col-12 homex p-3 px-lg-4">
                <div class="row g-1">

                    <div class="col-12 bg-body bg-opacity-50 rounded my-lg-3 my-1">
                        <div class="row g-2 justify-content-center align-items-center">

                            <div class="col-12 my-3 px-3">
                                <div
                                    class="row g-2 justify-content-center align-items-center text-center text-lg-start">

                                    <div class="col-12 col-lg-6 ">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-3">Category</label>
                                            </div>
                                            <div class="col-10">
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
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 ">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-3">Year</label>
                                            </div>
                                            <div class="col-10">
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
                                    <hr class="mb-0" />

                                    <div class="col-12 text-center">
                                        <div class="row justify-content-center text-lg-start">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-3">Title</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-0" />

                                    <div class="col-12 ">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-3">Description</label>
                                            </div>
                                            <div class="col-10">
                                                <textarea class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-0" />

                                    <div class="col-12 p-3">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-3 col-lg-2 border rounded border-primary">
                                                <img src="resources/addproduct.svg" />
                                            </div>
                                            <div class="col-3 col-lg-2 border rounded border-primary">
                                                <img src="resources/addproduct.svg" />
                                            </div>
                                            <div class="col-3 col-lg-2 border rounded border-primary">
                                                <img src="resources/addproduct.svg" />
                                            </div>
                                        </div>
                                        <div class="row justify-content-center my-1 align-items-center">
                                            <div class="col-9 col-lg-6 d-grid">
                                                <input type="file" accept="image/*" class="d-none" id="imageUploader"
                                                    multiple>
                                                <label class="btn btn-success" for="imageUploader"
                                                    onclick="changeProductImages();">Upload Images</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-3" />

                                    <div class="col-12 col-lg-6 d-grid">
                                        <button class="btn btn-warning" onclick="saveProduct();">Save Product</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
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
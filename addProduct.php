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

            session_start();

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

                                    <div class="col-12 col-lg-6 mb-3">
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

                                    <div class="col-12 text-center mb-3">
                                        <div class="row justify-content-center text-lg-start">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-3">Title</label>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" id="title" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-0" />

                                    <div class="col-12 mb-3">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <label class="form-label fw-bold fs-3">Description</label>
                                            </div>
                                            <div class="col-10">
                                                <textarea id="description" class="form-control" cols="30"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mb-0" />

                                    <div class="col-12 mb-3">
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <div class="row justify-content-center">
                                                    <div class="col-10">
                                                        <label class="form-label fw-bold fs-3">URL</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="url">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row justify-content-center">
                                                    <div class="col-10">
                                                        <label class="form-label fw-bold fs-3">Quality</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <select id="quality" class="form-control">
                                                            <option value="0">Select Quality</option>
                                                            <?php

                                                            $quality_rs = Database::search("SELECT * FROM `quality`");
                                                            $quality_count = $quality_rs->num_rows;

                                                            for ($x = 0; $x < $quality_count; $x++) {

                                                                $quality_data = $quality_rs->fetch_assoc();

                                                                ?>
                                                                <option
                                                                    value="<?php echo ($quality_data['quality_id']); ?>">
                                                                    <?php echo ($quality_data["quality"]); ?>
                                                                </option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <div class="row justify-content-center">
                                                    <div class="col-10">
                                                        <label class="form-label fw-bold fs-3">Size</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input class="form-control" type="text" id="size">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row justify-content-center">
                                                    <div class="col-10">
                                                        <label class="form-label fw-bold fs-3">Unit</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <select id="unit" class="form-control">
                                                            <option value="0">Select Unit</option>
                                                            <?php

                                                            $size_rs = Database::search("SELECT * FROM `size`");
                                                            $size_count = $size_rs->num_rows;

                                                            for ($x = 0; $x < $size_count; $x++) {

                                                                $size_data = $size_rs->fetch_assoc();

                                                                ?>
                                                                <option value="<?php echo ($size_data['size_id']); ?>">
                                                                    <?php echo ($size_data["size_type"]); ?>
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

                                    <hr class="mb-0" />

                                    <div class="col-12 p-3">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-3 col-lg-2 border rounded border-primary">
                                                <img id="img0" src="resources/addproduct.svg"
                                                    style="max-width: 200px; max-height: 200px; " />
                                            </div>
                                            <div class="col-3 col-lg-2 border rounded border-primary">
                                                <img id="img1" src="resources/addproduct.svg"
                                                    style="max-width: 200px; max-height: 200px; " />
                                            </div>
                                            <div class="col-3 col-lg-2 border rounded border-primary">
                                                <img id="img2" src="resources/addproduct.svg"
                                                    style="max-width: 200px; max-height: 200px; " />
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
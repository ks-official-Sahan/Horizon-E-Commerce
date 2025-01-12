<?php

session_start();
require "connection.php";

$pageno;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Products | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />

</head>

<body class="overflow-scroll homex">

    <div class="container-fluid vh-100 w-100">
        <div class="row">

            <!-- header -->
            <div class="col-12 bg-transparent">
                <div class="row align-items-center">

                    <?php

                    $user;
                    $email;

                    if (isset($_SESSION["admin"])) {

                        $user = $_SESSION["admin"];
                        $email = $_SESSION["admin"]["email"];
                    } else {
                        header("Location:home.php");
                    }

                    $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");
                    $profile_count = $profile_rs->num_rows;

                    $path;
                    if ($profile_count > 0) {

                        $profile_data = $profile_rs->fetch_assoc();

                        $path = $profile_data["path"];
                    } else {

                        $path = "resources/avatar.svg";
                    }

                    $fname = $user["fname"];
                    $lname = $user["lname"];

                    ?>

                    <div class="col-12 col-lg-4 text-center text-lg-start">
                        <div class="row">

                            <div class="col-12 col-lg-4 my-1" onclick="() => { window.location = adminProfile.php; }">
                                <img src="<?php echo ($path); ?>" class="img-fluid rounded-circle w-75"
                                    style="max-height: 80px;" />
                            </div>

                            <div class="col-12 col-lg-8">
                                <div class="row g-2">
                                    <div class="col-12 mt-lg-3">
                                        <span class="fw-bold"><?php echo ($fname . " " . $lname); ?></span>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-bold"><?php echo ($email); ?></span>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-bold cursor-pointer text-white" onclick="signOut();">Sign
                                            Out</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 offset-lg-1 col-lg-4">
                        <h1 class="fw-bold text-center my-2 text-info">My Products</h1>
                    </div>

                    <div class="col-12 col-lg-2 offset-lg-1">
                        <div class="row">
                            <div class="col-12 d-grid">
                                <button class="btn btn-primary" onclick="addProduct();">Add Product</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- header -->

            <!-- Nav -->
            <?php include "navbar.php"; ?>
            <!-- Nav -->

            <!-- contents -->
            <div class="col-12 p-4 px-lg-5">
                <div class="row">
                    <div class="col-12 rounded rounded-3 shadow home">
                        <div class="row justify-content-center align-items-center">

                            <?php //include "sort.php"; ?>

                            <?php
                            $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `year` ON `year`.`year_id`=`product`.`year_id` INNER JOIN `category` ON `product`.`category_id`=`category`.`category_id` ORDER BY `datetime_added` DESC");
                            if ($product_rs->num_rows > 0) {
                                ?>
                                <!-- Products -->
                                <div class="col-12 col-lg-9 mx-lg-auto mx-0 my-3 border border-secondary rounded">
                                    <div class="row">

                                        <div class="offset-1 col-10 text-center">
                                            <div class="row justify-content-center gap-1">

                                                <?php
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
                                                    <div class="card my-1 col-12 col-lg-6 border-success p-2"
                                                        style="max-width: 500px; max-height: 250px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="<?php echo ($code); ?>"
                                                                    onclick="viewProduct(<?php echo ($product_data['product_id']); ?>);"
                                                                    class="img-fluid rounded-start my-2" alt="..."
                                                                    style="height: 120px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body my-auto">
                                                                    <h5 class="card-title">
                                                                        <?php echo ($product_data['title']); ?>
                                                                    </h5>
                                                                    <span
                                                                        class="card-text fw-bold text-success"><?php echo ($product_data['category']); ?></span><span
                                                                        class="card-text fw-bold"> : </span>
                                                                    <span
                                                                        class="card-text fw-bold text-primary"><?php echo ($product_data['year']); ?></span>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="fd" checked>
                                                                        <label class="form-check-label" for="fd">Make Product
                                                                            Deactive</label>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="row g-1">
                                                                                <div class="col-12 d-grid">
                                                                                    <!-- <div class="col-12 col-lg-6 d-grid"> -->
                                                                                    <button class="btn btn-success"
                                                                                        onclick="updateProduct(<?php echo ($product_data['product_id']); ?>);">Update</button>
                                                                                </div>
                                                                                <!-- <div class="col-12 col-lg-6 d-grid">
                                                                                    <button class="btn btn-danger"
                                                                                        onclick="deleteProduct(<?php echo ($product_data['product_id']); ?>);">Delete</button>
                                                                                </div> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                <!-- Products -->
                                <?php
                            } else {
                                ?>

                                <div class="row justify-content-center align-items-center bg-transparent"
                                    id="result-body-1">
                                    <div class="col-12 col-lg-6 mt-3 mb-4">
                                        <span class="h2 text-black-50"><i class="bi bi-search"
                                                style="font-size: 100px;"></i></span>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <span class="h2 text-black-50">No Items Yet ...</span>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- contents -->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product View | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />

</head>

<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    ?>

    <!-- <body class="bg-dark bg-opacity-75"> -->

    <body class="bg-primary bg-opacity-25">
        <!-- <body class="bg-body"> -->

        <div class="container-fluid vh-100 w-100">
            <div class="row justify-content-center align-items-center">

                <?php

                if (isset($_SESSION["user"]) || isset($_SESSION["admin"])) {
                    $user;
                    $type;
                    if (isset($_SESSION["user"])) {
                        $user = $_SESSION["user"];
                        $type = "user";

                        $today = date("Y-m-d");

                        $uhs_rs = Database::search("SELECT * FROM `user_has_subscription` WHERE `user_email`='" . $user["email"] . "'");
                        $uhs_count = $uhs_rs->num_rows;

                        if ($uhs_count == 1) {

                            $uhs_data = $uhs_rs->fetch_assoc();
                            $end_date = $uhs_data["validity"];

                            if (strtotime($today) > strtotime($end_date)) {

                                ?>
                                <script>
                                    window.onload = function () {
                                        alert("Your subscription has been expired.");
                                        window.location = "subscription.php";
                                    };
                                </script>
                                <?php

                            }
                        } else {
                            ?>
                            <script>
                                window.onload = function () {
                                    alert("You don't have have a subscription to continue.. ");
                                    window.location = "subscription.php";
                                };
                            </script>
                            <?php
                        }

                    } else if (isset($_SESSION["admin"])) {
                        $user = $_SESSION["admin"];
                        $type = "admin";
                    }

                    ?>

                    <!-- header -->
                    <?php include "header.php"; ?>
                    <!-- header -->


                    <div class="col-12">
                        <hr />
                    </div>

                    <!-- content -->
                    <div class="col-12">
                        <div class="row g-1 justify-content-center">

                            <?php

                            $pid = $_GET["id"];

                            $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `year` ON `product`.`year_id`=`year`.`year_id` WHERE `product_id`='" . $pid . "'");
                            $product_data = $product_rs->fetch_assoc();

                            $category_rs = Database::search("SELECT * FROM `category` WHERE `category_id`='" . $product_data["category_id"] . "'");
                            $category_data = $category_rs->fetch_assoc();

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                            $image_count = $image_rs->num_rows;

                            $code;
                            if ($image_count > 0) {
                                $image_data = $image_rs->fetch_assoc();
                                $code = $image_data["path"];
                            } else {
                                $code = "resources/item_img/images.jpg";
                            }

                            ?>

                            <!-- Cover -->
                            <!-- <div class="col-12 px-3 col-lg-6"> -->
                            <div class="col-12 px-3 col-lg-6 border-end border-bottom rounded rounded-4 mb-3">
                                <div class="row">
                                    <!-- Carousel -->
                                    <!-- <div class="col-12 mb-3 me-2 mt-3 py-2 px-2 w-100 border rounded rounded-4"> -->
                                    <div class="col-12 mb-3 me-2 mt-3 py-2 px-2 w-100">
                                        <div class="row mt-3 mb-3">

                                            <div class="col-2">

                                                <img src="<?php echo ($code); ?>" class="d-block slider-img w-100 h-25 mx-auto"
                                                    type="button" data-bs-target="#carouselExampleDark" class="active"
                                                    data-bs-slide-to="0" aria-current="true" aria-label="Slide 1" />

                                                <?php

                                                for ($x = 1; $x < $image_count; $x++) {

                                                    $image_data = $image_rs->fetch_assoc();

                                                    ?>
                                                    <img src="<?php echo ($image_data["path"]); ?>"
                                                        class="d-block slider-img w-100 h-25 mx-auto" type="button"
                                                        data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo ($x); ?>"
                                                        aria-label="Slide <?php echo ($x + 1); ?>" />
                                                    <?php

                                                }

                                                ?>

                                            </div>

                                            <div id="carouselExampleDark"
                                                class="col-10 carousel carousel-dark slide table-responsive"
                                                data-bs-ride="carousel">
                                                <div class="carousel-indicators">

                                                    <button type="button" data-bs-target="#carouselExampleDark"
                                                        data-bs-slide-to="0" class="active" aria-current="true"
                                                        aria-label="Slide 1"></button>

                                                    <?php

                                                    for ($x = 1; $x < $image_count; $x++) {

                                                        ?>
                                                        <button type="button" data-bs-target="#carouselExampleDark"
                                                            data-bs-slide-to="<?php echo ($x); ?>"
                                                            aria-label="Slide <?php echo ($x + 1); ?>"></button>
                                                        <?php

                                                    }

                                                    ?>

                                                </div>
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active" data-bs-interval="5000">
                                                        <img src="<?php echo ($code); ?>"
                                                            class="d-block slider-img w-75 mx-auto" alt="..." />
                                                    </div>
                                                    <?php

                                                    for ($x = 1; $x < $image_count; $x++) {

                                                        $image_data = $image_rs->fetch_assoc();

                                                        ?>
                                                        <div class="carousel-item" data-bs-interval="3000">
                                                            <img src="<?php echo ($image_data["path"]); ?>"
                                                                class="d-block slider-img w-75 mx-auto" alt="..." />
                                                        </div>
                                                        <?php

                                                    }

                                                    ?>
                                                </div>
                                                <?php if ($image_count > 1) { ?>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Carousel -->
                                </div>
                            </div>
                            <!-- Cover -->

                            <!-- Product Info -->
                            <div class="col-12 col-lg-6 px-3 mb-3">
                                <div class="row justify-content-center text-start">
                                    <div class="col-12">

                                        <!-- BreadCrumb -->
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="row border-bottom">
                                                    <nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb">
                                                            <li class="breadcrumb-item"><a href="home.php"
                                                                    class="text-decoration-none">Home</a></li>
                                                            <li class="breadcrumb-item active" aria-current="page">
                                                                <?php echo ($category_data["category"]); ?>
                                                            </li>
                                                        </ol>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- BreadCrumb -->

                                        <!-- Details -->
                                        <div class="row">

                                            <div class="col-12 mt-3 px-4 p-2">
                                                <span
                                                    class="fw-bold fs-3 pt-1 text-success"><?php echo ($product_data["title"]); ?></span>
                                                <span class="fw-bold fs-4 pt-1 text-secondary">&nbsp; |
                                                    &nbsp;<?php echo ($product_data["year"]); ?></span>
                                            </div>

                                            <div class="col-12 px-2 opacity-50">
                                                <hr class="mb-3" />
                                            </div>

                                            <div class="col-12 px-5 p-3">
                                                <div class="row g-3 px-3">
                                                    <div class="col-12 d-grid">
                                                        <a href="#versions"
                                                            class="btn rounded shadow rounded-4 btn-primary">Play Now</a>
                                                    </div>
                                                    <div class="col-12 d-grid">
                                                        <button class="btn rounded shadow rounded-4 btn-outline-danger"
                                                            onclick="addToWatchList(<?php echo ($pid); ?>);">Add to Watch
                                                            List</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <div class="col-12 mb-2 text-danger">
                                            <span class="fw-bold"><i class="bi bi-star-fill fs-5"></i></span>
                                            <span class="fw-bold"><i class="bi bi-star-fill fs-5"></i></span>
                                            <span class="fw-bold"><i class="bi bi-star-fill fs-5"></i></span>
                                            <span class="fw-bold"><i class="bi bi-star-fill fs-5"></i></span>
                                            <span class="fw-bold"><i class="bi bi-star-half fs-5"></i></span>&nbsp;&nbsp;
                                            <span class="fs-5">4.5 Stars</span>
                                            <span class="fs-5 text-dark"> | 62 Reviews | </span>
                                            <span class="fs-5 text-dark">128 Orders</span>
                                        </div> -->

                                            <div class="col-12 px-5 opacity-50">
                                                <hr class="mb-3" />
                                            </div>

                                            <!-- <div class="col-12 col-lg-7 border-end">
                                            <div class="row">
                                                <div class="col-4 text-end">
                                                    <span class="fw-bold">Condition : </span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-black-50">Brand New</span>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <span class="fw-bold">Colour : </span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-black-50">Phanthom Blue</span>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <span class="fw-bold">Stock : </span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="text-black-50">10 Items Available</span>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <label for="qty" class="form-label fw-bold">Quantity : </label>
                                                </div>
                                                <div class="col-7">
                                                    <input type="number" id="qty" min="0" value="1" class="form-control text-black-50" />
                                                </div>
                                                <div class="col-12">
                                                    <hr />
                                                </div>
                                                <div class="col-4 text-end">
                                                    <span class="fs-5 fw-bold">Price : </span>
                                                </div>
                                                <div class="col-8">
                                                    <div class="row g-2">
                                                        <div class="col-12">
                                                            <span class="text-black-50 fw-bolder fs-4">899 USD</span>
                                                        </div>
                                                        <div class="col-12 d-grid">
                                                            <button class="btn rounded rounded-4 btn-primary" onclick="playNow(0);">Play Now</button>
                                                        </div>
                                                        <div class="col-12 d-grid">
                                                            <button class="btn rounded rounded-4 btn-danger" onclick="addToCart(0);">Add to Cart</button>
                                                        </div>
                                                        <div class="col-12 d-grid">
                                                            <button class="btn rounded rounded-4 btn-outline-primary" onclick="addToWatchList(0);">Add to Watch List</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <hr />
                                                </div>
                                                <div class="col-6 text-center mb-3 border-end">
                                                    <span class="fw-bold text-success fs-4">128</span><br />
                                                    <span class="fw-semibold fs-6 text-black-50">Sold</span>
                                                </div>
                                                <div class="col-6 text-center mb-3">
                                                    <span class="fw-bold text-primary fs-4">196</span><br />
                                                    <span class="fw-semibold fs-6 text-black-50">Views</span>
                                                </div>
                                            </div>
                                        </div> -->
                                            <!-- Details -->

                                            <!-- Ads -->
                                            <!-- <div class="col-lg-5 d-none d-lg-block text-center">
                                            <span class="fs-3">Display Ads</span>
                                        </div> -->
                                            <!-- Ads -->

                                            <!-- Seller Info -->
                                            <!-- <div class="col-12 border-bottom border-top rounded rounded-4">
                                            <div class="row pt-3">
                                                <div class="col-6 text-center border-end mb-3">
                                                    <span class="fw-bold text-success fs-4">Seller</span><br />
                                                </div>
                                                <div class="col-6 text-center mb-3">
                                                    <span class="fw-bold text-primary fs-4">Horizon CSR</span><br />
                                                </div>
                                            </div>
                                        </div> -->
                                            <!-- Seller Info -->

                                        </div>

                                        <!-- Description -->
                                        <div class="row">

                                            <div class="col-12 py-2 px-lg-4 mb-3 px-3 text-lg-start text-center">
                                                <span class="fs-3 fw-bold">Description</span>
                                            </div>

                                            <div class="col-12 mb-3 p-3 pt-1">
                                                <div class="row px-3 justify-content-center">

                                                    <div class="col-12 fs-5 text-black-50">
                                                        <!-- <textarea cols="30" rows="20" class="form-control fs-5 text-black-50 disabled" disabled> -->
                                                        <?php echo ($product_data["description"]); ?>
                                                        <!-- </textarea> -->
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- Description -->

                                        <!-- Versions -->
                                        <div class="row" id="versions">

                                            <div class="col-12 table-responsive">
                                                <table class="table">
                                                    <thead class="table-dark text-center rounded-top">
                                                        <tr>
                                                            <th>Version</th>
                                                            <th>Quality</th>
                                                            <th>Size</th>
                                                            <th>Play</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center table-primary">
                                                        <?php

                                                        $version_rs = Database::search("SELECT * FROM `version` INNER JOIN `quality` ON `version`.`quality_id`=`quality`.`quality_id` INNER JOIN `version_type` ON `version`.`version_type_id`=`version_type`.`version_type_id` INNER JOIN `size` ON `version`.`size_id`=`size`.`size_id` WHERE `product_id`='" . $pid . "' ORDER BY `version`.`size_id` DESC");
                                                        $version_count = $version_rs->num_rows;

                                                        if ($version_count > 0) {

                                                            for ($x = 0; $x < $version_count; $x++) {

                                                                $version_data = $version_rs->fetch_assoc();

                                                                ?>
                                                                <tr>
                                                                    <td><?php echo ($version_data["version"]); ?></td>
                                                                    <td><?php echo ($version_data["quality"]); ?></td>
                                                                    <td><?php echo ($version_data["size"] . $version_data["size_type"]); ?>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-outline-danger"
                                                                            onclick="playVersion(<?php echo ($version_data['version_id']); ?>)">Play</button>
                                                                    </td>
                                                                </tr>
                                                                <?php

                                                            }
                                                        } else {
                                                            ?>
                                                            <tr>
                                                                <td colspan="4">Something went wrong</td>
                                                            </tr>
                                                            <?php
                                                        }

                                                        ?>

                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- Versions -->

                                    </div>
                                </div>
                            </div>
                            <!-- Product Info -->

                            <div class="col-12">
                                <hr />
                            </div>

                            <!-- Player -->
                            <div class="col-12 p-4 px-5 d-none" id="playerDiv">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-12">
                                        <video class="w-100" id="video" controls autoplay>
                                            <source id="player" src="#" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <!-- Player -->

                            <!-- Related Items -->
                            <div class="col-12 py-2">
                                <div class="row justify-content-center">

                                    <div class="col-12 py-2 px-lg-4 px-3 text-lg-start text-center">
                                        <span class="fs-3 fw-bold">Similar Movies</span>
                                    </div>

                                    <div class="col-12 px-4">
                                        <hr class="mt-1 mb-3" />
                                    </div>

                                    <div class="col-12 mb-3">
                                        <div class="row px-3 justify-content-center g-2 align-items-center gap-2">

                                            <?php

                                            $similar_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $product_data["category_id"] . "' AND `status_id`='1' AND `product_id`!='" . $pid . "' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                            $similar_count = $similar_rs->num_rows;

                                            if ($similar_count < 2) {

                                                $similar_rs = Database::search("SELECT * FROM `product` WHERE `status_id`='1' AND `product_id`!='" . $pid . "' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                                $similar_count = $similar_rs->num_rows;
                                            }

                                            for ($y = 0; $y < $similar_count; $y++) {

                                                $similar_data = $similar_rs->fetch_assoc();

                                                $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $similar_data["product_id"] . "'");
                                                $img_count = $img_rs->num_rows;

                                                $imgCode;
                                                if ($img_count > 0) {
                                                    $img_data = $img_rs->fetch_assoc();
                                                    $imgCode = $img_data["path"];
                                                } else {
                                                    $imgCode = "resources/item_img/images.jpg";
                                                }

                                                ?>

                                                <!-- Card -->
                                                <div class="col-12 card rounded-4 col-sm-6 col-lg-3 bg-opacity-75 home-card"
                                                    style="width: 16rem; height: 300px; background-image: url('<?php echo ($imgCode); ?>');">
                                                    <div
                                                        class="card-body text-center d-flex flex-column justify-content-end shadow">
                                                        <h6
                                                            class="card-title rounded-5 text-bg-dark bg-opacity-50 p-1 fw-bold text-white shadow">
                                                            <?php echo ($similar_data["title"]); ?>
                                                        </h6>
                                                        <div class="d-grid gap-1 rounded-3 text-bg-dark text-info">
                                                            <a href="#" class="btn bg-primary shadow fw-bolder bg-opacity-50"
                                                                onclick="viewProduct(<?php echo ($similar_data['product_id']); ?>);">Watch
                                                                Now</a>
                                                            <a href="#" class="btn bg-danger shadow fw-bolder bg-opacity-50"
                                                                onclick="addToWatchList(0);">Add to Watch List</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card -->

                                                <?php


                                            }

                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Related Items -->

                        </div>
                    </div>
                    <!-- content -->

                    <!-- footer -->
                    <?php include "footer.php"; ?>
                    <!-- footer -->

                    <?php

                } else {
                    ?>
                    <div class="col-12 fw-bold py-5 p-4 text-center">
                        <span class="text-warning fs-2">Something went wrong. Please sign in again.</span>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <!-- <script src="bootstrap.bundle.js"></script> -->
    </body>

    <?php

} else {
    // header("Location:home.php");

    ?>

    <body>
        <div class="col-12 text-center fs-2">
            <?php echo ("Something went wrong !!"); ?>
        </div>
    </body>
    <?php

}

?>

</html>
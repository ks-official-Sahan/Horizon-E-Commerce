<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <link rel="icon" href="resources/logo/HS logo black png.png" />

</head>

<body
    style="background-image: linear-gradient(90deg, hsl(274, 84%, 57%) 0%, hsl(254, 84%, 52%) 50%, hsl(225, 86%, 55%) 100%); overflow-x: hidden;">

    <div class="col-12">
        <div class="row">

            <!-- Head -->
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
            <!-- Head -->

            <!-- <hr class="mb-0" /> -->

            <!-- Contents -->
            <div class="col-12 border-top p-3">
                <div class="row justify-content-center align-content-center align-items-center">

                    <!-- <hr /> -->

                    <div class="col-12 shadow" id="result-body-1">
                        <div class="row align-items-center justify-content-center align-content-center">

                            <!-- Carousel -->
                            <div class="col-12 d-none carouselHome d-lg-block mb-3 shadow" style="margin-top: 0px;">
                                <div class="row g-0">

                                    <div id="carouselExampleDark" class="col-12 carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="3" aria-label="Slide 4"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="3000">
                                                <img src="resources/slider_img/slide9.jpg"
                                                    class="d-block slider-img w-100" alt="...">
                                                <div class="carousel-caption text-white mb-2 d-none d-md-block">
                                                    <h4 class="fw-bold mb-2">Welcome to Horizon CSR</h4>
                                                    <p>The Best Online Streaming STORE by Horizon CSR</p>
                                                </div>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="3000">
                                                <img src="resources/slider_img/slide3.jpg"
                                                    class="d-block slider-img w-100" alt="...">
                                                <div class="carousel-caption text-white mb-2 d-none d-md-block">
                                                    <h4 class="fw-bold mb-2"></h4>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <img src="resources/slider_img/slide0.jpg"
                                                    class="d-block slider-img w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5 class="fw-bold"></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <img src="resources/slider_img/slide4.jpg"
                                                    class="d-block slider-img w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5 class="fw-bold"></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
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
                                    </div>

                                </div>
                            </div>
                            <!-- Carousel -->
                            <hr />

                            <?php

                            $recent_rs = Database::search("SELECT * FROM `recent` WHERE `user_email`='" . $email . "'");
                            $recent_count = $recent_rs->num_rows;

                            if ($recent_count > 0) {

                                ?>

                                <!-- Categories & Products -->
                                <div class="col-12">
                                    <div class="row g-2">

                                        <!-- Category -->
                                        <div class="col-12 shadow mb-2 p-2 pt-0 px-5">
                                            <a href="#" class="fw-bold link-light text-decoration-none fs-1 my-auto"
                                                onclick="window.location.reload();">Recents</a> &nbsp;&nbsp;
                                            <a href="recents.php" class="link-danger text-decoration-none fs-5">See All
                                                &rArr;</a>
                                        </div>
                                        <!-- Category -->

                                        <!-- Products -->
                                        <div class="col-12 mb-3 border-primary p-3">
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="row justify-content-center g-2 gap-2">

                                                        <?php

                                                        for ($z = 0; $z < $recent_count; $z++) {

                                                            $recent_data = $recent_rs->fetch_assoc();

                                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `product_id`='" . $recent_data["product_id"] . "' AND `status_id`='1' LIMIT 4 OFFSET 0");
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
                                                            <div class="card home-card col-12 rounded-4 bg-dark bg-opacity-75"
                                                                style="width: 16rem; height: 300px; background-image: url('<?php echo ($code); ?>');">
                                                                <!-- <img src="<?php // echo ($code); 
                                                                        ?>" class="card-img-top my-3 mx-auto" alt="..." style="height: 200px; width: 170px;" /> -->
                                                                <div
                                                                    class="card-body text-center d-flex flex-column justify-content-end shadow">
                                                                    <h6
                                                                        class="card-title fw-bold rounded-5 p-1 text-bg-dark bg-opacity-50 text-white shadow">
                                                                        <?php echo ($product_data["title"]); ?>
                                                                    </h6>
                                                                    <div
                                                                        class="d-grid rounded-3 gap-1 text-info text-bg-dark bg-opacity-50">
                                                                        <a href="#"
                                                                            class="btn bg-primary shadow fw-bolder bg-opacity-50"
                                                                            onclick="viewProduct(<?php echo ($product_data['product_id']); ?>);">Watch
                                                                            Now</a>
                                                                        <a href="#"
                                                                            class="btn bg-danger shadow fw-bolder bg-opacity-50"
                                                                            onclick="addToWatchList(<?php echo ($product_data['product_id']); ?>);">Add
                                                                            to Watch List</a>
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
                                        <!-- Products -->

                                    </div>
                                </div>
                                <!-- Recents -->

                                <hr />

                            <?php } ?>

                            <!-- Categories & Products -->
                            <div class="col-12">
                                <div class="row g-2">

                                    <?php

                                    $cat_rs = Database::search("SELECT * FROM `category`");
                                    $cat_count = $cat_rs->num_rows;

                                    for ($w = 0; $w < $cat_count; $w++) {

                                        $cat_data = $cat_rs->fetch_assoc();
                                        // echo($cat_data["category_id"]);
                                    
                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cat_data["category_id"] . "' AND `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                        $product_count = $product_rs->num_rows;


                                        if ($product_count > 0) {

                                            ?>

                                            <!-- Category -->
                                            <div class="col-12 shadow mb-2 p-2 pt-0 px-5">
                                                <a href="#" class="fw-bold link-light text-decoration-none fs-1 my-auto"
                                                    onclick="window.location.reload();"><?php echo ($cat_data["category"]); ?></a>
                                                &nbsp;&nbsp;
                                                <a href="#" class="link-danger text-decoration-none fs-5"
                                                    onclick="viewCategory(<?php echo ($cat_data['category_id']); ?>);">See All
                                                    &rArr;</a>
                                            </div>
                                            <!-- Category -->

                                            <!-- Products -->
                                            <div class="col-12 mb-3 border-primary p-3">
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="row justify-content-center g-2 gap-2">

                                                            <?php

                                                            for ($z = 0; $z < $product_count; $z++) {

                                                                $product_data = $product_rs->fetch_assoc();

                                                                $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product_data["product_id"] . "'");
                                                                $img_count = $img_rs->num_rows;

                                                                $code;
                                                                if ($img_count > 0) {
                                                                    $img_data = $img_rs->fetch_assoc();
                                                                    $code = $img_data["path"];
                                                                } else {
                                                                    $code = "resources/item_img/image2.jpg";
                                                                }


                                                                ?>

                                                                <!-- Card -->
                                                                <div class="card home-card col-12 rounded-4 bg-dark bg-opacity-75"
                                                                    style="width: 16rem; height: 300px; background-image: url('<?php echo ($code); ?>');">
                                                                    <!-- <img src="<?php // echo ($code); 
                                                                                ?>" class="card-img-top my-3 mx-auto" alt="..." style="height: 200px; width: 170px;" /> -->
                                                                    <div
                                                                        class="card-body text-center d-flex flex-column justify-content-end shadow">
                                                                        <h6
                                                                            class="card-title fw-bold rounded-5 p-1 text-bg-dark bg-opacity-50 text-white shadow">
                                                                            <?php echo ($product_data["title"]); ?>
                                                                        </h6>
                                                                        <div
                                                                            class="d-grid rounded-3 gap-1 text-info text-bg-dark bg-opacity-50">
                                                                            <a href="#"
                                                                                class="btn bg-primary shadow fw-bolder bg-opacity-50"
                                                                                onclick="viewProduct(<?php echo ($product_data['product_id']); ?>);">Watch
                                                                                Now</a>
                                                                            <a href="#"
                                                                                class="btn bg-danger shadow fw-bolder bg-opacity-50"
                                                                                onclick="addToWatchList(<?php echo ($product_data['product_id']); ?>);">Add
                                                                                to Watch List</a>
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
                                            <!-- Products -->

                                            <?php

                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                            <!-- Categories & Products -->

                        </div>
                    </div>

                    <div class="col-12 d-none" id="result-body-2">
                        <div class="row g-4 gap-3 justify-content-center">

                            <!-- Cards -->
                            <div class="card" style="width: 16rem;">
                                <img src="resources/item_img/iphone14pro.jpg" onclick="viewProduct(0);"
                                    class="card-img-top my-3 mx-auto" alt="..." style="height: 200px; width: 170px;" />
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">iPhone 14 Pro</h5>
                                    <span class="card-text fw-bold text-success">Price: USD 899</span><br />
                                    <span class="card-text fw-bold text-warning">Stock: 12 Items Available</span>
                                    <div class="d-grid gap-1">
                                        <a href="#" class="btn btn-primary" onclick="plaNow(0);">Play Now</a>
                                        <a href="#" class="btn btn-secondary" onclick="addToCart(0);">Add to Cart</a>
                                        <a href="#" class="btn btn-danger" onclick="addToWatchList(0);">Add to Watch
                                            List</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Cards -->

                            <!-- Pagination -->
                            <div class="mt-2">
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
            <!-- Contents -->

            <hr />

            <!-- Footer -->
            <?php include "footer.php"; ?>
            <!-- Footer -->

        </div>
    </div>

    <?php include "scripts.php"; ?>

</body>

</html>
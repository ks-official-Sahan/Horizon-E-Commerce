<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Recents & Saved | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <!-- <link rel="stylesheet" href="bootstrap-icons.css" /> -->

    <link rel="icon" href="resources/logo/HS logo black png.png" type="image/svg" />
</head>

<body class="bg-primary bg-opacity-25">

    <?php

    require "connection.php";

    session_start();

    ?>

    <div class="container-fluid vh-100 w-100">
        <div class="row">

            <!-- header -->
            <?php include "header.php"; ?>
            <!-- header -->

            <!-- content -->
            <div class="col-12 px-3">
                <div class="row">
                    <div class="col-12 border border-1 border-secondary rounded mb-2">
                        <div class="row justify-content-center">

                            <div class="col-12 pt-3 ps-4">
                                <label class="form-label fs-1 fw-bolder">Recents &hearts;</label>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12 p-2">
                                <div class="row">
                                    <div class="offset-lg-2 col-12 col-lg-6 mb-1">
                                        <input type="text" placeholder="Search in Recents..." class="form-control" />
                                    </div>
                                    <div class="col-12 col-lg-2 mb-1 d-grid">
                                        <button class="btn btn-primary" onclick="recentSearch(0)">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12 col-lg-3 border-0 border-end border-1">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <nav aria-label="breadcrumb">
                                                    <div class="breadcrumb">
                                                        <a href="home.php" class="breadcrumb-item fw-bold">Home</a>
                                                        <a href="#" aria-current="page"
                                                            class="breadcrumb-item fw-bold active">Recents</a>
                                                    </div>
                                                </nav>
                                            </div>
                                            <div class="col-12">
                                                <nav class="nav flex-column nav-tabs">
                                                    <a class="nav-link active" href="#">Recents</a>
                                                    <a class="nav-link" href="watchList.php">My Watch List</a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php

                            $recent_rs = Database::search("SELECT * FROM `recent` WHERE `user_email`='" . $email . "'");
                            $recent_count = $recent_rs->num_rows;

                            if ($recent_count > 0) {
                                ?>
                                <!-- have product -->
                                <div class="col-12 col-lg-9 px-lg-5 p-3" id="haveProduct">
                                    <div class="row justify-content-center p-2">

                                        <?php
                                        for ($count = 0; $count < $recent_count; $count++) {

                                            $recent_data = $recent_rs->fetch_assoc();

                                            $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `year` ON `product`.`year_id`=`year`.`year_id` INNER JOIN `category` ON `product`.`category_id`=`category`.`category_id` WHERE `product_id`='" . $recent_data["product_id"] . "'");
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
                                            <div
                                                class="card mb-3 mx-0 mx-lg-2 col-11 col-lg-10 py-3 px-2 bg-dark bg-opacity-10">
                                                <div class="row g-0 justify-content-center">
                                                    <div class="col-md-4 col-3 me-3">
                                                        <img src="<?php echo ($code); ?>"
                                                            onclick="viewProduct(<?php echo ($product_data['product_id']); ?>);"
                                                            class="img-fluid rounded" />
                                                    </div>
                                                    <div class="col-md-7 col-9">
                                                        <div class="row">
                                                            <div class="card-body col-12 w-100">
                                                                <h5 class="card-title fs-2 fw-bold text-primary">
                                                                    <?php echo ($product_data["title"]); ?>
                                                                </h5>
                                                                <span class="fs-4 fw-bold text-black-50">Year :
                                                                    <?php echo ($product_data["year"]); ?></span>
                                                                &nbsp;&nbsp;<br />
                                                                <span class="fs-4 fw-bold text-black-50">Category :
                                                                    <?php echo ($product_data["category"]); ?></span><br />
                                                                <?php

                                                                $sub_cat_rs = Database::search("SELECT * FROM `product_has_sub_category` INNER JOIN `sub_category` ON `product_has_sub_category`.`sub_category_id`=`sub_category`.`sub_category_id` WHERE `product_id`='" . $product_data["product_id"] . "'");
                                                                $sub_cat_count = $sub_cat_rs->num_rows;

                                                                if ($sub_cat_count > 0) {
                                                                    ?>
                                                                    <div>
                                                                        <span class="fs-4 fw-bold text-black-50">Genre
                                                                            :</span>&nbsp;&nbsp;
                                                                        <br />
                                                                        <div class="ps-5">
                                                                            <?php

                                                                            for ($y = 0; $y < $sub_cat_count; $y++) {
                                                                                $sub_cat_data = $sub_cat_rs->fetch_assoc();
                                                                                ?>
                                                                                <span
                                                                                    class="fs-5 text-black-50"><?php echo ($sub_cat_data["sub_category"]); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }

                                                                ?>
                                                            <div class="col-6">
                                                                <div class="card-body d-grid">
                                                                    <a href="#" class="btn btn-outline-success mb-2"
                                                                        onclick="viewProduct(<?php echo ($product_data['product_id']); ?>);">Play
                                                                        Now</a>
                                                                    <a href="#" class="btn btn-outline-danger mb-2"
                                                                        onclick="removeFromRecent(<?php echo ($recent_data['recent_id']); ?>);">Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>

                                </div>
                                <!-- have product -->
                                <?php
                            } else {
                                ?>
                                <!-- empty view -->
                                <div class="col-12 col-lg-9" id="emptyView">
                                    <div class="row justify-content-center">
                                        <div class="col-12 emptyView"></div>
                                        <div class="col-12 text-center mb-3">
                                            <label class="fw-bolder fs-1 text-black-50">You haven't added anything
                                                yet...</label>
                                        </div>
                                        <div class="col-12 col-lg-4 d-grid mb-4 p-3 text-center">
                                            <a href="home.php" class="fs-4 btn btn-primary fw-bolder">Browse</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- empty view -->
                                <?php
                            }

                            ?>

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
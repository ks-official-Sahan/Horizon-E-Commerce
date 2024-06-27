<?php

// echo ("Advanced Search Process");

require "../connection.php";

$page = $_POST["page"];
$txt = $_POST["txt"];
$category = $_POST["category"];
$genre = $_POST["genre"];
$year = $_POST["year"];
$sort = $_POST["sort"];
$status = 0;

$query = "SELECT * FROM `product` INNER JOIN `year` ON `year`.`year_id`=`product`.`year_id` INNER JOIN `category` ON `product`.`category_id`=`category`.`category_id`";

if ($sort == 0) {
    // echo ("no sort");

    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }

    if ($status == 0 && $category != 0) {
        $query .= " WHERE `product`.`category_id`='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `product`.`category_id`='" . $category . "'";
    }

    // if ($status == 0 && $genre != 0) {
    //     $query .= " WHERE `sub_category_id`='" . $genre . "'";
    //     $status = 1;
    // } else if ($status != 0 && $genre != 0) {
    //     $query .= " AND `sub_category_id`='" . $condition . "'";
    // }

    if ($status == 0 && $year != 0) {
        $query .= " WHERE `product`.`year_id`='" . $year . "'";
        $status = 1;
    } else if ($status != 0 && $year != 0) {
        $query .= " AND `product`.`year_id`='" . $colour . "'";
    }

} else if ($sort == 1) {
    // echo ("Nane ASC");

    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }


    if ($status == 0 && $category != 0) {
        $query .= " WHERE `product`.`category_id`='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `product`.`category_id`='" . $category . "'";
    }

    // if ($status == 0 && $genre != 0) {
    //     $query .= " WHERE `sub_category_id`='" . $genre . "'";
    //     $status = 1;
    // } else if ($status != 0 && $genre != 0) {
    //     $query .= " AND `sub_category_id`='" . $condition . "'";
    // }

    if ($status == 0 && $year != 0) {
        $query .= " WHERE `product`.`year_id`='" . $year . "'";
        $status = 1;
    } else if ($status != 0 && $year != 0) {
        $query .= " AND `product`.`year_id`='" . $colour . "'";
    }

    $query .= " ORDER BY `title` DESC";
} else if ($sort == 2) {
    // echo ("Name Desc");

    if (!empty($txt)) {
        $query .= " WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }


    if ($status == 0 && $category != 0) {
        $query .= " WHERE `product`.`category_id`='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `product`.`category_id`='" . $category . "'";
    }

    // if ($status == 0 && $genre != 0) {
    //     $query .= " WHERE `sub_category_id`='" . $genre . "'";
    //     $status = 1;
    // } else if ($status != 0 && $genre != 0) {
    //     $query .= " AND `sub_category_id`='" . $condition . "'";
    // }

    if ($status == 0 && $year != 0) {
        $query .= " WHERE `product`.`year_id`='" . $year . "'";
        $status = 1;
    } else if ($status != 0 && $year != 0) {
        $query .= " AND `product`.`year_id`='" . $colour . "'";
    }

    $query .= " ORDER BY `title` DESC";
} else if ($sort == 3) {
    // echo ("Year ASC");


    if ($status == 0 && $category != 0) {
        $query .= " WHERE `product`.`category_id`='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `product`.`category_id`='" . $category . "'";
    }

    // if ($status == 0 && $genre != 0) {
    //     $query .= " WHERE `sub_category_id`='" . $genre . "'";
    //     $status = 1;
    // } else if ($status != 0 && $genre != 0) {
    //     $query .= " AND `sub_category_id`='" . $condition . "'";
    // }

    if ($status == 0 && $year != 0) {
        $query .= " WHERE `product`.`year_id`='" . $year . "'";
        $status = 1;
    } else if ($status != 0 && $year != 0) {
        $query .= " AND `product`.`year_id`='" . $colour . "'";
    }

    $query .= " ORDER BY `year` ASC";
} else if ($sort == 4) {
    // echo ("Year DESC");


    if ($status == 0 && $category != 0) {
        $query .= " WHERE `product`.`category_id`='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `product`.`category_id`='" . $category . "'";
    }

    // if ($status == 0 && $genre != 0) {
    //     $query .= " WHERE `sub_category_id`='" . $genre . "'";
    //     $status = 1;
    // } else if ($status != 0 && $genre != 0) {
    //     $query .= " AND `sub_category_id`='" . $condition . "'";
    // }

    if ($status == 0 && $year != 0) {
        $query .= " WHERE `product`.`year_id`='" . $year . "'";
        $status = 1;
    } else if ($status != 0 && $year != 0) {
        $query .= " AND `product`.`year_id`='" . $colour . "'";
    }

    $query .= " ORDER BY `year` DESC";
}

// echo ($query);
// echo ("success");
// }

?>

<?php

if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

// echo ($query);

$product_rs = Database::search($query);
if ($product_rs->num_rows != 0) {
    $product_count = $product_rs->num_rows;

    $results_per_page = 6;
    $number_of_pages = ceil($product_count / $results_per_page);

    $viewed_results_count = ((int) $pageno - 1) * $results_per_page;

    $query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
    $results_rs = Database::search($query);
    $results_count = $results_rs->num_rows;

    while ($results_data = $results_rs->fetch_assoc()) {

        $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $results_data["product_id"] . "'");
        $img_count = $img_rs->num_rows;

        $code;
        if ($img_count > 0) {
            $img_data = $img_rs->fetch_assoc();
            $code = $img_data["path"];
        } else {
            $code = "resources/item_img/images.jpg";
        }

        ?>

        <div class="p-1 mb-3 mt-3 col-12 col-lg-6 ">
            <div class="card p-2">
                <div class="row">

                    <div class="col-md-4 mt-4">

                        <img src="<?php echo ($code) ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">

                            <h5 class="card-title fw-bold"><?php echo $results_data["title"]; ?></h5>
                            <span class="card-text text-primary fw-bold">Category:
                                <?php echo $results_data["category"]; ?></span>
                            <br />

                            <span class="card-text text-success fw-bold fs">Year: <?php echo $results_data["year"]; ?></span>

                            <div class="row">
                                <div class="col-12">

                                    <div class="row g-1">
                                        <div class="col-12 col-lg-6 d-grid">
                                            <a href="#" class="btn btn-success fs"
                                                onclick="viewProduct(<?php echo ($results_data['product_id']); ?>);">Play
                                                Now</a>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <a href="#" class="btn btn-danger fs"
                                                onclick="addToWatchList(<?php echo ($results_data['product_id']); ?>);">Add
                                                to Watchlist</a>
                                        </div>
                                    </div>

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

    <!-- Pagination -->
    <div class="col-8 col-lg-6 text-center mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) {
                        echo ("#");
                    } else {
                        ?> onclick="advancedSearch(<?php echo ($pageno - 1) ?>);" <?php
                    } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($page = 1; $page <= $number_of_pages; $page++) {
                    if ($page == $pageno) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advancedSearch(<?php echo ($page) ?>);"><?php echo $page; ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advancedSearch(<?php echo ($page) ?>);"><?php echo $page; ?></a>
                        </li>
                        <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                        echo ("#");
                    } else {
                        ?> onclick="advancedSearch(<?php echo ($pageno + 1) ?>);" <?php
                    } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Pagination -->

    <?php
}
?>
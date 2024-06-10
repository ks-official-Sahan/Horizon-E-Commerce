<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- Search -->
    <div class="col-12 p-2">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-10 col-12 mb-1 mb-lg-0 mt-2 mt-lg-0">
                <div class="input-group rounded-5 justify-content-center" style="background-color: hsl(250, 30%, 20%);">
                    <button id="intxt" class="rounded-end btn text-warning fs-5 px-3 pb-2 pt-1 rounded-5"><i class="bi bi-search"></i></button>
                    <input type="text" id="basicSearchtxt" onkeyup="basicSearch(0);" class="form-control bg-transparent border-0 text-white p-3" placeholder="Enter keywords ..." style="width: 60%;" />
                    <select class="form-select rounded-5 bg-transparent border-0 text-white-50 p-3 ps-5 rounded-start" id="basicSearchcategory" style="width: 30%;">
                        <option value="0" class="text-black-50">All</option>
                        <?php

                        $category_rs = Database::search("SELECT * FROM `category` ORDER BY `category`");
                        $category_count = $category_rs->num_rows;

                        for ($x = 0; $x < $category_count; $x++) {

                            $category_data = $category_rs->fetch_assoc();

                        ?>
                            <optgroup>

                                <option class="text-dark fw-bold" value="<?php echo ($category_data["category_id"]); ?>"><?php echo ($category_data["category"]); ?></option>

                                <?php

                                // $subcat_rs = Database::search("SELECT * FROM `sub_category` WHERE `category_id`='" . $category_data["category_id"] . "' ORDER BY `sub_category`");
                                // $subcat_count = $subcat_rs->num_rows;

                                // for ($y = 0; $y < $subcat_count; $y++) {

                                //     $subcat_data = $subcat_rs->fetch_assoc();

                                ?>
                                    <!-- <option class="text-dark" value="<?php // echo ($subcat_data["sub_category_id"]); ?>"><?php // echo ($subcat_data["sub_category"]); ?></option> -->
                                <?php

                                // }

                                ?>

                            </optgroup>
                        <?php

                        }

                        ?>
                    </select>
                    <!-- <button class="btn btn-dark">Advanced</button> -->
                </div>
            </div>

            <!-- <div class="col-lg-2 col-12 d-grid mb-3 mb-lg-0">
                <button class="btn btn-primary rounded-5 text-uppercase rounded" type="button" onclick="basicSearch(0);">Search&nbsp;&nbsp;&nbsp;&nbsp;<i class="bi bi-search"></i></button>
            </div> -->

            <div class="col-lg-2 col-12 text-center">
                <a href="advancedSearch.php" class="fw-bold link-white text-decoration-none">Advanced</a>
            </div>

        </div>
    </div>
    <!-- Search -->

    <script src="script.js"></script>
</body>

</html>
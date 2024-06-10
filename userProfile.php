<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap3.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />

</head>

<body
    style="background-color: hsl(165, 40%, 80%); background-image: linear-gradient(90deg, hsl(274, 84%, 27%) 0%, hsl(254, 84%, 37%) 50%, hsl(225, 86%, 32%) 100%);">

    <div class="container-fluid vh-100 w-100">
        <div class="row">

            <!-- header -->
            <?php

            require "connection.php";

            session_start();

            if ($_SESSION["user"]) {

                include "header.php";


            } else if ($_SESSION["admin"]) {

                include "navbar.php";

            } else {
                header("Location:home.php");
            }

            ?>
            <!-- header -->

            <!-- content -->
            <div class="col-12 shadow p-3 px-lg-4">
                <div class="row">

                    <div class="col-12 my-3 rounded"
                        style="background-color: hsl(100, 80%, 45%); background-image: linear-gradient(90deg, hsl(104, 84%, 32%) 0%, hsl(180, 74%, 30%) 50%, hsl(245, 96%, 62%) 100%);">
                        <div class="row">

                            <div class="col-12 col-md-3 rounded border">
                                <div
                                    class="row g-3 d-flex flex-column text-center fw-bold align-content-center py-5 my-auto">

                                    <div class="offset-1 col-10">
                                        <img src="<?php echo ($path); ?>" class="rounded-circle"
                                            style="width: 93%; max-height: 400px; max-width: 350px;" id="viewImg" />
                                    </div>

                                    <div class="col-12">
                                        <span class="text-black fs-5">
                                            <?php echo ($fname . " " . $lname); ?>
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-black">
                                            <?php echo ($email); ?>
                                        </span>
                                    </div>

                                    <div class="offset-2 col-8 d-grid">
                                        <input type="file" id="profileImg" class="d-none" accept="image/*" />
                                        <label for="profileImg" class="btn btn-outline-light mt-3"
                                            onclick="changeProfileImage();">Select New Profile Image</label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="row justify-content-center g-2">

                                    <nav class="col-8">
                                        <div class="nav nav-pills row" id="nav-pill" role="tablist">
                                            <div class="col-6 d-grid">
                                                <button class="nav-link link-light active" id="nav-profile-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                                                    role="tab" aria-controls="nav-profile"
                                                    aria-selected="false">Personal Detail</button>
                                            </div>
                                            <div class="col-6 d-grid">
                                                <button class="nav-link link-light" id="nav-contact-tab"
                                                    data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
                                                    role="tab" aria-controls="nav-contact" aria-selected="false">Address
                                                    Information</button>
                                            </div>
                                        </div>
                                    </nav>

                                    <div class="tab-content col-12 p-3" id="nav-tabContent">

                                        <?php

                                        $user_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON user.gender_id=gender.gender_id INNER JOIN `country` ON user.country_id=country.country_id WHERE `email`='" . $email . "'");
                                        $user_data = $user_rs->fetch_assoc();

                                        $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `city` ON address.city_id=city.city_id INNER JOIN `district` ON city.district_id=district.district_id INNER JOIN `province` ON district.province_id=province.province_id  WHERE `user_email`='" . $email . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        ?>

                                        <div class="tab-pane row fade show active" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab" tabindex="0">
                                            <div class="col-12 mt-3 mb-3">
                                                <div class="row g-2">
                                                    <div class="col-6">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" id="fname" class="form-control"
                                                            value="<?php echo ($user_data["fname"]); ?>" />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" id="lname" class="form-control"
                                                            value="<?php echo ($user_data["lname"]); ?>" />
                                                    </div>

                                                    <div class="col-12">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control disabled" disabled
                                                            value="<?php echo ($email); ?>" />
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Password</label>
                                                        <div class="input-group">
                                                            <input type="password" class="form-control disabled"
                                                                disabled
                                                                value="<?php echo (strrev($user_data["password"])); ?>" />
                                                            <button class="btn btn-danger disabled" type="button"><i
                                                                    class="bi bi-eye-slash-fill"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Mobile</label>
                                                        <input type="text" id="mobile" class="form-control"
                                                            value="<?php echo ($user_data["mobile"]); ?>" />
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Registered Date & Time</label>
                                                        <input type="text" class="form-control disabled" disabled
                                                            value="<?php echo ($user_data["joined_date"]); ?>" />
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Gender</label>
                                                        <select class="form-select disabled" disabled>
                                                            <option>
                                                                <?php echo ($user_data["gender"]); ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade row" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab" tabindex="0">
                                            <div class="col-12 mt-3 mb-3">
                                                <div class="row g-2">
                                                    <div class="col-12">
                                                        <label class="form-label">Address Line 01</label>
                                                        <?php

                                                        if (!empty($address_data["line1"])) {
                                                            ?>
                                                            <input type="text" id="line1" class="form-control"
                                                                value="<?php echo ($address_data["line1"]); ?>" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <input type="text" id="line1" class="form-control" />
                                                            <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Address Line 02</label>
                                                        <?php

                                                        if (!empty($address_data["line2"])) {
                                                            ?>
                                                            <input type="text" id="line2" class="form-control"
                                                                value="<?php echo ($address_data["line2"]); ?>" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <input type="text" id="line2" class="form-control" />
                                                            <?php
                                                        }

                                                        ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Country</label>
                                                        <select class="form-select" id="country">
                                                            <?php

                                                            if (empty($address_data["cid"])) {
                                                                ?>
                                                                <option value="0">Select Country</option>
                                                                <?php
                                                            }

                                                            $country_rs = Database::search("SELECT * FROM `country`");
                                                            $country_count = $country_rs->num_rows;

                                                            for ($x = 0; $x < $country_count; $x++) {

                                                                $country_data = $country_rs->fetch_assoc();

                                                                ?>
                                                                <option value="<?php echo ($country_data['country_id']); ?>"
                                                                    <?php if (!empty($user_data["country_id"])) {
                                                                        if ($user_data["country_id"] == $country_data["country_id"]) { ?> selected <?php }
                                                                    } ?>><?php echo ($country_data["country"]); ?></option>
                                                                <?php

                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Province</label>
                                                        <select class="form-select" id="province">
                                                            <?php

                                                            if (empty($address_data["province_id"])) {
                                                                ?>
                                                                <option value="0">Select Province</option>
                                                                <?php
                                                            }

                                                            $province_rs = Database::search("SELECT * FROM `province`");
                                                            $province_count = $province_rs->num_rows;

                                                            for ($x = 0; $x < $province_count; $x++) {

                                                                $province_data = $province_rs->fetch_assoc();

                                                                ?>
                                                                <option
                                                                    value="<?php echo ($province_data['province_id']); ?>"
                                                                    <?php if (!empty($address_data["province_id"])) {
                                                                        if ($address_data["province_id"] == $province_data["province_id"]) { ?> selected <?php }
                                                                    } ?>><?php echo ($province_data["province"]); ?></option>
                                                                <?php

                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">District</label>
                                                        <select class="form-select" id="district">
                                                            <?php

                                                            if (empty($address_data["district_id"])) {
                                                                ?>
                                                                <option value="0">Select District</option>
                                                                <?php
                                                            }

                                                            $district_rs = Database::search("SELECT * FROM `district`");
                                                            $district_count = $district_rs->num_rows;

                                                            for ($x = 0; $x < $district_count; $x++) {

                                                                $district_data = $district_rs->fetch_assoc();

                                                                ?>
                                                                <option
                                                                    value="<?php echo ($district_data['district_id']); ?>"
                                                                    <?php if (!empty($address_data["district_id"])) {
                                                                        if ($address_data["district_id"] == $district_data["district_id"]) { ?> selected <?php }
                                                                    } ?>><?php echo ($district_data["district"]); ?></option>
                                                                <?php

                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">City</label>
                                                        <select class="form-select" id="city">
                                                            <?php

                                                            if (empty($address_data["district_id"])) {
                                                                ?>
                                                                <option value="0">Select City</option>
                                                                <?php
                                                            }

                                                            $city_rs = Database::search("SELECT * FROM `city`");
                                                            $city_count = $city_rs->num_rows;

                                                            for ($x = 0; $x < $city_count; $x++) {

                                                                $city_data = $city_rs->fetch_assoc();

                                                                ?>
                                                                <option value="<?php echo ($city_data['city_id']); ?>" <?php if (!empty($address_data["city_id"])) {
                                                                       if ($address_data["city_id"] == $city_data["city_id"]) { ?> selected <?php }
                                                                   } ?>><?php echo ($city_data["city"]); ?></option>
                                                                <?php

                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="form-label">Postal Code</label>
                                                        <?php

                                                        if (!empty($address_data["postal_code"])) {
                                                            ?>
                                                            <input type="text" id="pcode" class="form-control"
                                                                value="<?php echo ($address_data["postal_code"]); ?>" />
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <input type="text" id="pcode" class="form-control" />
                                                            <?php
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-10 d-grid mt-3">
                                        <button class="btn btn-primary" onclick="updateProfile();">Update
                                            Profile</button>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-md-3 d-none text-center border rounded d-md-block overflow-hidden">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <img class="rounded w-100" src="resources/logo/HS logo black png.png " />
                                    </div>
                                    <div class="col-12">
                                        <span class="fs-4">
                                            <?php echo ($fname . " " . $lname); ?>
                                        </span>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <span class="fs-5">
                                            <?php echo ($email); ?>
                                        </span>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="row g-3 gap-1 justify-content-center">
                                            <div class="col-10 col-lg-5 d-grid">
                                                <button class="btn btn-secondary"
                                                    onclick="window.location = 'recents.php'">Recents</button>
                                            </div>
                                            <div class="col-10 col-lg-5 d-grid">
                                                <button class="btn btn-secondary"
                                                    onclick="window.location = 'watchList.php'" ;>Watch List</button>
                                            </div>
                                            <div class="col-10 col-lg-10 d-grid">
                                                <button class="btn btn-danger">Payment Methods</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- content -->

            <hr />

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
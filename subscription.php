<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal Payment</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />

</head>

<body
    style="background-color: hsl(165, 40%, 80%); background-image: linear-gradient(90deg, hsl(274, 84%, 27%) 0%, hsl(254, 84%, 37%) 50%, hsl(225, 86%, 32%) 100%);">

    <div class="container-fluid d-flex flex-column">
        <div class="row justify-content-center align-items-center">

            <?php

            require "connection.php";

            session_start();

            include "header.php";

            if (isset($_SESSION["user"])) {

                $data = $_SESSION["user"];
                $umail = $data["email"];

                $condition;

                $shs_rs = Database::search("SELECT * FROM `user_has_subscription` WHERE `user_email`='" . $umail . "'");
                $shs_count = $shs_rs->num_rows;

                if ($shs_count == 0) {
                    $condition = false;
                } else {
                    $shs_data = $shs_rs->fetch_assoc();
                    $end_date = $shs_data["validity"];

                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $today = $d->format("Y-m-d");

                    if (strtotime($today) > strtotime($end_date)) {
                        Database::search("DELETE FROM `user_has_subscription` WHERE  `user_has_subscription_id`='" . $shs_data["user_has_subscription_id"] . "'");

                        $condition = false;
                    } else {
                        $condition = true;
                    }
                }

                if ($condition) {
                    ?>
                    <script>
                        window.onload = function () {
                            window.location = "home.php";
                        }
                    </script>
                    <?php
                } else {

                    ?>

                    <div class="col-12 text-center p-3">
                        <h1 class="text-warning">Subscription</h1>
                    </div>

                    <div class="col-12 col-lg-11 p-3 p-lg-4 px-4">
                        <div class="row justify-content-center">
                            <div class="col-12 p-3 p-lg-4 mt-lg-3 mb-lg-3 rounded-3 py-5 bg-body">
                                <div class="row justify-content-center">

                                    <?php

                                    $subscription_rs = Database::search("SELECT * FROM `subscription`");
                                    $subscription_data = $subscription_rs->fetch_assoc();

                                    ?>

                                    <div class="col-12 col-lg-10 text-center text-capitalize border-bottom pb-2 mb-3">
                                        <span
                                            class="fs-1 text-black-50 fw-bold"><?php echo ($data["fname"] . " " . $data["lname"]); ?></span>
                                    </div>
                                    <div class="col-12 text-center col-lg-6 mt-3 mb-3">
                                        <span class="fs-4 fw-bold">Subscription:
                                            <?php echo ($subscription_data["subscription"]); ?></span>
                                    </div>
                                    <div class="col-12 text-center col-lg-6 mt-3 mb-3">
                                        <span class="fs-4 fw-bold">Value: Rs. <?php echo ($subscription_data["value"]); ?>
                                            .00</span>
                                    </div>

                                    <div class="col-12 col-lg-10 text-center border-top fs-5 mt-3 mb-3 p-2">
                                        <span class="text-info fw-bold">Date: <?php echo (date("Y-m-d")); ?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-11 col-lg-6 p-3">
                        <div class="row justify-content-center">
                            <button class="p-3 btn btn-success" onclick="payModelOpen();">Pay
                                Now</button>
                            <!-- <button class="p-3 btn btn-success" onclick="payNow('<?php echo ($data['email']); ?>')">Pay
                                Now</button> -->
                        </div>
                    </div>

                    <?php

                }

            } else {
                ?>
                <script>
                    window.onload = function () {
                        window.location = "home.php";
                    }
                </script>
                <?php
            }

            ?>

        </div>
    </div>

    <!-- Model -->
    <div class="modal fade" tabindex="-1" id="paymentGetwayModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="row">
                            <h5 class="text-danger  text-start ms3 mb-2" id="msg"></h5>
                        </div>


                        <div class="col-12">
                            <lable class="form-lable">Card Holder</lable>
                            <div class="input-group mb-3">
                                <input class="form-control text-black-50 text-center" type="text" id="ch" />
                            </div>
                        </div>

                        <div class="col-12">
                            <lable class="form-lable">Card Number</lable>
                            <div class="input-group mb-3">
                                <input class="form-control text-black-50 text-center" type="text" id="cn" />
                            </div>
                        </div>

                        <div class="col-12">
                            <lable class="form-lable">Expire Date</lable>
                            <div class="input-group mb-3">
                                <input class="form-control text-black-50 text-center" type="text" id="ed" />
                            </div>
                        </div>

                        <div class="col-12">
                            <lable class="form-lable">CVC</lable>
                            <div class="input-group mb-3">
                                <input class="form-control text-black-50 text-center" type="text" id="cvc" />
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning"
                        onclick="payNow('<?php echo ($data['email']); ?>');">Pay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Model -->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" /> <!-- <link rel="stylesheet" href="bootstrap-icons.css" /> -->

    <link rel="icon" href="resources/logo/HS logo black png.png" type="image/svg" />
</head>

<body>

    <div class="container-fluid vh-100 w-100">
        <div class="row">

            <!-- header -->
            <?php include "header.php"; ?>
            <!-- header -->

            <!-- nav -->
            <?php include "navbar.php"; ?>
            <!-- nav -->

            <!-- content -->
            <div class="col-12 pt-3">
                <nav aria-label="breadcrumb">
                    <div class="breadcrumb">
                        <a href="home.php" class="breadcrumb-item fw-bold">Home</a>
                        <a href="#" aria-current="page" class="breadcrumb-item fw-bold active">Cart</a>
                    </div>
                </nav>
            </div>

            <div class="col-12 border border-1 border-secondary rounded mb-3">
                <div class="row">

                    <div class="col-12">
                        <label class="fs-1 fw-bolder text-black-50">Cart <i class="fs-1 bi bi-cart-fill text-black-50"></i></label>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                <input type="text" class="form-control" placeholder="Search in Cart ..." />
                            </div>
                            <div class="col-12 col-lg-2 d-grid mb-3">
                                <button class="btn btn-primary" onclick="cartSearch(0);">Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>

                    <!-- empty view -->
                    <div class="col-12" id="emptyCart">
                        <div class="row">
                            <div class="col-12 emptyCart"></div>
                            <div class="col-12 text-center">
                                <label class="form-label fs-1 fw-bold">You have no items in your Cart yet.</label>
                            </div>
                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                <a href="home.php" class="btn btn-outline-warning fs-3 fw-bold">Start Shopping</a>
                            </div>
                        </div>
                    </div>
                    <!-- empty view -->

                    <!-- products -->
                    <div class="col-12 col-lg-9 d-none" id="haveProduct">
                        <div class="row">

                            <div class="card mb-3 mx-0 col-12">
                                <div class="row g-0">
                                    <div class="col-md-12 mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="fw-bold text-black-50 fs-5">Seller :</span>&nbsp;
                                                <span class="fw-bold text-black fs-5">Horizon CSR</span>&nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-4">

                                        <img src="resources/item_img/iphone14.jpg" onclick="viewProduct(0);" class="img-fluid rounded-start" style="max-width: 200px;">
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card-body">

                                            <h3 class="card-title">Apple iPhone 14</h3>

                                            <span class="fw-bold text-black-50">Colour : Phanthom Blue</span> &nbsp; |

                                            &nbsp; <span class="fw-bold text-black-50">Condition : Brand New</span>
                                            <br>
                                            <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                            <span class="fw-bold text-black fs-5">Rs. 420000 .00</span>
                                            <br>
                                            <span class="fw-bold text-black-50 fs-5">Quantity :</span>&nbsp;
                                            <input type="number" class="mt-3 border border-2 border-secondary fs-4 fw-bold px-3 cardqtytext" value="1" min="0">
                                            <br><br>
                                            <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                            <span class="fw-bold text-black fs-5">Rs.250.00</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-body d-grid">
                                            <a class="btn btn-outline-success mb-2" onclick="playNow(0);">Play Now</a>
                                            <a class="btn btn-outline-danger mb-2" onclick="removeFromCart(0);">Remove</a>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-12 mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-6 col-md-6">
                                                <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                            </div>
                                            <div class="col-6 col-md-6 text-end">
                                                <span class="fw-bold fs-5 text-black-50">Rs. 420000 .00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- products -->

                    <!-- summary -->
                    <div class="col-12 col-lg-3 d-none" id="haveSummary">
                        <div class="row">

                            <div class="col-12">
                                <label class="form-label fs-3 fw-bold">Summary</label>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-6 mb-3">
                                <span class="fs-6 fw-bold">items (1)</span>
                            </div>

                            <div class="col-6 text-end mb-3">
                                <span class="fs-6 fw-bold">Rs. 420000 .00</span>
                            </div>

                            <div class="col-6">
                                <span class="fs-6 fw-bold">Shipping</span>
                            </div>

                            <div class="col-6 text-end">
                                <span class="fs-6 fw-bold">Rs. 250 .00</span>
                            </div>

                            <div class="col-12 mt-3">
                                <hr />
                            </div>

                            <div class="col-6 mt-2">
                                <span class="fs-4 fw-bold">Total</span>
                            </div>

                            <div class="col-6 mt-2 text-end">
                                <span class="fs-4 fw-bold">Rs. 420250 .00</span>
                            </div>

                            <div class="col-12 mt-3 mb-3 d-grid">
                                <button class="btn btn-primary fs-5 fw-bold" onclick="payOut();">PayOut</button>
                            </div>

                        </div>
                    </div>
                    <!-- summary -->

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Purchase History | Horizon CSR</title>

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

            <!-- content -->
            <div class="col-12 text-center mb-2 border-top rounded rounded-3">
                <span class="fs-1 text-primary fw-bold">Purchase History</span>
            </div>
            
            <!-- nav -->
            <?php include "navbar.php"; ?>
            <!-- nav -->

            <div class="col-12 mt-4">
                <div class="row">

                    <div class="col-12 d-none d-lg-block">
                        <!-- Head -->
                        <div class="row">

                            <div class="col-1 bg-light">
                                <label class="form-label fw-bold">#</label>
                            </div>
                            <div class="col-3 bg-light">
                                <label class="form-label fw-bold">Order Detail</label>
                            </div>
                            <div class="col-1 bg-light">
                                <label class="form-label fw-bold">Quantity</label>
                            </div>
                            <div class="col-2 bg-light">
                                <label class="form-label fw-bold">Amount</label>
                            </div>
                            <div class="col-2 bg-light">
                                <label class="form-label fw-bold">Purchased Date & Time</label>
                            </div>
                            <div class="col-3 bg-light"></div>

                            <div class="col-12">
                                <hr />
                            </div>

                        </div>
                        <!-- Head -->
                    </div>

                    <div class="col-12">

                        <!-- Row -->
                        <div class="row px-2">

                            <div class="col-12 col-lg-1 bg-dark text-center text-lg-start rounded rounded-4">
                                <label class="form-label text-white-50 fs-5 mt-3 py-5">000001</label>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="card mx-0 m-lg-3 my-3" onclick="viewProduct(0);" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="resources/item_img/iphone14.jpg" class="img-fluid p-2 rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <p class="card-title fw-bold fs-5">iPhone 14</p>
                                                <span class="card-text fw-bold">Seller : </span>
                                                <span class="card-text text-black-50">Horizon CSR</span><br/>
                                                <span class="card-text fw-bold">Price : </span>
                                                <span class="card-text text-black-50">Rs. 420000 .00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-1 text-center">
                                <label class="form-label fs-4 mt-3 py-5">1</label>
                            </div>
                            <div class="col-12 col-lg-2 text-center bg-secondary rounded rounded-4 text-lg-end">
                                <label class="form-label text-white-50 fs-5 mt-3 py-5">Rs. 420000 .00</label>
                            </div>
                            <div class="col-12 col-lg-2 text-center text-lg-end">
                                <label class="form-label fs-5 mt-3 py-5">28-10-2022 00:00:00</label>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-6 d-grid mt-2">
                                        <button class="btn btn-warning border border-1 border-primary fs-5 rounded mt-5" onclick="feedback();">
                                            <i class="bi fs-5 bi-info-circle-fill"></i> Feedback
                                        </button>
                                    </div>
                                    <div class="col-6 d-grid mt-2">
                                        <button class="btn btn-danger fs-5 rounded mt-5" onclick="deleteHistory();">
                                            <i class="bi fs-5 bi-trash3-fill"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr/>
                            </div>

                        </div>
                        <!-- Row -->

                    </div>

                    <div class="col-12">
                        <hr/>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="offset-lg-10 col-12 col-lg-2 d-grid mb-3">
                                <button class="btn btn-danger" onclick="deleteAllHistory();
                                "><i class="bi bi-trash3-fill"></i> Delete All Records</button>
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
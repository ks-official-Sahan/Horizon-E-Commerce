<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advance Search | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" /> <!-- <link rel="stylesheet" href="bootstrap-icons.css" /> -->

    <link rel="icon" href="resources/logo/HS logo black png.png" type="image/svg" />
</head>

<body class="bg-info">

    <div class="container-fluid vh-100 w-100">
        <div class="row">

            <!-- header -->
            <?php include "header.php"; ?>
            <!-- header -->

            <!-- nav -->
            <?php // include "navbar.php"; ?>
            <!-- nav -->

            <!-- content -->

            <!-- Head -->
            <div class="col-12 bg-body mt-1 mb-2">
                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4">
                        <div class="row g-3">
                            <div class="col-3">
                                <img src="resources/logo/HS logo black png.png " class="p-2 my-3" style="height: 50px;">
                            </div>
                            <div class="col-9 text-center">
                                <p class="fs-1 text-black-50 fw-bold mt-1 pt-2">Advanced Search</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Head -->

            <!-- Filters -->
            <div class="col-12 offset-lg-2 col-lg-8 mb-2 bg-body rounded">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 mt-3 mb-3">
                        <div class="row">

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12 col-lg-10">
                                        <input type="text" placeholder="Enter keyword to Search .." class="form-control" />
                                    </div>
                                    <div class="col-12 col-lg-2 d-grid">
                                        <button class="btn btn-primary" onclick="advancedSearch(0);">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border border-2 rounded border-primary" />
                            </div>

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <select class="form-select">
                                            <option value="0">Select Category</option>
                                            <option>Analogue Electronics</option>
                                            <option>Computer Electronics</option>
                                            <option>Digital Electronics</option>
                                            <option>Phone & Accessories</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <select class="form-select">
                                            <option value="0">Select Brand</option>
                                            <option>Apple</option>
                                            <option>Samsung</option>
                                            <option>UGreen</option>
                                            <option>Panasonic</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <select class="form-select">
                                            <option value="0">Select Model</option>
                                            <option>iPhone 14</option>
                                            <option>iPhone 14 Pro</option>
                                            <option>Note 10</option>
                                            <option>Note 20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <select class="form-select">
                                            <option value="0">Select Condition</option>
                                            <option>Brand New</option>
                                            <option>New</option>
                                            <option>Used</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <select class="form-select">
                                            <option value="0">Select Colour</option>
                                            <option>Rose Gold</option>
                                            <option>Phanthom Blue</option>
                                            <option>Graphite Black</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Price From" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <input type="text" class="form-control" placeholder="Price To" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 offset-lg-2 col-lg-8 rounded mb-2 bg-body">
                <div class="row">
                    <div class="offset-4 col-8 offset-lg-6 col-lg-6 mb-2 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <select class="form-select shadow-none border border-2 border-primary border-start-0 border-top-0 border-end-0">
                                    <option value="0">SORT BY</option>
                                    <option value="1">PRICE HIGH TO LOW</option>
                                    <option value="2">PRICE LOW TO HIGH</option>
                                    <option value="3">QUANTITY HIGH TO LOW</option>
                                    <option value="4">QUANTITY LOW TO HIGH</option>
                                    <option value="5">TIME NEW TO OLD</option>
                                    <option value="6">TIME OLD TO NEW</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Filters -->

            <!-- Products & Results -->
            <div class="col-12 offset-lg-2 col-lg-8 rounded mb-2 bg-body">
                <div class="row">
                    <div class="col-12 offset-lg-1 col-lg-10 mb-2 mt-2 text-center">

                        <div class="row justify-content-center" id="result-body-1">
                            <div class="col-12 mt-3 mb-4">
                                <span class="h2 text-black-50"><i class="bi bi-search" style="font-size: 100px;"></i></span>
                            </div>
                            <div class="col-12 mb-4">
                                <span class="h2 text-black-50">No Items Searched Yet ...</span>
                            </div>
                        </div>

                        <div class="row justify-content-center d-none" id="result-body-2">

                            <!-- Cards -->
                            <div class="card mb-3 mt-3 col-12 col-lg-6">
                                <div class="row">
                                    <div class="col-md-4 mt-4" onclick="viewProduct(0);">
                                        <img src="resources/item_img/iphone14.jpg" class="img-fluid rounded-start my-1" alt="..." style="height: 100px;" />
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">iPhone 14</h5>
                                            <span class="card-text text-primary fw-bold">USD 699</span>
                                            <br />
                                            <span class="card-text text-success fw-bold fs">10 Items Left</span>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-1">
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="btn btn-success fs" onclick="playNow(0);">Play Now</button>
                                                        </div>
                                                        <div class="col-12 col-lg-6 d-grid">
                                                            <button class="btn btn-danger fs" onclick="addToCart(0);"><i class="bi bi-cart" style="font-size: 15px;"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Cards -->

                            <!-- Pagination -->
                            <div>
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
            <!-- Products & Results -->

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
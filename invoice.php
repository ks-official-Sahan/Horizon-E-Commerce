<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />


</head>

<body>

    <div class="container-fluid home">
        <div class="row">

            <!-- Header -->
            <?php

            session_start();
            require "connection.php";

            include "header.php" ?>
            <!-- Header -->

            <!-- Content -->
            <div class="col-12">
                <div class="row px-2">

                    <div class="col-12 mt-3 border rounded-4 mb-3 bg-body bg-opacity-50">
                        <div class="row px-3">

                            <div class="col-12 text-center mb-2 border-bottom rounded rounded-3">
                                <span class="fs-1 text-success fw-bold">Invoice</span>
                            </div>

                            <div class="col-12 btn-toolbar justify-content-end mt-3">
                                <button class="btn btn-dark me-2" onclick="print();"><i class="bi bi-printer-fill"></i>
                                    Print</button>
                                <button class="btn btn-danger me-2" onclick="exportPDF();"><i
                                        class="bi bi-filetype-pdf"></i> Export as PDF</button>
                            </div>

                            <div class="col-12">
                                <hr />
                            </div>

                            <div class="col-12" id="page">
                                <div class="row">

                                    <div class="col-6 p-1">
                                        <div class="ms-2 invoiceHeaderImage"></div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row justify-content-end">
                                            <div class="col-12 text-primary text-uppercase text-end">
                                                <h2 class="fw-bold">Horizon CSR</h2>
                                            </div>
                                            <div class="col-12 fw-bold text-end">
                                                <span>Maradaana, Colombo 10, Sri Lanka</span><br />
                                                <span>+94 112 222000</span><br />
                                                <span>newtech@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border border-1 border-primary" />
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="fw-bold">INVOICE TO</h5>
                                                <h2>Horizon</h2>
                                                <span>Horizon, Tangalle</span><br />
                                                <span>horizon.csr.official@gmail.com</span>
                                            </div>
                                            <div class="col-6 text-end">
                                                <h1 class="text-primary">INVOICE 03</h1>
                                                <span>Date & Date of Invoice : </span><br />
                                                <span>27-06-2024 00:00:00</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped-columns align-middle">

                                                <thead>
                                                    <tr class="border border-1 border-secondary">
                                                        <th>#</th>
                                                        <th>Order ID & Product</th>
                                                        <th class="text-end">Unit Price</th>
                                                        <th class="text-end">Date</th>
                                                        <th class="text-end">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="height: 72px;">
                                                        <td class="bg-primary text-white fs-3">01</td>
                                                        <td>
                                                            <span
                                                                class="fw-bold text-primary text-decoration-underline p-2">1</span><br />
                                                            <span class="fw-bold text-primary fs-4 p-2">Month
                                                                Subscription</span>
                                                        </td>
                                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">
                                                            Rs. 2000 .00</td>
                                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">
                                                            2024/06/27</td>
                                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">
                                                            Rs. 2000 .00</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="border-0"></td>
                                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                                        <td class="text-end">Rs. 2000 .00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="border-0"></td>
                                                        <td class="fs-5 text-end fw-bold border-primary text-primary">
                                                            GRAND TOTAL</td>
                                                        <td class="text-end border-primary text-primary">Rs. 2000 .00
                                                        </td>
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-6 text-center" style="margin-top: -100px;">
                                        <span class="fs-1 text-success fw-bold">Thank You! Enjoy your
                                            Subscription!</span>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border border-1 border-primary" />
                                    </div>

                                    <div class="col-12 text-center mb-3">
                                        <label class="form-label fs-5 text-black-50 fw-bold">
                                            Invoice was created on a computer and is valid without the Signature and
                                            Seal.
                                        </label>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Content -->

            <!-- Footer -->
            <?php include "footer.php" ?>
            <!-- Footer -->

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
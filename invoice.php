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

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png"  type="image/x-icon" />


</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Header -->
            <?php include "header.php" ?>
            <!-- Header -->

            <!-- Navbar -->
            <?php include "navbar.php" ?>
            <!-- Navbar -->

            <!-- Content -->
            <div class="col-12">
                <div class="row px-2">

                    <div class="col-12 mt-3 border rounded-4 mb-3 bg-body">
                        <div class="row px-3">

                            <div class="col-12 text-center mb-2 border-bottom rounded rounded-3">
                                <span class="fs-1 text-success fw-bold">Invoice</span>
                            </div>

                            <div class="col-12 btn-toolbar justify-content-end mt-3">
                                <button class="btn btn-dark me-2" onclick="print();"><i class="bi bi-printer-fill"></i> Print</button>
                                <button class="btn btn-danger me-2" onclick="exportPDF();"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
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
                                                <h1 class="text-primary">INVOICE 01</h1>
                                                <span>Date & Date of Invoice : </span><br />
                                                <span>28-10-2022 00:00:00</span>
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
                                                        <th class="text-end">Quantity</th>
                                                        <th class="text-end">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="height: 72px;">
                                                        <td class="bg-primary text-white fs-3">01</td>
                                                        <td>
                                                            <span class="fw-bold text-primary text-decoration-underline p-2">0000001</span><br />
                                                            <span class="fw-bold text-primary fs-4 p-2">Apple iPhone 14</span>
                                                        </td>
                                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">Rs. 420000 .00</td>
                                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">01</td>
                                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">Rs. 420000 .00</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="border-0"></td>
                                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                                        <td class="text-end">Rs. 420000 .00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="border-0"></td>
                                                        <td class="fs-5 text-end fw-bold border-primary">Delivery Fee</td>
                                                        <td class="text-end border-primary">Rs. 350 .00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="border-0"></td>
                                                        <td class="fs-5 text-end fw-bold border-primary text-primary">GRAND TOTAL</td>
                                                        <td class="text-end border-primary text-primary">Rs. 420350 .00</td>
                                                    </tr>
                                                </tfoot>

                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-6 text-center" style="margin-top: -100px;">
                                        <span class="fs-1 text-success fw-bold">Thank You !</span>
                                    </div>

                                    <div class="col-12 border-5 border-start border-primary my-3 rounded" style="background-color: #E7F2FF;">
                                        <div class="row">
                                            <div class="col-12 my-3">
                                                <label class="form-label fw-bold fs-5">NOTICE</label><br />
                                                <label class="form-label fs-6">Purchased items can returned before 14 days of delivery</label><br />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr class="border border-1 border-primary" />
                                    </div>

                                    <div class="col-12 text-center mb-3">
                                        <label class="form-label fs-5 text-black-50 fw-bold">
                                            Invoice was created on a computer and is valid without the Signature and Seal.
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
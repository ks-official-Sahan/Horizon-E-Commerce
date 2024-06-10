<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- Filter -->
    <div class="col-11 col-lg-2 mx-auto mx-lg-3 my-3 border border-secondary rounded">
        <div class="row">
            <div class="col-12 mt-3 fs-3">
                <div class="row">
                    <div class="col-12">
                        <label class="form-label fw-bold fs-3">Sort Products</label>
                    </div>
                    <div class="col-11">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" placeholder="Search..." id="search" class="form-control" />
                            </div>
                            <div class="col-1 p-1">
                                <label class="form-label"><i class="bi bi-search fs-5"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Active Time</label>
                    </div>
                    <div class="col-12">
                        <hr style="width: 80%;" />
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r1" id="n">
                            <label class="form-check-label" for="n">
                                Newest to Oldest
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r1" id="o">
                            <label class="form-check-label" for="o">
                                Oldest to Newest
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">By Quantity</label>
                    </div>
                    <div class="col-12">
                        <hr style="width: 80%;" />
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r2" id="h">
                            <label class="form-check-label" for="h">
                                High to Low
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r2" id="l">
                            <label class="form-check-label" for="l">
                                Low to High
                            </label>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <label class="form-label">By Condition</label>
                    </div>
                    <div class="col-12">
                        <hr style="width: 80%;" />
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r3" id="b">
                            <label class="form-check-label" for="b">
                                Brand New
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r3" id="u">
                            <label class="form-check-label" for="u">
                                Used
                            </label>
                        </div>
                    </div>
                    <div class="col-12 text-center mt-3 mb-3">
                        <div class="row g-2">
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-success fw-bold" onclick="sort1(0);">Sort</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary fw-bold" onclick="clearSort1()">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Filter -->

    <script src="script.js"></script>
</body>

</html>
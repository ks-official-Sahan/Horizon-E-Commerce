<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Horizon CSR</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="shortcut icon" href="resources/logo/HS logo black png.png" type="image/x-icon" />

</head>

<?php

require "bg-color.php";

$result = bgColor::setDefaultColor();

$color0 = "151, 90%, 36%";
$color1 = "223, 97%, 34%";
$color2 = "150, 96%, 32%";
$angle0 = "90";
$result1 = bgColor::setColorMain($angle0, $color0, $color1, $color2);

$angle1 = "90";
$color3 = "320, 96%, 32%, 75%";
$color4 = "223, 97%, 34%, 75%";
$color5 = "151, 90%, 36%, 75%";
$result2 = bgColor::setColorMain($angle1, $color3, $color4, $color5);

?>

<body class="mainBody bg-light" onload="intro();" style="<?php echo ($result1); ?>">

    <?php

    session_start();

    require "connection.php";

    if (isset($_SESSION["user"])) {

        header("Location:home.php");
    } else if (isset($_SESSION["admin"])) {

        header("Location:adminPanel.php");
    } else {

    ?>


        <div class="container-fluid vh-100 d-flex justify-content-center containBox" style="<?php echo ($result); ?>" id="containBox">
            <div class="row g-2 align-content-center">

                <!-- Header -->
                <div class="col-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="logo height100"></div>
                            <p class="fw-bold title0 text-center text-black">Welcome to Horizon CSR</p>
                        </div>

                    </div>
                </div>
                <!-- Header -->

                <!-- Navigator -->
                <div class="col-12 p-3 mb-5" id="navigator">
                    <div class="row justify-content-center">
                        <div class="col-11 text-center mb-4 text-white intro">
                            Access to the best online streames are on your palm
                        </div>
                    </div>
                    <div class="row g-2 justify-content-center mt-3">
                        <div class="col-lg-5 col-11 d-grid">
                            <span class="btn btn-primary rounded-5 text-white fw-bold" style="letter-spacing: 0.2rem;" onclick="showSignUp();">Sign Up</span>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-11 d-grid">
                            <span class="btn btn-primary rounded-5 text-white fw-bold" style="letter-spacing: 0.2rem;" onclick="showSignIn();">Sign In</span>
                        </div>
                        <div class="col-lg-7 col-11 d-grid mt-4 mb-5">
                            <span class="btn btn-secondary rounded-5" onclick="visitAsGuest();" style="letter-spacing: 0.2rem;">Visit as a <i class="text-uppercase text-warning fw-bold">Guest</i></span>
                        </div>
                        <div class="col-lg-7 col-11 d-grid mt-5 rounded rounded-5 px-5">
                            <span class="btn btn-outline-danger fs-5 fw-bold border-0 text-uppercase rounded rounded-5 adminSignInBtn" onclick="showAdminSignIn();">Admin Sign In</span>
                        </div>
                    </div>
                </div>
                <!-- Navigator -->

                <!-- Content -->
                <div class="col-12 p-2">
                    <div class="row g2">

                        <!-- cover -->
                        <div class="col-lg-5 d-none d-lg-block cover"></div>
                        <!-- cover -->

                        <!-- Sign Up -->
                        <div class="col-lg-7 col-12 d-none pb-5 text-white pe-5" id="signUp">
                            <div class="row g-1 mb-3">

                                <div class="col-12 mb-2">
                                    <h1 class="fw-bold text-danger text-lg-start text-center"><button class="btn btn-danger" onclick="signUp2Welcome();">&larr;</button>&nbsp; Sign Up Portal</h1>
                                </div>

                                <!-- alert box -->
                                <div class="col-12 px-2 py-2 d-none rounded rounded-4" id="alertDiv1" style="margin-top: -10px;">
                                    <div class="bg-warning text-center text-danger fs-5 rounded rounded-4" id="msgDiv1">
                                    </div>
                                </div>
                                <!-- alert box -->

                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <!-- <input type="text" class="form-control" id="email" placeholder="eg: username@domain.com" /> -->
                                    <input type="text" class="form-control" id="email" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" />
                                        <button class="btn btn-primary" type="button" onclick="showPasswordUp();" id="show"><i class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label class="form-label">Mobile</label>
                                    <div class="input-group">
                                        <div class="col-4">
                                            <select class="form-select bg-primary text-start w-100 overflow-scroll" id="country">
                                                <!-- <optgroup label="Allowed Countries" class="w-100"> -->
                                                <?php

                                                $country_rs = Database::search("SELECT * FROM `country` ORDER BY `country`");
                                                $country_count = $country_rs->num_rows;

                                                for ($x = 0; $x < $country_count; $x++) {
                                                    $country_data = $country_rs->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo ($country_data["country_id"]); ?>" <?php if ($country_data["country"] == "Sri Lanka") {
                                                                                                                    ?> selected <?php
                                                                                                                    } ?>>
                                                        <?php echo ($country_data["code"] . " (" . $country_data["country"] . ")"); ?>
                                                    </option>
                                                <?php

                                                }

                                                ?>
                                                <!-- </optgroup> -->
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="mobile" placeholder="eg: 7xxxxxxxx" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" id="gender">
                                        <option value="0" disabled selected>Select Gender</option>
                                        <?php

                                        $gender_rs = Database::search("SELECT * FROM `gender` ORDER BY `gender`");
                                        $gender_count = $gender_rs->num_rows;

                                        for ($x = 0; $x < $gender_count; $x++) {
                                            $gender_data = $gender_rs->fetch_assoc();

                                        ?>
                                            <option value="<?php echo ($gender_data["gender_id"]); ?>"><?php echo ($gender_data["gender"]); ?></option>
                                        <?php

                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 mt-4 mb-3">
                                    <div class="row g-2">

                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-success" onclick="signUp();">Sign Up</button>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-dark" onclick="changeView();">Have an Account? Sign In</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Sign Up -->

                        <!-- Sign In -->
                        <div class="col-lg-6 col-12 d-none text-white" id="signIn">
                            <div class="row g-2">

                                <div class="col-12 mb-2">
                                    <h1 class="fw-bold text-danger text-lg-start text-center"><button class="btn btn-danger" onclick="signIn2Welcome();">&larr;</button>&nbsp; Sign In Portal</h1>
                                </div>

                                <!-- alert box -->
                                <div class="col-12 px-2 py-2 d-none rounded rounded-4" id="alertDiv2" style="margin-top: -10px;">
                                    <div class="bg-warning text-center text-danger fs-5 rounded rounded-2" id="msgDiv2">
                                    </div>
                                </div>
                                <!-- alert box -->

                                <?php

                                $email = "";
                                $password = "";
                                $remember = "";

                                if (isset($_COOKIE["email"])) {

                                    $email = $_COOKIE["email"];
                                    $remember = "true";
                                }

                                if (isset($_COOKIE["password"])) {

                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" id="username" value="<?php echo ($email); ?>" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="passwordIn" value="<?php echo ($password); ?>" />
                                        <button class="btn btn-primary" type="button" onclick="showPasswordIn();" id="showIn"><i class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" <?php if ($remember == "true") {
                                                                                                        ?> checked <?php
                                                                                                                } ?> />
                                        <label class="form-check-label">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="link-danger text-decoration-none text-end fw-bold" onclick="forgotUserPassword();">Forgot Password?</a>
                                </div>

                                <div class="col-12 col-lg-6 d-grid my-2">
                                    <button class="btn btn-success" onclick="signIn();">Sign In</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid my-2">
                                    <button class="btn btn-dark" onclick="changeView();">New User? Join Now</button>
                                </div>

                            </div>
                        </div>
                        <!-- Sign In -->

                        <!-- Admin Sign In -->
                        <div class="col-lg-6 col-12 d-none" id="adminSignIn">
                            <div class="row g-2 justify-content-center">

                                <div class="col-12 mb-2" id="titleDiv">
                                    <h1 class="fw-bold text-danger text-lg-start text-center">Admin Sign In Portal</h1>
                                </div>

                                <!-- alert box -->
                                <div class="col-12 px-2 py-2 d-none rounded rounded-4" id="alertDiv3" style="margin-top: -10px;">
                                    <div class="bg-warning text-center text-danger fs-5 rounded rounded-2" id="msgDiv3">
                                    </div>
                                </div>
                                <!-- alert box -->

                                <div class="col-12" id="adminField">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label class="form-label">Email</label>
                                            <input type="email" id="admin" class="form-control" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" id="mobileAdmin" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-3" id="vcodeDiv">
                                    <label class="form-label">Verification Code</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control w-75" id="vcode" disabled />
                                        <button class="btn btn-primary w-25" type="button" id="sendbtn" onclick="sendVerificationAdmin();"><i class="bi bi-send-fill"></i> Send</button>
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="passwordAdmin" />
                                        <button class="btn btn-primary" type="button" onclick="showAdminPassword();" id="showAdmin"><i class="bi bi-eye-slash-fill"></i></button>
                                    </div>
                                </div> -->

                                <!-- <div class="col-12">
                                    <a href="#" class="link-primary text-decoration-none text-end fw-bold" onclick="forgotAdminPassword();">Forgot Password?</a>
                                </div> -->

                                <div class="col-12 col-lg-6 d-grid my-2 d-none" id="adminbtn">
                                    <button class="btn btn-success" onclick="adminSignIn();">Sign In As Admin</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid my-2">
                                    <button class="btn btn-dark" onclick="back2WelcomeAdmin();">Back to Welcome Page</button>
                                </div>

                            </div>
                        </div>
                        <!-- Admin Sign In -->

                    </div>
                </div>
                <!-- Content -->

                <!-- Forgot Password Modal -->
                <div class="modal" tabindex="-1" id="forgotPasswordUserModal">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content" style="background-image: linear-gradient(90deg, hsl(151, 70%, 56%) 0%, hsl(223, 67%, 44%) 50%, hsl(253, 46%, 32%) 100%);">
                            <div class="modal-header shadow px-3">
                                <h5 class="modal-title text-uppercase text-primary fs-3">Reset User Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-3 pt-5 mb-3 pe-5">

                                <div class="row g-3 text-white justify-content-center pt-3 pe-4 ps-3">

                                    <!-- alert box -->
                                    <div class="col-12 col-lg-8 px-2 py-2 d-none rounded rounded-4" id="alertDiv4">
                                        <div class="bg-warning text-center text-danger fs-5 rounded rounded-2" id="msgDiv4">
                                        </div>
                                    </div>
                                    <!-- alert box -->

                                    <div class="col-6">
                                        <label class="form-label">New User Passwod</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="unpi" />
                                            <button class="btn btn-danger" type="button" id="unpb" onclick="showPasswordUN();"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Re-type User Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="urnpi" onkeyup="checkPasswordUser();" />
                                            <button class="btn btn-danger" type="button" id="urnpb" onclick="showPasswordUR();"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div>

                                    <!-- password box -->
                                    <div class="col-12 col-lg-8 px-2 py-2 d-none rounded rounded-4" id="alertDiv5">
                                        <div class="text-center text-warning fs-5 rounded rounded-2" id="msgDiv5">
                                            <span class="text danger">Fill Password Fields</span>
                                        </div>
                                    </div>
                                    <!-- password box -->

                                    <div class="col-12">
                                        <label class="form-label">User Verification Code</label>
                                        <input type="text" class="form-control" id="verificationCodeUser" />
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="resetUserPassword();">Reset User Password</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Forgot Password Modal -->

                <!-- Admin Forgot Password Modal -->
                <!-- <div class="modal" tabindex="-1" id="forgotPasswordUserModal">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content" style="background-image: linear-gradient(90deg, hsl(151, 70%, 56%) 0%, hsl(223, 67%, 44%) 50%, hsl(253, 46%, 32%) 100%);">
                            <div class="modal-header shadow px-3">
                                <h5 class="modal-title text-uppercase text-primary fs-3">Reset Admin Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-3 pt-5 mb-3 pe-5">

                                <div class="row g-3 text-white justify-content-center pt-3 pe-4 ps-3"> -->

                <!-- alert box -->
                <!-- <div class="col-12 col-lg-8 px-2 py-2 d-none rounded rounded-4" id="alertDiv6">
                                        <div class="bg-warning text-center text-danger fs-5 rounded rounded-2" id="msgDiv6">
                                        </div>
                                    </div> -->
                <!-- alert box -->

                <!-- <div class="col-6">
                                        <label class="form-label">New Admin Passwod</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="anpi" />
                                            <button class="btn btn-danger" type="button" id="anpb" onclick="showPasswordAN();"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Re-type Admin Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="arnpi" onkeyup="checkPasswordAdmin();" />
                                            <button class="btn btn-danger" type="button" id="arnpb" onclick="showPasswordAR();"><i class="bi bi-eye-slash-fill"></i></button>
                                        </div>
                                    </div> -->

                <!-- password box -->
                <!-- <div class="col-12 col-lg-8 px-2 py-2 d-none rounded rounded-4" id="alertDiv7">
                                        <div class="text-center text-warning fs-5 rounded rounded-2" id="msgDiv7">
                                            <span class="text danger">Fill Password Fields</span>
                                        </div>
                                    </div> -->
                <!-- password box -->

                <!-- <div class="col-12">
                                        <label class="form-label">Admin Verification Code</label>
                                        <input type="text" class="form-control" id="verificationCodeAdmin" />
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="resetAdminPassword();">Reset Admin Password</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Admin Forgot Password Modal -->

                <!-- Support Modal -->
                <div class="modal pe-5" tabindex="-1" id="supportModal" style="<?php echo ($result2); ?>">
                    <div class=" modal-dialog modal-fullscreen p-4 pe-5">
                        <div class="modal-content rounded rounded-4 shadow" style="<?php echo ($result); ?>">
                            <div class="modal-header text-center shadow">
                                <h5 class="modal-title text-primary fw-bold text-uppercase fs-4" style="letter-spacing: 0.1rem;">Help & Support</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12">
                                    <div class="row justify-content-center align-items-center align-content-center">

                                        <div class="col-12 text-start mb-1">
                                            <span class="text-white fw-bold fs-5" id="title">Contact Admin</span>
                                        </div>

                                        <div class="col-12 h-100 border-top">
                                            <div class="row align-content-center align-items-center justify-content-center py-lg-3">

                                                <div class="col-5 col-lg-4 h-100">
                                                    <div class="row justify-content-center align-items-center align-content-center" style="overflow-y: auto;">
                                                        <?php

                                                        $admin_rs = Database::search("SELECT * FROM `admin` ORDER BY `fname`");
                                                        $admin_count = $admin_rs->num_rows;

                                                        for ($x = 0; $x < $admin_count; $x++) {

                                                            $admin_data = $admin_rs->fetch_assoc();

                                                        ?>
                                                            <div class="col-11 d-grid">
                                                                <span class="text-black-50 fw-bold fs-6 shadow btn btn-outline-light mb-3 mt-3 border-0" style="letter-spacing: 0.1rem; <?php // echo ($result); 
                                                                                                                                                                                        ?>" onclick="setAdminMail('<?php echo ($admin_data['email']); ?>');">
                                                                    <?php

                                                                    echo ($admin_data["fname"] . " " . $admin_data["lname"]);

                                                                    $owner = "ks.official.sahan@gmail.com";
                                                                    $co_owner = "wjshashini@gmail.com";

                                                                    if ($admin_data["email"] == $owner) {
                                                                        echo (" [Owner]");
                                                                    } else if ($admin_data["email"] == $co_owner) {
                                                                        echo (" [Co-Owner]");
                                                                    } else {
                                                                        echo (" [Admin]");
                                                                    }

                                                                    ?>
                                                                </span>
                                                            </div>
                                                        <?php

                                                        }

                                                        ?>

                                                    </div>
                                                </div>

                                                <div class="col-7 col-lg-8 text-white border-start rounded-3 px-3 mt-2 mt-lg-2 d-flex">
                                                    <div class="row justify-content-center align-content-center align-items-center">

                                                        <div class="col-12 d-none">
                                                            <label class="form-label">Admin</label>
                                                            <input type="email" class="form-control" id="amail" value="<?php echo ($owner); ?>" />
                                                        </div>
                                                        <div class="col-12 mb-3 mt-1">
                                                            <label class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="umail" placeholder="Enter your email" />
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label class="form-label">Subject</label>
                                                            <input type="text" class="form-control" id="subject" placeholder="Enter the subject" />
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <textarea cols="30" rows="9" class="form-control" id="content" placeholder="Enter your problem"></textarea>
                                                        </div>

                                                        <div class="col-12 col-lg-6 d-grid mb-2 mb-lg-4">
                                                            <button class="btn btn-light text-dark fs-6 text-uppercase" onclick="sendSupportMsg();">Send</button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-12">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-2 col-4 d-grid">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Support Modal -->

                <!-- Footer -->
                <div class="col-12 fixed-bottom d-block text-warning text-center">
                    <div class="row">
                        <div class="col-12 d-none d-lg-block">
                            <span> &copy; 2022 Horizon CSR || All Rights Reserved || Developed by Sahan Sachintha&trade;</span>
                        </div>
                        <div class="col-12 mb-2">
                            <a href="#" class="text-decoration-none fw-bold text-white fs-5" onclick="support();">Help & Support</a>
                        </div>
                    </div>
                </div>
                <!-- Footer -->

            </div>
        </div>

    <?php

    }

    ?>

    <?php // include "scripts.php"; 
    ?>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>
<?php

// echo ("Add Product Process");

session_start();

$email = $_SESSION["admin"]["email"];
// echo($email);

require "../connection.php";

$category = $_POST["category"];
$year = $_POST["year"];
$title = $_POST["title"];
$description = $_POST["description"];

// echo ($category." : ".$year." : ".$title." : ".$description);

if ($category == 0) {
    echo ("Please select a Category");
} else if ($year == 0) {
    echo ("Please select a year");
} else if (empty($title)) {
    echo ("Please enter the Title");
} else if (strlen($title) >= 100) {
    echo ("Title should have less than 100 characters");
} else if (empty($description)) {
    echo ("Please enter a description");
} else {

    $dateTime = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $dateTime->setTimezone($timeZone);
    $date = $dateTime->format("Y-m-d H:i:s");

    $pid = random_int(1000, 10000);

    $status = 1;

    $query = "INSERT INTO `product` (`product_id`, `category_id`, `title`, `description`, `status_id`, `datetime_added`, `admin_email`, `year_id`) VALUES ('" . $pid . "', '" . $category . "', '" . $title . "', '" . $description . "', '1', '" . $date . "', '" . $email . "', '" . $year . "')";
    // echo ($query);
    // Database::iud("INSERT INTO `product` (`category_id`, `title`, `description`, `status_id`, `datetime_added`, `admin_email`, `year_id`) VALUES ('" . $category . "', '" . $title . "', '" . $description . "', '1', '" . $date . "', '" . $email . "', '" . $year . "')");
    Database::iud($query);
    $product_id = Database::$connection->insert_id;
    // echo ("Product saved successfully");


    // $file_count = $_POST["file_count"];
    $file_count = sizeof($_FILES);
    // echo ($file_count);

    if ($file_count <= 3 && $file_count > 0) {

        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $file_count; $x++) {
            if (isset($_FILES["img" . $x])) {

                $image_file = $_FILES["img" . $x];
                $file_extention = $image_file["type"];
                // echo ($file_extention);

                if (in_array($file_extention, $allowed_img_extentions)) {

                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "..//resources//item_img//" . $title . "_" . $x . "_" . substr(uniqid(), 5) . $new_img_extention;
                    move_uploaded_file($image_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES ('" . $file_name . "','" . $pid . "')");

                } else {
                    echo ("Unsupported image type : " . $file_extention);
                }

            }
        }

        echo ("Product image saved successfully");

    } else {
        echo ("Invalid image count");
    }

}

?>
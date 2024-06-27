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
$url = $_POST["url"];
$quality = $_POST["quality"];
$size = $_POST["size"];
$unit = $_POST["unit"];

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
} else if (empty($url)) {
    echo ("Please enter the stream url");
} else if ($quality == 0) {
    echo ("Please select a quality");
} else if (empty($size)) {
    echo ("Please enter the file size");
} else if ($unit == 0) {
    echo ("Please select a size unit");
} else {

    $dateTime = new DateTime();
    $timeZone = new DateTimeZone("Asia/Colombo");
    $dateTime->setTimezone($timeZone);
    $date = $dateTime->format("Y-m-d H:i:s");

    $pid = random_int(1000, 9999);
    $isFound = false;

    $check_result = Database::search("SELECT * FROM `product` WHERE `product_id`='" . $pid . "'");
    if ($check_result->num_rows > 0) {
        $isFound = true;
    }

    while ($isFound) {
        $pid = random_int(1000, 9999);
        $check_result = Database::search("SELECT * FROM `product` WHERE `product_id`='" . $pid . "'");
        if ($check_result->num_rows == 0) {
            $isFound = false;
        }
    }

    $status = 1;

    $query = "INSERT INTO `product` (`product_id`, `category_id`, `title`, `description`, `status_id`, `datetime_added`, `admin_email`, `year_id`) VALUES ('" . $pid . "', '" . $category . "', '" . $title . "', '" . $description . "', '1', '" . $date . "', '" . $email . "', '" . $year . "')";
    Database::iud($query);
    // $product_id = Database::$connection->insert_id;


    $versionQuery = "INSERT INTO `version` (`product_id`, `path`, `size`, `version_type_id`, `quality_id`, `size_id`) VALUES ('" . $pid . "', '" . $url . "', '" . $size . "', '1', '" . $quality . "', '" . $unit . "')";
    Database::iud($versionQuery);

    // $file_count = $_POST["file_count"];
    $file_count = sizeof($_FILES);

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

                    $file_name = "resources//item_img//" . $title . "_" . $x . "_" . substr(uniqid(), 5) . $new_img_extention;
                    move_uploaded_file($image_file["tmp_name"], "../" . $file_name);

                    $imageQuery = "INSERT INTO `images` (`path`,`product_id`) VALUES ('" . $file_name . "','" . $pid . "')";
                    Database::iud($imageQuery);

                } else {
                    echo ("Unsupported image type : " . $file_extention);
                }

            }
        }

        echo ("Product image saved successfully");

    } else {
        echo ("Invalid image count! Atleast 1 image is required");
    }

}

?>
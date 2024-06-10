<?php

require "connection.php";

session_start();

$obj = new stdClass();

if (isset($_SESSION["user"]) || isset($_SESSION["admin"])) {

    if (isset($_POST["json"])) {

        $json = $_POST["json"];
        $requestObj = json_decode($json);

        $v_id = $requestObj->version_id;

        $version_rs = Database::search("SELECT * FROM `version` WHERE `version_id`='".$v_id."'");
        $version_count = $version_rs->num_rows;

        if ($version_count > 0) {

            $version_data = $version_rs->fetch_assoc();

            $obj->video = $version_data["path"];

            $obj->result = "success";

        } else {
            $obj->result = "Couldn't find the relevant Video";
        }
    

    } else {
        $obj->result = "Invalid request, couldn't find any data.";
    }

} else {
    $obj->result = "Unable to detect User";
}

$responseJSON = json_encode($obj);

echo ($responseJSON);

?>
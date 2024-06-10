<?php

class bgColor {

    public static $angle = "90";
    public static $colorMain0 = "351, 70%, 51%";
    public static $colorMain1 = "223, 67%, 44%";
    public static $colorMain2 = "253, 46%, 32%";

    public static function setDefaultColor () {

        $result = "background-image: linear-gradient(" . bgColor::$angle . "deg, hsl(" . bgColor::$colorMain0 . ") 0%, hsl(" . bgColor::$colorMain1 . ") 50%, hsl(" . bgColor::$colorMain2 . ") 100%);";

        return $result;

    }

    public static function setColorMain ($bgangle,$bgcolor0,$bgcolor1,$bgcolor2) {

        // if (!empty($bgangle)) {
        //     bgColor::$angle = $bgangle;
        // } else {
        //     $bgangle = bgColor::$angle;
        // }
        // if (!empty($bgangle)) {
        //     bgColor::$colorMain0 = $bgcolor0;
        // } else {
        //     $bgcolor0 = bgColor::$colorMain0;
        // }
        // if (!empty($bgangle)) {
        //     bgColor::$colorMain1 = $bgcolor1;
        // } else {
        //     $bgcolor1 = bgColor::$colorMain1;
        // }
        // if (!empty($bgangle)) {
        //     bgColor::$colorMain2 = $bgcolor2;
        // } else {
        //     $bgcolor2 = bgColor::$colorMain2;
        // }

        // $result = "background-image: linear-gradient(" . bgColor::$angle . "deg, hsl(" . bgColor::$colorMain0 . ") 0%, hsl(" . bgColor::$colorMain1 . ") 50%, hsl(" . bgColor::$colorMain2 . ") 100%);";
        $result = "background-image: linear-gradient(" . $bgangle . "deg, hsl(" . $bgcolor0 . ") 0%, hsl(" . $bgcolor1 . ") 50%, hsl(" . $bgcolor2 . ") 100%);";

        return $result;

    }

}

?>
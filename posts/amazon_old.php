<?php

    //Requires the config to continue.
    require $_SERVER["DOCUMENT_ROOT"]."/config.php";

    //Function gets the string between two strings.
    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function amazon_get_product($url){

        //Gets the entire amazon web page for the product.
        $page = file_get_contents($url);
        $page = str_replace("\n", "", $page);

        //Gets the title of the product.
        $title = get_string_between($page, "<span id=\"productTitle\" class=\"a-size-extra-large\">", "</span>");

        //Gets the price of the product.
        $price = get_string_between($page, "<span class=\"a-size-base a-color-price a-color-price\">$", "</span>");

        //Checks if the price was found.
        if($price == ""){

            //Gets a different price of the product.
            $price = get_string_between($page, "<span class=\"a-color-base\">from $", "</span>");

        }

        //Gets the main image for the product.
        $image = get_string_between($page, "<div id=\"main-image-container\" class=\"a-column a-span12 a-text-center maintain-height a-span-last\">", "</div>");
        $image = get_string_between($image, "<img alt=\"\" src=\"", "\"");

        //Gets an array to store the data.
        $result = array(
            "title" => $title,
            "price" => $price,
            "image" => $image,
        );

        return $result;

    }

?>
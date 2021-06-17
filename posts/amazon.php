<?php

    //Requires the config to continue.
    require $_SERVER["DOCUMENT_ROOT"]."/config.php";

    function amazon_get_product($id){

        //Gets the post by id.
        $results = posts_select_id($id);

        //Gets the data from the mysql result.
        $row = $results->fetch_assoc();
        $title = $row["title"];
        $price = "0";
        $image = "/images/".$row["image"];

        //Gets an array to store the data.
        $result = array(
            "title" => $title,
            "price" => $price,
            "image" => $image
        );

        return $result;

    }
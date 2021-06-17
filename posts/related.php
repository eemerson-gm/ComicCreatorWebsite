<?php

    //Gets the product id from the url.
    $category = $_GET["category"];

    //Requires the select scripts to continue.
    require $_SERVER["DOCUMENT_ROOT"]."/posts/amazon.php";
    require $_SERVER["DOCUMENT_ROOT"]."/posts/select.php";
    require_once $_SERVER["DOCUMENT_ROOT"]."/posts/stars.php";

    //Selects all the blog posts for the website from the database.
    $results = posts_select_category_limit("ccr", $category,  4);

    //Loops through all the posts for the website.
    while($row = $results->fetch_assoc()){

        //Includes the function for formatting product cards.
        include($_SERVER["DOCUMENT_ROOT"]."/posts/card.php");
    }

?>
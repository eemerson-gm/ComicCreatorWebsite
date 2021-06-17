<?php

    //Gets the product information.
    $product = amazon_get_product(intval($row["blog_id"]));

    //Prints out the product card formatted.
    $page = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/templates/product.php");
    $page = str_replace("#category", $row["category"], $page);
    $page = str_replace("#image", $product["image"], $page);
    $page = str_replace("#title", $product["title"], $page);
    $page = str_replace("#link", "/review.php?id=".$row["blog_id"], $page);
    $page = str_replace("#stars", get_stars($row["stars"]), $page);
    echo $page;

?>
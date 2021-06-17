<?php

    //Gets the product id from the url.
    $id = $_GET["id"];

    //Checks if the id is set.
    if(isset($id)){

        //Requires the select scripts to continue.
        require $_SERVER["DOCUMENT_ROOT"]."/posts/amazon.php";
        require $_SERVER["DOCUMENT_ROOT"]."/posts/select.php";
        require_once $_SERVER["DOCUMENT_ROOT"]."/posts/stars.php"; 

        //Selects all the blog posts for the website from the database.
        $results = posts_select_id($id);

        //Loops through all the posts for the website.
        while($row = $results->fetch_assoc()){

            //Gets the formatted date time.
            $time = strtotime($row["date"]);
            $date = date("F Y", $time);

            //Gets the product information.
            $product = amazon_get_product($id);
            $amazon = "";
            $booktopia = "";
            $link = "";

            //Gets the review blog post.
            $post = $row["blog_post"];

            //Checks if the post is empty.
            if(!isset($post) || ($post == "")){
                $post = "A review has not been written for this book yet.";
            }

            //Checks if an amazon or booktopia link should be shown.
            if($row["amazon_link"] != ""){
                $amazon = "<td><input type='button' value='Amazon' onclick='location.href=\"".$row["amazon_link"]."\"'></td>";
                $link = $row["amazon_link"];
            }
            if($row["booktopia_link"] != ""){
                $booktopia = "<td><input type='button' value='Booktopia' onclick='location.href=\"".$row["booktopia_link"]."\"'></td>";
                $link = $row["booktopia_link"];
            }

            //Prints out the product card formatted.
            echo    "
                    <h1 class='review_title'>
                        ".$row["title"]."
                    </h1>
                    <hr class='zig'>
                    <hr class='zag'>
                    <div class='column_wrap'>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <img class='review_image' alt='' src='".$product["image"]."'>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <div class='review_holder'>
                            <table style='width:100%'>
                                <tbody>
                                    <tr>
                                        <td>
                                            <table style='width:100%'>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div style='text-align:left'>
                                                                ".$row["category"]."
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div style='text-align:right'>
                                                                ".$date."
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class='review_body'>
                                                ".$row["description"]."
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table style='width:100%'>
                                                <tbody>
                                                    <tr>
                                                        <td style='width:33%'>
                                                            ".get_stars($row["stars"])."
                                                        </td>
                                                        <td style='width:66%'>
                                                            <table style='table-layout:fixed; width:100%;'>
                                                                <tbody>
                                                                    <tr>
                                                                        ".$amazon."
                                                                        ".$booktopia."
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class='review_body'>
                                                ".$post."
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    ";
        }

    }

?>
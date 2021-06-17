
<!-- Includes the header onto the page. -->
<?php include("templates/header.php"); ?>

<?php

    //Includes the post select functions.
    include("posts/select.php");

?>

<div class="main">
    <h1 class="product_title" style="text-align:center; font-size:40px;">
        Links
    </h1>
    <hr class='zig'>
    <hr class='zag'>
    <ul style="list-style:none">
        <?php

            //Gets all the links from the link table.
            $results = posts_select_links();
            $counter = 0;

            //Loops through the results from the database.
            while($row = $results->fetch_assoc()){

                //Prints out the link information.
                echo    "
                        <li>
                            <table style='margin:auto'>
                                <tbody>
                                    <tr>
                                        <td style='text-align:center'>
                                            <a class='link' href='".$row["url"]."'>
                                                <h1 class='link review_title'>
                                                    ".$row["name"]."
                                                </h1>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='text-align:center'>
                                            <h3 class='link_description'>
                                                ".$row["description"]."
                                            </h3>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        ";

                //Checks if the link is not the last.
                if($counter < (mysqli_num_rows($results) - 1)){
                    echo    "
                            <hr class='zig'>
                            <hr class='zag'>
                            ";
                }

                //Increments the counter.
                $counter += 1;

            }

        ?> 
    </ul>
</div>

<!-- Includes the footer onto the page. -->
<?php include("templates/footer.php"); ?>
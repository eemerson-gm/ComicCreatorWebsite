
<!-- Includes the header onto the page. -->
<?php include("templates/header.php"); ?>

<?php

    //Requires the select scripts to continue.
    require $_SERVER["DOCUMENT_ROOT"]."/posts/select.php";
    require $_SERVER["DOCUMENT_ROOT"]."/posts/stars.php";

    //Gets the product id from the url.
    $results    = posts_select_random("ccr");
    $row        = $results->fetch_assoc();

?>

<div class="main">
    <div class="table_wrap">
        <div class="column_wrap" style="margin-right:12px; margin-bottom:12px; width:100%; max-width:560px;">
            <h1 class="product_title" style="text-align:center; font-size:40px;">
                Introduction Title
            </h1>
            <hr class='zig'>
            <hr class='zag'>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="home_border column_wrap" style="width:100%; padding-bottom:16px; max-width:500px;">
            <h1 class="product_title" style="text-align:center; font-size:40px;">
                Featured Book
            </h1>
            <hr class='zig'>
            <hr class='zag'>
            <table style="margin:auto; width:100%;">
                <tbody>
                    <tr>
                        <td style="text-align:center">
                            <img src="<?php echo "/images/".$row["image"] ?>" class="home_image" onclick="location.href='/review.php?id=<?php echo $row["blog_id"]; ?>'">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <?php echo get_stars($row["stars"]); ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <?php echo $row["blog_post"] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <input type="button" class="home_button" value="See More" onclick="location.href='/review.php?id=<?php echo $row["blog_id"]; ?>'">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Includes the footer onto the page. -->
<?php include("templates/footer.php"); ?>
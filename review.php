
<!-- Includes the header onto the page. -->
<?php include("templates/header.php"); ?>
<?php require $_SERVER["DOCUMENT_ROOT"]."/posts/stars.php"; ?>

<?php

    //Requires the select scripts to continue.
    require $_SERVER["DOCUMENT_ROOT"]."/posts/select.php";

    //Gets the product id from the url.
    $id         = $_GET["id"];
    $results    = posts_select_id($id);
    $row        = $results->fetch_assoc();

?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    //Loads the product listings after page load.
    $(document).ready( function() {
        $("#product_table").load("/posts/review.php?id=<?php echo $id ?>", function(){

            $("#product_loading").hide();

            $("#related_table").load("/posts/related.php?category=<?php echo urlencode($row["category"]) ?>", function(){
                $("#product_loading_related").hide();
            });

        });
    });

</script>

<div class="main">
    <div id="product_table" class="table_wrap">
    </div>
    <div id="product_loading">
        <table style="margin:auto">
            <tbody>
                <tr>
                    <td>
                        <div class="loader"></div>
                    </td>
                    <td>
                        <h1 class="loader_text">
                            Loading...
                        </h1>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr class="zig">
    <hr class="zag">
    <h1 class="related_title">
        Related Books
    </h1>
    <div id="product_loading_related">
        <table style="margin:auto">
            <tbody>
                <tr>
                    <td>
                        <div class="loader"></div>
                    </td>
                    <td>
                        <h1 class="loader_text">
                            Loading...
                        </h1>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="related_table" class="table_wrap">   
    </div>
</div>

<!-- Includes the footer onto the page. -->
<?php include("templates/footer.php"); ?>
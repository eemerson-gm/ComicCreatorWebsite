
<!-- Includes the header onto the page. -->
<?php include("templates/header.php"); ?>
<?php require $_SERVER["DOCUMENT_ROOT"]."/posts/stars.php"; ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    //Loads the product listings after page load.
    $(document).ready( function() {

        //Gets the parameters from the url.
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        //Gets an array of all the different categories.
        let categories = ["Creating comics", "Writing comics", "Drawing comics", "Crowd funding", "Self publishing", "Graphic novels", "Other"];

        //Runs the function.
        load_product_section(categories, 0);

        //Function loads all the products for the specific section.
        function load_product_section(c, i){

            //Gets the strings for the elements.
            var table = "#product_table_".concat((i + 1).toString());
            var section = "#product_section_".concat((i + 1).toString());
            var loading = "#product_loading_".concat((i + 1).toString());

            //Checks if the category exists or is not set.
            if((urlParams.get("category") == categories[i]) || (!urlParams.has("category"))){

                //Adds the products to the product table.
                $(table).load("/posts/category.php?category=" + encodeURIComponent(categories[i]), function(){

                    //Hides the loading.
                    $(loading).hide();

                });

            }else{

                //Hides the section with title and products.
                $(section).hide();

            }

            //Checks if the counter has reached the end.
            if(i != c.length){
                load_product_section(c, i + 1);
            }

        }

    });

</script>

<div class="main">

<?php

    //Gets the array of titles.
    $categories = array("Creating comics", "Writing comics", "Drawing comics", "Crowd funding", "Self publishing", "Graphic novels", "Other");

    //Prints all the sections.
    foreach($categories as $x => $c){

        echo "  <div id='product_section_".strval($x + 1)."'>
                    <h1 class='related_title'>
                        ".$c."
                    </h1>
                    <hr class='zig'>
                    <hr class='zag'>
                    <div id='product_table_".strval($x + 1)."' class='table_wrap'>
                    </div>
                    <div id='product_loading_".strval($x + 1)."'>
                        <table style='margin:auto'>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class='loader'></div>
                                    </td>
                                    <td>
                                        <h1 class='loader_text'>
                                            Loading...
                                        </h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>";
    }
?>

</div>

<!-- Includes the footer onto the page. -->
<?php include("templates/footer.php"); ?>
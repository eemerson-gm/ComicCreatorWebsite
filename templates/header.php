<head>

    <!-- Links the web page stylesheet. -->
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<div class="main">
    <img class="header_logo" src="/images/logo.png" />
</div>

<div class="header_bar">
    <div class="main">
        <div class="header">
            <table cellspacing="0" style="table-layout:fixed; width:100%;">
                <tbody>
                    <tr>
                        <td>
                            <a href="/index.php">
                                <div class="header_link">
                                    Home
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/shop.php">
                                <div class="dropdown">
                                    <div class="header_link">
                                        Shop
                                    </div>
                                    <div class="dropdown_content">
                                        <ul>
                                            <?php

                                                //Gets the array of titles.
                                                $categories = array("Creating comics", "Writing comics", "Drawing comics", "Crowd funding", "Self publishing", "Graphic novels", "Other");

                                                //Loops through each category.
                                                foreach($categories as $x => $c){
                                                    echo "  <li>
                                                                <a href='/shop.php?category=".urlencode($c)."'>
                                                                    <div class='dropdown_link'>
                                                                        ".$c."
                                                                    </div>
                                                                </a>
                                                            </li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/links.php">
                                <div class="header_link">
                                    Links
                                </div>
                            </a>
                        </td>
                        <td>
                            <a href="/privacy.php">
                                <div class="header_link">
                                    Privacy/Contact
                                </div>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
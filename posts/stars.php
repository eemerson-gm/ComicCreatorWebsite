
<?php

    function get_stars($number){

        //Gets the stars for the blog post.
        $star_0 = ((intval($number) == 0) ? "hidden" : "");
        $star_1 = ((intval($number) > 0) ? "checked" : "");
        $star_2 = ((intval($number) > 1) ? "checked" : "");
        $star_3 = ((intval($number) > 2) ? "checked" : "");
        $star_4 = ((intval($number) > 3) ? "checked" : "");
        $star_5 = ((intval($number) > 4) ? "checked" : "");
        $star_6 = ((intval($number) > 5) ? "maximum" : "");

        //Returns the stars divider.
        return "<div style='height:27px; text-align:center;'>
                    <div ".$star_0.">
                        <span class='fa fa-star ".$star_1." ".$star_6."'></span>
                        <span class='fa fa-star ".$star_2." ".$star_6."'></span>
                        <span class='fa fa-star ".$star_3." ".$star_6."'></span>
                        <span class='fa fa-star ".$star_4." ".$star_6."'></span>
                        <span class='fa fa-star ".$star_5." ".$star_6."'></span>
                    </div>
                </div>";

    }

?>
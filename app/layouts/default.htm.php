<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $page_title; ?></title>

        <!--style of page-->
        <?php echo $html->stylesheet(array("../scripts/sponsors/css/styles.css")); ?>
        <!--/style of page-->
        
        <!--jquery/jquery-ui-->
        <?php echo $html->script(array("jquery-1.6.1.min.js",)); ?>
        <?php echo $html->script(array("jquery-ui-1.7.2.min.js",)); ?>
        <!--/jquery/jquery-ui-->
        
        <!--sponsors-->
        <?php echo $html->script(array("sponsors/js/jquery.flip.min.js",)); ?>
        <?php echo $html->script(array("sponsors/js/script.js",)); ?>
        <!--/sponsors-->
    </head>
    <body>

        <h1>Memory Test</h1>
        <h2></h2>

        <?php
        // Each sponsor is an element of the $charts array:
        $charts = array(
            array("id" => 1, "img" => "mysql",),
            array("id" => 2, "img" => "hp",),
            array("id" => 3, "img" => "microsoft",),
            array("id" => 4, "img" => "dell",),
            array("id" => 5, "img" => "ebay",),
            array("id" => 6, "img" => "digg",),
            array("id" => 7, "img" => "google",),
            array("id" => 8, "img" => "ea",),
            array("id" => 9, "img" => "cisco",),
            array("id" => 10, "img" => "vimeo",),
            array("id" => 11, "img" => "canon",),
            array("id" => 12, "img" => "facebook",),
        );
        $charts = array_merge($charts, $charts);
        // Randomizing the order of sponsors:
        shuffle($charts);
        ?>
        <div id="main">
            <div class="sponsorListHolder">
                <!--Looping through the array-->
                <?php foreach ($charts as $key => $chart) { ?>
                <div class="sponsor">
                    <div class="sponsorFlip" title="Clique para virar" id="close_<?php echo $key; ?>">
                        <?php echo $html->image("sponsors/verso.png"); ?>
                    </div>

                    <div class="sponsorData">
                        <?php echo $html->image("charts/{$chart["img"]}.png", array("alt" => $chart["img"])); ?>
                    </div>
                </div>
                <?php } // endforeach; ?>
                <div class="clear"></div>
            </div>
            <input type="hidden" id="first" />
            <input type="hidden" id="idfirst" />
            <input type="hidden" id="second" />
            <input type="hidden" id="idsecond" />
        </div>

        <p class="note">None of these companies are actually sponsors of Tutorialzine.</p>
        <p class="note">Developed for <a href="http://www.pianolab.com.br" target="_blank">PianoLab</a> by wfsneto</p>

    </body>
</html>
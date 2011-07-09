<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sponsor Flip Wall With jQuery &amp; CSS | Tutorialzine demo</title>

        <link rel="stylesheet" type="text/css" href="styles.css" />

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="jquery.flip.min.js"></script>

        <script type="text/javascript" src="script.js"></script>

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
                        <img src="img/verso.png" />
                    </div>

                    <div class="sponsorData">
                        <img alt="<?php echo $chart["img"]; ?>" src="img/sponsors/<?php echo $chart["img"]; ?>.png" />
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
       - <p class="note">Developed for <a href="http://www.pianolab.com.br" target="_blank">PianoLab</a> by wfsneto</p>

    </body>
</html>
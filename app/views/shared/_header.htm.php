<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--style of page-->
<?php
echo $html->stylesheet(array(
    "screen.css",
    "../scripts/jquery.flip/css/styles.css",
));
?>
<!--/style of page-->

<!--jquery/jquery-ui-->
<?php
echo $html->script(array(
    "jquery-1.6.1.min.js",
    "jquery-ui-1.7.2.min.js",
));
?>
<!--/jquery/jquery-ui-->

<!--jquery.flip-->
<?php
echo $html->script(array(
    "jquery.flip/js/jquery.flip.min.js",
    "jquery.flip/js/script.js",
));
?>
<!--/jquery.flip-->

<!--pirobox-->
<?php
echo $html->stylesheet(array(
    "../scripts/pirobox/css2/style.css",
    "../scripts/pirobox/css/sansation/stylesheet.css",
));
echo $html->script(array(
    "pirobox/js/pirobox_extended.js",
    "pirobox/js/init.js",
));
?>
<!--/pirobox-->

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $page_title; ?></title>
        <meta name="author" content="Pianolab">
        <?php echo $html->stylesheet(array("screen.css")); ?>
        <?php echo $html->script(array("jquery-1.6.1.min.js", "application.js")); ?>
        <?php echo $html->script(array("/test/test")); ?>
        <?php echo $this->element('shared/analytics'); ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                aaa||<?php echo Mapper::url("/scripts/", false); ?>
            </div>
            <?php echo $this->element('shared/header'); ?>
            <div id="content"><?php echo $this->contentForLayout; ?></div>
            <?php echo $this->element('shared/footer'); ?>
        </div> <!-- End Container -->
        <div id="footer"></div>
        <?php //echo $this->element('shared/bench'); ?>
    </body>
</html>

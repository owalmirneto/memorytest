<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->element('shared/header'); ?>
        <title><?php echo $page_title; ?></title>
    </head>
    <body>
        <div id="content">
            <div id="header">
                <h1><?php echo $page_title; ?></h1>
            </div>
            <div id="sidebar-left">
                <?php //echo $this->element('shared/menu'); ?>
                <?php //echo $this->element('shared/level'); ?>
            </div>
            <div id="main">
                <?php echo $this->contentForLayout; ?>
                <?php echo $this->element('shared/footer'); ?>
            </div>
            <br clear="all" />
        </div>
        <?php echo $this->element('shared/signature'); ?>
    </body>
</html>
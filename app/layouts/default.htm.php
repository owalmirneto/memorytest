
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->element('shared/header'); ?>
        <title><?php echo $page_title; ?></title>
        <?php $base = Mapper::base(); ?>
        <?php if (!Session::read('name')) { ?>
            <script type="text/javascript">
                $(document).ready( function () {
                    $("#name").click();
                });
            </script>
        <?php } // endif; ?>
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
        <a id="name" href="<?php echo $base; ?>/home/name" rel="content-300-125" class="pirobox_gall1"></a>
    </body>
</html>
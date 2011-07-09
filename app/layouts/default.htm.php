<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->element('shared/header'); ?>
        <title><?php echo $page_title; ?></title>
    </head>
    <body>
        <div id="content">
            <?php echo $this->contentForLayout; ?>
            <?php echo $this->element('shared/footer'); ?>
        </div>
        <?php echo $this->element('shared/signature'); ?>
    </body>
</html>
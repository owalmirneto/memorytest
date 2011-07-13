<?php $base = Mapper::base(); ?>
<div id="header">
    <h2>Input your name</h2>
</div>
<div style="text-align: center">
    <input value="" />
    <a href="<?php echo $base; ?>" class="button" id="submit">OK</a>
    <div id="menssage"></div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#submit").live("click", function () {
            $.post("<?php echo $base; ?>/home/savename/", { nome: $(this).siblings().val() }, function () {
                $(".piro_overlay").click();
            });
        });
    });
</script>

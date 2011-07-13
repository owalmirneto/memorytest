<?php $base = Mapper::base(); ?>
<div id="header">
    <h2>Input your name</h2>
</div>
<div style="text-align: center">
    <input value="" />
    <input type="button" id="submit" value="OK" />
    <div id="menssage"></div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#submit").live("click", function () {
            $.post("<?php echo $base; ?>/home/savename/", { nome: $(this).siblings().val() }, function () {
                $(".piro_overlay").click()
            });
        });
    });
</script>

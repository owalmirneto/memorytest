<?php $base = Mapper::base(); ?>
<div id="header">
    <h2>Input your name</h2>
</div>
<div style="text-align: center">
    <input value="" />
    <a href="#" alt="<?php echo $base; ?>" class="button" id="submit">OK</a>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#submit").live("click", function () {
            a = $(this).attr("alt");
            $.post("<?php echo $base; ?>/home/savename/", { nome: $(this).siblings().val() }, function (data) {
                $(".piro_overlay").click();
                window.location = a;
            });
        });
    });
</script>

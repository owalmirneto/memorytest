<?php $base = Mapper::base(); ?>
<div id="header"><h2>Escolha um tema</h2></div>
<div id="buttons">
    <?php if (is_array($temas)) { ?>
        <ul>
            <?php foreach ($temas as $key => $tema) { ?>
                <li><a class="options" href="<?php echo $base; ?>/home" alt="<?php echo $tema["id"]; ?>" title="<?php echo $tema["id"]; ?>"><?php echo $tema["tema"]; ?></a></li>
            <?php } // endforeach; ?>
        </ul>
    <?php } else { ?>
        <li><?php echo $temas; ?></li>
    <?php } // endif; ?>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $(".options").live("click", function () {
            //alert($(this).attr("alt"));
            $.post("<?php echo $base; ?>/home/theme/", { tema_id: $(this).attr("alt") }, function (data) {
                $(".piro_overlay").click();
                setTimeout(function () {
                    window.location.reload(true);
                },10);
            });
            return false;
        });
    });
</script>
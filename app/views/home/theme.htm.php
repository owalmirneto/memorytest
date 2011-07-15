<?php $base = Mapper::base(); ?>
<div id="header"><h2>Créditos</h2></div>
<div id="buttons">
    <?php if (is_array($temas)) { ?>
        <ul>
            <?php foreach ($temas as $key => $tema) { ?>
                <li><a href="<?php echo $base; ?>/" alt="<?php echo $tema["id"]; ?>" title="<?php echo $tema["id"]; ?>"><?php echo $tema["tema"]; ?></a></li>
            <?php } // endforeach; ?>
        </ul>
    <?php } else { ?>
        <li><?php echo $temas; ?></li>
    <?php } // endif; ?>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#buttons ul li a").live("click", function () {
            $.post("<?php echo $base; ?>/home/theme/", { tema_id: $(this).attr("alt") }, function (data) {
                $(".piro_overlay").click();
                //window.location = "<?php echo $base; ?>/home";
            });
        });
    });
</script>
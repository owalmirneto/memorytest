<?php $base = Mapper::base(); ?>
<div id="config">
    <div id="header">
        <h2>Choose player</h2>
    </div>
    <div id="buttons">
        <?php if (is_array($usuarios)) { ?>
            <ul>
                <?php foreach ($usuarios as $key => $usuario) { ?>
                    <li title="<?php echo $usuario["nome"]; ?>">
                        <input type="hidden" value="<?php echo $usuario["nome"]; ?>" />
                        <a href="<?php echo $base; ?>/home/"><?php echo $usuario["nome"]; ?></a>
                    </li>
                <?php } // endforeach; ?>
            </ul>
        <?php } else { ?>
            <?php echo $usuarios ?>
        <?php } // endif; ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#buttons a").live("click", function () {
            $.post("<?php echo $base; ?>/home/player/", { nome: $(this).siblings().val() }, function () {
                $(".piro_overlay").click();
                $(window.location).attr('href', '#');
            });
        });
    });
</script>


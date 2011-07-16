<?php $base = Mapper::base(); ?>
<div id="config">
    <div id="header">
        <h2>Escolher jogador</h2>
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
    <div id="header">
        <h2>Ou digite seu nome</h2>
    </div>
    <?php echo $this->element('templates/name'); ?>
    <div>
        <input type="hidden" value="" />
        <a class="submit button" href="<?php echo $base; ?>">Salvar jogador</a>
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

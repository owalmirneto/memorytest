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
    <div id="header">
        <h2>Or input your name</h2>
    </div>
    <div style="text-align: center; margin-bottom: 20px">
        <input value="" />
        <a href="<?php echo $base; ?>" class="button" id="submit">OK</a>
    </div>
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
    
        $("#buttons a").live("click", function () {
            $.post("<?php echo $base; ?>/home/player/", { nome: $(this).siblings().val() }, function () {
                $(".piro_overlay").click();
                $(window.location).attr('href', '#');
            });
        });
    });
</script>


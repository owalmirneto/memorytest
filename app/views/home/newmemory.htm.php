<?php $base = Mapper::base(); ?>
<div id="config">
    <div id="header">
        <h2>Modo de jogo</h2>
    </div>
    <div id="buttons">
        <?php if (is_array($modos)) { ?>
            <ul>
                <?php foreach ($modos as $key => $modo) { ?>
                    <li title="<?php echo $modo["nome"]; ?>">
                        <a href="<?php echo $base; ?><?php echo $modo["link"]; ?>"><?php echo $modo["nome"]; ?></a>
                    </li>
                <?php } // endforeach; ?>
            </ul>
        <?php } else { ?>
            <?php echo $modos ?>
        <?php } // endif; ?>
    </div>
</div>

<?php $base = Mapper::base(); ?>
<div id="config">
    <div id="header">
        <h2>Escolha o modo de jogo</h2>
    </div>
        <?php if (!Session::read('Usuario')) { ?>
            <?php echo $this->element('templates/name'); ?> 
        <?php } // endif; ?>
    <div id="buttons">
        <?php if (is_array($modos)) { ?>
            <ul>
                <?php foreach ($modos as $key => $modo) { ?>
                    <li title="<?php echo $modo["nome"]; ?>">
                        <input type="hidden" value="" />
                        <a class="submit" href="<?php echo $base; ?><?php echo $modo["link"]; ?>"><?php echo $modo["nome"]; ?></a>
                    </li>
                <?php } // endforeach; ?>
            </ul>
        <?php } else { ?>
            <?php echo $modos ?>
        <?php } // endif; ?>
    </div>
</div>

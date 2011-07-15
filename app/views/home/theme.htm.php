<?php $base = Mapper::base(); ?>
<div id="header"><h2>Créditos</h2></div>
<div id="buttons">
    <?php if (is_array($temas)) { ?>
        <ul>
            <?php foreach ($temas as $key => $tema) { ?>
                <li><b>Gmail: </b>wfsneto@gmail.com</li>
            <?php } // endforeach; ?>
        </ul>
    <?php } else { ?>
        <option value=""><?php echo $temas; ?></option>
    <?php } // endif; ?>
</div>

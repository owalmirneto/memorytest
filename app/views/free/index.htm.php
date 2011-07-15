<?php $base = Mapper::base(); ?>
<div id="modegame">
    <h2>Livre</h2>
    <form action="<?php echo $base; ?>/free/start" method="post">
        <fieldset>
            <label for="theme">Escolha o tema</label><br />
            <select id="theme" name="theme">
                <?php if (is_array($temas)) { ?>
                    <?php foreach ($temas as $key => $tema) { ?>
                        <option value="<?php echo $tema["id"]; ?>"><?php echo $tema["tema"]; ?></option>
                    <?php } // endforeach; ?>
                <?php } else { ?>
                    <option value=""><?php echo $temas; ?></option>
                <?php } // endif; ?>
            </select>
            <br clear="all" />
            <label for="level">Escolha o nível</label><br />
            <select id="level" name="level">
                <option value="3">Fácil</option>
                <option value="6">Normal</option>
                <option value="9">Intermediario</option>
                <option value="12">Díficil</option>
                <option value="15">Expert</option>
            </select>
        </fieldset>
        <br clear="all" />
        <input type="submit" value="Inicio" class="button" />
    </form>
</div>


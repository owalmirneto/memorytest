<?php $base = Mapper::base(); ?>
<div id="modegame">
    <h2>Free</h2>
    <form action="<?php echo $base; ?>/free/start" method="post">
        <fieldset>
            <label for="theme">Choose theme</label><br />
            <select id="theme" name="theme">
                <?php if (is_array($temas)) { ?>
                    <?php foreach ($temas as $key => $tema) { ?>
                        <option value="<?php echo $tema["id"]; ?>"><?php echo $tema["tema"]; ?></option>
                    <?php } // endforeach; ?>
                <?php } else { ?>
                    <option value=""><?php echo $tema; ?></option>
                <?php } // endif; ?>
            </select><br />
            <label for="level">Choose level</label><br />
            <select id="level" name="level">
                <option value="4">Easy</option>
                <option value="8">Normal</option>
                <option value="12">Intermediate</option>
                <option value="16">Hard</option>
            </select><br />
        </fieldset>
        <input type="submit" value="start" class="button" />
    </form>
</div>


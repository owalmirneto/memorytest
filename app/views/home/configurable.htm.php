<?php $base = Mapper::base(); ?>
<div id="modegame">
    <h2>Configurável</h2>
    <form action="<?php echo $base; ?>/free/configurable" method="post">
        <fieldset>
            <label for="level">Quantidade de cartas (par)</label><br />
            <input id="level" name="level" /><br />
            <em>É Aconselhavel colocar números divisiveis por três.</em>
        </fieldset>
        <input type="submit" value="Inicio" class="button" />
    </form>
</div>

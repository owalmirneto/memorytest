<?php $base = Mapper::base(); ?>
<div id="modegame">
    <h2>configurable</h2>
    <form action="<?php echo $base; ?>/start" method="post">
        <fieldset>
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


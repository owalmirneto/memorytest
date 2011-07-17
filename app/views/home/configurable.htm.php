<?php $base = Mapper::base(); ?>
<div id="modegame">
    <h2 style="margin: 10px">Configurável</h2>
    <form action="<?php echo $base; ?>/free/configurable" method="post">
        <fieldset>
            <label for="level">Quantidade de cartas (par)</label><br />
            <input id="level" name="level" /><br />
            <p id="message"></p>
        </fieldset>
        <input type="submit" value="Inicio" class="button submit" />
    </form>
</div>
<br />
<div id="message">É Aconselhavel colocar números divisiveis por três.</div>
<script type="text/javascript">
    $(document).ready( function () {
        $(".submit").live("click", function () {
            
            var nome_usuario = $("#level").val();
            
            if (nome_usuario == "") {
                $("p#message").html("Por favor digite a quantidade de cartas");
                return false;
            } else {
                $("p#message").html("");
            }
        });
    });
</script>
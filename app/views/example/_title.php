<?php
$redirect = BASE_URL . "/example/";
$aux = explode("/", $_SERVER["REQUEST_URI"]);
$action = (isset($aux[3])) ?$aux[3]:"";
?>
<script type="text/javascript">
    $(document).ready(function(){
        // binds form submission and fields to the validation engine
        $("#form_example").validationEngine();
        
        $("#redirect").change( function () {
            window.location = '<?php echo $redirect?>' + $(this).val();
        });
    });
</script>
<h1>
    Example
    <select name="redirect" id="redirect">
        <option value="" <?php if ($action == "") { ?> selected="true" <?php } // endif;  ?>>listar</option>
        <option value="add" <?php if ($action == "add") { ?> selected="true" <?php } // endif;  ?>>adicionar</option>
        <?php if ($action == "edit") { ?> 
            <option value="edit" selected="true">editar</option>
        <?php } // endif; ?>
        <?php if ($action == "view") { ?> 
            <option value="view" selected="true">detalhes</option>
        <?php } // endif; ?>
        <?php if ($action == "delete") { ?> 
            <option value="delete" selected="true">delete</option>
        <?php } // endif; ?>
    </select>
</h1>

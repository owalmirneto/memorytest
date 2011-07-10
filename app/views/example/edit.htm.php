<!-- 
    Não sei se essa é a forma mais correta de usar  mas não conseguir usar o $this->render
    que é muito parecido com o do Zend mas deve ter suas particularidades
-->
<?php include_once APP . DS . "views" . DS . "example" . DS . "_title.php" ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // binds form submission and fields to the validation engine
        jQuery("#form_example").validationEngine();
    });
</script>

<form id="form_example" class="formular" method="post" action="">
    <input value="<?php echo $example["id"]; ?>" type="hidden" name="id" id="id" />
    <fieldset>
        <legend><h2>Dados do Example</h2></legend>
        <ul>
            <li>
                <h3>Example *</h3>
                <input value="<?php echo $example["nome"]; ?>" class="validate[required]" type="text" name="nome" id="nome" />
            </li>
        </ul>
        <div id="formbutton">
            <input class="submit" type="submit" value="Salvar Example"/><hr/>
        </div>
    </fieldset>
</form>
<!-- 
    Não sei se essa é a forma mais correta de usar  mas não conseguir usar o $this->render
    que é muito parecido com o do Zend mas deve ter suas particularidades
-->
<?php include_once APP . DS . "views" . DS . "example" . DS . "_title.php" ?>
<form id="form_example" class="formular" method="post" action="">
    <input value="<?php echo $example["id"]; ?>" type="hidden" name="id" id="id" />
    <fieldset>
        <legend><h2>Dados do Example</h2></legend>
        <ul>
            <li>
                <h3>Example *</h3>
                <input type="text" disabled="true" value="<?php echo $example["nome"]; ?>" />
            </li>
        </ul>
    </fieldset>
</form>